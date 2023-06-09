<?php

namespace Davidflypei\Eshipper\Model;

class LabelData extends \Davidflypei\Eshipper\Common\EshipperModel
{
  /**
   * @param $label
   * @return $this
   */
  public function setLabel($label)
  {
    $this->label = $label;
    return $this;
  }

  /**
   * @return \Davidflypei\Eshipper\Model\Label[]
   */
  public function getLabel()
  {
    return $this->label;
  }
}