<?php

namespace Davidflypei\Eshipper\Model;

use Davidflypei\Eshipper\Core\EshipperConstants;

class CarrierServicesMetadata extends \Davidflypei\Eshipper\Common\EshipperMetadataModel
{

  private $metadataFilename = 'carrierServicesLiveMetadata.json';

  public function __construct($mode = 'live')
  {
    if ($mode == 'sandbox')
    {
      $this->metadataFilename = 'carrierServicesSandMetadata.json';
    }

    $data = $this->loadMetadata(EshipperConstants::METADATA_LOCATION . '/' . $this->metadataFilename);

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
   * @return \Davidflypei\Eshipper\Model\CarrierServiceMetadata[]
   */
  public function getCarrierServices()
  {
    return $this->carrierServices;
  }

}