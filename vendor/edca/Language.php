<?php

namespace Core;

class Language
{
    public $lang;
    public $translation_file;
    public $translation_file_geral;
    public $translation_path;
    public $translation_common;
    public $xml_array;
    public $params;

    function __construct($file, $params = NULL){
        $this->lang = LANGUAGE;
        $this->translation_path = __DIR__ . '/../../Lang/'.SITE.'/'.$file;
        $this->translation_common = __DIR__ . '/../../Lang/'.SITE.'/geral.xml';
        $this->params = $params;
        $this->traduzArquivo();
    }

    function abrirArquivoTraducao(){
        if (file_exists($this->translation_path)){
            $open_file = fopen($this->translation_path, "r");
            $translation_file =  fread($open_file, filesize($this->translation_path));
            fclose($open_file);
            return $translation_file;
        }
        return FALSE;
    }

    function abrirArquivoGeral(){
        if (file_exists($this->translation_common)){
            $open_file = fopen($this->translation_common, "r");
            $translation_file =  fread($open_file, filesize($this->translation_common));
            fclose($open_file);
            return $translation_file;
        }
        return FALSE;
    }

    function lerXmlGeral(){
        $this->translation_file_geral = $this->abrirArquivoGeral();
        if($this->translation_file_geral) {
            $xmlstring = simplexml_load_string($this->translation_file_geral);
            $xml_array = json_decode(json_encode($xmlstring), true);
            return $xml_array;
        }
        return FALSE;
    }

    function lerXml(){
        $this->translation_file = $this->abrirArquivoTraducao();
        if($this->translation_file) {
            $xmlstring = simplexml_load_string($this->translation_file);
            $xml_array = json_decode(json_encode($xmlstring), true);
            return $xml_array;
        }
        return FALSE;
    }

    function traduzArquivo(){
        $xml_array_geral = $this->lerXmlGeral();
        $xml_array_pagina = $this->lerXml();
        if(is_array($xml_array_pagina)) {
            $xml_array = array_merge($xml_array_geral, $xml_array_pagina);
        }else{
            $xml_array = $xml_array_geral;
        }
        $this->xml_array = array();
        if(is_array($xml_array)) {
            foreach($xml_array as $xml_key => $xml_var) {
                foreach($xml_var as $lang_key => $lang_txt) {
                    if($lang_key == $this->lang) {
                        $lang_replace = $lang_txt;
                        if($this->params) {
                            foreach($this->params as $dados_key => $dados_string) {
                                $lang_replace = str_replace('{$'.$dados_key.'}', $dados_string, $lang_replace);
                            }
                        }
                        $lang_replace = $this->converteHtml($lang_replace);
                        $this->xml_array[$xml_key] = $lang_replace;
                    }
                }
            }
            return $this->xml_array;
        }
        return FALSE;
    }

    function getTraducao(){
        return $this->xml_array;
    }

    function converteHtml($lang_replace){
        $tags_encoded = array(
            '{$html.span}',
            '{$html.span_end}',
            '{$html.br}',
            '{$html.b}',
            '{$html.b_end}',
            '{$html.p}',
            '{$html.p_end}'
        );
        $tags_html = array(
            '<span>',
            '</span>',
            '<br>',
            '<b>',
            '</b>',
            '<p>',
            '</p>'
        );
        $lang_replace = str_replace($tags_encoded, $tags_html, $lang_replace);
        return $lang_replace;
    }
}