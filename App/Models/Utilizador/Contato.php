<?php

namespace Carroaluguel\Models\Utilizador;


use Carroaluguel\Models\UtilizadorFacade;

class Contato
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $value;
    /**
     * @var TipoContato
     */
    private $tipoContato;
    /**
     * @var Usuario
     */
    private $usuario;

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
     * @return Contato
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Contato
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return TipoContato
     */
    public function getTipoContato()
    {
        if (!is_object($this->tipoContato) && $this->tipoContato) {
            $this->tipoContato = $this->utilizador->showTipoContato($this->tipoContato);
        }
        return $this->tipoContato;
    }

    /**
     * @param TipoContato $tipoContato
     * @return Contato
     */
    public function setTipoContato($tipoContato)
    {
        $this->tipoContato = $tipoContato;
        return $this;
    }

    /**
     * @return Usuario
     */
    public function getUsuario()
    {
        if (!is_object($this->usuario) && $this->usuario) {
            $this->usuario = $this->utilizador->showUsuario($this->usuario);
        }
        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     * @return Contato
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }


}