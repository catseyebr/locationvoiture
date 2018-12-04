<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\ConsultaCpf;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class ConsultaCpfDAO extends Repository
{
    protected $table = "tb_cpfdata";
    protected $primary_key = 'cpfdata_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new ConsultaCpf($facade);
            $obj->setId($dados->cpfdata_id)
                ->setCpf($dados->cpfdata_cpf)
                ->setDados($dados->cpfdata_data)
                ->setDataConsulta($dados->cpfdata_datetime)
                ->setTempoConsulta($dados->cpfdata_timequery);
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
            if (isset($options['cpfdata_id'])) {
                $builder->where('cpfdata_id', $options['cpfdata_id']);
            }
            if (isset($options['cpfdata_cpf'])) {
                $builder->like('cpfdata_cpf', $options['cpfdata_cpf']);
            }
            if (isset($options['cpfdata_datetime'])) {
                $builder->where('cpfdata_datetime', $options['cpfdata_datetime']);
            }

        }
        if (isset($options['id'])) {
            $builder->where('cpfdata_id', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('cpfdata_id', $options['inId']);
        }
        if (isset($options['cpf'])) {
            $builder->where('cpfdata_cpf', $options['cpf']);
        }
        if (isset($options['inCpf'])) {
            $builder->where_in('cpfdata_cpf', $options['inCpf']);
        }
        if (isset($options['dados'])) {
            $builder->like('cpfdata_data', $options['cpfdata_data']);
        }
        if (isset($options['dataConsulta'])) {
            $builder->where('cpfdata_datetime', $options['dataConsulta']);
        }
        if (isset($options['tempoConsulta'])) {
            $builder->like('cpfdata_timequery', $options['tempoConsulta']);
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
        if (isset($options['cpf'])) {
            $postData['cpfdata_cpf'] = $options['cpf'];
        } else {
            $postData['cpfdata_cpf'] = null;
        }

        if (isset($options['dados'])) {
            $postData['cpfdata_data'] = $options['dados'];
        } else {
            $postData['cpfdata_data'] = null;
        }

        if (isset($options['dataConsulta'])) {
            $postData['cpfdata_datetime'] = $options['dataConsulta'];
        } else {
            $postData['cpfdata_datetime'] = null;
        }

        if (isset($options['tempoConsulta'])) {
            $postData['cpfdata_timequery'] = $options['tempoConsulta'];
        } else {
            $postData['cpfdata_timequery'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['cpf'])) {
            $builder->set('cpfdata_cpf', $options['cpf']);
        }
        if (isset($options['dados'])) {
            $builder->set('cpfdata_data', $options['dados']);
        }
        if (isset($options['dataConsulta'])) {
            $builder->set('cpfdata_datetime', $options['dataConsulta']);
        }
        if (isset($options['tempoConsulta'])) {
            $builder->set('cpfdata_timequery', $options['tempoConsulta']);
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
     * @param ConsultaCpf $obj
     * @param AluguelCarrosFacade $facade
     * @return ConsultaCpf
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'cpf' => $obj->getCpf(),
            'dados' => $obj->getDadosEncript(),
            'dataConsulta' => $obj->getDataConsulta()->getDataHoraSql(),
            'tempoConsulta' => $obj->getTempoConsulta()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $consultacpf = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $consultacpf = $this->insert($this->queryBuilderInsert($options));
        }
        return $consultacpf;
    }

    /**
     * @param ConsultaCpf $obj
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