<?php

namespace Carroaluguel\Models\AluguelCarros;


use Core\DateTimeUnit;

class BloqueioCliente
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $cpf;
    /**
     * @var string
     */
    private $motivo;
    /**
     * @var bool
     */
    private $ativo;
    /**
     * @var int
     */
    private $operador;
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
     * @return BloqueioCliente
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     * @return BloqueioCliente
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return string
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * @param string $motivo
     * @return BloqueioCliente
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param bool $ativo
     * @return BloqueioCliente
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return int
     */
    public function getOperador()
    {
        return $this->operador;
    }

    /**
     * @param int $operador
     * @return BloqueioCliente
     */
    public function setOperador($operador)
    {
        $this->operador = $operador;
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
     * @return BloqueioCliente
     */
    public function setData($data)
    {
        $this->data = new DateTimeUnit($data);
        return $this;
    }

}