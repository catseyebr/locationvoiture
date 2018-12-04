<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Core\DateTimeUnit;

class TaxaExtraLoja
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var Loja
     */
    private $loja;
    /**
     * @var int
     */
    private $loja_id;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var string
     */
    private $hora_inicial;
    /**
     * @var string
     */
    private $hora_final;
    /**
     * @var DateTimeUnit
     */
    private $validade_inicial;
    /**
     * @var DateTimeUnit
     */
    private $validade_final;
    /**
     * @var float
     */
    private $valor;
    /**
     * @var bool
     */
    private $diario;
    /**
     * @var int
     */
    private $retirada_devolucao; //integer 1-retirada, 2-devolução, 3-ambas
    /**
     * @var int
     */
    private $diaIni; //integer Cobrar a partir desse número de dias (padrão 1)
    /**
     * @var int
     */
    private $diaFim;

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
     * @return TaxaExtraLoja
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Loja
     */
    public function getLoja()
    {
        if (!is_object($this->loja) && $this->loja) {
            $loja = $this->aluguelcarros->showLoja($this->loja);
            $this->loja = $loja;
        }
        return $this->loja;
    }

    /**
     * @param int $loja
     * @return TaxaExtraLoja
     */
    public function setLoja($loja)
    {
        $this->loja = $loja;
        $this->setLojaId($loja);
        return $this;
    }

    /**
     * @return int
     */
    public function getLojaId()
    {
        return $this->loja_id;
    }

    /**
     * @param int $loja_id
     * @return TaxaExtraLoja
     */
    public function setLojaId($loja_id)
    {
        $this->loja_id = $loja_id;
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
     * @return TaxaExtraLoja
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getHoraInicial()
    {
        return $this->hora_inicial;
    }

    /**
     * @param string $hora_inicial
     * @return TaxaExtraLoja
     */
    public function setHoraInicial($hora_inicial)
    {
        $this->hora_inicial = $hora_inicial;
        return $this;
    }

    /**
     * @return string
     */
    public function getHoraFinal()
    {
        return $this->hora_final;
    }

    /**
     * @param string $hora_final
     * @return TaxaExtraLoja
     */
    public function setHoraFinal($hora_final)
    {
        $this->hora_final = $hora_final;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getValidadeInicial()
    {
        return $this->validade_inicial;
    }

    /**
     * @param DateTimeUnit $validade_inicial
     * @return TaxaExtraLoja
     */
    public function setValidadeInicial($validade_inicial)
    {
        $this->validade_inicial = $validade_inicial;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getValidadeFinal()
    {
        return $this->validade_final;
    }

    /**
     * @param DateTimeUnit $validade_final
     * @return TaxaExtraLoja
     */
    public function setValidadeFinal($validade_final)
    {
        $this->validade_final = $validade_final;
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
     * @return TaxaExtraLoja
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDiario()
    {
        return $this->diario;
    }

    /**
     * @param bool $diario
     * @return TaxaExtraLoja
     */
    public function setDiario($diario)
    {
        $this->diario = $diario;
        return $this;
    }

    /**
     * @return int
     */
    public function getRetiradaDevolucao()
    {
        return $this->retirada_devolucao;
    }

    /**
     * @param int $retirada_devolucao
     * @return TaxaExtraLoja
     */
    public function setRetiradaDevolucao($retirada_devolucao)
    {
        $this->retirada_devolucao = $retirada_devolucao;
        return $this;
    }

    /**
     * @return int
     */
    public function getDiaIni()
    {
        return $this->diaIni;
    }

    /**
     * @param int $diaIni
     * @return TaxaExtraLoja
     */
    public function setDiaIni($diaIni)
    {
        $this->diaIni = $diaIni;
        return $this;
    }

    /**
     * @return int
     */
    public function getDiaFim()
    {
        return $this->diaFim;
    }

    /**
     * @param int $diaFim
     * @return TaxaExtraLoja
     */
    public function setDiaFim($diaFim)
    {
        $this->diaFim = $diaFim;
        return $this;
    } //integer Cobrar até esse número de dias (padrão 30)


}