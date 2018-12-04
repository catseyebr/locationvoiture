<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\Carro;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class CarroDAO extends Repository
{
    protected $table = "loc_carros";
    protected $primary_key = 'id_carros';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Carro($facade);
            $obj->setId($dados->id_categoria)
                ->setId($dados->id_carros)
                ->setModelo($dados->modelo)
                ->setPassageiros($dados->pass_adulto)
                ->setMalaGde($dados->mala_gde)
                ->setMalaPeq($dados->mala_peq)
                ->setMotor($dados->motor)
                ->setCambio($dados->cambio)
                ->setDescricao($dados->descCarro)
                ->setMetaTitle($dados->meta_title)
                ->setMetaDescription($dados->meta_description)
                ->setMetaKeywords($dados->meta_keywords)
                ->setLinkYouTube($dados->youtube_carros)
                ->setTxtYouTube($dados->txt_auth_video)
                ->setImagem($dados->img);
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
            if (isset($options['id_carros'])) {
                $builder->where('id_carros', $options['id_carros']);
            }
            if (isset($options['modelo'])) {
                $builder->like('modelo', $options['modelo']);
            }
            if (isset($options['pass_adulto'])) {
                $builder->where('pass_adulto', $options['pass_adulto']);
            }
            if (isset($options['mala_gde'])) {
                $builder->where('mala_gde', $options['mala_gde']);
            }
            if (isset($options['mala_gde'])) {
                $builder->where('mala_gde', $options['mala_gde']);
            }

        }
        if (isset($options['id'])) {
            $builder->where('id_carros', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('id_carros', $options['inId']);
        }
        if (isset($options['modelo'])) {
            $builder->like('modelo', $options['modelo']);
        }
        if (isset($options['imagem'])) {
            $builder->where_in('img', $options['imagem']);
        }
        if (isset($options['passageiros'])) {
            $builder->where('pass_adulto', $options['passageiros']);
        }
        if (isset($options['malagde'])) {
            $builder->where('mala_gde', $options['malagde']);
        }
        if (isset($options['malapeq'])) {
            $builder->where('mala_peq', $options['malapeq']);
        }
        if (isset($options['motor'])) {
            $builder->where('motor', $options['motor']);
        }
        if (isset($options['cambio'])) {
            $builder->where('cambio', $options['cambio']);
        }
        if (isset($options['descricao'])) {
            $builder->where('descCarro', $options['descricao']);
        }
        if (isset($options['metaTitle'])) {
            $builder->where('meta_title', $options['metaTitle']);
        }
        if (isset($options['metaDescription'])) {
            $builder->where('meta_description', $options['metaDescription']);
        }
        if (isset($options['metaKeywords'])) {
            $builder->where('meta_keywords', $options['metaKeywords']);
        }
        if (isset($options['linkyoutube'])) {
            $builder->where('youtube_carros', $options['linkyoutube']);
        }
        if (isset($options['txtyoutube'])) {
            $builder->where('txt_auth_video', $options['txtyoutube']);
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

        if (isset($options['modelo'])) {
            $postData['modelo'] = $options['modelo'];
        } else {
            $postData['modelo'] = null;
        }

        if (isset($options['imagem'])) {
            $postData['img'] = $options['imagem'];
        } else {
            $postData['img'] = null;
        }

        if (isset($options['passageiros'])) {
            $postData['pass_adulto'] = $options['passageiros'];
        } else {
            $postData['pass_adulto'] = null;
        }

        if (isset($options['malagde'])) {
            $postData['mala_gde'] = $options['malagde'];
        } else {
            $postData['mala_gde'] = null;
        }

        if (isset($options['malapeq'])) {
            $postData['mala_peq'] = $options['malapeq'];
        } else {
            $postData['mala_peq'] = null;
        }

        if (isset($options['motor'])) {
            $postData['motor'] = $options['motor'];
        } else {
            $postData['motor'] = null;
        }

        if (isset($options['cambio'])) {
            $postData['cambio'] = $options['cambio'];
        } else {
            $postData['cambio'] = null;
        }

        if (isset($options['descricao'])) {
            $postData['descCarro'] = $options['descricao'];
        } else {
            $postData['descCarro'] = null;
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

        if (isset($options['linkyoutube'])) {
            $postData['youtube_carros'] = $options['linkyoutube'];
        } else {
            $postData['youtube_carros'] = null;
        }

        if (isset($options['txtyoutube'])) {
            $postData['txt_auth_video'] = $options['txtyoutube'];
        } else {
            $postData['txt_auth_video'] = null;
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
        if (isset($options['modelo'])) {
            $builder->set('modelo', $options['modelo']);
        }
        if (isset($options['imagem'])) {
            $builder->set('img', $options['imagem']);
        }
        if (isset($options['passageiros'])) {
            $builder->set('pass_adulto', $options['passageiros']);
        }
        if (isset($options['malagde'])) {
            $builder->set('mala_gde', $options['malagde']);
        }
        if (isset($options['malapeq'])) {
            $builder->set('mala_peq', $options['malapeq']);
        }
        if (isset($options['motor'])) {
            $builder->set('motor', $options['motor']);
        }
        if (isset($options['cambio'])) {
            $builder->set('cambio', $options['cambio']);
        }
        if (isset($options['descricao'])) {
            $builder->set('descCarro', $options['descricao']);
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
        if (isset($options['linkyoutube'])) {
            $builder->set('youtube_carros', $options['linkyoutube']);
        }
        if (isset($options['txtyoutube'])) {
            $builder->set('txt_auth_video', $options['txtyoutube']);
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
     * @param Carro $obj
     * @param AluguelCarrosFacade $facade
     * @return Carro
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'modelo' => $obj->getModelo(),
            'imagem' => $obj->getImagem(),
            'passageiros' => $obj->getPassageiros(),
            'malagde' => $obj->getMalaGde(),
            'malapeq' => $obj->getMalaPeq(),
            'motor' => $obj->getMotor(),
            'cambio' => $obj->getCambio(),
            'descricao' => $obj->getDescricao(),
            'metaTitle' => $obj->getMetaTitle(),
            'metaDescription' => $obj->getMetaDescription(),
            'metaKeywords' => $obj->getMetaKeywords(),
            'linkyoutube' => $obj->getLinkYouTube(),
            'txtyoutube' => $obj->getTxtYouTube(),
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $carro = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $carro = $this->insert($this->queryBuilderInsert($options));
        }
        return $carro;
    }

    /**
     * @param Carro $obj
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