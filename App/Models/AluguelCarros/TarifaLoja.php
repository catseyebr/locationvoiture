<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;

class TarifaLoja extends TarifaGrupo
{
    /**
     * @var Loja
     */
    private $loja;
    /**
     * @var Grupo
     */
    private $grupo;
    /**
     * @var int
     */
    private $grupo_id;
    /**
     * @var int
     */
    private $loja_id;
    /**
     * @var int
     */
    private $tarifaloja_id;

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
     * @return Loja
     */
    public function getLoja()
    {
        if (!is_object($this->loja) && $this->loja) {
            $this->loja = $this->aluguelcarros->showLoja($this->loja);
        }
        return $this->loja;
    }

    /**
     * @param int $loja
     * @return TarifaLoja
     */
    public function setLoja($loja)
    {
        $this->loja = $loja;
        $this->setLojaId($loja);
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
     * @return TarifaLoja
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
     * @return TarifaLoja
     */
    public function setGrupoId($grupo_id)
    {
        $this->grupo_id = $grupo_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getLojaId()
    {
        return $this->loja_id;
    }

    /**
     * @param int $loja_id
     * @return TarifaLoja
     */
    public function setLojaId($loja_id)
    {
        $this->loja_id = $loja_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getTarifalojaId()
    {
        return $this->tarifaloja_id;
    }

    /**
     * @param int $tarifaloja_id
     * @return TarifaLoja
     */
    public function setTarifalojaId($tarifaloja_id)
    {
        $this->tarifaloja_id = $tarifaloja_id;
        return $this;
    }

}