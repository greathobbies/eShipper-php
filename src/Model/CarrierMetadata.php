<?php

namespace Greathobbies\Eshipper\Model;

use Greathobbies\Eshipper\Core\EshipperConstants;

class CarrierMetadata extends \Greathobbies\Eshipper\Common\EshipperMetadataModel
{
  private $metadataFilename = 'carriersLiveMetadata.json';

  public function __construct($mode = 'live')
  {
    if ($mode == 'sandbox')
    {
      $this->metadataFilename = 'carriersSandMetadata.json';
    }

    $data = $this->loadMetadata(dirname(__FILE__) . EshipperConstants::METADATA_LOCATION . '/' . $this->metadataFilename);

    parent::__construct($data);
  }
}