<?php

namespace Greathobbies\Eshipper\Model;

use Greathobbies\Eshipper\Common\EshipperModel;

class Packages extends EshipperModel
{

  /**
   * @param $packages
   * @return $this
   */
  public function setPackages($packages)
  {
    $this->packages = $packages;
    return $this;
  }

  /**
   * @return \Greathobbies\Eshipper\Model\Package[]
   */
  public function getPackages()
  {
    return $this->packages;
  }

  /**
   * @param $package
   * @return $this
   */
  public function addPackage($package)
  {
    if (!$this->getPackages()) {
      return $this->setPackages(array($package));
    } else {
      return $this->setPackages(
        array_merge($this->getPackages(), array($package))
      );
    }
  }

  /**
   * @param $package
   * @return $this
   */
  public function removePackage($package)
  {
    return $this->setPackages(
      array_diff($this->getPackages(), array($package))
    );
  }

  /**
   * @param $type
   * @return $this
   */
  public function setType($type)
  {
    $this->type = $type;
    return $this;
  }

  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }

}