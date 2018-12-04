<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Core\DateTimeUnit;

class CancelamentoXml
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $cod_confirmacao;
    /**
     * @var bool
     */
    private $status;
    /**
     * @var ReservaCarro
     */
    private $reserva;
    /**
     * @var Locadora
     */
    private $locadora;
    /**
     * @var string
     */
    private $operador;
    /**
     * @var DateTimeUnit
     */
    private $data;
    /**
     * @var string
     */
    private $sendXml;
    /**
     * @var string
     */
    private $receivedXml;
    /**
     * @var string
     */
    private $motivo;

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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return CancelamentoXml
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodConfirmacao()
    {
        return $this->cod_confirmacao;
    }

    /**
     * @param string $cod_confirmacao
     * @return CancelamentoXml
     */
    public function setCodConfirmacao($cod_confirmacao)
    {
        $this->cod_confirmacao = $cod_confirmacao;
        return $this;
    }

    /**
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param bool $status
     * @return CancelamentoXml
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return ReservaCarro
     */
    public function getReserva()
    {
        if (!is_object($this->reserva) && $this->reserva) {
            $this->reserva = $this->aluguelcarros->showReservaCarro($this->reserva);
        }
        return $this->reserva;
    }

    /**
     * @param int $reserva
     * @return CancelamentoXml
     */
    public function setReserva($reserva)
    {
        $this->reserva = $reserva;
        return $this;
    }

    /**
     * @return Locadora
     */
    public function getLocadora()
    {
        if (!is_object($this->locadora) && $this->locadora) {
            $this->locadora = $this->aluguelcarros->showLocadora($this->locadora);
        }
        return $this->locadora;
    }

    /**
     * @param int $locadora
     * @return CancelamentoXml
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperador()
    {
        return $this->operador;
    }

    /**
     * @param string $operador
     * @return CancelamentoXml
     */
    public function setOperador($operador)
    {
        $this->operador = $operador;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param DateTimeUnit $data
     * @return CancelamentoXml
     */
    public function setData($data)
    {
        $this->data = new DateTimeUnit($data);
        return $this;
    }

    /**
     * @return string
     */
    public function getSendXml()
    {
        return $this->sendXml;
    }

    /**
     * @param string $sendXml
     * @return CancelamentoXml
     */
    public function setSendXml($sendXml)
    {
        $this->sendXml = $sendXml;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceivedXml()
    {
        return $this->receivedXml;
    }

    /**
     * @param string $receivedXml
     * @return CancelamentoXml
     */
    public function setReceivedXml($receivedXml)
    {
        $this->receivedXml = $receivedXml;
        return $this;
    }

    /**
     * @return string
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * @param string $motivo
     * @return CancelamentoXml
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
        return $this;
    }


}