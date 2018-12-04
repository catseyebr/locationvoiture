<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;

class ContatoLojaAdmin
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Loja
     */
    private $loja;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $celular;

    /**
     * @var bool
     */
    private $ativo;

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
     * @return ContatoLojaAdmin
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Loja
     */
    public function getLoja()
    {
        if(!is_object($this->loja) && $this->loja){
            $this->loja = $this->aluguelcarros->showLoja($this->loja);
        }
        return $this->loja;
    }

    /**
     * @param Loja $loja
     * @return ContatoLojaAdmin
     */
    public function setLoja($loja)
    {
        $this->loja = $loja;
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
     * @return ContatoLojaAdmin
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return ContatoLojaAdmin
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param string $celular
     * @return ContatoLojaAdmin
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
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
     * @return ContatoLojaAdmin
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }


}