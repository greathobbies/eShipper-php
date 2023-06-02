<?php
/**
 * API handler for all REST API calls
 */

namespace Davidflypei\Eshipper\Handler;

use Davidflypei\Eshipper\Auth\AuthTokenCredential;
use Davidflypei\Eshipper\Common\EshipperUserAgent;
use Davidflypei\Eshipper\Core\EshipperConstants;
use Davidflypei\Eshipper\Core\EshipperCredentialManager;
use Davidflypei\Eshipper\Core\EshipperHttpConfig;
use Davidflypei\Eshipper\Exception\EshipperConfigurationException;
use Davidflypei\Eshipper\Exception\EshipperInvalidCredentialException;
use Davidflypei\Eshipper\Exception\EshipperMissingCredentialException;

/**
 * Class RestHandler
 */
class RestHandler implements IEshipperHandler
{
  /**
   * Private Variable
   *
   * @var \Eshipper\Rest\ApiContext $apiContext
   */
  private $apiContext;

  /**
   * Construct
   *
   * @param \Eshipper\Rest\ApiContext $apiContext
   */
  public function __construct($apiContext)
  {
    $this->apiContext = $apiContext;
  }

  /**
   * @param EshipperHttpConfig $httpConfig
   * @param string                    $request
   * @param mixed                     $options
   * @return mixed|void
   * @throws EshipperConfigurationException
   * @throws EshipperInvalidCredentialException
   * @throws EshipperMissingCredentialException
   */
  public function handle($httpConfig, $request, $options)
  {
    $credential = $this->apiContext->getCredential();
    $config = $this->apiContext->getConfig();

    if ($credential == null) {
      // Try picking credentials from the config file
      $credMgr = EshipperCredentialManager::getInstance($config);
      $credValues = $credMgr->getCredentialObject();

      if (!is_array($credValues)) {
        throw new EshipperMissingCredentialException("Empty or invalid credentials passed");
      }

      $credential = new AuthTokenCredential($credValues['clientId'], $credValues['clientSecret']);
    }

    if ($credential == null || !($credential instanceof AuthTokenCredential)) {
      throw new EshipperInvalidCredentialException("Invalid credentials passed");
    }

    $httpConfig->setUrl(
      rtrim(trim($this->_getEndpoint($config)), '/') .
      (isset($options['path']) ? $options['path'] : '')
    );

    // Overwrite Expect Header to disable 100 Continue Issue
    $httpConfig->addHeader("Expect", null);

    if (!array_key_exists("User-Agent", $httpConfig->getHeaders())) {
      $httpConfig->addHeader("User-Agent", EshipperUserAgent::getValue(EshipperConstants::SDK_NAME, EshipperConstants::SDK_VERSION));
    }

    if (!array_key_exists("Content-Type", $httpConfig->getHeaders())) {
      $httpConfig->addHeader("Content-Type", "application/json");
    }

    if (!is_null($credential) && $credential instanceof AuthTokenCredential && is_null($httpConfig->getHeader('Authorization'))) {
      $httpConfig->addHeader('Authorization', "Bearer " . $credential->getAccessToken($config), false);
    }

    if (($httpConfig->getMethod() == 'POST' || $httpConfig->getMethod() == 'PUT') && !is_null($this->apiContext->getRequestId())) {
      $httpConfig->addHeader('Eshipper-Request-Id', $this->apiContext->getRequestId());
    }
    // Add any additional Headers that they may have provided
    $headers = $this->apiContext->getRequestHeaders();
    foreach ($headers as $key => $value) {
      $httpConfig->addHeader($key, $value);
    }
  }

  /**
   * End Point
   *
   * @param array $config
   *
   * @return string
   * @throws \Eshipper\Exception\EshipperConfigurationException
   */
  private function _getEndpoint($config)
  {
    if (isset($config['service.EndPoint'])) {
      $endpointHost = $config['service.EndPoint'];
    } elseif (isset($config['auth.EndPoint'])) {
      $endpointHost = $config['auth.EndPoint'];
    } elseif (isset($config['service.EndPoint'])) {
      $endpointHost = $config['service.EndPoint'];
    } elseif (isset($config['mode'])) {
      switch (strtoupper($config['mode'])) {
        case 'SANDBOX':
          $endpointHost = EshipperConstants::REST_SANDBOX_ENDPOINT;
          break;
        case 'LIVE':
          $endpointHost = EshipperConstants::REST_LIVE_ENDPOINT;
          break;
        default:
          throw new EshipperConfigurationException('The mode config parameter must be set to either sandbox/live');
      }
    } else {
      $endpointHost = EshipperConstants::REST_SANDBOX_ENDPOINT;
    }

    return rtrim(trim($endpointHost), '/');
  }
}
