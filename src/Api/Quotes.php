<?php

namespace Greathobbies\Eshipper\Api;

use Greathobbies\Eshipper\Common\EshipperResourceModel;
use Greathobbies\Eshipper\Model\QuoteResponse;
use Greathobbies\Eshipper\Validation\ArgumentValidator;
use Greathobbies\Eshipper\Model\Quote;

class Quotes extends EshipperResourceModel
{

  public function setLimit($limit)
  {
    $this->limit = $limit;
    return $this;
  }

  public function getLimit()
  {
    return $this->limit;
  }

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

  public function getQuotes($quoteRequest, $apiContext = null, $restCall = null)
  {
    $payLoad = $quoteRequest->toJSON();
    $params = array(
      'limit' => $this->getLimit(),
      'type' => $this->getType(),
      'sort' => $this->getSort()
    );
    ArgumentValidator::validate($params, 'params');
    $json = self::executeCall(
      "/api/v2/quote?" . http_build_query($params),
      "POST",
      $payLoad,
      null,
      $apiContext,
      $restCall
    );
    $quoteResponse = new QuoteResponse();
    return $quoteResponse->fromJson($json);
  }

  public function saveQuote($quoteRequest, $quote, $uuid, $apiContext = null, $restCall = null)
  {
    $payLoad = json_encode(array("quoteRequest" => $quoteRequest->toArray(), 'quote' => $quote, 'uuid' => $uuid));
    print('<pre>' . print_r($payLoad, true) . '</pre>');
    $json = self::executeCall(
      "/api/v2/quote",
      "PUT",
      $payLoad,
      null,
      $apiContext,
      $restCall
    );
    $res = json_decode($json);
    return $res;
  }

  public function loadQuote($savedQuoteID, $apiContext = null, $restCall = null)
  {
    ArgumentValidator::validate($savedQuoteID, 'id');
    $payLoad = "";
    $json = self::executeCall(
      "/api/v2/quote/" . $savedQuoteID,
      "GET",
      $payLoad,
      null,
      $apiContext,
      $restCall
    );
    $quoteResponse = new QuoteResponse();
    return $quoteResponse->fromJson($json);
  }

}