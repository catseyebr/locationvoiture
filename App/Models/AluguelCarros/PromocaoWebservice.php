<?php

namespace Carroaluguel\Models\AluguelCarros;


use Core\DateTimeUnit;

class PromocaoWebservice
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $cod;

    /**
     * @var int
     */
    protected $locadora;

    /**
     * @var array
     */
    protected $grupos;

    /**
     * @var array
     */
    protected $lojas;

    /**
     * @var string
     */
    protected $nome;

    /**
     * @var DateTimeUnit
     */
    protected $validadeInicial;

    /**
     * @var DateTimeUnit
     */
    protected $validadeFinal;

    /**
     * @var DateTimeUnit
     */
    protected $validadeRetiradaInicial;

    /**
     * @var DateTimeUnit
     */
    protected $validadeRetiradaFinal;

    /**
     * @var int
     */
    protected $semanaInicial;

    /**
     * @var int
     */
    protected $semanaFinal;

    /**
     * @var bool
     */
    protected $ativo;

    /**
     * @var bool
     */
    protected $user_request;

    /**
     * @var bool
     */
    protected $descricao;

    /**
     * @var int
     */
    protected $tipo;

    /**
     * @var int
     */
    protected $desconto;

    /**
     * @var int
     */
    protected $min_diarias;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PromocaoWebservice
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * @param string $cod
     * @return PromocaoWebservice
     */
    public function setCod($cod)
    {
        $this->cod = $cod;
        return $this;
    }

    /**
     * @return int
     */
    public function getLocadora()
    {
        return $this->locadora;
    }

    /**
     * @param int $locadora
     * @return PromocaoWebservice
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        return $this;
    }

    /**
     * @return array
     */
    public function getGrupos()
    {
        return $this->grupos;
    }

    /**
     * @return string
     */
    public function getGruposString() {
        return implode($this->grupos,',');
    }

    /**
     * @param string $grupos
     * @return PromocaoWebservice
     */
    public function setGrupos($grupos)
    {
        $grps = NULL;
        if($grupos) {
            $grps = explode(',',$grupos);
        }
        if(is_array($grps)){
            $grupos_disponiveis = $grps;
        }else{
            $grupos_disponiveis = NULL;
        }
        $this->grupos = $grupos_disponiveis;
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
     * @return string
     */
    public function getLojasString() {
        return implode($this->lojas,',');
    }

    /**
     * @param string $lojas
     * @return PromocaoWebservice
     */
    public function setLojas($lojas)
    {
        $ljs = NULL;
        if($lojas) {
            $ljs = explode($lojas, ',');
        }
        if(is_array($ljs)){
            $lojas_disponiveis = $ljs;
        }else{
            $lojas_disponiveis = NULL;
        }
        $this->lojas = $lojas_disponiveis;
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
     * @return PromocaoWebservice
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getValidadeInicial()
    {
        return $this->validadeInicial;
    }

    /**
     * @param DateTimeUnit $validadeInicial
     * @return PromocaoWebservice
     */
    public function setValidadeInicial($validadeInicial)
    {
        $this->validadeInicial = new DateTimeUnit($validadeInicial);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getValidadeFinal()
    {
        return $this->validadeFinal;
    }

    /**
     * @param DateTimeUnit $validadeFinal
     * @return PromocaoWebservice
     */
    public function setValidadeFinal($validadeFinal)
    {
        $this->validadeFinal = new DateTimeUnit($validadeFinal);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getValidadeRetiradaInicial()
    {
        return $this->validadeRetiradaInicial;
    }

    /**
     * @param DateTimeUnit $validadeRetiradaInicial
     * @return PromocaoWebservice
     */
    public function setValidadeRetiradaInicial($validadeRetiradaInicial)
    {
        $this->validadeRetiradaInicial = new DateTimeUnit($validadeRetiradaInicial);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getValidadeRetiradaFinal()
    {
        return $this->validadeRetiradaFinal;
    }

    /**
     * @param DateTimeUnit $validadeRetiradaFinal
     * @return PromocaoWebservice
     */
    public function setValidadeRetiradaFinal($validadeRetiradaFinal)
    {
        $this->validadeRetiradaFinal = new DateTimeUnit($validadeRetiradaFinal);
        return $this;
    }

    /**
     * @return int
     */
    public function getSemanaInicial()
    {
        return $this->semanaInicial;
    }

    /**
     * @param int $semanaInicial
     * @return PromocaoWebservice
     */
    public function setSemanaInicial($semanaInicial)
    {
        $this->semanaInicial = $semanaInicial;
        return $this;
    }

    /**
     * @return int
     */
    public function getSemanaFinal()
    {
        return $this->semanaFinal;
    }

    /**
     * @param int $semanaFinal
     * @return PromocaoWebservice
     */
    public function setSemanaFinal($semanaFinal)
    {
        $this->semanaFinal = $semanaFinal;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param bool $ativo
     * @return PromocaoWebservice
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return bool
     */
    public function getUserRequest()
    {
        return $this->user_request;
    }

    /**
     * @param bool $user_request
     * @return PromocaoWebservice
     */
    public function setUserRequest($user_request)
    {
        $this->user_request = $user_request;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param bool $descricao
     * @return PromocaoWebservice
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return int
     *
     * 1-diaria, 2-protecao, 3-taxa retorno, 4-acessórios
     *
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param int $tipo
     * @return PromocaoWebservice
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return int
     */
    public function getDesconto()
    {
        return $this->desconto;
    }

    /**
     * @param int $desconto
     * @return PromocaoWebservice
     */
    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinDiarias()
    {
        return $this->min_diarias;
    }

    /**
     * @param int $min_diarias
     * @return PromocaoWebservice
     */
    public function setMinDiarias($min_diarias)
    {
        $this->min_diarias = $min_diarias;
        return $this;
    }


}