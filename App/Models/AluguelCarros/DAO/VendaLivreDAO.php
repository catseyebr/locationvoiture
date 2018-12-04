<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\VendaLivre;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class VendaLivreDAO extends Repository
{
    protected $table = "loc_vendalivre";
    protected $primary_key = 'venlv_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new VendaLivre($facade);
            $obj->setId($dados->venlv_id)
                ->setGrupo($dados->venlv_grupo)
                ->setHorasValidade($dados->venlv_horasval)
                ->setDataValidadeFinal($dados->venlv_datavalfim)
                ->setDataValidadeInicial($dados->venlv_datavalini)
                ->setDataRetiradaFinal($dados->venlv_dataretifim)
                ->setDataRetiradaInicial($dados->venlv_dataretiini)
                ->setAtivo(($dados->venlv_ativo == 1) ? true : false)
                ->setLojas($dados->venlv_lojas);
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
            if (isset($options['venlv_id'])) {
                $builder->where('venlv_id', $options['venlv_id']);
            }
            if (isset($options['venlv_grupo'])) {
                $builder->where('venlv_grupo', $options['venlv_grupo']);
            }
            if (isset($options['venlv_ativo'])) {
                $builder->where('venlv_ativo', $options['venlv_ativo']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('venlv_id', $options['id']);
        }

        if (isset($options['grupo'])) {
            $builder->where('venlv_grupo', $options['grupo']);
        }

        if (isset($options['horasValidade'])) {
            $builder->greater('venlv_horasval', $options['horasValidade']);
        }

        if (isset($options['ativo'])) {
            $builder->where('venlv_ativo', $options['ativo']);
        }

        if (isset($options['dataValidadeInicial'])) {
            $builder->greater('venlv_datavalini', "'" . $options['dataValidadeInicial'] . "'");
        }

        if (isset($options['dataValidadeFinal'])) {
            $builder->lower('venlv_datavalfim', "'" . $options['dataValidadeFinal'] . "'");
        }

        if (isset($options['dataRetiradaInicial'])) {
            $builder->greater('venlv_dataretiini', "'" . $options['dataRetiradaInicial'] . "'");
        }

        if (isset($options['dataRetiradaFinal'])) {
            $builder->lower('venlv_dataretifim', "'" . $options['dataRetiradaFinal'] . "'");
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
            $postData['venlv_grupo'] = $options['grupo'];
        } else {
            $postData['venlv_grupo'] = null;
        }

        if (isset($options['horasValidade'])) {
            $postData['venlv_horasval'] = $options['horasValidade'];
        } else {
            $postData['venlv_horasval'] = null;
        }

        if (isset($options['ativo'])) {
            $postData['venlv_ativo'] = $options['ativo'];
        } else {
            $postData['venlv_ativo'] = '0';
        }

        if (isset($options['dataValidadeInicial'])) {
            $postData['venlv_datavalini'] = $options['dataValidadeInicial'];
        } else {
            $postData['venlv_datavalini'] = null;
        }

        if (isset($options['dataValidadeFinal'])) {
            $postData['venlv_datavalfim'] = $options['dataValidadeFinal'];
        } else {
            $postData['venlv_datavalfim'] = null;
        }

        if (isset($options['dataRetiradaInicial'])) {
            $postData['venlv_dataretiini'] = $options['dataRetiradaInicial'];
        } else {
            $postData['venlv_dataretiini'] = null;
        }

        if (isset($options['dataRetiradaFinal'])) {
            $postData['venlv_dataretifim'] = $options['dataRetiradaFinal'];
        } else {
            $postData['venlv_dataretifim'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['grupo'])) {
            $builder->set('venlv_grupo', $options['grupo']);
        }
        if (isset($options['horasValidade'])) {
            $builder->set('venlv_horasval', $options['horasValidade']);
        }
        if (isset($options['ativo'])) {
            $builder->set('venlv_ativo', $options['ativo']);
        }
        if (isset($options['dataValidadeInicial'])) {
            $builder->set('venlv_datavalini', $options['dataValidadeInicial']);
        }
        if (isset($options['dataValidadeFinal'])) {
            $builder->set('venlv_datavalfim', $options['dataValidadeFinal']);
        }
        if (isset($options['dataRetiradaInicial'])) {
            $builder->set('venlv_dataretiini', $options['dataRetiradaInicial']);
        }
        if (isset($options['dataRetiradaFinal'])) {
            $builder->set('venlv_dataretifim', $options['dataRetiradaFinal']);
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
     * @param VendaLivre $obj
     * @param AluguelCarrosFacade $facade
     * @return VendaLivre
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'grupo' => (is_object($obj->getGrupo())) ? $obj->getGrupo()->getId() : null,
            'horasValidade' => $obj->getHorasValidade(),
            'ativo' => ($obj->getAtivo()) ? '1' : '0',
            'dataValidadeInicial' => (is_object($obj->getDataValidadeInicial())) ? $obj->getDataValidadeInicial()->getDataHoraSql() : null,
            'dataValidadeFinal' => (is_object($obj->getDataValidadeFinal())) ? $obj->getDataValidadeFinal()->getDataHoraSql() : null,
            'dataRetiradaInicial' => (is_object($obj->getDataRetiradaInicial())) ? $obj->getDataRetiradaInicial()->getDataHoraSql() : null,
            'dataRetiradaFinal' => (is_object($obj->getDataRetiradaFinal())) ? $obj->getDataRetiradaFinal()->getDataHoraSql() : null
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $vndlv = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $vndlv = $this->insert($this->queryBuilderInsert($options));
        }
        return $vndlv;
    }

    /**
     * @param VendaLivre $obj
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