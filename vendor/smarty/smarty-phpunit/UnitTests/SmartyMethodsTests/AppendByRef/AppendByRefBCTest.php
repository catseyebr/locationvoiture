<?php
/**
 * Smarty PHPunit tests appendByRef method
 *
 * @package PHPunit
 * @author  Uwe Tews
 */

/**
 * class for appendByRef tests
 *
 * @backupStaticAttributes enabled
 */
class AppendByRefBCTest extends PHPUnit_Smarty
{
    public $loadSmartyBC = true;
    public $loadSmarty = false;
    public function setUp()
    {
        $this->setUpSmarty(__DIR__);
    }

    public function testInit()
    {
        $this->cleanDirs();
    }

    public function testSmarty2AppendByRef()
    {
        $bar = 'bar';
        $bar2 = 'bar2';
        $this->smartyBC->append_by_ref('foo', $bar);
        $this->smartyBC->append_by_ref('foo', $bar2);
        $bar = 'newbar';
        $bar2 = 'newbar2';
        $this->assertEquals('newbar newbar2', $this->smartyBC->fetch('eval:{$foo[0]} {$foo[1]}'));
    }

    public function testSmarty2AppendByRefUnassigned()
    {
        $bar2 = 'bar2';
        $this->smartyBC->append_by_ref('foo', $bar2);
        $bar2 = 'newbar2';
        $this->assertEquals('newbar2', $this->smartyBC->fetch('eval:{$foo[0]}'));
    }
}
