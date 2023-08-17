<?php

namespace Greathobbies\Eshipper\Model;

use Greathobbies\Eshipper\Core\EshipperConstants;

class CarrierServicesMetadata extends \Greathobbies\Eshipper\Common\EshipperMetadataModel
{

  private $metadataFilename = 'carrierServicesLiveMetadata.json';

  public function __construct($mode = 'live')
  {
    if ($mode == 'sandbox')
    {
      $this->metadataFilename = 'carrierServicesSandMetadata.json';
    }

    $data = $this->loadMetadata(dirname(__FILE__) . EshipperConstants::METADATA_LOCATION . '/' . $this->metadataFilename);

    parent::__construct($data);
  }

  /**
   * @param $carrierServices
   * @return $this
   */
  public function setCarrierServices($carrierServices)
  {
    $this->carrierServices = $carrierServices;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Model\CarrierServiceMetadata[]
   */
  public function getCarrierServices()
  {
    return $this->carrierServices;
  }

}