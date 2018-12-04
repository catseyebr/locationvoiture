<?php

namespace Carroaluguel\Models\Financeiro\DAO;


use Carroaluguel\Models\Financeiro\Conta;
use Carroaluguel\Models\FinanceiroFacade;
use Core\QueryBuilder;
use Core\Repository;

class ContaDao extends Repository
{
    protected $table = "tb_conta";
    protected $primary_key = 'cnt_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Conta($facade);
            $obj->setId($dados->cnt_id)
                ->setNome($dados->cnt_nome)
                ->setDescricao($dados->cnt_descricao);
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
            if (isset($options['cnt_id'])) {
                $builder->where("cnt_id", $options['cnt_id']);
            }
            if (isset($options['cnt_nome'])) {
                $builder->like("cnt_nome", $options['cnt_nome']);
            }
        }
        if (isset($options['id'])) {
            $builder->where("cnt_id", $options['id']);
        }
        if (isset($options['nome'])) {
            $builder->where("cnt_nome", $options['nome']);
        }
        if (isset($options['descricao'])) {
            $builder->like("cnt_descricao", $options['descricao']);
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
            $postData['cnt_nome'] = $options['nome'];
        } else {
            $postData['cnt_nome'] = null;
        }

        if (isset($options['descricao'])) {
            $postData['cnt_descricao'] = $options['descricao'];
        } else {
            $postData['cnt_descricao'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set("cnt_nome", $options['nome']);
        }

        if (isset($options['descricao'])) {
            $builder->set("cnt_descricao", $options['descricao']);
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
     * @param Conta $obj
     * @param FinanceiroFacade $facade
     * @return Conta
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
     * @param Conta $obj
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