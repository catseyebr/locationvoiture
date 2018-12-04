<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Carroaluguel\Models\Utilizador\Usuario;
use Carroaluguel\Models\UtilizadorFacade;
use Core\DateTimeUnit;

class BlackoutLoja
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $loja;

    /**
     * @var Loja
     */
    private $lojaobj;

    /**
     * @var DateTimeUnit
     */
    private $data_inicial;

    /**
     * @var DateTimeUnit
     */
    private $data_final;

    /**
     * @var int
     */
    private $operador;

    /**
     * @var Usuario
     */
    private $operadorobj;

    /**
     * @var DateTimeUnit
     */
    private $data_cadastro;

    /**
     * @var array
     */
    private $grupos;

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
     * @return BlackoutLoja
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getLoja()
    {
        return $this->loja;
    }

    /**
     * @param int $loja
     * @return BlackoutLoja
     */
    public function setLoja($loja)
    {
        $this->loja = $loja;
        return $this;
    }

    /**
     * @return Loja
     */
    public function getLojaobj()
    {
        if(!is_object($this->lojaobj) && $this->loja){
            $this->setLojaobj($this->aluguelcarros->showLoja($this->loja));
        }
        return $this->lojaobj;
    }

    /**
     * @param Loja $lojaobj
     * @return BlackoutLoja
     */
    public function setLojaobj($lojaobj)
    {
        $this->lojaobj = $lojaobj;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataInicial()
    {
        return $this->data_inicial;
    }

    /**
     * @param DateTimeUnit $data_inicial
     * @return BlackoutLoja
     */
    public function setDataInicial($data_inicial)
    {
        $this->data_inicial = new DateTimeUnit($data_inicial);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataFinal()
    {
        return $this->data_final;
    }

    /**
     * @param DateTimeUnit $data_final
     * @return BlackoutLoja
     */
    public function setDataFinal($data_final)
    {
        $this->data_final = new DateTimeUnit($data_final);
        return $this;
    }

    /**
     * @return int
     */
    public function getOperador()
    {
        return $this->operador;
    }

    /**
     * @param int $operador
     * @return BlackoutLoja
     */
    public function setOperador($operador)
    {
        $this->operador = $operador;
        return $this;
    }

    /**
     * @return Usuario
     */
    public function getOperadorobj()
    {
        return $this->operadorobj;
    }

    /**
     * @param Usuario $operadorobj
     * @return BlackoutLoja
     */
    public function setOperadorobj($operadorobj)
    {
        $this->operadorobj = $operadorobj;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * @param DateTimeUnit $data_cadastro
     * @return BlackoutLoja
     */
    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = new DateTimeUnit($data_cadastro);
        return $this;
    }

    /**
     * @return array
     */
    public function getGrupos()
    {
        if(is_array($this->grupos)) {
            return $this->grupos;
        }else{
            return NULL;
        }
    }

    public function getGruposStr () {
        if(is_array($this->grupos)) {
            return implode(',',$this->grupos);
        }else{
            return NULL;
        }
    }

    /**
     * @param string $grupos
     * @return BlackoutLoja
     */
    public function setGrupos($grupos)
    {
        $grupos_array = NULL;
        if($grupos){
            $grupos_array = explode(',',$grupos);
        }
        $this->grupos = $grupos_array;
        return $this;
    }


}