<?php

namespace Davidflypei\Eshipper\Model;

use Davidflypei\Eshipper\Common\EshipperModel;

class Items extends EshipperModel
{

  /**
   * @param $item
   * @return $this
   */
  public function setItem($item)
  {
    $this->item = $item;
    return $this;
  }

  /**
   * @return \Davidflypei\Eshipper\Model\Item[]
   */
  public function getItem()
  {
    return $this->item;
  }

  /**
   * @param $item
   * @return $this
   */
  public function addItem($item)
  {
    if (!$this->getItem()) {
      return $this->setItem(array($item));
    } else {
      return $this->setItem(
        array_merge($this->getItem(), array($item))
      );
    }
  }

  /**
   * @param $item
   * @return $this
   */
  public function removeItem($item)
  {
    return $this->setItem(
      array_diff($this->getItem(), array($item))
    );
  }

  /**
   * @param $currency
   * @return $this
   */
  public function setCurrency($currency)
  {
    $this->currency = $currency;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getCurrency()
  {
    return $this->currency;
  }

}