<?php

namespace Greathobbies\Eshipper\Exception;

class EshipperConfigurationException extends \Exception
{
  public function __construct($message = null, $code = 0)
  {
    parent::__construct($message, $code);
  }
}