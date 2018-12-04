<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\ReservaCarro;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\Period;
use Core\QueryBuilder;
use Core\Repository;

class ReservaCarroDAO extends Repository
{
    protected $table = "loc_reserva";
    protected $primary_key = 'id_reserva';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new ReservaCarro($facade);
            $obj->setId($dados->id_reserva)
                ->setLocadora($dados->id_locadora)
                ->setLojaRetirar($dados->id_loja_retirar)
                ->setLojaDevolver($dados->id_loja_devolver)
                ->setGrupo($dados->id_grupo)
                ->setProtecao($dados->id_protecao)
                ->setEmissor($dados->id_empresa)
                ->setOperador($dados->id_operador)
                ->setCliente($dados->id_emissor)
                ->setIsPj(($dados->ispj == '1') ? true : false)
                ->setCondutor($dados->id_condutor)
                ->setCondutorAdicional($dados->id_condutor_ad);
            $periodo_reserva = new Period($dados->data_retirar . "T" . $dados->hora_retirar,
                $dados->data_devolver . "T" . $dados->hora_devolver);
            $obj->setPeriodo($periodo_reserva)
                ->setDiarias($dados->diarias)
                ->setDiariaExtra($dados->diaria_extra)
                ->setValorDiarias($dados->valor_diarias)
                ->setValorTaxas($dados->valor_taxas)
                ->setTaxasExtraLojas($dados->valor_tx_extra_loja)
                ->setValorProtecao($dados->valor_protecao);
            $opcionais = null;
            if ($dados->valor_gps > 0 || $dados->in_gps == 1) {
                $opcionais[1] = $dados->valor_gps;
            }
            if ($dados->valor_bebe_conforto > 0 || $dados->in_bebe_conforto == 1) {
                $opcionais[2] = $dados->valor_bebe_conforto;
            }
            if ($dados->valor_cadeira > 0 || $dados->in_cadeira == 1) {
                $opcioais[3] = $dados->valor_cadeira;
            }
            if ($dados->valor_assento_elevacao > 0 || $dados->in_assento_elevacao == 1) {
                $opcionais[4] = $dados->valor_assento_elevacao;
            }
            if ($dados->valor_condutor > 0 || $dados->in_condutor == 1) {
                $opcionais[5] = $dados->valor_condutor;
            }
            $obj->setOpcionais($opcionais)
                ->setValorDevolucao($dados->valor_devolucao)
                ->setValorHoraExtra($dados->valor_hora_extra)
                ->setValorHoraExtraProtecao($dados->valor_hora_extra_protecao)
                ->setValorHoraExtraOpcionais($dados->valor_hora_extra_opcionais)
                ->setValorTotal($dados->valor_total)
                ->setPagamento($dados->pagamento)
                ->setDataCadastro($dados->data)
                ->setDataAtualizacao($dados->data_atualiza)
                ->setCodConfirmacao($dados->cod_confirmacao)
                ->setNomeConfirmacao($dados->nome_confirmacao)
                ->setCiaAerea($dados->cia_aerea)
                ->setNumVoo($dados->num_voo)
                ->setStatus($dados->status)
                ->setAtivaOpcao(($dados->reserva_ativa == 1) ? true : false)
                ->setLimiteOpcao($dados->opcao_data_limite)
                ->setOnline(($dados->online == 1) ? true : false)
                ->setObservacoes($dados->observacoes)
                ->setPesquisa($dados->id_pesquisa)
                ->setMdCode($dados->md5_reserva)
                ->setReservasSimilares($dados->similar_reservas)
                ->setVendaLivre($dados->venda_livre)
                ->setCodAfiliado($dados->cod_afiliado)
                ->setSolicitaCancelamento(($dados->sol_bloqueio == 1) ? true : false)
                ->setReservasSimilaresVisto(($dados->visto_similar_reservas == 1) ? true : false)
                ->setDelivery($dados->delivery)
                ->setValorDelivery($dados->valor_delivery)
                ->setDeliveryDevo($dados->delivery_devo)
                ->setValorDeliveryDevo($dados->valor_delivery_devo)
                ->setNomeDelivery($dados->nome_delivery);
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
            $builder->tableJoin('loc_lojas', 'loc_lojas.id_loja = loc_reserva.id_loja_retirar', 'LEFT');
            $builder->tableJoin('loc_grupos', 'loc_grupos.id_grupo = loc_reserva.id_grupo', 'LEFT');
            $builder->where_not('id_emissor', '7524');
            $builder->where_not('id_emissor', '82307096');
            if (isset($options['id_reserva'])) {
                $builder->where('id_reserva', $options['id_reserva']);
            }
            if (isset($options['id_site'])) {
                $builder->where('id_site', $options['id_site']);
            }
            if (isset($options['cod_afiliado'])) {
                $builder->where('cod_afiliado', $options['cod_afiliado']);
            }
            if (isset($options['id_grupo'])) {
                $builder->where('id_grupo', $options['id_grupo']);
            }
            if (isset($options['grupo'])) {
                $builder->where('grupo', $options['grupo']);
            }
            if (isset($options['id_operador'])) {
                $builder->where('id_operador', $options['id_operador']);
            }
            if (isset($options['data_sol'])) {
                $data_arr = explode('/', $options['data_sol']);
                $data_validate = $data_arr[2] . '-' . $data_arr[1] . '-' . $data_arr[0];
                $builder->like("data", $data_validate);
            }
            if (isset($options['data_retirar'])) {
                $data_arr_r = explode('/', $options['data_retirar']);
                $data_validate_r = $data_arr_r[2] . '-' . $data_arr_r[1] . '-' . $data_arr_r[0];
                $builder->like("data_retirar", $data_validate_r);
            }
            if (isset($options['data_devo'])) {
                $data_arr_dev = explode('/', $options['data_devo']);
                $data_validate_dev = $data_arr_dev[2] . '-' . $data_arr_dev[1] . '-' . $data_arr_dev[0];
                $builder->like("data_devolver", $data_validate_dev);
            }
            if (isset($options['loc_lojas.cidade'])) {
                $builder->like('loc_lojas.cidade', $options['loc_lojas.cidade']);
            }
            if (isset($options['cod_confirmacao'])) {
                $builder->like('cod_confirmacao', $options['cod_confirmacao']);
            }
        }
        $custom_query = null;
        if (isset($options['id'])) {
            $builder->where('id_reserva', $options['id']);
        }
        if (isset($options['id_low'])) {
            $builder->lower('id_reserva', $options['id_low']);
        }
        if (isset($options['id_great'])) {
            $builder->greater('id_reserva', $options['id_great']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('id_reserva', $options['inId']);
        }
        if (isset($options['id_locadora'])) {
            $builder->where('id_locadora', $options['id_locadora']);
        }
        if (isset($options['loc_reserva.id_locadora'])) {
            $builder->where('loc_reserva.id_locadora', $options['loc_reserva.id_locadora']);
        }
        if (isset($options['in_locadoras'])) {
            $builder->where_in('id_locadora', $options['in_locadoras']);
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
        if (isset($options['id_empresa'])) {
            $builder->where('id_empresa', $options['id_empresa']);
        }
        if (isset($options['id_emissor'])) {
            $builder->where('id_emissor', $options['id_emissor']);
        }
        if (isset($options['ispj'])) {
            $builder->where('ispj', $options['ispj']);
        }
        if (isset($options['id_operador'])) {
            $builder->where('id_operador', $options['id_operador']);
        }
        if (isset($options['id_condutor'])) {
            $builder->where('id_condutor', $options['id_condutor']);
        }
        if (isset($options['id_condutor_ad'])) {
            $builder->where('id_condutor_ad', $options['id_condutor_ad']);
        }
        if (isset($options['dataRetirada'])) {
            $builder->where('data_retirar', $options['dataRetirada']);
        }
        if (isset($options['dataRetiradaLower'])) {
            $builder->lower('data_retirar', "'" . $options['dataRetiradaLower'] . "'");
        }
        if (isset($options['hora_retirar'])) {
            $builder->where('hora_retirar', $options['hora_retirar']);
        }
        if (isset($options['dataDevolucao'])) {
            $builder->where('data_devolver', $options['dataDevolucao']);
        }
        if (isset($options['dataDevolucaoLower'])) {
            $builder->lower('data_devolver', "'" . $options['dataDevolucaoLower'] . "'");
        }
        if (isset($options['hora_devolver'])) {
            $builder->where('hora_devolver', $options['hora_devolver']);
        }
        if (isset($options['diarias'])) {
            $builder->where('diarias', $options['diarias']);
        }
        if (isset($options['diaria_extra'])) {
            $builder->where('diaria_extra', $options['diaria_extra']);
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
        if (isset($options['valor_tx_extra_loja'])) {
            $builder->where('valor_tx_extra_loja', $options['valor_tx_extra_loja']);
        }
        if (isset($options['in_gps'])) {
            $builder->where('in_gps', $options['in_gps']);
        }
        if (isset($options['valor_gps'])) {
            $builder->where('valor_gps', $options['valor_gps']);
        }
        if (isset($options['in_entrega'])) {
            $builder->where('in_entrega', $options['in_entrega']);
        }
        if (isset($options['valor_entrega'])) {
            $builder->where('valor_entrega', $options['valor_entrega']);
        }
        if (isset($options['in_cadeira'])) {
            $builder->where('in_cadeira', $options['in_cadeira']);
        }
        if (isset($options['valor_cadeira'])) {
            $builder->where('valor_cadeira', $options['valor_cadeira']);
        }
        if (isset($options['in_condutor'])) {
            $builder->where('in_condutor', $options['in_condutor']);
        }
        if (isset($options['valor_condutor'])) {
            $builder->where('valor_condutor', $options['valor_condutor']);
        }
        if (isset($options['in_bebe_conforto'])) {
            $builder->where('in_bebe_conforto', $options['in_bebe_conforto']);
        }
        if (isset($options['valor_bebe_conforto'])) {
            $builder->where('valor_bebe_conforto', $options['valor_bebe_conforto']);
        }
        if (isset($options['in_assento_elevacao'])) {
            $builder->where('in_assento_elevacao', $options['in_assento_elevacao']);
        }
        if (isset($options['valor_assento_elevacao'])) {
            $builder->where('valor_assento_elevacao', $options['valor_assento_elevacao']);
        }
        if (isset($options['ca_conjuge'])) {
            $builder->where('ca_conjuge', $options['ca_conjuge']);
        }
        if (isset($options['valor_hora_extra'])) {
            $builder->where('valor_hora_extra', $options['valor_hora_extra']);
        }
        if (isset($options['valor_hora_extra_protecao'])) {
            $builder->where('valor_hora_extra_protecao', $options['valor_hora_extra_protecao']);
        }
        if (isset($options['valor_hora_extra_opcionais'])) {
            $builder->where('valor_hora_extra_opcionais', $options['valor_hora_extra_opcionais']);
        }
        if (isset($options['valor_total'])) {
            $builder->where('valor_total', $options['valor_total']);
        }
        if (isset($options['valor_devolucao'])) {
            $builder->where('valor_devolucao', $options['valor_devolucao']);
        }
        if (isset($options['pagamento'])) {
            $builder->where('pagamento', $options['pagamento']);
        }
        if (isset($options['nome_cliente'])) {
            $builder->where('nome_cliente', $options['nome_cliente']);
        }
        if (isset($options['sobrenome_cliente'])) {
            $builder->where('sobrenome_cliente', $options['sobrenome_cliente']);
        }
        if (isset($options['data'])) {
            $builder->where('data', $options['data']);
        }
        if (isset($options['data_atualiza'])) {
            $builder->where('data_atualiza', $options['data_atualiza']);
        }
        if (isset($options['data_atualiza_recente'])) {
            $builder->lower('data_atualiza', "'" . $options['data_atualiza_recente'] . "'");
        }
        if (isset($options['cod_confirmacao'])) {
            $builder->like('cod_confirmacao', $options['cod_confirmacao']);
        }
        if (isset($options['nome_confirmacao'])) {
            $builder->where('nome_confirmacao', $options['nome_confirmacao']);
        }
        if (isset($options['cia_aerea'])) {
            $builder->where('cia_aerea', $options['cia_aerea']);
        }
        if (isset($options['num_voo'])) {
            $builder->where('num_voo', $options['num_voo']);
        }
        if (isset($options['status'])) {
            $builder->where('status', $options['status']);
        }
        if (isset($options['inStatus'])) {
            $builder->where_in('status', $options['inStatus']);
        }
        if (isset($options['ativaOpcao'])) {
            $builder->where('reserva_ativa', $options['ativaOpcao']);
        }
        if (isset($options['online'])) {
            $builder->where('online', $options['online']);
        }
        if (isset($options['agencia'])) {
            $builder->where('agencia', $options['agencia']);
        }
        if (isset($options['externo'])) {
            $builder->where('externo', $options['externo']);
        }
        if (isset($options['observacoes'])) {
            $builder->where('observacoes', $options['observacoes']);
        }
        if (isset($options['pesquisa'])) {
            $builder->where('id_pesquisa', $options['pesquisa']);
        }
        if (isset($options['site'])) {
            $builder->where('id_site', $options['site']);
        }
        if (isset($options['md5_reserva'])) {
            $builder->where('md5_reserva', $options['md5_reserva']);
        }
        if (isset($options['similar_reservas'])) {
            $builder->where('similar_reservas', $options['similar_reservas']);
        }
        if (isset($options['visto_similar_reservas'])) {
            $builder->where('visto_similar_reservas', $options['visto_similar_reservas']);
        }
        if (isset($options['venda_livre'])) {
            $builder->where('venda_livre', $options['venda_livre']);
        }
        if (isset($options['codAfiliado'])) {
            $builder->where('cod_afiliado', $options['codAfiliado']);
        }
        if (isset($options['emailCliente'])) {
            $builder->tableJoin('r_emissor', 'r_emissor.id_emissor = loc_reserva.id_emissor', 'LEFT');
            $builder->like('r_emissor.email', $options['emailCliente']);

        }
        if (isset($options['dataInicial']) && isset($options['dataFinal'])) {
            $builder->lower('data', "'" . $options['dataInicial'] . "'");
            $builder->greater('data', "'" . $options['dataFinal'] . "'");
        }

        if (isset($options['dataInicialCheck']) && isset($options['dataFinalCheck'])) {
            $builder->lower('data_devolver', "'" . $options['dataInicialCheck'] . "'");
            $builder->greater('data_devolver', "'" . $options['dataFinalCheck'] . "'");
        }

        if (isset($options['dataCheckoutInicial']) && isset($options['dataCheckoutFinal'])) {
            $builder->between_std('data_devolver', "'" . $options['dataCheckoutInicial'] . "'",
                "'" . $options['dataCheckoutFinal'] . "'");
        }
        if (isset($options['dataSolInicial']) && isset($options['dataSolFinal'])) {
            $builder->between_std('data', "'" . $options['dataSolInicial'] . "'", "'" . $options['dataSolFinal'] . "'");
        }

        if (isset($options['sortBy']) && isset($options['sortDirection'])) {
            $builder->order_by($options['sortBy'], $options['sortDirection']);
        }
        if (isset($options['dataInicialP']) && isset($options['dataFinalP']) && isset($options['id_emissor'])) {
            $custom_query = "SELECT * FROM loc_reserva WHERE status IN (" . $options['inStatus'] . ") AND id_emissor= '" . $options['id_emissor'] . "' AND (('" . $options['dataInicialP'] . "' BETWEEN data_retirar AND data_devolver) OR ('" . $options['dataFinalP'] . "' BETWEEN data_retirar AND data_devolver))";
        }
        if (isset($options['dataInicialPA']) && isset($options['dataFinalPA']) && isset($options['ativaOpcao'])) {
            $custom_query = "SELECT * FROM loc_reserva WHERE reserva_ativa = " . $options['ativaOpcao'] . " AND id_emissor= '" . $options['id_emissor'] . "' AND (('" . $options['dataInicialPA'] . "' BETWEEN data_retirar AND data_devolver) OR ('" . $options['dataFinalPA'] . "' BETWEEN data_retirar AND data_devolver))";

        }
        if (isset($options['dataInicialS']) && isset($options['dataFinalS']) && isset($options['id_emissor'])) {
            $custom_query = "SELECT * FROM loc_reserva WHERE loc_reserva.id_reserva != " . $options['rsv_sim'] . " AND status IN (" . $options['inStatus'] . ") AND id_emissor= '" . $options['id_emissor'] . "' AND loc_reserva.visto_similar_reservas IS NULL AND (('" . $options['dataInicialS'] . "' BETWEEN data_retirar AND data_devolver) OR ('" . $options['dataFinalS'] . "' BETWEEN data_retirar AND data_devolver))";
        }
        if (isset($options['pendentes_online']) && isset($options['id_locadora'])) {
            $custom_query = "SELECT * FROM loc_reserva WHERE id_locadora = " . $options['id_locadora'] . " AND loc_reserva.status IN (1) AND loc_reserva.cod_confirmacao != ''";
        }
        if (isset($options['count'])) {
            $custom_query = "SELECT COUNT(*) `total` FROM loc_reserva";
        }

        if (isset($options['email_fechou_reserva'])) {
            $custom_query = "SELECT * FROM loc_reserva INNER JOIN r_emissor ON loc_reserva.id_emissor = r_emissor.id_emissor WHERE r_emissor.email = '{$options['email_fechou_reserva']}' AND loc_reserva.data > DATE_SUB(NOW(), INTERVAL 2 HOUR) LIMIT 1;";
        }

        if (isset($options['cidade_mais_reservada']) && isset($options['locadora'])) {
            $custom_query = "SELECT loc_reserva.id_locadora, loc_reserva.id_loja_retirar, loc_lojas.cidade, count(loc_reserva.id_loja_retirar) as rsvs FROM loc_reserva LEFT JOIN loc_lojas on loc_lojas.id_loja = loc_reserva.id_loja_retirar WHERE loc_reserva.id_locadora=" . $options['locadora'] . " GROUP by loc_reserva.id_loja_retirar ORDER BY rsvs DESC LIMIT 1";
        }

        if (isset($options['customQuery'])) {
            $custom_query = $options['customQuery'];
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

        $query = $builder->getQuery($this->table, $custom_query);

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

        if (isset($options['id_empresa'])) {
            $postData['id_empresa'] = $options['id_empresa'];
        } else {
            $postData['id_empresa'] = null;
        }

        if (isset($options['id_emissor'])) {
            $postData['id_emissor'] = $options['id_emissor'];
        } else {
            $postData['id_emissor'] = null;
        }

        if (isset($options['ispj'])) {
            $postData['ispj'] = $options['ispj'];
        } else {
            $postData['ispj'] = 0;
        }

        if (isset($options['id_operador'])) {
            $postData['id_operador'] = $options['id_operador'];
        } else {
            $postData['id_operador'] = null;
        }

        if (isset($options['id_condutor'])) {
            $postData['id_condutor'] = $options['id_condutor'];
        } else {
            $postData['id_condutor'] = null;
        }

        if (isset($options['id_condutor_ad'])) {
            $postData['id_condutor_ad'] = $options['id_condutor_ad'];
        } else {
            $postData['id_condutor_ad'] = null;
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

        if (isset($options['diaria_extra'])) {
            $postData['diaria_extra'] = $options['diaria_extra'];
        } else {
            $postData['diaria_extra'] = null;
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

        if (isset($options['valor_protecao'])) {
            $postData['valor_protecao'] = $options['valor_protecao'];
        } else {
            $postData['valor_protecao'] = null;
        }

        if (isset($options['valor_tx_extra_loja'])) {
            $postData['valor_tx_extra_loja'] = $options['valor_tx_extra_loja'];
        } else {
            $postData['valor_tx_extra_loja'] = null;
        }

        if (isset($options['in_gps'])) {
            $postData['in_gps'] = $options['in_gps'];
        } else {
            $postData['in_gps'] = null;
        }

        if (isset($options['valor_gps'])) {
            $postData['valor_gps'] = $options['valor_gps'];
        } else {
            $postData['valor_gps'] = null;
        }

        if (isset($options['in_entrega'])) {
            $postData['in_entrega'] = $options['in_entrega'];
        } else {
            $postData['in_entrega'] = null;
        }

        if (isset($options['valor_entrega'])) {
            $postData['valor_entrega'] = $options['valor_entrega'];
        } else {
            $postData['valor_entrega'] = null;
        }

        if (isset($options['in_cadeira'])) {
            $postData['in_cadeira'] = $options['in_cadeira'];
        } else {
            $postData['in_cadeira'] = null;
        }

        if (isset($options['valor_cadeira'])) {
            $postData['valor_cadeira'] = $options['valor_cadeira'];
        } else {
            $postData['valor_cadeira'] = null;
        }

        if (isset($options['in_condutor'])) {
            $postData['in_condutor'] = $options['in_condutor'];
        } else {
            $postData['in_condutor'] = null;
        }

        if (isset($options['valor_condutor'])) {
            $postData['valor_condutor'] = $options['valor_condutor'];
        } else {
            $postData['valor_condutor'] = null;
        }

        if (isset($options['in_bebe_conforto'])) {
            $postData['in_bebe_conforto'] = $options['in_bebe_conforto'];
        } else {
            $postData['in_bebe_conforto'] = null;
        }

        if (isset($options['valor_bebe_conforto'])) {
            $postData['valor_bebe_conforto'] = $options['valor_bebe_conforto'];
        } else {
            $postData['valor_bebe_conforto'] = null;
        }

        if (isset($options['in_assento_elevacao'])) {
            $postData['in_assento_elevacao'] = $options['in_assento_elevacao'];
        } else {
            $postData['in_assento_elevacao'] = null;
        }

        if (isset($options['valor_assento_elevacao'])) {
            $postData['valor_assento_elevacao'] = $options['valor_assento_elevacao'];
        } else {
            $postData['valor_assento_elevacao'] = null;
        }

        if (isset($options['in_wifi'])) {
            $postData['in_wifi'] = $options['in_wifi'];
        } else {
            $postData['in_wifi'] = null;
        }

        if (isset($options['valor_wifi'])) {
            $postData['valor_wifi'] = $options['valor_wifi'];
        } else {
            $postData['valor_wifi'] = null;
        }

        if (isset($options['ca_conjuge'])) {
            $postData['ca_conjuge'] = $options['ca_conjuge'];
        } else {
            $postData['ca_conjuge'] = null;
        }

        if (isset($options['valor_hora_extra'])) {
            $postData['valor_hora_extra'] = $options['valor_hora_extra'];
        } else {
            $postData['valor_hora_extra'] = null;
        }

        if (isset($options['valor_hora_extra_protecao'])) {
            $postData['valor_hora_extra_protecao'] = $options['valor_hora_extra_protecao'];
        } else {
            $postData['valor_hora_extra_protecao'] = null;
        }

        if (isset($options['valor_hora_extra_opcionais'])) {
            $postData['valor_hora_extra_opcionais'] = $options['valor_hora_extra_opcionais'];
        } else {
            $postData['valor_hora_extra_opcionais'] = null;
        }

        if (isset($options['valor_total'])) {
            $postData['valor_total'] = $options['valor_total'];
        } else {
            $postData['valor_total'] = null;
        }

        if (isset($options['valor_devolucao'])) {
            $postData['valor_devolucao'] = $options['valor_devolucao'];
        } else {
            $postData['valor_devolucao'] = null;
        }

        if (isset($options['pagamento'])) {
            $postData['pagamento'] = $options['pagamento'];
        } else {
            $postData['pagamento'] = null;
        }

        if (isset($options['nome_cliente'])) {
            $postData['nome_cliente'] = $options['nome_cliente'];
        } else {
            $postData['nome_cliente'] = null;
        }

        if (isset($options['sobrenome_cliente'])) {
            $postData['sobrenome_cliente'] = $options['sobrenome_cliente'];
        } else {
            $postData['sobrenome_cliente'] = null;
        }

        if (isset($options['data'])) {
            $postData['data'] = $options['data'];
        } else {
            $postData['data'] = null;
        }

        if (isset($options['data_atualiza'])) {
            $postData['data_atualiza'] = $options['data_atualiza'];
        } else {
            $postData['data_atualiza'] = null;
        }

        if (isset($options['cod_confirmacao'])) {
            $postData['cod_confirmacao'] = $options['cod_confirmacao'];
        } else {
            $postData['cod_confirmacao'] = null;
        }

        if (isset($options['nome_confirmacao'])) {
            $postData['nome_confirmacao'] = $options['nome_confirmacao'];
        } else {
            $postData['nome_confirmacao'] = null;
        }

        if (isset($options['cia_aerea'])) {
            $postData['cia_aerea'] = $options['cia_aerea'];
        } else {
            $postData['cia_aerea'] = null;
        }

        if (isset($options['num_voo'])) {
            $postData['num_voo'] = $options['num_voo'];
        } else {
            $postData['num_voo'] = null;
        }

        if (isset($options['status'])) {
            $postData['status'] = $options['status'];
        } else {
            $postData['status'] = null;
        }

        if (isset($options['online'])) {
            $postData['online'] = $options['online'];
        } else {
            $postData['online'] = null;
        }

        if (isset($options['agencia'])) {
            $postData['agencia'] = $options['agencia'];
        } else {
            $postData['agencia'] = null;
        }

        if (isset($options['externo'])) {
            $postData['externo'] = $options['externo'];
        } else {
            $postData['externo'] = null;
        }

        if (isset($options['observacoes'])) {
            $postData['observacoes'] = $options['observacoes'];
        } else {
            $postData['observacoes'] = null;
        }

        if (isset($options['id_pesquisa'])) {
            $postData['id_pesquisa'] = $options['id_pesquisa'];
        } else {
            $postData['id_pesquisa'] = null;
        }

        if (isset($options['site'])) {
            $postData['id_site'] = $options['site'];
        } else {
            $postData['id_site'] = 2;
        }

        if (isset($options['md5_reserva'])) {
            $postData['md5_reserva'] = $options['md5_reserva'];
        } else {
            $postData['md5_reserva'] = null;
        }

        if (isset($options['similar_reservas'])) {
            $postData['similar_reservas'] = $options['similar_reservas'];
        } else {
            $postData['similar_reservas'] = null;
        }

        if (isset($options['venda_livre'])) {
            $postData['venda_livre'] = $options['venda_livre'];
        } else {
            $postData['venda_livre'] = 0;
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

        if (isset($options['delivery'])) {
            $postData['delivery'] = $options['delivery'];
        } else {
            $postData['delivery'] = null;
        }

        if (isset($options['valor_delivery'])) {
            $postData['valor_delivery'] = $options['valor_delivery'];
        } else {
            $postData['valor_delivery'] = null;
        }

        if (isset($options['nome_delivery'])) {
            $postData['nome_delivery'] = $options['nome_delivery'];
        } else {
            $postData['nome_delivery'] = null;
        }

        if (isset($options['delivery_devo'])) {
            $postData['delivery_devo'] = $options['delivery_devo'];
        } else {
            $postData['delivery_devo'] = null;
        }

        if (isset($options['valor_delivery_devo'])) {
            $postData['valor_delivery_devo'] = $options['valor_delivery_devo'];
        } else {
            $postData['valor_delivery_devo'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['id_locadora'])) {
            $builder->set('id_locadora', $options['id_locadora']);
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
        if (isset($options['id_empresa'])) {
            $builder->set('id_empresa', $options['id_empresa']);
        }
        if (isset($options['id_emissor'])) {
            $builder->set('id_emissor', $options['id_emissor']);
        }
        if (isset($options['ispj'])) {
            $builder->set('ispj', $options['ispj']);
        }
        if (isset($options['id_operador'])) {
            $builder->set('id_operador', $options['id_operador']);
        }
        if (isset($options['id_condutor'])) {
            $builder->set('id_condutor', $options['id_condutor']);
        }
        if (isset($options['id_condutor_ad'])) {
            $builder->set('id_condutor_ad', $options['id_condutor_ad']);
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
        if (isset($options['diaria_extra'])) {
            $builder->set('diaria_extra', $options['diaria_extra']);
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
        if (isset($options['valor_tx_extra_loja'])) {
            $builder->set('valor_tx_extra_loja', $options['valor_tx_extra_loja']);
        }
        if (isset($options['in_gps'])) {
            $builder->set('in_gps', $options['in_gps']);
        }
        if (isset($options['valor_gps'])) {
            $builder->set('valor_gps', $options['valor_gps']);
        }
        if (isset($options['in_entrega'])) {
            $builder->set('in_entrega', $options['in_entrega']);
        }
        if (isset($options['valor_entrega'])) {
            $builder->set('valor_entrega', $options['valor_entrega']);
        }
        if (isset($options['in_cadeira'])) {
            $builder->set('in_cadeira', $options['in_cadeira']);
        }
        if (isset($options['valor_cadeira'])) {
            $builder->set('valor_cadeira', $options['valor_cadeira']);
        }
        if (isset($options['in_condutor'])) {
            $builder->set('in_condutor', $options['in_condutor']);
        }
        if (isset($options['valor_condutor'])) {
            $builder->set('valor_condutor', $options['valor_condutor']);
        }
        if (isset($options['in_bebe_conforto'])) {
            $builder->set('in_bebe_conforto', $options['in_bebe_conforto']);
        }
        if (isset($options['valor_bebe_conforto'])) {
            $builder->set('valor_bebe_conforto', $options['valor_bebe_conforto']);
        }
        if (isset($options['in_assento_elevacao'])) {
            $builder->set('in_assento_elevacao', $options['in_assento_elevacao']);
        }
        if (isset($options['valor_assento_elevacao'])) {
            $builder->set('valor_assento_elevacao', $options['valor_assento_elevacao']);
        }
        if (isset($options['ca_conjuge'])) {
            $builder->set('ca_conjuge', $options['ca_conjuge']);
        }
        if (isset($options['valor_hora_extra'])) {
            $builder->set('valor_hora_extra', $options['valor_hora_extra']);
        }
        if (isset($options['valor_hora_extra_protecao'])) {
            $builder->set('valor_hora_extra_protecao', $options['valor_hora_extra_protecao']);
        }
        if (isset($options['valor_hora_extra_opcionais'])) {
            $builder->set('valor_hora_extra_opcionais', $options['valor_hora_extra_opcionais']);
        }
        if (isset($options['valor_total'])) {
            $builder->set('valor_total', $options['valor_total']);
        }
        if (isset($options['valor_devolucao'])) {
            $builder->set('valor_devolucao', $options['valor_devolucao']);
        }
        if (isset($options['pagamento'])) {
            $builder->set('pagamento', $options['pagamento']);
        }
        if (isset($options['nome_cliente'])) {
            $builder->set('nome_cliente', $options['nome_cliente']);
        }
        if (isset($options['sobrenome_cliente'])) {
            $builder->set('sobrenome_cliente', $options['sobrenome_cliente']);
        }
        if (isset($options['data_atualiza'])) {
            $builder->set('data_atualiza', $options['data_atualiza']);
        }
        if (isset($options['cod_confirmacao'])) {
            $builder->set('cod_confirmacao', $options['cod_confirmacao']);
        }
        if (isset($options['nome_confirmacao'])) {
            $builder->set('nome_confirmacao', $options['nome_confirmacao']);
        }
        if (isset($options['cia_aerea'])) {
            $builder->set('cia_aerea', $options['cia_aerea']);
        }
        if (isset($options['num_voo'])) {
            $builder->set('num_voo', $options['num_voo']);
        }
        if (isset($options['status'])) {
            $builder->set('status', $options['status']);
        }
        if (isset($options['ativaOpcao'])) {
            $builder->set('reserva_ativa', $options['ativaOpcao']);
        }
        if (isset($options['limiteOpcao'])) {
            $builder->set('opcao_data_limite', $options['limiteOpcao']);
        }
        if (isset($options['online'])) {
            $builder->set('online', $options['online']);
        }
        if (isset($options['agencia'])) {
            $builder->set('agencia', $options['agencia']);
        }
        if (isset($options['externo'])) {
            $builder->set('externo', $options['externo']);
        }
        if (isset($options['observacoes'])) {
            $builder->set('observacoes', $options['observacoes']);
        }
        if (isset($options['pesquisa'])) {
            $builder->set('id_pesquisa', $options['pesquisa']);
        }
        if (isset($options['site'])) {
            $builder->set('id_site', $options['site']);
        }
        if (isset($options['stur'])) {
            $builder->set('stur', $options['stur']);
        }
        if (isset($options['md5_reserva'])) {
            $builder->set('md5_reserva', $options['md5_reserva']);
        }
        if (isset($options['similar_reservas'])) {
            $builder->set('similar_reservas', $options['similar_reservas']);
        }
        if (isset($options['visto_similar_reservas'])) {
            $builder->set('visto_similar_reservas', $options['visto_similar_reservas']);
        }
        if (isset($options['venda_livre'])) {
            $builder->set('venda_livre', $options['venda_livre']);
        }
        if (isset($options['codAfiliado'])) {
            $builder->set('cod_afiliado', $options['codAfiliado']);
        }
        if (isset($options['modAfiliado'])) {
            $builder->set('modAfiliado', $options['modAfiliado']);
        }
        if (isset($options['delivery'])) {
            $builder->set('delivery', $options['delivery']);
        }
        if (isset($options['valor_delivery'])) {
            $builder->set('valor_delivery', $options['valor_delivery']);
        }
        if (isset($options['nome_delivery'])) {
            $builder->set('nome_delivery', $options['nome_delivery']);
        }
        if (isset($options['delivery_devo'])) {
            $builder->set('delivery_devo', $options['delivery_devo']);
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
     * @param ReservaCarro $obj
     * @param AluguelCarrosFacade $facade
     * @return ReservaCarro
     */
    public function save($obj, $facade = null)
    {
        $rsv_sem = $facade->listReservasCarro(array(
                'id_emissor' => $obj->getClienteId(),
                'dataInicialP' => $obj->getPeriodo()->getDataHoraInicial()->getDataSql(),
                'dataFinalP' => $obj->getPeriodo()->getDataHoraFinal()->getDataSql(),
                'inStatus' => '1,2,4,8,7'
            )
        );
        $reservas_semelhantes = '';
        $rsv_nmb = 0;
        if (is_array($rsv_sem['objeto'])) {
            foreach ($rsv_sem['objeto'] as $rsvs) {
                if ($rsv_nmb > 0) {
                    $reservas_semelhantes .= ',';
                }
                $reservas_semelhantes .= $rsvs->getId();
                $rsv_nmb++;
            }
        }
        $rsv_active = $facade->listReservasCarro(array(
                'id_emissor' => $obj->getClienteId(),
                'dataInicialPA' => $obj->getPeriodo()->getDataHoraInicial()->getDataSql(),
                'dataFinalPA' => $obj->getPeriodo()->getDataHoraFinal()->getDataSql(),
                'ativaOpcao' => '1'
            )
        );
        if (is_array($rsv_active['objeto'])) {
            foreach ($rsv_active['objeto'] as $rsvsa) {
                if ($reservas_semelhantes != '') {
                    $reservas_semelhantes .= ',';
                }
                $reservas_semelhantes .= $rsvsa->getId();
            }
        }
        //procura reservas semelhantes
        $options = array(
            'id_locadora' => $obj->getLocadoraId(),
            'id_loja_retirar' => $obj->getLojaRetirarId(),
            'id_loja_devolver' => $obj->getLojaDevolverId(),
            'id_grupo' => $obj->getGrupoId(),
            'id_protecao' => $obj->getProtecaoId(),
            'id_empresa' => $obj->getEmissor()->getStur(),
            'id_emissor' => $obj->getClienteId(),
            'ispj' => ($obj->getIsPJ()) ? '1' : '0',
            'id_operador' => $obj->getOperador(),
            'id_condutor' => $obj->getCondutorId(),
            'id_condutor_ad' => $obj->getCondutorAdicionalId(),
            'data_retirar' => $obj->getPeriodo()->getDataHoraInicial()->getDataSql(),
            'hora_retirar' => $obj->getPeriodo()->getDataHoraInicial()->getHoraSql(),
            'data_devolver' => $obj->getPeriodo()->getDataHoraFinal()->getDataSql(),
            'hora_devolver' => $obj->getPeriodo()->getDataHoraFinal()->getHoraSql(),
            'diarias' => $obj->getDiarias(),
            'diaria_extra' => ($obj->getDiariaExtra()) ? '1' : '0',
            'valor_diarias' => $obj->getValorDiarias(),
            'valor_taxas' => $obj->getValorTaxas(),
            'valor_protecao' => $obj->getValorProtecao(),
            'valor_devolucao' => $obj->getValorDevolucao(),
            'valor_hora_extra' => $obj->getValorHoraExtra(),
            'valor_hora_extra_protecao' => $obj->getValorHoraExtraProtecao(),
            'valor_hora_extra_opcionais' => $obj->getValorHoraExtraOpcionais(),
            'valor_total' => $obj->getValorTotal(),
            'pagamento' => $obj->getPagamento(),
            'data' => date("Y-m-d H:i:s"),
            'data_atualiza' => date("Y-m-d H:i:s"),
            'cod_confirmacao' => $obj->getCodConfirmacao(),
            'nome_confirmacao' => $obj->getNomeConfirmacao(),
            'cia_aerea' => $obj->getCiaAerea(),
            'num_voo' => $obj->getNumVoo(),
            'status' => $obj->getStatus(),
            'online' => 1,
            'externo' => 1,
            'agencia' => $obj->getAgencia(),
            'observacoes' => $obj->getObservacoes(),
            'id_pesquisa' => $obj->getPesquisaId(),
            'site' => $obj->getSite(),
            'md5_reserva' => $obj->getMdCode(),
            'similar_reservas' => $reservas_semelhantes,
            'venda_livre' => ($obj->getVendaLivre()) ? 1 : 0,
            'codAfiliado' => $obj->getCodAfiliado(),
            'modAfiliado' => $obj->getModAfiliado(),
            'delivery' => $obj->getDeliveryId(),
            'valor_delivery' => $obj->getValorDelivery(),
            'nome_delivery' => $obj->getNomeDelivery(),
            'delivery_devo' => $obj->getDeliveryDevoId(),
            'valor_delivery_devo' => $obj->getValorDeliveryDevo(),
        );

        $txextra_array = null;
        if ($obj->getTaxasExtraLojas()) {
            foreach ($obj->getTaxasExtraLojas() as $txExtra) {
                if ($txextra_array) {
                    $txextra_array .= "-";
                }
                $txextra_array .= $txExtra->getId() . ":" . $txExtra->getValor();
            }
            $options['valor_tx_extra_loja'] = $txextra_array;
        }

        $opcionais = $obj->getOpcionais();
        if ($opcionais[1]) {
            $options['valor_gps'] = $opcionais[1];
            $options['in_gps'] = 1;
        }
        if ($opcionais[2]) {
            $options['valor_bebe_conforto'] = $opcionais[2];
            $options['in_bebe_conforto'] = 1;
        }
        if ($opcionais[3]) {
            $options['valor_cadeira'] = $opcionais[3];
            $options['in_cadeira'] = 1;
        }
        if ($opcionais[4]) {
            $options['valor_assento_elevacao'] = $opcionais[4];
            $options['in_assento_elevacao'] = 1;
        }
        if ($opcionais[5]) {
            $options['valor_condutor'] = $opcionais[5];
            $options['in_condutor'] = 1;
            $options['ca_conjuge'] = null;
        }
        if ($opcionais[6]) {
            $options['valor_wifi'] = $opcionais[6];
            $options['in_wifi'] = 1;
        }
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $reserva = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $reserva = $this->insert($this->queryBuilderInsert($options));
        }
        return $reserva;
    }

    /**
     * @param ReservaCarro $obj
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