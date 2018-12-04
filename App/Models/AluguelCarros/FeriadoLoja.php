<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Carroaluguel\Models\Utilizador\Usuario;
use Carroaluguel\Models\UtilizadorFacade;
use Core\DateTimeUnit;

class FeriadoLoja
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
     * @var integer
     */
    private $loja_id;

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
     * @return FeriadoLoja
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
     * @param int $loja
     * @return FeriadoLoja
     */
    public function setLoja($loja)
    {
        $this->loja = $loja;
        $this->setLojaId($loja);
        return $this;
    }

    /**
     * @return int
     */
    public function getLojaId()
    {
        return $this->loja_id;
    }

    /**
     * @param int $loja_id
     * @return FeriadoLoja
     */
    public function setLojaId($loja_id)
    {
        $this->loja_id = $loja_id;
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
     * @return FeriadoLoja
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
     * @return FeriadoLoja
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
     * @return FeriadoLoja
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = new DateTimeUnit($dataCadastro);
        return $this;
    }


}