<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\Delivery;
use Carroaluguel\Models\AluguelCarros\DeliveryLojas;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class DeliveryLojasDAO extends Repository
{
    protected $table = "tb_deliverylojas";
    protected $primary_key = 'delloja_delivery';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new DeliveryLojas($facade);
            $deli = new Delivery();
            $deli->setId($dados->delivery_id)
                ->setNome($dados->delivery_nome)
                ->setBairro($dados->delivery_bairro)
                ->setCidade($dados->delivery_cidade);
            $obj->setDelivery($deli)
                ->setValor($dados->delloja_valor)
                ->setDthCadastro($dados->delloja_dth_cadastro)
                ->setAtivo(($dados->delloja_ativo == '1') ? true : false)
                ->setLoja($dados->delloja_loja);
        }
        return $obj;
    }

    public function queryBuilder($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['count'])) {
            $builder->select('count(*)');
        }

        $builder->tableJoin('tb_delivery', 'tb_delivery.delivery_id = tb_deliverylojas.delloja_delivery', 'LEFT');
        if (isset($options['delivery'])) {
            $builder->where('delloja_delivery', $options['delivery']);
        }
        if (isset($options['loja'])) {
            $builder->where('delloja_loja', $options['loja']);
        }
        $builder->where('delloja_ativo', '1');
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
        if (isset($options['delivery'])) {
            $postData['delloja_delivery'] = $options['delivery'];

        } else {
            $postData['delloja_delivery'] = null;

        }
        if (isset($options['loja'])) {
            $postData['delloja_loja'] = $options['loja'];

        } else {
            $postData['delloja_loja'] = null;

        }
        if (isset($options['valor'])) {
            $postData['delloja_valor'] = $options['valor'];

        } else {
            $postData['delloja_valor'] = null;

        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['delivery'])) {
            $builder->set('delloja_delivery', $options['delivery']);
        }
        if (isset($options['loja'])) {
            $builder->set('delloja_loja', $options['loja']);
        }
        if (isset($options['valor'])) {
            $builder->set('delloja_valor', $options['valor']);
        }

        $builder->where($this->primary_key, $options['id']);
        $builder->where('delloja_loja', $options['loja']);

        $query = $builder->getQueryUpdate($this->table);

        return $query;
    }

    public function queryBuilderDelete($options)
    {
        $builder = new QueryBuilder();
        $builder->where($this->primary_key, $options['id']);
        $builder->where("delloja_loja", $options['loja']);
        $query = $builder->getQueryDelete($this->table);
        return $query;
    }

    /**
     * @param DeliveryLojas $obj
     * @param AluguelCarrosFacade $facade
     * @return DeliveryLojas
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'delivery' => (is_object($obj->getDelivery())) ? $obj->getDelivery()->getId() : null,
            'loja' => (is_object($obj->getLoja())) ? $obj->getLoja()->getId() : null,
            'valor' => $obj->getValor(),
            'ativo' => ($obj->getAtivo()) ? '1' : '0'
        ];
        if (is_object($obj->getDelivery()) && is_object($obj->getLoja())) {
            $options = [
                'id' => $obj->getDelivery()->getId(),
                'loja' => $obj->getLoja()->getId()
            ];
            $save = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $save = $this->insert($this->queryBuilderInsert($options));
        }
        return $save;
    }

    /**
     * @param DeliveryLojas $obj
     * @param AluguelCarrosFacade $facade
     * @return bool
     */
    public function delete($obj, $facade = null)
    {
        $del = false;
        if ($obj->getDelivery()->getId()) {
            $options = [
                'id' => $obj->getDelivery()->getId(),
                'loja' => $obj->getLoja()->getId()
            ];
            $del = $this->purge($this->queryBuilderDelete($options));
        }
        return $del;
    }
}