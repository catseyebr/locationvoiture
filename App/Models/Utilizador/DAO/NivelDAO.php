<?php

namespace Carroaluguel\Models\Utilizador\DAO;

use Carroaluguel\Models\Utilizador\Nivel;
use Carroaluguel\Models\UtilizadorFacade;
use Core\QueryBuilder;
use Core\Repository;

class NivelDAO extends Repository
{
    protected $table = "tb_nivel";
    protected $primary_key = 'niv_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Nivel($facade);
            $obj->setId($dados->niv_id)
                ->setNome($dados->niv_nome);
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
            if (isset($options['niv_id'])) {
                $builder->where('niv_id', $options['niv_id']);
            }
            if (isset($options['niv_nome'])) {
                $builder->like('niv_nome', $options['niv_nome']);
            }
        }
        if (isset($options['permissao'])) {
            $builder->tableJoin('tb_nivelpermissao', 'tb_nivelpermissao.nivperm_nivel = tb_nivel.niv_id',
                'LEFT');
            $builder->where("nivperm_permissao", $options['permissao']);
        }
        if (isset($options['id'])) {
            $builder->where('niv_id', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('niv_id', $options['inId']);
        }
        if (isset($options['nome'])) {
            $builder->like('niv_nome', $options['nome']);
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
            $postData['niv_nome'] = $options['nome'];
        } else {
            $postData['niv_nome'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['nome'])) {
            $builder->set('niv_nome', $options['nome']);
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
     * @param Nivel $obj
     * @param UtilizadorFacade $facade
     * @return Nivel
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome()
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
     * @param Nivel $obj
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