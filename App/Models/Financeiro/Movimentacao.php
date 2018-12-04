<?php

namespace Carroaluguel\Models\Financeiro;


use Carroaluguel\Models\FinanceiroFacade;
use Core\DateTimeUnit;

class Movimentacao
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $tipo;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var float
     */
    private $valor;

    /**
     * @var DateTimeUnit
     */
    private $dataVencimento;

    /**
     * @var CategoriaMovimentacao
     */
    private $categoria;

    /**
     * @var TipoPagamento
     */
    private $tipoPagamento;

    /**
     * @var Conta
     */
    private $conta;

    /**
     * @var string
     */
    private $parcelamento;

    /**
     * @var DateTimeUnit
     */
    private $dataCadastro;

    /**
     * @var DateTimeUnit
     */
    private $dataQuitacao;

    /**
     * @var Venda
     */
    private $venda;

    /**
     * @var string
     */
    private $fatura;

    /**
     * @var string
     */
    private $idfatura;

    /**
     * @var int
     */
    private $dataQuitacaoId;

    /**
     * @var int
     */
    private $grpCob;

    /**
     * @var FinanceiroFacade
     */
    private $financeiro;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->financeiro = $facade;
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
     * @return Movimentacao
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param int $tipo
     * @return Movimentacao
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
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
     * @return Movimentacao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
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
     * @return Movimentacao
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataVencimento()
    {
        return $this->dataVencimento;
    }

    /**
     * @param DateTimeUnit $dataVencimento
     * @return Movimentacao
     */
    public function setDataVencimento($dataVencimento)
    {
        $this->dataVencimento = $dataVencimento;
        return $this;
    }

    /**
     * @return CategoriaMovimentacao
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param CategoriaMovimentacao $categoria
     * @return Movimentacao
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
        return $this;
    }

    /**
     * @return TipoPagamento
     */
    public function getTipoPagamento()
    {
        if (!is_object($this->tipoPagamento) && $this->tipoPagamento) {
            $this->tipoPagamento = $this->financeiro->showTipoPagamento($this->tipoPagamento);
        }
        return $this->tipoPagamento;
    }

    /**
     * @param TipoPagamento $tipoPagamento
     * @return Movimentacao
     */
    public function setTipoPagamento($tipoPagamento)
    {
        $this->tipoPagamento = $tipoPagamento;
        return $this;
    }

    /**
     * @return Conta
     */
    public function getConta()
    {
        if (!is_object($this->conta) && $this->conta) {
            $this->conta = $this->financeiro->showConta($this->conta);
        }
        return $this->conta;
    }

    /**
     * @param Conta $conta
     * @return Movimentacao
     */
    public function setConta($conta)
    {
        $this->conta = $conta;
        return $this;
    }

    /**
     * @return string
     */
    public function getParcelamento()
    {
        return $this->parcelamento;
    }

    /**
     * @param string $parcelamento
     * @return Movimentacao
     */
    public function setParcelamento($parcelamento)
    {
        $this->parcelamento = $parcelamento;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * @param DateTimeUnit $dataCadastro
     * @return Movimentacao
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataQuitacao()
    {
        return $this->dataQuitacao;
    }

    /**
     * @param DateTimeUnit $dataQuitacao
     * @return Movimentacao
     */
    public function setDataQuitacao($dataQuitacao)
    {
        $this->dataQuitacao = $dataQuitacao;
        return $this;
    }

    /**
     * @return Venda
     */
    public function getVenda()
    {
        return $this->venda;
    }

    /**
     * @param Venda $venda
     * @return Movimentacao
     */
    public function setVenda($venda)
    {
        $this->venda = $venda;
        return $this;
    }

    /**
     * @return string
     */
    public function getFatura()
    {
        return $this->fatura;
    }

    /**
     * @param string $fatura
     * @return Movimentacao
     */
    public function setFatura($fatura)
    {
        $this->fatura = $fatura;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdfatura()
    {
        return $this->idfatura;
    }

    /**
     * @param string $idfatura
     * @return Movimentacao
     */
    public function setIdfatura($idfatura)
    {
        $this->idfatura = $idfatura;
        return $this;
    }

    /**
     * @return int
     */
    public function getDataQuitacaoId()
    {
        return $this->dataQuitacaoId;
    }

    /**
     * @param int $dataQuitacaoId
     * @return Movimentacao
     */
    public function setDataQuitacaoId($dataQuitacaoId)
    {
        $this->dataQuitacaoId = $dataQuitacaoId;
        return $this;
    }

    /**
     * @return int
     */
    public function getGrpCob()
    {
        return $this->grpCob;
    }

    /**
     * @param int $grpCob
     * @return Movimentacao
     */
    public function setGrpCob($grpCob)
    {
        $this->grpCob = $grpCob;
        return $this;
    }

}