<?php

namespace Core;


class Period
{
    /**
     * @var DateTimeUnit
     */
    private $datahora_inicial;
    /**
     * @var DateTimeUnit
     */
    private $datahora_final;
    /**
     * @var DateTimeUnit
     */
    private $datahora_agora;
    /**
     * @var int
     */
    private $dias;
    /**
     * @var int
     */
    private $dias_calculo;
    /**
     * @var int
     */
    private $horas;
    /**
     * @var array
     */
    private $diario;
    /**
     * @var bool
     */
    private $is_valid;
    /**
     * @var bool
     */
    private $is_valid_tole;

    /**
     * @param null $datahora_inicial
     * @param null $datahora_final
     */
    function __construct($datahora_inicial, $datahora_final){
        $this->setDataHoraInicial($datahora_inicial);
        $this->setDataHoraFinal($datahora_final);
        $this->setDataHoraAgora();
        $this->setDias();
        $this->setDiario();
        $this->setIsValid();
    }

    /**
     * @return DateTimeUnit
     */
    public function getDatahoraInicial()
    {
        return $this->datahora_inicial;
    }

    /**
     * @param DateTimeUnit $datahora_inicial
     * @return Period
     */
    public function setDatahoraInicial($datahora_inicial)
    {
        $this->datahora_inicial = new DateTimeUnit($datahora_inicial);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDatahoraFinal()
    {
        return $this->datahora_final;
    }

    /**
     * @param DateTimeUnit $datahora_final
     * @return Period
     */
    public function setDatahoraFinal($datahora_final)
    {
        $this->datahora_final = new DateTimeUnit($datahora_final);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDatahoraAgora()
    {
        return $this->datahora_agora;
    }

    /**
     * @return Period
     */
    public function setDatahoraAgora()
    {
        $this->datahora_agora = new DateTimeUnit();
        return $this;
    }

    /**
     * @return int
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * @return Period
     */
    public function setDias()
    {
        $interval = $this->getDatahoraInicial()->diff($this->getDatahoraFinal());
        $this->dias = (int)$interval->format('%a');
        $this->setHoras((int)$interval->format('%h'));
        return $this;
    }

    /**
     * @return int
     */
    public function getDiasCalculo()
    {
        return $this->dias_calculo;
    }

    /**
     * @param int $dias_calculo
     * @return Period
     */
    public function setDiasCalculo($dias_calculo)
    {
        $this->dias_calculo = (int)$dias_calculo;
        return $this;
    }

    /**
     * @return int
     */
    public function getHoras()
    {
        return $this->horas;
    }

    /**
     * @param int $horas
     * @return Period
     */
    public function setHoras($horas)
    {
        $this->horas = $horas;
        return $this;
    }

    /**
     * @return DateTimeUnit[]
     */
    public function getDiario()
    {
        return $this->diario;
    }

    /**
     * @return Period
     */
    public function setDiario()
    {
        for($i = 0; $i < $this->dias; $i++){
            $diario = new DateTimeUnit($this->datahora_inicial->getDataHoraSql());
            $diario->addDay($i);
            $this->diario[] = $diario;
        }
        return $this;
    }

    /**
     * @return Period
     */
    public function setIsValid()
    {
        if ($this->datahora_inicial->getTimestamp() <= $this->getDataHoraAgora()->getTimestamp()){
            $this->is_valid = FALSE;
        }else if ($this->datahora_final->getTimestamp() <= $this->datahora_inicial->getTimestamp()){
            $this->is_valid = FALSE;
        }else{
            $this->is_valid = TRUE;
        }
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsValid()
    {
        return $this->is_valid;
    }

    /**
     * @return bool
     */
    public function getIsValidTole()
    {
        $data_tolerancia = new DateTimeUnit($this->datahora_agora->getDataHoraSql());
        $data_tolerancia->addMin(29);

        if ($this->datahora_inicial->getTimestamp() <= $data_tolerancia->getTimestamp()){
            $this->is_valid_tole = FALSE;
        }else if ($this->datahora_final->getTimestamp() <= $data_tolerancia->getTimestamp()){
            $this->is_valid_tole = FALSE;
        }else{
            $this->is_valid_tole = TRUE;
        }
        return $this->is_valid_tole;
    }


}