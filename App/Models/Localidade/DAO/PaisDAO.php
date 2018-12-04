<?php

namespace Carroaluguel\Models\Localidade\DAO;


use Carroaluguel\Models\Localidade\Pais;
use Carroaluguel\Models\LocalidadeFacade;
use Core\QueryBuilder;
use Core\Repository;

class PaisDAO extends Repository
{
    protected $table = "paises";
    protected $primary_key = 'pais_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Pais($facade);
            $obj->setId($dados->pais_id)
                ->setNome($dados->pais_nome)
                ->setIso($dados->pais_iso)
                ->setTld($dados->pais_tld)
                ->setContinente($dados->pais_continente);
        }
        return $obj;
    }

    public function queryBuilder($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['count'])) {
            $builder->select('count(*)');
        }

        if (isset($options['id'])) {
            $builder->where('pais_id', $options['id']);
        }

        if (isset($options['inId'])) {
            $builder->where_in('pais_id', $options['inId']);
        }

        if (isset($options['nome'])) {
            $builder->where('pais_nome', $options['nome']);
        }

        if (isset($options['iso'])) {
            $builder->where('pais_iso', $options['iso']);
        }

        if (isset($options['tld'])) {
            $builder->where('pais_tld', $options['tld']);
        }

        if (isset($options['continente'])) {
            $builder->where('pais_continente', $options['continente']);
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
            $postData['pais_nome'] = $options['nome'];
        } else {
            $postData['pais_nome'] = null;
        }

        if (isset($options['iso'])) {
            $postData['pais_iso'] = $options['iso'];
        } else {
            $postData['pais_iso'] = null;
        }

        if (isset($options['tld'])) {
            $postData['pais_tld'] = $options['tld'];
        } else {
            $postData['pais_tld'] = null;
        }

        if (isset($options['continente'])) {
            $postData['pais_continente'] = $options['continente'];
        } else {
            $postData['pais_continente'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set("pais_nome", $options['nome']);
        }

        if (isset($options['iso'])) {
            $builder->set("pais_iso", $options['iso']);
        }

        if (isset($options['tld'])) {
            $builder->set("pais_tld", $options['tld']);
        }

        if (isset($options['continente'])) {
            $builder->set("pais_continente", $options['continente']);
        }

        $builder->where("pais_id", $options['id']);

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
     * @param Pais $obj
     * @param LocalidadeFacade $facade
     * @return Pais
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'iso' => $obj->getIso(),
            'tld' => $obj->getTld(),
            'continente' => $obj->getContinente()
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
     * @param Pais $obj
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