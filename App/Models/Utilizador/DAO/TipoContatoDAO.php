<?php

namespace Carroaluguel\Models\Utilizador\DAO;


use Carroaluguel\Models\Utilizador\TipoContato;
use Carroaluguel\Models\UtilizadorFacade;
use Core\QueryBuilder;
use Core\Repository;

class TipoContatoDAO extends Repository
{
    protected $table = "tb_tipocontato";
    protected $primary_key = 'tco_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new TipoContato($facade);
            $obj->setId($dados->tco_id)
                ->setNome($dados->tco_nome);
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
            if (isset($options['tco_id'])) {
                $builder->where('tco_id', $options['tco_id']);
            }
            if (isset($options['tco_nome'])) {
                $builder->like('tco_nome', $options['tco_nome']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('tco_id', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('tco_id', $options['inId']);
        }
        if (isset($options['nome'])) {
            $builder->like('tco_nome', $options['nome']);
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
            $postData['tco_nome'] = $options['nome'];
        } else {
            $postData['tco_nome'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['nome'])) {
            $builder->set('tco_nome', $options['nome']);
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
     * @param TipoContato $obj
     * @param UtilizadorFacade $facade
     * @return TipoContato
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
     * @param TipoContato $obj
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