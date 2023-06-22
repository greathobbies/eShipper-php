<?php

namespace Davidflypei\Eshipper\Model;

use Davidflypei\Eshipper\Common\EshipperModel;

class Quote extends EshipperModel
{

  /**
   * @param $carrierName
   * @return $this
   */
  public function setCarrierName($carrierName)
  {
    $this->carrierName = $carrierName;
    return $this;
  }

  /**
   * @return string
   */
  public function getCarrierName()
  {
    return $this->carrierName;
  }

  /**
   * @param $serviceID
   * @return $this
   */
  public function setServiceID($serviceID)
  {
    $this->serviceID = $serviceID;
    return $this;
  }

  /**
   * @return int
   */
  public function getServiceID()
  {
    return $this->serviceID;
  }

  /**
   * @param $serviceName
   * @return $this
   */
  public function setServiceName($serviceName)
  {
    $this->serviceName = $serviceName;
    return $this;
  }

  /**
   * @return string
   */
  public function getServiceName()
  {
    return $this->serviceName;
  }

  /**
   * @return $this
   */
  public function setModeTransport($modeTransport)
  {
    $this->modeTransport = $modeTransport;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getModeTransport()
  {
    return $this->modeTransport;
  }

  /**
   * @param $transitDays
   * @return $this
   */
  public function setTransitDays($transitDays)
  {
    $this->transitDays = $transitDays;
    return $this;
  }

  /**
   * @return string
   */
  public function getTransitDays()
  {
    return $this->transitDays;
  }

  /**
   * @param $baseCharge
   * @return $this
   */
  public function setBaseCharge($baseCharge)
  {
    $this->baseCharge = $baseCharge;
    return $this;
  }

  /**
   * @return double
   */
  public function getBaseCharge()
  {
    return $this->baseCharge;
  }

  /**
   * @param $fuelSurcharge
   * @return $this
   */
  public function setFuelSurcharge($fuelSurcharge)
  {
    $this->fuelSurcharge = $fuelSurcharge;
    return $this;
  }

  /**
   * @return double
   */
  public function getFuelSurcharge()
  {
    return $this->fuelSurcharge;
  }

  /**
   * @param $fuelSurchargePercentage
   * @return $this
   */
  public function setFuelSurchargePercentage($fuelSurchargePercentage)
  {
    $this->fuelSurchargePercentage = $fuelSurchargePercentage;
    return $this;
  }

  /**
   * @return double
   */
  public function getFuelSurchargePercentage()
  {
    return $this->fuelSurchargePercentage;
  }

  /**
   * @param $surcharges
   * @return $this
   */
  public function setSurcharges($surcharges)
  {
    $this->surcharges = $surcharges;
    return $this;
  }

  /**
   * @return \Davidflypei\Eshipper\Model\Surcharge
   */
  public function getSurcharges()
  {
    return $this->surcharges;
  }

  /**
   * @param $totalCharge
   * @return $this
   */
  public function setTotalCharge($totalCharge)
  {
    $this->totalCharge = $totalCharge;
    return $this;
  }

  /**
   * @return double
   */
  public function getTotalCharge()
  {
    return $this->totalCharge;
  }

  /**
   * @param $processingFees
   * @return $this
   */
  public function setProcessingFees($processingFees)
  {
    $this->processingFees = $processingFees;
    return $this;
  }

  /**
   * @return double
   */
  public function getProcessingFees()
  {
    return $this->processingFees;
  }

  /**
   * @param $taxes
   * @return $this
   */
  public function setTaxes($taxes)
  {
    $this->taxes = $taxes;
    return $this;
  }

  /**
   * @return \Davidflypei\Eshipper\Model\Surcharge
   */
  public function getTaxes()
  {
    return $this->taxes;
  }

  /**
   * @param $totalChargedAmount
   * @return $this
   */
  public function setTotalChargedAmount($totalChargedAmount)
  {
    $this->totalChargedAmount = $totalChargedAmount;
    return $this;
  }

  /**
   * @return double
   */
  public function getTotalChargedAmount()
  {
    return $this->totalChargedAmount;
  }

  /**
   * @param $currency
   * @return $this
   */
  public function setCurrency($currency)
  {
    $this->currency = $currency;
    return $this;
  }

  /**
   * @return string
   */
  public function getCurrency()
  {
    return $this->currency;
  }

}