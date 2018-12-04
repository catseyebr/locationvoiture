<?php

namespace Carroaluguel\Models\AluguelCarros;


use Core\DateTimeUnit;

abstract class Tarifa
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var int
     */
    protected $dia_inicial;
    /**
     * @var int
     */
    protected $dia_final;
    /**
     * @var float
     */
    protected $valor;
    /**
     * @var DateTimeUnit
     */
    protected $validade_inicial;
    /**
     * @var DateTimeUnit
     */
    protected $validade_final;
    /**
     * @var DateTimeUnit
     */
    protected $data_cadastro;
    /**
     * @var DateTimeUnit
     */
    protected $data_atualizacao;
    /**
     * @var bool
     */
    protected $ativo;

    abstract public function getId();

    abstract public function setId($id);

    abstract public function getDiaInicial();

    abstract public function setDiaInicial($dia_inicial);

    abstract public function getDiaFinal();

    abstract public function setDiaFinal($dia_final);

    abstract public function getValor();

    abstract public function setValor($valor);

    abstract public function getValidadeInicial();

    abstract public function setValidadeInicial($validade_inicial);

    abstract public function getValidadeFinal();

    abstract public function setValidadeFinal($validade_final);

    abstract public function getDataCadastro();

    abstract public function setDataCadastro($data_cadastro);

    abstract public function getDataAtualizacao();

    abstract public function setDataAtualizacao($data_atualizacao);

    abstract public function getAtivo();

    abstract public function setAtivo($ativo);

}