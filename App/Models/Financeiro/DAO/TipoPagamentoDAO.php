<?php

namespace Carroaluguel\Models\Financeiro\DAO;


use Carroaluguel\Models\Financeiro\TipoPagamento;
use Carroaluguel\Models\FinanceiroFacade;
use Core\QueryBuilder;
use Core\Repository;

class TipoPagamentoDAO extends Repository
{
    protected $table = "tb_tipopagamento";
    protected $primary_key = 'tpag_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new TipoPagamento($facade);
            $obj->setId($dados->tpag_id)
                ->setNome($dados->tpag_nome)
                ->setDescricao($dados->tpag_descricao);
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
            if (isset($options['tpag_id'])) {
                $builder->where("tpag_id", $options['tpag_id']);
            }
            if (isset($options['tpag_nome'])) {
                $builder->like("tpag_nome", $options['tpag_nome']);
            }
        }
        if (isset($options['id'])) {
            $builder->where("tpag_id", $options['id']);
        }
        if (isset($options['nome'])) {
            $builder->where("tpag_nome", $options['nome']);
        }
        if (isset($options['descricao'])) {
            $builder->like("tpag_descricao", $options['descricao']);
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
            $postData['tpag_nome'] = $options['nome'];
        } else {
            $postData['tpag_nome'] = null;
        }

        if (isset($options['descricao'])) {
            $postData['tpag_descricao'] = $options['descricao'];
        } else {
            $postData['tpag_descricao'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set("tpag_nome", $options['nome']);
        }

        if (isset($options['descricao'])) {
            $builder->set("tpag_descricao", $options['descricao']);
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
     * @param TipoPagamento $obj
     * @param FinanceiroFacade $facade
     * @return TipoPagamento
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
     * @param TipoPagamento $obj
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