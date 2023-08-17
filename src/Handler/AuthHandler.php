<?php
/**
 * API handler for OAuth Token Request REST API calls
 */

namespace Greathobbies\Eshipper\Handler;

use Greathobbies\Eshipper\Common\EshipperUserAgent;
use Greathobbies\Eshipper\Core\EshipperConstants;
use Greathobbies\Eshipper\Core\EshipperHttpConfig;
use Greathobbies\Eshipper\Exception\EshipperConfigurationException;
use Greathobbies\Eshipper\Exception\EshipperInvalidCredentialException;
use Greathobbies\Eshipper\Exception\EshipperMissingCredentialException;

/**
 * Class OauthHandler
 */
class AuthHandler implements IEshipperHandler
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
    $config = $this->apiContext->getConfig();

    $httpConfig->setUrl(
      rtrim(trim($this->_getEndpoint($config)), '/') .
      (isset($options['path']) ? $options['path'] : '')
    );

    $headers = array(
      "User-Agent"    => EshipperUserAgent::getValue(EshipperConstants::SDK_NAME, EshipperConstants::SDK_VERSION),
      "Accept"        => "*/*",
      "Content-Type"  => "application/json"
    );
    $httpConfig->setHeaders($headers);

    // Add any additional Headers that they may have provided
    $headers = $this->apiContext->getRequestHeaders();
    foreach ($headers as $key => $value) {
      $httpConfig->addHeader($key, $value);
    }
  }

  /**
   * Get HttpConfiguration object for OAuth API
   *
   * @param array $config
   *
   * @return string
   * @throws \Eshipper\Exception\EshipperConfigurationException
   */
  private static function _getEndpoint($config)
  {
    if (isset($config['auth.EndPoint'])) {
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
