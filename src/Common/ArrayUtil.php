<?php

namespace Davidflypei\Eshipper\Common;

class ArrayUtil
{
  public static function isAssocArray(array $arr)
  {
    foreach ($arr as $k => $v) {
      if (is_int($k)) {
        return false;
      }
    }
    return true;
  }
}