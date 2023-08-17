<?php

namespace Greathobbies\Eshipper\Model;

use Greathobbies\Eshipper\Core\EshipperConstants;

class CarrierServiceMetadata extends \Greathobbies\Eshipper\Common\EshipperMetadataModel
{

  /**
   * @param $id
   * @return $this
   */
  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param $name
   * @return $this
   */
  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param $description
   * @return $this
   */
  public function setDescription($description)
  {
    $this->description = $description;
    return $this;
  }

  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * @param $esServiceName
   * @return $this
   */
  public function setEsServiceName($esServiceName)
  {
    $this->esServiceName = $esServiceName;
    return $this;
  }

  /**
   * @return string
   */
  public function getEsServiceName()
  {
    return $this->esServiceName;
  }

  /**
   * @param $code
   * @return $this
   */
  public function setCode($code)
  {
    $this->code = $code;
    return $this;
  }

  /**
   * @return string
   */
  public function getCode()
  {
    return $this->code;
  }

  /**
   * @param $serviceTypeCode
   * @return $this
   */
  public function setServiceTypeCode($serviceTypeCode)
  {
    $this->serviceTypeCode = $serviceTypeCode;
    return $this;
  }

  /**
   * @return string
   */
  public function getServiceTypeCode()
  {
    return $this->serviceTypeCode;
  }

  /**
   * @param $codeUs
   * @return $this
   */
  public function setCodeUs($codeUs)
  {
    $this->codeUs = $codeUs;
    return $this;
  }

  /**
   * @return string
   */
  public function getCodeUs()
  {
    return $this->codeUs;
  }

  /**
   * @param $codeIntl
   * @return $this
   */
  public function setCodeIntl($codeIntl)
  {
    $this->codeIntl = $codeIntl;
    return $this;
  }

  /**
   * @return string
   */
  public function getCodeIntl()
  {
    return $this->codeIntl;
  }

  /**
   * @param $serviceNameUS
   * @return $this
   */
  public function setServiceNameUS($serviceNameUS)
  {
    $this->serviceNameUS = $serviceNameUS;
    return $this;
  }

  /**
   * @return string
   */
  public function getServiceNameUS()
  {
    return $this->serviceNameUS;
  }

  /**
   * @param $transitCodeUS
   * @return $this
   */
  public function setTransitCodeUS($transitCodeUS)
  {
    $this->transitCodeUS = $transitCodeUS;
    return $this;
  }

  /**
   * @return string
   */
  public function getTransitCodeUS()
  {
    return $this->transitCodeUS;
  }

  /**
   * @param $transitCodeCA
   * @return $this
   */
  public function setTransitCodeCA($transitCodeCA)
  {
    $this->transitCodeCA = $transitCodeCA;
    return $this;
  }

  /**
   * @return string
   */
  public function getTransitCodeCA()
  {
    return $this->transitCodeCA;
  }

  /**
   * @param $transitCodeIntl
   * @return $this
   */
  public function setTransitCodeIntl($transitCodeIntl)
  {
    $this->transitCodeIntl = $transitCodeIntl;
    return $this;
  }

  /**
   * @return string
   */
  public function getTransitCodeIntl()
  {
    return $this->transitCodeIntl;
  }

  /**
   * @param $provider
   * @return $this
   */
  public function setProvider($provider)
  {
    $this->provider = $provider;
    return $this;
  }

  /**
   * @return string
   */
  public function getProvider()
  {
    return $this->provider;
  }

  /**
   * @param $color
   * @return $this
   */
  public function setColor($color)
  {
    $this->color = $color;
    return $this;
  }

  /**
   * @return string
   */
  public function getColor()
  {
    return $this->color;
  }

  /**
   * @param $guaranteed
   * @return $this
   */
  public function setGuaranteed($guaranteed)
  {
    $this->guaranteed = $guaranteed;
    return $this;
  }

  /**
   * @return string
   */
  public function getGuaranteed()
  {
    return $this->guaranteed;
  }

  /**
   * @param $infoUrl
   * @return $this
   */
  public function setInfoUrl($infoUrl)
  {
    $this->infoUrl = $infoUrl;
    return $this;
  }

  /**
   * @return string
   */
  public function getInfoUrl()
  {
    return $this->infoUrl;
  }

  /**
   * @param $mailShape
   * @return $this
   */
  public function setMailShape($mailShape)
  {
    $this->mailShape = $mailShape;
    return $this;
  }

  /**
   * @return string
   */
  public function getMailShape()
  {
    return $this->mailShape;
  }

  /**
   * @param $serviceTimeMins
   * @return $this
   */
  public function setServiceTimeMins($serviceTimeMins)
  {
    $this->serviceTimeMins = $serviceTimeMins;
    return $this;
  }

  /**
   * @return string
   */
  public function getServiceTimeMins()
  {
    return $this->serviceTimeMins;
  }

  /**
   * @param $mode
   * @return $this
   */
  public function setMode($mode)
  {
    $this->mode = $mode;
    return $this;
  }

  /**
   * @return string
   */
  public function getMode()
  {
    return $this->mode;
  }

  /**
   * @param $carrierDTO
   * @return $this
   */
  public function setCarrierDTO($carrierDTO)
  {
    $this->carrierDTO = $carrierDTO;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Model\CarrierMetadata
   */
  public function getCarrierDTO()
  {
    return $this->carrierDTO;
  }

  /**
   * @param $disabled
   * @return $this
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
    return $this;
  }

  /**
   * @return string
   */
  public function getDisabled()
  {
    return $this->disabled;
  }

  /**
   * @param $markupId
   * @return $this
   */
  public function setMarkupId($markupId)
  {
    $this->markupId = $markupId;
    return $this;
  }

  /**
   * @return string
   */
  public function getMarkupId()
  {
    return $this->markupId;
  }

  /**
   * @param $type
   * @return $this
   */
  public function setType($type)
  {
    $this->type = $type;
    return $this;
  }

  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * @param $altId
   * @return $this
   */
  public function setAltId($altId)
  {
    $this->altId = $altId;
    return $this;
  }

  /**
   * @return int
   */
  public function getAltId()
  {
    return $this->altId;
  }

}