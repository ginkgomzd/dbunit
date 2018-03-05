<?php

namespace DbUnitTests;

use \PHPUnit\DbUnit\TestCaseTrait;
use \DbUnit\ToItself;
use \DbUnit\IceCream;

class ToItselfDBTest extends TestCase {

  use TestCaseTrait;

  /**
  * @return \PHPUnit\Extensions\Database\DataSet\IDataSet
  */
  public function getDataSet()
  {
    return self::createMySQLXMLDataSet(dirname(__FILE__).'/../sql/ice_cream.xml');
  }

  public function testSetup() {
    $db = $this->getConnection();

    $testTable = $db->createQueryTable(
      'ice_cream', 'SELECT * FROM ice_cream'
    );

    // in real-life this would not be the same as $this->getDataSet(), so not using it.
    $actual = self::createMySQLXMLDataSet(dirname(__FILE__).'/../sql/ice_cream.xml');
    $expect = $actual->getTable('ice_cream');

    self::assertTablesEqual($expect, $testTable);
  }

  public function testMakeIceCream() {
    $before = self::getConnection()->getRowCount('ice_cream');

    $icecream = array(
      'flavour' => 'Jack Rabbit',
      'has_nuts' => 1,
      'has_chocolate' => 1,
      'dairy_free' => 0
    );

    ToItself::makeIceCream($icecream);

    $after = self::getConnection()->getRowCount('ice_cream');

    self::assertSame(++$before, $after);
  }

}

 ?>
