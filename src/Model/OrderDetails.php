<?php

namespace Greathobbies\Eshipper\Model;

class OrderDetails extends \Greathobbies\Eshipper\Common\EshipperModel
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
   * @return \Greathobbies\Eshipper\Model\Carrier
   */
  public function getCarrier()
  {
    return $this->carrier;
  }

  /**
   * @param $from
   * @return $this
   */
  public function setFrom($from)
  {
    $this->from = $from;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Model\ShipFromAddress
   */
  public function getFrom()
  {
    return $this->from;
  }

  /**
   * @param $to
   * @return $this
   */
  public function setTo($to)
  {
    $this->to = $to;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Model\ShipToAddress
   */
  public function getTo()
  {
    return $this->to;
  }

  /**
   * @param $packages
   * @return $this
   */
  public function setPackages($packages)
  {
    $this->packages = $packages;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Model\Packages
   */
  public function getPackages()
  {
    return $this->packages;
  }

}