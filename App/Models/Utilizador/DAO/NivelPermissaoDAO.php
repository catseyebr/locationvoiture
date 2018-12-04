<?php

namespace Carroaluguel\Models\Utilizador\DAO;

use Carroaluguel\Models\Utilizador\NivelPermissao;
use Carroaluguel\Models\UtilizadorFacade;
use Core\QueryBuilder;
use Core\Repository;

class NivelPermissaoDAO extends Repository
{
    protected $table = "tb_nivelpermissao";
    protected $primary_key = 'nivperm_nivel';
    protected $secondary_key = 'nivperm_permissao';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new NivelPermissao($facade);
            $obj->setNivel($dados->nivperm_nivel)
                ->setPermissao($dados->nivperm_permissao);
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
            if (isset($options['nivperm_nivel'])) {
                $builder->where('nivperm_nivel', $options['nivperm_nivel']);
            }
            if (isset($options['nivperm_permissao'])) {
                $builder->where('nivperm_permissao', $options['nivperm_permissao']);
            }
        }

        if (isset($options['nivel'])) {
            $builder->where('nivperm_nivel', $options['nivel']);
        }
        if (isset($options['permissao'])) {
            $builder->where('nivperm_permissao', $options['permissao']);
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

        if (isset($options['nivel'])) {
            $postData['nivperm_nivel'] = $options['nivel'];
        } else {
            $postData['nivperm_nivel'] = null;
        }

        if (isset($options['permissao'])) {
            $postData['nivperm_permissao'] = $options['permissao'];
        } else {
            $postData['nivperm_permissao'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['nivel'])) {
            $builder->set('niv_nome', $options['nivel']);
        }

        if (isset($options['permissao'])) {
            $builder->set('nivperm_permissao', $options['permissao']);
        }

        $builder->where($this->primary_key, $options['nivel']);
        $builder->where($this->secondary_key, $options['permissao']);

        $query = $builder->getQueryUpdate($this->table);

        return $query;
    }

    public function queryBuilderDelete($options)
    {
        $builder = new QueryBuilder();
        $builder->where($this->primary_key, $options['nivel']);
        $builder->where($this->secondary_key, $options['permissao']);
        $query = $builder->getQueryDelete($this->table);
        return $query;
    }

    /**
     * @param NivelPermissao $obj
     * @param UtilizadorFacade $facade
     * @return NivelPermissao
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nivel' => (is_object($obj->getNivel())) ? $obj->getNivel() : null,
            'permissao' => (is_object($obj->getPermissao())) ? $obj->getPermissao() : null,
        ];
        if ($obj->getNivel() && $obj->getPermissao()) {
            $save = $this->update($this->queryBuilderUpdate($options), $options['nivel'], $options);
        } else {
            $save = $this->insert($this->queryBuilderInsert($options));
        }
        return $save;
    }

    /**
     * @param NivelPermissao $obj
     * @param UtilizadorFacade $facade
     * @return bool
     */
    public function delete($obj, $facade = null)
    {
        $del = false;
        if ($obj->getNivel() && $obj->getPermissao()) {
            $options = [
                'nivel' => (is_object($obj->getNivel())) ? $obj->getNivel() : null,
                'permissao' => (is_object($obj->getPermissao())) ? $obj->getPermissao() : null,
            ];
            $del = $this->purge($this->queryBuilderDelete($options));
        }
        return $del;
    }
}