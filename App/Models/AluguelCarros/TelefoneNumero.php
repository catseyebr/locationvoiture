<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Carroaluguel\Models\Localidade\Cidade;
use Carroaluguel\Models\LocalidadeFacade;

class TelefoneNumero
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nome_cidade;

    /**
     * @var string
     */
    private $ddd;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var Cidade
     */
    private $cidade;

    /**
     * @var AluguelCarrosFacade
     */
    private $aluguelcarros;

    /**
     * @var LocalidadeFacade
     */
    private $localidade;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->aluguelcarros = $facade;
            $this->localidade = new LocalidadeFacade($this->aluguelcarros->getEntityManager());
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
     * @return TelefoneNumero
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeCidade()
    {
        return $this->nome_cidade;
    }

    /**
     * @param string $nome_cidade
     * @return TelefoneNumero
     */
    public function setNomeCidade($nome_cidade)
    {
        $this->nome_cidade = $nome_cidade;
        return $this;
    }

    /**
     * @return string
     */
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * @param string $ddd
     * @return TelefoneNumero
     */
    public function setDdd($ddd)
    {
        $this->ddd = $ddd;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param string $numero
     * @return TelefoneNumero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    /**
     * @return Cidade
     */
    public function getCidade()
    {
        if (!is_object($this->cidade) && $this->cidade){
            $this->cidade = $this->localidade->showCidade($this->cidade);
        }
        return $this->cidade;
    }

    /**
     * @param Cidade $cidade
     * @return TelefoneNumero
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    public function getNumeroFormat()
    {
        $nmb_1 = substr($this->numero, 0, 4);
        $nmb_2 = substr($this->numero, 4, 4);
        $ramal = substr($this->numero, 9, 4);
        if ($ramal != '') {
            $numero = "$nmb_1 $nmb_2 ramal $ramal";
        } else {
            $numero = "$nmb_1 $nmb_2";
        }
        return $numero;

    }

    public function getNumeroHtml()
    {
        //$ddd = substr($this->numero, 0, 2);
        $nmb_1 = substr($this->numero, 0, 4);
        $nmb_2 = substr($this->numero, 4, 4);
        $ramal = substr($this->numero, 10, 5);
        if ($ramal != '') {
            $numero = "<span class='numero_telefone_atendimento'>$nmb_1.' '.$nmb_2.' ramal '.$ramal</span>";
        } else {
            $numero = "<span class='numero_telefone_atendimento'>$nmb_1.' '.$nmb_2</span>";
        }
        return $numero;

    }


}