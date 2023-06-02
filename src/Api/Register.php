<?php

namespace Davidflypei\Eshipper\Api;

use Davidflypei\Eshipper\Cache\AuthorizationCache;
use Davidflypei\Eshipper\Core\EshipperHttpConfig;
use Davidflypei\Eshipper\Core\EshipperHttpConnection;
use Davidflypei\Eshipper\Core\EshipperLoggingManager;
use Davidflypei\Eshipper\Exception\EshipperConfigurationException;
use Davidflypei\Eshipper\Exception\EshipperConnectionException;
use Davidflypei\Eshipper\Handler\IEshipperHandler;
use Davidflypei\Eshipper\Rest\ApiContext;
use Davidflypei\Eshipper\Security\Cipher;

class Register extends \Davidflypei\Eshipper\Common\EshipperResourceModel
{

  /**
   * @var string Default Auth Handler
   */
  public static $AUTH_HANDLER = 'Davidflypei\Eshipper\Handler\AuthHandler';

  public function register($accountDetails, $companyDetails, $promoCode = null, $apiContext = null, $restCall = null)
  {
    $config = $apiContext->getConfig();
    $httpConfig = new EshipperHttpConfig(null, 'POST', $config);
    $params = array(
      'accountDetails' => $accountDetails->toArray(),
      'companyDetails' => $companyDetails->toArray(),
      'promoCode' => $promoCode
    );
    $payload = json_encode($params);

    // if proxy set via config, add it
    if (!empty($config['http.Proxy'])) {
      $httpConfig->setHttpProxy($config['http.Proxy']);
    }

    $handlers = array(self::$AUTH_HANDLER);

    /** @var IEshipperHandler $handler */
    foreach ($handlers as $handler) {
      if (!is_object($handler)) {
        $fullHandler = "\\" . (string)$handler;
        $handler = new $fullHandler(new ApiContext($this));
      }
      $handler->handle($httpConfig, $payload, array('path' => '/api/v2/register'));
    }

    $connection = new EshipperHttpConnection($httpConfig, $config);
    $res = $connection->execute($payload);
    $response = json_decode($res, true);

    return $response;
  }
}