<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Item
 * @package Source\models
 */
class Item extends DataLayer
{
  /**
   * Item constructor.
   */
  public function __construct()
  {
    parent::__construct("items", ["name", "description", "image", "price"]);
  }
}
