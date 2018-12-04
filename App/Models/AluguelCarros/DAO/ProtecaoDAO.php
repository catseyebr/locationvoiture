<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\Protecao;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class ProtecaoDAO extends Repository
{
    protected $table = "loc_protecao";
    protected $primary_key = 'id_protecao';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Protecao($facade);
            $obj->setId($dados->id_protecao)
                ->setNome($dados->protecao)
                ->setLocadora($dados->id_locadora)
                ->setOta($dados->ota_protecao)
                ->setAtivo(true)
                ->setOrdem($dados->ordem)
                ->setHoraExtra($dados->hora_extra_protecao)
                ->setLimiteHoras($dados->limite_horas_protecao)
                ->setDivHoraExtra($dados->divisor_horas_protecao)
                ->setGrupos($dados->grupos);
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
            if (isset($options['id_protecao'])) {
                $builder->where('id_protecao', $options['id_protecao']);
            }
            if (isset($options['id_locadora'])) {
                $builder->where('id_locadora', $options['id_locadora']);
            }
            if (isset($options['protecao'])) {
                $builder->like('protecao', $options['protecao']);
            }
        }

        if (isset($options['id'])) {
            $builder->where('id_protecao', $options['id']);
        }

        if (isset($options['locadora'])) {
            $builder->where('id_locadora', $options['locadora']);
        }

        if (isset($options['inLocadora'])) {
            $builder->where_in('id_locadora', $options['inLocadora']);
        }

        if (isset($options['nome'])) {
            $builder->like('protecao', $options['nome']);
        }

        if (isset($options['ota'])) {
            $builder->where('ota_protecao', $options['ota']);
        }

        if (isset($options['grupos'])) {
            $builder->like('grupos', $options['grupos']);
        }

        if (isset($options['descricao'])) {
            $builder->like('descricao', $options['descricao']);
        }

        if (isset($options['ordem'])) {
            $builder->where('ordem', $options['ordem']);
        }

        if (isset($options['div_hora_extra'])) {
            $builder->where('divisor_horas_protecao', $options['div_hora_extra']);
        }

        if (isset($options['hora_extra'])) {
            $builder->where('hora_extra_protecao', $options['hora_extra']);
        }

        if (isset($options['limite_horas'])) {
            $builder->where('limite_horas_protecao', $options['limite_horas']);
        }

        $builder->where('ativo_protecao', 1);

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
            $postData['id_locadora'] = $options['locadora'];
        } else {
            $postData['id_locadora'] = null;
        }

        if (isset($options['nome'])) {
            $postData['protecao'] = $options['nome'];
        } else {
            $postData['protecao'] = null;
        }

        if (isset($options['ota'])) {
            $postData['ota_protecao'] = $options['ota'];
        } else {
            $postData['ota_protecao'] = null;
        }

        if (isset($options['grupos'])) {
            $postData['grupos'] = $options['grupos'];
        } else {
            $postData['grupos'] = null;
        }

        if (isset($options['descricao'])) {
            $postData['descricao'] = $options['descricao'];
        } else {
            $postData['descricao'] = null;
        }

        if (isset($options['ordem'])) {
            $postData['ordem'] = $options['ordem'];
        } else {
            $postData['ordem'] = null;
        }

        if (isset($options['div_hora_extra'])) {
            $postData['divisor_horas_protecao'] = $options['div_hora_extra'];
        } else {
            $postData['divisor_horas_protecao'] = null;
        }

        if (isset($options['hora_extra'])) {
            $postData['hora_extra_protecao'] = $options['hora_extra'];
        } else {
            $postData['hora_extra_protecao'] = null;
        }

        if (isset($options['limite_horas'])) {
            $postData['limite_horas_protecao'] = $options['limite_horas'];
        } else {
            $postData['limite_horas_protecao'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if ($options['locadora']) {
            $builder->set('id_locadora', $options['locadora']);
        }
        if ($options['nome']) {
            $builder->set('protecao', $options['nome']);
        }
        if ($options['ota']) {
            $builder->set('ota_protecao', $options['ota']);
        }
        if ($options['grupos']) {
            $builder->set('grupos', $options['grupos']);
        }
        if ($options['descricao']) {
            $builder->set('descricao', $options['descricao']);
        }
        if ($options['ordem']) {
            $builder->set('ordem', $options['ordem']);
        }
        if ($options['div_hora_extra']) {
            $builder->set('divisor_horas_protecao', $options['div_hora_extra']);
        }
        if ($options['hora_extra']) {
            $builder->set('hora_extra_protecao', $options['hora_extra']);
        }
        if ($options['limite_horas']) {
            $builder->set('limite_horas_protecao', $options['limite_horas']);
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
     * @param Protecao $obj
     * @param AluguelCarrosFacade $facade
     * @return Protecao
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'locadora' => $obj->getLocadoraId(),
            'nome' => $obj->getNome(),
            'ota' => $obj->getOta(),
            'grupos' => $obj->getGrupos(),
            'descricao' => $obj->getDescricao(),
            'ordem' => $obj->getOrdem(),
            'div_hora_extra' => $obj->getDivHoraExtra(),
            'hora_extra' => $obj->getHoraExtra(),
            'limite_horas' => $obj->getLimiteHoras()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $protecao = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $protecao = $this->insert($this->queryBuilderInsert($options));
        }
        return $protecao;
    }

    /**
     * @param Protecao $obj
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