<?php

namespace Carroaluguel\Models\Financeiro;

class StatusVenda
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return StatusVenda
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
     * @return StatusVenda
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
     * @return StatusVenda
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
        return $this->movimentacoes;
    }

    /**
     * @param Movimentacao[] $movimentacoes
     * @return StatusVenda
     */
    public function setMovimentacoes($movimentacoes)
    {
        $this->movimentacoes = $movimentacoes;
        return $this;
    }

}