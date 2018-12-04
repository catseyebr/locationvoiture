<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\BannerCotacao;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class BannerCotacaoDAO extends Repository
{
    protected $table = "loc_categoria";
    protected $primary_key = 'id_categoria';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new BannerCotacao($facade);
            $obj->setId($dados->ban_id)
                ->setGrupo($dados->ban_grupo)
                ->setImageUrl($dados->ban_imageurl)
                ->setLojas($dados->ban_lojas)
                ->setCidades($dados->ban_cidades)
                ->setDataInicial($dados->ban_data_inicial)
                ->setDataFinal($dados->ban_data_final)
                ->setTipoValidade($dados->ban_tipo_validade)
                ->setAtivo(($dados->ban_ativo == 1) ? true : false)
                ->setCategoria($dados->ban_categoria)
                ->setImageCta($dados->ban_imagecta);
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
            if (isset($options['ban_id'])) {
                $builder->where('ban_id', $options['ban_id']);
            }

            if (isset($options['ban_grupo'])) {
                $builder->where('ban_grupo', $options['ban_grupo']);
            }

            if (isset($options['ban_imageurl'])) {
                $builder->where('ban_imageurl', $options['ban_imageurl']);
            }

            if (isset($options['ban_lojas'])) {
                $builder->where_in('ban_lojas', $options['ban_lojas']);
            }

            if (isset($options['ban_cidades'])) {
                $builder->where_in('ban_cidades', $options['ban_cidades']);
            }

            if (isset($options['ban_data_inicial'])) {
                $builder->where('ban_data_inicial', $options['ban_data_inicial']);
            }

            if (isset($options['ban_data_final'])) {
                $builder->where('ban_data_final', $options['ban_data_final']);
            }

            if (isset($options['ban_tipo_validade'])) {
                $builder->where('ban_tipo_validade', $options['ban_tipo_validade']);
            }

            if (isset($options['ban_ativo'])) {
                $builder->where('ban_ativo', $options['ban_ativo']);
            }

            if (isset($options['ban_categoria'])) {
                $builder->where('ban_categoria', $options['ban_categoria']);
            }

            if (isset($options['ban_imagecta'])) {
                $builder->where('ban_imagecta', $options['ban_imagecta']);
            }

        }

        if (isset($options['id'])) {
            $builder->where('ban_id', $options['id']);
        }

        if (isset($options['inId'])) {
            $builder->where_in('ban_id', $options['inId']);
        }

        if (isset($options['grupo'])) {
            $builder->where('ban_grupo', $options['grupo']);
        }

        if (isset($options['inGrupo'])) {
            $builder->where_in('ban_grupo', $options['inGrupo']);
        }

        if (isset($options['imageurl'])) {
            $builder->where('ban_imageurl', $options['imageurl']);
        }

        if (isset($options['lojas'])) {
            $builder->where_in('ban_lojas', $options['lojas']);
        }

        if (isset($options['cidades'])) {
            $builder->where_in('ban_cidades', $options['cidades']);
        }

        if (isset($options['dataInicial'])) {
            $builder->where('ban_data_inicial', $options['ban_data_inicial']);
        }

        if (isset($options['dataFinal'])) {
            $builder->where('ban_data_final', $options['dataFinal']);
        }

        if (isset($options['data_consulta'])) {
            $builder->greater('ban_data_inicial', "'" . $options['data_consulta'] . "'");
            $builder->lower('ban_data_final', "'" . $options['data_consulta'] . "'");
        }

        if (isset($options['tipo_validade'])) {
            $builder->where('ban_tipo_validade', $options['tipo_validade']);
        }

        if (isset($options['ativo'])) {
            $builder->where('ban_ativo', $options['ativo']);
        }

        if (isset($options['ban_categoria'])) {
            $builder->where('ban_categoria', $options['ban_categoria']);
        }

        if (isset($options['ban_imagecta'])) {
            $builder->where('ban_imagecta', $options['ban_imagecta']);
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

        if (isset($options['grupo'])) {
            $postData['ban_grupo'] = $options['grupo'];
        } else {
            $postData['ban_grupo'] = null;
        }

        if (isset($options['imageurl'])) {
            $postData['ban_imageurl'] = $options['imageurl'];
        } else {
            $postData['ban_imageurl'] = null;
        }

        if (isset($options['lojas'])) {
            $postData['ban_lojas'] = $options['lojas'];
        } else {
            $postData['ban_lojas'] = null;
        }

        if (isset($options['cidades'])) {
            $postData['ban_cidades'] = $options['cidades'];
        } else {
            $postData['ban_cidades'] = null;
        }

        if (isset($options['dataInicial'])) {
            $postData['ban_datainicial'] = $options['dataInicial'];
        } else {
            $postData['ban_datainicial'] = null;
        }

        if (isset($options['dataFinal'])) {
            $postData['ban_datafinal'] = $options['dataFinal'];
        } else {
            $postData['ban_datafinal'] = null;
        }

        if (isset($options['tipoValidade'])) {
            $postData['ban_tipo_validade'] = $options['tipoValidade'];
        } else {
            $postData['ban_tipo_validade'] = null;
        }

        if (isset($options['ativo'])) {
            $postData['ban_ativo'] = $options['ativo'];
        } else {
            $postData['ban_ativo'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['grupo'])) {
            $builder->set('ban_grupo', $options['grupo']);
        }

        if (isset($options['imageurl'])) {
            $builder->set('ban_imageurl', $options['imageurl']);
        }

        if (isset($options['lojas'])) {
            $builder->set('ban_lojas', $options['lojas']);
        }

        if (isset($options['cidades'])) {
            $builder->set('ban_cidades', $options['cidades']);
        }

        if (isset($options['dataInicial'])) {
            $builder->set('ban_datainicial', $options['dataInicial']);
        }

        if (isset($options['dataFinal'])) {
            $builder->set('ban_datainicial', $options['dataFinal']);
        }

        if (isset($options['tipoValidade'])) {
            $builder->set('ban_tipo_validade', $options['tipoValidade']);
        }

        if (isset($options['ativo'])) {
            $builder->set('ban_ativo', $options['ativo']);
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
     * @param BannerCotacao $obj
     * @param AluguelCarrosFacade $facade
     * @return BannerCotacao
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'grupo' => $obj->getGrupo(),
            'imageurl' => $obj->getImageUrl(),
            'lojas' => $obj->getLojas(),
            'cidades' => $obj->getCidades(),
            'dataInicial' => $obj->getDataInicial()->getDataHoraSql(),
            'dataFinal' => $obj->getDataFinal()->getDataHoraSql(),
            'tipoValidade' => $obj->getTipoValidade(),
            'ativo' => ($obj->getAtivo()) ? '1' : '0'
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $banner = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $banner = $this->insert($this->queryBuilderInsert($options));
        }
        return $banner;
    }

    /**
     * @param BannerCotacao $obj
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