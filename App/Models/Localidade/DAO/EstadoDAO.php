<?php

namespace Carroaluguel\Models\Localidade\DAO;


use Carroaluguel\Models\Localidade\Estado;
use Carroaluguel\Models\Localidade\Pais;
use Carroaluguel\Models\LocalidadeFacade;
use Core\QueryBuilder;
use Core\Repository;

class EstadoDAO extends Repository
{
    protected $table = "estado";
    protected $primary_key = 'id_estado';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Estado($facade);
            $obj->setId($dados->id_estado)
                ->setNome($dados->nome_estado)
                ->setAbreviacao($dados->abr_estado)
                ->setPais($dados->pais_estado);
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
            if (isset($options['id_estado'])) {
                $builder->where("id_estado", $options['id_estado']);
            }

            if (isset($options['nome_estado'])) {
                $builder->like("nome_estado", $options['nome_estado']);
            }

            if (isset($options['abr_estado'])) {
                $builder->like("abr_estado", $options['abr_estado']);
            }

            if (isset($options['pais_estado'])) {
                $builder->like("pais_estado", $options['pais_estado']);
            }
        }

        if (isset($options['id'])) {
            $builder->where('id_estado', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('id_estado', $options['inId']);
        }
        if (isset($options['nome'])) {
            $builder->where('nome_estado', $options['nome']);
        }
        if (isset($options['abreviacao'])) {
            $builder->where_in('abr_estado', '"' . $options['abreviacao'] . '"');
        }
        if (isset($options['pais'])) {
            $builder->where('pais_estado', $options['pais']);
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
            $postData['nome_estado'] = $options['nome'];
        } else {
            $postData['nome_estado'] = null;
        }

        if (isset($options['abreviacao'])) {
            $postData['abr_estado'] = $options['abreviacao'];
        } else {
            $postData['abr_estado'] = null;
        }

        if (isset($options['pais'])) {
            $postData['pais_estado'] = $options['pais'];
        } else {
            $postData['pais_estado'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set("nome_estado", $options['nome']);
        }

        if (isset($options['abreviacao'])) {
            $builder->set("abr_estado", $options['abreviacao']);
        }

        if (isset($options['pais'])) {
            $builder->set("pais_estado", $options['pais']);
        }

        $builder->where("id_estado", $options['id']);

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
     * @param Estado $obj
     * @param LocalidadeFacade $facade
     * @return Estado
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'abreviacao' => $obj->getAbreviacao(),
            'pais' => (is_object($obj->getPais())) ? $obj->getPais()->getNome() : null
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $pais = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $pais = $this->insert($this->queryBuilderInsert($options));
        }
        return $pais;
    }

    /**
     * @param Estado $obj
     * @param LocalidadeFacade $facade
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