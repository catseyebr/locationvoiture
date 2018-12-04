<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\BlackoutGrupo;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class BlackoutGrupoDAO extends Repository
{
    protected $table = "loc_dataespecial_grupos";
    protected $primary_key = 'dataespecialgrp_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new BlackoutGrupo($facade);
            $obj->setId($dados->dataespecialgrp_id)
                ->setGrupo($dados->dataespecialgrp_grupo)
                ->setDataInicial($dados->dataespecialgrp_inicio)
                ->setDataFinal($dados->dataespecialgrp_fim)
                ->setDataCadastro($dados->dataespecialgrp_data)
                ->setOperador($dados->dataespecialgrp_operador);
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
            $builder->lower('dataespecialgrp_fim', "'" . date('Y-m-d') . " 00:00:00'");
            $builder->tableJoin('loc_grupos', 'loc_grupos.id_grupo = loc_dataespecial_grupos.dataespecialgrp_grupo',
                'LEFT');
            $builder->tableJoin('loc_locadoras', 'loc_locadoras.id_locadora = loc_grupos.id_locadora', 'LEFT');
            if (isset($options['dataespecialgrp_id'])) {
                $builder->where('dataespecialgrp_id', $options['dataespecialgrp_id']);
            }
            if (isset($options['loc_locadoras.id_locadora'])) {
                $builder->where('loc_locadoras.id_locadora', $options['loc_locadoras.id_locadora']);
            }
            if (isset($options['dataespecialgrp_grupo'])) {
                $builder->where('dataespecialgrp_grupo', $options['dataespecialgrp_grupo']);
            }
            if (isset($options['dataespecialgrp_operador'])) {
                $builder->where('dataespecialgrp_operador', $options['dataespecialgrp_operador']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('dataespecialgrp_id', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('dataespecialgrp_id', $options['inId']);
        }
        if (isset($options['grupo'])) {
            $builder->where('dataespecialgrp_grupo', $options['grupo']);
        }
        if (isset($options['grupo_in'])) {
            $builder->where_in('dataespecialgrp_grupo', $options['grupo_in']);
        }
        if (isset($options['data_inicial'])) {
            $builder->greater('dataespecialgrp_inicio', "'" . $options['data_inicial'] . "'");
            $builder->lower('dataespecialgrp_fim', "'" . $options['data_inicial'] . "'");
        }
        if (isset($options['data_final'])) {
            $builder->greater('dataespecialgrp_inicio', "'" . $options['data_final'] . "'");
            $builder->lower('dataespecialgrp_fim', "'" . $options['data_final'] . "'");
        }

        if (isset($options['data_ativa'])) {
            $builder->lower('dataespecialgrp_fim', "'" . $options['data_ativa'] . "'");
        }

        if (isset($options['operador'])) {
            $builder->where('dataespecialgrp_operador', $options['operador']);
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
            $postData['dataespecialgrp_grupo'] = $options['grupo'];
        } else {
            $postData['dataespecialgrp_grupo'] = null;
        }

        if (isset($options['data_inicial'])) {
            $postData['dataespecialgrp_inicio'] = $options['data_inicial'];
        } else {
            $postData['dataespecialgrp_inicio'] = null;
        }

        if (isset($options['data_final'])) {
            $postData['dataespecialgrp_fim'] = $options['data_final'];
        } else {
            $postData['dataespecialgrp_fim'] = null;
        }

        if (isset($options['operador'])) {
            $postData['dataespecialgrp_operador'] = $options['operador'];
        } else {
            $postData['dataespecialgrp_operador'] = null;
        }

        if (isset($options['data'])) {
            $postData['dataespecialgrp_data'] = $options['data'];
        } else {
            $postData['dataespecialgrp_data'] = date('Y-m-d H:i:s');
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['grupo'])) {
            $builder->set('dataespecialgrp_grupo', $options['grupo']);
        }
        if (isset($options['data_inicial'])) {
            $builder->set('dataespecialgrp_inicio', $options['data_inicial']);
        }
        if (isset($options['data_final'])) {
            $builder->set('dataespecialgrp_fim', $options['data_final']);
        }
        if (isset($options['operador'])) {
            $builder->set('dataespecialgrp_operador', $options['operador']);
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
     * @param BlackoutGrupo $obj
     * @param AluguelCarrosFacade $facade
     * @return BlackoutGrupo
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'grupo' => $obj->getGrupo(),
            'data_inicial' => $obj->getDataInicial()->getDataHoraSql(),
            'data_final' => $obj->getDataFinal()->getDataHoraSql(),
            'operador' => $obj->getOperador()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $blackout = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $blackout = $this->insert($this->queryBuilderInsert($options));
        }
        return $blackout;
    }

    /**
     * @param BlackoutGrupo $obj
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