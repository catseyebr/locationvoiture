<?php

namespace Carroaluguel\Models\Utilizador\DAO;


use Carroaluguel\Models\Utilizador\Contato;
use Carroaluguel\Models\UtilizadorFacade;
use Core\QueryBuilder;
use Core\Repository;

class ContatoDAO extends Repository
{
    protected $table = "tb_contato";
    protected $primary_key = 'con_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Contato($facade);
            $obj->setId($dados->con_id)
                ->setValue($dados->con_value)
                ->setUsuario($dados->con_pessoa)
                ->setTipoContato($dados->con_tipo);
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
            if (isset($options['con_id'])) {
                $builder->where('con_id', $options['con_id']);
            }
            if (isset($options['con_user'])) {
                $builder->where('con_user', $options['con_user']);
            }
            if (isset($options['con_tipo'])) {
                $builder->where('con_tipo', $options['con_tipo']);
            }
            if (isset($options['con_value'])) {
                $builder->like('con_value', $options['con_value']);
            }
        }
        if (isset($options['id'])) {
            $builder->where("con_id", $options['id']);
        }

        if (isset($options['usuario'])) {
            $builder->where("con_user", $options['usuario']);
        }

        if (isset($options['tipo'])) {
            $builder->where("con_tipo", $options['tipo']);
        }

        if (isset($options['value'])) {
            $builder->like("con_value", $options['value']);
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

        if (isset($options['value'])) {
            $postData['con_value'] = $options['value'];
        } else {
            $postData['con_value'] = null;
        }

        if (isset($options['tipo'])) {
            $postData['con_tipo'] = $options['tipo'];
        } else {
            $postData['con_tipo'] = null;
        }

        if (isset($options['usuario'])) {
            $postData['con_user'] = $options['usuario'];
        } else {
            $postData['con_user'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['value'])) {
            $builder->set('con_value', $options['value']);
        }

        if (isset($options['tipo'])) {
            $builder->set('con_tipo', $options['tipo']);
        }

        if (isset($options['usuario'])) {
            $builder->set('con_user', $options['usuario']);
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
     * @param Contato $obj
     * @param UtilizadorFacade $facade
     * @return Contato
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'value' => $obj->getValue(),
            'tipo' => (is_object($obj->getTipoContato())) ? $obj->getTipoContato()->getId() : null,
            'usuario' => (is_object($obj->getUsuario())) ? $obj->getUsuario()->getId() : null,
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $save = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $save = $this->insert($this->queryBuilderInsert($options));
        }
        return $save;
    }

    /**
     * @param Contato $obj
     * @param UtilizadorFacade $facade
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