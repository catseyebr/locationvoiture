<?php

namespace Carroaluguel\Models\Afiliados;


use Carroaluguel\Models\AfiliadosFacade;
use Core\DateTimeUnit;
use Core\Period;

class AfiliadoStats
{
    /**
     * @var Period
     */
    private $periodo;

    /**
     * @var Afiliado
     */
    private $afiliado;

    /**
     * @var array
     */
    private $estatisticas;

    /**
     * @var array
     */
    private $estatgraph;

    /**
     * @var array
     */
    private $estattotal;

    /**
     * @var AfiliadosFacade
     */
    private $afiliados;

    /**
     * Construtor da classe
     *
     * Recebe como parâmetros a data inicial e a data final (objetos DateTimeUnit)
     *
     * Recebe como parâmetro o afiliado (objeto)
     *
     * Carrega os módulos necessários
     *
     * @param DateTimeUnit $datainicial
     * @param DateTimeUnit $datafinal
     * @param Afiliado $afiliado
     */
    function __construct($datainicial, $datafinal, $afiliado){
        $this->afiliados = $afiliado->afiliados;
        $array_diario = NULL;
        if(is_object($datainicial) && is_object($datafinal) && is_object($afiliado)){
            $this->setAfiliado($afiliado);
            $this->setPeriodo($datainicial->getDataHora(),$datafinal->getDataHora());
            $this->setEstatisticas();
        }
    }

    /**
     * @return Period
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Define o período da estatística
     *
     * Recebe como parâmetros a data inicial e a data final, no formato ISO (yyyy-mm-ddThh:mm:ss)
     *
     * @param string $datainicial
     * @param string $datafinal
     * @return AfiliadoStats
     */
    public function setPeriodo($datainicial = NULL, $datafinal = NULL)
    {
        $this->periodo = new Period($datainicial, $datafinal);
        return $this;
    }

    /**
     * @return Afiliado
     */
    public function getAfiliado()
    {
        return $this->afiliado;
    }

    /**
     * @param Afiliado $afiliado
     * @return AfiliadoStats
     */
    public function setAfiliado($afiliado)
    {
        $this->afiliado = $afiliado;
        return $this;
    }

    /**
     * @return array
     */
    public function getEstatisticas()
    {
        return $this->estatisticas;
    }

    /**
     * @return AfiliadoStats
     */
    public function setEstatisticas()
    {
        $array_diario = array();

        foreach($this->periodo->getDiario() as $diario){
            $array_diario[$diario->getDataSql()]['data']['click'] = $this->afiliados->contarLogAfiliado(array('dataInicial' => $diario->getDataSql().' 00:00:00', 'dataFinal' => $diario->getDataSql().' 23:59:59', 'codAfiliado' => $this->afiliado->getCod(), 'operacao' => 'clickIframe'));
            $array_diario[$diario->getDataSql()]['data']['views'] = $this->afiliados->contarLogAfiliado(array('dataInicial' => $diario->getDataSql().' 00:00:00', 'dataFinal' => $diario->getDataSql().' 23:59:59', 'codAfiliado' => $this->afiliado->getCod(), 'operacao' => 'showIframe'));
        }
        $this->estatisticas = $array_diario;
        $this->estatgraph = array();
        $i = 0;
        $this->estatgraph['views'] = '';
        $this->estatgraph['clicks'] = '';
        $this->estatgraph['data'] = '';
        $this->estattotal['views'] = 0;
        $this->estattotal['clicks'] = 0;
        foreach ($array_diario as $arr_dia_key => $arr_dia){
            if($i > 0){
                $this->estatgraph['views'] .= ', ';
                $this->estatgraph['clicks'] .= ', ';
                $this->estatgraph['data'] .= ', ';
            }
            $this->estatgraph['views'] .= $arr_dia['data']['views']/1000;
            $this->estatgraph['clicks'] .= $arr_dia['data']['click'];
            $this->estatgraph['data'] .= "'".$arr_dia_key."'";
            $this->estattotal['views'] += $arr_dia['data']['views'];
            $this->estattotal['clicks'] += $arr_dia['data']['click'];
            $i++;
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getEstatgraph()
    {
        return $this->estatgraph;
    }

    /**
     * @param array $estatgraph
     * @return AfiliadoStats
     */
    public function setEstatgraph($estatgraph)
    {
        $this->estatgraph = $estatgraph;
        return $this;
    }

    /**
     * @return array
     */
    public function getEstattotal()
    {
        return $this->estattotal;
    }

    /**
     * @param array $estattotal
     * @return AfiliadoStats
     */
    public function setEstattotal($estattotal)
    {
        $this->estattotal = $estattotal;
        return $this;
    }

}