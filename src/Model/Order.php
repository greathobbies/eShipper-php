<?php

namespace Davidflypei\Eshipper\Model;

class Order extends \Davidflypei\Eshipper\Common\EshipperModel
{

  public function setTrackingId($trackingId)
  {
    $this->trackingId = $trackingId;
    return $this;
  }

  public function getTrackingId()
  {
    return $this->trackingId;
  }

  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
    return $this;
  }

  public function getOrderId()
  {
    return $this->orderId;
  }

  public function setMessage($message)
  {
    $this->message = $message;
    return $this;
  }

  public function getMessage()
  {
    return $this->message;
  }
}