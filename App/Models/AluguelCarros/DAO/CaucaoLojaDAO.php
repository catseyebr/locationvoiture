<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\CaucaoLoja;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class CaucaoLojaDAO extends Repository
{
    protected $table = "loc_caucao_loja";
    protected $primary_key = 'caucloja_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new CaucaoLoja($facade);
            $obj->setId($dados->caucloja_id)
                ->setGrupo($dados->caucloja_grupo)
                ->setLoja($dados->caucloja_loja)
                ->setValor($dados->caucloja_valor);
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
            if (isset($options['caucloja_id'])) {
                $builder->where('caucloja_id', $options['caucloja_id']);
            }

            if (isset($options['caucloja_grupo'])) {
                $builder->where('caucloja_grupo', $options['caucloja_grupo']);
            }

            if (isset($options['caucloja_loja'])) {
                $builder->where('caucloja_loja', $options['caucloja_loja']);
            }

            if (isset($options['caucloja_valor'])) {
                $builder->where('caucloja_valor', $options['caucloja_valor']);
            }
        }

        if (isset($options['id'])) {
            $builder->where('caucloja_id', $options['id']);
        }

        if (isset($options['inId'])) {
            $builder->where_in('caucloja_id', $options['inId']);
        }

        if (isset($options['grupo'])) {
            $builder->where('caucloja_grupo', $options['grupo']);
        }

        if (isset($options['inGrupo'])) {
            $builder->where_in('caucloja_grupo', $options['inGrupo']);
        }

        if (isset($options['loja'])) {
            $builder->where('caucloja_loja', $options['loja']);
        }

        if (isset($options['inLoja'])) {
            $builder->where_in('caucloja_loja', $options['inLoja']);
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

        if (isset($options['grupo'])) {
            $postData['caucloja_grupo'] = $options['grupo'];
        } else {
            $postData['caucloja_grupo'] = null;
        }

        if (isset($options['loja'])) {
            $postData['caucloja_loja'] = $options['loja'];
        } else {
            $postData['caucloja_loja'] = null;
        }

        if (isset($options['valor'])) {
            $postData['caucloja_valor'] = $options['valor'];
        } else {
            $postData['caucloja_valor'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['grupo'])) {
            $builder->set('caucloja_grupo', $options['grupo']);
        }

        if (isset($options['loja'])) {
            $builder->set('caucloja_loja', $options['loja']);
        }

        if (isset($options['valor'])) {
            $builder->set('caucloja_valor', $options['valor']);
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
     * @param CaucaoLoja $obj
     * @param AluguelCarrosFacade $facade
     * @return CaucaoLoja
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'grupo' => $obj->getGrupo(),
            'loja' => $obj->getLoja(),
            'valor' => $obj->getValor()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $caucaloja = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $caucaloja = $this->insert($this->queryBuilderInsert($options));
        }
        return $caucaloja;
    }

    /**
     * @param CaucaoLoja $obj
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