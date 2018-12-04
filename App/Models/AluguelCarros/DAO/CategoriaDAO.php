<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\Categoria;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class CategoriaDAO extends Repository
{
    protected $table = "loc_categoria";
    protected $primary_key = 'id_categoria';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Categoria($facade);
            $obj->setId($dados->id_categoria)
                ->setNome($dados->nome_categoria)
                ->setDescricao($dados->descricao)
                ->setOrdem($dados->ordem_categoria)
                ->setMetaTitle($dados->meta_title)
                ->setMetaDescription($dados->meta_description)
                ->setMetaKeywords($dados->meta_keywords)
                ->setTexto($dados->lt_desc_categoria)
                ->setH1($dados->h1_categoria);
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
            if (isset($options['id_categoria'])) {
                $builder->where('id_categoria', $options['id_categoria']);
            }
            if (isset($options['descricao'])) {
                $builder->like('descricao', $options['descricao']);
            }
            if (isset($options['ordem_categoria'])) {
                $builder->where('ordem_categoria', $options['ordem_categoria']);
            }

        }
        if (isset($options['id'])) {
            $builder->where('id_categoria', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('id_categoria', $options['inId']);
        }
        if (isset($options['nome'])) {
            $builder->where('nome_categoria', $options['nome']);
        }
        if (isset($options['inNome'])) {
            $builder->where_in('nome_categoria', $options['inNome']);
        }
        if (isset($options['descricao'])) {
            $builder->like('descricao', $options['descricao']);
        }
        if (isset($options['ordem'])) {
            $builder->where('ordem_categoria', $options['ordem']);
        }
        if (isset($options['metaTitle'])) {
            $builder->like('meta_title', $options['metaTitle']);
        }
        if (isset($options['metaDescription'])) {
            $builder->like('meta_description', $options['metaDescription']);
        }
        if (isset($options['metaKeywords'])) {
            $builder->like('meta_keywords', $options['metaKeywords']);
        }
        if (isset($options['txtDescricao'])) {
            $builder->like('lt_desc_categoria', $options['txtDescricao']);
        }
        if (isset($options['h1'])) {
            $builder->like('h1_categoria', $options['h1']);
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
            $postData['nome_categoria'] = $options['nome'];
        } else {
            $postData['nome_categoria'] = null;
        }

        if (isset($options['descricao'])) {
            $postData['descricao'] = $options['descricao'];
        } else {
            $postData['descricao'] = null;
        }

        if (isset($options['ordem'])) {
            $postData['ordem_categoria'] = $options['ordem'];
        } else {
            $postData['ordem_categoria'] = null;
        }

        if (isset($options['metaTitle'])) {
            $postData['meta_title'] = $options['metaTitle'];
        } else {
            $postData['meta_title'] = null;
        }

        if (isset($options['metaDescription'])) {
            $postData['meta_description'] = $options['metaDescription'];
        } else {
            $postData['meta_description'] = null;
        }

        if (isset($options['metaKeywords'])) {
            $postData['meta_keywords'] = $options['metaKeywords'];
        } else {
            $postData['meta_keywords'] = null;
        }

        if (isset($options['txtDescricao'])) {
            $postData['lt_desc_categoria'] = $options['txtDescricao'];
        } else {
            $postData['lt_desc_categoria'] = null;
        }

        if (isset($options['h1'])) {
            $postData['h1_categoria'] = $options['h1'];
        } else {
            $postData['h1_categoria'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set('nome_categoria', $options['nome']);
        }
        if (isset($options['descricao'])) {
            $builder->set('descricao', $options['descricao']);
        }
        if (isset($options['ordem'])) {
            $builder->set('ordem_categoria', $options['ordem']);
        }
        if (isset($options['metaTitle'])) {
            $builder->set('meta_title', $options['metaTitle']);
        }
        if (isset($options['metaDescription'])) {
            $builder->set('meta_description', $options['metaDescription']);
        }
        if (isset($options['metaKeywords'])) {
            $builder->set('meta_keywords', $options['metaKeywords']);
        }
        if (isset($options['txtDescricao'])) {
            $builder->set('lt_desc_categoria', $options['txtDescricao']);
        }
        if (isset($options['h1'])) {
            $builder->set('h1_categoria', $options['h1']);
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
     * @param Categoria $obj
     * @param AluguelCarrosFacade $facade
     * @return Categoria
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'descricao' => $obj->getDescricao(),
            'ordem' => $obj->getOrdem(),
            'metaTitle' => $obj->getMetaTitle(),
            'metaDescription' => $obj->getMetaDescription(),
            'metaKeywords' => $obj->getMetaKeywords(),
            'txtDescricao' => $obj->getTexto(),
            'h1' => $obj->getH1()
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
     * @param Categoria $obj
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