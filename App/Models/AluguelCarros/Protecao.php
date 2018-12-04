<?php

namespace Carroaluguel\Models\AluguelCarros;


class Protecao
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
    private $descricao;

    /**
     * @var Locadora
     */
    private $locadora;

    /**
     * @var int
     */
    private $locadoraid;

    /**
     * @var int
     */
    private $ota;

    /**
     * @var bool
     */
    private $ativo;

    /**
     * @var int
     */
    private $ordem;

    /**
     * @var bool
     */
    private $hora_extra;

    /**
     * @var int
     */
    private $limite_horas;

    /**
     * @var int
     */
    private $div_hora_extra;

    /**
     * @var array
     */
    private $grupos;

    /**
     * @var array integer
     */
    private $grupos_id;

    /**
     * @var string
     */
    private $lista_grupos;

    /**
     * @var array
     */
    private $tarifas;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Protecao
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
     * @return Protecao
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
     * @return Protecao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return Locadora
     */
    public function getLocadora()
    {
        return $this->locadora;
    }

    /**
     * @param Locadora $locadora
     * @return Protecao
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        return $this;
    }

    /**
     * @return int
     */
    public function getLocadoraid()
    {
        return $this->locadoraid;
    }

    /**
     * @param int $locadoraid
     * @return Protecao
     */
    public function setLocadoraid($locadoraid)
    {
        $this->locadoraid = $locadoraid;
        return $this;
    }

    /**
     * @return int
     */
    public function getOta()
    {
        return $this->ota;
    }

    /**
     * @param int $ota
     * @return Protecao
     */
    public function setOta($ota)
    {
        $this->ota = $ota;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param bool $ativo
     * @return Protecao
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrdem()
    {
        return $this->ordem;
    }

    /**
     * @param int $ordem
     * @return Protecao
     */
    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHoraExtra()
    {
        return $this->hora_extra;
    }

    /**
     * @param bool $hora_extra
     * @return Protecao
     */
    public function setHoraExtra($hora_extra)
    {
        $this->hora_extra = $hora_extra;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimiteHoras()
    {
        return $this->limite_horas;
    }

    /**
     * @param int $limite_horas
     * @return Protecao
     */
    public function setLimiteHoras($limite_horas)
    {
        $this->limite_horas = $limite_horas;
        return $this;
    }

    /**
     * @return int
     */
    public function getDivHoraExtra()
    {
        return $this->div_hora_extra;
    }

    /**
     * @param int $div_hora_extra
     * @return Protecao
     */
    public function setDivHoraExtra($div_hora_extra)
    {
        $this->div_hora_extra = $div_hora_extra;
        return $this;
    }

    /**
     * @return array
     */
    public function getGrupos()
    {
        return $this->grupos;
    }

    /**
     * @param array $grupos
     * @return Protecao
     */
    public function setGrupos($grupos)
    {
        $this->grupos = $grupos;
        return $this;
    }

    /**
     * @return array
     */
    public function getGruposId()
    {
        return $this->grupos_id;
    }

    /**
     * @param array $grupos_id
     * @return Protecao
     */
    public function setGruposId($grupos_id)
    {
        $this->grupos_id = $grupos_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getListaGrupos()
    {
        return $this->lista_grupos;
    }

    /**
     * @param string $lista_grupos
     * @return Protecao
     */
    public function setListaGrupos($lista_grupos)
    {
        $this->lista_grupos = $lista_grupos;
        return $this;
    }

    /**
     * @return array
     */
    public function getTarifas()
    {
        return $this->tarifas;
    }

    /**
     * @param array $tarifas
     * @return Protecao
     */
    public function setTarifas($tarifas)
    {
        $this->tarifas = $tarifas;
        return $this;
    }


}