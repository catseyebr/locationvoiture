<?php

namespace Carroaluguel\Models\Utilizador;


use Carroaluguel\Models\UtilizadorFacade;

class TipoContato
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
     * @var Contato[]
     */
    private $contatos;

    /**
     * @var UtilizadorFacade
     */
    private $utilizador;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->utilizador = $facade;
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
     * @return TipoContato
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
     * @return TipoContato
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return Contato[]
     */
    public function getContatos()
    {
        if (!is_array($this->contatos)) {
            $this->setContatos($this->utilizador->listContatos(array('tipo' => $this->getId())));
        }
        return $this->contatos;
    }

    /**
     * @param Contato[] $contatos
     * @return TipoContato
     */
    public function setContatos($contatos)
    {
        $this->contatos = $contatos;
        return $this;
    }


}