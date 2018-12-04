<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Carroaluguel\Models\Utilizador\Usuario;
use Carroaluguel\Models\UtilizadorFacade;
use Core\DateTimeUnit;

class BlackoutGrupo
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $grupo;

    /**
     * @var Grupo
     */
    private $grupoobj;

    /**
     * @var DateTimeUnit
     */
    private $data_inicial;

    /**
     * @var DateTimeUnit
     */
    private $data_final;

    /**
     * @var DateTimeUnit
     */
    private $data_cadastro;

    /**
     * @var array
     */
    private $lojas;

    /**
     * @var int
     */
    private $operador;

    /**
     * @var Usuario
     */
    private $operadorobj;

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
     * @return BlackoutGrupo
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * @param int $grupo
     * @return BlackoutGrupo
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
        return $this;
    }

    /**
     * @return Grupo
     */
    public function getGrupoobj()
    {
        if(!is_object($this->grupoobj) && $this->grupo){
            $grupoobj = $this->aluguelcarros->showGrupo($this->grupo);
            $this->setGrupoobj($grupoobj);
        }
        return $this->grupoobj;
    }

    /**
     * @param Grupo $grupoobj
     * @return BlackoutGrupo
     */
    public function setGrupoobj($grupoobj)
    {
        $this->grupoobj = $grupoobj;
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
     * @return BlackoutGrupo
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
     * @return BlackoutGrupo
     */
    public function setDataFinal($data_final)
    {
        $this->data_final = new DateTimeUnit($data_final);
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
     * @return BlackoutGrupo
     */
    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = new DateTimeUnit($data_cadastro);
        return $this;
    }

    /**
     * @return array
     */
    public function getLojas()
    {
        return $this->lojas;
    }

    /**
     * @param array $lojas
     * @return BlackoutGrupo
     */
    public function setLojas($lojas)
    {
        $this->lojas = $lojas;
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
     * @return BlackoutGrupo
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
        if(!is_object($this->operadorobj) && $this->operador){
            $operador = $this->utilizador->listUsuarios(array('codop' => $this->operador));
            $this->setOperadorobj($operador[0]);
        }
        return $this->operadorobj;
    }

    /**
     * @param Usuario $operadorobj
     * @return BlackoutGrupo
     */
    public function setOperadorobj($operadorobj)
    {
        $this->operadorobj = $operadorobj;
        return $this;
    }


}