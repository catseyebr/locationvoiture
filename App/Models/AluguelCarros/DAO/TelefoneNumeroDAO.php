<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\TelefoneNumero;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class TelefoneNumeroDAO extends Repository
{
    protected $table = "tb_vono_numeros";
    protected $primary_key = 'vononmb_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new TelefoneNumero($facade);
            $obj->setId($dados->vononmb_id)
                ->setNomeCidade($dados->vononmb_cidade)
                ->setDdd($dados->vononmb_ddd)
                ->setCidade($dados->vononmb_id_cidade)
                ->setNumero($dados->vononmb_numero);
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
            if (isset($options['vononmb_id'])) {
                $builder->where('vononmb_id', $options['vononmb_id']);
            }
            if (isset($options['vononmb_cidade'])) {
                $builder->like('vononmb_cidade', $options['vononmb_cidade']);
            }
            if (isset($options['vononmb_ddd'])) {
                $builder->where('vononmb_ddd', $options['vononmb_ddd']);
            }

        }
        if (isset($options['id'])) {
            $builder->where('vononmb_id', $options['id']);
        }

        if (isset($options['cidade'])) {
            $builder->like('vononmb_cidade', $options['cidade']);
        }

        if (isset($options['ddd'])) {
            $builder->where('vononmb_ddd', $options['ddd']);
        }

        if (isset($options['numero'])) {
            $builder->where('vononmb_numero', $options['numero']);
        }

        if (isset($options['id_cidade'])) {
            $builder->where('vononmb_id_cidade', $options['id_cidade']);
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
            $postData['vononmb_cidade'] = $options['cidade'];
        } else {
            $postData['vononmb_cidade'] = null;
        }

        if (isset($options['ddd'])) {
            $postData['vononmb_ddd'] = $options['ddd'];
        } else {
            $postData['vononmb_ddd'] = null;
        }

        if (isset($options['numero'])) {
            $postData['vononmb_numero'] = $options['numero'];
        } else {
            $postData['vononmb_numero'] = null;
        }

        if (isset($options['id_cidade'])) {
            $postData['vononmb_id_cidade'] = $options['id_cidade'];
        } else {
            $postData['vononmb_id_cidade'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['cidade'])) {
            $builder->set('vononmb_cidade', $options['cidade']);
        }

        if (isset($options['ddd'])) {
            $builder->set('vononmb_ddd', $options['ddd']);
        }

        if (isset($options['numero'])) {
            $builder->set('vononmb_numero', $options['numero']);
        }

        if (isset($options['id_cidade'])) {
            $builder->set('vononmb_id_cidade', $options['id_cidade']);
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
     * @param TelefoneNumero $obj
     * @param AluguelCarrosFacade $facade
     * @return TelefoneNumero
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome_cidade' => $obj->getNomeCidade(),
            'ddd' => $obj->getDdd(),
            'cidade' => (is_object($obj->getCidade())) ? $obj->getCidade()->getId() : null,
            'numero' => $obj->getNumero()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $telnumb = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $telnumb = $this->insert($this->queryBuilderInsert($options));
        }
        return $telnumb;
    }

    /**
     * @param TelefoneNumero $obj
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