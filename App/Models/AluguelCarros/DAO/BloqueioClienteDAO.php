<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\BloqueioCliente;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class BloqueioClienteDAO extends Repository
{
    protected $table = "bloqueio_cliente";
    protected $primary_key = 'blocli_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new BloqueioCliente($facade);
            $obj->setId($dados->blocli_id)
                ->setCpf($dados->blocli_cpf)
                ->setMotivo($dados->blocli_motivo)
                ->setAtivo($dados->blocli_ativo)
                ->setOperador($dados->blocli_operador)
                ->setData($dados->blocli_data);
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
            if (isset($options['blocli_id'])) {
                $builder->where('blocli_id', $options['blocli_id']);
            }
            if (isset($options['blocli_cpf'])) {
                $builder->like('blocli_cpf', $options['blocli_cpf']);
            }
            if (isset($options['blocli_ativo'])) {
                $builder->where('blocli_ativo', $options['blocli_ativo']);
            }

        }

        if (isset($options['id'])) {
            $builder->where('blocli_id', $options['id']);
        }

        if (isset($options['inId'])) {
            $builder->where_in('blocli_id', $options['inId']);
        }

        if (isset($options['cpf'])) {
            $builder->where('blocli_cpf', $options['cpf']);
        }

        if (isset($options['ativo'])) {
            $builder->where('blocli_ativo', $options['ativo']);
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
        if (isset($options['cpf'])) {
            $postData['blocli_cpf'] = $options['cpf'];
        } else {
            $postData['blocli_cpf'] = null;
        }

        if (isset($options['motivo'])) {
            $postData['blocli_motivo'] = $options['motivo'];
        } else {
            $postData['blocli_motivo'] = null;
        }

        if (isset($options['ativo'])) {
            $postData['blocli_ativo'] = $options['ativo'];
        } else {
            $postData['blocli_ativo'] = null;
        }

        if (isset($options['operador'])) {
            $postData['blocli_operador'] = $options['operador'];
        } else {
            $postData['blocli_operador'] = null;
        }

        if (isset($options['data'])) {
            $postData['blocli_data'] = $options['data'];
        } else {
            $postData['blocli_data'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['cpf'])) {
            $builder->set('blocli_cpf', $options['cpf']);
        }
        if (isset($options['motivo'])) {
            $builder->set('blocli_motivo', $options['motivo']);
        }
        if (isset($options['ativo'])) {
            $builder->set('blocli_ativo', $options['ativo']);
        }
        if (isset($options['data'])) {
            $builder->set('blocli_data', $options['data']);
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
     * @param BloqueioCliente $obj
     * @param AluguelCarrosFacade $facade
     * @return BloqueioCliente
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'cpf' => $obj->getCpf(),
            'motivo' => $obj->getMotivo(),
            'ativo' => ($obj->getAtivo()) ? '1' : '0',
            'operador' => $obj->getOperador(),
            'data' => $obj->getData()->getDataHoraSql()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $blocli = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $blocli = $this->insert($this->queryBuilderInsert($options));
        }
        return $blocli;
    }

    /**
     * @param BloqueioCliente $obj
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