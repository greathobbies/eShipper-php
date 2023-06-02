<?php

namespace Davidflypei\Eshipper\Common;

use Davidflypei\Eshipper\Rest\ApiContext;
use Davidflypei\Eshipper\Rest\IResource;
use Davidflypei\Eshipper\Transport\EshipperRestCall;

class EshipperResourceModel extends EshipperModel implements IResource
{
  public function setLinks($links)
  {
    $this->links = $links;
    return $this;
  }

  public function getLinks()
  {
    return $this->links;
  }

  public function getLink($rel)
  {
    if (is_array($this->links)) {
      foreach ($this->links as $link) {
        if ($link->getRel() == $rel) {
          return $link->getHref();
        }
      }
    }
    return null;
  }

  public function addLink($links)
  {
    if (!$this->getLinks()) {
      return $this->setLinks(array($links));
    } else {
      return $this->setLinks(
        array_merge($this->getLinks(), array($links))
      );
    }
  }

  public function removeLink($links)
  {
    return $this->setLinks(
      array_diff($this->getLinks(), array($links))
    );
  }

  protected static function executeCall($url, $method, $payLoad, $headers = array(), $apiContext = null, $restCall = null, $handlers = array('Davidflypei\Eshipper\Handler\RestHandler'))
  {
    //Initialize the context and rest call object if not provided explicitly
    $apiContext = $apiContext ? $apiContext : new ApiContext(self::$credential);
    $restCall = $restCall ? $restCall : new EshipperRestCall($apiContext);

    //Make the execution call
    $json = $restCall->execute($handlers, $url, $method, $payLoad, $headers);
    return $json;
  }

  public function updateAccessToken($refreshToken, $apiContext)
  {
    $apiContext = $apiContext ? $apiContext : new ApiContext(self::$credential);
    $apiContext->getCredential()->updateAccessToken($apiContext->getConfig(), $refreshToken);
  }

}