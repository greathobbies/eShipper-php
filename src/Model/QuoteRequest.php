<?php

namespace Davidflypei\Eshipper\Model;

use Davidflypei\Eshipper\Common\EshipperModel;

class QuoteRequest extends EshipperModel
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

  public function setReference($reference)
  {
    $this->reference = $reference;
    return $this;
  }

  public function getReference()
  {
    return $this->reference;
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

  public function setCustomsInfomation($customsInfomation)
  {
    $this->customsInfomation = $customsInfomation;
    return $this;
  }

  public function getCustomsInfomation()
  {
    return $this->customsInfomation;
  }

  public function setCustomsInBondFreight($customsInBondFreight)
  {
    $this->customsInBondFreight = $customsInBondFreight;
    return $this;
  }

  public function getCustomsInBondFreight()
  {
    return $this->customsInBondFreight;
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
}