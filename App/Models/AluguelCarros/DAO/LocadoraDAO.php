<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;

use Carroaluguel\Models\AluguelCarros\Locadora;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class LocadoraDAO extends Repository
{
    protected $table = "loc_locadoras";
    protected $primary_key = 'id_locadora';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Locadora($facade);
            $obj->setId($dados->id_locadora)
                ->setNome($dados->locadora)
                ->setCnpj($dados->cnpj)
                ->setExtraOpc(($dados->extra_prop == 1) ? true : false)
                ->setOnline(($dados->xml_parser == 1) ? true : false)
                ->setTaxas($dados->taxas)
                ->setTaxasAero($dados->taxas_aero)
                ->setHoraExtra($dados->hora_extra)
                ->setPrazoDiaria($dados->prazo_diaria)
                ->setHoraCortesia($dados->hora_cortesia)
                ->setHoraCortesiaLimit($dados->hora_cortesia_limit)
                ->setHoraCortesiaDateIni($dados->hora_cortesia_dateini)
                ->setHoraCortesiaDateFim($dados->hora_cortesia_datefim)
                ->setHoraCortesiaRetiDateIni($dados->hora_cortesia_retidateini)
                ->setHoraCortesiaRetiDateFim($dados->hora_cortesia_retidatefim)
                ->setHoraCortesiaLojas($dados->hora_cortesia_lojas)
                ->setHoraCortesiaDevoDateIni($dados->hora_cortesia_devodateini)
                ->setHoraCortesiaDevoDateFim($dados->hora_cortesia_devodatefim)
                ->setHorasDiariaExtra($dados->horas_diaria_extra)
                ->setTxtPrazoCancel($dados->prazo_cancel)
                ->setMaisInfo($dados->mais_info)
                ->setKmRodado($dados->km_rodado)
                ->setObs($dados->obs_locadoras)
                ->setTextoLivre($dados->texto_livre_locadoras)
                ->setAtivo(($dados->ativo == 1) ? true : false)
                ->setFaturado(($dados->faturado == 1) ? true : false)
                ->setXmlVar($dados->xml_var)
                ->setXmlRdcar($dados->xml_rdcar)
                ->setXmlDelay($dados->xml_delay)
                ->setParcelaMinima($dados->parcela_min)
                ->setParcelas($dados->num_parcelas)
                ->setCartaoAmerican(($dados->cartao_american == 1) ? true : false)
                ->setCartaoDinners(($dados->cartao_dinners == 1) ? true : false)
                ->setCartaoElo(($dados->cartao_elo == 1) ? true : false)
                ->setCartaoHipercard(($dados->cartao_hipercard == 1) ? true : false)
                ->setCartaoMaster(($dados->cartao_master == 1) ? true : false)
                ->setCartaoVisa(($dados->cartao_visa == 1) ? true : false)
                ->setLinkname($dados->link_name)
                ->setColorLocadora($dados->locadora_cor1)
                ->setBackgroundColorLocadora($dados->locadora_cor2)
                ->setMetaTitle($dados->meta_title)
                ->setMetaDescription($dados->meta_description)
                ->setMetaKeywords($dados->meta_keywords)
                ->setMetaTextoh1($dados->textoh1)
                ->setTxFormaPagamento($dados->txt_forma_pagamento)
                ->setCodAdwords($dados->cod_adwords)
                ->setIdadeMin($dados->idade_min)
                ->setWsTarifaOnline($dados->ws_tarifa_online)
                ->setVendaLivre($dados->venda_livre);
        }
        return $obj;
    }

    public function queryBuilder($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['count'])) {
            $builder->select('count(*)');
        }

        if (isset($options['id'])) {
            $builder->where('id_locadora', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('id_locadora', $options['inId']);
        }
        if (isset($options['nome'])) {
            $builder->where('locadora', $options['nome']);
        }
        if (isset($options['cnpj'])) {
            $builder->where('cnpj', $options['cnpj']);
        }
        if (isset($options['taxas'])) {
            $builder->where('taxas', $options['taxas']);
        }
        if (isset($options['taxas_aero'])) {
            $builder->where('taxas_aero', $options['taxas_aero']);
        }
        if (isset($options['horaextra'])) {
            $builder->where('hora_extra', $options['horaextra']);
        }
        if (isset($options['prazodiaria'])) {
            $builder->where('prazo_diaria', $options['prazodiaria']);
        }
        if (isset($options['horacortesia'])) {
            $builder->where('hora_cortesia', $options['horacortesia']);
        }
        if (isset($options['extra_opc'])) {
            $builder->where('extra_prop', $options['extra_opc']);
        }
        if (isset($options['txtprazocancel'])) {
            $builder->like('prazo_cancel', $options['txtprazocancel']);
        }
        if (isset($options['maisinfo'])) {
            $builder->like('mais_info', $options['maisinfo']);
        }
        if (isset($options['obs'])) {
            $builder->like('obs_locadoras', $options['obs']);
        }
        if (isset($options['kmrodado'])) {
            $builder->where('km_rodado', $options['kmrodado']);
        }
        if (isset($options['faturado'])) {
            $builder->where('faturado', $options['faturado']);
        }
        if (isset($options['parcelaminima'])) {
            $builder->where('parcela_min', $options['parcelaminima']);
        }
        if (isset($options['parcelas'])) {
            $builder->where('num_parcelas', $options['parcelas']);
        }
        if (isset($options['linkname'])) {
            $builder->where('link_name', $options['linkname']);
        }
        if (isset($options['ativo'])) {
            $builder->where('ativo', $options['ativo']);
        }
        if (isset($options['online'])) {
            $builder->where('xml_parser', $options['online']);
        }
        if (isset($options['xml_var'])) {
            $builder->where('xml_var', $options['xml_var']);
        }
        if (isset($options['ws_tarifa_online'])) {
            $builder->where('ws_tarifa_online', $options['ws_tarifa_online']);
        }
        if (isset($options['limit']) && isset($options['offset'])) {
            $builder->limit($options['limit'], $options['offset']);
        } else {
            if (isset($options['limit'])) {
                $builder->limit($options['limit']);
            }
        }

        if (isset($options['sortBy']) && isset($options['sortDirection'])) {
            $builder->order_by($options['sortBy'], $options['sortDirection']);
        }

        $query = $builder->getQuery($this->table);

        return $query;
    }

    public function queryBuilderInsert($options)
    {
        $builder = new QueryBuilder();
        $postData = null;
        if (isset($options['nome'])) {
            $postData['locadora'] = $options['nome'];
        }
        if (isset($options['cnpj'])) {
            $postData['cnpj'] = $options['cnpj'];
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set('locadora', $options['nome']);
        }
        if (isset($options['cnpj'])) {
            $builder->set('cnpj', $options['cnpj']);
        }
        if (isset($options['endereco'])) {
            $builder->set('endereco', $options['endereco']);
        }
        if (isset($options['bairro'])) {
            $builder->set('bairro', $options['bairro']);
        }
        if (isset($options['cidade'])) {
            $builder->set('cidade', $options['cidade']);
        }
        if (isset($options['loc_id_cidade'])) {
            $builder->set('loc_id_cidade', $options['loc_id_cidade']);
        }
        if (isset($options['estado'])) {
            $builder->set('estado', $options['estado']);
        }
        if (isset($options['cep'])) {
            $builder->set('cep', $options['cep']);
        }
        if (isset($options['telefone'])) {
            $builder->set('telefone', $options['telefone']);
        }
        if (isset($options['fax'])) {
            $builder->set('fax', $options['fax']);
        }
        if (isset($options['tollfree'])) {
            $builder->set('tollfree', $options['tollfree']);
        }
        if (isset($options['website'])) {
            $builder->set('website', $options['website']);
        }
        if (isset($options['email'])) {
            $builder->set('email', $options['email']);
        }
        if (isset($options['taxas'])) {
            $builder->set('taxas', $options['taxas']);
        }
        if (isset($options['taxas_aero'])) {
            $builder->set('taxas_aero', $options['taxas_aero']);
        }
        if (isset($options['horaextra'])) {
            $builder->set('hora_extra', $options['horaextra']);
        }
        if (isset($options['prazodiaria'])) {
            $builder->set('prazo_diaria', $options['prazodiaria']);
        }
        if (isset($options['horacortesia'])) {
            $builder->set('hora_cortesia', $options['horacortesia']);
        }
        if (isset($options['horasdiariaextra'])) {
            $builder->set('horas_diaria_extra', $options['horasdiariaextra']);
        }
        if (isset($options['extra_opc'])) {
            $builder->set('extra_prop', $options['extra_opc']);
        }
        if (isset($options['txtprazocancel'])) {
            $builder->set('prazo_cancel', $options['txtprazocancel']);
        }
        if (isset($options['maisinfo'])) {
            $builder->set('mais_info', $options['maisinfo']);
        }
        if (isset($options['obs'])) {
            $builder->set('obs_locadoras', $options['obs']);
        }
        if (isset($options['kmrodado'])) {
            $builder->set('km_rodado', $options['kmrodado']);
        }
        if (isset($options['nomeResponsavel'])) {
            $builder->set('nome', $options['nomeResponsavel']);
        }
        if (isset($options['cargoResponsavel'])) {
            $builder->set('cargo', $options['cargoResponsavel']);
        }
        if (isset($options['ativo'])) {
            $builder->set('ativo', $options['ativo']);
        }
        if (isset($options['externo'])) {
            $builder->set('externo', $options['externo']);
        }
        if (isset($options['interno'])) {
            $builder->set('interno', $options['interno']);
        }
        if (isset($options['km_protecao'])) {
            $builder->set('km_protecao', $options['km_protecao']);
        }
        if (isset($options['serv_entrega'])) {
            $builder->set('serv_entrega', $options['serv_entrega']);
        }
        if (isset($options['serv_devolve'])) {
            $builder->set('serv_devolve', $options['serv_devolve']);
        }
        if (isset($options['cartoes'])) {
            $builder->set('cartoes', $options['cartoes']);
        }
        if (isset($options['cartaoVisa'])) {
            $builder->set('cartao_visa', $options['cartaoVisa']);
        }
        if (isset($options['cartaoMaster'])) {
            $builder->set('cartao_master', $options['cartaoMaster']);
        }
        if (isset($options['cartaoAmerican'])) {
            $builder->set('cartao_american', $options['cartaoAmerican']);
        }
        if (isset($options['cartaoHipercard'])) {
            $builder->set('cartao_hipercard', $options['cartaoHipercard']);
        }
        if (isset($options['cartaoDinners'])) {
            $builder->set('cartao_dinners', $options['cartaoDinners']);
        }
        if (isset($options['cartaoElo'])) {
            $builder->set('cartao_elo', $options['cartaoElo']);
        }
        if (isset($options['parcelas'])) {
            $builder->set('num_parcelas', $options['parcelas']);
        }
        if (isset($options['parcelaminima'])) {
            $builder->set('parcela_min', $options['parcelaminima']);
        }
        if (isset($options['prom_especial'])) {
            $builder->set('prom_especial', $options['prom_especial']);
        }
        if (isset($options['linkTitulo'])) {
            $builder->set('link_titulo', $options['linkTitulo']);
        }
        if (isset($options['linkname'])) {
            $builder->set('link_name', $options['linkname']);
        }
        if (isset($options['metaTitle'])) {
            $builder->set('meta_title', $options['metaTitle']);
        }
        if (isset($options['metaDescription'])) {
            $builder->set('meta_description', $options['metaDescription']);
        }
        if (isset($options['metaKeywords'])) {
            $builder->set('meta_keywords', $options['metaKeywords']);
        }
        if (isset($options['dataCadastro'])) {
            $builder->set('data_cadastro_locadoras', $options['dataCadastro']);
        }
        if (isset($options['dif_title'])) {
            $builder->set('dif_title', $options['dif_title']);
        }
        if (isset($options['dif_frase1'])) {
            $builder->set('dif_frase1', $options['dif_frase1']);
        }
        if (isset($options['dif_frase2'])) {
            $builder->set('dif_frase2', $options['dif_frase2']);
        }
        if (isset($options['dif_frase3'])) {
            $builder->set('dif_frase3', $options['dif_frase3']);
        }
        if (isset($options['dif_frase4'])) {
            $builder->set('dif_frase4', $options['dif_frase4']);
        }
        if (isset($options['textolivre'])) {
            $builder->set('texto_livre_locadoras', $options['textolivre']);
        }
        if (isset($options['promocaoDia'])) {
            $builder->set('promocao_dia_locadora', $options['promocaoDia']);
        }
        if (isset($options['op_condutor_periodo'])) {
            $builder->set('op_condutor_periodo', $options['op_condutor_periodo']);
        }
        if (isset($options['corPrincipal'])) {
            $builder->set('locadora_cor1', $options['corPrincipal']);
        }
        if (isset($options['corSecundaria'])) {
            $builder->set('locadora_cor2', $options['corSecundaria']);
        }
        if (isset($options['txt_hora_extra'])) {
            $builder->set('txt_hora_extra', $options['txt_hora_extra']);
        }
        if (isset($options['online'])) {
            $builder->set('xml_parser', $options['online']);
        }
        if (isset($options['xml_var'])) {
            $builder->set('xml_var', $options['xml_var']);
        }
        if (isset($options['xml_rdcar'])) {
            $builder->set('xml_rdcar', $options['xml_rdcar']);
        }
        if (isset($options['xml_delay'])) {
            $builder->set('xml_delay', $options['xml_delay']);
        }
        if (isset($options['venda_livre'])) {
            $builder->set('venda_livre', $options['venda_livre']);
        }
        if (isset($options['textoh1'])) {
            $builder->set('textoh1', $options['textoh1']);
        }
        if (isset($options['textoh2'])) {
            $builder->set('textoh2', $options['textoh2']);
        }
        if (isset($options['nomeh2'])) {
            $builder->set('nomeh2', $options['nomeh2']);
        }
        if (isset($options['requisitos'])) {
            $builder->set('requisitos', $options['requisitos']);
        }
        if (isset($options['txtFormaPagamento'])) {
            $builder->set('txt_forma_pagamento', $options['txtFormaPagamento']);
        }
        if (isset($options['faturado'])) {
            $builder->set('faturado', $options['faturado']);
        }
        if (isset($options['codAdwords'])) {
            $builder->set('cod_adwords', $options['codAdwords']);
        }
        if (isset($options['idade_min'])) {
            $builder->set('idade_min', $options['idade_min']);
        }
        if (isset($options['txt_idade_min'])) {
            $builder->set('txt_idade_min', $options['txt_idade_min']);
        }
        if (isset($options['ws_tarifa_online'])) {
            $builder->set('ws_tarifa_online', $options['ws_tarifa_online']);
        }

        $builder->where($this->primary_key, $options['id']);

        $query = $builder->getQueryUpdate($this->table);

        return $query;
    }

    public function queryBuilderDelete($options)
    {
        $builder = new QueryBuilder();
        $builder->where($this->primary_key, $options['id']);
        $query = $builder->getQueryDelete($this->table);
        return $query;
    }

    /**
     * @param Locadora $obj
     * @param AluguelCarrosFacade $facade
     * @return Locadora
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'cnpj' => $obj->getCnpj()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $locadora = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $locadora = $this->insert($this->queryBuilderInsert($options));
        }
        return $locadora;
    }

    /**
     * @param Locadora $obj
     * @param AluguelCarrosFacade $facade
     * @return bool
     */
    public function delete($obj, $facade = null)
    {
        $del = false;
        if ($obj->getId()) {
            $options = [
                'id' => $obj->getId()
            ];
            $del = $this->purge($this->queryBuilderDelete($options));
        }
        return $del;
    }

}