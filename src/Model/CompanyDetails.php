<?php

namespace Davidflypei\Eshipper\Model;

class CompanyDetails extends \Davidflypei\Eshipper\Model\Address
{

  public function setCompanyName($companyName)
  {
    $this->companyName = $companyName;
    return $this;
  }

  public function getCompanyName()
  {
    return $this->companyName;
  }

  public function setIndustry($industry)
  {
    $this->industry = $industry;
    return $this;
  }

  public function getIndustry()
  {
    return $this->industry;
  }

  public function setMonthlyShipments($monthlyShipments)
  {
    $this->monthlyShipments = $monthlyShipments;
    return $this;
  }

  public function getMonthlyShipments()
  {
    return $this->monthlyShipments;
  }

  public function setZip($zipCode)
  {
    $this->zipCode = $zipCode;
    return $this;
  }

  public function getZip()
  {
    return $this->zipCode;
  }

  public function setZipCode($zipCode)
  {
    $this->zipCode = $zipCode;
    return $this;
  }

  public function getZipCode()
  {
    return $this->zipCode;
  }


}