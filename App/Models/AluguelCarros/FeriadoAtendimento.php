<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Carroaluguel\Models\Utilizador\Usuario;
use Carroaluguel\Models\UtilizadorFacade;
use Core\DateTimeUnit;

class FeriadoAtendimento
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Locadora
     */
    private $locadora;

    /**
     * @var string
     */
    private $loja;

    /**
     * @var Feriado
     */
    private $feriado;

    /**
     * @var Usuario
     */
    private $usuario;

    /**
     * @var DateTimeUnit
     */
    private $dataCadastro;

    /**
     * @var AluguelCarrosFacade
     */
    private $aluguelcarros;

    /**
     * @var UtilizadorFacade
     */
    private $utilizador;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->aluguelcarros = $facade;
            $this->utilizador = new UtilizadorFacade($this->aluguelcarros->getEntityManager());
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
     * @return FeriadoAtendimento
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Locadora
     */
    public function getLocadora()
    {
        if(!is_object($this->locadora) && $this->locadora){
            $this->locadora = $this->aluguelcarros->showLocadora($this->locadora);
        }
        return $this->locadora;
    }

    /**
     * @param Locadora $locadora
     * @return FeriadoAtendimento
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        return $this;
    }

    /**
     * @return array
     */
    public function getLoja()
    {
        if(!is_array($this->loja) && $this->loja){
            $lojas = explode(',',$this->loja);
            $this->loja = $lojas;
        }
        return $this->loja;
    }

    /**
     * @param string $loja
     * @return FeriadoAtendimento
     */
    public function setLoja($loja)
    {
        $this->loja = $loja;
        return $this;
    }

    /**
     * @return Feriado
     */
    public function getFeriado()
    {
        if(!is_object($this->feriado) && $this->feriado){
            $this->feriado = $this->aluguelcarros->showFeriado($this->feriado);
        }
        return $this->feriado;
    }

    /**
     * @param Feriado $feriado
     * @return FeriadoAtendimento
     */
    public function setFeriado($feriado)
    {
        $this->feriado = $feriado;
        return $this;
    }

    /**
     * @return Usuario
     */
    public function getUsuario()
    {
        if(!is_object($this->usuario) && $this->usuario){
            $this->usuario = $this->utilizador->showUsuario($this->usuario);
        }
        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     * @return FeriadoAtendimento
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * @param DateTimeUnit $dataCadastro
     * @return FeriadoAtendimento
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

}