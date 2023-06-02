<?php

namespace Davidflypei\Eshipper\Model;

use Davidflypei\Eshipper\Common\EshipperModel;

class Package extends EshipperModel
{

  public function setHeight($height)
  {
    $this->height = $height;
    return $this;
  }

  public function getHeight()
  {
    return $this->height;
  }

  public function setLength($length)
  {
    $this->length = $length;
    return $this;
  }

  public function getLength()
  {
    return $this->length;
  }

  public function setWidth($width)
  {
    $this->width = $width;
    return $this;
  }

  public function getWidth()
  {
    return $this->width;
  }

  public function setDimensionUnit($dimensionUnit)
  {
    $this->dimensionUnit = $dimensionUnit;
    return $this;
  }

  public function getDimensionUnit()
  {
    return $this->dimensionUnit;
  }

  public function setWeight($weight)
  {
    $this->weight = $weight;
    return $this;
  }

  public function getWeight()
  {
    return $this->weight;
  }

  public function setWeightUnit($weightUnit)
  {
    $this->weightUnit = $weightUnit;
    return $this;
  }

  public function getWeightUnit()
  {
    return $this->weightUnit;
  }

  public function setType($type)
  {
    $this->type = $type;
    return $this;
  }

  public function getType()
  {
    return $this->type;
  }

  public function setFreightClass($freightClass)
  {
    $this->freightClass = $freightClass;
    return $this;
  }

  public function getFreightClass()
  {
    return $this->freightClass;
  }

  public function setNMFCCode($nMFCCode)
  {
    $this->nMFCCode = $nMFCCode;
    return $this;
  }

  public function getNMFCCode()
  {
    return $this->nMFCCode;
  }

  public function setInsuranceAmount($insuranceAmount)
  {
    $this->insuranceAmount = $insuranceAmount;
    return $this;
  }

  public function getInsuranceAmount()
  {
    return $this->insuranceAmount;
  }

  public function setCODAmount($cODAmount)
  {
    $this->cODAmount = $cODAmount;
    return $this;
  }

  public function getCODAmount()
  {
    return $this->cODAmount;
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

  public function setHarmonizedCode($harmonizedCode)
  {
    $this->harmonizedCode = $harmonizedCode;
    return $this;
  }

  public function getHarmonizedCode()
  {
    return $this->harmonizedCode;
  }

  public function setSKUCode($skuCode)
  {
    $this->skuCode = $skuCode;
    return $this;
  }

  public function getSKUCode()
  {
    return $this->skuCode;
  }

}