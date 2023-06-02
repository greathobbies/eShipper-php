<?php

namespace Davidflypei\Eshipper\Api;

use Davidflypei\Eshipper\Common\EshipperResourceModel;
use Davidflypei\Eshipper\Model\TrackingResponse;

class Track extends EshipperResourceModel
{

  public function trackOrder($orderNumber, $apiContext = null, $restCall = null)
  {
    $json = self::executeCall(
      "/api/v2/track/" . $orderNumber,
      "GET",
      null,
      null,
      $apiContext,
      $restCall
    );
    $shipmentTrackingDetails = new TrackingResponse();
    $shipmentTrackingDetails->fromJson($json);
    return $shipmentTrackingDetails;
  }

  public function trackNumber($trackingNumber, $carrier = null, $apiContext = null, $restCall = null)
  {
    $params = array();

    if (!empty($carrier)) {
      $params[] = $carrier;
    }

    $params[] = $trackingNumber;

    $json = self::executeCall(
      "/api/v2/track/tracking-number/" . join($params, "/"),
      "GET",
      null,
      null,
      $apiContext,
      $restCall
    );
    echo $json;
    $shipmentTrackingDetails = new TrackingResponse();
    $shipmentTrackingDetails->fromJson($json);
    return $shipmentTrackingDetails;
  }

}