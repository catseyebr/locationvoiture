<?php

namespace Carroaluguel\Models\Utilizador\DAO;


use Carroaluguel\Models\Utilizador\Condutor;
use Carroaluguel\Models\UtilizadorFacade;
use Core\QueryBuilder;
use Core\Repository;

class CondutorDAO extends Repository
{
    protected $table = "r_condutor";
    protected $primary_key = 'id_condutor';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Condutor($facade);
            $obj->setId($dados->id_condutor)
                ->setCliente($dados->id_cliente)
                ->setNome($dados->nome_condutor)
                ->setSobrenome($dados->sobrenome_condutor)
                ->setRg($dados->rg_condutor)
                ->setCpf($dados->cpf_condutor)
                ->setCnh($dados->cnh_condutor)
                ->setValidadeCnh($dados->validade_cnh_condutor)
                ->setTipo($dados->tipo_condutor)
                ->setPassaporte($dados->passaporte_condutor)
                ->setCih($dados->cih_condutor)
                ->setValidadeCih($dados->validade_cih_condutor)
                ->setInativo($dados->inativo_condutor);
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
            if (isset($options['id_condutor'])) {
                $builder->where('id_condutor', $options['id_condutor']);
            }
            if (isset($options['id_cliente'])) {
                $builder->where('id_cliente', $options['id_cliente']);
            }
            if (isset($options['cpf_condutor'])) {
                $builder->where('cpf_condutor', $options['cpf_condutor']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('id_condutor', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('id_condutor', $options['inId']);
        }
        if (isset($options['cliente'])) {
            $builder->where('id_cliente', $options['cliente']);
        }
        if (isset($options['nome'])) {
            $builder->where('nome_condutor', $options['nome']);
        }
        if (isset($options['sobrenome'])) {
            $builder->where('sobrenome_condutor', $options['sobrenome']);
        }
        if (isset($options['rg'])) {
            $builder->where('rg_condutor', $options['rg']);
        }
        if (isset($options['cpf'])) {
            $builder->where('cpf_condutor', $options['cpf']);
        }
        if (isset($options['cnh'])) {
            $builder->where('cnh_condutor', $options['cnh']);
        }
        if (isset($options['validade_cnh'])) {
            $builder->where('validade_cnh_condutor', $options['validade_cnh']);
        }
        if (isset($options['tipo'])) {
            $builder->where('tipo_condutor', $options['tipo']);
        }
        if (isset($options['passaporte'])) {
            $builder->where('passaporte_condutor', $options['passaporte']);
        }
        if (isset($options['cih'])) {
            $builder->where('cih_condutor', $options['cih']);
        }
        if (isset($options['validade_cih'])) {
            $builder->where('validade_cih_condutor', $options['validade_cih']);
        }
        if (isset($options['old_id'])) {
            $builder->where('old_id', $options['old_id']);
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
        if (isset($options['id_cliente'])) {
            $postData['id_cliente'] = $options['id_cliente'];
        } else {
            $postData['id_cliente'] = null;
        }

        if (isset($options['nome_condutor'])) {
            $postData['nome_condutor'] = $options['nome_condutor'];
        } else {
            $postData['nome_condutor'] = null;
        }

        if (isset($options['sobrenome_condutor'])) {
            $postData['sobrenome_condutor'] = $options['sobrenome_condutor'];
        } else {
            $postData['sobrenome_condutor'] = null;
        }

        if (isset($options['rg_condutor'])) {
            $postData['rg_condutor'] = $options['rg_condutor'];
        } else {
            $postData['rg_condutor'] = null;
        }

        if (isset($options['cpf_condutor'])) {
            $postData['cpf_condutor'] = $options['cpf_condutor'];
        } else {
            $postData['cpf_condutor'] = null;
        }

        if (isset($options['cnh_condutor'])) {
            $postData['cnh_condutor'] = $options['cnh_condutor'];
        } else {
            $postData['cnh_condutor'] = null;
        }

        if (isset($options['validade_cnh_condutor'])) {
            $postData['validade_cnh_condutor'] = $options['validade_cnh_condutor'];
        } else {
            $postData['validade_cnh_condutor'] = null;
        }

        if (isset($options['tipo_condutor'])) {
            $postData['tipo_condutor'] = $options['tipo_condutor'];
        } else {
            $postData['tipo_condutor'] = null;
        }

        if (isset($options['passaporte_condutor'])) {
            $postData['passaporte_condutor'] = $options['passaporte_condutor'];
        } else {
            $postData['passaporte_condutor'] = null;
        }

        if (isset($options['cih_condutor'])) {
            $postData['cih_condutor'] = $options['cih_condutor'];
        } else {
            $postData['cih_condutor'] = null;
        }

        if (isset($options['validade_cih_condutor'])) {
            $postData['validade_cih_condutor'] = $options['validade_cih_condutor'];
        } else {
            $postData['validade_cih_condutor'] = null;
        }

        if (isset($options['old_id'])) {
            $postData['old_id'] = $options['old_id'];
        } else {
            $postData['old_id'] = null;
        }


        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['cliente'])) {
            $builder->set('id_cliente', $options['cliente']);
        }
        if (isset($options['nome'])) {
            $builder->set('nome_condutor', $options['nome']);
        }
        if (isset($options['sobrenome'])) {
            $builder->set('sobrenome_condutor', $options['sobrenome']);
        }
        if (isset($options['rg'])) {
            $builder->set('rg_condutor', $options['rg']);
        }
        if (isset($options['cpf'])) {
            $builder->set('cpf_condutor', $options['cpf']);
        }
        if (isset($options['cnh'])) {
            $builder->set('cnh_condutor', $options['cnh']);
        }
        if (isset($options['validade_cnh'])) {
            $builder->set('validade_cnh_condutor', $options['validade_cnh']);
        }
        if (isset($options['tipo'])) {
            $builder->set('tipo_condutor', $options['tipo']);
        }
        if (isset($options['passaporte'])) {
            $builder->set('passaporte_condutor', $options['passaporte']);
        }
        if (isset($options['cih'])) {
            $builder->set('cih_condutor', $options['cih']);
        }
        if (isset($options['validade_cih'])) {
            $builder->set('validade_cih_condutor', $options['validade_cih']);
        }
        if (isset($options['old_id'])) {
            $builder->set('old_id', $options['old_id']);
        }

        $builder->where("id_condutor", $options['id']);

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
     * @param Condutor $obj
     * @param UtilizadorFacade $facade
     * @return Condutor
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'id_cliente' => (is_object($obj->getCliente())) ? $obj->getCliente() : null,
            'nome_condutor' => $obj->getNome(),
            'sobrenome_condutor' => $obj->getSobrenome(),
            'rg_condutor' => $obj->getRg(),
            'cpf_condutor' => $obj->getCpf(),
            'cnh_condutor' => $obj->getCnh(),
            'validade_cnh_condutor' => $obj->getValidadeCnh(),
            'tipo_condutor' => $obj->getTipo(),
            'passaporte_condutor' => $obj->getPassaporte(),
            'cih_condutor' => $obj->getCih(),
            'validade_cih_condutor' => $obj->getValidadeCih(),
            'inativo_condutor' => ($obj->getInativo()) ? '1' : '0'
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $condutor = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $condutor = $this->insert($this->queryBuilderInsert($options));
        }
        return $condutor;
    }

    /**
     * @param Condutor $obj
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