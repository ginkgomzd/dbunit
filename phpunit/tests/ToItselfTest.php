<?php

namespace DbUnitTests;

use PHPUnit\Framework\TestCase;
use \DbUnit\ToItself;

class ToItselfTest extends TestCase {

  public function testShyte() {
    $shyte = ToItself::doShyte(TRUE);
    self::assertContains('B is', $shyte);

    $shyte = ToItself::doShyte(FALSE);
    self::assertContains('A is', $shyte);
  }

}
?>
