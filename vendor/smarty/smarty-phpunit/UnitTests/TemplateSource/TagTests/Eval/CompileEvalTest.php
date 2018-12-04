<?php
/**
 * Smarty PHPunit tests compilation of {eval} tag
 *
 * @package PHPunit
 * @author  Uwe Tews
 */

/**
 * class for {eval} tag tests
 *
 * @backupStaticAttributes enabled
 */
class CompileEvalTest extends PHPUnit_Smarty
{
    public function setUp()
    {
        $this->setUpSmarty(__DIR__);
    }


    public function testInit()
    {
        $this->cleanDirs();
    }
    /**
     * test eval tag
     */
    public function testEval1()
    {
        $tpl = $this->smarty->createTemplate("eval:{eval var='hello world'}");
        $this->assertEquals("hello world", $this->smarty->fetch($tpl));
    }

    public function testEval2()
    {
        $tpl = $this->smarty->createTemplate("eval:{eval var='hello world' assign=foo}{\$foo}");
        $this->assertEquals("hello world", $this->smarty->fetch($tpl));
    }

    public function testEval3()
    {
        $tpl = $this->smarty->createTemplate("eval:{eval var='hello world' assign=foo}");
        $this->assertEquals("", $this->smarty->fetch($tpl));
    }
}
