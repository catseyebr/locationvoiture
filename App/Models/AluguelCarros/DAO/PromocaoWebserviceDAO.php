<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\PromocaoWebservice;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class PromocaoWebserviceDAO extends Repository
{
    protected $table = "promocao_webservice";
    protected $primary_key = 'proweb_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new PromocaoWebservice($facade);
            $obj->setId($dados->proweb_id)
                ->setCod($dados->proweb_cod)
                ->setLocadora($dados->proweb_locadora)
                ->setGrupos($dados->proweb_grupos)
                ->setLojas($dados->proweb_lojas)
                ->setNome($dados->proweb_nome)
                ->setValidadeInicial($dados->proweb_validadeinicial)
                ->setValidadeFinal($dados->proweb_validadefinal)
                ->setValidadeRetiradaInicial($dados->proweb_validaderetirada_inicial)
                ->setValidadeRetiradaFinal($dados->proweb_validaderetirada_final)
                ->setSemanaInicial($dados->proweb_semana_inicial)
                ->setSemanaFinal($dados->proweb_semana_final)
                ->setAtivo(($dados->proweb_ativo == 1) ? true : false)
                ->setDescricao($dados->proweb_desc)
                ->setTipo($dados->proweb_tipo)
                ->setDesconto($dados->proweb_desconto)
                ->setMinDiarias($dados->proweb_min_diarias);
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
            if (isset($options['proweb_id'])) {
                $builder->where('proweb_id', $options['proweb_id']);
            }
            if (isset($options['proweb_locadora'])) {
                $builder->where('proweb_locadora', $options['proweb_locadora']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('proweb_id', $options['id']);
        }
        if (isset($options['codigo'])) {
            $builder->where('proweb_cod', $options['codigo']);
        }
        if (isset($options['locadora'])) {
            $builder->where('proweb_locadora', $options['locadora']);
        }
        if (isset($options['nome'])) {
            $builder->like('proweb_nome', $options['nome']);
        }
        if (isset($options['validade_inicial'])) {
            $builder->greater('proweb_validadeinicial', "'" . $options['validade_inicial'] . "'");
        }
        if (isset($options['validade_final'])) {
            $builder->lower('proweb_validadefinal', "'" . $options['validade_final'] . "'");
        }
        if (isset($options['validade_retirada_inicial'])) {
            $builder->greater('proweb_validaderetirada_inicial', "'" . $options['validade_retirada_inicial'] . "'");
        }
        if (isset($options['validade_retirada_inicial'])) {
            $builder->lower('proweb_validaderetirada_inicial', "'" . $options['validade_retirada_inicial'] . "'");
        }
        if (isset($options['semana_inicial'])) {
            $builder->where('proweb_semanainicial', $options['semana_inicial']);
        }
        if (isset($options['semana_final'])) {
            $builder->where('proweb_semanafinal', $options['semana_final']);
        }
        if (isset($options['ativo'])) {
            $builder->where('proweb_ativo', $options['ativo']);
        }
        if (isset($options['user_request'])) {
            $builder->where('proweb_user_request', '1');
        } else {
            $builder->where('proweb_user_request', '0');
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

        if (isset($options['locadora'])) {
            $postData['proweb_locadora'] = $options['locadora'];
        } else {
            $postData['proweb_locadora'] = null;
        }

        if (isset($options['tipoObjeto'])) {
            $postData['pro_tipoobjeto'] = $options['tipoObjeto'];
        } else {
            $postData['pro_tipoobjeto'] = null;
        }

        if (isset($options['nome'])) {
            $postData['pro_nome'] = $options['nome'];
        } else {
            $postData['pro_nome'] = null;
        }

        if (isset($options['validade_inicial'])) {
            $postData['pro_validadeinicial'] = $options['validade_inicial'];
        } else {
            $postData['pro_validadeinicial'] = null;
        }

        if (isset($options['validade_final'])) {
            $postData['pro_validadefinal'] = $options['validade_final'];
        } else {
            $postData['pro_validadefinal'] = null;
        }

        if (isset($options['hora_inicial'])) {
            $postData['pro_horainicial'] = $options['hora_inicial'];
        } else {
            $postData['pro_horainicial'] = null;
        }

        if (isset($options['hora_final'])) {
            $postData['pro_horafinal'] = $options['hora_final'];
        } else {
            $postData['pro_horafinal'] = null;
        }

        if (isset($options['semana_inicial'])) {
            $postData['pro_semanainicial'] = $options['semana_inicial'];
        } else {
            $postData['pro_semanainicial'] = null;
        }

        if (isset($options['semana_final'])) {
            $postData['pro_semanafinal'] = $options['semana_final'];
        } else {
            $postData['pro_semanafinal'] = null;
        }

        if (isset($options['ativo'])) {
            $postData['pro_ativo'] = $options['ativo'];
        } else {
            $postData['pro_ativo'] = null;
        }

        if (isset($options['objeto'])) {
            $postData['pro_objeto'] = $options['objeto'];
        } else {
            $postData['pro_objeto'] = null;
        }

        if (isset($options['user_request'])) {
            $postData['proweb_user_request'] = $options['user_request'];
        } else {
            $postData['proweb_user_request'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['tipo'])) {
            $builder->set('pro_tipo', $options['tipo']);
        }
        if (isset($options['tipoObjeto'])) {
            $builder->set('pro_tipoobjeto', $options['tipoObjeto']);
        }
        if (isset($options['nome'])) {
            $builder->set('pro_nome', $options['nome']);
        }
        if (isset($options['validade_inicial'])) {
            $builder->set('pro_validadeinicial', $options['validade_inicial']);
        }
        if (isset($options['validade_final'])) {
            $builder->set('pro_validadefinal', $options['validade_final']);
        }
        if (isset($options['hora_inicial'])) {
            $builder->set('pro_horainicial', $options['hora_inicial']);
        }
        if (isset($options['hora_final'])) {
            $builder->set('pro_horafinal', $options['hora_final']);
        }
        if (isset($options['semana_inicial'])) {
            $builder->set('pro_semanainicial', $options['semana_inicial']);
        }
        if (isset($options['semana_final'])) {
            $builder->set('pro_semanafinal', $options['semana_final']);
        }
        if (isset($options['ativo'])) {
            $builder->set('pro_ativo', $options['ativo']);
        }
        if (isset($options['user_request'])) {
            $builder->set('proweb_user_request', '1');
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
     * @param PromocaoWebservice $obj
     * @param AluguelCarrosFacade $facade
     * @return PromocaoWebservice
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'cod' => $obj->getCod(),
            'locadora' => $obj->getLocadora(),
            'grupos' => $obj->getGruposString(),
            'lojas' => $obj->getLojasString(),
            'nome' => $obj->getNome(),
            'validade_inicial' => $obj->getValidadeInicial()->getDataHoraSql(),
            'validade_final' => $obj->getValidadeFinal()->getDataHoraSql(),
            'validade_retirada_inicial' => $obj->getValidadeRetiradaInicial()->getDataHoraSql(),
            'validade_retirada_final' => $obj->getValidadeRetiradaFinal()->getDataHoraSql(),
            'semana_inicial' => $obj->getSemanaInicial(),
            'semana_final' => $obj->getSemanaFinal(),
            'ativo' => ($obj->getAtivo()) ? '1' : '0'
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $proweb = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $proweb = $this->insert($this->queryBuilderInsert($options));
        }
        return $proweb;
    }

    /**
     * @param PromocaoWebservice $obj
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