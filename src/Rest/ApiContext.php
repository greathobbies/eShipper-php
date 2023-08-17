<?php

namespace Greathobbies\Eshipper\Rest;

use Greathobbies\Eshipper\Core\EshipperConfigManager;
use Greathobbies\Eshipper\Core\EshipperCredentialManager;

class ApiContext
{
  private $requestId;

  private $credential;

  public function __construct($credential = null, $requestId = null)
  {
    $this->requestId = $requestId;
    $this->credential = $credential;
  }

  public function getCredential()
  {
    if ($this->credential == null) {
      return EshipperCredentialManager::getInstance()->getCredentialObject();
    }
    return $this->credential;
  }

  public function getRequestHeaders()
  {
    $result = EshipperConfigManager::getInstance()->get('http.headers');
    $headers = array();
    foreach ($result as $header => $value) {
      $headerName = ltrim($header, 'http.headers');
      $headers[$headerName] = $value;
    }
    return $headers;
  }

  public function addRequestHeader($name, $value)
  {
    // Determine if the name already has a 'http.headers' prefix. If not, add one.
    if (!(substr($name, 0, strlen('http.headers')) === 'http.headers')) {
      $name = 'http.headers.' . $name;
    }
    EshipperConfigManager::getInstance()->addConfigs(array($name => $value));
  }

  public function getRequestId()
  {
    return $this->requestId;
  }

  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }

  public function resetRequestId()
  {
    $this->requestId = $this->generateRequestId();
    return $this->getRequestId();
  }

  public function setConfig(array $config)
  {
    EshipperConfigManager::getInstance()->addConfigs($config);
  }

  public function getConfig()
  {
    return EshipperConfigManager::getInstance()->getConfigHashmap();
  }

  public function get($searchKey)
  {
    return EshipperConfigManager::getInstance()->get($searchKey);
  }

  private function generateRequestId()
  {
    static $pid = -1;
    static $addr = -1;

    if ($pid == -1) {
      $pid = getmypid();
    }

    if ($addr == -1) {
      if (array_key_exists('SERVER_ADDR', $_SERVER)) {
        $addr = ip2long($_SERVER['SERVER_ADDR']);
      } else {
        $addr = php_uname('n');
      }
    }

    return $addr . $pid . $_SERVER['REQUEST_TIME'] . mt_rand(0, 0xffff);
  }
}