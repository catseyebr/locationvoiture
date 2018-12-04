<?php

namespace Carroaluguel\Models\Localidade;


use Carroaluguel\Models\LocalidadeFacade;

class Aeroporto
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $sigla;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $nomelt;

    /**
     * @var Cidade
     */
    private $cidade;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var string
     */
    private $facilidade;

    /**
     * @var string
     */
    private $endereco;

    /**
     * @var string
     */
    private $fone;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    private $pabx;

    /**
     * @var string
     */
    private $cep;

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

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
     * @return Aeroporto
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * @param string $sigla
     * @return Aeroporto
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
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
     * @return Aeroporto
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomelt()
    {
        return $this->nomelt;
    }

    /**
     * @param string $nomelt
     * @return Aeroporto
     */
    public function setNomelt($nomelt)
    {
        $this->nomelt = $nomelt;
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
     * @return Aeroporto
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
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
     * @return Aeroporto
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return string
     */
    public function getFacilidade()
    {
        return $this->facilidade;
    }

    /**
     * @param string $facilidade
     * @return Aeroporto
     */
    public function setFacilidade($facilidade)
    {
        $this->facilidade = $facilidade;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param string $endereco
     * @return Aeroporto
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return string
     */
    public function getFone()
    {
        return $this->fone;
    }

    /**
     * @param string $fone
     * @return Aeroporto
     */
    public function setFone($fone)
    {
        $this->fone = $fone;
        return $this;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return Aeroporto
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return string
     */
    public function getPabx()
    {
        return $this->pabx;
    }

    /**
     * @param string $pabx
     * @return Aeroporto
     */
    public function setPabx($pabx)
    {
        $this->pabx = $pabx;
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
     * @return Aeroporto
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return Aeroporto
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return Aeroporto
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }


}