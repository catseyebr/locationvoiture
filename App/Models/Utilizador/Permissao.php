<?php

namespace Carroaluguel\Models\Utilizador;

use Carroaluguel\Models\UtilizadorFacade;

class Permissao
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $classe;
    /**
     * @var string
     */
    private $funcao;
    /**
     * @var Nivel[]
     */
    private $niveis;

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
     * @return Permissao
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param string $classe
     * @return Permissao
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
        return $this;
    }

    /**
     * @return string
     */
    public function getFuncao()
    {
        return $this->funcao;
    }

    /**
     * @param string $funcao
     * @return Permissao
     */
    public function setFuncao($funcao)
    {
        $this->funcao = $funcao;
        return $this;
    }

    /**
     * @return Nivel[]
     */
    public function getNiveis()
    {
        if (!is_array($this->niveis)) {
            $this->setNiveis($this->utilizador->listNiveis(array('permissao' => $this->getId())));
        }
        return $this->niveis;
    }

    /**
     * @param Nivel[] $niveis
     * @return Permissao
     */
    public function setNiveis($niveis)
    {
        $this->niveis = $niveis;
        return $this;
    }

}