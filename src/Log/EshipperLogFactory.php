<?php

namespace Greathobbies\Eshipper\Log;

use Psr\Log\LoggerInterface;

interface EshipperLogFactory
{
  /**
   * Returns logger instance implementing LoggerInterface.
   *
   * @param string $className
   * @return LoggerInterface instance of logger object implementing LoggerInterface
   */
  public function getLogger($className);
}