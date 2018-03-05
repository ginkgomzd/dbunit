<?php

namespace DbUnitTests;

use \PHPUnit\DbUnit\TestCaseTrait;

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

}

 ?>
