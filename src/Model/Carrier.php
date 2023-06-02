<?php

namespace Davidflypei\Eshipper\Model;

use Davidflypei\Eshipper\Common\EshipperModel;

class Carrier extends EshipperModel
{

  /**
   * @param $carrierName
   * @return $this
   */
  public function setCarrierName($carrierName)
  {
    $this->carrierName = $carrierName;
    return $this;
  }

  /**
   * @return string
   */
  public function getCarrierName()
  {
    return $this->carrierName;
  }

  /**
   * @param $serviceName
   * @return $this
   */
  public function setServiceName($serviceName)
  {
    $this->serviceName = $serviceName;
    return $this;
  }

  /**
   * @return string
   */
  public function getServiceName()
  {
    return $this->serviceName;
  }

  /**
   * @param $carrierLogoPath
   * @return $this
   */
  public function setCarrierLogoPath($carrierLogoPath)
  {
    $this->carrierLogoPath = $carrierLogoPath;
    return $this;
  }

  /**
   * @return string
   */
  public function getCarrierLogoPath()
  {
    return $this->carrierLogoPath;
  }

}