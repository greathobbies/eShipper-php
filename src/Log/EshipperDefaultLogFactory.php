<?php

namespace Davidflypei\Eshipper\Log;

use Psr\Log\LoggerInterface;

/**
 * Class EshipperDefaultLogFactory
 *
 * This factory is the default implementation of Log factory.
 *
 * @package Eshipper\Log
 */
class EshipperDefaultLogFactory implements EshipperLogFactory
{
  /**
   * Returns logger instance implementing LoggerInterface.
   *
   * @param string $className
   * @return LoggerInterface instance of logger object implementing LoggerInterface
   */
  public function getLogger($className)
  {
    return new EshipperLogger($className);
  }
}
