<?php

namespace Carroaluguel\Models\Financeiro\DAO;

use Carroaluguel\Models\Financeiro\StatusVenda;
use Carroaluguel\Models\FinanceiroFacade;
use Core\QueryBuilder;
use Core\Repository;

class StatusVendaDAO extends Repository
{
    protected $table = "tb_statusvenda";
    protected $primary_key = 'stven_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new StatusVenda($facade);
            $obj->setId($dados->stven_id)
                ->setNome($dados->stven_nome)
                ->setDescricao($dados->stven_descricao);
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
            if (isset($options['stven_id'])) {
                $builder->where("stven_id", $options['stven_id']);
            }
            if (isset($options['stven_nome'])) {
                $builder->like("stven_nome", $options['stven_nome']);
            }
        }

        if (isset($options['id'])) {
            $builder->where("stven_id", $options['id']);
        }

        if (isset($options['nome'])) {
            $builder->where("stven_nome", $options['nome']);
        }

        if (isset($options['descricao'])) {
            $builder->like("stven_descricao", $options['descricao']);
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
            $postData['stven_nome'] = $options['nome'];
        } else {
            $postData['stven_nome'] = null;
        }

        if (isset($options['descricao'])) {
            $postData['stven_descricao'] = $options['descricao'];
        } else {
            $postData['stven_descricao'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set("stven_nome", $options['nome']);
        }

        if (isset($options['descricao'])) {
            $builder->set("stven_descricao", $options['descricao']);
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
     * @param StatusVenda $obj
     * @param FinanceiroFacade $facade
     * @return StatusVenda
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'descricao' => $obj->getDescricao()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $save = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $save = $this->insert($this->queryBuilderInsert($options));
        }
        return $save;
    }

    /**
     * @param StatusVenda $obj
     * @param FinanceiroFacade $facade
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