<?php

namespace Davidflypei\Eshipper\Model;

class ShipFromAddress extends Address
{
  public function setInstructions($instructions)
  {
    $this->instructions = $instructions;
    return $this;
  }

  public function getInstructions()
  {
    return $this->instructions;
  }

  public function setResidential($residential)
  {
    $this->residential = $residential;
    return $this;
  }

  public function getResidential()
  {
    return $this->residential;
  }

  public function setTailgateRequired($tailgateRequired)
  {
    $this->tailgateRequired = $tailgateRequired;
    return $this;
  }

  public function getTailgateRequired()
  {
    return $this->tailgateRequired;
  }

  public function setConfirmDelivery($confirmDelivery)
  {
    $this->confirmDelivery = $confirmDelivery;
    return $this;
  }

  public function getConfirmDelivery()
  {
    return $this->confirmDelivery;
  }

  public function setNotifyRecipient($notifyRecipient)
  {
    $this->notifyRecipient = $notifyRecipient;
    return $this;
  }
}