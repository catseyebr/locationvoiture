<?php

namespace Carroaluguel\Models\Localidade;


use Carroaluguel\Models\LocalidadeFacade;

class Cep
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var Cidade
     */
    private $cidade;
    /**
     * @var string
     */
    private $rua;
    /**
     * @var
     */
    private $bairro;
    /**
     * @var int
     */
    private $codigo;
    /**
     * @var string
     */
    private $complemento;
    /**
     * @var string
     */
    private $tipo;
    /**
     * @var
     */
    private $estado;

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
     * @return Cep
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Cep
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
     * @return Cep
     */
    public function setRua($rua)
    {
        $this->rua = $rua;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     * @return Cep
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @return int
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param int $codigo
     * @return Cep
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
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
     * @return Cep
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
        return $this;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     * @return Cep
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     * @return Cep
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }


}