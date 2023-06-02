<?php

namespace Davidflypei\Eshipper\Transport;

use Davidflypei\Eshipper\Core\EshipperHttpConfig;
use Davidflypei\Eshipper\Core\EshipperHttpConnection;
use Davidflypei\Eshipper\Core\EshipperLoggingManager;
use Davidflypei\Eshipper\Rest\ApiContext;

class EshipperRestCall
{
  private $logger;
  private $apiContext;

  public function __construct(ApiContext $apiContext)
  {
    $this->apiContext = $apiContext;
    $this->logger = EshipperLoggingManager::getInstance(__CLASS__);
  }

  public function execute($handlers = array(), $path, $method, $data = '', $headers = array())
  {
    $config = $this->apiContext->getConfig();
    $httpConfig = new EshipperHttpConfig(null, $method, $config);
    $headers = $headers ? $headers : array();
    $httpConfig->setHeaders($headers +
                            array(
                              'Content-Type' => 'application/json'
                            )
    );

    // if proxy set via config, add it
    if (!empty($config['http.Proxy'])) {
      $httpConfig->setHttpProxy($config['http.Proxy']);
    }

    /** @var \Eshipper\Handler\IEshipperHandler $handler */
    foreach ($handlers as $handler) {
      if (!is_object($handler)) {
        $fullHandler = "\\" . (string)$handler;
        $handler = new $fullHandler($this->apiContext);
      }
      $handler->handle($httpConfig, $data, array('path' => $path, 'apiContext' => $this->apiContext));
    }
    $connection = new EshipperHttpConnection($httpConfig, $config);
    $response = $connection->execute($data);

    return $response;
  }
}