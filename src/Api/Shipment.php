<?php

namespace Greathobbies\Eshipper\Api;

class Shipment extends \Greathobbies\Eshipper\Common\EshipperResourceModel
{

  public function setType($type)
  {
    $this->type = $type;
    return $this;
  }

  public function getType()
  {
    return $this->type;
  }

  public function setSort($sort)
  {
    $this->sort = $sort;
    return $this;
  }

  public function getSort()
  {
    return $this->sort;
  }

  public function setCarrier($carrier)
  {
    $this->carrier = $carrier;
    return $this;
  }

  public function getCarrier()
  {
    return $this->carrier;
  }

  public function createShipment($shippingRequest, $apiContext = null, $restCall = null)
  {
    $params = array(
      'type' => $this->getType(),
      'sort' => $this->getSort(),
      'carrier' => $this->getCarrier()
    );
    $json = self::executeCall(
      "/api/v2/ship/?". http_build_query($params),
      "PUT",
      $shippingRequest->toJSON(),
      null,
      $apiContext,
      $restCall
    );
    $shippingResponse = new \Greathobbies\Eshipper\Model\ShippingResponse();
    $shippingResponse->fromJson($json);
    return $shippingResponse;
  }

}