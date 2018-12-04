<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\FeriadoLoja;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class FeriadoLojaDAO extends Repository
{
    protected $table = "tb_loja_feriado";
    protected $primary_key = 'lojferia_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new FeriadoLoja($facade);
            $obj->setId($dados->lojferia_id)
                ->setFeriado($dados->lojferia_feriado)
                ->setLoja($dados->lojferia_loja)
                ->setUsuario($dados->lojferia_usuario)
                ->setDataCadastro($dados->lojferia_dthcadastro);
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
            if (isset($options['lojferia_id'])) {
                $builder->where("lojferia_id", $options['lojferia_id']);
            }
            if (isset($options['lojferia_loja'])) {
                $builder->where("lojferia_loja", $options['lojferia_loja']);
            }
            if (isset($options['lojferia_feriado'])) {
                $builder->where("lojferia_feriado", $options['lojferia_feriado']);
            }
            if (isset($options['lojferia_usuario'])) {
                $builder->where("lojferia_usuario", $options['lojferia_usuario']);
            }
        }
        if (isset($options['data_feriado'])) {
            $builder->tableJoin('tb_feriado', 'tb_feriado.feria_id = tb_loja_feriado.lojferia_feriado', 'LEFT');
            $builder->where('tb_feriado.feria_data', $options['data_feriado']);
        }
        if (isset($options['id'])) {
            $builder->where('lojferia_id', $options['id']);
        }
        if (isset($options['loja'])) {
            $builder->where('lojferia_loja', $options['loja']);
        }
        if (isset($options['loja_in'])) {
            $builder->where_in('lojferia_loja', $options['loja_in']);
        }
        if (isset($options['feriado'])) {
            $builder->where('lojferia_feriado', $options['feriado']);
        }
        if (isset($options['usuario'])) {
            $builder->where('lojferia_usuario', $options['usuario']);
        }
        if (isset($options['dataCadastro'])) {
            $builder->where('lojferia_dthcadastro', $options['dataCadastro']);
        }
        if (isset($options['data_consulta'])) {
            $builder->tableJoin('tb_feriado', 'tb_feriado.feria_id = tb_loja_feriado.lojferia_feriado', 'LEFT');
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
        if (isset($options['loja'])) {
            $postData['lojferia_loja'] = $options['loja'];
        } else {
            $postData['lojferia_loja'] = null;
        }

        if (isset($options['feriado'])) {
            $postData['lojferia_feriado'] = $options['feriado'];
        } else {
            $postData['lojferia_feriado'] = null;
        }

        if (isset($options['usuario'])) {
            $postData['lojferia_usuario'] = $options['usuario'];
        } else {
            $postData['lojferia_usuario'] = null;
        }

        if (isset($options['dataCadastro'])) {
            $postData['lojferia_dthcadastro'] = $options['dataCadastro'];
        } else {
            $postData['lojferia_dthcadastro'] = date('Y-m-d H:i:s');
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['loja'])) {
            $builder->set('lojferia_loja', $options['loja']);
        }
        if (isset($options['feriado'])) {
            $builder->set('lojferia_feriado', $options['feriado']);
        }
        if (isset($options['usuario'])) {
            $builder->set('lojferia_usuario', $options['usuario']);
        }
        if (isset($options['dataCadastro'])) {
            $builder->set('lojferia_dthcadastro', $options['dataCadastro']);
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
     * @param FeriadoLoja $obj
     * @param AluguelCarrosFacade $facade
     * @return FeriadoLoja
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'loja' => (is_object($obj->getLoja())) ? $obj->getLoja()->getId() : null,
            'feriado' => (is_object($obj->getFeriado())) ? $obj->getFeriado()->getId() : null,
            'usuario' => (is_object($obj->getUsuario())) ? $obj->getUsuario()->getId() : null,
            'dataCadastro' => (is_object($obj->getDataCadastro())) ? $obj->getDataCadastro()->getDataHoraSql() : null,
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $ferloja = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $ferloja = $this->insert($this->queryBuilderInsert($options));
        }
        return $ferloja;
    }

    /**
     * @param FeriadoLoja $obj
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