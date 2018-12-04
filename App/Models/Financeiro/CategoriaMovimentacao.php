<?php

namespace Carroaluguel\Models\Financeiro;


use Carroaluguel\Models\FinanceiroFacade;

class CategoriaMovimentacao
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
     * @var integer
     */
    private $idpai;

    /**
     * Valores possíveis: 1 = receitas, 2 = despesas
     *
     * @var integer
     */
    private $tipo;

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
     * @return CategoriaMovimentacao
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
     * @return CategoriaMovimentacao
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
     * @return CategoriaMovimentacao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return CategoriaMovimentacao
     */
    public function getIdpai()
    {
        if (!is_object($this->idpai) && $this->idpai) {
            $this->idpai = $this->financeiro->showCategoriaMovimentacao($this->idpai);
        }
        return $this->idpai;
    }

    /**
     * @param int $idpai
     * @return CategoriaMovimentacao
     */
    public function setIdpai($idpai)
    {
        $this->idpai = $idpai;
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
     * Define o tipo de movimentação
     *
     * 1 = Receita
     * 2 = Despesa
     *
     * @param int $tipo
     * @return CategoriaMovimentacao
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return Movimentacao[]
     */
    public function getMovimentacoes()
    {
        if (!is_array($this->movimentacoes)) {
            $this->movimentacoes = $this->financeiro->listMovimentacoes(array('categoria' => $this->id));
        }
        return $this->movimentacoes;
    }

    /**
     * @param Movimentacao[] $movimentacoes
     * @return CategoriaMovimentacao
     */
    public function setMovimentacoes($movimentacoes)
    {
        $this->movimentacoes = $movimentacoes;
        return $this;
    }

}