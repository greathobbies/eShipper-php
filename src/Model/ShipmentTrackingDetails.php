<?php

namespace Greathobbies\Eshipper\Model;

class ShipmentTrackingDetails extends \Greathobbies\Eshipper\Common\EshipperModel
{

  /**
   * @param $carrier
   * @return $this
   */
  public function setCarrier($carrier)
  {
    $this->carrier = $carrier;
    return $this;
  }

  /**
   * @return string
   */
  public function getCarrier()
  {
    return $this->carrier;
  }

  /**
   * @param $dateTime
   * @return $this
   */
  public function setDateTime($dateTime)
  {
    $this->dateTime = $dateTime;
    return $this;
  }

  /**
   * @return string
   */
  public function getDateTime()
  {
    return $this->dateTime;
  }

  /**
   * @param $location
   * @return $this
   */
  public function setLocation($location)
  {
    $this->location = $location;
    return $this;
  }

  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }

  /**
   * @param $description
   * @return $this
   */
  public function setDescription($description)
  {
    $this->description = $description;
    return $this;
  }

  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }

}