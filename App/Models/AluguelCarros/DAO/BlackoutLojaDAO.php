<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\BlackoutLoja;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class BlackoutLojaDAO extends Repository
{
    protected $table = "loc_dataespecial_locadora";
    protected $primary_key = 'dataespecialloc_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new BlackoutLoja($facade);
            $obj->setId($dados->dataespecialloc_id)
                ->setLoja($dados->dataespecialloc_locadora)
                ->setDataInicial($dados->dataespecialloc_inicio)
                ->setDataFinal($dados->dataespecialloc_fim)
                ->setOperador($dados->dataespecialloc_operador)
                ->setDataCadastro($dados->dataespecialloc_data)
                ->setGrupos($dados->dataespecialloc_grupos);
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
            $builder->lower('dataespecialloc_fim', "'" . date('Y-m-d') . " 00:00:00'");
            $builder->tableJoin('loc_lojas', 'loc_lojas.id_loja = loc_dataespecial_locadora.dataespecialloc_locadora',
                'LEFT');
            $builder->tableJoin('loc_locadoras', 'loc_locadoras.id_locadora = loc_lojas.id_locadoras', 'LEFT');
            if (isset($options['dataespecialloc_id'])) {
                $builder->where('dataespecialloc_id', $options['dataespecialloc_id']);
            }
            if (isset($options['loc_locadoras.id_locadora'])) {
                $builder->where('loc_locadoras.id_locadora', $options['loc_locadoras.id_locadora']);
            }
            if (isset($options['dataespecialloc_locadora'])) {
                $builder->where('dataespecialloc_locadora', $options['dataespecialloc_locadora']);
            }
            if (isset($options['dataespecialloc_operador'])) {
                $builder->where('dataespecialloc_operador', $options['dataespecialloc_operador']);
            }

        }
        if (isset($options['id'])) {
            $builder->where('dataespecialloc_id', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('dataespecialloc_id', $options['inId']);
        }
        if (isset($options['loja'])) {
            $builder->where('dataespecialloc_locadora', $options['loja']);
        }
        if (isset($options['data_inicial'])) {
            $builder->greater('dataespecialloc_inicio', "'" . $options['data_inicial'] . "'");
            $builder->lower('dataespecialloc_fim', "'" . $options['data_inicial'] . "'");
        }
        if (isset($options['data_final'])) {
            $builder->greater('dataespecialloc_inicio', "'" . $options['data_final'] . "'");
            $builder->lower('dataespecialloc_fim', "'" . $options['data_final'] . "'");
        }
        if (isset($options['data_atual'])) {
            $builder->lower('dataespecialloc_fim', "'" . $options['data_atual'] . "'");
        }
        if (isset($options['data_inicial_be']) && isset($options['data_final_be'])) {
            $builder->between('dataespecialloc_inicio', 'dataespecialloc_fim', "'" . $options['data_inicial_be'] . "'",
                "'" . $options['data_final_be'] . "'");
            //$this->db->between('dataespecialloc_fim', "'".$options['data_inicial_be']." 00:00:00'", "'".$options['data_final_be']." 23:59:59'");
        }
        if (isset($options['operador'])) {
            $builder->where('dataespecialloc_operador', $options['operador']);
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

        if (isset($options['loja'])) {
            $postData['dataespecialloc_locadora'] = $options['loja'];
        } else {
            $postData['dataespecialloc_locadora'] = null;
        }
        if (isset($options['data_inicial'])) {
            $postData['dataespecialloc_inicio'] = $options['data_inicial'];
        } else {
            $postData['dataespecialloc_inicio'] = null;
        }
        if (isset($options['data_final'])) {
            $postData['dataespecialloc_fim'] = $options['data_final'];
        } else {
            $postData['dataespecialloc_fim'] = null;
        }
        if (isset($options['operador'])) {
            $postData['dataespecialloc_operador'] = $options['operador'];
        } else {
            $postData['dataespecialloc_operador'] = null;
        }
        if (isset($options['grupos'])) {
            $postData['dataespecialloc_grupos'] = $options['grupos'];
        } else {
            $postData['dataespecialloc_grupos'] = null;
        }

        $postData['dataespecialloc_data'] = date('Y-m-d H:i:s');

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['loja'])) {
            $builder->set('dataespecialloc_locadora', $options['loja']);
        }
        if (isset($options['data_inicial'])) {
            $builder->set('dataespecialloc_inicio', $options['data_inicial']);
        }
        if (isset($options['data_final'])) {
            $builder->set('dataespecialloc_fim', $options['data_final']);
        }
        if (isset($options['operador'])) {
            $builder->set('dataespecialloc_operador', $options['operador']);
        }
        if (isset($options['grupos'])) {
            $builder->set('dataespecialloc_grupos', $options['grupos']);
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
     * @param BlackoutLoja $obj
     * @param AluguelCarrosFacade $facade
     * @return BlackoutLoja
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'loja' => $obj->getLoja(),
            'data_inicial' => $obj->getDataInicial()->getDataHoraSql(),
            'data_final' => $obj->getDataFinal()->getDataHoraSql(),
            'operador' => $obj->getOperador(),
            'grupos' => implode(',', $obj->getGrupos())
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $blkloja = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $blkloja = $this->insert($this->queryBuilderInsert($options));
        }
        return $blkloja;
    }

    /**
     * @param BlackoutLoja $obj
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