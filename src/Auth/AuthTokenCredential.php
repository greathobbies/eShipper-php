<?php

namespace Davidflypei\Eshipper\Auth;

use Davidflypei\Eshipper\Cache\AuthorizationCache;
use Davidflypei\Eshipper\Common\EshipperResourceModel;
use Davidflypei\Eshipper\Core\EshipperHttpConfig;
use Davidflypei\Eshipper\Core\EshipperHttpConnection;
use Davidflypei\Eshipper\Core\EshipperLoggingManager;
use Davidflypei\Eshipper\Exception\EshipperConfigurationException;
use Davidflypei\Eshipper\Exception\EshipperConnectionException;
use Davidflypei\Eshipper\Handler\IEshipperHandler;
use Davidflypei\Eshipper\Rest\ApiContext;
use Davidflypei\Eshipper\Security\Cipher;
use mysql_xdevapi\Exception;

class AuthTokenCredential extends EshipperResourceModel {

  public static $CACHE_PATH = '/../../../var/auth.cache';

  /**
   * @var string Default Auth Handler
   */
  public static $AUTH_HANDLER = 'Davidflypei\Eshipper\Handler\AuthHandler';

  /**
   * Private Variable
   *
   * @var int $expiryBufferTime
   */
  public static $expiryBufferTime = 120;

  /**
   * Client ID as obtained from the developer portal
   *
   * @var string $clientPrincipal
   */
  private $clientPrincipal;

  /**
   * Client secret as obtained from the developer portal
   *
   * @var string $clientCredential
   */
  private $clientCredential;

  /**
   * Generated Access Token
   *
   * @var string $accessToken
   */
  private $accessToken;

  /**
   * @var mixed|null
   */
  private $refreshToken;

  /**
   * Seconds for with access token is valid
   *
   * @var $tokenExpiresIn
   */
  private $tokenExpiresIn;

  /**
   * @var mixed
   */
  private $refreshExpiresIn;

  /**
   * Last time (in milliseconds) when access token was generated
   *
   * @var $tokenCreateTime
   */
  private $tokenCreateTime;

  /**
   * Instance of cipher used to encrypt/decrypt data while storing in cache.
   *
   * @var Cipher
   */
  private $cipher;

  /**
   * Construct
   *
   * @param string $clientId     client id obtained from the developer portal
   * @param string $clientSecret client secret obtained from the developer portal
   */
  public function __construct($clientId, $clientSecret)
  {
    $this->clientPrincipal = $clientId;
    $this->clientCredential = $clientSecret;
    $this->cipher = new Cipher($this->clientCredential);
  }

  /**
   * Get Client ID
   *
   * @return string
   */
  public function getClientPrincipal()
  {
    return $this->clientPrincipal;
  }

  /**
   * Get Client Secret
   *
   * @return string
   */
  public function getClientCredential()
  {
    return $this->clientCredential;
  }

  /**
   * Get AccessToken
   *
   * @param $config
   *
   * @return null|string
   */
  public function getAccessToken($config)
  {
    // Check if we already have accessToken in Cache
    if ($this->accessToken && (time() - $this->tokenCreateTime) < ($this->tokenExpiresIn - self::$expiryBufferTime)) {
      return $this->accessToken;
    }

    // Check for persisted data first
    $token = AuthorizationCache::pull($config, $this->clientPrincipal);

    if ($token) {
      // We found it
      $this->tokenCreateTime = $token['tokenCreateTime'];
      $this->tokenExpiresIn = $token['tokenExpiresIn'];
      $this->accessToken = $this->decrypt($token['accessTokenEncrypted']);
    }

    // Check if Access Token is not null and has not expired.
    // The API returns expiry time as a relative time unit
    // We use a buffer time when checking for token expiry to account
    // for API call delays and any delay between the time the token is
    // retrieved and subsequently used
    if (
      $this->accessToken != null &&
      (time() - $this->tokenCreateTime) > ($this->tokenExpiresIn - self::$expiryBufferTime)
    ) {
      $this->accessToken = null;
    }


    // If accessToken is Null, obtain a new token
    if ($this->accessToken == null) {
      // Get a new one by making calls to API
      $this->updateAccessToken($config);
      AuthorizationCache::push($config, $this->clientPrincipal, $this->encrypt($this->accessToken), $this->encrypt($this->refreshToken), $this->tokenCreateTime, $this->tokenExpiresIn, $this->refreshExpiresIn);
    }

    return $this->accessToken;
  }

  /**
   * Get RefreshToken
   *
   * @param $config
   *
   * @return null|string
   */
  public function getRefreshToken($config)
  {
    // Check if we already have accessToken in Cache
    if ($this->refreshToken) {
      return $this->refreshToken;
    }
    // Check for persisted data first
    $token = AuthorizationCache::pull($config, $this->clientPrincipal);

    if ($token) {
      // We found it
      $this->tokenCreateTime = $token['tokenCreateTime'];
      $this->refreshExpiresIn = $token['refreshExpiresIn'];
      $this->refreshToken = $this->decrypt($token['refreshTokenEncrypted']);
    }

    // Check if Refresh Token is not null and has not expired.
    // The API returns expiry time as a relative time unit
    // We use a buffer time when checking for token expiry to account
    // for API call delays and any delay between the time the token is
    // retrieved and subsequently used
    if (
      $this->refreshToken != null &&
      (time() - $this->tokenCreateTime) > ($this->refreshExpiresIn - self::$expiryBufferTime)
    ) {
      $this->refreshToken = null;
    }


    // If accessToken is Null, obtain a new token
    if ($this->refreshToken == null) {
      // Get a new one by making calls to API
      $this->updateAccessToken($config);
      AuthorizationCache::push($config, $this->clientPrincipal, $this->encrypt($this->accessToken), $this->encrypt($this->refreshToken), $this->tokenCreateTime, $this->tokenExpiresIn, $this->refreshExpiresIn);
    }

    return $this->refreshToken;
  }

  /**
   * Updates Access Token based on given input
   *
   * @param array $config
   * @param string|null $refreshToken
   * @return string
   */
  public function updateAccessToken($config, $refreshToken = null)
  {
    $this->generateAccessToken($config, $refreshToken);
    return $this->accessToken;
  }

  /**
   * Retrieves the token based on the input configuration
   *
   * @param array $config
   * @param string $principal
   * @param string $credential
   * @param array $refreshToken
   * @return mixed
   * @throws EshipperConfigurationException
   * @throws \Eshipper\Exception\EshipperConnectionException
   */
  protected function getToken($config, $principal, $credential, $refreshToken = null)
  {
    $httpConfig = new EshipperHttpConfig(null, 'POST', $config);

    // if proxy set via config, add it
    if (!empty($config['http.Proxy'])) {
      $httpConfig->setHttpProxy($config['http.Proxy']);
    }

    if (!empty($refreshToken['refresh_token']))
    {
      $path = '/api/v2/refresh-token';
      $params = array(
        'refresh_token' => $refreshToken,
      );
    } else {
      $path = '/api/v2/authenticate';
      $params = array(
        'principal' => $principal,
        'credential' => $credential,
      );
    }

    $handlers = array(self::$AUTH_HANDLER);
    $payload = json_encode($params);

    /** @var IEshipperHandler $handler */
    foreach ($handlers as $handler) {
      if (!is_object($handler)) {
        $fullHandler = "\\" . (string)$handler;
        $handler = new $fullHandler(new ApiContext($this));
      }
      $handler->handle($httpConfig, $payload, array('path' => $path));
    }

    $connection = new EshipperHttpConnection($httpConfig, $config);
    $res = $connection->execute($payload);
    $response = json_decode($res, true);

    return $response;
  }


  /**
   * Generates a new access token
   *
   * @param array $config
   * @param null|string $refreshToken
   * @return null
   * @throws EshipperConnectionException
   */
  private function generateAccessToken($config, $refreshToken = null)
  {
    $params = array();
    if ($refreshToken != null) {
      $params['refresh_token'] = $refreshToken;
    }
    $response = $this->getToken($config, $this->clientPrincipal, $this->clientCredential, $params);

    if ($response == null || !isset($response["token"]) || !isset($response["expires_in"]) || !isset($response["refresh_token"])) {
      $this->accessToken = null;
      $this->tokenExpiresIn = null;
      $this->refreshToken = null;
      $this->refreshExpiresIn = null;
      EshipperLoggingManager::getInstance(__CLASS__)->warning("Could not generate new Access token. Invalid response from server: ");
      throw new EshipperConnectionException(null, "Could not generate new Access token. Invalid response from server: ");
    } else {
      $this->accessToken = $response["token"];
      $this->tokenExpiresIn = $response["expires_in"];
      $this->refreshToken = $response["refresh_token"];
      $this->refreshExpiresIn = $response["refresh_expires_in"];
    }
    $this->tokenCreateTime = time();

    return $this->accessToken;
  }

  /**
   * Helper method to encrypt data using clientSecret as key
   *
   * @param $data
   * @return string
   */
  public function encrypt($data)
  {
    return $this->cipher->encrypt($data);
  }

  /**
   * Helper method to decrypt data using clientSecret as key
   *
   * @param $data
   * @return string
   */
  public function decrypt($data)
  {
    return $this->cipher->decrypt($data);
  }

}