<?php

namespace Carroaluguel\Models\Afiliados;


use Carroaluguel\Models\AfiliadosFacade;

class Afiliado
{
    /**
     * @var int
     */
    private $id;

    /**
     * var int
     */
    private $cod;

    /**
     * @var string
     */
    private $nome;
    /**
     * @var string
     */
    private $email;

    /**
     * @var int
     */
    private $timeClient;

    /**
     * @var bool
     */
    private $ativo;

    /**
     * @var float
     */
    private $aliquotaComissao;

    /**
     * @var array
     */
    private $comissaoInclude;

    /**
     * @var array
     */
    private $estatisticas;

    /**
     * @var bool
     */
    private $pagComissao;

    /**
     * @var int
     */
    private $periodComissao;

    /**
     * @var AfiliadosFacade
     */
    public $afiliados;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->afiliados = $facade;
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
     * @return Afiliado
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * @param mixed $cod
     * @return Afiliado
     */
    public function setCod($cod)
    {
        $this->cod = $cod;
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
     * @return Afiliado
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Afiliado
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int
     */
    public function getTimeClient()
    {
        return $this->timeClient;
    }

    /**
     * @param int $timeClient
     * @return Afiliado
     */
    public function setTimeClient($timeClient)
    {
        $this->timeClient = $timeClient;
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
     * @return Afiliado
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return float
     */
    public function getAliquotaComissao()
    {
        return $this->aliquotaComissao;
    }

    /**
     * @param float $aliquotaComissao
     * @return Afiliado
     */
    public function setAliquotaComissao($aliquotaComissao)
    {
        $this->aliquotaComissao = $aliquotaComissao;
        return $this;
    }

    /**
     * @return array
     */
    public function getComissaoInclude()
    {
        return $this->comissaoInclude;
    }

    /**
     * @param string $comissaoInclude
     * @return Afiliado
     */
    public function setComissaoInclude($comissaoInclude)
    {
        $includeArray = array();
        if($comissaoInclude) {
            $includeArray = explode(',', $comissaoInclude);
        }
        $this->comissaoInclude = $includeArray;
        return $this;
    }

    /**
     * Retorna o que está incluso no cálculo da comissão do afiliado no formato string para salvar no banco de dados
     *
     * @return string
     */
    public function getComissaoIncludeString(){
        $comInclude = '';
        if(is_array($this->comissaoInclude)) {
            $num = 0;
            foreach($this->comissaoInclude as $com) {
                if($num != 0) {
                    $comInclude .= ',';
                }
                $comInclude .= $com;
                $num++;
            }
        }
        return $comInclude;
    }

    /**
     * @return array
     */
    public function getEstatisticas()
    {
        return $this->estatisticas;
    }

    /**
     * @param array $estatisticas
     * @return Afiliado
     */
    public function setEstatisticas($estatisticas)
    {
        $this->estatisticas = $estatisticas;
        return $this;
    }

    /**
     * @return bool
     */
    public function getPagComissao()
    {
        return $this->pagComissao;
    }

    /**
     * @param bool $pagComissao
     * @return Afiliado
     */
    public function setPagComissao($pagComissao)
    {
        $this->pagComissao = $pagComissao;
        return $this;
    }

    /**
     * @return int
     */
    public function getPeriodComissao()
    {
        return $this->periodComissao;
    }

    /**
     * @param int $periodComissao
     * @return Afiliado
     */
    public function setPeriodComissao($periodComissao)
    {
        $this->periodComissao = $periodComissao;
        return $this;
    }

}