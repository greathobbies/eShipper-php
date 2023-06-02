<?php

namespace Davidflypei\Eshipper\Core;

class EshipperConfigManager
{

  private $configs = array(
  );

  private static $instance;

  private function __construct()
  {
    if (defined('ES_CONFIG_PATH')) {
      $configFile = constant('ES_CONFIG_PATH') . '/sdk_config.ini';
    } else {
      $configFile = implode(DIRECTORY_SEPARATOR,
                            array(dirname(__FILE__), "..", "config", "sdk_config.ini"));
    }
    if (file_exists($configFile)) {
      $this->addConfigFromIni($configFile);
    }
  }

  public static function getInstance()
  {
    if (!isset(self::$instance)) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function addConfigFromIni($fileName)
  {
    if ($configs = parse_ini_file($fileName)) {
      $this->addConfigs($configs);
    }
    return $this;
  }

  public function addConfigs($configs = array())
  {
    $this->configs = $configs + $this->configs;
    return $this;
  }

  public function get($searchKey)
  {
    if (array_key_exists($searchKey, $this->configs)) {
      return $this->configs[$searchKey];
    } else {
      $arr = array();
      if ($searchKey !== '') {
        foreach ($this->configs as $k => $v) {
          if (strstr($k, $searchKey)) {
            $arr[$k] = $v;
          }
        }
      }

      return $arr;
    }
  }

  public function getIniPrefix($userId = null)
  {
    if ($userId == null) {
      $arr = array();
      foreach ($this->configs as $key => $value) {
        $pos = strpos($key, '.');
        if (strstr($key, "acct")) {
          $arr[] = substr($key, 0, $pos);
        }
      }
      return array_unique($arr);
    } else {
      $iniPrefix = array_search($userId, $this->configs);
      $pos = strpos($iniPrefix, '.');
      $acct = substr($iniPrefix, 0, $pos);

      return $acct;
    }
  }

  public function getConfigHashmap()
  {
    return $this->configs;
  }

  public function __clone()
  {
    trigger_error('Clone is not allowed.', E_USER_ERROR);
  }
}