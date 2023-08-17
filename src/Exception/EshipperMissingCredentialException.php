<?php

namespace Greathobbies\Eshipper\Exception;

/**
 * Class EshipperMissingCredentialException
 *
 * @package Eshipper\Exception
 */
class EshipperMissingCredentialException extends \Exception
{

  /**
   * Default Constructor
   *
   * @param string $message
   * @param int  $code
   */
  public function __construct($message = null, $code = 0)
  {
    parent::__construct($message, $code);
  }

  /**
   * prints error message
   *
   * @return string
   */
  public function errorMessage()
  {
    $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
      . ': <b>' . $this->getMessage() . '</b>';

    return $errorMsg;
  }
}
