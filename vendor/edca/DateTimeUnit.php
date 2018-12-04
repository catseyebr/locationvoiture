<?php

namespace Core;


use DateTimeZone;

class DateTimeUnit extends \DateTime
{
    /**
     * @var integer
     */
    private $dia;

    /**
     * @var integer
     */
    private $mes;

    /**
     * @var integer
     */
    private $ano;

    /**
     * @var integer
     */
    private $hora;

    /**
     * @var integer
     */
    private $minuto;

    /**
     * @var integer
     */
    private $segundo;

    /**
     * @var integer
     */
    private $semana;

    /**
     * @var integer
     */
    private $semanaDoAno;

    public function __construct($time = 'now', DateTimeZone $timezone = null)
    {
        parent::__construct($time, $timezone);
        $this->update();
    }

    public function update(){
        $this->setDia(date("d", $this->getTimestamp()));
        $this->setMes(date("m", $this->getTimestamp()));
        $this->setAno(date("Y", $this->getTimestamp()));
        $this->setSemana(date("w", $this->getTimestamp()));
        $this->setSemanaDoAno(date("W", $this->getTimestamp()));
        $this->setHora(date("H", $this->getTimestamp()));
        $this->setMinuto(date("i", $this->getTimestamp()));
        $this->setSegundo(date("s", $this->getTimestamp()));
    }

    /**
     * @return int
     */
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * @param int $dia
     * @return DateTimeUnit
     */
    public function setDia($dia)
    {
        $this->dia = $dia;
        return $this;
    }

    /**
     * @return int
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * @param int $mes
     * @return DateTimeUnit
     */
    public function setMes($mes)
    {
        $this->mes = $mes;
        return $this;
    }

    /**
     * @return int
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @param int $ano
     * @return DateTimeUnit
     */
    public function setAno($ano)
    {
        $this->ano = $ano;
        return $this;
    }

    /**
     * @return int
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param int $hora
     * @return DateTimeUnit
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinuto()
    {
        return $this->minuto;
    }

    /**
     * @param int $minuto
     * @return DateTimeUnit
     */
    public function setMinuto($minuto)
    {
        $this->minuto = $minuto;
        return $this;
    }

    /**
     * @return int
     */
    public function getSegundo()
    {
        return $this->segundo;
    }

    /**
     * @param int $segundo
     * @return DateTimeUnit
     */
    public function setSegundo($segundo)
    {
        $this->segundo = $segundo;
        return $this;
    }

    /**
     * @return int
     */
    public function getSemana()
    {
        return $this->semana;
    }

    /**
     * @param int $semana
     * @return DateTimeUnit
     */
    public function setSemana($semana)
    {
        $this->semana = $semana;
        return $this;
    }

    /**
     * @return int
     */
    public function getSemanaDoAno()
    {
        return $this->semanaDoAno;
    }

    /**
     * @param int $semanaDoAno
     * @return DateTimeUnit
     */
    public function setSemanaDoAno($semanaDoAno)
    {
        $this->semanaDoAno = $semanaDoAno;
        return $this;
    }

    /**
     * Retorna o nome do mês por extenso no tipo string
     *
     * @return string
     */
    public function getNomeMes()
    {
        $returnData = NULL;
        switch ($this->mes) {
            case 1:
                $returnData = "Janeiro";
                break;
            case 2:
                $returnData = "Fevereiro";
                break;
            case 3:
                $returnData = "Março";
                break;
            case 4:
                $returnData = "Abril";
                break;
            case 5:
                $returnData = "Maio";
                break;
            case 6:
                $returnData = "Junho";
                break;
            case 7:
                $returnData = "Julho";
                break;
            case 8:
                $returnData = "Agosto";
                break;
            case 9:
                $returnData = "Setembro";
                break;
            case 10:
                $returnData = "Outubro";
                break;
            case 11:
                $returnData = "Novembro";
                break;
            case 12:
                $returnData = "Dezembro";
                break;
        }
        return $returnData;
    }

    /**
     * Retorna o nome do mês abreviado no tipo string
     *
     * @return string
     */
    public function getAbrNomeMes()
    {
        $returnData = NULL;
        switch ($this->mes) {
            case 1:
                $returnData = "Jan";
                break;
            case 2:
                $returnData = "Fev";
                break;
            case 3:
                $returnData = "Mar";
                break;
            case 4:
                $returnData = "Abr";
                break;
            case 5:
                $returnData = "Mai";
                break;
            case 6:
                $returnData = "Jun";
                break;
            case 7:
                $returnData = "Jul";
                break;
            case 8:
                $returnData = "Ago";
                break;
            case 9:
                $returnData = "Set";
                break;
            case 10:
                $returnData = "Out";
                break;
            case 11:
                $returnData = "Nov";
                break;
            case 12:
                $returnData = "Dez";
                break;
        }
        return $returnData;
    }

    /**
     * Retorna o nome da semana por extenso no tipo string
     *
     * @return string
     */
    public function getNomeSemana()
    {
        $returnData = NULL;
        switch ($this->semana) {
            case 0:
                $returnData = "Domingo";
                break;
            case 1:
                $returnData = "Segunda-feira";
                break;
            case 2:
                $returnData = "Terça-feira";
                break;
            case 3:
                $returnData = "Quarta-feira";
                break;
            case 4:
                $returnData = "Quinta-feira";
                break;
            case 5:
                $returnData = "Sexta-feira";
                break;
            case 6:
                $returnData = "Sábado";
                break;
        }
        return $returnData;
    }

    /**
     * Retorna o nome da semana abreviado no tipo string
     *
     * @return string
     */
    public function getAbrSemana() {
        $returnData = NULL;
        switch ($this->semana) {
            case 0:
                $returnData = "Dom";
                break;
            case 1:
                $returnData = "Seg";
                break;
            case 2:
                $returnData = "Ter";
                break;
            case 3:
                $returnData = "Qua";
                break;
            case 4:
                $returnData = "Qui";
                break;
            case 5:
                $returnData = "Sex";
                break;
            case 6:
                $returnData = "Sab";
                break;
        }
        return $returnData;
    }

    /**
     * Retorna a data e hora no formato br "dd/mm/yyy hh:mm"
     *
     * @return string
     */
    public function getDataHoraBr() {
        $datahorabr = str_pad($this->dia, 2, '0', STR_PAD_LEFT) . "/" . str_pad($this->mes, 2, '0', STR_PAD_LEFT) . "/" . $this->ano . " " . str_pad($this->hora, 2, '0', STR_PAD_LEFT) . ":" . str_pad($this->minuto, 2, '0', STR_PAD_LEFT);
        return $datahorabr;
    }

    /**
     * Retorna a data no formato br alt "dd-mm-yyyy"
     *
     * @return string
     */
    public function getDataBrAlt() {
        $databralt = str_pad($this->dia, 2, '0', STR_PAD_LEFT) . "-" . str_pad($this->mes, 2, '0', STR_PAD_LEFT) . "-" . $this->ano;
        return $databralt;
    }

    public function getDataWeekHoraBr() {
        $datahorabr = str_pad($this->dia, 2, '0', STR_PAD_LEFT) . "/" . str_pad($this->mes, 2, '0', STR_PAD_LEFT) . "/" . $this->ano . " (" . $this->getAbrSemana() . ") " . str_pad($this->hora, 2, '0', STR_PAD_LEFT) . ":" . str_pad($this->minuto, 2, '0', STR_PAD_LEFT);
        return $datahorabr;
    }

    /**
     * Retorna a data e hora por extenso formato "'semana', 'dd' de 'mês' de 'yyyy' ás 'hh:min'"
     *
     * @return string
     */
    public function getDataHoraExtenso() {
        $datahorabr = $this->getNomeSemana() . ", " . $this->dia . " de " . $this->getNomeMes() . " de " . $this->ano . " às " . str_pad($this->hora, 2, '0', STR_PAD_LEFT) . ":" . str_pad($this->minuto, 2, '0', STR_PAD_LEFT);
        return $datahorabr;
    }

    public function getDataExtenso() {
        $datahorabr = $this->dia . " de " . $this->getNomeMes() . " de " . $this->ano;
        return $datahorabr;
    }

    /**
     * Retorna a data no formato br "dd/mm/yyy"
     *
     * @return string
     */
    public function getDataBr() {
        $databr = str_pad($this->dia, 2, '0', STR_PAD_LEFT) . "/" . str_pad($this->mes, 2, '0', STR_PAD_LEFT) . "/" . $this->ano;
        return $databr;
    }

    /**
     * Retorna a data e hora no formato SQL "yyyy-mm-dd hh:mm"
     *
     * @return string
     */
    public function getDataHoraSql() {
        $datahorasql = $this->ano . "-" . str_pad($this->mes, 2, '0', STR_PAD_LEFT) . "-" . str_pad($this->dia, 2, '0', STR_PAD_LEFT) . " " . str_pad($this->hora, 2, '0', STR_PAD_LEFT) . ":" . str_pad($this->minuto, 2, '0', STR_PAD_LEFT);
        return $datahorasql;
    }

    /**
     * Retorna a data e hora no formato SQL "yyyy-mm-dd hh:mm:ss"
     *
     * @return string
     */
    public function getDataHoraSegSql() {
        $datahorasql = $this->ano . "-" . str_pad($this->mes, 2, '0', STR_PAD_LEFT) . "-" . str_pad($this->dia, 2, '0', STR_PAD_LEFT) . " " . str_pad($this->hora, 2, '0', STR_PAD_LEFT) . ":" . str_pad($this->minuto, 2, '0', STR_PAD_LEFT) . ":" . str_pad($this->segundo, 2, '0', STR_PAD_LEFT);
        return $datahorasql;
    }

    /**
     * Retorna a data no formato SQL "yyyy-mm-dd"
     *
     * @return string
     */
    public function getDataSql() {
        $datahorasql = $this->ano . "-" . str_pad($this->mes, 2, '0', STR_PAD_LEFT) . "-" . str_pad($this->dia, 2, '0', STR_PAD_LEFT);
        return $datahorasql;
    }

    /**
     * Retorna a data e hora no formato ISO "yyyy-mm-ddThh:mm"
     *
     * @return string
     */
    public function getDataHora() {
        $datahorasql = $this->ano . "-" . str_pad($this->mes, 2, '0', STR_PAD_LEFT) . "-" . str_pad($this->dia, 2, '0', STR_PAD_LEFT) . "T" . str_pad($this->hora, 2, '0', STR_PAD_LEFT) . ":" . str_pad($this->minuto, 2, '0', STR_PAD_LEFT) . ":" . str_pad($this->segundo, 2, '0', STR_PAD_LEFT);
        return $datahorasql;
    }

    /**
     * Retorna a hora no formato SQL "hh:mm:ss"
     *
     * @return string
     */
    public function getHoraSql() {
        $horasql = str_pad($this->hora, 2, '0', STR_PAD_LEFT) . ":" . str_pad($this->minuto, 2, '0', STR_PAD_LEFT) . ":" . str_pad($this->segundo, 2, '0', STR_PAD_LEFT);
        return $horasql;
    }

    public function getHoraNoSec() {
        $horasql = str_pad($this->hora, 2, '0', STR_PAD_LEFT) . ":" . str_pad($this->minuto, 2, '0', STR_PAD_LEFT);
        return $horasql;
    }

    /**
     * Retorna o último dia do mês
     *
     * @return int
     */
    public function getLastMonthDay() {
        return date("t", mktime(0, 0, 0, $this->mes, '01', $this->ano));
    }

    /**
     * Retorna o ultimo dia do mês no formato ISO "yyyy-mm-dd"
     *
     * @return string
     */
    public function getLastMonthDayStr() {
        $lastday = date("t", mktime(0, 0, 0, $this->mes, '01', $this->ano));
        return date("Y-m-d", mktime(0, 0, 0, $this->mes, $lastday, $this->ano));
    }

    /**
     * Retorna o primeiro dia do mês no formato ISO "yyyy-mm-dd"
     *
     * @return string
     */
    public function getFirstMonthDayStr() {
        return date("Y-m-d", mktime(0, 0, 0, $this->mes, '01', $this->ano));
    }

    /**
     * Retorna o ultimo dia do mês no formato br "dd/mm/yyy"
     *
     * @return string
     */
    public function getLastMonthDayStrBr() {
        $lastday = date("t", mktime(0, 0, 0, $this->mes, '01', $this->ano));
        $lastdaybr = str_pad($lastday, 2, '0', STR_PAD_LEFT) . "/" . str_pad($this->mes, 2, '0', STR_PAD_LEFT) . "/" . $this->ano;
        return $lastdaybr;
    }

    /**
     * Retorna o primeiro dia do mês no formato br "dd/mm/yyy"
     *
     * @return string
     */
    public function getFirstMonthDayStrBr() {
        $firstdaybr = "01/" . str_pad($this->mes, 2, '0', STR_PAD_LEFT) . "/" . $this->ano;
        return $firstdaybr;
    }

    public function addDay($days) {
        $this->modify('+'.$days.' Day' );
        $this->update();
    }

    public function subDay($days) {
        $this->modify('-'.$days.' Day' );
        $this->update();
    }

    public function addMonth($months) {
        $this->modify('+'.$months.' Month' );
        $this->update();
    }

    public function subMonth($months) {
        $this->modify('-'.$months.' Month' );
        $this->update();
    }

    public function addYear($year) {
        $this->modify('+'.$year.' Year' );
        $this->update();
    }

    public function subYear($year) {
        $this->modify('-'.$year.' Year' );
        $this->update();
    }

    public function addHour($hours) {
        $this->modify('+'.$hours.' Hour' );
        $this->update();
    }

    public function subHour($hours) {
        $this->modify('-'.$hours.' Hour' );
        $this->update();
    }

    public function addMin($min) {
        $this->modify('+'.$min.' Minutes' );
        $this->update();
    }

    public function subMin($min) {
        $this->modify('-'.$min.' Minutes' );
        $this->update();
    }

    public function addSec($sec) {
        $this->modify('+'.$sec.' Seconds' );
        $this->update();
    }

    public function subSec($sec) {
        $this->modify('-'.$sec.' Seconds' );
        $this->update();
    }

    public function addWeek($weeks) {
        $this->modify('+'.$weeks.' Weeks' );
        $this->update();
    }

    public function subWeek($weeks) {
        $this->modify('-'.$weeks.' Weeks' );
        $this->update();
    }
}