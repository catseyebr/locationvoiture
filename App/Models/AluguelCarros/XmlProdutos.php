<?php

namespace Carroaluguel\Models\AluguelCarros;


use Core\DateTimeUnit;

class XmlProdutos
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $categoria;

    /**
     * @var int
     */
    private $locadora;

    /**
     * @var string
     */
    private $nomelocadora;

    /**
     * @var int
     */
    private $cidade;

    /**
     * @var string
     */
    private $nomecidade;

    /**
     * @var int
     */
    private $grupo;

    /**
     * @var string
     */
    private $idgrupo;

    /**
     * @var string
     */
    private $nomegrupo;

    /**
     * @var string
     */
    private $bigimage;

    /**
     * @var string
     */
    private $smallimage;

    /**
     * @var string
     */
    private $producturl;

    /**
     * @var float
     */
    private $valor;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var string
     */
    private $categoryid1;

    /**
     * @var string
     */
    private $categoryid2;

    /**
     * @var DateTimeUnit
     */
    private $data;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return XmlProdutos
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param int $categoria
     * @return XmlProdutos
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
        return $this;
    }

    /**
     * @return int
     */
    public function getLocadora()
    {
        return $this->locadora;
    }

    /**
     * @param int $locadora
     * @return XmlProdutos
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomelocadora()
    {
        return $this->nomelocadora;
    }

    /**
     * @param string $nomelocadora
     * @return XmlProdutos
     */
    public function setNomelocadora($nomelocadora)
    {
        $this->nomelocadora = $nomelocadora;
        return $this;
    }

    /**
     * @return int
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param int $cidade
     * @return XmlProdutos
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomecidade()
    {
        return $this->normaliza($this->nomecidade);
    }

    /**
     * @param string $nomecidade
     * @return XmlProdutos
     */
    public function setNomecidade($nomecidade)
    {
        $this->nomecidade = $nomecidade;
        return $this;
    }

    /**
     * @return int
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * @param int $grupo
     * @return XmlProdutos
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdgrupo()
    {
        return $this->idgrupo;
    }

    /**
     * @param string $idgrupo
     * @return XmlProdutos
     */
    public function setIdgrupo($idgrupo)
    {
        $this->idgrupo = $idgrupo;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomegrupo()
    {
        return $this->nomegrupo;
    }

    /**
     * @param string $nomegrupo
     * @return XmlProdutos
     */
    public function setNomegrupo($nomegrupo)
    {
        $this->nomegrupo = $nomegrupo;
        return $this;
    }

    /**
     * @return string
     */
    public function getBigimage()
    {
        return $this->bigimage;
    }

    /**
     * @param string $bigimage
     * @return XmlProdutos
     */
    public function setBigimage($bigimage)
    {
        $this->bigimage = $bigimage;
        return $this;
    }

    /**
     * @return string
     */
    public function getSmallimage()
    {
        return $this->smallimage;
    }

    /**
     * @param string $smallimage
     * @return XmlProdutos
     */
    public function setSmallimage($smallimage)
    {
        $this->smallimage = $smallimage;
        return $this;
    }

    /**
     * Retorna a url do produto da entrada do xml
     *
     * @return string
     */
    public function getUrl()
    {
        return str_replace('&', '&amp;', $this->producturl);
    }

    /**
     * Retorna a url do produto limpa da entrada do xml
     *
     * @return string
     */
    public function getUrlNorm()
    {
        return str_replace('&', '&amp;', $this->normaliza($this->producturl));
    }

    /**
     * @param string $producturl
     * @return XmlProdutos
     */
    public function setUrl($producturl)
    {
        $this->producturl = $producturl;
        return $this;
    }

    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     * @return XmlProdutos
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return XmlProdutos
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory1()
    {
        $this->normaliza($this->categoryid1);
    }

    /**
     * @param string $categoryid1
     * @return XmlProdutos
     */
    public function setCategory1($categoryid1)
    {
        $this->categoryid1 = $categoryid1;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory2()
    {
        $this->normaliza($this->categoryid2);
    }

    /**
     * @param string $categoryid2
     * @return XmlProdutos
     */
    public function setCategory2($categoryid2)
    {
        $this->categoryid2 = $categoryid2;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param DateTimeUnit $data
     * @return XmlProdutos
     */
    public function setData($data)
    {
        $this->data = new DateTimeUnit($data);
        return $this;
    }

    function normaliza($string)
    {
        $a = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ";
        $b = "AAAAAAACEEEEIIIIDNOOOOOOUUUUYbsaaaaaaaceeeeiiiidnoooooouuuyyby--";
        $string = utf8_decode($string);
        $string = strtr($string, utf8_decode($a), $b);
        return utf8_encode($string);
    }

    /**
     * Retorna o id, sem acentos para uso no xml
     *
     * @return string
     */
    public function getIdString()
    {
        $id_string = $this->getCategory2() . ' - ' . $this->getNomeCidade();
        return str_replace('+', '', $this->normaliza($id_string));
    }

    /**
     * Retorna o id, sem acentos para uso no xml
     *
     * @return string
     */
    public function getNomeString()
    {
        $id_string = $this->getNomeCidade() . ' - ' . $this->getCategory2();
        return str_replace('+', '', $this->normaliza($id_string));
    }
}