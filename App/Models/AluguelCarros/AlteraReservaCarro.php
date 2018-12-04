<?php

namespace Carroaluguel\Models\AluguelCarros;


use Core\DateTimeUnit;
use Core\Period;

class AlteraReservaCarro
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $reserva;

    /**
     * @var int
     */
    private $locadora;

    /**
     * @var Locadora
     */
    private $locadora_obj;

    /**
     * @var int
     */
    private $loja_retirar;

    /**
     * @var Loja
     */
    private $loja_retirar_obj;

    /**
     * @var int
     */
    private $loja_devolver;

    /**
     * @var Loja
     */
    private $loja_devolver_obj;

    /**
     * @var int
     */
    private $grupo;

    /**
     * @var Grupo
     */
    private $grupo_obj;

    /**
     * @var int
     */
    private $protecao;

    /**
     * @var int
     */
    private $empresa;

    /**
     * @var int
     */
    private $emissor;

    /**
     * @var int
     */
    private $operador;

    /**
     * @var int
     */
    private $condutor;

    /**
     * @var int
     */
    private $condutor_adicional;

    /**
     * @var string
     */
    private $data_retirar;

    /**
     * @var string
     */
    private $data_devolver;

    /**
     * @var string
     */
    private $hora_retirar;

    /**
     * @var string
     */
    private $hora_devolver;

    /**
     * @var Period
     */
    private $periodo;

    /**
     * @var int
     */
    private $diarias;

    /**
     * @var bool
     */
    private $diaria_extra;

    /**
     * @var float
     */
    private $vlr_diarias;

    /**
     * @var float
     */
    private $vlr_protecao;

    /**
     * @var string
     */
    private $vlr_txextra_loja;

    /**
     * @var bool
     */
    private $op_gps;

    /**
     * @var float
     */
    private $vlr_op_gps;

    /**
     * @var bool
     */
    private $op_cadeira;

    /**
     * @var float
     */
    private $vlr_op_cadeira;

    /**
     * @var bool
     */
    private $op_condutor;

    /**
     * @var float
     */
    private $vlr_op_condutor;

    /**
     * @var bool
     */
    private $op_bebeconforto;

    /**
     * @var float
     */
    private $vlr_op_bebeconforto;

    /**
     * @var bool
     */
    private $op_assentoelevacao;

    /**
     * @var float
     */
    private $vlr_op_assentoelevacao;

    /**
     * @var bool
     */
    private $ca_conjuge;

    /**
     * @var float
     */
    private $vlr_devolucao;

    /**
     * @var float
     */
    private $vlr_taxas;

    /**
     * @var float
     */
    private $vlr_horaextra;

    /**
     * @var float
     */
    private $vlr_horaextra_protecao;

    /**
     * @var float
     */
    private $vlr_horaextra_opcionais;

    /**
     * @var float
     */
    private $vlr_total;

    /**
     * @var string
     */
    private $pagamento;

    /**
     * @var DateTimeUnit
     */
    private $dth_cadastro;

    /**
     * @var DateTimeUnit
     */
    private $dth_atualiza;

    /**
     * @var string
     */
    private $cod_confirmacao;

    /**
     * @var string
     */
    private $nome_confirmacao;

    /**
     * @var string
     */
    private $cia_aerea;

    /**
     * @var int
     */
    private $num_voo;

    /**
     * @var int
     */
    private $status;

    /**
     * @var string
     */
    private $obs;

    /**
     * @var array
     */
    private $opcionais_array;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return AlteraReservaCarro
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getReserva()
    {
        return $this->reserva;
    }

    /**
     * @param int $reserva
     * @return AlteraReservaCarro
     */
    public function setReserva($reserva)
    {
        $this->reserva = $reserva;
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
     * @return AlteraReservaCarro
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        return $this;
    }

    /**
     * @return Locadora
     */
    public function getLocadoraObj()
    {
        return $this->locadora_obj;
    }

    /**
     * @param Locadora $locadora_obj
     * @return AlteraReservaCarro
     */
    public function setLocadoraObj($locadora_obj)
    {
        $this->locadora_obj = $locadora_obj;
        return $this;
    }

    /**
     * @return int
     */
    public function getLojaRetirar()
    {
        return $this->loja_retirar;
    }

    /**
     * @param int $loja_retirar
     * @return AlteraReservaCarro
     */
    public function setLojaRetirar($loja_retirar)
    {
        $this->loja_retirar = $loja_retirar;
        return $this;
    }

    /**
     * @return Loja
     */
    public function getLojaRetirarObj()
    {
        return $this->loja_retirar_obj;
    }

    /**
     * @param Loja $loja_retirar_obj
     * @return AlteraReservaCarro
     */
    public function setLojaRetirarObj($loja_retirar_obj)
    {
        $this->loja_retirar_obj = $loja_retirar_obj;
        return $this;
    }

    /**
     * @return int
     */
    public function getLojaDevolver()
    {
        return $this->loja_devolver;
    }

    /**
     * @param int $loja_devolver
     * @return AlteraReservaCarro
     */
    public function setLojaDevolver($loja_devolver)
    {
        $this->loja_devolver = $loja_devolver;
        return $this;
    }

    /**
     * @return Loja
     */
    public function getLojaDevolverObj()
    {
        return $this->loja_devolver_obj;
    }

    /**
     * @param Loja $loja_devolver_obj
     * @return AlteraReservaCarro
     */
    public function setLojaDevolverObj($loja_devolver_obj)
    {
        $this->loja_devolver_obj = $loja_devolver_obj;
        return $this;
    }

    /**
     * @return int
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * @param int $grupo
     * @return AlteraReservaCarro
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
        return $this;
    }

    /**
     * @return Grupo
     */
    public function getGrupoObj()
    {
        return $this->grupo_obj;
    }

    /**
     * @param Grupo $grupo_obj
     * @return AlteraReservaCarro
     */
    public function setGrupoObj($grupo_obj)
    {
        $this->grupo_obj = $grupo_obj;
        return $this;
    }

    /**
     * @return int
     */
    public function getProtecao()
    {
        return $this->protecao;
    }

    /**
     * @param int $protecao
     * @return AlteraReservaCarro
     */
    public function setProtecao($protecao)
    {
        $this->protecao = $protecao;
        return $this;
    }

    /**
     * @return int
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * @param int $empresa
     * @return AlteraReservaCarro
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
        return $this;
    }

    /**
     * @return int
     */
    public function getEmissor()
    {
        return $this->emissor;
    }

    /**
     * @param int $emissor
     * @return AlteraReservaCarro
     */
    public function setEmissor($emissor)
    {
        $this->emissor = $emissor;
        return $this;
    }

    /**
     * @return int
     */
    public function getOperador()
    {
        return $this->operador;
    }

    /**
     * @param int $operador
     * @return AlteraReservaCarro
     */
    public function setOperador($operador)
    {
        $this->operador = $operador;
        return $this;
    }

    /**
     * @return int
     */
    public function getCondutor()
    {
        return $this->condutor;
    }

    /**
     * @param int $condutor
     * @return AlteraReservaCarro
     */
    public function setCondutor($condutor)
    {
        $this->condutor = $condutor;
        return $this;
    }

    /**
     * @return int
     */
    public function getCondutorAdicional()
    {
        return $this->condutor_adicional;
    }

    /**
     * @param int $condutor_adicional
     * @return AlteraReservaCarro
     */
    public function setCondutorAdicional($condutor_adicional)
    {
        $this->condutor_adicional = $condutor_adicional;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataRetirar()
    {
        return $this->data_retirar;
    }

    /**
     * @param string $data_retirar
     * @return AlteraReservaCarro
     */
    public function setDataRetirar($data_retirar)
    {
        $this->data_retirar = $data_retirar;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataDevolver()
    {
        return $this->data_devolver;
    }

    /**
     * @param string $data_devolver
     * @return AlteraReservaCarro
     */
    public function setDataDevolver($data_devolver)
    {
        $this->data_devolver = $data_devolver;
        return $this;
    }

    /**
     * @return string
     */
    public function getHoraRetirar()
    {
        return $this->hora_retirar;
    }

    /**
     * @param string $hora_retirar
     * @return AlteraReservaCarro
     */
    public function setHoraRetirar($hora_retirar)
    {
        $this->hora_retirar = $hora_retirar;
        return $this;
    }

    /**
     * @return string
     */
    public function getHoraDevolver()
    {
        return $this->hora_devolver;
    }

    /**
     * @param string $hora_devolver
     * @return AlteraReservaCarro
     */
    public function setHoraDevolver($hora_devolver)
    {
        $this->hora_devolver = $hora_devolver;
        return $this;
    }

    /**
     * @return Period
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param Period $periodo
     * @return AlteraReservaCarro
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
        return $this;
    }

    /**
     * @return int
     */
    public function getDiarias()
    {
        return $this->diarias;
    }

    /**
     * @param int $diarias
     * @return AlteraReservaCarro
     */
    public function setDiarias($diarias)
    {
        $this->diarias = $diarias;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDiariaExtra()
    {
        return $this->diaria_extra;
    }

    /**
     * @param bool $diaria_extra
     * @return AlteraReservaCarro
     */
    public function setDiariaExtra($diaria_extra)
    {
        $this->diaria_extra = $diaria_extra;
        return $this;
    }

    /**
     * @return float
     */
    public function getVlrDiarias()
    {
        return $this->vlr_diarias;
    }

    /**
     * @param float $vlr_diarias
     * @return AlteraReservaCarro
     */
    public function setVlrDiarias($vlr_diarias)
    {
        $this->vlr_diarias = $vlr_diarias;
        return $this;
    }

    /**
     * @return float
     */
    public function getVlrProtecao()
    {
        return $this->vlr_protecao;
    }

    /**
     * @param float $vlr_protecao
     * @return AlteraReservaCarro
     */
    public function setVlrProtecao($vlr_protecao)
    {
        $this->vlr_protecao = $vlr_protecao;
        return $this;
    }

    /**
     * @return string
     */
    public function getVlrTxextraLoja()
    {
        return $this->vlr_txextra_loja;
    }

    /**
     * @param string $vlr_txextra_loja
     * @return AlteraReservaCarro
     */
    public function setVlrTxextraLoja($vlr_txextra_loja)
    {
        $this->vlr_txextra_loja = $vlr_txextra_loja;
        return $this;
    }

    /**
     * @return bool
     */
    public function getOpGps()
    {
        return $this->op_gps;
    }

    /**
     * @param bool $op_gps
     * @return AlteraReservaCarro
     */
    public function setOpGps($op_gps)
    {
        $this->op_gps = $op_gps;
        return $this;
    }

    /**
     * @return float
     */
    public function getVlrOpGps()
    {
        return $this->vlr_op_gps;
    }

    /**
     * @param float $vlr_op_gps
     * @return AlteraReservaCarro
     */
    public function setVlrOpGps($vlr_op_gps)
    {
        $this->vlr_op_gps = $vlr_op_gps;
        return $this;
    }

    /**
     * @return bool
     */
    public function getOpCadeira()
    {
        return $this->op_cadeira;
    }

    /**
     * @param bool $op_cadeira
     * @return AlteraReservaCarro
     */
    public function setOpCadeira($op_cadeira)
    {
        $this->op_cadeira = $op_cadeira;
        return $this;
    }

    /**
     * @return float
     */
    public function getVlrOpCadeira()
    {
        return $this->vlr_op_cadeira;
    }

    /**
     * @param float $vlr_op_cadeira
     * @return AlteraReservaCarro
     */
    public function setVlrOpCadeira($vlr_op_cadeira)
    {
        $this->vlr_op_cadeira = $vlr_op_cadeira;
        return $this;
    }

    /**
     * @return bool
     */
    public function getOpCondutor()
    {
        return $this->op_condutor;
    }

    /**
     * @param bool $op_condutor
     * @return AlteraReservaCarro
     */
    public function setOpCondutor($op_condutor)
    {
        $this->op_condutor = $op_condutor;
        return $this;
    }

    /**
     * @return float
     */
    public function getVlrOpCondutor()
    {
        return $this->vlr_op_condutor;
    }

    /**
     * @param float $vlr_op_condutor
     * @return AlteraReservaCarro
     */
    public function setVlrOpCondutor($vlr_op_condutor)
    {
        $this->vlr_op_condutor = $vlr_op_condutor;
        return $this;
    }

    /**
     * @return bool
     */
    public function getOpBebeconforto()
    {
        return $this->op_bebeconforto;
    }

    /**
     * @param bool $op_bebeconforto
     * @return AlteraReservaCarro
     */
    public function setOpBebeconforto($op_bebeconforto)
    {
        $this->op_bebeconforto = $op_bebeconforto;
        return $this;
    }

    /**
     * @return float
     */
    public function getVlrOpBebeconforto()
    {
        return $this->vlr_op_bebeconforto;
    }

    /**
     * @param float $vlr_op_bebeconforto
     * @return AlteraReservaCarro
     */
    public function setVlrOpBebeconforto($vlr_op_bebeconforto)
    {
        $this->vlr_op_bebeconforto = $vlr_op_bebeconforto;
        return $this;
    }

    /**
     * @return bool
     */
    public function getOpAssentoelevacao()
    {
        return $this->op_assentoelevacao;
    }

    /**
     * @param bool $op_assentoelevacao
     * @return AlteraReservaCarro
     */
    public function setOpAssentoelevacao($op_assentoelevacao)
    {
        $this->op_assentoelevacao = $op_assentoelevacao;
        return $this;
    }

    /**
     * @return float
     */
    public function getVlrOpAssentoelevacao()
    {
        return $this->vlr_op_assentoelevacao;
    }

    /**
     * @param float $vlr_op_assentoelevacao
     * @return AlteraReservaCarro
     */
    public function setVlrOpAssentoelevacao($vlr_op_assentoelevacao)
    {
        $this->vlr_op_assentoelevacao = $vlr_op_assentoelevacao;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCaConjuge()
    {
        return $this->ca_conjuge;
    }

    /**
     * @param bool $ca_conjuge
     * @return AlteraReservaCarro
     */
    public function setCaConjuge($ca_conjuge)
    {
        $this->ca_conjuge = $ca_conjuge;
        return $this;
    }

    /**
     * @return float
     */
    public function getVlrDevolucao()
    {
        return $this->vlr_devolucao;
    }

    /**
     * @param float $vlr_devolucao
     * @return AlteraReservaCarro
     */
    public function setVlrDevolucao($vlr_devolucao)
    {
        $this->vlr_devolucao = $vlr_devolucao;
        return $this;
    }

    /**
     * @return float
     */
    public function getVlrTaxas()
    {
        return $this->vlr_taxas;
    }

    /**
     * @param float $vlr_taxas
     * @return AlteraReservaCarro
     */
    public function setVlrTaxas($vlr_taxas)
    {
        $this->vlr_taxas = $vlr_taxas;
        return $this;
    }

    /**
     * @return float
     */
    public function getVlrHoraextra()
    {
        return $this->vlr_horaextra;
    }

    /**
     * @param float $vlr_horaextra
     * @return AlteraReservaCarro
     */
    public function setVlrHoraextra($vlr_horaextra)
    {
        $this->vlr_horaextra = $vlr_horaextra;
        return $this;
    }

    /**
     * @return float
     */
    public function getVlrHoraextraProtecao()
    {
        return $this->vlr_horaextra_protecao;
    }

    /**
     * @param float $vlr_horaextra_protecao
     * @return AlteraReservaCarro
     */
    public function setVlrHoraextraProtecao($vlr_horaextra_protecao)
    {
        $this->vlr_horaextra_protecao = $vlr_horaextra_protecao;
        return $this;
    }

    /**
     * @return float
     */
    public function getVlrHoraextraOpcionais()
    {
        return $this->vlr_horaextra_opcionais;
    }

    /**
     * @param float $vlr_horaextra_opcionais
     * @return AlteraReservaCarro
     */
    public function setVlrHoraextraOpcionais($vlr_horaextra_opcionais)
    {
        $this->vlr_horaextra_opcionais = $vlr_horaextra_opcionais;
        return $this;
    }

    /**
     * @return float
     */
    public function getVlrTotal()
    {
        return $this->vlr_total;
    }

    /**
     * @param float $vlr_total
     * @return AlteraReservaCarro
     */
    public function setVlrTotal($vlr_total)
    {
        $this->vlr_total = $vlr_total;
        return $this;
    }

    /**
     * @return string
     */
    public function getPagamento()
    {
        return $this->pagamento;
    }

    /**
     * @param string $pagamento
     * @return AlteraReservaCarro
     */
    public function setPagamento($pagamento)
    {
        $this->pagamento = $pagamento;
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
     * @return AlteraReservaCarro
     */
    public function setDthCadastro($dth_cadastro)
    {
        $this->dth_cadastro = $dth_cadastro;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDthAtualiza()
    {
        return $this->dth_atualiza;
    }

    /**
     * @param DateTimeUnit $dth_atualiza
     * @return AlteraReservaCarro
     */
    public function setDthAtualiza($dth_atualiza)
    {
        $this->dth_atualiza = $dth_atualiza;
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
     * @return AlteraReservaCarro
     */
    public function setCodConfirmacao($cod_confirmacao)
    {
        $this->cod_confirmacao = $cod_confirmacao;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeConfirmacao()
    {
        return $this->nome_confirmacao;
    }

    /**
     * @param string $nome_confirmacao
     * @return AlteraReservaCarro
     */
    public function setNomeConfirmacao($nome_confirmacao)
    {
        $this->nome_confirmacao = $nome_confirmacao;
        return $this;
    }

    /**
     * @return string
     */
    public function getCiaAerea()
    {
        return $this->cia_aerea;
    }

    /**
     * @param string $cia_aerea
     * @return AlteraReservaCarro
     */
    public function setCiaAerea($cia_aerea)
    {
        $this->cia_aerea = $cia_aerea;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumVoo()
    {
        return $this->num_voo;
    }

    /**
     * @param int $num_voo
     * @return AlteraReservaCarro
     */
    public function setNumVoo($num_voo)
    {
        $this->num_voo = $num_voo;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return AlteraReservaCarro
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * @param string $obs
     * @return AlteraReservaCarro
     */
    public function setObs($obs)
    {
        $this->obs = $obs;
        return $this;
    }

    /**
     * @return array
     */
    public function getOpcionaisArray()
    {
        return $this->opcionais_array;
    }

    /**
     * @param array $opcionais_array
     * @return AlteraReservaCarro
     */
    public function setOpcionaisArray($opcionais_array)
    {
        $this->opcionais_array = $opcionais_array;
        return $this;
    }

}