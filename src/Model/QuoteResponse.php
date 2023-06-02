<?php

namespace Davidflypei\Eshipper\Model;

use Davidflypei\Eshipper\Common\EshipperModel;

class QuoteResponse extends EshipperModel
{

  /**
   * @param $uuid
   * @return $this
   */
  public function setUUID($uuid)
  {
    $this->uuid = $uuid;
    return $this;
  }

  /**
   * @return string
   */
  public function getUUID()
  {
    return $this->uuid;
  }

  /**
   * @param $quotes
   * @return $this
   */
  public function setQuotes($quotes)
  {
    $this->quotes = $quotes;
    return $this;
  }

  /**
   * @return \Davidflypei\Eshipper\Model\Quote
   */
  public function getQuotes()
  {
    return $this->quotes;
  }

  /**
   * @param $warnings
   * @return $this
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getWarnings()
  {
    return $this->warnings;
  }

  /**
   * @param $errors
   * @return $this
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getErrors()
  {
    return $this->errors;
  }

}