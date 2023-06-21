<?php

namespace Davidflypei\Eshipper\Model;

class CustomsInformation extends \Davidflypei\Eshipper\Common\EshipperModel
{
  /**
   * @param $contact
   * @return $this
   */
  public function setContact($contact)
  {
    $this->contact = $contact;
    return $this;
  }

  /**
   * @return \Davidflypei\Eshipper\Model\Contact
   */
  public function getContact()
  {
    return $this->contact;
  }

  /**
   * @param $items
   * @return $this
   */
  public function setItems($items)
  {
    $this->items = $items;
    return $this;
  }

  /**
   * @return \Davidflypei\Eshipper\Model\Items
   */
  public function getItems()
  {
    return $this->items;
  }

  /**
   * @param $dutiesTaxes
   * @return $this
   */
  public function setDutiesTaxes($dutiesTaxes)
  {
    $this->dutiesTaxes = $dutiesTaxes;
    return $this;
  }

  /**
   * @return \Davidflypei\Eshipper\Model\DutiesTaxes
   */
  public function getDutiesTaxes()
  {
    return $this->dutiesTaxes;
  }

  /**
   * @param $billingAddress
   * @return $this
   */
  public function setBillingAddress($billingAddress)
  {
    $this->billingAddress = $billingAddress;
    return $this;
  }

  /**
   * @return \Davidflypei\Eshipper\Model\Address
   */
  public function getBillingAddress()
  {
    return $this->billingAddress;
  }

  /**
   * @param $remarks
   * @return $this
   */
  public function setRemarks($remarks)
  {
    $this->remarks = $remarks;
    return $this;
  }

  /**
   * @return string
   */
  public function getRemarks()
  {
    return $this->remarks;
  }
}