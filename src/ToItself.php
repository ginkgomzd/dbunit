<?php

namespace DbUnit;

class ToItself {

  public static function doShyte($condition) {
    $a = FALSE;
    $b = TRUE;
    $result;

    if ($a == $condition) {
      $result = "A is. ";
    } else {
      $result = "A ain't. ";
    }

    if ($b == $condition) {
      $result .= "B is. ";
    } else {
      $result .= "B ain't. ";
    }

    return $result;
  }

  public static function makeIceCream($attributes) {

    $ic = new IceCream();

    $ic->flavour = $attributes['flavour'];
    $ic->has_nuts = $attributes['has_nuts'];
    $ic->has_chocolate = $attributes['has_chocolate'];
    $ic->dairy_free = $attributes['dairy_free'];

    $ic->save();
  }

}
 ?>
