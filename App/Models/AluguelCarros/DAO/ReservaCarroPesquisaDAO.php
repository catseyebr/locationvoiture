<?php


namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\ReservaCarroPesquisa;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\Period;
use Core\QueryBuilder;
use Core\Repository;

class ReservaCarroPesquisaDAO extends Repository
{
    protected $table = "loc_pesquisa";
    protected $primary_key = 'id_pesquisa';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new ReservaCarroPesquisa($facade);
            $obj->setId($dados->id_pesquisa)
                ->setLocadora($dados->id_locadora)
                ->setLojaRetirar($dados->id_loja_retirar)
                ->setLojaDevolver($dados->id_loja_devolver)
                ->setGrupo($dados->id_grupo)
                ->setProtecao($dados->id_protecao);
            $periodo_pesquisa = new Period($dados->data_retirar . "T" . $dados->hora_retirar,
                $dados->data_devolver . "T" . $dados->hora_devolver);
            $obj->setPeriodo($periodo_pesquisa)
                ->setDiarias($dados[0]->diarias)
                ->setValorDiarias($dados[0]->valor_diarias)
                ->setValorTaxaDevolucao($dados[0]->valor_taxa_devolucao)
                ->setValorProtecao($dados[0]->valor_protecao);
            $opcionais = null;
            if ($dados->op_gps > 0 || $dados->in_gps == 1) {
                $opcionais[1] = $dados->op_gps;
            }
            if ($dados->op_bebe_conforto > 0 || $dados->in_bebe_conforto == 1) {
                $opcionais[2] = $dados->op_bebe_conforto;
            }
            if ($dados->op_cadeira > 0 || $dados->in_cadeira == 1) {
                $opcioais[3] = $dados->op_cadeira;
            }
            if ($dados->op_assento_elevacao > 0 || $dados->in_assento_elevacao == 1) {
                $opcionais[4] = $dados->op_assento_elevacao;
            }
            if ($dados->op_condutor > 0 || $dados->in_condutor == 1) {
                $opcionais[5] = $dados->op_condutor;
            }
            if ($dados->op_wifi > 0 || $dados->in_wifi == 1) {
                $opcionais[6] = $dados->op_wifi;
            }
            $obj->setOpcionais($opcionais)
                ->setOpcionais($opcionais)
                ->setValorTotal($dados->valor_total)
                ->setPromocaoDiaria(($dados->promocao_diaria == 1) ? true : false)
                ->setDataCadastro($dados->data_cadastro)
                ->setOnline(($dados->xml_true == 1) ? true : false)
                ->setHoraExtra($dados->hora_extra)
                ->setDiariaExtra(($dados->diaria_extra == 1) ? true : false)
                ->setValorHoraExtra($dados->valor_hora_extra)
                ->setValorHoraExtraProtecao($dados->valor_horaextra_protecao)
                ->setValorHoraExtraOpcionais($dados->valor_horaextra_opcionais)
                ->setUserAgent($dados->user_agent)
                ->setTaxasExtraLojas($dados->taxas_extra_lojas)
                ->setPagamento($dados->rsv_pagamento)
                ->setVendaLivre(($dados->rsv_livre == 1) ? true : false)
                ->setCodAfiliado($dados->cod_afiliado)
                ->setSessionId($dados->log_session)
                ->setDelivery($dados->delivery)
                ->setValorDelivery($dados->valor_delivery)
                ->setDeliveryDevo($dados->delivery_devo)
                ->setValorDeliveryDevo($dados->valor_delivery_devo)
                ->setRateQual($dados->rate_qual)
                ->setKm($dados->km)
                ->setPromoCode($dados->promo_code);
        }
        return $obj;
    }

    public function queryBuilder($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['count'])) {
            $builder->select('count(*)');
        }

        if (isset($options['admin'])) {
            if (isset($options['id_pesquisa'])) {
                $builder->where('id_pesquisa', $options['id_pesquisa']);
            }
            if (isset($options['id_grupo'])) {
                $builder->where('id_grupo', $options['id_grupo']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('id_pesquisa', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('id_pesquisa', $options['inId']);
        }
        if (isset($options['id_locadora'])) {
            $builder->where('id_pesquisa', $options['id_locadora']);
        }
        if (isset($options['id_loja_retirar'])) {
            $builder->where('id_loja_retirar', $options['id_loja_retirar']);
        }
        if (isset($options['id_loja_devolver'])) {
            $builder->where('id_loja_devolver', $options['id_loja_devolver']);
        }
        if (isset($options['id_grupo'])) {
            $builder->where('id_grupo', $options['id_grupo']);
        }
        if (isset($options['id_protecao'])) {
            $builder->where('id_protecao', $options['id_protecao']);
        }
        if (isset($options['data_retirar'])) {
            $builder->where('data_retirar', $options['data_retirar']);
        }
        if (isset($options['hora_retirar'])) {
            $builder->where('hora_retirar', $options['hora_retirar']);
        }
        if (isset($options['data_devolver'])) {
            $builder->where('data_devolver', $options['data_devolver']);
        }
        if (isset($options['hora_devolver'])) {
            $builder->where('hora_devolver', $options['hora_devolver']);
        }
        if (isset($options['diarias'])) {
            $builder->where('diarias', $options['diarias']);
        }
        if (isset($options['valor_diarias'])) {
            $builder->where('valor_diarias', $options['valor_diarias']);
        }
        if (isset($options['valor_taxas'])) {
            $builder->where('valor_taxas', $options['valor_taxas']);
        }
        if (isset($options['valor_protecao'])) {
            $builder->where('valor_protecao', $options['valor_protecao']);
        }
        if (isset($options['in_gps'])) {
            $builder->where('in_gps', $options['in_gps']);
        }
        if (isset($options['op_gps'])) {
            $builder->where('op_gps', $options['op_gps']);
        }
        if (isset($options['in_entrega'])) {
            $builder->where('in_entrega', $options['in_entrega']);
        }
        if (isset($options['op_entrega'])) {
            $builder->where('op_entrega', $options['op_entrega']);
        }
        if (isset($options['in_cadeira'])) {
            $builder->where('in_cadeira', $options['in_cadeira']);
        }
        if (isset($options['op_cadeira'])) {
            $builder->where('op_cadeira', $options['op_cadeira']);
        }
        if (isset($options['in_condutor'])) {
            $builder->where('in_condutor', $options['in_condutor']);
        }
        if (isset($options['op_condutor'])) {
            $builder->where('op_condutor', $options['op_condutor']);
        }
        if (isset($options['in_bebe_conforto'])) {
            $builder->where('in_bebe_conforto', $options['in_bebe_conforto']);
        }
        if (isset($options['op_bebe_conforto'])) {
            $builder->where('op_bebe_conforto', $options['op_bebe_conforto']);
        }
        if (isset($options['in_assento_elevacao'])) {
            $builder->where('in_assento_elevacao', $options['in_assento_elevacao']);
        }
        if (isset($options['op_assento_elevacao'])) {
            $builder->where('op_assento_elevacao', $options['op_assento_elevacao']);
        }
        if (isset($options['ca_conjuge'])) {
            $builder->where('ca_conjuge', $options['ca_conjuge']);
        }
        if (isset($options['valor_total'])) {
            $builder->where('valor_total', $options['valor_total']);
        }
        if (isset($options['promocao_diaria'])) {
            $builder->where('promocao_diaria', $options['promocao_diaria']);
        }
        if (isset($options['data_cadastro'])) {
            $builder->where('data_cadastro', $options['data_cadastro']);
        }
        if (isset($options['xml_true'])) {
            $builder->where('xml_true', $options['xml_true']);
        }
        if (isset($options['rate_qual'])) {
            $builder->where('rate_qual', $options['rate_qual']);
        }
        if (isset($options['teste_xml'])) {
            $builder->where('teste_xml', $options['teste_xml']);
        }
        if (isset($options['hora_extra'])) {
            $builder->where('hora_extra', $options['hora_extra']);
        }
        if (isset($options['diaria_extra'])) {
            $builder->where('diaria_extra', $options['diaria_extra']);
        }
        if (isset($options['valor_hora_extra'])) {
            $builder->where('valor_hora_extra', $options['valor_hora_extra']);
        }
        if (isset($options['valor_horaextra_protecao'])) {
            $builder->where('valor_horaextra_protecao', $options['valor_horaextra_protecao']);
        }
        if (isset($options['valor_horaextra_opcionais'])) {
            $builder->where('valor_horaextra_opcionais', $options['valor_horaextra_opcionais']);
        }
        if (isset($options['user_agent'])) {
            $builder->where('user_agent', $options['user_agent']);
        }
        if (isset($options['taxas_extra_lojas'])) {
            $builder->where('taxas_extra_lojas', $options['taxas_extra_lojas']);
        }
        if (isset($options['site'])) {
            $builder->where('site', $options['site']);
        }
        if (isset($options['pagamento'])) {
            $builder->where('rsv_pagamento', $options['pagamento']);
        }
        if (isset($options['reservalivre'])) {
            $builder->where('rsv_livre', $options['reservalivre']);
        }
        if (isset($options['codAfiliado'])) {
            $builder->where('cod_afiliado', $options['codAfiliado']);
        }
        if (isset($options['msgop_log'])) {
            $builder->where('msgop_log', $options['msgop_log']);
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
        if (isset($options['id_locadora'])) {
            $postData['id_locadora'] = $options['id_locadora'];
        } else {
            $postData['id_locadora'] = null;
        }
        if (isset($options['id_loja_retirar'])) {
            $postData['id_loja_retirar'] = $options['id_loja_retirar'];
        } else {
            $postData['id_loja_retirar'] = null;
        }
        if (isset($options['id_loja_devolver'])) {
            $postData['id_loja_devolver'] = $options['id_loja_devolver'];
        } else {
            $postData['id_loja_devolver'] = null;
        }
        if (isset($options['id_grupo'])) {
            $postData['id_grupo'] = $options['id_grupo'];
        } else {
            $postData['id_grupo'] = null;
        }
        if (isset($options['id_protecao'])) {
            $postData['id_protecao'] = $options['id_protecao'];
        } else {
            $postData['id_protecao'] = null;
        }
        if (isset($options['data_retirar'])) {
            $postData['data_retirar'] = $options['data_retirar'];
        } else {
            $postData['data_retirar'] = null;
        }
        if (isset($options['hora_retirar'])) {
            $postData['hora_retirar'] = $options['hora_retirar'];
        } else {
            $postData['hora_retirar'] = null;
        }
        if (isset($options['data_devolver'])) {
            $postData['data_devolver'] = $options['data_devolver'];
        } else {
            $postData['data_devolver'] = null;
        }
        if (isset($options['hora_devolver'])) {
            $postData['hora_devolver'] = $options['hora_devolver'];
        } else {
            $postData['hora_devolver'] = null;
        }
        if (isset($options['diarias'])) {
            $postData['diarias'] = $options['diarias'];
        } else {
            $postData['diarias'] = null;
        }
        if (isset($options['valor_diarias'])) {
            $postData['valor_diarias'] = $options['valor_diarias'];
        } else {
            $postData['valor_diarias'] = null;
        }
        if (isset($options['valor_taxas'])) {
            $postData['valor_taxas'] = $options['valor_taxas'];
        } else {
            $postData['valor_taxas'] = null;
        }
        if (isset($options['valor_taxa_devolucao'])) {
            $postData['valor_taxa_devolucao'] = $options['valor_taxa_devolucao'];
        } else {
            $postData['valor_taxa_devolucao'] = null;
        }
        if (isset($options['valor_protecao'])) {
            $postData['valor_protecao'] = $options['valor_protecao'];
        } else {
            $postData['valor_protecao'] = null;
        }
        if (isset($options['in_gps'])) {
            $postData['in_gps'] = $options['in_gps'];
        } else {
            $postData['in_gps'] = null;
        }
        if (isset($options['op_gps'])) {
            $postData['op_gps'] = $options['op_gps'];
        } else {
            $postData['op_gps'] = null;
        }
        if (isset($options['in_entrega'])) {
            $postData['in_entrega'] = $options['in_entrega'];
        } else {
            $postData['in_entrega'] = null;
        }
        if (isset($options['op_entrega'])) {
            $postData['op_entrega'] = $options['op_entrega'];
        } else {
            $postData['op_entrega'] = null;
        }
        if (isset($options['in_cadeira'])) {
            $postData['in_cadeira'] = $options['in_cadeira'];
        } else {
            $postData['in_cadeira'] = null;
        }
        if (isset($options['op_cadeira'])) {
            $postData['op_cadeira'] = $options['op_cadeira'];
        } else {
            $postData['op_cadeira'] = null;
        }
        if (isset($options['in_condutor'])) {
            $postData['in_condutor'] = $options['in_condutor'];
        } else {
            $postData['in_condutor'] = null;
        }
        if (isset($options['op_condutor'])) {
            $postData['op_condutor'] = $options['op_condutor'];
        } else {
            $postData['op_condutor'] = null;
        }
        if (isset($options['in_bebe_conforto'])) {
            $postData['in_bebe_conforto'] = $options['in_bebe_conforto'];
        } else {
            $postData['in_bebe_conforto'] = null;
        }
        if (isset($options['op_bebe_conforto'])) {
            $postData['op_bebe_conforto'] = $options['op_bebe_conforto'];
        } else {
            $postData['op_bebe_conforto'] = null;
        }
        if (isset($options['in_assento_elevacao'])) {
            $postData['in_assento_elevacao'] = $options['in_assento_elevacao'];
        } else {
            $postData['in_assento_elevacao'] = null;
        }
        if (isset($options['op_assento_elevacao'])) {
            $postData['op_assento_elevacao'] = $options['op_assento_elevacao'];
        } else {
            $postData['op_assento_elevacao'] = null;
        }
        if (isset($options['in_wifi'])) {
            $postData['in_wifi'] = $options['in_wifi'];
        } else {
            $postData['in_wifi'] = null;
        }
        if (isset($options['op_wifi'])) {
            $postData['op_wifi'] = $options['op_wifi'];
        } else {
            $postData['op_wifi'] = null;
        }
        if (isset($options['ca_conjuge'])) {
            $postData['ca_conjuge'] = $options['ca_conjuge'];
        } else {
            $postData['ca_conjuge'] = null;
        }
        if (isset($options['valor_total'])) {
            $postData['valor_total'] = $options['valor_total'];
        } else {
            $postData['valor_total'] = null;
        }
        if (isset($options['promocao_diaria'])) {
            $postData['promocao_diaria'] = $options['promocao_diaria'];
        } else {
            $postData['promocao_diaria'] = null;
        }
        if (isset($options['data_cadastro'])) {
            $postData['data_cadastro'] = $options['data_cadastro'];
        } else {
            $postData['data_cadastro'] = null;
        }
        if (isset($options['xml_true'])) {
            $postData['xml_true'] = $options['xml_true'];
        } else {
            $postData['xml_true'] = null;
        }
        if (isset($options['rate_qual'])) {
            $postData['rate_qual'] = $options['rate_qual'];
        } else {
            $postData['rate_qual'] = null;
        }
        if (isset($options['teste_xml'])) {
            $postData['teste_xml'] = $options['teste_xml'];
        } else {
            $postData['teste_xml'] = null;
        }
        if (isset($options['hora_extra'])) {
            $postData['hora_extra'] = $options['hora_extra'];
        } else {
            $postData['hora_extra'] = null;
        }
        if (isset($options['diaria_extra'])) {
            $postData['diaria_extra'] = $options['diaria_extra'];
        } else {
            $postData['diaria_extra'] = null;
        }
        if (isset($options['valor_hora_extra'])) {
            $postData['valor_hora_extra'] = $options['valor_hora_extra'];
        } else {
            $postData['valor_hora_extra'] = null;
        }
        if (isset($options['valor_horaextra_protecao'])) {
            $postData['valor_horaextra_protecao'] = $options['valor_horaextra_protecao'];
        } else {
            $postData['valor_horaextra_protecao'] = null;
        }
        if (isset($options['valor_horaextra_opcionais'])) {
            $postData['valor_horaextra_opcionais'] = $options['valor_horaextra_opcionais'];
        } else {
            $postData['valor_horaextra_opcionais'] = null;
        }
        if (isset($options['user_agent'])) {
            $postData['user_agent'] = $options['user_agent'];
        } else {
            $postData['user_agent'] = null;
        }
        if (isset($options['taxas_extra_lojas'])) {
            $postData['taxas_extra_lojas'] = $options['taxas_extra_lojas'];
        } else {
            $postData['taxas_extra_lojas'] = null;
        }
        if (isset($options['site'])) {
            $postData['site'] = $options['site'];
        } else {
            $postData['site'] = 2;
        }
        if (isset($options['pagamento'])) {
            $postData['rsv_pagamento'] = $options['pagamento'];
        } else {
            $postData['rsv_pagamento'] = 'cartao';
        }
        if (isset($options['reservalivre'])) {
            $postData['rsv_livre'] = $options['reservalivre'];
        } else {
            $postData['rsv_livre'] = 0;
        }
        if (isset($options['codAfiliado'])) {
            $postData['cod_afiliado'] = $options['codAfiliado'];
        } else {
            $postData['cod_afiliado'] = null;
        }
        if (isset($options['modAfiliado'])) {
            $postData['mod_afiliado'] = $options['modAfiliado'];
        } else {
            $postData['mod_afiliado'] = null;
        }
        if (isset($options['session'])) {
            $postData['log_session'] = $options['session'];
        } else {
            $postData['log_session'] = null;
        }
        if (isset($options['msgop_log'])) {
            $postData['msgop_log'] = $options['msgop_log'];
        } else {
            $postData['msgop_log'] = null;
        }
        if (isset($options['delivery'])) {
            $postData['delivery'] = $options['delivery'];
        } else {
            $postData['delivery'] = null;
        }
        if (isset($options['delivery_devo'])) {
            $postData['delivery_devo'] = $options['delivery_devo'];
        } else {
            $postData['delivery_devo'] = null;
        }
        if (isset($options['valor_delivery'])) {
            $postData['valor_delivery'] = $options['valor_delivery'];
        } else {
            $postData['valor_delivery'] = null;
        }
        if (isset($options['valor_delivery_devo'])) {
            $postData['valor_delivery_devo'] = $options['valor_delivery_devo'];
        } else {
            $postData['valor_delivery_devo'] = null;
        }
        if (isset($options['rate_qual'])) {
            $postData['rate_qual'] = $options['rate_qual'];
        } else {
            $postData['rate_qual'] = null;
        }
        if (isset($options['km'])) {
            $postData['km'] = $options['km'];
        } else {
            $postData['km'] = null;
        }
        if (isset($options['promo_code'])) {
            $postData['promo_code'] = $options['promo_code'];
        } else {
            $postData['promo_code'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['id_locadora'])) {
            $builder->set('id_pesquisa', $options['id_locadora']);
        }
        if (isset($options['id_loja_retirar'])) {
            $builder->set('id_loja_retirar', $options['id_loja_retirar']);
        }
        if (isset($options['id_loja_devolver'])) {
            $builder->set('id_loja_devolver', $options['id_loja_devolver']);
        }
        if (isset($options['id_grupo'])) {
            $builder->set('id_grupo', $options['id_grupo']);
        }
        if (isset($options['id_protecao'])) {
            $builder->set('id_protecao', $options['id_protecao']);
        }
        if (isset($options['data_retirar'])) {
            $builder->set('data_retirar', $options['data_retirar']);
        }
        if (isset($options['hora_retirar'])) {
            $builder->set('hora_retirar', $options['hora_retirar']);
        }
        if (isset($options['data_devolver'])) {
            $builder->set('data_devolver', $options['data_devolver']);
        }
        if (isset($options['hora_devolver'])) {
            $builder->set('hora_devolver', $options['hora_devolver']);
        }
        if (isset($options['diarias'])) {
            $builder->set('diarias', $options['diarias']);
        }
        if (isset($options['valor_diarias'])) {
            $builder->set('valor_diarias', $options['valor_diarias']);
        }
        if (isset($options['valor_taxas'])) {
            $builder->set('valor_taxas', $options['valor_taxas']);
        }
        if (isset($options['valor_protecao'])) {
            $builder->set('valor_protecao', $options['valor_protecao']);
        }
        if (isset($options['in_gps'])) {
            $builder->set('in_gps', $options['in_gps']);
        }
        if (isset($options['op_gps'])) {
            $builder->set('op_gps', $options['op_gps']);
        }
        if (isset($options['in_entrega'])) {
            $builder->set('in_entrega', $options['in_entrega']);
        }
        if (isset($options['op_entrega'])) {
            $builder->set('op_entrega', $options['op_entrega']);
        }
        if (isset($options['in_cadeira'])) {
            $builder->set('in_cadeira', $options['in_cadeira']);
        }
        if (isset($options['op_cadeira'])) {
            $builder->set('op_cadeira', $options['op_cadeira']);
        }
        if (isset($options['in_condutor'])) {
            $builder->set('in_condutor', $options['in_condutor']);
        }
        if (isset($options['op_condutor'])) {
            $builder->set('op_condutor', $options['op_condutor']);
        }
        if (isset($options['in_bebe_conforto'])) {
            $builder->set('in_bebe_conforto', $options['in_bebe_conforto']);
        }
        if (isset($options['op_bebe_conforto'])) {
            $builder->set('op_bebe_conforto', $options['op_bebe_conforto']);
        }
        if (isset($options['in_assento_elevacao'])) {
            $builder->set('in_assento_elevacao', $options['in_assento_elevacao']);
        }
        if (isset($options['op_assento_elevacao'])) {
            $builder->set('op_assento_elevacao', $options['op_assento_elevacao']);
        }
        if (isset($options['ca_conjuge'])) {
            $builder->set('ca_conjuge', $options['ca_conjuge']);
        }
        if (isset($options['valor_total'])) {
            $builder->set('valor_total', $options['valor_total']);
        }
        if (isset($options['promocao_diaria'])) {
            $builder->set('promocao_diaria', $options['promocao_diaria']);
        }
        if (isset($options['data_cadastro'])) {
            $builder->set('data_cadastro', $options['data_cadastro']);
        }
        if (isset($options['xml_true'])) {
            $builder->set('xml_true', $options['xml_true']);
        }
        if (isset($options['rate_qual'])) {
            $builder->set('rate_qual', $options['rate_qual']);
        }
        if (isset($options['teste_xml'])) {
            $builder->set('teste_xml', $options['teste_xml']);
        }
        if (isset($options['hora_extra'])) {
            $builder->set('hora_extra', $options['hora_extra']);
        }
        if (isset($options['diaria_extra'])) {
            $builder->set('diaria_extra', $options['diaria_extra']);
        }
        if (isset($options['valor_hora_extra'])) {
            $builder->set('valor_hora_extra', $options['valor_hora_extra']);
        }
        if (isset($options['valor_horaextra_protecao'])) {
            $builder->set('valor_horaextra_protecao', $options['valor_horaextra_protecao']);
        }
        if (isset($options['valor_horaextra_opcionais'])) {
            $builder->set('valor_horaextra_opcionais', $options['valor_horaextra_opcionais']);
        }
        if (isset($options['user_agent'])) {
            $builder->set('user_agent', $options['user_agent']);
        }
        if (isset($options['taxas_extra_lojas'])) {
            $builder->set('taxas_extra_lojas', $options['taxas_extra_lojas']);
        }
        if (isset($options['site'])) {
            $builder->set('site', $options['site']);
        }
        if (isset($options['pagamento'])) {
            $builder->set('rsv_pagamento', $options['pagamento']);
        }
        if (isset($options['reservalivre'])) {
            $builder->set('rsv_livre', $options['reservalivre']);
        }
        if (isset($options['codAfiliado'])) {
            $builder->set('cod_afiliado', $options['codAfiliado']);
        }
        if (isset($options['modAfiliado'])) {
            $builder->set('mod_afiliado', $options['modAfiliado']);
        }
        if (isset($options['delivery'])) {
            $builder->set('delivery', $options['delivery']);
        }
        if (isset($options['delivery_devo'])) {
            $builder->set('delivery_devo', $options['delivery_devo']);
        }
        if (isset($options['valor_delivery'])) {
            $builder->set('valor_delivery', $options['valor_delivery']);
        }
        if (isset($options['valor_delivery_devo'])) {
            $builder->set('valor_delivery_devo', $options['valor_delivery_devo']);
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
     * @param ReservaCarroPesquisa $obj
     * @param AluguelCarrosFacade $facade
     * @return ReservaCarroPesquisa
     */
    public function save($obj, $facade = null)
    {
        $codigo_afiliado = null;
        $modulo_afiliado = null;
        if (isset($_COOKIE["userafil"]) && $_COOKIE["userafil"] != '') {
            $codigo_afiliado = $_COOKIE["userafil"];
        }
        if (isset($_COOKIE["moduloafil"]) && $_COOKIE["moduloafil"] != '') {
            $modulo_afiliado = $_COOKIE["moduloafil"];
        }
        if (isset($_SESSION['afiliado_registro'])) {
            if (isset($_SESSION['afiliado_registro']['id']) && $_SESSION['afiliado_registro']['id'] != '') {
                $codigo_afiliado = $_SESSION['afiliado_registro']['id'];
            }
            if (isset($_SESSION['afiliado_registro']['modulo']) && $_SESSION['afiliado_registro']['modulo'] != '') {
                $modulo_afiliado = $_SESSION['afiliado_registro']['modulo'];
            }
        }
        $options = [
            'id_locadora' => $obj->getLocadoraId(),
            'id_loja_retirar' => $obj->getLojaRetirarId(),
            'id_loja_devolver' => $obj->getLojaDevolverId(),
            'id_grupo' => $obj->getGrupoId(),
            'id_protecao' => $obj->getProtecaoId(),
            'data_retirar' => $obj->getPeriodo()->getDataHoraInicial()->getDataSql(),
            'hora_retirar' => $obj->getPeriodo()->getDataHoraInicial()->getHoraSql(),
            'data_devolver' => $obj->getPeriodo()->getDataHoraFinal()->getDataSql(),
            'hora_devolver' => $obj->getPeriodo()->getDataHoraFinal()->getHoraSql(),
            'diarias' => $obj->getDiarias(),
            'valor_diarias' => $obj->getValorDiarias(),
            'valor_taxas' => $obj->getValorTaxas(),
            'valor_taxa_devolucao' => $obj->getValorTaxaDevolucao(),
            'valor_protecao' => $obj->getValorProtecao(),
            'valor_total' => $obj->getValorTotal(),
            'promocao_diaria' => ($obj->getPromocaoDiaria()) ? 1 : 0,
            'data_cadastro' => date("Y-m-d H:i:s"),
            'xml_true' => ($obj->getOnline()) ? 1 : 0,
            'teste_xml' => null,
            'hora_extra' => $obj->getHoraExtra(),
            'diaria_extra' => $obj->getDiariaExtra(),
            'valor_hora_extra' => $obj->getValorHoraExtra(),
            'valor_horaextra_protecao' => $obj->getValorHoraExtraProtecao(),
            'valor_horaextra_opcionais' => $obj->getValorHoraExtraOpcionais(),
            'user_agent' => $obj->getUserAgent(),
            'pagamento' => $obj->getPagamento(),
            'reservalivre' => ($obj->getVendaLivre()) ? 1 : 0,
            'codAfiliado' => $codigo_afiliado,
            'modAfiliado' => $modulo_afiliado,
            'session' => session_id(),
            'msgop_log' => (isset($_COOKIE['msgopid'])) ? $_COOKIE['msgopid'] : null,
            'delivery' => $obj->getDeliveryId(),
            'valor_delivery' => $obj->getValorDelivery(),
            'delivery_devo' => $obj->getDeliveryDevoId(),
            'valor_delivery_devo' => $obj->getValorDeliveryDevo(),
            'rate_qual' => $obj->getRateQual(),
            'km' => $obj->getKm(),
            'promo_code' => $obj->getPromoCodeVal()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $pesquisa = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $pesquisa = $this->insert($this->queryBuilderInsert($options));
        }
        return $pesquisa;
    }

    /**
     * @param ReservaCarroPesquisa $obj
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