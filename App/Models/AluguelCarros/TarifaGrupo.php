<?php

namespace Carroaluguel\Models\AluguelCarros;


use Core\DateTimeUnit;

class TarifaGrupo extends Tarifa
{
    /**
     * @var float
     */
    private $dia_extra;
    /**
     * @var string
     */
    private $km;
    /**
     * @var int
     */
    private $ordem;
    /**
     * @var bool
     */
    private $tarifa_exclusiva;
    /**
     * @var int
     */
    private $grupo;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return TarifaGrupo
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getDiaInicial()
    {
        return $this->dia_inicial;
    }

    /**
     * @param int $dia_inicial
     * @return TarifaGrupo
     */
    public function setDiaInicial($dia_inicial)
    {
        $this->dia_inicial = $dia_inicial;
        return $this;
    }

    /**
     * @return int
     */
    public function getDiaFinal()
    {
        return $this->dia_final;
    }

    /**
     * @param int $dia_final
     * @return TarifaGrupo
     */
    public function setDiaFinal($dia_final)
    {
        $this->dia_final = $dia_final;
        return $this;
    }

    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     * @return TarifaGrupo
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getValidadeInicial()
    {
        return $this->validade_inicial;
    }

    /**
     * @param string $validade_inicial
     * @return TarifaGrupo
     */
    public function setValidadeInicial($validade_inicial)
    {
        $this->validade_inicial = new DateTimeUnit($validade_inicial);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getValidadeFinal()
    {
        return $this->validade_final;
    }

    /**
     * @param string $validade_final
     * @return TarifaGrupo
     */
    public function setValidadeFinal($validade_final)
    {
        $this->validade_final = new DateTimeUnit($validade_final);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * @param string $data_cadastro
     * @return TarifaGrupo
     */
    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = new DateTimeUnit($data_cadastro);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataAtualizacao()
    {
        return $this->data_atualizacao;
    }

    /**
     * @param string $data_atualizacao
     * @return TarifaGrupo
     */
    public function setDataAtualizacao($data_atualizacao)
    {
        $this->data_atualizacao = new DateTimeUnit($data_atualizacao);
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
     * @return TarifaGrupo
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiaExtra()
    {
        return $this->dia_extra;
    }

    /**
     * @param float $dia_extra
     * @return TarifaGrupo
     */
    public function setDiaExtra($dia_extra)
    {
        $this->dia_extra = $dia_extra;
        return $this;
    }

    /**
     * @return string
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * @param string $km
     * @return TarifaGrupo
     */
    public function setKm($km)
    {
        $this->km = $km;
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
     * @return TarifaGrupo
     */
    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;
        return $this;
    }

    /**
     * @return bool
     */
    public function getTarifaExclusiva()
    {
        return $this->tarifa_exclusiva;
    }

    /**
     * @param bool $tarifa_exclusiva
     * @return TarifaGrupo
     */
    public function setTarifaExclusiva($tarifa_exclusiva)
    {
        $this->tarifa_exclusiva = $tarifa_exclusiva;
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
     * @param int $grupo
     * @return TarifaGrupo
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
        return $this;
    }

}