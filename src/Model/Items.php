<?php

namespace Davidflypei\Eshipper\Model;

use Davidflypei\Eshipper\Common\EshipperModel;

class Items extends EshipperModel
{

  /**
   * @param $items
   * @return $this
   */
  public function setItems($items)
  {
    $this->items = $items;
    return $this;
  }

  /**
   * @return \Davidflypei\Eshipper\Model\Item[]
   */
  public function getItems()
  {
    return $this->items;
  }

  /**
   * @param $item
   * @return $this
   */
  public function addItem($item)
  {
    if (!$this->getItems()) {
      return $this->setItems(array($item));
    } else {
      return $this->setItems(
        array_merge($this->getItems(), array($item))
      );
    }
  }

  /**
   * @param $item
   * @return $this
   */
  public function removeItem($item)
  {
    return $this->setItems(
      array_diff($this->getItems(), array($item))
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