<?php

namespace Davidflypei\Eshipper\Model;

use Davidflypei\Eshipper\Common\EshipperModel;

class Contact extends EshipperModel
{
  /**
   * @param $contactCompany
   * @return $this
   */
  public function setContactCompany($contactCompany)
  {
    $this->contactCompany = $contactCompany;
    return $this;
  }

  /**
   * @return string
   */
  public function getContactCompany()
  {
    return $this->contactCompany;
  }

  /**
   * @param $contactName
   * @return $this
   */
  public function setContactName($contactName)
  {
    $this->contactName = $contactName;
    return $this;
  }

  /**
   * @return string
   */
  public function getContactName()
  {
    return $this->contactName;
  }

  /**
   * @param $phone
   * @return $this
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;
    return $this;
  }

  /**
   * @return string
   */
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * @param $brokerName
   * @return $this
   */
  public function setBrokerName($brokerName)
  {
    $this->brokerName = $brokerName;
    return $this;
  }

  /**
   * @return string
   */
  public function getBrokerName()
  {
    return $this->brokerName;
  }

  /**
   * @param $brokerTaxId
   * @return $this
   */
  public function setBrokerTaxId($brokerTaxId)
  {
    $this->brokerTaxId = $brokerTaxId;
    return $this;
  }

  /**
   * @return string
   */
  public function getBrokerTaxId()
  {
    return $this->brokerTaxId;
  }

  /**
   * @param $recipientTaxId
   * @return $this
   */
  public function setRecipientTaxId($recipientTaxId)
  {
    $this->recipientTaxId = $recipientTaxId;
    return $this;
  }

  /**
   * @return string
   */
  public function getRecipientTaxId()
  {
    return $this->recipientTaxId;
  }
}