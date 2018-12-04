<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\Delivery;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class DeliveryDAO extends Repository
{
    protected $table = "tb_delivery";
    protected $primary_key = 'delivery_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Delivery($facade);
            $obj->setId($dados->id_categoria)
                ->setNome($dados->delivery_nome)
                ->setBairro($dados->delivery_bairro)
                ->setCidade($dados->delivery_cidade);
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
            if (isset($options['delivery_id'])) {
                $builder->where('delivery_id', $options['delivery_id']);
            }

            if (isset($options['delivery_nome'])) {
                $builder->like('delivery_nome', $options['delivery_nome']);
            }

            if (isset($options['delivery_bairro'])) {
                $builder->like('delivery_bairro', $options['delivery_bairro']);
            }

            if (isset($options['delivery_cidade_nome'])) {
                $builder->like('delivery_cidade_nome', $options['delivery_cidade_nome']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('delivery_id', $options['id']);
        }

        if (isset($options['nome'])) {
            $builder->like('delivery_nome', $options['nome']);
        }

        if (isset($options['bairro'])) {
            $builder->like('delivery_bairro', $options['bairro']);
        }

        if (isset($options['cidade'])) {
            $builder->where('delivery_cidade', $options['cidade']);
        }

        if (isset($options['cidade_nome'])) {
            $builder->like('delivery_cidade_nome', $options['delivery_cidade_nome']);
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
            $postData['delivery_nome'] = $options['nome'];
        } else {
            $postData['delivery_nome'] = null;
        }

        if (isset($options['bairro'])) {
            $postData['delivery_bairro'] = $options['bairro'];
        } else {
            $postData['delivery_bairro'] = null;
        }

        if (isset($options['cidade'])) {
            $postData['delivery_cidade'] = $options['cidade'];
        } else {
            $postData['delivery_cidade'] = null;
        }

        if (isset($options['cidade_nome'])) {
            $postData['delivery_cidade_nome'] = $options['cidade_nome'];
        } else {
            $postData['delivery_cidade_nome'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set('delivery_nome', $options['nome']);
        }
        if (isset($options['bairro'])) {
            $builder->set('delivery_bairro', $options['bairro']);
        }
        if (isset($options['cidade'])) {
            $builder->set('delivery_cidade', $options['cidade']);
        }
        if (isset($options['cidade_nome'])) {
            $builder->set('delivery_cidade_nome', $options['cidade_nome']);
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
     * @param Delivery $obj
     * @param AluguelCarrosFacade $facade
     * @return Delivery
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'bairro' => $obj->getBairro(),
            'cidade' => (is_object($obj->getCidade())) ? $obj->getCidade()->getId() : null,
            'cidade_nome' => (is_object($obj->getCidade())) ? $obj->getCidade()->getNome() : null,
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $delivery = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $delivery = $this->insert($this->queryBuilderInsert($options));
        }
        return $delivery;
    }

    /**
     * @param Delivery $obj
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