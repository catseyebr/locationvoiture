<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\Tarifa;
use Carroaluguel\Models\AluguelCarros\TarifaLoja;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class TarifaLojaDAO extends Repository
{
    protected $table = "loc_lojas_valores";
    protected $primary_key = 'lojtar_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new TarifaLoja($facade);
            $obj->setId($dados->id_grupos_valores);
            $obj->setLoja($dados->lojtar_loja_id)
                ->setTarifalojaId($dados->lojtar_id)
                ->setGrupo($dados->lojtar_grupo_id)
                ->setDiaInicial($dados->n_dia_inicial)
                ->setDiaFinal($dados->n_dia_final)
                ->setValor($dados->valor_valores)
                ->setValidadeInicial($dados->validade_inicial_valores)
                ->setValidadeFinal($dados->validade_final_valores)
                ->setDataCadastro($dados->data_cadastro_valores)
                ->setDataAtualizacao($dados->data_atualizacao_valores)
                ->setAtivo($dados->ativo_valores)
                ->setDiaExtra($dados->valor_dia_extra_valores)
                ->setKm($dados->km_valores)
                ->setOrdem($dados->ordem_grp_val)
                ->setTarifaExclusiva(($dados->tarifa_exclusiva == 1) ? true : false);
        }
        return $obj;
    }

    public function queryBuilder($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['count'])) {
            $builder->select('count(*)');
        }

        $builder->tableJoin('loc_grupos_valores',
            'loc_grupos_valores.id_grupos_valores = loc_lojas_valores.lojtar_tarifa_id', 'LEFT');
        if (isset($options['admin'])) {
            if (isset($options['id_grupo_valores'])) {
                $builder->where('id_grupo_valores', $options['id_grupo_valores']);
            }
            if (isset($options['lojtar_id'])) {
                $builder->where('lojtar_id', $options['lojtar_id']);
            }
            if (isset($options['lojtar_loja_id'])) {
                $builder->where('lojtar_loja_id', $options['lojtar_loja_id']);
            }
            if (isset($options['grupo_valores'])) {
                $builder->where('grupo_valores', $options['grupo_valores']);
            }
            if (isset($options['n_dia_inicial'])) {
                $builder->where('n_dia_inicial', $options['n_dia_inicial']);
            }
            if (isset($options['n_dia_final'])) {
                $builder->where('n_dia_final', $options['n_dia_final']);
            }
            if (isset($options['validade_inicial_valores'])) {
                $builder->where('validade_inicial_valores', $options['validade_inicial_valores']);
            }
            if (isset($options['validade_final_valores'])) {
                $builder->where('validade_final_valores', $options['validade_final_valores']);
            }
            if (isset($options['km_valores'])) {
                $builder->where('km_valores', $options['km_valores']);
            }
            if (isset($options['data_cadastro_valores'])) {
                $builder->where('data_cadastro_valores', $options['data_cadastro_valores']);
            }
            if (isset($options['data_atualizacao_valores'])) {
                $builder->where('data_atualizacao_valores', $options['data_atualizacao_valores']);
            }
            if (isset($options['tarifa_exclusiva'])) {
                $builder->where('tarifa_exclusiva', $options['tarifa_exclusiva']);
            }
            if (isset($options['ativo_valores'])) {
                $builder->where('ativo_valores', $options['ativo_valores']);
            }
            if (isset($options['ordem_grp_val'])) {
                $builder->where('ordem_grp_val', $options['ordem_grp_val']);
            }

        }

        if (isset($options['id'])) {
            $builder->where('lojtar_id', $options['id']);
        }

        if (isset($options['grupo'])) {
            $builder->where('lojtar_grupo_id', $options['grupo']);
        }

        if (isset($options['loja'])) {
            $builder->where('lojtar_loja_id', $options['loja']);
        }

        if (isset($options['in_loja'])) {
            $builder->where_in('lojtar_loja_id', $options['in_loja']);
        }

        if (isset($options['dia_inicial'])) {
            $builder->greater('n_dia_inicial', $options['dia_inicial']);
        }

        if (isset($options['dia_final'])) {
            $builder->lower('n_dia_final', $options['dia_final']);
        }

        if (isset($options['valor'])) {
            $builder->where('valor_valores', $options['valor']);
        }

        if (isset($options['valor_dia_extra'])) {
            $builder->where('valor_dia_extra_valores', $options['valor_dia_extra']);
        }

        if (isset($options['validade_inicial'])) {
            $builder->greater('validade_inicial_valores', "'" . $options['validade_inicial'] . "'");
        }

        if (isset($options['validade_final'])) {
            $builder->lower('validade_final_valores', "'" . $options['validade_final'] . "'");
        }

        if (isset($options['km'])) {
            $builder->where('km_valores', $options['km']);
        }

        if (isset($options['data_cadastro'])) {
            $builder->where('data_cadastro_valores', $options['data_cadastro']);
        }

        if (isset($options['data_atualizacao'])) {
            $builder->where('data_atualizacao_valores', $options['data_atualizacao']);
        }

        if (isset($options['exclusiva'])) {
            $builder->where('loc_grupos_valores.tarifa_exclusiva', $options['exclusiva']);
        }

        if (isset($options['ativo'])) {
            $builder->where('ativo_valores', $options['ativo']);
        }

        if (isset($options['ordem'])) {
            $builder->where('ordem_grp_val', $options['ordem']);
        }

        if (isset($options['lojas_ativas'])) {
            $builder->tableJoin('loc_lojas', 'loc_lojas.id_loja = loc_lojas_valores.lojtar_loja_id', 'LEFT');
            $builder->where('loc_lojas.ativo', 1);
            $builder->tableJoin('loc_locadoras', 'loc_locadoras.id_locadora = loc_lojas.id_locadoras', 'LEFT');
            $builder->where('loc_locadoras.ativo', 1);
        }

        if (isset($options['groupBy'])) {
            $builder->group_by($options['groupBy']);
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
            $postData['lojtar_grupo_id'] = $options['grupo'];
        } else {
            $postData['lojtar_grupo_id'] = null;
        }

        if (isset($options['loja'])) {
            $postData['lojtar_loja_id'] = $options['loja'];
        } else {
            $postData['lojtar_loja_id'] = null;
        }

        if (isset($options['tarifa'])) {
            $postData['lojtar_tarifa_id'] = $options['tarifa'];
        } else {
            $postData['lojtar_tarifa_id'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['grupo'])) {
            $builder->set('lojtar_grupo_id', $options['grupo']);
        }
        if (isset($options['loja'])) {
            $builder->set('lojtar_loja_id', $options['loja']);
        }
        if (isset($options['tarifa'])) {
            $builder->set('lojtar_tarifa_id', $options['tarifa']);
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
     * @param TarifaLoja $obj
     * @param AluguelCarrosFacade $facade
     * @return TarifaLoja
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'grupo' => $obj->getGrupoId(),
            'loja' => $obj->getLojaId(),
            'tarifa' => $obj->getId()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getTarifalojaId();
            $tarlj = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $tarlj = $this->insert($this->queryBuilderInsert($options));
        }
        return $tarlj;
    }

    /**
     * @param TarifaLoja $obj
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