<?php

namespace Davidflypei\Eshipper\Core;

use Davidflypei\Eshipper\Log\EshipperLogFactory;
use Davidflypei\Eshipper\Log\EshipperDefaultLogFactory;
use Psr\Log\LoggerInterface;
use Davidflypei\Eshipper\Core\EshipperConfigManager;

class EshipperLoggingManager
{
  private static $instances = array();
  private $logger;
  private $loggerName;

  public static function getInstance($loggerName = __CLASS__)
  {
    if (array_key_exists($loggerName, EshipperLoggingManager::$instances)) {
      return EshipperLoggingManager::$instances[$loggerName];
    }
    $instance = new self($loggerName);
    EshipperLoggingManager::$instances[$loggerName] = $instance;
    return $instance;
  }

  private function __construct($loggerName)
  {
    $config = EshipperConfigManager::getInstance()->getConfigHashmap();
    // Checks if custom factory defined, and is it an implementation of @EshipperLogFactory
    $factory = array_key_exists('log.AdapterFactory', $config) && in_array('\Davidflypei\Eshipper\Log\EshipperLogFactory', class_implements($config['log.AdapterFactory'])) ? $config['log.AdapterFactory'] : '\Davidflypei\Eshipper\Log\EshipperDefaultLogFactory';
    /** @var EshipperLogFactory $factoryInstance */
    $factoryInstance = new $factory();
    $this->logger = $factoryInstance->getLogger($loggerName);
    $this->loggerName = $loggerName;
  }

  public function error($message)
  {
    $this->logger->error($message);
  }

  public function warning($message)
  {
    $this->logger->warning($message);
  }

  public function info($message)
  {
    $this->logger->info($message);
  }

  public function fine($message)
  {
    $this->info($message);
  }

  public function debug($message)
  {
    $config = EshipperConfigManager::getInstance()->getConfigHashmap();
    // Disable debug in live mode.
    if (array_key_exists('mode', $config) && $config['mode'] != 'live') {
      $this->logger->debug($message);
    }
  }
}