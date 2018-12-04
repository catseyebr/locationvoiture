<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\TarifaGrupo;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class TarifaGrupoDAO extends Repository
{
    protected $table = "loc_grupos_valores";
    protected $primary_key = 'id_grupo_valores';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new TarifaGrupo($facade);
            $obj->setId($dados->id_grupos_valores)
                ->setGrupo($dados->grupo_valores)
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

        if (isset($options['admin'])) {
            if (isset($options['id_grupo_valores'])) {
                $builder->where('id_grupo_valores', $options['id_grupo_valores']);
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
            $builder->where('id_grupo_valores', $options['id']);
        }

        if (isset($options['grupo'])) {
            $builder->where('grupo_valores', $options['grupo']);
        }

        if (isset($options['in_grupo'])) {
            $builder->where_in('grupo_valores', $options['in_grupo']);
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
            $builder->where('tarifa_exclusiva', $options['exclusiva']);
        }

        if (isset($options['ativo'])) {
            $builder->where('ativo_valores', $options['ativo']);
        }

        if (isset($options['ordem'])) {
            $builder->where('ordem_grp_val', $options['ordem']);
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
            $postData['grupo_valores'] = $options['grupo'];
        } else {
            $postData['grupo_valores'] = null;
        }

        if (isset($options['dia_inicial'])) {
            $postData['n_dia_inicial'] = $options['dia_inicial'];
        } else {
            $postData['n_dia_inicial'] = null;
        }

        if (isset($options['dia_final'])) {
            $postData['n_dia_final'] = $options['dia_final'];
        } else {
            $postData['n_dia_final'] = null;
        }

        if (isset($options['valor'])) {
            $postData['valor_valores'] = $options['valor'];
        } else {
            $postData['valor_valores'] = null;
        }

        if (isset($options['valor_dia_extra'])) {
            $postData['valor_dia_extra_valores'] = $options['valor_dia_extra'];
        } else {
            $postData['valor_dia_extra_valores'] = null;
        }

        if (isset($options['validade_inicial'])) {
            $postData['validade_inicial_valores'] = $options['validade_inicial'];
        } else {
            $postData['validade_inicial_valores'] = null;
        }

        if (isset($options['validade_final'])) {
            $postData['validade_final_valores'] = $options['validade_final'];
        } else {
            $postData['validade_final_valores'] = null;
        }

        if (isset($options['km'])) {
            $postData['km_valores'] = $options['km'];
        } else {
            $postData['km_valores'] = 'Km Livre';
        }

        if (isset($options['data_cadastro'])) {
            $postData['data_cadastro_valores'] = $options['data_cadastro'];
        } else {
            $postData['data_cadastro_valores'] = date('Y-m-d H:i:s');
        }

        if (isset($options['data_atualizacao'])) {
            $postData['data_atualizacao_valores'] = $options['data_atualizacao'];
        } else {
            $postData['data_atualizacao_valores'] = date('Y-m-d H:i:s');
        }

        if (isset($options['exclusiva'])) {
            $postData['tarifa_exclusiva'] = $options['exclusiva'];
        } else {
            $postData['tarifa_exclusiva'] = '0';
        }

        if (isset($options['ativo'])) {
            $postData['ativo_valores'] = $options['ativo'];
        } else {
            $postData['ativo_valores'] = '0';
        }

        if (isset($options['ordem'])) {
            $postData['ordem_grp_val'] = $options['ordem'];
        } else {
            $postData['ordem_grp_val'] = '2';
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['grupo'])) {
            $builder->set('grupo_valores', $options['grupo']);
        }
        if (isset($options['dia_inicial'])) {
            $builder->set('n_dia_inicial', $options['dia_inicial']);
        }
        if (isset($options['dia_final'])) {
            $builder->set('n_dia_final', $options['dia_final']);
        }
        if (isset($options['valor'])) {
            $builder->set('valor_valores', $options['valor']);
        }
        if (isset($options['valor_dia_extra'])) {
            $builder->set('valor_dia_extra_valores', $options['valor_dia_extra']);
        }
        if (isset($options['validade_inicial'])) {
            $builder->set('validade_inicial_valores', $options['validade_inicial']);
        }
        if (isset($options['validade_final'])) {
            $builder->set('validade_final_valores', $options['validade_final']);
        }
        if (isset($options['km'])) {
            $builder->set('km_valores', $options['km']);
        }
        if (isset($options['data_cadastro'])) {
            $builder->set('data_cadastro_valores', $options['data_cadastro']);
        }
        $builder->set('data_atualizacao_valores', date('Y-m-d H:i:s'));
        if (isset($options['exclusiva'])) {
            $builder->set('tarifa_exclusiva', $options['exclusiva']);
        }
        if (isset($options['ativo'])) {
            $builder->set('ativo_valores', $options['ativo']);
        }
        if (isset($options['ordem'])) {
            $builder->set('ordem_grp_val', $options['ordem']);
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
     * @param TarifaGrupo $obj
     * @param AluguelCarrosFacade $facade
     * @return TarifaGrupo
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'grupo' => $obj->getGrupo(),
            'dia_inicial' => $obj->getDiaInicial(),
            'dia_final' => $obj->getDiaFinal(),
            'valor' => $obj->getValor(),
            'valor_dia_extra' => $obj->getDiaExtra(),
            'validade_inicial' => (is_object($obj->getValidadeInicial())) ? $obj->getValidadeInicial()->getDataHoraSql() : null,
            'validade_final' => (is_object($obj->getValidadeFinal())) ? $obj->getValidadeFinal()->getDataHoraSql() : null,
            'km' => $obj->getKm(),
            'data_cadastro' => (is_object($obj->getDataCadastro())) ? $obj->getDataCadastro()->getDataHoraSql() : null,
            'data_atualizacao' => (is_object($obj->getDataAtualizacao())) ? $obj->getDataAtualizacao()->getDataHoraSql() : null,
            'exclusiva' => ($obj->getTarifaExclusiva()) ? '1' : '0',
            'ativo' => ($obj->getAtivo()) ? '1' : '0',
            'ordem' => $obj->getOrdem()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $targrp = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $targrp = $this->insert($this->queryBuilderInsert($options));
        }
        return $targrp;
    }

    /**
     * @param TarifaGrupo $obj
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