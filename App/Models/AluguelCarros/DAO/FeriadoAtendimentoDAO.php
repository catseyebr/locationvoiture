<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\FeriadoAtendimento;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class FeriadoAtendimentoDAO extends Repository
{
    protected $table = "tb_atendimento_feriados";
    protected $primary_key = 'atendferia_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new FeriadoAtendimento($facade);
            $obj->setId($dados->atendferia_id)
                ->setLocadora($dados->atendferia_locadora)
                ->setFeriado($dados->atendferia_feriado)
                ->setLoja($dados->atendferia_loja)
                ->setUsuario($dados->atendferia_usuario)
                ->setDataCadastro($dados->atendferia_dthcadastro);
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
            if (isset($options['atendferia_id'])) {
                $builder->where("atendferia_id", $options['atendferia_id']);
            }
            if (isset($options['atendferia_loja'])) {
                $builder->where("atendferia_loja", $options['atendferia_loja']);
            }
            if (isset($options['atendferia_feriado'])) {
                $builder->where("atendferia_feriado", $options['atendferia_feriado']);
            }
            if (isset($options['atendferia_usuario'])) {
                $builder->where("atendferia_usuario", $options['atendferia_usuario']);
            }
        }
        if (isset($options['data_feriado'])) {
            $builder->tableJoin('tb_feriado', 'tb_feriado.feria_id = tb_atendimento_feriados.atendferia_feriado',
                'LEFT');
            $builder->where('tb_feriado.feria_data', $options['data_feriado']);
        }
        if (isset($options['id'])) {
            $builder->where('atendferia_id', $options['id']);
        }
        if (isset($options['locadora'])) {
            $builder->where('atendferia_locadora', $options['locadora']);
        }
        if (isset($options['locadora_in'])) {
            $builder->where_in('atendferia_locadora', $options['locadora_in']);
        }
        if (isset($options['feriado'])) {
            $builder->where('atendferia_feriado', $options['feriado']);
        }
        if (isset($options['loja'])) {
            $builder->like('atendferia_loja', $options['loja']);
        }
        if (isset($options['usuario'])) {
            $builder->where('atendferia_usuario', $options['usuario']);
        }
        if (isset($options['dataCadastro'])) {
            $builder->where('atendferia_dthcadastro', $options['dataCadastro']);
        }
        if (isset($options['data_consulta'])) {
            $builder->tableJoin('tb_feriado', 'tb_feriado.feria_id = tb_atendimento_feriados.atendferia_feriado',
                'LEFT');
            $builder->lower('tb_feriado.feria_data', "'" . $options['data_consulta'] . "'");
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
            $postData['atendferia_locadora'] = $options['locadora'];
        } else {
            $postData['atendferia_locadora'] = null;
        }

        if (isset($options['loja'])) {
            $postData['atendferia_loja'] = $options['loja'];
        } else {
            $postData['atendferia_loja'] = null;
        }

        if (isset($options['feriado'])) {
            $postData['atendferia_feriado'] = $options['feriado'];
        } else {
            $postData['atendferia_feriado'] = null;
        }

        if (isset($options['usuario'])) {
            $postData['atendferia_usuario'] = $options['usuario'];
        } else {
            $postData['atendferia_usuario'] = null;
        }

        if (isset($options['dataCadastro'])) {
            $postData['atendferia_dthcadastro'] = $options['dataCadastro'];
        } else {
            $postData['atendferia_dthcadastro'] = date('Y-m-d H:i:s');
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['locadora'])) {
            $builder->set('atendferia_locadora', $options['locadora']);
        }
        if (isset($options['feriado'])) {
            $builder->set('atendferia_feriado', $options['feriado']);
        }
        if (isset($options['usuario'])) {
            $builder->set('atendferia_usuario', $options['usuario']);
        }
        if (isset($options['dataCadastro'])) {
            $builder->set('atendferia_dthcadastro', $options['dataCadastro']);
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
     * @param FeriadoAtendimento $obj
     * @param AluguelCarrosFacade $facade
     * @return FeriadoAtendimento
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'locadora' => (is_object($obj->getLocadora())) ? $obj->getLocadora()->getId() : null,
            'loja' => (is_array($obj->getLoja())) ? implode(',', $obj->getLoja()) : null,
            'feriado' => (is_object($obj->getFeriado())) ? $obj->getFeriado()->getId() : null,
            'usuario' => (is_object($obj->getUsuario())) ? $obj->getUsuario()->getId() : null,
            'dataCadastro' => (is_object($obj->getDataCadastro())) ? $obj->getDataCadastro()->getDataHoraSql() : null,
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $feratend = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $feratend = $this->insert($this->queryBuilderInsert($options));
        }
        return $feratend;
    }

    /**
     * @param FeriadoAtendimento $obj
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