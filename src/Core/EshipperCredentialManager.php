<?php

namespace Davidflypei\Eshipper\Core;

use Davidflypei\Eshipper\Auth\AuthTokenCredential;
use Davidflypei\Eshipper\Exception\EshipperInvalidCredentialException;

class EshipperCredentialManager
{

  private static $instance;

  private $credentialHashmap = array();

  private $defaultAccountName;

  private function __construct($config)
  {
    try {
      $this->initCredential($config);
    } catch (\Exception $e) {
      $this->credentialHashmap = array();
      throw $e;
    }
  }

  public static function getInstance($config = null)
  {
    if (!self::$instance) {
      self::$instance = new self($config == null ? EshipperConfigManager::getInstance()->getConfigHashmap() : $config);
    }
    return self::$instance;
  }

  private function initCredential($config)
  {
    $suffix = 1;
    $prefix = "acct";

    $arr = array();
    foreach ($config as $k => $v) {
      if (strstr($k, $prefix)) {
        $arr[$k] = $v;
      }
    }
    $credArr = $arr;

    $arr = array();
    foreach ($config as $key => $value) {
      $pos = strpos($key, '.');
      if (strstr($key, "acct")) {
        $arr[] = substr($key, 0, $pos);
      }
    }
    $arrayPartKeys = array_unique($arr);

    $key = $prefix . $suffix;
    $userName = null;
    while (in_array($key, $arrayPartKeys)) {
      if (isset($credArr[$key . ".ClientId"]) && isset($credArr[$key . ".ClientSecret"])) {
        $userName = $key;
        $this->credentialHashmap[$userName] = new AuthTokenCredential(
          $credArr[$key . ".ClientId"],
          $credArr[$key . ".ClientSecret"]
        );
      }
      if ($userName && $this->defaultAccountName == null) {
        if (array_key_exists($key . '.UserName', $credArr)) {
          $this->defaultAccountName = $credArr[$key . '.UserName'];
        } else {
          $this->defaultAccountName = $key;
        }
      }
      $suffix++;
      $key = $prefix . $suffix;
    }
  }

  public function setCredentialObject(AuthTokenCredential $credential, $userId = null, $default = true)
  {
    $key = $userId == null ? 'default' : $userId;
    $this->credentialHashmap[$key] = $credential;
    if ($default) {
      $this->defaultAccountName = $key;
    }
    return $this;
  }

  public function getCredentialObject($userId = null)
  {
    if ($userId == null && array_key_exists($this->defaultAccountName, $this->credentialHashmap)) {
      $credObj = $this->credentialHashmap[$this->defaultAccountName];
    } elseif (array_key_exists($userId, $this->credentialHashmap)) {
      $credObj = $this->credentialHashmap[$userId];
    }

    if (empty($credObj)) {
      throw new EshipperInvalidCredentialException("Credential not found for " .  ($userId ? $userId : " default user") .
                                                 ". Please make sure your configuration/APIContext has credential information");
    }
    return $credObj;
  }

  public function __clone()
  {
    trigger_error('Clone is not allowed.', E_USER_ERROR);
  }

}