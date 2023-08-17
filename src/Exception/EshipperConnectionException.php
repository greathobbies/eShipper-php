<?php

namespace Greathobbies\Eshipper\Exception;

class EshipperConnectionException extends \Exception
{
  private $url;

  /**
   * Any response data that was returned by the server
   *
   * @var string
   */
  private $data;

  /**
   * Default Constructor
   *
   * @param string $url
   * @param string    $message
   * @param int    $code
   */
  public function __construct($url, $message, $code = 0)
  {
    parent::__construct($message, $code);
    $this->url = $url;
  }

  /**
   * Sets Data
   *
   * @param $data
   */
  public function setData($data)
  {
    if (!is_array($data)) {
      $data = json_decode($data, true);
    }
    $this->data = $data;
  }

  /**
   * Gets Data
   *
   * @return string
   */
  public function getData()
  {
    return $this->data;
  }

  /**
   * Gets Url
   *
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}