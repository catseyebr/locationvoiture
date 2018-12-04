<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Core\DateTimeUnit;
use Core\Period;

class ReservaCarroPesquisa
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var Locadora
     */
    private $locadora;
    /**
     * @var int
     */
    private $locadora_id;
    /**
     * @var Loja
     */
    private $loja_retirar;
    /**
     * @var int
     */
    private $loja_retirar_id;
    /**
     * @var Loja
     */
    private $loja_devolver;
    /**
     * @var int
     */
    private $loja_devolver_id;
    /**
     * @var Grupo
     */
    private $grupo;
    /**
     * @var int
     */
    private $grupo_id;
    /**
     * @var Protecao
     */
    private $protecao;
    /**
     * @var array
     */
    private $protecoes_online;
    /**
     * @var int
     */
    private $protecao_id;
    /**
     * @var Period
     */
    private $periodo;
    /**
     * @var int
     */
    private $diarias;
    /**
     * @var float
     */
    private $valor_diarias;
    /**
     * @var float
     */
    private $valor_taxas;
    /**
     * @var float
     */
    private $valor_taxa_devolucao;
    /**
     * @var float
     */
    private $valor_protecao;
    /**
     * @var float
     */
    private $valor_hora_extra;
    /**
     * @var float
     */
    private $valor_hora_extra_protecao;
    /**
     * @var float
     */
    private $valor_hora_extra_opcionais;
    /**
     * @var array
     */
    private $opcionais;
    /**
     * @var array
     */
    private $array_opcionais;
    /**
     * @var float
     */
    private $valor_total; //float
    /**
     * @var bool
     */
    private $promocao_diaria;
    /**
     * @var DateTimeUnit
     */
    private $dataCadastro;
    /**
     * @var bool
     */
    private $online;
    /**
     * @var int
     */
    private $hora_extra;
    /**
     * @var bool
     */
    private $diaria_extra;
    /**
     * @var string
     */
    private $user_agent;
    /**
     * @var array
     */
    private $taxas_extra_lojas;
    /**
     * @var int
     *
     * 1 - Layum
     * 2 - CarroAluguel
     *
     */
    private $site;
    /**
     * @var string
     */
    private $pagamento;
    /**
     * @var bool
     */
    private $vendaLivre;
    /**
     * @var int
     */
    private $codAfiliado;
    /**
     * @var string
     */
    private $modAfiliado;
    /**
     * @var string
     */
    private $session_id;
    /**
     * @var array
     */
    private $history_log;
    /**
     * @var
     */
    private $delivery;
    /**
     * @var
     */
    private $deliveryid;
    /**
     * @var
     */
    private $valor_delivery;
    /**
     * @var
     */
    private $delivery_devo;
    /**
     * @var
     */
    private $deliverydevoid;
    /**
     * @var
     */
    private $valor_delivery_devo;
    /**
     * @var string
     */
    private $rate_qual;
    /**
     * @var string
     */
    private $km;
    /**
     * @var
     */
    private $valor_comissao;
    /**
     * @var
     */
    private $aliquota_comissao;
    /**
     * @var
     */
    private $valor_calculo_comissao;
    /**
     * @var string
     */
    private $promo_code;

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
     * @return ReservaCarroPesquisa
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Locadora
     */
    public function getLocadora()
    {
        return $this->locadora;
    }

    /**
     * @param int $locadora
     * @return ReservaCarroPesquisa
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        $this->setLocadoraId($locadora);
        return $this;
    }

    /**
     * @return int
     */
    public function getLocadoraId()
    {
        return $this->locadora_id;
    }

    /**
     * @param int $locadora_id
     * @return ReservaCarroPesquisa
     */
    public function setLocadoraId($locadora_id)
    {
        $this->locadora_id = $locadora_id;
        return $this;
    }

    /**
     * @return Loja
     */
    public function getLojaRetirar()
    {
        return $this->loja_retirar;
    }

    /**
     * @param int $loja_retirar
     * @return ReservaCarroPesquisa
     */
    public function setLojaRetirar($loja_retirar)
    {
        $this->loja_retirar = $loja_retirar;
        $this->setLojaRetirarId($loja_retirar);
        return $this;
    }

    /**
     * @return int
     */
    public function getLojaRetirarId()
    {
        return $this->loja_retirar_id;
    }

    /**
     * @param int $loja_retirar_id
     * @return ReservaCarroPesquisa
     */
    public function setLojaRetirarId($loja_retirar_id)
    {
        $this->loja_retirar_id = $loja_retirar_id;
        return $this;
    }

    /**
     * @return Loja
     */
    public function getLojaDevolver()
    {
        return $this->loja_devolver;
    }

    /**
     * @param int $loja_devolver
     * @return ReservaCarroPesquisa
     */
    public function setLojaDevolver($loja_devolver)
    {
        $this->loja_devolver = $loja_devolver;
        $this->setLojaDevolverId($loja_devolver);
        return $this;
    }

    /**
     * @return int
     */
    public function getLojaDevolverId()
    {
        return $this->loja_devolver_id;
    }

    /**
     * @param int $loja_devolver_id
     * @return ReservaCarroPesquisa
     */
    public function setLojaDevolverId($loja_devolver_id)
    {
        $this->loja_devolver_id = $loja_devolver_id;
        return $this;
    }

    /**
     * @return Grupo
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * @param int $grupo
     * @return ReservaCarroPesquisa
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
        $this->setGrupoId($grupo);
        return $this;
    }

    /**
     * @return int
     */
    public function getGrupoId()
    {
        return $this->grupo_id;
    }

    /**
     * @param int $grupo_id
     * @return ReservaCarroPesquisa
     */
    public function setGrupoId($grupo_id)
    {
        $this->grupo_id = $grupo_id;
        return $this;
    }

    /**
     * @return Protecao
     */
    public function getProtecao()
    {
        return $this->protecao;
    }

    /**
     * @param int $protecao
     * @return ReservaCarroPesquisa
     */
    public function setProtecao($protecao)
    {
        $this->protecao = $protecao;
        $this->setProtecaoId($protecao);
        return $this;
    }

    /**
     * @return array
     */
    public function getProtecoesOnline()
    {
        return $this->protecoes_online;
    }

    /**
     * @param array $protecoes_online
     * @return ReservaCarroPesquisa
     */
    public function setProtecoesOnline($protecoes_online)
    {
        $this->protecoes_online = $protecoes_online;
        return $this;
    }

    /**
     * @return int
     */
    public function getProtecaoId()
    {
        return $this->protecao_id;
    }

    /**
     * @param int $protecao_id
     * @return ReservaCarroPesquisa
     */
    public function setProtecaoId($protecao_id)
    {
        $this->protecao_id = $protecao_id;
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
     * @return ReservaCarroPesquisa
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
     * @return ReservaCarroPesquisa
     */
    public function setDiarias($diarias)
    {
        $this->diarias = $diarias;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorDiarias()
    {
        return $this->valor_diarias;
    }

    /**
     * @param float $valor_diarias
     * @return ReservaCarroPesquisa
     */
    public function setValorDiarias($valor_diarias)
    {
        $this->valor_diarias = $valor_diarias;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorTaxas()
    {
        return $this->valor_taxas;
    }

    /**
     * @param float $valor_taxas
     * @return ReservaCarroPesquisa
     */
    public function setValorTaxas($valor_taxas)
    {
        $this->valor_taxas = $valor_taxas;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorTaxaDevolucao()
    {
        return $this->valor_taxa_devolucao;
    }

    /**
     * @param float $valor_taxa_devolucao
     * @return ReservaCarroPesquisa
     */
    public function setValorTaxaDevolucao($valor_taxa_devolucao)
    {
        $this->valor_taxa_devolucao = $valor_taxa_devolucao;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorProtecao()
    {
        return $this->valor_protecao;
    }

    /**
     * @param float $valor_protecao
     * @return ReservaCarroPesquisa
     */
    public function setValorProtecao($valor_protecao)
    {
        $this->valor_protecao = $valor_protecao;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorHoraExtra()
    {
        return $this->valor_hora_extra;
    }

    /**
     * @param float $valor_hora_extra
     * @return ReservaCarroPesquisa
     */
    public function setValorHoraExtra($valor_hora_extra)
    {
        $this->valor_hora_extra = $valor_hora_extra;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorHoraExtraProtecao()
    {
        return $this->valor_hora_extra_protecao;
    }

    /**
     * @param float $valor_hora_extra_protecao
     * @return ReservaCarroPesquisa
     */
    public function setValorHoraExtraProtecao($valor_hora_extra_protecao)
    {
        $this->valor_hora_extra_protecao = $valor_hora_extra_protecao;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorHoraExtraOpcionais()
    {
        return $this->valor_hora_extra_opcionais;
    }

    /**
     * @param float $valor_hora_extra_opcionais
     * @return ReservaCarroPesquisa
     */
    public function setValorHoraExtraOpcionais($valor_hora_extra_opcionais)
    {
        $this->valor_hora_extra_opcionais = $valor_hora_extra_opcionais;
        return $this;
    }

    /**
     * @return array
     */
    public function getOpcionais()
    {
        return $this->opcionais;
    }

    /**
     * @param array $opcionais
     * @return ReservaCarroPesquisa
     */
    public function setOpcionais($opcionais)
    {
        $this->opcionais = $opcionais;
        return $this;
    }

    /**
     * @return array
     */
    public function getArrayOpcionais()
    {
        return $this->array_opcionais;
    }

    /**
     * @param array $array_opcionais
     * @return ReservaCarroPesquisa
     */
    public function setArrayOpcionais($array_opcionais)
    {
        $this->array_opcionais = $array_opcionais;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorTotal()
    {
        return $this->valor_total;
    }

    /**
     * @param float $valor_total
     * @return ReservaCarroPesquisa
     */
    public function setValorTotal($valor_total)
    {
        $this->valor_total = $valor_total;
        return $this;
    }

    /**
     * @return bool
     */
    public function getPromocaoDiaria()
    {
        return $this->promocao_diaria;
    }

    /**
     * @param bool $promocao_diaria
     * @return ReservaCarroPesquisa
     */
    public function setPromocaoDiaria($promocao_diaria)
    {
        $this->promocao_diaria = $promocao_diaria;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * @param DateTimeUnit $dataCadastro
     * @return ReservaCarroPesquisa
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

    /**
     * @return bool
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * @param bool $online
     * @return ReservaCarroPesquisa
     */
    public function setOnline($online)
    {
        $this->online = $online;
        return $this;
    }

    /**
     * @return int
     */
    public function getHoraExtra()
    {
        return $this->hora_extra;
    }

    /**
     * @param int $hora_extra
     * @return ReservaCarroPesquisa
     */
    public function setHoraExtra($hora_extra)
    {
        $this->hora_extra = $hora_extra;
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
     * @return ReservaCarroPesquisa
     */
    public function setDiariaExtra($diaria_extra)
    {
        $this->diaria_extra = $diaria_extra;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->user_agent;
    }

    /**
     * @param string $user_agent
     * @return ReservaCarroPesquisa
     */
    public function setUserAgent($user_agent)
    {
        $this->user_agent = $user_agent;
        return $this;
    }

    /**
     * @return array
     */
    public function getTaxasExtraLojas()
    {
        return $this->taxas_extra_lojas;
    }

    /**
     * @param array $taxas_extra_lojas
     * @return ReservaCarroPesquisa
     */
    public function setTaxasExtraLojas($taxas_extra_lojas)
    {
        $this->taxas_extra_lojas = $taxas_extra_lojas;
        return $this;
    }

    /**
     * @return int
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param int $site
     * @return ReservaCarroPesquisa
     */
    public function setSite($site)
    {
        $this->site = $site;
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
     * @return ReservaCarroPesquisa
     */
    public function setPagamento($pagamento)
    {
        $this->pagamento = $pagamento;
        return $this;
    }

    /**
     * @return bool
     */
    public function getVendaLivre()
    {
        return $this->vendaLivre;
    }

    /**
     * @param bool $vendaLivre
     * @return ReservaCarroPesquisa
     */
    public function setVendaLivre($vendaLivre)
    {
        $this->vendaLivre = $vendaLivre;
        return $this;
    }

    /**
     * @return int
     */
    public function getCodAfiliado()
    {
        return $this->codAfiliado;
    }

    /**
     * @param int $codAfiliado
     * @return ReservaCarroPesquisa
     */
    public function setCodAfiliado($codAfiliado)
    {
        $this->codAfiliado = $codAfiliado;
        return $this;
    }

    /**
     * @return string
     */
    public function getModAfiliado()
    {
        return $this->modAfiliado;
    }

    /**
     * @param string $modAfiliado
     * @return ReservaCarroPesquisa
     */
    public function setModAfiliado($modAfiliado)
    {
        $this->modAfiliado = $modAfiliado;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->session_id;
    }

    /**
     * @param string $session_id
     * @return ReservaCarroPesquisa
     */
    public function setSessionId($session_id)
    {
        $this->session_id = $session_id;
        return $this;
    }

    /**
     * @return array
     */
    public function getHistoryLog()
    {
        return $this->history_log;
    }

    /**
     * @param array $history_log
     * @return ReservaCarroPesquisa
     */
    public function setHistoryLog($history_log)
    {
        $this->history_log = $history_log;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param int $delivery
     * @return ReservaCarroPesquisa
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
        $this->setDeliveryid($delivery);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeliveryid()
    {
        return $this->deliveryid;
    }

    /**
     * @param mixed $deliveryid
     * @return ReservaCarroPesquisa
     */
    public function setDeliveryid($deliveryid)
    {
        $this->deliveryid = $deliveryid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValorDelivery()
    {
        return $this->valor_delivery;
    }

    /**
     * @param mixed $valor_delivery
     * @return ReservaCarroPesquisa
     */
    public function setValorDelivery($valor_delivery)
    {
        $this->valor_delivery = $valor_delivery;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeliveryDevo()
    {
        return $this->delivery_devo;
    }

    /**
     * @param int $delivery_devo
     * @return ReservaCarroPesquisa
     */
    public function setDeliveryDevo($delivery_devo)
    {
        $this->delivery_devo = $delivery_devo;
        $this->setDeliverydevoid($delivery_devo);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeliverydevoid()
    {
        return $this->deliverydevoid;
    }

    /**
     * @param mixed $deliverydevoid
     * @return ReservaCarroPesquisa
     */
    public function setDeliverydevoid($deliverydevoid)
    {
        $this->deliverydevoid = $deliverydevoid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValorDeliveryDevo()
    {
        return $this->valor_delivery_devo;
    }

    /**
     * @param mixed $valor_delivery_devo
     * @return ReservaCarroPesquisa
     */
    public function setValorDeliveryDevo($valor_delivery_devo)
    {
        $this->valor_delivery_devo = $valor_delivery_devo;
        return $this;
    }

    /**
     * @return string
     */
    public function getRateQual()
    {
        return $this->rate_qual;
    }

    /**
     * @param string $rate_qual
     * @return ReservaCarroPesquisa
     */
    public function setRateQual($rate_qual)
    {
        $this->rate_qual = $rate_qual;
        return $this;
    }

    /**
     * @return string
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * @param string $km
     * @return ReservaCarroPesquisa
     */
    public function setKm($km)
    {
        $this->km = $km;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValorComissao()
    {
        return $this->valor_comissao;
    }

    /**
     * @param mixed $valor_comissao
     * @return ReservaCarroPesquisa
     */
    public function setValorComissao($valor_comissao)
    {
        $this->valor_comissao = $valor_comissao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAliquotaComissao()
    {
        return $this->aliquota_comissao;
    }

    /**
     * @param mixed $aliquota_comissao
     * @return ReservaCarroPesquisa
     */
    public function setAliquotaComissao($aliquota_comissao)
    {
        $this->aliquota_comissao = $aliquota_comissao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValorCalculoComissao()
    {
        return $this->valor_calculo_comissao;
    }

    /**
     * @param mixed $valor_calculo_comissao
     * @return ReservaCarroPesquisa
     */
    public function setValorCalculoComissao($valor_calculo_comissao)
    {
        $this->valor_calculo_comissao = $valor_calculo_comissao;
        return $this;
    }

    /**
     * @return string
     */
    public function getPromoCode()
    {
        return $this->promo_code;
    }

    /**
     * @param string $promo_code
     * @return ReservaCarroPesquisa
     */
    public function setPromoCode($promo_code)
    {
        $this->promo_code = $promo_code;
        return $this;
    }

    public function getPromoCodeVal()
    {
        $cod_promocional = NULL;
        $codigo_promocional = NULL;
        if($this->getPromoCode()){
            /**
             * @var PromocaoWebservice $proweb
             */
            $obj_codpromo = $this->aluguelcarros->listPromocoesWebservice(array('codigo' => $this->getPromoCode(), 'user_request' => TRUE, 'ativo' => TRUE));
            if(is_object($obj_codpromo[0])){
                $proweb = $obj_codpromo[0];
                if($proweb->getValidadeInicial()->getTimestamp() < $this->periodo->getDataHoraAgora()->getTimestamp() && $proweb->getValidadeFinal()->getTimestamp() > $this->periodo->getDataHoraAgora()->getTimestamp()){
                    if($proweb->getValidadeRetiradaInicial()->getTimestamp() < $this->periodo->getDataHoraInicial()->getTimestamp() && $proweb->getValidadeRetiradaFinal()->getTimestamp() > $this->periodo->getDataHoraInicial()->getTimestamp()) {
                        if(is_array($proweb->getGrupos())){
                            if(in_array($this->getGrupoId(),$proweb->getGrupos())){
                                $codigo_promocional = $proweb->getCod();
                            }else{
                                $codigo_promocional = NULL;
                            }
                        }else{
                            $codigo_promocional = $proweb->getCod();
                        }
                        if($proweb->getMinDiarias() >= 1) {
                            if($proweb->getMinDiarias() > $this->periodo->getDias()){
                                $codigo_promocional = NULL;
                            }
                        }
                    }
                }

            }
        }
        return $codigo_promocional;
    }

}