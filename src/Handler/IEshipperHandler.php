<?php

namespace Davidflypei\Eshipper\Handler;

/**
 * Interface IEshipperHandler
 *
 * @package Eshipper\Handler
 */
interface IEshipperHandler
{
  /**
   *
   * @param \Eshipper\Core\EshipperHttpConfig $httpConfig
   * @param string $request
   * @param mixed $options
   * @return mixed
   */
  public function handle($httpConfig, $request, $options);
}
