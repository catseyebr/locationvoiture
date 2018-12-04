<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\TelefoneCidade;
use Carroaluguel\Models\AluguelCarros\TelefoneNumero;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class TelefoneCidadeDAO extends Repository
{
    protected $table = "tb_vono_cidades";
    protected $primary_key = 'vonocid_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new TelefoneCidade($facade);
            $obj->setId($dados->vonocid_id)
                ->setCidade($dados->vonocid_cidade);
            $numero = new TelefoneNumero();
            $numero->setId($dados->vononmb_id)
                ->setNomeCidade($dados->vononmb_cidade)
                ->setDdd($dados->vononmb_ddd)
                ->setCidade($dados->vononmb_id_cidade)
                ->setNumero($dados->vononmb_numero);
            $obj->setNumero($numero);
        }
        return $obj;
    }

    public function queryBuilder($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['count'])) {
            $builder->select('count(*)');
        }

        $builder->tableJoin('tb_vono_numeros', 'tb_vono_numeros.vononmb_id = tb_vono_cidades.vonocid_numero', 'LEFT');
        if (isset($options['admin'])) {
            if (isset($options['vonocid_id'])) {
                $builder->where('vonocid_id', $options['vonocid_id']);
            }
            if (isset($options['vonocid_cidade'])) {
                $builder->where('vonocid_cidade', $options['vonocid_cidade']);
            }
            if (isset($options['vonocid_numero'])) {
                $builder->like('vonocid_numero', $options['vonocid_numero']);
            }

        }
        if (isset($options['id'])) {
            $builder->where('vonocid_id', $options['id']);
        }

        if (isset($options['cidade'])) {
            $builder->where('vonocid_cidade', $options['cidade']);
        }

        if (isset($options['numero'])) {
            $builder->where('vonocid_numero', $options['numero']);
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
            $postData['vonocid_cidade'] = $options['cidade'];
        } else {
            $postData['vonocid_cidade'] = null;
        }

        if (isset($options['numero'])) {
            $postData['vonocid_numero'] = $options['numero'];
        } else {
            $postData['vonocid_numero'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['cidade'])) {
            $builder->set('vonocid_cidade', $options['cidade']);
        }

        if (isset($options['numero'])) {
            $builder->set('vonocid_numero', $options['numero']);
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
     * @param TelefoneCidade $obj
     * @param AluguelCarrosFacade $facade
     * @return TelefoneCidade
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'cidade' => (is_object($obj->getCidade())) ? $obj->getCidade()->getId() : null,
            'numero' => (is_object($obj->getNumero())) ? $obj->getNumero()->getId() : null,
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $telcid = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $telcid = $this->insert($this->queryBuilderInsert($options));
        }
        return $telcid;
    }

    /**
     * @param TelefoneCidade $obj
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