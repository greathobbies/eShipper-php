<?php

namespace Davidflypei\Eshipper\Model;

class Order extends \Davidflypei\Eshipper\Common\EshipperModel
{

  /**
   * @param $trackingId
   * @return $this
   */
  public function setTrackingId($trackingId)
  {
    $this->trackingId = $trackingId;
    return $this;
  }

  /**
   * @return string
   */
  public function getTrackingId()
  {
    return $this->trackingId;
  }

  /**
   * @param $orderId
   * @return $this
   */
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
    return $this;
  }

  /**
   * @return string
   */
  public function getOrderId()
  {
    return $this->orderId;
  }

  /**
   * @param $message
   * @return $this
   */
  public function setMessage($message)
  {
    $this->message = $message;
    return $this;
  }

  /**
   * @return string
   */
  public function getMessage()
  {
    return $this->message;
  }
}