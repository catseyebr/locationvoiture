<?php

namespace Carroaluguel\Models\Financeiro\DAO;

use Carroaluguel\Models\Financeiro\TipoFornecedor;
use Carroaluguel\Models\FinanceiroFacade;
use Core\QueryBuilder;
use Core\Repository;

class TipoFornecedorDAO extends Repository
{
    protected $table = "tb_tipofornecedor";
    protected $primary_key = 'tforn_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new TipoFornecedor($facade);
            $obj->setId($dados->stven_id)
                ->setNome($dados->stven_nome)
                ->setSigla($dados->tforn_sigla)
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
            if (isset($options['tforn_id'])) {
                $builder->where("tforn_id", $options['tforn_id']);
            }

            if (isset($options['tforn_nome'])) {
                $builder->like("tforn_nome", $options['tforn_nome']);
            }

            if (isset($options['tforn_sigla'])) {
                $builder->where("tforn_sigla", $options['tforn_sigla']);
            }

            if (isset($options['tforn_descricao'])) {
                $builder->like("tforn_descricao", $options['tforn_descricao']);
            }
        }

        if (isset($options['id'])) {
            $builder->where("tforn_id", $options['id']);
        }

        if (isset($options['nome'])) {
            $builder->like("tforn_nome", $options['nome']);
        }

        if (isset($options['sigla'])) {
            $builder->where("tforn_sigla", $options['sigla']);
        }

        if (isset($options['descricao'])) {
            $builder->like("tforn_descricao", $options['descricao']);
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
            $postData['tforn_nome'] = $options['nome'];
        } else {
            $postData['tforn_nome'] = null;
        }

        if (isset($options['sigla'])) {
            $postData['tforn_sigla'] = $options['sigla'];
        } else {
            $postData['tforn_sigla'] = null;
        }

        if (isset($options['descricao'])) {
            $postData['tforn_descricao'] = $options['descricao'];
        } else {
            $postData['tforn_descricao'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set("tforn_nome", $options['nome']);
        }

        if (isset($options['sigla'])) {
            $builder->set("tforn_sigla", $options['sigla']);
        }

        if (isset($options['descricao'])) {
            $builder->set("tforn_descricao", $options['descricao']);
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
     * @param TipoFornecedor $obj
     * @param FinanceiroFacade $facade
     * @return TipoFornecedor
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'sigla' => $obj->getSigla(),
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
     * @param TipoFornecedor $obj
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