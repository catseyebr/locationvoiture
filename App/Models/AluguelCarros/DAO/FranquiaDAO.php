<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\Franquia;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class FranquiaDAO extends Repository
{
    protected $table = "loc_franquias";
    protected $primary_key = 'franq_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Franquia($facade);
            $obj->setId($dados->franq_id)
                ->setLocadora($dados->franq_locadora)
                ->setGrupo($dados->franq_grupo)
                ->setProtecao($dados->franq_protecao)
                ->setFranquia($dados->franq_franquia)
                ->setFranquiaTerceiros($dados->franq_franquia_terceiros)
                ->setCaucao($dados->franq_caucao);
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
            $builder->tableJoin('loc_grupos', 'loc_grupos.id_grupo = loc_franquias.franq_grupo', 'LEFT');
            $builder->tableJoin('loc_protecao', 'loc_protecao.id_protecao = loc_franquias.franq_protecao', 'LEFT');
            if (isset($options['franq_id'])) {
                $builder->where("franq_id", $options['franq_id']);
            }
            if (isset($options['franq_locadora'])) {
                $builder->where("franq_locadora", $options['franq_locadora']);
            }
            if (isset($options['loc_grupos.grupo'])) {
                $builder->like("loc_grupos.grupo", $options['loc_grupos.grupo']);
            }
            if (isset($options['loc_protecao.protecao'])) {
                $builder->like("loc_protecao.protecao", $options['loc_protecao.protecao']);
            }
            if (isset($options['franq_franquia'])) {
                $builder->where("franq_franquia", $options['franq_franquia']);
            }
            if (isset($options['franq_franquia_terceiros'])) {
                $builder->where("franq_franquia_terceiros", $options['franq_franquia_terceiros']);
            }
            if (isset($options['franq_caucao'])) {
                $builder->where("franq_caucao", $options['franq_caucao']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('franq_id', $options['id']);
        }
        if (isset($options['grupo'])) {
            $builder->where('franq_grupo', $options['grupo']);
        }
        if (isset($options['locadora'])) {
            $builder->where('franq_locadora', $options['locadora']);
        }
        if (isset($options['protecao'])) {
            $builder->where('franq_protecao', $options['protecao']);
        }
        if (isset($options['franquia'])) {
            $builder->like('franq_franquia', $options['franquia']);
        }
        if (isset($options['franquia_terceiros'])) {
            $builder->like('franq_franquia_terceiros', $options['franquia_terceiros']);
        }
        if (isset($options['caucao'])) {
            $builder->like('franq_caucao', $options['caucao']);
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
        if (isset($options['locadora'])) {
            $postData['franq_locadora'] = $options['locadora'];
        } else {
            $postData['franq_locadora'] = null;
        }

        if (isset($options['grupo'])) {
            $postData['franq_grupo'] = $options['grupo'];
        } else {
            $postData['franq_grupo'] = null;
        }

        if (isset($options['protecao'])) {
            $postData['franq_protecao'] = $options['protecao'];
        } else {
            $postData['franq_protecao'] = null;
        }

        if (isset($options['franquia'])) {
            $postData['franq_franquia'] = $options['franquia'];
        } else {
            $postData['franq_franquia'] = null;
        }

        if (isset($options['franquia_terceiros'])) {
            $postData['franq_franquia_terceiros'] = $options['franquia_terceiros'];
        } else {
            $postData['franq_franquia_terceiros'] = null;
        }

        if (isset($options['caucao'])) {
            $postData['franq_caucao'] = $options['caucao'];
        } else {
            $postData['franq_caucao'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['locadora'])) {
            $builder->set('franq_locadora', $options['locadora']);
        }
        if (isset($options['grupo'])) {
            $builder->set('franq_grupo', $options['grupo']);
        }
        if (isset($options['protecao'])) {
            $builder->set('franq_protecao', $options['protecao']);
        }
        if (isset($options['franquia'])) {
            $builder->set('franq_franquia', $options['franquia']);
        }
        if (isset($options['franquia_terceiros'])) {
            $builder->set('franq_franquia_terceiros', $options['franquia_terceiros']);
        }
        if (isset($options['caucao'])) {
            $builder->set('franq_caucao', $options['caucao']);
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
     * @param Franquia $obj
     * @param AluguelCarrosFacade $facade
     * @return Franquia
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'locadora' => $obj->getLocadoraId(),
            'grupo' => $obj->getGrupoId(),
            'protecao' => $obj->getProtecaoId(),
            'franquia' => $obj->getFranquia(),
            'franquia_terceiros' => $obj->getFranquiaTerceiros(),
            'caucao' => $obj->getCaucao()
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
     * @param Franquia $obj
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