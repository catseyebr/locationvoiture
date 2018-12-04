<?php

namespace Carroaluguel\Models\AluguelCarros;

use Core\DateTimeUnit;

class Locadora
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
     * @var string
     */
    private $cnpj;
    /**
     * @var bool
     */
    private $extra_opc;
    /**
     * @var bool
     */
    private $online;
    /**
     * @var float
     */
    private $taxas;
    /**
     * @var float
     */
    private $taxas_aero;
    /**
     * @var float
     */
    private $horaextra;
    /**
     * @var integer
     */
    private $prazodiaria;
    /**
     * @var float
     */
    private $horacortesia;
    /**
     * @var int
     */
    private $horacortesia_limit;
    /**
     * @var DateTimeUnit
     */
    private $horacortesia_dateini;
    /**
     * @var DateTimeUnit
     */
    private $horacortesia_datefim;
    /**
     * @var DateTimeUnit
     */
    private $horacortesia_retidateini;
    /**
     * @var DateTimeUnit
     */
    private $horacortesia_retidatefim;
    /**
     * @va string
     */
    private $horacortesia_lojas;
    /**
     * @var DateTimeUnit
     */
    private $horacortesia_devodateini;
    /**
     * @var DateTimeUnit
     */
    private $horacortesia_devodatefim;
    /**
     * @var int
     */
    private $horasdiariaextra;
    /**
     * @var string
     */
    private $txtprazocancel;
    /**
     * @var string
     */
    private $maisinfo;
    /**
     * @var float
     */
    private $kmrodado;
    /**
     * @var string
     */
    private $obs;
    /**
     * @var string
     */
    private $texto_livre;
    /**
     * @var bool
     */
    private $ativo;
    /**
     * @var bool
     */
    private $faturado;
    /**
     * @var string
     */
    private $xml_var;
    /**
     * @var int
     */
    private $xml_rdcar;
    /**
     * @var int
     */
    private $xml_delay;
    /**
     * @var bool
     */
    private $venda_livre;
    /**
     * @var string
     */
    private $parcelaminima;
    /**
     * @var string
     */
    private $parcelas;
    /**
     * @var bool
     */
    private $cartao_visa;
    /**
     * @var bool
     */
    private $cartao_master;
    /**
     * @var bool
     */
    private $cartao_american;
    /**
     * @var bool
     */
    private $cartao_hipercard;
    /**
     * @var bool
     */
    private $cartao_dinners;
    /**
     * @var bool
     */
    private $cartao_elo;
    private $cartoes_credito; //CartaoCredito
    private $cartoes_credito_arr; //array
    private $lista_cartoes; //string
    private $grupos; //Grupo
    private $grupos_ord; //Grupo
    private $lojas;
    private $protecoes; //Protecao
    private $protecoes_uni; //array
    private $protecoes_txt; //string
    /**
     * @var string
     */
    private $linkname;
    /**
     * @var string
     */
    private $color_locadora;
    /**
     * @var string
     */
    private $background_color_locadora;
    /**
     * @var string
     */
    private $meta_title;
    /**
     * @var string
     */
    private $meta_description;
    /**
     * @var string
     */
    private $meta_keywords;
    /**
     * @var string
     */
    private $meta_textoh1;
    private $metatags; //array
    private $opcionais; //array Opcional
    /**
     * @var string
     */
    private $txforma_pagamento; //string
    /**
     * @var string
     */
    private $cod_adwords; //string
    private $cidades; //array Cidade
    private $cidades_count; //integer
    private $avaliacao; //integer
    /**
     * @var int
     */
    private $idade_min;
    /**
     * @var bool
     */
    private $ws_tarifa_online;
    private $cidade_mais_reservada;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Locadora
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
     * @return Locadora
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param string $cnpj
     * @return Locadora
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
        return $this;
    }

    /**
     * @return bool
     */
    public function getExtraOpc()
    {
        return $this->extra_opc;
    }

    /**
     * @param bool $extra_opc
     * @return Locadora
     */
    public function setExtraOpc($extra_opc)
    {
        $this->extra_opc = $extra_opc;
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
     * @return Locadora
     */
    public function setOnline($online)
    {
        $this->online = $online;
        return $this;
    }

    /**
     * @return float
     */
    public function getTaxas()
    {
        return $this->taxas;
    }

    /**
     * @param float $taxas
     * @return Locadora
     */
    public function setTaxas($taxas)
    {
        $this->taxas = $taxas;
        return $this;
    }

    /**
     * @return float
     */
    public function getTaxasAero()
    {
        return $this->taxas_aero;
    }

    /**
     * @param float $taxas_aero
     * @return Locadora
     */
    public function setTaxasAero($taxas_aero)
    {
        $this->taxas_aero = $taxas_aero;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraextra()
    {
        return $this->horaextra;
    }

    /**
     * @param mixed $horaextra
     * @return Locadora
     */
    public function setHoraextra($horaextra)
    {
        $this->horaextra = $horaextra;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrazodiaria()
    {
        return $this->prazodiaria;
    }

    /**
     * @param mixed $prazodiaria
     * @return Locadora
     */
    public function setPrazodiaria($prazodiaria)
    {
        $this->prazodiaria = $prazodiaria;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoracortesia($options = NULL)
    {
        $hora_cortesia = NULL;
        if($this->getHoraCortesiaLimit()) {
            if ($options) {
                if($options['data_retirada'] && $options['data_devolucao']) {
                    $data_agora = new DateTimeUnit();
                    $data_retirada = new DateTimeUnit($options['data_retirada']);
                    $data_devolucao = new DateTimeUnit($options['data_devolucao']);
                    if ($data_agora->getTimestamp() > $this->getHoraCortesiaDateIni()->getTimestamp() && $data_agora->getTimestamp() < $this->getHoraCortesiaDateFim()->getTimestamp()) {
                        if ($data_retirada->getTimestamp() > $this->getHoraCortesiaRetiDateIni()->getTimestamp() && $data_retirada->getTimestamp() < $this->getHoraCortesiaRetiDateFim()->getTimestamp()) {
                            if ($data_devolucao->getTimestamp() > $this->getHoraCortesiaDevoDateIni()->getTimestamp() && $data_devolucao->getTimestamp() < $this->getHoraCortesiaDevoDateFim()->getTimestamp()) {
                                if (is_array($this->getHoraCortesiaLojas())) {
                                    if ($options['loja']) {
                                        if (in_array($options['loja'], $this->getHoraCortesiaLojas())) {
                                            $hora_cortesia = $this->horacortesia;
                                        }
                                    }
                                } else {
                                    $hora_cortesia = $this->horacortesia;
                                }
                            }
                        }
                    }
                }
            }
        }else{
            $hora_cortesia = $this->horacortesia;
        }
        return $hora_cortesia;
    }

    /**
     * @param mixed $horacortesia
     * @return Locadora
     */
    public function setHoracortesia($horacortesia)
    {
        $this->horacortesia = $horacortesia;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoracortesiaLimit()
    {
        return $this->horacortesia_limit;
    }

    /**
     * @param mixed $horacortesia_limit
     * @return Locadora
     */
    public function setHoracortesiaLimit($horacortesia_limit)
    {
        $this->horacortesia_limit = $horacortesia_limit;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getHoracortesiaDateini()
    {
        return $this->horacortesia_dateini;
    }

    /**
     * @param mixed $horacortesia_dateini
     * @return Locadora
     */
    public function setHoracortesiaDateini($horacortesia_dateini)
    {
        $this->horacortesia_dateini = new DateTimeUnit($horacortesia_dateini);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getHoracortesiaDatefim()
    {
        return $this->horacortesia_datefim;
    }

    /**
     * @param mixed $horacortesia_datefim
     * @return Locadora
     */
    public function setHoracortesiaDatefim($horacortesia_datefim)
    {
        $this->horacortesia_datefim = new DateTimeUnit($horacortesia_datefim);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getHoracortesiaRetidateini()
    {
        return $this->horacortesia_retidateini;
    }

    /**
     * @param mixed $horacortesia_retidateini
     * @return Locadora
     */
    public function setHoracortesiaRetidateini($horacortesia_retidateini)
    {
        $this->horacortesia_retidateini = new DateTimeUnit($horacortesia_retidateini);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getHoracortesiaRetidatefim()
    {
        return $this->horacortesia_retidatefim;
    }

    /**
     * @param mixed $horacortesia_retidatefim
     * @return Locadora
     */
    public function setHoracortesiaRetidatefim($horacortesia_retidatefim)
    {
        $this->horacortesia_retidatefim = new DateTimeUnit($horacortesia_retidatefim);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoracortesiaLojas()
    {
        return $this->horacortesia_lojas;
    }

    /**
     * @param mixed $horacortesia_lojas
     * @return Locadora
     */
    public function setHoracortesiaLojas($horacortesia_lojas)
    {
        if($this->getHoraCortesiaLimit()) {
            if($horacortesia_lojas) {
                $arr_lojas = explode(',', $horacortesia_lojas);
                $this->horacortesia_lojas = $arr_lojas;
            }
        }
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getHoracortesiaDevodateini()
    {
        return $this->horacortesia_devodateini;
    }

    /**
     * @param mixed $horacortesia_devodateini
     * @return Locadora
     */
    public function setHoracortesiaDevodateini($horacortesia_devodateini)
    {
        $this->horacortesia_devodateini = new DateTimeUnit($horacortesia_devodateini);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getHoracortesiaDevodatefim()
    {
        return $this->horacortesia_devodatefim;
    }

    /**
     * @param mixed $horacortesia_devodatefim
     * @return Locadora
     */
    public function setHoracortesiaDevodatefim($horacortesia_devodatefim)
    {
        $this->horacortesia_devodatefim = new DateTimeUnit($horacortesia_devodatefim);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHorasdiariaextra()
    {
        return $this->horasdiariaextra;
    }

    /**
     * @param mixed $horasdiariaextra
     * @return Locadora
     */
    public function setHorasdiariaextra($horasdiariaextra)
    {
        $this->horasdiariaextra = $horasdiariaextra;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTxtprazocancel()
    {
        return $this->txtprazocancel;
    }

    /**
     * @param mixed $txtprazocancel
     * @return Locadora
     */
    public function setTxtprazocancel($txtprazocancel)
    {
        $this->txtprazocancel = $txtprazocancel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaisinfo()
    {
        return $this->maisinfo;
    }

    /**
     * @param mixed $maisinfo
     * @return Locadora
     */
    public function setMaisinfo($maisinfo)
    {
        $this->maisinfo = $maisinfo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKmrodado()
    {
        return $this->kmrodado;
    }

    /**
     * @param mixed $kmrodado
     * @return Locadora
     */
    public function setKmrodado($kmrodado)
    {
        $this->kmrodado = $kmrodado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * @param mixed $obs
     * @return Locadora
     */
    public function setObs($obs)
    {
        $this->obs = $obs;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTextoLivre()
    {
        return $this->texto_livre;
    }

    /**
     * @param mixed $texto_livre
     * @return Locadora
     */
    public function setTextoLivre($texto_livre)
    {
        $this->texto_livre = $texto_livre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param mixed $ativo
     * @return Locadora
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFaturado()
    {
        return $this->faturado;
    }

    /**
     * @param mixed $faturado
     * @return Locadora
     */
    public function setFaturado($faturado)
    {
        $this->faturado = $faturado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getXmlVar()
    {
        return $this->xml_var;
    }

    /**
     * @param mixed $xml_var
     * @return Locadora
     */
    public function setXmlVar($xml_var)
    {
        $this->xml_var = $xml_var;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getXmlRdcar()
    {
        return $this->xml_rdcar;
    }

    /**
     * @param mixed $xml_rdcar
     * @return Locadora
     */
    public function setXmlRdcar($xml_rdcar)
    {
        $this->xml_rdcar = $xml_rdcar;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getXmlDelay()
    {
        return $this->xml_delay;
    }

    /**
     * @param mixed $xml_delay
     * @return Locadora
     */
    public function setXmlDelay($xml_delay)
    {
        $this->xml_delay = $xml_delay;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVendaLivre()
    {
        return $this->venda_livre;
    }

    /**
     * @param mixed $venda_livre
     * @return Locadora
     */
    public function setVendaLivre($venda_livre)
    {
        $this->venda_livre = $venda_livre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParcelaminima()
    {
        return $this->parcelaminima;
    }

    /**
     * @param mixed $parcelaminima
     * @return Locadora
     */
    public function setParcelaminima($parcelaminima)
    {
        $this->parcelaminima = $parcelaminima;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParcelas()
    {
        return $this->parcelas;
    }

    /**
     * @param mixed $parcelas
     * @return Locadora
     */
    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartaoVisa()
    {
        return $this->cartao_visa;
    }

    /**
     * @param mixed $cartao_visa
     * @return Locadora
     */
    public function setCartaoVisa($cartao_visa)
    {
        $this->cartao_visa = $cartao_visa;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartaoMaster()
    {
        return $this->cartao_master;
    }

    /**
     * @param mixed $cartao_master
     * @return Locadora
     */
    public function setCartaoMaster($cartao_master)
    {
        $this->cartao_master = $cartao_master;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartaoAmerican()
    {
        return $this->cartao_american;
    }

    /**
     * @param mixed $cartao_american
     * @return Locadora
     */
    public function setCartaoAmerican($cartao_american)
    {
        $this->cartao_american = $cartao_american;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartaoHipercard()
    {
        return $this->cartao_hipercard;
    }

    /**
     * @param mixed $cartao_hipercard
     * @return Locadora
     */
    public function setCartaoHipercard($cartao_hipercard)
    {
        $this->cartao_hipercard = $cartao_hipercard;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartaoDinners()
    {
        return $this->cartao_dinners;
    }

    /**
     * @param mixed $cartao_dinners
     * @return Locadora
     */
    public function setCartaoDinners($cartao_dinners)
    {
        $this->cartao_dinners = $cartao_dinners;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartaoElo()
    {
        return $this->cartao_elo;
    }

    /**
     * @param mixed $cartao_elo
     * @return Locadora
     */
    public function setCartaoElo($cartao_elo)
    {
        $this->cartao_elo = $cartao_elo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartoesCredito()
    {
        return $this->cartoes_credito;
    }

    /**
     * @param mixed $cartoes_credito
     * @return Locadora
     */
    public function setCartoesCredito($cartoes_credito)
    {
        $this->cartoes_credito = $cartoes_credito;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartoesCreditoArr()
    {
        return $this->cartoes_credito_arr;
    }

    /**
     * @param mixed $cartoes_credito_arr
     * @return Locadora
     */
    public function setCartoesCreditoArr($cartoes_credito_arr)
    {
        $this->cartoes_credito_arr = $cartoes_credito_arr;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getListaCartoes()
    {
        return $this->lista_cartoes;
    }

    /**
     * @param mixed $lista_cartoes
     * @return Locadora
     */
    public function setListaCartoes($lista_cartoes)
    {
        $this->lista_cartoes = $lista_cartoes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrupos()
    {
        return $this->grupos;
    }

    /**
     * @param mixed $grupos
     * @return Locadora
     */
    public function setGrupos($grupos)
    {
        $this->grupos = $grupos;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGruposOrd()
    {
        return $this->grupos_ord;
    }

    /**
     * @param mixed $grupos_ord
     * @return Locadora
     */
    public function setGruposOrd($grupos_ord)
    {
        $this->grupos_ord = $grupos_ord;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLojas()
    {
        return $this->lojas;
    }

    /**
     * @param mixed $loja
     * @return Locadora
     */
    public function addLoja($loja)
    {
        $this->lojas = $loja;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProtecoes()
    {
        return $this->protecoes;
    }

    /**
     * @param mixed $protecoes
     * @return Locadora
     */
    public function setProtecoes($protecoes)
    {
        $this->protecoes = $protecoes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProtecoesUni()
    {
        return $this->protecoes_uni;
    }

    /**
     * @param mixed $protecoes_uni
     * @return Locadora
     */
    public function setProtecoesUni($protecoes_uni)
    {
        $this->protecoes_uni = $protecoes_uni;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProtecoesTxt()
    {
        return $this->protecoes_txt;
    }

    /**
     * @param mixed $protecoes_txt
     * @return Locadora
     */
    public function setProtecoesTxt($protecoes_txt)
    {
        $this->protecoes_txt = $protecoes_txt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLinkname()
    {
        return $this->linkname;
    }

    /**
     * @param mixed $linkname
     * @return Locadora
     */
    public function setLinkname($linkname)
    {
        $this->linkname = $linkname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColorLocadora()
    {
        return $this->color_locadora;
    }

    /**
     * @param mixed $color_locadora
     * @return Locadora
     */
    public function setColorLocadora($color_locadora)
    {
        $this->color_locadora = $color_locadora;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBackgroundColorLocadora()
    {
        return $this->background_color_locadora;
    }

    /**
     * @param mixed $background_color_locadora
     * @return Locadora
     */
    public function setBackgroundColorLocadora($background_color_locadora)
    {
        $this->background_color_locadora = $background_color_locadora;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * @param mixed $meta_title
     * @return Locadora
     */
    public function setMetaTitle($meta_title)
    {
        $this->meta_title = $meta_title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * @param mixed $meta_description
     * @return Locadora
     */
    public function setMetaDescription($meta_description)
    {
        $this->meta_description = $meta_description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * @param mixed $meta_keywords
     * @return Locadora
     */
    public function setMetaKeywords($meta_keywords)
    {
        $this->meta_keywords = $meta_keywords;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetaTextoh1()
    {
        return $this->meta_textoh1;
    }

    /**
     * @param mixed $meta_textoh1
     * @return Locadora
     */
    public function setMetaTextoh1($meta_textoh1)
    {
        $this->meta_textoh1 = $meta_textoh1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetatags()
    {
        return $this->metatags;
    }

    /**
     * @param mixed $metatags
     * @return Locadora
     */
    public function setMetatags($metatags)
    {
        $this->metatags = $metatags;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOpcionais()
    {
        return $this->opcionais;
    }

    /**
     * @param mixed $opcionais
     * @return Locadora
     */
    public function setOpcionais($opcionais)
    {
        $this->opcionais = $opcionais;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTxformaPagamento()
    {
        return $this->txforma_pagamento;
    }

    /**
     * @param mixed $txforma_pagamento
     * @return Locadora
     */
    public function setTxformaPagamento($txforma_pagamento)
    {
        $this->txforma_pagamento = $txforma_pagamento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodAdwords()
    {
        return $this->cod_adwords;
    }

    /**
     * @param mixed $cod_adwords
     * @return Locadora
     */
    public function setCodAdwords($cod_adwords)
    {
        $this->cod_adwords = $cod_adwords;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidades()
    {
        return $this->cidades;
    }

    /**
     * @param mixed $cidades
     * @return Locadora
     */
    public function setCidades($cidades)
    {
        $this->cidades = $cidades;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidadesCount()
    {
        return $this->cidades_count;
    }

    /**
     * @param mixed $cidades_count
     * @return Locadora
     */
    public function setCidadesCount($cidades_count)
    {
        $this->cidades_count = $cidades_count;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvaliacao()
    {
        return $this->avaliacao;
    }

    /**
     * @param mixed $avaliacao
     * @return Locadora
     */
    public function setAvaliacao($avaliacao)
    {
        $this->avaliacao = $avaliacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdadeMin()
    {
        return $this->idade_min;
    }

    /**
     * @param mixed $idade_min
     * @return Locadora
     */
    public function setIdadeMin($idade_min)
    {
        $this->idade_min = $idade_min;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWsTarifaOnline()
    {
        return $this->ws_tarifa_online;
    }

    /**
     * @param mixed $ws_tarifa_online
     * @return Locadora
     */
    public function setWsTarifaOnline($ws_tarifa_online)
    {
        $this->ws_tarifa_online = $ws_tarifa_online;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidadeMaisReservada()
    {
        return $this->cidade_mais_reservada;
    }

    /**
     * @param mixed $cidade_mais_reservada
     * @return Locadora
     */
    public function setCidadeMaisReservada($cidade_mais_reservada)
    {
        $this->cidade_mais_reservada = $cidade_mais_reservada;
        return $this;
    }


}