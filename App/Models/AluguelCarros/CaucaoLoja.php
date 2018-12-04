<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;

class CaucaoLoja
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $grupo;
    /**
     * @var int
     */
    private $loja;
    /**
     * @var string
     */
    private $valor;

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
     * @return CaucaoLoja
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * Retorna o objeto do grupo da caução
     * @return Grupo
     */
    public function getGrupoObj()
    {
        $grupo = null;
        if ($this->grupo) {
            $grupo = $this->aluguelcarros->showGrupo($this->grupo);
        }
        return $grupo;
    }

    /**
     * @param int $grupo
     * @return CaucaoLoja
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
        return $this;
    }

    /**
     * @return int
     */
    public function getLoja()
    {
        return $this->loja;
    }

    /**
     * @param int $loja
     * @return CaucaoLoja
     */
    public function setLoja($loja)
    {
        $this->loja = $loja;
        return $this;
    }

    /**
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param string $valor
     * @return CaucaoLoja
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

}