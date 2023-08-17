<?php

namespace Greathobbies\Eshipper\Model;

class Surcharge extends \Greathobbies\Eshipper\Common\EshipperModel
{

  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setAmount($amount)
  {
    $this->amount = $amount;
    return $this;
  }

  public function getAmount()
  {
    return $this->amount;
  }

}