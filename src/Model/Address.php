<?php

namespace Davidflypei\Eshipper\Model;

use Davidflypei\Eshipper\Common\EshipperModel;

class Address extends EshipperModel
{
  public function setAttention($attention)
  {
    $this->attention = $attention;
    return $this;
  }

  public function getAttention()
  {
    return $this->attention;
  }

  public function setCompany($company)
  {
    $this->company = $company;
    return $this;
  }

  public function getCompany()
  {
    return $this->company;
  }

  public function setAddress1($address1)
  {
    $this->address1 = $address1;
    return $this;
  }

  public function getAddress1()
  {
    return $this->address1;
  }

  public function setAddress2($address2)
  {
    $this->address2 = $address2;
    return $this;
  }

  public function getAddress2()
  {
    return $this->address2;
  }

  public function setCity($city)
  {
    $this->city = $city;
    return $this;
  }

  public function getCity()
  {
    return $this->city;
  }

  public function setProvince($province)
  {
    $this->province = $province;
    return $this;
  }

  public function getProvince()
  {
    return $this->province;
  }

  public function setCountry($country)
  {
    $this->country = $country;
    return $this;
  }

  public function getCountry()
  {
    return $this->country;
  }

  public function setZip($zip)
  {
    $this->zip = $zip;
    return $this;
  }

  public function getZip()
  {
    return $this->zip;
  }

  public function setemail($email)
  {
    $this->email = $email;
    return $this;
  }

  public function getemail()
  {
    return $this->email;
  }

  public function setPhone($phone)
  {
    $this->phone = $phone;
    return $this;
  }

  public function getPhone()
  {
    return $this->phone;
  }
}