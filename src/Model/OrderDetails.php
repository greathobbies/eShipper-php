<?php

namespace Davidflypei\Eshipper\Model;

class OrderDetails extends \Davidflypei\Eshipper\Common\EshipperModel
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
   * @return \Davidflypei\Eshipper\Model\Carrier
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
   * @return \Davidflypei\Eshipper\Model\ShipFromAddress
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
   * @return \Davidflypei\Eshipper\Model\ShipToAddress
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
   * @return \Davidflypei\Eshipper\Model\Packages
   */
  public function getPackages()
  {
    return $this->packages;
  }

}