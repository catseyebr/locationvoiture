<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\ContatoLojaAdmin;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class ContatoLojaAdminDAO extends Repository
{
    protected $table = "admin_loja_contato";
    protected $primary_key = 'alc_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new ContatoLojaAdmin($facade);
            $obj->setId($dados->alc_id)
                ->setLoja($dados->alc_loja)
                ->setNome($dados->alc_nome)
                ->setEmail($dados->alc_email)
                ->setCelular($dados->alc_celular)
                ->setAtivo(($dados->alc_ativo == 1) ? true : false);
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
            if (isset($options['alc_id'])) {
                $builder->where('alc_id', $options['alc_id']);
            }
            if (isset($options['alc_loja'])) {
                $builder->where('alc_loja', $options['alc_loja']);
            }
            if (isset($options['alc_nome'])) {
                $builder->where('alc_nome', $options['alc_nome']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('alc_id', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('alc_id', $options['inId']);
        }
        if (isset($options['loja'])) {
            $builder->where('alc_loja', $options['loja']);
        }
        if (isset($options['nome'])) {
            $builder->like('alc_nome', $options['nome']);
        }
        if (isset($options['email'])) {
            $builder->where('alc_email', $options['email']);
        }
        if (isset($options['celular'])) {
            $builder->where('alc_celular', $options['celular']);
        }
        if (isset($options['ativo'])) {
            $builder->where('alc_ativo', $options['ativo']);
        } else {
            $builder->where('alc_ativo', 1);
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
        if (isset($options['loja'])) {
            $postData['alc_loja'] = $options['loja'];
        } else {
            $postData['alc_loja'] = null;
        }

        if (isset($options['nome'])) {
            $postData['alc_nome'] = $options['nome'];
        } else {
            $postData['alc_nome'] = null;
        }

        if (isset($options['email'])) {
            $postData['alc_email'] = $options['email'];
        } else {
            $postData['alc_email'] = null;
        }

        if (isset($options['celular'])) {
            $postData['alc_celular'] = $options['celular'];
        } else {
            $postData['alc_celular'] = null;
        }

        if (isset($options['ativo'])) {
            $postData['alc_ativo'] = $options['ativo'];
        } else {
            $postData['alc_ativo'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['loja'])) {
            $builder->set('alc_loja', $options['loja']);
        }

        if (isset($options['nome'])) {
            $builder->set('alc_nome', $options['nome']);
        }

        if (isset($options['email'])) {
            $builder->set('alc_email', $options['email']);
        }

        if (isset($options['celular'])) {
            $builder->set('alc_celular', $options['celular']);
        }

        if (isset($options['ativo'])) {
            $builder->set('alc_ativo', $options['ativo']);
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
     * @param ContatoLojaAdmin $obj
     * @param AluguelCarrosFacade $facade
     * @return ContatoLojaAdmin
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'loja' => (is_object($obj->getLoja())) ? $obj->getLoja()->getId() : null,
            'nome' => $obj->getNome(),
            'email' => $obj->getEmail(),
            'celular' => $obj->getCelular(),
            'ativo' => ($obj->getAtivo()) ? 1 : 0,
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $contlj = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $contlj = $this->insert($this->queryBuilderInsert($options));
        }
        return $contlj;
    }

    /**
     * @param ContatoLojaAdmin $obj
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