<?php

namespace DbUnit;

use \GinkgoStreetLabs\Model;

class IceCream extends Model {

  public $id;
  public $flavour;
  public $has_nuts;
  public $has_chocolate;
  public $dairy_free;

  protected function getTableName() {
    return 'ice_cream';
  }
}
 ?>
