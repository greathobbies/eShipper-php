<?php

namespace Greathobbies\Eshipper\Model;

class DutiesTaxes extends \Greathobbies\Eshipper\Common\EshipperModel
{
  /**
   * @param $dutiable
   * @return $this
   */
  public function setDutiable($dutiable)
  {
    $this->dutiable = $dutiable;
    return $this;
  }

  /**
   * @return bool
   */
  public function getDutiable()
  {
    return $this->dutiable;
  }

  /**
   * @param $billTo
   * @return $this
   */
  public function setBillTo($billTo)
  {
    $this->billTo = $billTo;
    return $this;
  }

  /**
   * @return string
   */
  public function getBillTo()
  {
    return $this->billTo;
  }

  /**
   * @param $accountNumber
   * @return $this
   */
  public function setAccountNumber($accountNumber)
  {
    $this->accountNumber = $accountNumber;
    return $this;
  }

  /**
   * @return string
   */
  public function getAccountNumber()
  {
    return $this->accountNumber;
  }

  /**
   * @param $sedNumber
   * @return $this
   */
  public function setSedNumber($sedNumber)
  {
    $this->sedNumber = $sedNumber;
    return $this;
  }

  /**
   * @return string
   */
  public function getSedNumber()
  {
    return $this->sedNumber;
  }
}