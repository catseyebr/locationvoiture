<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\Feriado;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class FeriadoDAO extends Repository
{
    protected $table = "tb_feriado";
    protected $primary_key = 'feria_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Feriado($facade);
            $obj->setId($dados->feria_id)
                ->setNome($dados->feria_nome)
                ->setDescricao($dados->feria_descricao)
                ->setAtendimento($dados->feria_atendimento)
                ->setData($dados->feria_data)
                ->setNacional($dados->feria_nacional)
                ->setLocal($dados->feria_local);
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
            if (isset($options['feria_id'])) {
                $builder->where("feria_id", $options['feria_id']);
            }

            if (isset($options['feria_nome'])) {
                $builder->like("feria_nome", $options['feria_nome']);
            }

            if (isset($options['feria_descricao'])) {
                $builder->like("feria_descricao", $options['feria_descricao']);
            }

            if (isset($options['feria_atendimento'])) {
                $builder->where("feria_atendimento", $options['feria_atendimento']);
            }

            if (isset($options['feria_data'])) {
                $builder->where("feria_data", $options['feria_data']);
            }

            if (isset($options['feria_nacional'])) {
                $builder->where("feria_nacional", $options['feria_nacional']);
            }

            if (isset($options['feria_local'])) {
                $builder->where("feria_local", $options['feria_local']);
            }
        }

        if (isset($options['id'])) {
            $builder->where("feria_id", $options['id']);
        }

        if (isset($options['nome'])) {
            $builder->like("feria_nome", $options['nome']);
        }

        if (isset($options['descricao'])) {
            $builder->like("feria_descricao", $options['descricao']);
        }

        if (isset($options['atendimento'])) {
            $builder->where("feria_atendimento", $options['atendimento']);
        }

        if (isset($options['data'])) {
            $builder->where("feria_data", $options['data']);
        }

        if (isset($options['nacional'])) {
            $builder->where("feria_nacional", $options['nacional']);
        }

        if (isset($options['local'])) {
            $builder->where("feria_local", $options['local']);
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
            $postData['feria_nome'] = $options['nome'];
        } else {
            $postData['feria_nome'] = null;
        }

        if (isset($options['descricao'])) {
            $postData['feria_descricao'] = $options['descricao'];
        } else {
            $postData['feria_descricao'] = null;
        }

        if (isset($options['atendimento'])) {
            $postData['feria_atendimento'] = $options['atendimento'];
        } else {
            $postData['feria_atendimento'] = null;
        }

        if (isset($options['data'])) {
            $postData['feria_data'] = $options['data'];
        } else {
            $postData['feria_data'] = null;
        }

        if (isset($options['nacional'])) {
            $postData['feria_nacional'] = $options['nacional'];
        } else {
            $postData['feria_nacional'] = null;
        }

        if (isset($options['local'])) {
            $postData['feria_local'] = $options['local'];
        } else {
            $postData['feria_local'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set("feria_nome", $options['nome']);
        }

        if (isset($options['descricao'])) {
            $builder->set("feria_descricao", $options['descricao']);
        }

        if (isset($options['atendimento'])) {
            $builder->set("feria_atendimento", $options['atendimento']);
        }

        if (isset($options['data'])) {
            $builder->set("feria_data", $options['data']);
        }

        if (isset($options['nacional'])) {
            $builder->set("feria_nacional", $options['nacional']);
        }

        if (isset($options['local'])) {
            $builder->set("feria_local", $options['local']);
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
     * @param Feriado $obj
     * @param AluguelCarrosFacade $facade
     * @return Feriado
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'descricao' => $obj->getDescricao(),
            'atendimento' => ($obj->getAtendimento()) ? '1' : '0',
            'data' => $obj->getData()->getDataSql(),
            'nacional' => ($obj->getNacional()) ? '1' : '0',
            'local' => $obj->getLocal()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $feriado = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $feriado = $this->insert($this->queryBuilderInsert($options));
        }
        return $feriado;
    }

    /**
     * @param Feriado $obj
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