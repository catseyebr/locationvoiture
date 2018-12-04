<?php

namespace Carroaluguel\Models\AluguelCarros;


use Core\DateTimeUnit;

class CondutorGratis
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $locadora;
    /**
     * @var string
     */
    private $lojas;
    /**
     * @var array
     */
    private $lojas_array;
    /**
     * @var bool
     */
    private $ativo;
    /**
     * @var DateTimeUnit
     */
    private $data_inicial;
    /**
     * @var DateTimeUnit
     */
    private $data_final;
    /**
     * @var string
     */
    private $texto;
    /**
     * @var string
     */
    private $texto_voucher;
    /**
     * @var int
     */
    private $tipo_validade;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return CondutorGratis
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return CondutorGratis
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        return $this;
    }

    /**
     * @return string
     */
    public function getLojas()
    {
        return $this->lojas;
    }

    /**
     * @param string $lojas
     * @return CondutorGratis
     */
    public function setLojas($lojas)
    {
        $this->lojas = $lojas;
        $this->setLojasArray(explode(',',$lojas));
        return $this;
    }

    /**
     * @return array
     */
    public function getLojasArray()
    {
        return $this->lojas_array;
    }

    /**
     * @param array $lojas_array
     * @return CondutorGratis
     */
    public function setLojasArray($lojas_array)
    {
        $this->lojas_array = $lojas_array;
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
     * @return CondutorGratis
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
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
     * @return CondutorGratis
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
     * @return CondutorGratis
     */
    public function setDataFinal($data_final)
    {
        $this->data_final = new DateTimeUnit($data_final);
        return $this;
    }

    /**
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param string $texto
     * @return CondutorGratis
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
        return $this;
    }

    /**
     * @return string
     */
    public function getTextoVoucher()
    {
        return $this->texto_voucher;
    }

    /**
     * @param string $texto_voucher
     * @return CondutorGratis
     */
    public function setTextoVoucher($texto_voucher)
    {
        $this->texto_voucher = $texto_voucher;
        return $this;
    }

    /**
     * Retorna o tipo de validade da promoção
     *
     * 1 - pela data de solicitação da reserva
     * 2 - pela data de retirada
     * 3 - pela data de devolução
     *
     * @return int
     */
    public function getTipoValidade()
    {
        return $this->tipo_validade;
    }

    /**
     * @param int $tipo_validade
     * @return CondutorGratis
     */
    public function setTipoValidade($tipo_validade)
    {
        $this->tipo_validade = $tipo_validade;
        return $this;
    }



}