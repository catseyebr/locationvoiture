<?php

namespace Carroaluguel\Models\Localidade;


use Carroaluguel\Models\LocalidadeFacade;

class Estado
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
    private $abreviacao;
    /**
     * @var Pais
     */
    private $pais;

    /**
     * @var LocalidadeFacade
     */
    private $localidade;

    public function __construct($facade = NULL)
    {
        if($facade){
            $this->localidade = $facade;
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
     * @return Estado
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
     * @return Estado
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getAbreviacao()
    {
        return $this->abreviacao;
    }

    /**
     * @param string $abreviacao
     * @return Estado
     */
    public function setAbreviacao($abreviacao)
    {
        $this->abreviacao = $abreviacao;
        return $this;
    }

    /**
     * @return Pais
     */
    public function getPais()
    {
        if(!is_object($this->pais) && $this->pais){
            $pais = $this->localidade->showPais($this->pais);
            $this->pais = $pais;
        }
        return $this->pais;
    }

    /**
     * @param mixed $pais
     * @return Estado
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
        return $this;
    }


}