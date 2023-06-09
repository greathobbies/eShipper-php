<?php

namespace Davidflypei\Eshipper\Model;

use Davidflypei\Eshipper\Common\EshipperModel;

class Label extends EshipperModel
{
  /**
   * @param $type
   * @return $this
   */
  public function setType($type)
  {
    $this->type = $type;
    return $this;
  }

  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * @param $data
   * @return $this
   */
  public function setData($data)
  {
    $this->data = $data;
    return $this;
  }

  /**
   * @return string
   */
  public function getData()
  {
    return $this->data;
  }
}