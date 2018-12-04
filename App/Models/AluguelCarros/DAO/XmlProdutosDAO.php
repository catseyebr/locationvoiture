<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\XmlProdutos;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class XmlProdutosDAO extends Repository
{
    protected $table = "xml_produtos";
    protected $primary_key = 'xmlprod_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new XmlProdutos($facade);
            $obj->setId($dados->xmlprod_id)
                ->setCategoria($dados->xmlprod_categoria)
                ->setLocadora($dados->xmlprod_locadora)
                ->setNomeLocadora($dados->xmlprod_nomelocadora)
                ->setCidade($dados->xmlprod_cidade)
                ->setNomeCidade($dados->xmlprod_nomecidade)
                ->setGrupo($dados->xmlprod_grupo)
                ->setIdGrupo($dados->xmlprod_idgrupo)
                ->setNomeGrupo($dados->xmlprod_nomegrupo)
                ->setBigImage($dados->xmlprod_bigimage)
                ->setSmallImage($dados->xmlprod_smallimage)
                ->setUrl($dados->xmlprod_producturl)
                ->setValor($dados->xmlprod_valor)
                ->setDescricao($dados->xmlprod_description)
                ->setCategory1($dados->xmlprod_categoryid1)
                ->setCategory2($dados->xmlprod_categoryid2)
                ->setData($dados->xmlprod_data);
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
            if (isset($options['xmlprod_id'])) {
                $builder->where('xmlprod_id', $options['xmlprod_id']);
            }
            if (isset($options['xmlprod_categoria'])) {
                $builder->where('xmlprod_categoria', $options['xmlprod_categoria']);
            }
            if (isset($options['xmlprod_locadora'])) {
                $builder->where('xmlprod_locadora', $options['xmlprod_locadora']);
            }
            if (isset($options['xmlprod_nomelocadora'])) {
                $builder->like('xmlprod_nomelocadora', $options['xmlprod_nomelocadora']);
            }
            if (isset($options['xmlprod_cidade'])) {
                $builder->where('xmlprod_cidade', $options['xmlprod_cidade']);
            }
            if (isset($options['xmlprod_nomecidade'])) {
                $builder->like('xmlprod_nomecidade', $options['xmlprod_nomecidade']);
            }
            if (isset($options['xmlprod_grupo'])) {
                $builder->where('xmlprod_grupo', $options['xmlprod_grupo']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('xmlprod_id', $options['id']);
        }
        if (isset($options['categoria'])) {
            $builder->where('xmlprod_categoria', $options['categoria']);
        }
        if (isset($options['locadora'])) {
            $builder->where('xmlprod_locadora', $options['locadora']);
        }
        if (isset($options['nomelocadora'])) {
            $builder->like('xmlprod_nomelocadora', $options['nomelocadora']);
        }
        if (isset($options['cidade'])) {
            $builder->where('xmlprod_cidade', $options['cidade']);
        }
        if (isset($options['nomecidade'])) {
            $builder->like('xmlprod_nomecidade', $options['nomecidade']);
        }
        if (isset($options['grupo'])) {
            $builder->where('xmlprod_grupo', $options['grupo']);
        }
        if (isset($options['idgrupo'])) {
            $builder->like('xmlprod_idgrupo', $options['idgrupo']);
        }
        if (isset($options['nomegrupo'])) {
            $builder->like('xmlprod_nomegrupo', $options['nomegrupo']);
        }
        if (isset($options['bigimage'])) {
            $builder->like('xmlprod_bigimage', $options['bigimage']);
        }
        if (isset($options['smallimage'])) {
            $builder->like('xmlprod_smallimage', $options['smallimage']);
        }
        if (isset($options['producturl'])) {
            $builder->like('xmlprod_producturl', $options['producturl']);
        }
        if (isset($options['valor'])) {
            $builder->like('xmlprod_valor', $options['valor']);
        }
        if (isset($options['description'])) {
            $builder->like('xmlprod_description', $options['description']);
        }
        if (isset($options['categoryid1'])) {
            $builder->like('xmlprod_categoryid1', $options['categoryid1']);
        }
        if (isset($options['categoryid2'])) {
            $builder->like('xmlprod_categoryid2', $options['categoryid2']);
        }
        if (isset($options['data'])) {
            $builder->where('xmlprod_data', $options['data']);
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
        if (isset($options['categoria'])) {
            $postData['xmlprod_categoria'] = $options['categoria'];
        } else {
            $postData['xmlprod_categoria'] = null;
        }

        if (isset($options['locadora'])) {
            $postData['xmlprod_locadora'] = $options['locadora'];
        } else {
            $postData['xmlprod_locadora'] = null;
        }

        if (isset($options['nomelocadora'])) {
            $postData['xmlprod_nomelocadora'] = $options['nomelocadora'];
        } else {
            $postData['xmlprod_nomelocadora'] = null;
        }

        if (isset($options['cidade'])) {
            $postData['xmlprod_cidade'] = $options['cidade'];
        } else {
            $postData['xmlprod_cidade'] = null;
        }

        if (isset($options['nomecidade'])) {
            $postData['xmlprod_nomecidade'] = $options['nomecidade'];
        } else {
            $postData['xmlprod_nomecidade'] = null;
        }

        if (isset($options['grupo'])) {
            $postData['xmlprod_grupo'] = $options['grupo'];
        } else {
            $postData['xmlprod_grupo'] = null;
        }

        if (isset($options['idgrupo'])) {
            $postData['xmlprod_idgrupo'] = $options['idgrupo'];
        } else {
            $postData['xmlprod_idgrupo'] = null;
        }

        if (isset($options['nomegrupo'])) {
            $postData['xmlprod_nomegrupo'] = $options['nomegrupo'];
        } else {
            $postData['xmlprod_nomegrupo'] = null;
        }

        if (isset($options['bigimage'])) {
            $postData['xmlprod_bigimage'] = $options['bigimage'];
        } else {
            $postData['xmlprod_bigimage'] = null;
        }

        if (isset($options['smallimage'])) {
            $postData['xmlprod_smallimage'] = $options['smallimage'];
        } else {
            $postData['xmlprod_smallimage'] = null;
        }

        if (isset($options['producturl'])) {
            $postData['xmlprod_producturl'] = $options['producturl'];
        } else {
            $postData['xmlprod_producturl'] = null;
        }

        if (isset($options['valor'])) {
            $postData['xmlprod_valor'] = $options['valor'];
        } else {
            $postData['xmlprod_valor'] = null;
        }

        if (isset($options['description'])) {
            $postData['xmlprod_description'] = $options['description'];
        } else {
            $postData['xmlprod_description'] = null;
        }

        if (isset($options['categoryid1'])) {
            $postData['xmlprod_categoryid1'] = $options['categoryid1'];
        } else {
            $postData['xmlprod_categoryid1'] = null;
        }

        if (isset($options['categoryid2'])) {
            $postData['xmlprod_categoryid2'] = $options['categoryid2'];
        } else {
            $postData['xmlprod_categoryid2'] = null;
        }

        $postData['xmlprod_data'] = date('Y-m-d');
        $postData['xmlprod_datahora'] = date('Y-m-d H:i:s');

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['categoria'])) {
            $builder->set('xmlprod_categoria', $options['categoria']);
        }
        if (isset($options['locadora'])) {
            $builder->set('xmlprod_locadora', $options['locadora']);
        }
        if (isset($options['nomelocadora'])) {
            $builder->set('xmlprod_nomelocadora', $options['nomelocadora']);
        }
        if (isset($options['cidade'])) {
            $builder->set('xmlprod_cidade', $options['cidade']);
        }
        if (isset($options['nomecidade'])) {
            $builder->set('xmlprod_nomecidade', $options['nomecidade']);
        }
        if (isset($options['grupo'])) {
            $builder->set('xmlprod_grupo', $options['grupo']);
        }
        if (isset($options['idgrupo'])) {
            $builder->set('xmlprod_idgrupo', $options['idgrupo']);
        }
        if (isset($options['nomegrupo'])) {
            $builder->set('xmlprod_nomegrupo', $options['nomegrupo']);
        }
        if (isset($options['bigimage'])) {
            $builder->set('xmlprod_bigimage', $options['bigimage']);
        }
        if (isset($options['smallimage'])) {
            $builder->set('xmlprod_smallimage', $options['smallimage']);
        }
        if (isset($options['producturl'])) {
            $builder->set('xmlprod_producturl', $options['producturl']);
        }
        if (isset($options['valor'])) {
            $builder->set('xmlprod_valor', $options['valor']);
        }
        if (isset($options['description'])) {
            $builder->set('xmlprod_description', $options['description']);
        }
        if (isset($options['categoryid1'])) {
            $builder->set('xmlprod_categoryid1', $options['categoryid1']);
        }
        if (isset($options['categoryid2'])) {
            $builder->set('xmlprod_categoryid2', $options['categoryid2']);
        }
        if (isset($options['data'])) {
            $builder->set('xmlprod_data', $options['data']);
        }
        $builder->set('xmlprod_datahora', date('Y-m-d H:i:s'));

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
     * @param XmlProdutos $obj
     * @param AluguelCarrosFacade $facade
     * @return XmlProdutos
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'categoria' => $obj->getCategoria(),
            'locadora' => $obj->getLocadora(),
            'nomelocadora' => $obj->getNomeLocadora(),
            'cidade' => $obj->getCidade(),
            'nomecidade' => $obj->getNomeCidade(),
            'grupo' => $obj->getGrupo(),
            'idgrupo' => $obj->getIdGrupo(),
            'nomegrupo' => $obj->getNomeGrupo(),
            'bigimage' => $obj->getBigImage(),
            'smallimage' => $obj->getSmallImage(),
            'producturl' => $obj->getUrl(),
            'valor' => $obj->getValor(),
            'description' => $obj->getDescricao(),
            'categoryid1' => $obj->getCategory1(),
            'categoryid2' => $obj->getCategory2(),
            'data' => $obj->getData()->getDataSql(),
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $xmlprod = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $xmlprod = $this->insert($this->queryBuilderInsert($options));
        }
        return $xmlprod;
    }

    /**
     * @param XmlProdutos $obj
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