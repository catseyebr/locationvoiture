<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\TarifaProtecao;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class TarifaProtecaoDAO extends Repository
{
    protected $table = "loc_protecao_valores";
    protected $primary_key = 'id_protecao_valores';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new TarifaProtecao($facade);
            $obj->setId($dados->id_protecao_valores)
                ->setDiaInicial($dados->dia_ini_protecao)
                ->setDiaFinal($dados->dia_fim_protecao)
                ->setValor($dados->valor_protecao_valores)
                ->setDataCadastro($dados->data_cadastro_protecao_valores)
                ->setDataAtualizacao($dados->data_atualizacao_protecao_valores)
                ->setAtivo($dados->ativo_protecao_valores);
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
            if (isset($options['id_protecao_valores'])) {
                $builder->where('id_protecao_valores', $options['id_protecao_valores']);
            }
            if (isset($options['protecao_valores'])) {
                $builder->where('protecao_valores', $options['protecao_valores']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('id_protecao_valores', $options['id']);
        }
        if (isset($options['protecao'])) {
            $builder->where('protecao_valores', $options['protecao']);
        }
        if (isset($options['dia_inicial'])) {
            $builder->greater('dia_ini_protecao', $options['dia_inicial']);
        }
        if (isset($options['dia_final'])) {
            $builder->lower('dia_fim_protecao', $options['dia_final']);
        }
        if (isset($options['valor'])) {
            $builder->where('valor_protecao_valores', $options['valor']);
        }
        if (isset($options['data_cadastro'])) {
            $builder->where('data_cadastro_protecao_valores', $options['data_cadastro']);
        }
        if (isset($options['data_atualizacao'])) {
            $builder->where('data_atualizacao_protecao_valores', $options['data_atualizacao']);
        }
        if (isset($options['ativo'])) {
            $builder->where('ativo_protecao_valores', $options['ativo']);
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
        if (isset($options['protecao'])) {
            $postData['protecao_valores'] = $options['protecao'];
        } else {
            $postData['protecao_valores'] = null;
        }

        if (isset($options['dia_inicial'])) {
            $postData['dia_ini_protecao'] = $options['dia_inicial'];
        } else {
            $postData['dia_ini_protecao'] = null;
        }

        if (isset($options['dia_final'])) {
            $postData['dia_fim_protecao'] = $options['dia_final'];
        } else {
            $postData['dia_fim_protecao'] = null;
        }

        if (isset($options['valor'])) {
            $postData['valor_protecao_valores'] = $options['valor'];
        } else {
            $postData['valor_protecao_valores'] = null;
        }

        if (isset($options['data_cadastro'])) {
            $postData['data_cadastro_protecao_valores'] = $options['data_cadastro'];
        } else {
            $postData['data_cadastro_protecao_valores'] = null;
        }

        if (isset($options['data_atualizacao'])) {
            $postData['data_atualizacao_protecao_valores'] = $options['data_atualizacao'];
        } else {
            $postData['data_atualizacao_protecao_valores'] = null;
        }

        if (isset($options['ativo'])) {
            $postData['ativo_protecao_valores'] = $options['ativo'];
        } else {
            $postData['ativo_protecao_valores'] = '0';
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if ($options['protecao']) {
            $builder->set('protecao_valores', $options['protecao']);
        }
        if ($options['dia_inicial']) {
            $builder->set('dia_ini_protecao', $options['dia_inicial']);
        }
        if ($options['dia_final']) {
            $builder->set('dia_fim_protecao', $options['dia_final']);
        }
        if ($options['valor']) {
            $builder->set('valor_protecao_valores', $options['valor']);
        }
        if ($options['data_cadastro']) {
            $builder->set('data_cadastro_protecao_valores', $options['data_cadastro']);
        }
        if ($options['data_atualizacao']) {
            $builder->set('data_atualizacao_protecao_valores', $options['data_atualizacao']);
        }
        if ($options['ativo']) {
            $builder->set('ativo_protecao_valores', $options['ativo']);
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
     * @param TarifaProtecao $obj
     * @param AluguelCarrosFacade $facade
     * @return TarifaProtecao
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'protecao' => (is_object($obj->getProtecao())) ? $obj->getProtecao()->getId() : null,
            'dia_inicial' => $obj->getDiaInicial(),
            'dia_final' => $obj->getDiaFinal(),
            'valor' => $obj->getValor(),
            'data_cadastro' => $obj->getDataCadastro()->getDataHoraSql(),
            'data_atualizacao' => $obj->getDataAtualizacao()->getDataHoraSql(),
            'ativo' => ($obj->getAtivo()) ? '1' : '0'
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $tarprot = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $tarprot = $this->insert($this->queryBuilderInsert($options));
        }
        return $tarprot;
    }

    /**
     * @param TarifaProtecao $obj
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