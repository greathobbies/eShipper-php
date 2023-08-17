<?php

namespace Greathobbies\Eshipper\Model;

use Greathobbies\Eshipper\Common\EshipperModel;

class PickupRequest extends EshipperModel
{

  public function setContactName($contactName)
  {
    $this->contactName = $contactName;
    return $this;
  }

  public function getContactName()
  {
    return $this->contactName;
  }

  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
    return $this;
  }

  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }

  public function setPickupDate($pickupDate)
  {
    $this->pickupDate = $pickupDate;
    return $this;
  }

  public function getPickupDate()
  {
    return $this->pickupDate;
  }

  public function setPickupTime($pickupTime)
  {
    $this->pickupTime = $pickupTime;
    return $this;
  }

  public function getPickupTime()
  {
    return $this->pickupTime;
  }

  public function setClosingTime($closingTime)
  {
    $this->closingTime = $closingTime;
    return $this;
  }

  public function getClosingTime()
  {
    return $this->closingTime;
  }

  public function setLocation($location)
  {
    $this->location = $location;
    return $this;
  }

  public function getLocation()
  {
    return $this->location;
  }

  public function setInstructions($instructions)
  {
    $this->instructions = $instructions;
    return $this;
  }

  public function getInstructions()
  {
    return $this->instructions;
  }

}