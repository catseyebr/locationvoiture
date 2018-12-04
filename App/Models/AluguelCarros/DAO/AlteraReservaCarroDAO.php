<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\AlteraReservaCarro;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class AlteraReservaCarroDAO extends Repository
{
    protected $table = "tb_alterareservacarro";
    protected $primary_key = 'altrescarro_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new AlteraReservaCarro($facade);
            $obj->setId($dados->altrescarro_id)
                ->setReserva($dados->altrescarro_reserva)
                ->setLocadora($dados->altrescarro_locadora)
                ->setLojaRetirar($dados->altrescarro_loja_retirar)
                ->setLojaDevolver($dados->altrescarro_loja_devolver)
                ->setGrupo($dados->altrescarro_grupo)
                ->setProtecao($dados->altrescarro_protecao)
                ->setEmpresa($dados->altrescarro_empresa)
                ->setEmissor($dados->altrescarro_emissor)
                ->setOperador($dados->altrescarro_operador)
                ->setCondutor($dados->altrescarro_condutor)
                ->setCondutorAdicional($dados->altrescarro_condutor_adicional)
                ->setDataRetirar($dados->altrescarro_data_retirar)
                ->setDataDevolver($dados->altrescarro_data_devolver)
                ->setHoraRetirar($dados->altrescarro_hora_retirar)
                ->setHoraDevolver($dados->altrescarro_hora_devolver)
                ->setDiarias($dados->altrescarro_diarias)
                ->setDiariaExtra(($dados->altrescarro_diaria_extra == 1) ? true : false)
                ->setVlrDiarias($dados->altrescarro_vlr_diarias)
                ->setVlrProtecao($dados->altrescarro_vlr_protecao)
                ->setVlrTxextraLoja($dados->altrescarro_vlr_txextra_loja)
                ->setOpGps(($dados->altrescarro_op_gps == 1) ? true : false)
                ->setVlrOpGps($dados->altrescarro_vlr_op_gps)
                ->setOpCadeira(($dados->altrescarro_op_cadeira == 1) ? true : false)
                ->setVlrOpCadeira($dados->altrescarro_vlr_op_cadeira)
                ->setOpCondutor(($dados->altrescarro_op_condutor == 1) ? true : false)
                ->setVlrOpCondutor($dados->altrescarro_vlr_op_condutor)
                ->setOpBebeConforto(($dados->altrescarro_op_bebeconforto == 1) ? true : false)
                ->setVlrOpBebeConforto($dados->altrescarro_vlr_op_bebeconforto)
                ->setOpAssentoElevacao(($dados->altrescarro_op_assentoelevacao == 1) ? true : false)
                ->setVlrOpAssentoElevacao($dados->altrescarro_vlr_op_assentoelevacao)
                ->setCaConjuge($dados->altrescarro_ca_conjuge)
                ->setVlrDevolucao($dados->altrescarro_vlr_devolucao)
                ->setVlrTaxas($dados->altrescarro_vlr_taxas)
                ->setVlrHoraExtra($dados->altrescarro_vlr_horaextra)
                ->setVlrHoraExtraProtecao($dados->altrescarro_vlr_horaextra_protecao)
                ->setVlrHoraExtraOpcionais($dados->altrescarro_vlr_horaextra_opcionais)
                ->setVlrTotal($dados->altrescarro_vlr_total)
                ->setPagamento($dados->altrescarro_pagamento)
                ->setDthCadastro($dados->altrescarro_dth_cadastro)
                ->setDthAtualiza($dados->altrescarro_dth_atualiza)
                ->setCodConfirmacao($dados->altrescarro_cod_confirmacao)
                ->setNomeConfirmacao($dados->altrescarro_nome_confirmacao)
                ->setCiaAerea($dados->altrescarro_cia_aerea)
                ->setNumVoo($dados->altrescarro_num_voo)
                ->setStatus($dados->altrescarro_status)
                ->setObs($dados->altrescarro_obs);
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
            if (isset($options['altrescarro_id'])) {
                $builder->where('altrescarro_id', $options['altrescarro_id']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('altrescarro_id', $options['id']);
        }

        if (isset($options['reserva'])) {
            $builder->where('altrescarro_reserva', $options['reserva']);
        }

        if (isset($options['locadora'])) {
            $builder->where('altrescarro_locadora', $options['locadora']);
        }

        if (isset($options['loja_retirar'])) {
            $builder->where('altrescarro_loja_retirar', $options['loja_retirar']);
        }

        if (isset($options['loja_devolver'])) {
            $builder->where('altrescarro_loja_devolver', $options['loja_devolver']);
        }

        if (isset($options['grupo'])) {
            $builder->where('altrescarro_grupo', $options['grupo']);
        }

        if (isset($options['protecao'])) {
            $builder->where('altrescarro_protecao', $options['protecao']);
        }

        if (isset($options['empresa'])) {
            $builder->where('altrescarro_empresa', $options['empresa']);
        }

        if (isset($options['operador'])) {
            $builder->where('altrescarro_operador', $options['operador']);
        }

        if (isset($options['condutor'])) {
            $builder->where('altrescarro_condutor', $options['condutor']);
        }

        if (isset($options['condutor_adicional'])) {
            $builder->where('altrescarro_condutor_adicional', $options['condutor_adicional']);
        }

        if (isset($options['cod_confirmacao'])) {
            $builder->where('altrescarro_cod_confirmacao', $options['cod_confirmacao']);
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

        if (isset($options['reserva'])) {
            $postData['altrescarro_reserva'] = $options['reserva'];
        } else {
            $postData['altrescarro_reserva'] = null;
        }

        if (isset($options['locadora'])) {
            $postData['altrescarro_locadora'] = $options['locadora'];
        } else {
            $postData['altrescarro_locadora'] = null;
        }

        if (isset($options['loja_retirar'])) {
            $postData['altrescarro_loja_retirar'] = $options['loja_retirar'];
        } else {
            $postData['altrescarro_loja_retirar'] = null;
        }

        if (isset($options['loja_devolver'])) {
            $postData['altrescarro_loja_devolver'] = $options['loja_devolver'];
        } else {
            $postData['altrescarro_loja_devolver'] = null;
        }

        if (isset($options['grupo'])) {
            $postData['altrescarro_grupo'] = $options['grupo'];
        } else {
            $postData['altrescarro_grupo'] = null;
        }

        if (isset($options['protecao'])) {
            $postData['altrescarro_protecao'] = $options['protecao'];
        } else {
            $postData['altrescarro_protecao'] = null;
        }

        if (isset($options['empresa'])) {
            $postData['altrescarro_empresa'] = $options['empresa'];
        } else {
            $postData['altrescarro_empresa'] = null;
        }

        if (isset($options['emissor'])) {
            $postData['altrescarro_emissor'] = $options['emissor'];
        } else {
            $postData['altrescarro_emissor'] = null;
        }

        if (isset($options['operador'])) {
            $postData['altrescarro_operador'] = $options['operador'];
        } else {
            $postData['altrescarro_operador'] = null;
        }

        if (isset($options['condutor'])) {
            $postData['altrescarro_condutor'] = $options['condutor'];
        } else {
            $postData['altrescarro_condutor'] = null;
        }

        if (isset($options['condutor_adicional'])) {
            $postData['altrescarro_condutor_adicional'] = $options['condutor_adicional'];
        } else {
            $postData['altrescarro_condutor_adicional'] = null;
        }

        if (isset($options['data_retirar'])) {
            $postData['altrescarro_data_retirar'] = $options['data_retirar'];
        } else {
            $postData['altrescarro_data_retirar'] = null;
        }

        if (isset($options['data_devolver'])) {
            $postData['altrescarro_data_devolver'] = $options['data_devolver'];
        } else {
            $postData['altrescarro_data_devolver'] = null;
        }

        if (isset($options['hora_retirar'])) {
            $postData['altrescarro_hora_retirar'] = $options['hora_retirar'];
        } else {
            $postData['altrescarro_hora_retirar'] = null;
        }

        if (isset($options['hora_devolver'])) {
            $postData['altrescarro_hora_devolver'] = $options['hora_devolver'];
        } else {
            $postData['altrescarro_hora_devolver'] = null;
        }

        if (isset($options['diarias'])) {
            $postData['altrescarro_diarias'] = $options['diarias'];
        } else {
            $postData['altrescarro_diarias'] = null;
        }

        if (isset($options['diaria_extra'])) {
            $postData['altrescarro_diaria_extra'] = $options['diaria_extra'];
        } else {
            $postData['altrescarro_diaria_extra'] = null;
        }

        if (isset($options['vlr_diarias'])) {
            $postData['altrescarro_vlr_diarias'] = $options['vlr_diarias'];
        } else {
            $postData['altrescarro_vlr_diarias'] = null;
        }

        if (isset($options['vlr_protecao'])) {
            $postData['altrescarro_vlr_protecao'] = $options['vlr_protecao'];
        } else {
            $postData['altrescarro_vlr_protecao'] = null;
        }

        if (isset($options['vlr_txextra_loja'])) {
            $postData['altrescarro_vlr_txextra_loja'] = $options['vlr_txextra_loja'];
        } else {
            $postData['altrescarro_vlr_txextra_loja'] = null;
        }

        if (isset($options['op_gps'])) {
            $postData['altrescarro_op_gps'] = $options['op_gps'];
        } else {
            $postData['altrescarro_op_gps'] = null;
        }

        if (isset($options['vlr_op_gps'])) {
            $postData['altrescarro_vlr_op_gps'] = $options['vlr_op_gps'];
        } else {
            $postData['altrescarro_vlr_op_gps'] = null;
        }

        if (isset($options['op_cadeira'])) {
            $postData['altrescarro_op_cadeira'] = $options['op_cadeira'];
        } else {
            $postData['altrescarro_op_cadeira'] = null;
        }

        if (isset($options['vlr_op_cadeira'])) {
            $postData['altrescarro_vlr_op_cadeira'] = $options['vlr_op_cadeira'];
        } else {
            $postData['altrescarro_vlr_op_cadeira'] = null;
        }

        if (isset($options['op_condutor'])) {
            $postData['altrescarro_op_condutor'] = $options['op_condutor'];
        } else {
            $postData['altrescarro_op_condutor'] = null;
        }

        if (isset($options['vlr_op_condutor'])) {
            $postData['altrescarro_vlr_op_condutor'] = $options['vlr_op_condutor'];
        } else {
            $postData['altrescarro_vlr_op_condutor'] = null;
        }

        if (isset($options['op_bebeconforto'])) {
            $postData['altrescarro_op_bebeconforto'] = $options['op_bebeconforto'];
        } else {
            $postData['altrescarro_op_bebeconforto'] = null;
        }

        if (isset($options['vlr_op_bebeconforto'])) {
            $postData['altrescarro_vlr_op_bebeconforto'] = $options['vlr_op_bebeconforto'];
        } else {
            $postData['altrescarro_vlr_op_bebeconforto'] = null;
        }

        if (isset($options['op_assentoelevacao'])) {
            $postData['altrescarro_op_assentoelevacao'] = $options['op_assentoelevacao'];
        } else {
            $postData['altrescarro_op_assentoelevacao'] = null;
        }

        if (isset($options['vlr_op_assentoelevacao'])) {
            $postData['altrescarro_vlr_op_assentoelevacao'] = $options['vlr_op_assentoelevacao'];
        } else {
            $postData['altrescarro_vlr_op_assentoelevacao'] = null;
        }

        if (isset($options['ca_conjuge'])) {
            $postData['altrescarro_ca_conjuge'] = $options['ca_conjuge'];
        } else {
            $postData['altrescarro_ca_conjuge'] = null;
        }

        if (isset($options['vlr_devolucao'])) {
            $postData['altrescarro_vlr_devolucao'] = $options['vlr_devolucao'];
        } else {
            $postData['altrescarro_vlr_devolucao'] = null;
        }

        if (isset($options['vlr_taxas'])) {
            $postData['altrescarro_vlr_taxas'] = $options['vlr_taxas'];
        } else {
            $postData['altrescarro_vlr_taxas'] = null;
        }

        if (isset($options['vlr_horaextra'])) {
            $postData['altrescarro_vlr_horaextra'] = $options['vlr_horaextra'];
        } else {
            $postData['altrescarro_vlr_horaextra'] = null;
        }

        if (isset($options['vlr_horaextra_protecao'])) {
            $postData['altrescarro_vlr_horaextra_protecao'] = $options['vlr_horaextra_protecao'];
        } else {
            $postData['altrescarro_vlr_horaextra_protecao'] = null;
        }

        if (isset($options['vlr_horaextra_opcionais'])) {
            $postData['altrescarro_vlr_horaextra_opcionais'] = $options['vlr_horaextra_opcionais'];
        } else {
            $postData['altrescarro_vlr_horaextra_opcionais'] = null;
        }

        if (isset($options['vlr_total'])) {
            $postData['altrescarro_vlr_total'] = $options['vlr_total'];
        } else {
            $postData['altrescarro_vlr_total'] = null;
        }

        if (isset($options['pagamento'])) {
            $postData['altrescarro_pagamento'] = $options['pagamento'];
        } else {
            $postData['altrescarro_pagamento'] = null;
        }

        if (isset($options['dth_cadastro'])) {
            $postData['altrescarro_dth_cadastro'] = $options['dth_cadastro'];
        } else {
            $postData['altrescarro_dth_cadastro'] = date('Y-m-d H:i:s');
        }

        if (isset($options['dth_atualiza'])) {
            $postData['altrescarro_dth_atualiza'] = $options['dth_atualiza'];
        } else {
            $postData['altrescarro_dth_atualiza'] = date('Y-m-d H:i:s');
        }

        if (isset($options['cod_confirmacao'])) {
            $postData['altrescarro_cod_confirmacao'] = $options['cod_confirmacao'];
        } else {
            $postData['altrescarro_cod_confirmacao'] = null;
        }

        if (isset($options['nome_confirmacao'])) {
            $postData['altrescarro_nome_confirmacao'] = $options['nome_confirmacao'];
        } else {
            $postData['altrescarro_nome_confirmacao'] = null;
        }

        if (isset($options['cia_aerea'])) {
            $postData['altrescarro_cia_aerea'] = $options['cia_aerea'];
        } else {
            $postData['altrescarro_cia_aerea'] = null;
        }

        if (isset($options['num_voo'])) {
            $postData['altrescarro_num_voo'] = $options['num_voo'];
        } else {
            $postData['altrescarro_num_voo'] = null;
        }

        if (isset($options['status'])) {
            $postData['altrescarro_status'] = $options['status'];
        } else {
            $postData['altrescarro_status'] = null;
        }

        if (isset($options['obs'])) {
            $postData['altrescarro_obs'] = $options['obs'];
        } else {
            $postData['altrescarro_obs'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['reserva'])) {
            $builder->set('altrescarro_reserva', $options['reserva']);
        }

        if (isset($options['locadora'])) {
            $builder->set('altrescarro_locadora', $options['locadora']);
        }

        if (isset($options['loja_retirar'])) {
            $builder->set('altrescarro_loja_retirar', $options['loja_retirar']);
        }

        if (isset($options['loja_devolver'])) {
            $builder->set('altrescarro_loja_devolver', $options['loja_devolver']);
        }

        if (isset($options['grupo'])) {
            $builder->set('altrescarro_grupo', $options['grupo']);
        }

        if (isset($options['protecao'])) {
            $builder->set('altrescarro_protecao', $options['protecao']);
        }

        if (isset($options['empresa'])) {
            $builder->set('altrescarro_empresa', $options['empresa']);
        }

        if (isset($options['operador'])) {
            $builder->set('altrescarro_operador', $options['operador']);
        }

        if (isset($options['condutor'])) {
            $builder->set('altrescarro_condutor', $options['condutor']);
        }

        if (isset($options['condutor_adicional'])) {
            $builder->set('altrescarro_condutor_adicional', $options['condutor_adicional']);
        }

        if (isset($options['cod_confirmacao'])) {
            $builder->set('altrescarro_cod_confirmacao', $options['cod_confirmacao']);
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
     * @param AlteraReservaCarro $obj
     * @param AluguelCarrosFacade $facade
     * @return AlteraReservaCarro
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'reserva' => $obj->getReserva(),
            'locadora' => $obj->getLocadora(),
            'loja_retirar' => $obj->getLojaRetirar(),
            'loja_devolver' => $obj->getLojaDevolver(),
            'grupo' => $obj->getGrupo(),
            'protecao' => $obj->getProtecao(),
            'empresa' => $obj->getEmpresa(),
            'emissor' => $obj->getEmissor(),
            'operador' => $obj->getOperador(),
            'condutor' => $obj->getCondutor(),
            'condutor_adicional' => $obj->getCondutorAdicional(),
            'data_retirar' => $obj->getDataRetirar(),
            'data_devolver' => $obj->getDataDevolver(),
            'hora_retirar' => $obj->getHoraRetirar(),
            'hora_devolver' => $obj->getHoraDevolver(),
            'diarias' => $obj->getDiarias(),
            'diaria_extra' => ($obj->getDiariaExtra()) ? 1 : 0,
            'vlr_diarias' => $obj->getVlrDiarias(),
            'vlr_protecao' => $obj->getVlrProtecao(),
            'vlr_txextra_loja' => $obj->getVlrTxExtraLoja(),
            'op_gps' => ($obj->getOpGps()) ? 1 : 0,
            'vlr_op_gps' => $obj->getVlrOpGps(),
            'op_cadeira' => ($obj->getOpCadeira()) ? 1 : 0,
            'vlr_op_cadeira' => $obj->getVlrOpCadeira(),
            'op_condutor' => ($obj->getOpCondutor()) ? 1 : 0,
            'vlr_op_condutor' => $obj->getVlrOpCondutor(),
            'op_bebeconforto' => ($obj->getOpBebeConforto()) ? 1 : 0,
            'vlr_op_bebeconforto' => $obj->getVlrOpBebeConforto(),
            'op_assentoelevacao' => ($obj->getOpAssentoElevacao()) ? 1 : 0,
            'vlr_op_assentoelevacao' => $obj->getVlrOpAssentoElevacao(),
            'ca_conjuge' => ($obj->getCaConjuge()) ? 1 : 0,
            'vlr_devolucao' => $obj->getVlrDevolucao(),
            'vlr_taxas' => $obj->getVlrTaxas(),
            'vlr_horaextra' => $obj->getVlrHoraExtra(),
            'vlr_horaextra_protecao' => $obj->getVlrHoraExtraProtecao(),
            'vlr_horaextra_opcionais' => $obj->getVlrHoraExtraOpcionais(),
            'vlr_total' => $obj->getVlrTotal(),
            'pagamento' => $obj->getPagamento(),
            'dth_atualiza' => (is_object($obj->getDthAtualiza())) ? $obj->getDthAtualiza()->getDataHoraSql() : null,
            'cod_confirmacao' => $obj->getCodConfirmacao(),
            'nome_confirmacao' => $obj->getNomeConfirmacao(),
            'cia_aerrea' => $obj->getCiaAerea(),
            'num_voo' => $obj->getNumVoo(),
            'status' => $obj->getStatus(),
            'obs' => $obj->getObs(),
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $altrsv = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $altrsv = $this->insert($this->queryBuilderInsert($options));
        }
        return $altrsv;
    }

    /**
     * @param AlteraReservaCarro $obj
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