<?php

namespace Davidflypei\Eshipper\Model;

class ShippingRequest extends \Davidflypei\Eshipper\Common\EshipperModel
{

  public function setScheduledShipDate($scheduledShipDate)
  {
    $this->scheduledShipDate = $scheduledShipDate;
    return $this;
  }

  public function getScheduledShipDate()
  {
    return $this->scheduledShipDate;
  }

  public function setShipFromAddress($shipFromAddress)
  {
    $this->from = $shipFromAddress;
    return $this;
  }

  public function getShipFromAddress()
  {
    return $this->from;
  }

  public function setShipToAddress($shipToAddress)
  {
    $this->to = $shipToAddress;
    return $this;
  }

  public function getShipToAddress()
  {
    return $this->to;
  }

  public function setPackagingUnit($packagingUnit)
  {
    $this->packagingUnit = $packagingUnit;
    return $this;
  }

  public function getPackagingUnit()
  {
    return $this->packagingUnit;
  }

  public function setPackages($packages)
  {
    $this->packages = $packages;
    return $this;
  }

  public function getPackages()
  {
    return $this->packages;
  }

  public function setReference1($reference)
  {
    $this->reference1 = $reference;
    return $this;
  }

  public function getReference1()
  {
    return $this->reference1;
  }

  public function setReference2($reference)
  {
    $this->reference2 = $reference;
    return $this;
  }

  public function getReference2()
  {
    return $this->reference2;
  }

  public function setReference3($reference)
  {
    $this->reference3 = $reference;
    return $this;
  }

  public function getReference3()
  {
    return $this->reference3;
  }

  public function setSignatureRequired($signatureRequired)
  {
    $this->signatureRequired = $signatureRequired;
    return $this;
  }

  public function getSignatureRequired()
  {
    return $this->signatureRequired;
  }

  public function setInsuranceType($insuranceType)
  {
    $this->insuranceType = $insuranceType;
    return $this;
  }

  public function getInsuranceType()
  {
    return $this->insuranceType;
  }

  public function setDangerousGoodsType($dangerousGoodsType)
  {
    $this->dangerousGoodsType = $dangerousGoodsType;
    return $this;
  }

  public function getDangerousGoodsType()
  {
    return $this->dangerousGoodsType;
  }

  public function setPickupRequest($pickupRequest)
  {
    $this->pickupRequest = $pickupRequest;
    return $this;
  }

  public function getPickupRequest()
  {
    return $this->pickupRequest;
  }

  public function setCustomsInformation($customsInformation)
  {
    $this->customsInformation = $customsInformation;
    return $this;
  }

  public function getCustomsInformation()
  {
    return $this->customsInformation;
  }


  public function setSaturdayService($saturdayService)
  {
    $this->saturdayService = $saturdayService;
    return $this;
  }

  public function getSaturdayService()
  {
    return $this->saturdayService;
  }

  public function setHoldForPickup($holdForPickup)
  {
    $this->holdForPickupRequired = $holdForPickup;
    return $this;
  }

  public function getHoldForPickup()
  {
    return $this->holdForPickupRequired;
  }

  public function setSpecialEquipment($specialEquipment)
  {
    $this->specialEquipment = $specialEquipment;
    return $this;
  }

  public function getSpecialEquipment()
  {
    return $this->specialEquipment;
  }

  public function setInsideDelivery($insideDelivery)
  {
    $this->insideDelivery = $insideDelivery;
    return $this;
  }

  public function getInsideDelivery()
  {
    return $this->insideDelivery;
  }

  public function setDeliveryAppointment($deliveryAppointment)
  {
    $this->deliveryAppointment = $deliveryAppointment;
    return $this;
  }

  public function getDeliveryAppointment()
  {
    return $this->deliveryAppointment;
  }

  public function setInsidePickup($insidePickup)
  {
    $this->insidePickup = $insidePickup;
    return $this;
  }

  public function getInsidePickup()
  {
    return $this->insidePickup;
  }

  public function setSaturdayPickupRequired($saturdayPickupRequired)
  {
    $this->saturdayPickupRequired = $saturdayPickupRequired;
    return $this;
  }

  public function getSaturdayPickupRequired()
  {
    return $this->saturdayPickupRequired;
  }

  public function setStackable($stackable)
  {
    $this->stackable = $stackable;
    return $this;
  }

  public function getStackable()
  {
    return $this->stackable;
  }

  public function setServiceId($serviceId)
  {
    $this->serviceId = $serviceId;
    return $this;
  }

  public function getServiceId()
  {
    return $this->serviceId;
  }

  public function setCOD($cod)
  {
    $this->cod = $cod;
    return $this;
  }

  public function getCOD()
  {
    return $this->cod;
  }

}