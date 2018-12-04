<?php

namespace Carroaluguel\Models\Utilizador;

use Carroaluguel\Models\UtilizadorFacade;

class Nivel
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
     * @var Permissao[]
     */
    private $permissoes;
    /**
     * @var array
     */
    private $permisoes_array;

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
     * @return Nivel
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
     * @return Nivel
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return Permissao[]
     */
    public function getPermissoes()
    {
        if (!is_array($this->permissoes)) {
            $this->setPermissoes();
        }
        return $this->permissoes;
    }

    /**
     * @param Permissao[] $permissoes
     * @return Nivel
     */
    public function setPermissoes($permissoes = null)
    {
        $permisoes_array = null;
        if (!$permissoes) {
            $permiss = $this->utilizador->listPermissoes(array('nivel' => $this->getId()));
            foreach ($permiss as $perms) {
                $permisoes_array[$perms->getClasse()][] = $perms->getFuncao();
            }
        } else {
            $permiss = $permissoes;
            foreach ($permiss as $perms) {
                $permisoes_array[$perms->getClasse()][] = $perms->getFuncao();
            }
        }
        $this->setPermisoesArray($permisoes_array);
        $this->permissoes = $permissoes;
        return $this;
    }

    /**
     * @return array
     */
    public function getPermisoesArray()
    {
        return $this->permisoes_array;
    }

    /**
     * @param array $permisoes_array
     * @return Nivel
     */
    public function setPermisoesArray($permisoes_array)
    {
        $this->permisoes_array = $permisoes_array;
        return $this;
    }

}