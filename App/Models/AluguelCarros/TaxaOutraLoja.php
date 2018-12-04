<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Core\DateTimeUnit;

class TaxaOutraLoja
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $idLojaRetirada;

    /**
     * @var int
     */
    private $idLojaDevolucao;

    /**
     * @var Loja
     */
    private $lojaRetirada;

    /**
     * @var Loja
     */
    private $lojaDevolucao;

    /**
     * @var float
     */
    private $valor;

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
     * @var string
     */
    private $nome;

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
     * @return TaxaOutraLoja
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdLojaRetirada()
    {
        return $this->idLojaRetirada;
    }

    /**
     * @param int $idLojaRetirada
     * @return TaxaOutraLoja
     */
    public function setIdLojaRetirada($idLojaRetirada)
    {
        $this->idLojaRetirada = $idLojaRetirada;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdLojaDevolucao()
    {
        return $this->idLojaDevolucao;
    }

    /**
     * @param int $idLojaDevolucao
     * @return TaxaOutraLoja
     */
    public function setIdLojaDevolucao($idLojaDevolucao)
    {
        $this->idLojaDevolucao = $idLojaDevolucao;
        return $this;
    }

    /**
     * @return Loja
     */
    public function getLojaRetirada()
    {
        if(!is_object($this->lojaRetirada) && $this->lojaRetirada){
            $this->lojaRetirada = $this->aluguelcarros->showLoja($this->lojaRetirada);
        }
        return $this->lojaRetirada;
    }

    /**
     * @param int $lojaRetirada
     * @return TaxaOutraLoja
     */
    public function setLojaRetirada($lojaRetirada)
    {
        $this->lojaRetirada = $lojaRetirada;
        $this->setIdLojaRetirada($lojaRetirada);
        return $this;
    }

    /**
     * @return Loja
     */
    public function getLojaDevolucao()
    {
        if(!is_object($this->lojaDevolucao) && $this->lojaDevolucao){
            $this->lojaDevolucao = $this->aluguelcarros->showLoja($this->lojaDevolucao);
        }
        return $this->lojaDevolucao;
    }

    /**
     * @param int $lojaDevolucao
     * @return TaxaOutraLoja
     */
    public function setLojaDevolucao($lojaDevolucao)
    {
        $this->lojaDevolucao = $lojaDevolucao;
        $this->setIdLojaDevolucao($lojaDevolucao);
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
     * @return TaxaOutraLoja
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
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
     * @return TaxaOutraLoja
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
     * @return TaxaOutraLoja
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
     * @return TaxaOutraLoja
     */
    public function setDataValidadeFinal($dataValidadeFinal)
    {
        $this->dataValidadeFinal = new DateTimeUnit($dataValidadeFinal);
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
     * @return TaxaOutraLoja
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

}