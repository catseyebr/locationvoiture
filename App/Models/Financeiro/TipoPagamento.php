<?php

namespace Carroaluguel\Models\Financeiro;


use Carroaluguel\Models\FinanceiroFacade;

class TipoPagamento
{
    /**
     * @var integer
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
     * @var Movimentacao[]
     */
    private $movimentacoes;

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
     * @return TipoPagamento
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
     * @return TipoPagamento
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
     * @return TipoPagamento
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return Movimentacao[]
     */
    public function getMovimentacoes()
    {
        if (!is_array($this->movimentacoes)) {
            $this->movimentacoes = $this->financeiro->listMovimentacoes(array('tipopagamento' => $this->id));
        }
        return $this->movimentacoes;
    }

    /**
     * @param Movimentacao[] $movimentacoes
     * @return TipoPagamento
     */
    public function setMovimentacoes($movimentacoes)
    {
        $this->movimentacoes = $movimentacoes;
        return $this;
    }

}