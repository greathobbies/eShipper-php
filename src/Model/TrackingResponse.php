<?php

namespace Greathobbies\Eshipper\Model;

use JsonSchema\Iterator\ObjectIterator;

class TrackingResponse extends \Greathobbies\Eshipper\Common\EshipperModel
{

  /**
   * @param $trackingUrl
   * @return $this
   */
  public function setTrackingUrl($trackingUrl)
  {
    $this->trackingUrl = $trackingUrl;
    return $this;
  }

  /**
   * @return string
   */
  public function getTrackingUrl()
  {
    return $this->trackingUrl;
  }

  /**
   * @param $trackingDetails
   * @return $this
   */
  public function setTrackingDetails($trackingDetails)
  {
    $this->trackingDetails = $trackingDetails;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Model\ShipmentTrackingDetails[]
   */
  public function getTrackingDetails()
  {
    return $this->trackingDetails;
  }

  /**
   * @param $status
   * @return $this
   */
  public function setStatus($status)
  {
    $this->status = $status;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Common\EshipperModel
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * @param $orderDetails
   * @return $this
   */
  public function setOrderDetails($orderDetails)
  {
    $this->orderDetails = $orderDetails;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Model\OrderDetails
   */
  public function getOrderDetails()
  {
    return $this->orderDetails;
  }

}