<?php

namespace Carroaluguel\Models\AluguelCarros;


use Core\DateTimeUnit;

class Feriado
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var bool
     */
    private $atendimento;

    /**
     * @var DateTimeUnit
     */
    private $data;

    /**
     * @var bool
     */
    private $nacional;

    /**
     * @var array
     */
    private $local;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Feriado
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
     * @return Feriado
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
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
     * @return Feriado
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAtendimento()
    {
        return $this->atendimento;
    }

    /**
     * @param bool $atendimento
     * @return Feriado
     */
    public function setAtendimento($atendimento)
    {
        $this->atendimento = $atendimento;
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
     * @return Feriado
     */
    public function setData($data)
    {
        $this->data = New DateTimeUnit($data);
        return $this;
    }

    /**
     * @return bool
     */
    public function getNacional()
    {
        return $this->nacional;
    }

    /**
     * @param bool $nacional
     * @return Feriado
     */
    public function setNacional($nacional)
    {
        $this->nacional = $nacional;
        return $this;
    }

    /**
     * @return array
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param array $local
     * @return Feriado
     */
    public function setLocal($local)
    {
        $this->local = $local;
        return $this;
    }


}