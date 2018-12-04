<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\Avaliacao;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class AvaliacaoDAO extends Repository
{
    protected $table = "loc_avaliacao";
    protected $primary_key = 'id_avaliacao';

    public function hidrate($dados, $facade = null)
    {
        $tipos_aval = [
            'Ruim' => 2,
            'Regular' => 4,
            'Indiferente' => 6,
            'Normal' => 6,
            'Bom' => 8,
            'Muito Bom' => 8,
            'Ótimo' => 10
        ];
        $obj = null;
        if (is_object($dados)) {
            $obj = new Avaliacao($facade);
            $aval_carroaluguel = [
                'w_acesso' => ($dados->w_acesso != '') ? $tipos_aval[$dados->w_acesso] : null,
                'w_qualidade' => ($dados->w_qualidade != '') ? $tipos_aval[$dados->w_qualidade] : null,
                'w_conteudo' => ($dados->w_conteudo != '') ? $tipos_aval[$dados->w_conteudo] : null,
                'w_reserva' => (integer)$dados->w_reserva,
                'w_nota' => (integer)$dados->w_nota
            ];
            $aval_carroaluguel_conceito = [
                'w_acesso' => $dados->w_acesso,
                'w_qualidade' => $dados->w_qualidade,
                'w_conteudo' => $dados->w_conteudo,
                'w_reserva' => $dados->w_reserva,
                'w_nota' => $dados->w_nota
            ];
            $aval_atendimento = [
                'sac_tempo' => ($dados->sac_tempo != '') ? $tipos_aval[$dados->sac_tempo] : null,
                'sac_info' => ($dados->sac_info != '') ? $tipos_aval[$dados->sac_info] : null,
                'sac_nota' => (integer)$dados->sac_nota
            ];
            $aval_servicos = [
                'serv_retorno' => $dados->serv_retorno,
                'serv_indica' => $dados->serv_indica
            ];
            $aval_loja = [
                'emp_local' => ($dados->emp_local != '') ? $tipos_aval[$dados->emp_local] : null,
                'emp_atendimento' => ($dados->emp_atendimento != '') ? $tipos_aval[$dados->emp_atendimento] : null,
                'emp_horarios' => ($dados->emp_horarios != '') ? $tipos_aval[$dados->emp_horarios] : null,
                'emp_nota' => (integer)$dados->emp_nota
            ];
            $aval_carro = [
                'car_potencia' => ($dados->car_potencia != '') ? $tipos_aval[$dados->car_potencia] : null,
                'car_consumo' => ($dados->car_consumo != '') ? $tipos_aval[$dados->car_consumo] : null,
                'car_manutencao' => ($dados->car_manutencao != '') ? $tipos_aval[$dados->car_manutencao] : null,
                'car_seguranca' => ($dados->car_seguranca != '') ? $tipos_aval[$dados->car_seguranca] : null,
                'car_capacidade' => ($dados->car_capacidade != '') ? $tipos_aval[$dados->car_capacidade] : null,
                'car_limpeza' => ($dados->car_limpeza != '') ? $tipos_aval[$dados->car_limpeza] : null,
                'car_nota' => (integer)$dados->car_nota
            ];
            $obj->setReserva($dados->id_reserva)
                ->setId($dados->id_avaliacao)
                ->setCliente($dados->cliente_emissor)
                ->setData($dados->data)
                ->setAvalCarroAluguel($aval_carroaluguel)
                ->setAvalCarroAluguelConceito($aval_carroaluguel_conceito)
                ->setAvalAtendimento($aval_atendimento)
                ->setAvalServicos($aval_servicos)
                ->setAvalLoja($aval_loja)
                ->setAvalCarro($aval_carro)
                ->setDepoimento($dados->depoimento)
                ->setMostraDepo(($dados->mostra_site == 1) ? true : false)
                ->setDepoimentoResposta($dados->depoimento_resposta)
                ->setNomeDepoimento($dados->nome_depoimento)
                ->setStatus(($dados->status == 1) ? true : false);
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
            if (isset($options['id_avaliacao'])) {
                $builder->where('id_avaliacao', $options['id_avaliacao']);
            }
            if (isset($options['loc_avaliacao.id_reserva'])) {
                $builder->where('loc_avaliacao.id_reserva', $options['loc_avaliacao.id_reserva']);
            }
            if (isset($options['id_locadora'])) {
                $builder->where('id_locadora', $options['id_locadora']);
            }
        }
        $builder->select(array('*', 'loc_avaliacao.id_cliente as cliente_emissor'));
        if (isset($options['cliente_join'])) {
            $builder->tableJoin('r_emissor', 'loc_avaliacao.id_cliente = r_emissor.id_emissor', 'LEFT');
        }
        if (isset($options['reserva_join']) || isset($options['admin'])) {
            $builder->tableJoin('loc_reserva', 'loc_avaliacao.id_reserva = loc_reserva.id_reserva', 'LEFT');
            if (isset($options['lojaRetirada'])) {
                $builder->where('loc_reserva.id_loja_retirar', $options['lojaRetirada']);
            }
            if (isset($options['grupo'])) {
                $builder->tableJoin('loc_grupos', 'loc_reserva.id_grupo = loc_grupos.id_grupo', 'LEFT');
                $builder->where('loc_grupos.id_grupo', $options['grupo']);
            }
        }
        if (isset($options['mostra_site'])) {
            $builder->where('mostra_site', $options['mostra_site']);
        }
        if (isset($options['id'])) {
            $builder->where('id_avaliacao', $options['id']);
        }
        if (isset($options['reserva'])) {
            $builder->where('id_reserva', $options['reserva']);
        }
        if (isset($options['cliente'])) {
            $builder->where('cliente_emissor', $options['cliente']);
        }
        if (isset($options['data'])) {
            $builder->where('data', $options['data']);
        }
        if (isset($options['status'])) {
            $builder->where('status', $options['status']);
        }
        if (isset($options['w_acesso'])) {
            $builder->where('w_acesso', $options['w_acesso']);
        }
        if (isset($options['w_qualidade'])) {
            $builder->where('w_qualidade', $options['w_qualidade']);
        }
        if (isset($options['w_conteudo'])) {
            $builder->where('w_conteudo', $options['w_conteudo']);
        }
        if (isset($options['w_reserva'])) {
            $builder->where('w_reserva', $options['w_reserva']);
        }
        if (isset($options['w_nota'])) {
            $builder->where('w_nota', $options['w_nota']);
        }
        if (isset($options['sac_tempo'])) {
            $builder->where('sac_tempo', $options['sac_tempo']);
        }
        if (isset($options['sac_info'])) {
            $builder->where('sac_info', $options['sac_info']);
        }
        if (isset($options['sac_nota'])) {
            $builder->where('sac_nota', $options['sac_nota']);
        }
        if (isset($options['serv_retorno'])) {
            $builder->where('serv_retorno', $options['serv_retorno']);
        }
        if (isset($options['serv_indica'])) {
            $builder->where('serv_indica', $options['serv_indica']);
        }
        if (isset($options['emp_local'])) {
            $builder->where('emp_local', $options['emp_local']);
        }
        if (isset($options['emp_atendimento'])) {
            $builder->where('emp_atendimento', $options['emp_atendimento']);
        }
        if (isset($options['emp_horarios'])) {
            $builder->where('emp_horarios', $options['emp_horarios']);
        }
        if (isset($options['emp_nota'])) {
            $builder->where('emp_nota', $options['emp_nota']);
        }
        if (isset($options['car_potencia'])) {
            $builder->where('car_potencia', $options['car_potencia']);
        }
        if (isset($options['car_consumo'])) {
            $builder->where('car_consumo', $options['car_consumo']);
        }
        if (isset($options['car_manutencao'])) {
            $builder->where('car_manutencao', $options['car_manutencao']);
        }
        if (isset($options['car_seguranca'])) {
            $builder->where('car_seguranca', $options['car_seguranca']);
        }
        if (isset($options['car_capacidade'])) {
            $builder->where('car_capacidade', $options['car_capacidade']);
        }
        if (isset($options['car_limpeza'])) {
            $builder->where('car_limpeza', $options['car_limpeza']);
        }
        if (isset($options['car_nota'])) {
            $builder->where('car_nota', $options['car_nota']);
        }
        if (isset($options['depoimento'])) {
            $builder->like('depoimento', $options['depoimento']);
        }
        if (isset($options['depoimento_resposta'])) {
            $builder->like('depoimento_resposta', $options['depoimento_resposta']);
        }
        if (isset($options['nome_depoimento'])) {
            $builder->like('nome_depoimento', $options['nome_depoimento']);
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
        if (isset($options['mostra_site'])) {
            $postData['mostra_site'] = $options['mostra_site'];
        } else {
            $postData['mostra_site'] = '0';
        }

        if (isset($options['reserva'])) {
            $postData['id_reserva'] = $options['reserva'];
        } else {
            $postData['id_reserva'] = null;
        }

        if (isset($options['cliente'])) {
            $postData['id_cliente'] = $options['cliente'];
        } else {
            $postData['id_cliente'] = null;
        }

        if (isset($options['data'])) {
            $postData['data'] = $options['data'];
        } else {
            $postData['data'] = null;
        }

        if (isset($options['status'])) {
            $postData['status'] = $options['status'];
        } else {
            $postData['status'] = null;
        }

        if (isset($options['w_acesso'])) {
            $postData['w_acesso'] = $options['w_acesso'];
        } else {
            $postData['w_acesso'] = null;
        }

        if (isset($options['w_qualidade'])) {
            $postData['w_qualidade'] = $options['w_qualidade'];
        } else {
            $postData['w_qualidade'] = null;
        }

        if (isset($options['w_conteudo'])) {
            $postData['w_conteudo'] = $options['w_conteudo'];
        } else {
            $postData['w_conteudo'] = null;
        }

        if (isset($options['w_reserva'])) {
            $postData['w_reserva'] = $options['w_reserva'];
        } else {
            $postData['w_reserva'] = null;
        }

        if (isset($options['w_nota'])) {
            $postData['w_nota'] = $options['w_nota'];
        } else {
            $postData['w_nota'] = null;
        }

        if (isset($options['sac_tempo'])) {
            $postData['sac_tempo'] = $options['sac_tempo'];
        } else {
            $postData['sac_tempo'] = null;
        }

        if (isset($options['sac_info'])) {
            $postData['sac_info'] = $options['sac_info'];
        } else {
            $postData['sac_info'] = null;
        }

        if (isset($options['sac_nota'])) {
            $postData['sac_nota'] = $options['sac_nota'];
        } else {
            $postData['sac_nota'] = null;
        }

        if (isset($options['serv_retorno'])) {
            $postData['serv_retorno'] = $options['serv_retorno'];
        } else {
            $postData['serv_retorno'] = null;
        }

        if (isset($options['serv_indica'])) {
            $postData['serv_indica'] = $options['serv_indica'];
        } else {
            $postData['serv_indica'] = null;
        }

        if (isset($options['emp_local'])) {
            $postData['emp_local'] = $options['emp_local'];
        } else {
            $postData['emp_local'] = null;
        }

        if (isset($options['emp_atendimento'])) {
            $postData['emp_atendimento'] = $options['emp_atendimento'];
        } else {
            $postData['emp_atendimento'] = null;
        }

        if (isset($options['emp_horarios'])) {
            $postData['emp_horarios'] = $options['emp_horarios'];
        } else {
            $postData['emp_horarios'] = null;
        }

        if (isset($options['emp_nota'])) {
            $postData['emp_nota'] = $options['emp_nota'];
        } else {
            $postData['emp_nota'] = null;
        }

        if (isset($options['car_potencia'])) {
            $postData['car_potencia'] = $options['car_potencia'];
        } else {
            $postData['car_potencia'] = null;
        }

        if (isset($options['car_consumo'])) {
            $postData['car_consumo'] = $options['car_consumo'];
        } else {
            $postData['car_consumo'] = null;
        }

        if (isset($options['car_manutencao'])) {
            $postData['car_manutencao'] = $options['car_manutencao'];
        } else {
            $postData['car_manutencao'] = null;
        }

        if (isset($options['car_seguranca'])) {
            $postData['car_seguranca'] = $options['car_seguranca'];
        } else {
            $postData['car_seguranca'] = null;
        }

        if (isset($options['car_capacidade'])) {
            $postData['car_capacidade'] = $options['car_capacidade'];
        } else {
            $postData['car_capacidade'] = null;
        }

        if (isset($options['car_limpeza'])) {
            $postData['car_limpeza'] = $options['car_limpeza'];
        } else {
            $postData['car_limpeza'] = null;
        }

        if (isset($options['car_nota'])) {
            $postData['car_nota'] = $options['car_nota'];
        } else {
            $postData['car_nota'] = null;
        }

        if (isset($options['depoimento'])) {
            $postData['depoimento'] = $options['depoimento'];
        } else {
            $postData['depoimento'] = null;
        }

        if (isset($options['depoimento_resposta'])) {
            $postData['depoimento_resposta'] = $options['depoimento_resposta'];
        } else {
            $postData['depoimento_resposta'] = null;
        }

        if (isset($options['nome_depoimento'])) {
            $postData['nome_depoimento'] = $options['nome_depoimento'];
        } else {
            $postData['nome_depoimento'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['mostra_site'])) {
            $builder->set('mostra_site', $options['mostra_site']);
        }
        if (isset($options['reserva'])) {
            $builder->set('id_reserva', $options['reserva']);
        }
        if (isset($options['cliente'])) {
            $builder->set('id_cliente', $options['cliente']);
        }
        if (isset($options['data'])) {
            $builder->set('data', $options['data']);
        }
        if (isset($options['status'])) {
            $builder->set('status', $options['status']);
        }
        if (isset($options['w_acesso'])) {
            $builder->set('w_acesso', $options['w_acesso']);
        }
        if (isset($options['w_qualidade'])) {
            $builder->set('w_qualidade', $options['w_qualidade']);
        }
        if (isset($options['w_conteudo'])) {
            $builder->set('w_conteudo', $options['w_conteudo']);
        }
        if (isset($options['w_reserva'])) {
            $builder->set('w_reserva', $options['w_reserva']);
        }
        if (isset($options['w_nota'])) {
            $builder->set('w_nota', $options['w_nota']);
        }
        if (isset($options['sac_tempo'])) {
            $builder->set('sac_tempo', $options['sac_tempo']);
        }
        if (isset($options['sac_info'])) {
            $builder->set('sac_info', $options['sac_info']);
        }
        if (isset($options['sac_nota'])) {
            $builder->set('sac_nota', $options['sac_nota']);
        }
        if (isset($options['serv_retorno'])) {
            $builder->set('serv_retorno', $options['serv_retorno']);
        }
        if (isset($options['serv_indica'])) {
            $builder->set('serv_indica', $options['serv_indica']);
        }
        if (isset($options['emp_local'])) {
            $builder->set('emp_local', $options['emp_local']);
        }
        if (isset($options['emp_atendimento'])) {
            $builder->set('emp_atendimento', $options['emp_atendimento']);
        }
        if (isset($options['emp_horarios'])) {
            $builder->set('emp_horarios', $options['emp_horarios']);
        }
        if (isset($options['emp_nota'])) {
            $builder->set('emp_nota', $options['emp_nota']);
        }
        if (isset($options['car_potencia'])) {
            $builder->set('car_potencia', $options['car_potencia']);
        }
        if (isset($options['car_consumo'])) {
            $builder->set('car_consumo', $options['car_consumo']);
        }
        if (isset($options['car_manutencao'])) {
            $builder->set('car_manutencao', $options['car_manutencao']);
        }
        if (isset($options['car_seguranca'])) {
            $builder->set('car_seguranca', $options['car_seguranca']);
        }
        if (isset($options['car_capacidade'])) {
            $builder->set('car_capacidade', $options['car_capacidade']);
        }
        if (isset($options['car_limpeza'])) {
            $builder->set('car_limpeza', $options['car_limpeza']);
        }
        if (isset($options['car_nota'])) {
            $builder->set('car_nota', $options['car_nota']);
        }
        if (isset($options['depoimento'])) {
            $builder->set('depoimento', $options['depoimento']);
        }
        if (isset($options['depoimento_resposta'])) {
            $builder->set('depoimento_resposta', $options['depoimento_resposta']);
        }
        if (isset($options['nome_depoimento'])) {
            $builder->set('nome_depoimento', $options['nome_depoimento']);
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
     * @param Avaliacao $obj
     * @param AluguelCarrosFacade $facade
     * @return Avaliacao
     */
    public function save($obj, $facade = null)
    {
        $av_site = $obj->getAvalCarroAluguel();
        $av_atendimento = $obj->getAvalAtendimento();
        $av_servicos = $obj->getAvalServicos();
        $av_loja = $obj->getAvalLoja();
        $av_carro = $obj->getAvalCarro();
        $options = [
            'mostra_site' => ($obj->getMostraDepo()) ? '1' : '0',
            'reserva' => (is_object($obj->getReserva())) ? $obj->getReserva()->getId() : null,
            'cliente' => (is_object($obj->getCliente())) ? $obj->getCliente()->getId() : null,
            'data' => (is_object($obj->getData())) ? $obj->getData()->getDataHoraSql() : null,
            'status' => ($obj->getStatus()) ? '1' : '0',
            'w_acesso' => (isset($av_site['w_acesso'])) ? $av_site['w_acesso'] : null,
            'w_qualidade' => (isset($av_site['w_qualidade'])) ? $av_site['w_qualidade'] : null,
            'w_conteudo' => (isset($av_site['w_conteudo'])) ? $av_site['w_conteudo'] : null,
            'w_reserva' => (isset($av_site['w_reserva'])) ? $av_site['w_reserva'] : null,
            'w_nota' => (isset($av_site['w_nota'])) ? $av_site['w_nota'] : null,
            'sac_tempo' => (isset($av_atendimento['sac_tempo'])) ? $av_atendimento['sac_tempo'] : null,
            'sac_info' => (isset($av_atendimento['sac_info'])) ? $av_atendimento['sac_info'] : null,
            'sac_nota' => (isset($av_atendimento['sac_nota'])) ? $av_atendimento['sac_nota'] : null,
            'serv_retorno' => (isset($av_servicos['serv_retorno'])) ? $av_servicos['serv_retorno'] : null,
            'serv_indica' => (isset($av_servicos['serv_indica'])) ? $av_servicos['serv_indica'] : null,
            'emp_local' => (isset($av_loja['emp_local'])) ? $av_loja['emp_local'] : null,
            'emp_atendimento' => (isset($av_loja['emp_atendimento'])) ? $av_loja['emp_atendimento'] : null,
            'emp_horarios' => (isset($av_loja['emp_horarios'])) ? $av_loja['emp_horarios'] : null,
            'emp_nota' => (isset($av_loja['emp_nota'])) ? $av_loja['emp_nota'] : null,
            'car_potencia' => (isset($av_carro['car_potencia'])) ? $av_carro['car_potencia'] : null,
            'car_consumo' => (isset($av_carro['car_consumo'])) ? $av_carro['car_consumo'] : null,
            'car_manutencao' => (isset($av_carro['car_manutencao'])) ? $av_carro['car_manutencao'] : null,
            'car_seguranca' => (isset($av_carro['car_seguranca'])) ? $av_carro['car_seguranca'] : null,
            'car_capacidade' => (isset($av_carro['car_capacidade'])) ? $av_carro['car_capacidade'] : null,
            'car_limpeza' => (isset($av_carro['car_limpeza'])) ? $av_carro['car_limpeza'] : null,
            'car_nota' => (isset($av_carro['car_nota'])) ? $av_carro['car_nota'] : null,
            'depoimento' => $obj->getDepoimento(),
            'depoimento_resposta' => $obj->getDepoimentoResposta(),
            'nome_depoimento' => $obj->getNomeDepoimento(),
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $avaliacao = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $avaliacao = $this->insert($this->queryBuilderInsert($options));
        }
        return $avaliacao;
    }

    /**
     * @param Avaliacao $obj
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