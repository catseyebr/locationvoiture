<?php

namespace Core;


use MatthiasMullie\Minify\CSS;
use MatthiasMullie\Minify\JS;

class Resources
{
    /**
     * @var array
     */
    protected $css;
    /**
     * @var array
     */
    protected $js;
    protected $raw_css;
    protected $raw_js;
    protected $raw_headjs;
    protected $raw_bodyjs;
    protected $raw_functions;
    protected $_js = array();
    protected $_css = array();
    protected $_async = array();
    protected $_headjs = array();
    protected $_bodyjs = array();
    protected $_functions = array();

    public function add($type, $archive, $function = null)
    {
        if (!empty ($archive)) {
            switch (strtolower($type)) {
                case 'css':
                    $this->_css[] = $archive;
                    break;
                case 'js':
                    $this->_js[] = $archive;
                    break;
                case 'async':
                    $this->_async[] = $archive;
                    break;
                case 'headjs':
                    $this->_headjs[] = $archive;
                    break;
                case 'bodyjs':
                    $this->_bodyjs[] = $archive;
                    break;


            }
        }
        if (!empty ($function)) {
            $this->_functions[] = $function;
        }
        return $this;
    }

    public function genRaw()
    {
        for ($i = 0, $s = count($this->_js) - 1; $i <= $s; $i++) {
            $this->raw_js .= "<script src='" . $this->_js[$i] . "' type='text/javascript'></script>\r\n";
        }
        for ($i = 0, $s = count($this->_async) - 1; $i <= $s; $i++) {
            $this->raw_js .= "<script src='" . $this->_async[$i] . "' type='text/javascript' async defer></script>\r\n";
        }
        for ($i = 0, $s = count($this->_headjs) - 1; $i <= $s; $i++) {
            $this->raw_headjs .= "<script src='" . $this->_headjs[$i] . "' type='text/javascript'></script>\r\n";
        }
        for ($i = 0, $s = count($this->_bodyjs) - 1; $i <= $s; $i++) {
            $this->raw_bodyjs .= "<script src='" . $this->_bodyjs[$i] . "' type='text/javascript'></script>\r\n";
        }
        for ($i = 0, $s = count($this->_css) - 1; $i <= $s; $i++) {
            $this->raw_css .= "<link rel='stylesheet' type='text/css' href='" . $this->_css[$i] . "'/>\r\n";
        }
        if (count($this->_functions) > 0) {
            $this->raw_functions .= "<script type='text/javascript'>\r\n";
            $this->raw_functions .= "  $(document).bind('ready', function(){\r\n";
            for ($i = 0, $s = count($this->_functions) - 1; $i <= $s; $i++) {
                $this->raw_functions .= "   " . $this->_functions[$i] . "\r\n";
            }
            $this->raw_functions .= "  });\r\n";
            $this->raw_functions .= "</script>";
        }
        return $this->raw_functions;
    }

    public function getCss($file)
    {
        $path = __DIR__ . '/../../public_html/css/'.SITE.'/css_minified/'.$file.'.css';
        header ("Content-Type: text/css; charset: UTF-8");
        header('Cache-Control: max-age=300, must-revalidate');
        $offset = 60 * 60;
        $expires = 'Expires: ' . gmdate('D, d M Y H:i:s',time() + $offset) . ' GMT';
        header($expires);
        $css = new CSS();
        for ($i = 0, $s = count($this->_css) - 1; $i <= $s; $i++) {
            if((strpos($this->_css[$i], 'http') !== false) || (strpos($this->_css[$i], 'https') !== false)){
                $ext = $this->getExternal($this->_css[$i]);
                if($ext) {
                    $css->add($ext);
                }
            }else {
                $css->add(substr($this->_css[$i],1));
            }
        }
        return $css->minify($path);
    }

    public function getJs($file)
    {
        $path = __DIR__ . '/../../public_html/js/'.SITE.'/js_minified/'.$file.'.js';
        $js = new JS();
        for ($i = 0, $s = count($this->_js) - 1; $i <= $s; $i++) {
            if((strpos($this->_js[$i], 'http') !== false) || (strpos($this->_js[$i], 'https') !== false)){
                $ext = $this->getExternal($this->_js[$i]);
                if($ext) {
                    $js->add($ext);
                }
            }else {
                $js->add(substr($this->_js[$i],1));
            }
        }
        return $js->minify($path);
    }

    public function toData(){
        $this->genRaw();
        $page_resources = [
            'js' => $this->raw_js,
            'css' => $this->raw_css,
            'functions' => $this->raw_functions,
            'headjs' => $this->raw_headjs,
            'bodyjs' => $this->raw_bodyjs
        ];
        return $page_resources;
    }

    public function getExternal($url){
        return @file_get_contents($url);
    }
}