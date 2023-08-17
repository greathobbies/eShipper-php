<?php

namespace Greathobbies\Eshipper\Api;

use Greathobbies\Eshipper\Cache\AuthorizationCache;
use Greathobbies\Eshipper\Core\EshipperHttpConfig;
use Greathobbies\Eshipper\Core\EshipperHttpConnection;
use Greathobbies\Eshipper\Core\EshipperLoggingManager;
use Greathobbies\Eshipper\Exception\EshipperConfigurationException;
use Greathobbies\Eshipper\Exception\EshipperConnectionException;
use Greathobbies\Eshipper\Handler\IEshipperHandler;
use Greathobbies\Eshipper\Rest\ApiContext;
use Greathobbies\Eshipper\Security\Cipher;

class Register extends \Greathobbies\Eshipper\Common\EshipperResourceModel
{

  /**
   * @var string Default Auth Handler
   */
  public static $AUTH_HANDLER = 'Greathobbies\Eshipper\Handler\AuthHandler';

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