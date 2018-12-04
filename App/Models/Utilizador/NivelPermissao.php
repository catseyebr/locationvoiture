<?php

namespace Carroaluguel\Models\Utilizador;


use Carroaluguel\Models\UtilizadorFacade;

class NivelPermissao
{
    /**
     * @var Nivel
     */
    private $nivel;
    /**
     * @var Permissao
     */
    private $permissao;

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
     * @return Nivel
     */
    public function getNivel()
    {
        if (!is_object($this->nivel) && $this->nivel) {
            $this->setNivel($this->utilizador->showNivel($this->nivel));
        }
        return $this->nivel;
    }

    /**
     * @param Nivel $nivel
     * @return NivelPermissao
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
        return $this;
    }

    /**
     * @return Permissao
     */
    public function getPermissao()
    {
        if (!is_object($this->permissao) && $this->permissao) {
            $this->setPermissao($this->utilizador->showPermissao($this->permissao));
        }
        return $this->permissao;
    }

    /**
     * @param Permissao $permissao
     * @return NivelPermissao
     */
    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;
        return $this;
    }


}