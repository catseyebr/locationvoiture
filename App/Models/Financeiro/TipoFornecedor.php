<?php

namespace Carroaluguel\Models\Financeiro;


class TipoFornecedor
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $sigla;

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
     * @return TipoFornecedor
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
     * @return TipoFornecedor
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * @param string $sigla
     * @return TipoFornecedor
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
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
     * @return TipoFornecedor
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
     * @return TipoFornecedor
     */
    public function setMovimentacoes($movimentacoes)
    {
        $this->movimentacoes = $movimentacoes;
        return $this;
    }
}