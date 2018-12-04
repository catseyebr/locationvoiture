<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;

class Franquia
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Locadora
     */
    private $locadora;

    /**
     * @var int
     */
    private $locadora_id;

    /**
     * @var Grupo
     */
    private $grupo;

    /**
     * @var int
     */
    private $grupo_id;

    /**
     * @var Protecao
     */
    private $protecao;

    /**
     * @var int
     */
    private $protecao_id;

    /**
     * @var string
     */
    private $franquia;

    /**
     * @var string
     */
    private $franquia_terceiros;

    /**
     * @var string
     */
    private $caucao;

    /**
     * @var AluguelCarrosFacade
     */
    private $aluguelcarros;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->aluguelcarros = $facade;
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
     * @return Franquia
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Locadora
     */
    public function getLocadora()
    {
        if (!is_object($this->locadora) && $this->locadora) {
            $this->locadora = $this->aluguelcarros->showLocadora($this->locadora);
        }
        return $this->locadora;
    }

    /**
     * @param int $locadora
     * @return Franquia
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        $this->setLocadoraId($locadora);
        return $this;
    }

    /**
     * @return int
     */
    public function getLocadoraId()
    {
        return $this->locadora_id;
    }

    /**
     * @param int $locadora_id
     * @return Franquia
     */
    public function setLocadoraId($locadora_id)
    {
        $this->locadora_id = $locadora_id;
        return $this;
    }

    /**
     * @return Grupo
     */
    public function getGrupo()
    {
        if (!is_object($this->grupo) && $this->grupo) {
            $this->grupo = $this->aluguelcarros->showGrupo($this->grupo);
        }
        return $this->grupo;
    }

    /**
     * @param int $grupo
     * @return Franquia
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
        $this->setGrupoId($grupo);
        return $this;
    }

    /**
     * @return int
     */
    public function getGrupoId()
    {
        return $this->grupo_id;
    }

    /**
     * @param int $grupo_id
     * @return Franquia
     */
    public function setGrupoId($grupo_id)
    {
        $this->grupo_id = $grupo_id;
        return $this;
    }

    /**
     * @return Protecao
     */
    public function getProtecao()
    {
        if (!is_object($this->protecao) && $this->protecao) {
            $this->protecao = $this->aluguelcarros->showProtecao($this->protecao);
        }
        return $this->protecao;
    }

    /**
     * @param int $protecao
     * @return Franquia
     */
    public function setProtecao($protecao)
    {
        $this->protecao = $protecao;
        $this->setProtecaoId($protecao);
        return $this;
    }

    /**
     * @return int
     */
    public function getProtecaoId()
    {
        return $this->protecao_id;
    }

    /**
     * @param int $protecao_id
     * @return Franquia
     */
    public function setProtecaoId($protecao_id)
    {
        $this->protecao_id = $protecao_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFranquia()
    {
        return $this->franquia;
    }

    /**
     * @param string $franquia
     * @return Franquia
     */
    public function setFranquia($franquia)
    {
        $this->franquia = $franquia;
        return $this;
    }

    /**
     * @return string
     */
    public function getFranquiaTerceiros()
    {
        return $this->franquia_terceiros;
    }

    /**
     * @param string $franquia_terceiros
     * @return Franquia
     */
    public function setFranquiaTerceiros($franquia_terceiros)
    {
        $this->franquia_terceiros = $franquia_terceiros;
        return $this;
    }

    /**
     * @return string
     */
    public function getCaucao()
    {
        return $this->caucao;
    }

    /**
     * @param string $caucao
     * @return Franquia
     */
    public function setCaucao($caucao)
    {
        $this->caucao = $caucao;
        return $this;
    }

}