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

}
 ?>
