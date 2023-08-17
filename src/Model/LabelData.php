<?php

namespace Greathobbies\Eshipper\Model;

class LabelData extends \Greathobbies\Eshipper\Common\EshipperModel
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
   * @return \Greathobbies\Eshipper\Model\Label[]
   */
  public function getLabel()
  {
    return $this->label;
  }
}