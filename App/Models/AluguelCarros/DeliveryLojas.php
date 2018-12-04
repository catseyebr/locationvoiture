<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Core\DateTimeUnit;

class DeliveryLojas
{
    /**
     * @var Delivery
     */
    private $delivery;

    /**
     * @var Loja
     */
    private $loja;

    /**
     * @var float
     */
    private $valor;

    /**
     * @var DateTimeUnit
     */
    private $dth_cadastro;

    /**
     * @var bool
     */
    private $ativo;

    /**
     * @var AluguelCarrosFacade
     */
    private $aluguelcarros;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->aluguelcarros = $facade;
        }
    }

    /**
     * @return Delivery
     */
    public function getDelivery()
    {
        if(!is_object($this->delivery) && $this->delivery){
            $this->delivery = $this->aluguelcarros->showDelivery($this->delivery);
        }
        return $this->delivery;
    }

    /**
     * @param Delivery $delivery
     * @return DeliveryLojas
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
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
     * @return DeliveryLojas
     */
    public function setLoja($loja)
    {
        $this->loja = $loja;
        return $this;
    }

    /**
     * @return float
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     * @return DeliveryLojas
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDthCadastro()
    {
        return $this->dth_cadastro;
    }

    /**
     * @param DateTimeUnit $dth_cadastro
     * @return DeliveryLojas
     */
    public function setDthCadastro($dth_cadastro)
    {
        $this->dth_cadastro = new DateTimeUnit($dth_cadastro);
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
     * @return DeliveryLojas
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }


}