<?php

namespace Carroaluguel\Models\Utilizador\DAO;

use Carroaluguel\Models\Utilizador\Permissao;
use Carroaluguel\Models\UtilizadorFacade;
use Core\QueryBuilder;
use Core\Repository;

class PermissaoDAO extends Repository
{
    protected $table = "tb_permissao";
    protected $primary_key = 'perm_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Permissao($facade);
            $obj->setId($dados->perm_id)
                ->setClasse($dados->perm_classe)
                ->setFuncao($dados->perm_funcao);
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
            if (isset($options['perm_id'])) {
                $builder->where('perm_id', $options['perm_id']);
            }
            if (isset($options['perm_classe'])) {
                $builder->like('perm_classe', $options['perm_classe']);
            }
            if (isset($options['perm_funcao'])) {
                $builder->like('perm_funcao', $options['perm_funcao']);
            }
        }
        if (isset($options['nivel'])) {
            $builder->tableJoin('tb_nivelpermissao', 'tb_nivelpermissao.nivperm_permissao = tb_permissao.perm_id',
                'LEFT');
            $builder->where("nivperm_nivel", $options['nivel']);
        }
        if (isset($options['id'])) {
            $builder->where('perm_id', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('perm_id', $options['inId']);
        }
        if (isset($options['classe'])) {
            $builder->where('perm_classe', $options['classe']);
        }
        if (isset($options['funcao'])) {
            $builder->where('perm_funcao', $options['funcao']);
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

        if (isset($options['classe'])) {
            $postData['perm_classe'] = $options['classe'];
        } else {
            $postData['perm_classe'] = null;
        }

        if (isset($options['funcao'])) {
            $postData['perm_funcao'] = $options['funcao'];
        } else {
            $postData['perm_funcao'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['classe'])) {
            $builder->set('perm_classe', $options['classe']);
        }
        if (isset($options['funcao'])) {
            $builder->set('perm_funcao', $options['funcao']);
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
     * @param Permissao $obj
     * @param UtilizadorFacade $facade
     * @return Permissao
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'classe' => $obj->getClasse(),
            'funcao' => $obj->getFuncao()
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
     * @param Permissao $obj
     * @param UtilizadorFacade $facade
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