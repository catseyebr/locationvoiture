<?php

namespace Carroaluguel\Models\Localidade;


use Carroaluguel\Models\LocalidadeFacade;

class Cidade
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var string
     */
    private $url_cidade;
    /**
     * @var Estado
     */
    private $estado;
    /**
     * @var string
     */
    private $codigo;
    /**
     * @var string
     */
    private $linkname;
    /**
     * @var string
     */
    private $urlname;
    /**
     * @var string
     */
    private $prefixo_nome;
    /**
     * @var array
     */
    private $metatags;
    /**
     * @var string
     */
    private $texto;
    /**
     * @var array
     */
    private $aeroportos;
    /**
     * @var string
     */
    private $textoh1;
    /**
     * @var string
     */
    private $meta_title;
    /**
     * @var string
     */
    private $meta_description;
    /**
     * @var string
     */
    private $meta_keywords;

    /**
     * @var LocalidadeFacade
     */
    private $localidade;

    public function __construct($facade = NULL)
    {
        if($facade){
            $this->localidade = $facade;
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Cidade
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Cidade
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrlCidade()
    {
        return $this->url_cidade;
    }

    /**
     * @param string $url_cidade
     * @return Cidade
     */
    public function setUrlCidade($url_cidade)
    {
        $this->url_cidade = $url_cidade;
        return $this;
    }

    /**
     * @return Estado
     */
    public function getEstado()
    {
        if(!is_object($this->estado) && $this->estado){
            $estado = $this->localidade->showEstado($this->estado);
            $this->estado = $estado;
        }
        return $this->estado;
    }

    /**
     * @param string $estado
     * @return Cidade
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param string $codigo
     * @return Cidade
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    /**
     * @return string
     */
    public function getLinkname()
    {
        return $this->linkname;
    }

    /**
     * @param string $linkname
     * @return Cidade
     */
    public function setLinkname($linkname)
    {
        $this->linkname = $linkname;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrlname()
    {
        return $this->urlname;
    }

    /**
     * @param string $urlname
     * @return Cidade
     */
    public function setUrlname($urlname)
    {
        $this->urlname = $urlname;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrefixoNome()
    {
        return $this->prefixo_nome;
    }

    /**
     * @param string $prefixo_nome
     * @return Cidade
     */
    public function setPrefixoNome($prefixo_nome)
    {
        $this->prefixo_nome = $prefixo_nome;
        return $this;
    }

    /**
     * @return array
     */
    public function getMetatags()
    {
        return $this->metatags;
    }

    /**
     * @param array $metatags
     * @return Cidade
     */
    public function setMetatags($metatags)
    {
        $this->metatags = $metatags;
        return $this;
    }

    /**
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param string $texto
     * @return Cidade
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
        return $this;
    }

    /**
     * @return array
     */
    public function getAeroportos()
    {
        return $this->aeroportos;
    }

    /**
     * @param array $aeroportos
     * @return Cidade
     */
    public function setAeroportos($aeroportos)
    {
        $this->aeroportos = $aeroportos;
        return $this;
    }

    /**
     * @return string
     */
    public function getTextoh1()
    {
        return $this->textoh1;
    }

    /**
     * @param string $textoh1
     * @return Cidade
     */
    public function setTextoh1($textoh1)
    {
        $this->textoh1 = $textoh1;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * @param string $meta_title
     * @return Cidade
     */
    public function setMetaTitle($meta_title)
    {
        $this->meta_title = $meta_title;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * @param string $meta_description
     * @return Cidade
     */
    public function setMetaDescription($meta_description)
    {
        $this->meta_description = $meta_description;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * @param string $meta_keywords
     * @return Cidade
     */
    public function setMetaKeywords($meta_keywords)
    {
        $this->meta_keywords = $meta_keywords;
        return $this;
    }


}