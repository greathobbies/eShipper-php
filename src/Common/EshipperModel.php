<?php

namespace Greathobbies\Eshipper\Common;

use Greathobbies\Eshipper\Model;

use Greathobbies\Eshipper\Auth\AuthTokenCredential;

/**
 * Generic Model class that all other classes extend
 */
class EshipperModel {

  private $_propMap = array();

  /**
   * @var AuthTokenCredential $credential
   */
  protected static $credential;

  /**
   * @param $credential
   * @return void
   */
  public static function setCredential($credential) {
    self::$credential = $credential;
  }

  public function __construct($data = null) {
    switch (gettype($data)) {
      case "NULL":
        break;
      case "string":
        $this->fromJson($data);
        break;
      case "array":
        $this->fromArray($data);
        break;
      default:
    }
  }

  public static function getList($data){
    // Return Null if Null
    if ($data === null) {
      return null;
    }

    if (is_a($data, get_class(new \stdClass()))) {
      //This means, root element is object
      return new static(json_encode($data));
    }

    $list = array();

    if (is_array($data)) {
      $data = json_encode($data);
    }

    if (JsonValidator::validate($data)) {
      // It is valid JSON
      $decoded = json_decode($data);
      if ($decoded === null) {
        return $list;
      }
      if (is_array($decoded)) {
        foreach ($decoded as $k => $v) {
          $list[] = self::getList($v);
        }
      }
      if (is_a($decoded, get_class(new \stdClass()))) {
        //This means, root element is object
        $list[] = new static(json_encode($decoded));
      }
    }

    return $list;
  }

  public function __get($key) {
    if ($this->__isset($key)) {
      return $this->_propMap[$key];
    }
    return null;
  }

  public function __set($key, $value)
  {
    if (!is_array($value) && $value === null) {
      $this->__unset($key);
    } else {
      $this->_propMap[$key] = $value;
    }
  }

  public function __unset($key)
  {
    unset($this->_propMap[$key]);
  }

  public function __isset($key)
  {
    return isset($this->_propMap[$key]);
  }

  private function convertToCamelCase($key)
  {
    return str_replace(' ', '', ucwords(str_replace(array('_', '-'), ' ', $key)));
  }

  private function _convertToArray($param)
  {
    $ret = array();
    foreach ($param as $k => $v) {
      if ($v instanceof EshipperModel) {
        $ret[$k] = $v->toArray();
      } elseif (is_array($v) && sizeof($v) <= 0) {
        $ret[$k] = array();
      } elseif (is_array($v)) {
        $ret[$k] = $this->_convertToArray($v);
      } else {
        $ret[$k] = $v;
      }
    }
    // If the array is empty, which means an empty object,
    // we need to convert array to StdClass object to properly
    // represent JSON String
    if (sizeof($ret) <= 0) {
      $ret = new EshipperModel();
    }
    return $ret;
  }

  public function fromArray($arr)
  {
    if (!empty($arr)) {
      // Iterate over each element in array
      foreach ($arr as $k => $v) {
        // If the value is an array, it means, it is an object after conversion
        if (is_array($v)) {
          // Determine the class of the object
          if (($clazz = ReflectionUtil::getPropertyClass(get_class($this), $k)) != null) {
            // If the value is an associative array, it means, its an object. Just make recursive call to it.
            if (empty($v)) {
              if (ReflectionUtil::isPropertyClassArray(get_class($this), $k)) {
                // It means, it is an array of objects.
                $this->assignValue($k, array());
                continue;
              }
              $o = new $clazz();
              //$arr = array();
              $this->assignValue($k, $o);
            } elseif (ArrayUtil::isAssocArray($v)) {
              /** @var self $o */
              $o = new $clazz();
              $o->fromArray($v);
              $this->assignValue($k, $o);
            } else {
              // Else, value is an array of object/data
              $arr = array();
              // Iterate through each element in that array.
              foreach ($v as $nk => $nv) {
                if (is_array($nv)) {
                  $o = new $clazz();
                  $o->fromArray($nv);
                  $arr[$nk] = $o;
                } else {
                  $arr[$nk] = $nv;
                }
              }
              $this->assignValue($k, $arr);
            }
          } else {
            $this->assignValue($k, $v);
          }
        } else {
          $this->assignValue($k, $v);
        }
      }
    }
    return $this;
  }

  private function assignValue($key, $value)
  {
    $setter = 'set'. $this->convertToCamelCase($key);
    // If we find the setter, use that, otherwise use magic method.
    if (method_exists($this, $setter)) {
      $this->$setter($value);
    } else {
      $this->__set($key, $value);
    }
  }
  public function fromJson($json)
  {
    return $this->fromArray(json_decode($json, true));
  }

  public function toArray()
  {
    return $this->_convertToArray($this->_propMap);
  }

  public function toJSON($options = 0)
  {
    return json_encode($this->toArray(), $options | 64);
  }

  /**
   * Magic Method for toString
   *
   * @return string
   */
  public function __toString()
  {
    return $this->toJSON(128);
  }
}