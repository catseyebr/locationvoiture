<?php

namespace Carroaluguel\Models\Localidade;


use Carroaluguel\Models\LocalidadeFacade;

class Endereco
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $cep;
    /**
     * @var
     */
    private $cidade;
    /**
     * @var string
     */
    private $rua;
    /**
     * @var string
     */
    private $numero;
    /**
     * @var string
     */
    private $complemento;
    /**
     * @var string
     */
    private $bairro;
    /**
     * @var string
     */
    private $latitude;
    /**
     * @var string
     */
    private $longitude;
    /**
     * @var string
     */
    private $cidade_nome;
    /**
     * @var string
     */
    private $estado_abr;
    /**
     * @var string
     */
    private $pais;
    /**
     * @var string
     */
    private $pontoReferencia;

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
     * @return Endereco
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     * @return Endereco
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }

    /**
     * @return Cidade
     */
    public function getCidade()
    {
        if(!is_object($this->cidade) && $this->cidade){
            $cidade = $this->localidade->showCidade($this->cidade);
            $this->cidade = $cidade;
        }
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     * @return Endereco
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return string
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @param string $rua
     * @return Endereco
     */
    public function setRua($rua)
    {
        $this->rua = $rua;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param string $numero
     * @return Endereco
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    /**
     * @return string
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * @param string $complemento
     * @return Endereco
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
        return $this;
    }

    /**
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     * @return Endereco
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     * @return Endereco
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     * @return Endereco
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getCidadeNome()
    {
        return $this->cidade_nome;
    }

    /**
     * @param string $cidade_nome
     * @return Endereco
     */
    public function setCidadeNome($cidade_nome)
    {
        $this->cidade_nome = $cidade_nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getEstadoAbr()
    {
        return $this->estado_abr;
    }

    /**
     * @param string $estado_abr
     * @return Endereco
     */
    public function setEstadoAbr($estado_abr)
    {
        $this->estado_abr = $estado_abr;
        return $this;
    }

    /**
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @param string $pais
     * @return Endereco
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
        return $this;
    }

    /**
     * @return string
     */
    public function getPontoReferencia()
    {
        return $this->pontoReferencia;
    }

    /**
     * @param string $pontoReferencia
     * @return Endereco
     */
    public function setPontoReferencia($pontoReferencia)
    {
        $this->pontoReferencia = $pontoReferencia;
        return $this;
    }

    /**
     * @return string
     */
    public function getEnderecoCompleto (){
        $endereco = $this->rua.", ".$this->numero." ".$this->complemento." - ".$this->bairro." - ".$this->getCidade()->getNome()." - ".$this->getCidade()->getEstado()->getAbreviacao();
        return $endereco;
    }

    /**
     * @return string
     */
    public function getEnderecoRua (){
        $endereco = $this->rua.", ".$this->numero." ".$this->complemento;
        return $endereco;
    }


}