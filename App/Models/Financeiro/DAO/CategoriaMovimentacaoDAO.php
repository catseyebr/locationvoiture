<?php

namespace Carroaluguel\Models\Financeiro\DAO;


use Carroaluguel\Models\Financeiro\CategoriaMovimentacao;
use Carroaluguel\Models\FinanceiroFacade;
use Core\QueryBuilder;
use Core\Repository;

class CategoriaMovimentacaoDAO extends Repository
{
    protected $table = "tb_categoriamovimentacao";
    protected $primary_key = 'cmo_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new CategoriaMovimentacao($facade);
            $obj->setId($dados->cmo_id)
                ->setIdpai($dados->cmo_idpai)
                ->setNome($dados->cmo_nome)
                ->setDescricao($dados->cmo_descricao)
                ->setTipo($dados->cmo_tipo);
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
            if (isset($options['cmo_id'])) {
                $builder->where("cmo_id", $options['cmo_id']);
            }

            if (isset($options['cmo_nome'])) {
                $builder->like("cmo_nome", $options['cmo_nome']);
            }

            if (isset($options['cmo_idpai'])) {
                $builder->where("cmo_idpai", $options['cmo_idpai']);
            }

            if (isset($options['cmo_tipo'])) {
                $builder->where("cmo_tipo", $options['cmo_tipo']);
            }
        }

        if (isset($options['id'])) {
            $builder->where("cmo_id", $options['id']);
        }

        if (isset($options['nome'])) {
            $builder->where("cmo_nome", $options['nome']);
        }

        if (isset($options['idpai'])) {
            $builder->where("cmo_idpai", $options['idpai']);
        }

        if (isset($options['noidpai'])) {
            $builder->where_null("cmo_idpai");
        }

        if (isset($options['hasidpai'])) {
            $builder->where_notnull("cmo_idpai");
        }

        if (isset($options['descricao'])) {
            $builder->like("cmo_descricao", $options['descricao']);
        }

        if (isset($options['tipo'])) {
            $builder->where("cmo_tipo", $options['tipo']);
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
            $postData['cmo_nome'] = $options['nome'];
        } else {
            $postData['cmo_nome'] = null;
        }

        if (isset($options['idpai'])) {
            $postData['cmo_idpai'] = $options['idpai'];
        } else {
            $postData['cmo_idpai'] = null;
        }

        if (isset($options['descricao'])) {
            $postData['cmo_descricao'] = $options['descricao'];
        } else {
            $postData['cmo_descricao'] = null;
        }

        if (isset($options['tipo'])) {
            $postData['cmo_tipo'] = $options['tipo'];
        } else {
            $postData['cmo_tipo'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set("cmo_nome", $options['nome']);
        }

        if (isset($options['idpai'])) {
            $builder->set("cmo_idpai", $options['idpai']);
        } else {
            $builder->set("cmo_idpai", null);
        }

        if (isset($options['descricao'])) {
            $builder->set("cmo_descricao", $options['descricao']);
        }

        if (isset($options['tipo'])) {
            $builder->set("cmo_tipo", $options['tipo']);
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
     * @param CategoriaMovimentacao $obj
     * @param FinanceiroFacade $facade
     * @return CategoriaMovimentacao
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'idpai' => (is_object($obj->getIdpai())) ? $obj->getIdpai()->getId() : null,
            'descricao' => $obj->getDescricao(),
            'tipo' => $obj->getTipo()
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
     * @param CategoriaMovimentacao $obj
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