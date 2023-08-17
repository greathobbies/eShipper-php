<?php

namespace Greathobbies\Eshipper\Model;

use Greathobbies\Eshipper\Common\EshipperModel;

class ShippingResponse extends EshipperModel
{

  /**
   * @param $order
   * @return $this
   */
  public function setOrder($order)
  {
    $this->order = $order;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Model\Order
   */
  public function getOrder()
  {
    return $this->order;
  }

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
   * @param $reference
   * @return $this
   */
  public function setReference($reference)
  {
    $this->reference = $reference;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Common\EshipperModel
   */
  public function getReference()
  {
    return $this->reference;
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
   * @param $trackingNumber
   * @return $this
   */
  public function setTrackingNumber($trackingNumber)
  {
    $this->trackingNumber = $trackingNumber;
    return $this;
  }

  /**
   * @return string
   */
  public function getTrackingNumber()
  {
    return $this->trackingNumber;
  }

  /**
   * @param $labelData
   * @return $this
   */
  public function setLabelData($labelData)
  {
    $this->labelData = $labelData;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Model\LabelData
   */
  public function getLabelData()
  {
    return $this->labelData;
  }

  /**
   * @param $customsInvoice
   * @return $this
   */
  Public function setCustomsInvoice($customsInvoice)
  {
    $this->customsInvoice = $customsInvoice;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Model\CustomsInvoice
   */
  public function getCustomsInvoice()
  {
    return $this->customsInvoice;
  }

  /**
   * @param $pickup
   * @return $this
   */
  public function setPickup($pickup)
  {
    $this->pickup = $pickup;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Common\EshipperModel
   */
  public function getPickup()
  {
    return $this->pickup;
  }

  /**
   * @param $packingSlip
   * @return $this
   */
  public function setPackingSlip($packingSlip)
  {
    $this->packingSlip = $packingSlip;
    return $this;
  }

  /**
   * @return string
   */
  public function getPackingSlip()
  {
    return $this->packingSlip;
  }

  /**
   * @param $quote
   * @return $this
   */
  public function setQuote($quote)
  {
    $this->quote = $quote;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Model\Quote
   */
  public function getQuote()
  {
    return $this->quote;
  }

}