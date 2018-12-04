<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\CondutorGratis;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class CondutorGratisDAO extends Repository
{
    protected $table = "condutor_gratis";
    protected $primary_key = 'condgt_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new CondutorGratis($facade);
            $obj->setId($dados->condgt_id)
                ->setLocadora($dados->condgt_locadora)
                ->setLojas($dados->condgt_lojas)
                ->setAtivo(($dados->condgt_ativo == 1) ? true : false)
                ->setDataInicial($dados->condgt_datainicial)
                ->setDataFinal($dados->condgt_datafinal)
                ->setTexto($dados->condgt_texto)
                ->setTextoVoucher($dados->condgt_texto_voucher);
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
            if (isset($options['condgt_id'])) {
                $builder->where('condgt_id', $options['condgt_id']);
            }

            if (isset($options['condgt_locadora'])) {
                $builder->where('condgt_locadora', $options['condgt_locadora']);
            }

            if (isset($options['condgt_lojas'])) {
                $builder->where_in('condgt_lojas', $options['condgt_lojas']);
            }

            if (isset($options['condgt_ativo'])) {
                $builder->where('condgt_ativo', $options['condgt_ativo']);
            }

            if (isset($options['condgt_datainicial'])) {
                $builder->where('condgt_datainicial', $options['condgt_datainicial']);
            }

            if (isset($options['condgt_datafinal'])) {
                $builder->where('condgt_datafinal', $options['condgt_datafinal']);
            }

            if (isset($options['condgt_tipovalidade'])) {
                $builder->where('condgt_tipovalidade', $options['condgt_tipovalidade']);
            }
        }

        if (isset($options['id'])) {
            $builder->where('condgt_id', $options['id']);
        }

        if (isset($options['inId'])) {
            $builder->where_in('condgt_id', $options['inId']);
        }

        if (isset($options['locadora'])) {
            $builder->where('condgt_locadora', $options['locadora']);
        }

        if (isset($options['inLocadora'])) {
            $builder->where_in('condgt_locadora', $options['inLocadora']);
        }

        if (isset($options['lojas'])) {
            $builder->where_in('condgt_lojas', $options['lojas']);
        }

        if (isset($options['ativo'])) {
            $builder->where('condgt_ativo', $options['ativo']);
        }

        if (isset($options['dataInicial'])) {
            $builder->where('condgt_datainicial', $options['dataInicial']);
        }

        if (isset($options['dataFinal'])) {
            $builder->where('condgt_datafinal', $options['dataFinal']);
        }

        if (isset($options['data_consulta'])) {
            $builder->greater('condgt_datainicial', "'" . $options['data_consulta'] . "'");
            $builder->lower('condgt_datafinal', "'" . $options['data_consulta'] . "'");
        }

        if (isset($options['texto'])) {
            $builder->like('condgt_texto', $options['texto']);
        }

        if (isset($options['texto_voucher'])) {
            $builder->like('condgt_texto_voucher', $options['texto_voucher']);
        }

        if (isset($options['tipo_validade'])) {
            $builder->where('condgt_tipovalidade', $options['tipo_validade']);
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
            $postData['condgt_locadora'] = $options['locadora'];
        } else {
            $postData['condgt_locadora'] = null;
        }

        if (isset($options['lojas'])) {
            $postData['condgt_lojas'] = $options['lojas'];
        } else {
            $postData['condgt_lojas'] = null;
        }

        if (isset($options['ativo'])) {
            $postData['condgt_ativo'] = $options['ativo'];
        } else {
            $postData['condgt_ativo'] = null;
        }

        if (isset($options['dataInicial'])) {
            $postData['condgt_datainicial'] = $options['dataInicial'];
        } else {
            $postData['condgt_datainicial'] = null;
        }

        if (isset($options['dataFinal'])) {
            $postData['condgt_datafinal'] = $options['dataFinal'];
        } else {
            $postData['condgt_datafinal'] = null;
        }

        if (isset($options['texto'])) {
            $postData['condgt_texto'] = $options['texto'];
        } else {
            $postData['condgt_texto'] = null;
        }

        if (isset($options['texto_voucher'])) {
            $postData['condgt_texto_voucher'] = $options['texto_voucher'];
        } else {
            $postData['condgt_texto_voucher'] = null;
        }

        if (isset($options['tipo_validade'])) {
            $postData['condgt_tipovalidade'] = $options['tipo_validade'];
        } else {
            $postData['condgt_tipovalidade'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['locadora'])) {
            $builder->set('condgt_locadora', $options['locadora']);
        }

        if (isset($options['lojas'])) {
            $builder->set('condgt_lojas', $options['lojas']);
        }

        if (isset($options['ativo'])) {
            $builder->set('condgt_ativo', $options['ativo']);
        }

        if (isset($options['dataInicial'])) {
            $builder->set('condgt_datainicial', $options['dataInicial']);
        }

        if (isset($options['dataFinal'])) {
            $builder->set('condgt_datafinal', $options['dataFinal']);
        }

        if (isset($options['texto'])) {
            $builder->set('condgt_texto', $options['texto']);
        }

        if (isset($options['texto_voucher'])) {
            $builder->set('condgt_texto_voucher', $options['texto_voucher']);
        }

        if (isset($options['tipo_validade'])) {
            $builder->set('condgt_tipo_validade', $options['tipo_validade']);
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
     * @param CondutorGratis $obj
     * @param AluguelCarrosFacade $facade
     * @return CondutorGratis
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'locadora' => $obj->getLocadora(),
            'lojas' => $obj->getLojas(),
            'ativo' => ($obj->getAtivo()) ? '1' : '0',
            'dataInicial' => $obj->getDataInicial()->getDataHoraSql(),
            'dataFinal' => $obj->getDataFinal()->getDataHoraSql(),
            'texto' => $obj->getTexto(),
            'texto_voucher' => $obj->getTextoVoucher()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $condgt = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $condgt = $this->insert($this->queryBuilderInsert($options));
        }
        return $condgt;
    }

    /**
     * @param CondutorGratis $obj
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