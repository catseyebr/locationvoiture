<?php

namespace Carroaluguel\Models\Localidade\DAO;


use Carroaluguel\Models\Localidade\Bairro;
use Carroaluguel\Models\LocalidadeFacade;
use Core\QueryBuilder;
use Core\Repository;

class BairroDAO extends Repository
{
    protected $table = "bairro";
    protected $primary_key = 'bairro_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Bairro($facade);
            $obj->setId($dados->bairro_id)
                ->setNome($dados->bairro_nome)
                ->setCidade($dados->bairro_id_cidade)
                ->setAbreviacao($dados->bairro_abr);
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
            $builder->tableJoin('cidade', 'cidade.id_cidade = bairro.bairro_id_cidade', 'LEFT');
            $builder->tableJoin('estado', 'estado.id_estado = cidade.estado_cidade', 'LEFT');

            if (isset($options['bairro_id'])) {
                $builder->where("bairro_id", $options['bairro_id']);
            }

            if (isset($options['bairro_nome'])) {
                $builder->like("bairro_nome", $options['bairro_nome']);
            }

            if (isset($options['nome_cidade'])) {
                $builder->like("nome_cidade", $options['nome_cidade']);
            }

            if (isset($options['abr_estado'])) {
                $builder->like("abr_estado", $options['abr_estado']);
            }

            if (isset($options['bairro_abr'])) {
                $builder->like("bairro_abr", $options['bairro_abr']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('bairro_id', $options['id']);
        }

        if (isset($options['inId'])) {
            $builder->where_in('bairro_id', $options['inId']);
        }

        if (isset($options['cidade'])) {
            $builder->where('bairro_id_cidade', $options['cidade']);
        }

        if (isset($options['nome'])) {
            $builder->where('bairro_nome', $options['nome']);
        }

        if (isset($options['abreviacao'])) {
            $builder->where('bairro_abr', $options['abreviacao']);
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
        if (isset($options['cidade'])) {
            $postData['bairro_cidade'] = $options['cidade'];
        } else {
            $postData['bairro_cidade'] = null;
        }

        if (isset($options['nome'])) {
            $postData['bairro_nome'] = $options['nome'];
        } else {
            $postData['bairro_nome'] = null;
        }

        if (isset($options['abreviacao'])) {
            $postData['bairro_abr'] = $options['abreviacao'];
        } else {
            $postData['bairro_abr'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['cidade'])) {
            $builder->set("bairro_cidade", $options['cidade']);
        }

        if (isset($options['nome'])) {
            $builder->set("bairro_nome", $options['nome']);
        }

        if (isset($options['abreviacao'])) {
            $builder->set("bairro_abr", $options['abreviacao']);
        }

        $builder->where("bairro_id", $options['id']);

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
     * @param Bairro $obj
     * @param LocalidadeFacade $facade
     * @return Bairro
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'cidade' => $obj->getCidade()->getId(),
            'nome' => $obj->getNome(),
            'abreviacao' => $obj->getAbreviacao()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $bairro = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $bairro = $this->insert($this->queryBuilderInsert($options));
        }
        return $bairro;
    }

    /**
     * @param Bairro $obj
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