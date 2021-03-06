<?php
/**
 * Smarty PHPunit tests of filter
 *
 * @package PHPunit
 * @author  Rodney Rehm
 */

/**
 * class for filter tests
 *
 * @backupStaticAttributes enabled
 */
class MuteExpectedErrorsTest extends PHPUnit_Smarty
{
    protected $_errors = array();

    public function setUp()
    {
        $this->setUpSmarty(__DIR__);
    }


    public function testInit()
    {
        $this->cleanDirs();
    }
    public function error_handler($errno, $errstr, $errfile, $errline, $errcontext)
    {
        $this->_errors[] = $errfile . ' line ' . $errline;
    }

    public function testMuted()
    {
        set_error_handler(array($this, 'error_handler'));
        Smarty::muteExpectedErrors();

        $this->smarty->clearCache('default.tpl');
        $this->smarty->clearCompiledTemplate('default.tpl');
        $this->smarty->fetch('default.tpl');

        $this->assertEquals($this->_errors, array());

        @filemtime('ckxladanwijicajscaslyxck');
        $error = array(__FILE__ . ' line ' . (__LINE__ - 1));
        $this->assertEquals($this->_errors, $error);

        Smarty::unmuteExpectedErrors();
        restore_error_handler();
    }

    /**
     *
     * @rrunInSeparateProcess
     *
     */
    public function testUnmuted()
    {
        set_error_handler(array($this, 'error_handler'));

        $this->smarty->clearCache('default.tpl');
        $this->smarty->clearCompiledTemplate('default.tpl');
        $this->smarty->fetch('default.tpl');

        $this->assertEquals(Smarty::$_IS_WINDOWS ? 5 : 4, count($this->_errors));

        @filemtime('ckxladanwijicajscaslyxck');
        $this->assertEquals(Smarty::$_IS_WINDOWS ? 6 : 5, count($this->_errors));

        restore_error_handler();
    }

    /**
     *
     * @run InSeparateProcess
     * @preserveGlobalState disabled
     *
     */
    public function testMutedCaching()
    {
        set_error_handler(array($this, 'error_handler'));
        Smarty::muteExpectedErrors();

        $this->smarty->caching = true;
        $this->smarty->clearCache('default.tpl');
        $this->smarty->clearCompiledTemplate('default.tpl');
        $this->smarty->fetch('default.tpl');

        $this->assertEquals($this->_errors, array());

        @filemtime('ckxladanwijicajscaslyxck');
        $error = array(__FILE__ . ' line ' . (__LINE__ - 1));
        $this->assertEquals($error, $this->_errors);

        Smarty::unmuteExpectedErrors();
        restore_error_handler();
    }

    /**
     * @run InSeparateProcess
     * @preserveGlobalState disabled
     *
     */
    public function testUnmutedCaching()
    {
        set_error_handler(array($this, 'error_handler'));

        $this->smarty->caching = true;
        $this->smarty->clearCache('default.tpl');
        $this->smarty->clearCompiledTemplate('default.tpl');
        $this->smarty->fetch('default.tpl');

        $this->assertEquals(Smarty::$_IS_WINDOWS ? 7 : 5, count($this->_errors));

        @filemtime('ckxladanwijicajscaslyxck');
        $error = array(__FILE__ . ' line ' . (__LINE__ - 1));
        $this->assertEquals(Smarty::$_IS_WINDOWS ? 8 : 6, count($this->_errors));

        restore_error_handler();
    }
}
