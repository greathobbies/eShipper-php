<?php

namespace Davidflypei\Eshipper\Model;

use Davidflypei\Eshipper\Common\EshipperModel;

class Item extends EshipperModel
{

  public function setHsnCode($hsnCode)
  {
    $this->hsnCode = $hsnCode;
    return $this;
  }

  public function getHsnCode()
  {
    return $this->hsnCode;
  }

  public function setDescription($description)
  {
    $this->description = $description;
    return $this;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setOriginCountry($originCountry)
  {
    $this->originCountry = $originCountry;
    return $this;
  }

  public function getOriginCountry()
  {
    return $this->originCountry;
  }

  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
    return $this;
  }

  public function getQuantity()
  {
    return $this->quantity;
  }

  public function setUnitPrice($unitPrice)
  {
    $this->unitPrice = $unitPrice;
    return $this;
  }

  public function getUnitPrice()
  {
    return $this->unitPrice;
  }

  public function setSkuCode($skuCode)
  {
    $this->skuCode = $skuCode;
    return $this;
  }

  public function getSkuCode()
  {
    return $this->skuCode;
  }
}