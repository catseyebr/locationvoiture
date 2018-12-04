<?php

namespace Carroaluguel\Models\Financeiro;


class Produto
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
     * @var string
     */
    private $modulo;

    /**
     * @var Movimentacao[]
     */
    private $movimentacoes;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Produto
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
     * @return Produto
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
     * @return Produto
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return string
     */
    public function getModulo()
    {
        return $this->modulo;
    }

    /**
     * @param string $modulo
     * @return Produto
     */
    public function setModulo($modulo)
    {
        $this->modulo = $modulo;
        return $this;
    }

    /**
     * @return Movimentacao[]
     */
    public function getMovimentacoes()
    {
        return $this->movimentacoes;
    }

    /**
     * @param Movimentacao[] $movimentacoes
     * @return Produto
     */
    public function setMovimentacoes($movimentacoes)
    {
        $this->movimentacoes = $movimentacoes;
        return $this;
    }
}