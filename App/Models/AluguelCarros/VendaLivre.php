<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Core\DateTimeUnit;

class VendaLivre
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Grupo
     */
    private $grupo;

    /**
     * @var int
     */
    private $horasValidade;

    /**
     * @var bool
     */
    private $ativo;

    /**
     * @var DateTimeUnit
     */
    private $dataValidadeInicial;

    /**
     * @var DateTimeUnit
     */
    private $dataValidadeFinal;

    /**
     * @var DateTimeUnit
     */
    private $dataRetiradaInicial;

    /**
     * @var DateTimeUnit
     */
    private $dataRetiradaFinal;

    /**
     * @var array
     */
    private $lojas;

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
     * @return VendaLivre
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @param Grupo $grupo
     * @return VendaLivre
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
        return $this;
    }

    /**
     * @return int
     */
    public function getHorasValidade()
    {
        return $this->horasValidade;
    }

    /**
     * @param int $horasValidade
     * @return VendaLivre
     */
    public function setHorasValidade($horasValidade)
    {
        $this->horasValidade = $horasValidade;
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
     * @return VendaLivre
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataValidadeInicial()
    {
        return $this->dataValidadeInicial;
    }

    /**
     * @param DateTimeUnit $dataValidadeInicial
     * @return VendaLivre
     */
    public function setDataValidadeInicial($dataValidadeInicial)
    {
        $this->dataValidadeInicial = new DateTimeUnit($dataValidadeInicial);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataValidadeFinal()
    {
        return $this->dataValidadeFinal;
    }

    /**
     * @param DateTimeUnit $dataValidadeFinal
     * @return VendaLivre
     */
    public function setDataValidadeFinal($dataValidadeFinal)
    {
        $this->dataValidadeFinal = new DateTimeUnit($dataValidadeFinal);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataRetiradaInicial()
    {
        return $this->dataRetiradaInicial;
    }

    /**
     * @param DateTimeUnit $dataRetiradaInicial
     * @return VendaLivre
     */
    public function setDataRetiradaInicial($dataRetiradaInicial)
    {
        $this->dataRetiradaInicial = new DateTimeUnit($dataRetiradaInicial);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataRetiradaFinal()
    {
        return $this->dataRetiradaFinal;
    }

    /**
     * @param DateTimeUnit $dataRetiradaFinal
     * @return VendaLivre
     */
    public function setDataRetiradaFinal($dataRetiradaFinal)
    {
        $this->dataRetiradaFinal = new DateTimeUnit($dataRetiradaFinal);
        return $this;
    }

    /**
     * @return array
     */
    public function getLojas()
    {
        return $this->lojas;
    }

    /**
     * @param string $lojas
     * @return VendaLivre
     */
    public function setLojas($lojas)
    {
        $lojs_list = null;
        if ($lojas) {
            $lojs_list = explode(',', $lojas);
        }
        $this->lojas = $lojs_list;
        return $this;
    }


}