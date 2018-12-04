<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\CiaAerea;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class CiaAereaDAO extends Repository
{
    protected $table = "ciaaerea";
    protected $primary_key = 'ciaaerea_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new CiaAerea($facade);
            $obj->setId($dados->ciaaerea_id)
                ->setCodigo($dados->ciaaerea_cod)
                ->setNome($dados->ciaaerea_nome);
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
            if (isset($options['ciaaerea_id'])) {
                $builder->where('ciaaerea_id', $options['ciaaerea_id']);
            }
            if (isset($options['ciaaerea_cod'])) {
                $builder->where('ciaaerea_cod', $options['ciaaerea_cod']);
            }
            if (isset($options['ciaaerea_nome'])) {
                $builder->where('ciaaerea_nome', $options['ciaaerea_nome']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('ciaaerea_id', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('ciaaerea_id', $options['inId']);
        }
        if (isset($options['codigo'])) {
            $builder->where('ciaaerea_cod', $options['codigo']);
        }
        if (isset($options['nome'])) {
            $builder->where('ciaaerea_nome', $options['nome']);
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
        if (isset($options['codigo'])) {
            $postData['ciaaerea_cod'] = $options['codigo'];
        } else {
            $postData['ciaaerea_cod'] = null;
        }

        if (isset($options['nome'])) {
            $postData['ciaaerea_nome'] = $options['nome'];
        } else {
            $postData['ciaaerea_nome'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['codigo'])) {
            $builder->set('ciaaerea_cod', $options['codigo']);
        }
        if (isset($options['nome'])) {
            $builder->set('ciaaerea_nome', $options['nome']);
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
     * @param CiaAerea $obj
     * @param AluguelCarrosFacade $facade
     * @return CiaAerea
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'codigo' => $obj->getCodigo()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $ciaaerea = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $ciaaerea = $this->insert($this->queryBuilderInsert($options));
        }
        return $ciaaerea;
    }

    /**
     * @param CiaAerea $obj
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