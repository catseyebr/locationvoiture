<?php

namespace Carroaluguel\Models\Financeiro\DAO;


use Carroaluguel\Models\Financeiro\Produto;
use Carroaluguel\Models\FinanceiroFacade;
use Core\QueryBuilder;
use Core\Repository;

class ProdutoDAO extends Repository
{
    protected $table = "tb_produto";
    protected $primary_key = 'pro_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Produto($facade);
            $obj->setId($dados->pro_id)
                ->setNome($dados->pro_nome)
                ->setDescricao($dados->pro_descricao)
                ->setModulo($dados->pro_modulo);
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
            if (isset($options['pro_id'])) {
                $builder->where("pro_id", $options['pro_id']);
            }

            if (isset($options['pro_nome'])) {
                $builder->like("pro_nome", $options['pro_nome']);
            }

            if (isset($options['pro_descricao'])) {
                $builder->like("pro_descricao", $options['pro_descricao']);
            }

            if (isset($options['pro_modulo'])) {
                $builder->where("pro_modulo", $options['pro_modulo']);
            }
        }

        if (isset($options['id'])) {
            $builder->where("pro_id", $options['id']);
        }

        if (isset($options['nome'])) {
            $builder->where("pro_nome", $options['nome']);
        }

        if (isset($options['descricao'])) {
            $builder->like("pro_descricao", $options['descricao']);
        }

        if (isset($options['modulo'])) {
            $builder->where("pro_modulo", $options['modulo']);
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
            $postData['pro_nome'] = $options['nome'];
        } else {
            $postData['pro_nome'] = null;
        }

        if (isset($options['descricao'])) {
            $postData['pro_descricao'] = $options['descricao'];
        } else {
            $postData['pro_descricao'] = null;
        }

        if (isset($options['modulo'])) {
            $postData['pro_modulo'] = $options['modulo'];
        } else {
            $postData['pro_modulo'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['nome'])) {
            $builder->set("pro_nome", $options['nome']);
        }

        if (isset($options['descricao'])) {
            $builder->set("pro_descricao", $options['descricao']);
        }

        if (isset($options['modulo'])) {
            $builder->set("pro_modulo", $options['modulo']);
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
     * @param Produto $obj
     * @param FinanceiroFacade $facade
     * @return Produto
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'descricao' => $obj->getDescricao(),
            'modulo' => $obj->getModulo()
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
     * @param Produto $obj
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