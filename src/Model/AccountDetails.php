<?php

namespace Greathobbies\Eshipper\Model;

class AccountDetails extends \Greathobbies\Eshipper\Common\EshipperModel
{

  public function setContactName($contactName)
  {
    $this->contactName = $contactName;
    return $this;
  }

  public function getContactName()
  {
    return $this->contactName;
  }

  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
    return $this;
  }

  public function getEmailAddress()
  {
    return $this->emailAddress;
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

  public function setUserName($userName)
  {
    $this->userName = $userName;
    return $this;
  }

  public function getUserName()
  {
    return $this->userName;
  }

  public function setPassword($password)
  {
    $this->password = $password;
    return $this;
  }

  public function getPassword()
  {
    return $this->password;
  }

}