<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Core\DateTimeUnit;

class TarifaProtecao extends Tarifa
{
    /**
     * @var Protecao
     */
    private $protecao;

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
     * @return TarifaProtecao
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
     * @return TarifaProtecao
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
     * @return TarifaProtecao
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
     * @return TarifaProtecao
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
     * @return TarifaProtecao
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
     * @return TarifaProtecao
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
     * @return TarifaProtecao
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
     * @return TarifaProtecao
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
     * @return TarifaProtecao
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return Protecao
     */
    public function getProtecao()
    {
        if(!is_object($this->protecao) && $this->protecao){
            $this->protecao = $this->aluguelcarros->showProtecao($this->protecao);
        }
        return $this->protecao;
    }

    /**
     * @param Protecao $protecao
     * @return TarifaProtecao
     */
    public function setProtecao($protecao)
    {
        $this->protecao = $protecao;
        return $this;
    }

}