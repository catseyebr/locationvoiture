<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Carroaluguel\Models\Localidade\Cidade;
use Carroaluguel\Models\LocalidadeFacade;

class Delivery
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
     * @var Locadora
     */
    private $locadora;

    /**
     * @var string
     */
    private $bairro;

    /**
     * @var array
     */
    private $lojas;

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
     * @return Delivery
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
     * @return Delivery
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
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
     * @return Delivery
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        return $this;
    }

    /**
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     * @return Delivery
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @return array
     */
    public function getLojas()
    {
        if (!is_array($this->lojas)) {
            $this->lojas = $this->aluguelcarros->listDeliveryLojas(array('delivery' => $this->getId()));

        }
        return $this->lojas;
    }

    /**
     * @param array $lojas
     * @return Delivery
     */
    public function setLojas($lojas)
    {
        $this->lojas = $lojas;
        return $this;
    }

    /**
     * @return Cidade
     */
    public function getCidade()
    {
        if(!is_object($this->cidade) && $this->cidade){
            $this->cidade = $this->localidade->showCidade($this->cidade);
        }
        return $this->cidade;
    }

    /**
     * Retorna o nome da cidade associada
     *
     * @return string
     */
    public function getCidadeNome()
    {
        $nome = $this->getCidade();
        if (is_object($nome)) {
            return $nome->getNome();

        } else {
            return NULL;

        }

    }

    /**
     * @param Cidade $cidade
     * @return Delivery
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }


}