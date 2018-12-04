<?php

namespace Carroaluguel\Models\Localidade\DAO;


use Carroaluguel\Models\Localidade\Cep;
use Carroaluguel\Models\LocalidadeFacade;
use Core\QueryBuilder;
use Core\Repository;

class CepDAO extends Repository
{
    protected $table = "cep_final";
    protected $primary_key = 'cep_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Cep($facade);
            $obj->setId($dados->cep_id)
                ->setCidade($dados->cep_id_cidade)
                ->setRua($dados->cep_rua)
                ->setBairro($dados->cep_bairro)
                ->setCodigo($dados->cep_codigo)
                ->setComplemento($dados->cep_compl)
                ->setTipo($dados->cep_tipo)
                ->setEstado($dados->cep_id_estado);
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
            $builder->tableJoin('cidade', 'cidade.id_cidade = bairro.cep_id_cidade', 'LEFT');
            $builder->tableJoin('estado', 'estado.id_estado = cidade.cep_id_estado', 'LEFT');
            $builder->tableJoin('bairro', 'bairro.bairro_id = cep_final.cep_bairro', 'LEFT');

            if (isset($options['cep_id'])) {
                $builder->where("cep_id", $options['cep_id']);
            }
            if (isset($options['cep_codigo'])) {
                $builder->where("cep_codigo", $options['cep_codigo']);
            }
            if (isset($options['cep_tipo'])) {
                $builder->like("cep_tipo", $options['cep_tipo']);
            }
            if (isset($options['cep_complemento'])) {
                $builder->like("cep_complemento", $options['cep_complemento']);
            }
            if (isset($options['cep_rua'])) {
                $builder->like("cep_rua", $options['cep_rua']);
            }
            if (isset($options['nome_cidade'])) {
                $builder->like("nome_cidade", $options['nome_cidade']);
            }
            if (isset($options['abr_estado'])) {
                $builder->like("abr_estado", $options['abr_estado']);
            }
            if (isset($options['bairro_nome'])) {
                $builder->like("bairro_nome", $options['bairro_nome']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('cep_id', $options['id']);
        }

        if (isset($options['inId'])) {
            $builder->where_in('cep_id', $options['inId']);
        }

        if (isset($options['cidade'])) {
            $builder->where('cep_id_cidade', $options['cidade']);
        }

        if (isset($options['rua'])) {
            $builder->where('cep_rua', $options['rua']);
        }

        if (isset($options['complemento'])) {
            $builder->like("cep_complemento", $options['complemento']);
        }

        if (isset($options['bairro'])) {
            $builder->where('cep_bairro', $options['bairro']);
        }

        if (isset($options['codigo'])) {
            $builder->where('cep_codigo', $options['codigo']);
        }

        if (isset($options['tipo'])) {
            $builder->where('cep_tipo', $options['tipo']);
        }

        if (isset($options['estado'])) {
            $builder->where('cep_id_estado', $options['estado']);
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
        if (isset($options['cidade'])) {
            $postData['cep_id_cidade'] = $options['cidade'];
        } else {
            $postData['cep_id_cidade'] = null;
        }

        if (isset($options['codigo'])) {
            $postData['cep_codigo'] = $options['codigo'];
        } else {
            $postData['cep_codigo'] = null;
        }

        if (isset($options['rua'])) {
            $postData['cep_rua'] = $options['rua'];
        } else {
            $postData['cep_rua'] = null;
        }

        if (isset($options['complemento'])) {
            $postData['cep_complemento'] = $options['complemento'];
        } else {
            $postData['cep_complemento'] = null;
        }

        if (isset($options['tipo'])) {
            $postData['cep_tipo'] = $options['tipo'];
        } else {
            $postData['cep_tipo'] = null;
        }

        if (isset($options['estado'])) {
            $postData['cep_id_estado'] = $options['estado'];
        } else {
            $postData['cep_id_estado'] = null;
        }

        if (isset($options['bairro'])) {
            $postData['cep_bairro'] = $options['bairro'];
        } else {
            $postData['cep_bairro'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();

        if ($options['cidade']) {
            $builder->set("cep_id_cidade", $options['cidade']);
        }
        if ($options['codigo']) {
            $builder->set("cep_codigo", $options['codigo']);
        }
        if ($options['rua']) {
            $builder->set("cep_rua", $options['rua']);
        }
        if ($options['complemento']) {
            $builder->set("cep_complemento", $options['complemento']);
        }
        if ($options['tipo']) {
            $builder->set("cep_tipo", $options['tipo']);
        }
        if ($options['estado']) {
            $builder->set("cep_id_estado", $options['estado']);
        }
        if ($options['bairro']) {
            $builder->set("cep_bairro", $options['bairro']);
        }

        $builder->where("cep_id", $options['id']);

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
     * @param Cep $obj
     * @param LocalidadeFacade $facade
     * @return Cep
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'cidade' => $obj->getCidade()->getId(),
            'codigo' => $obj->getCodigo(),
            'rua' => $obj->getRua(),
            'complemento' => $obj->getComplemento(),
            'tipo' => $obj->getTipo(),
            'estado' => $obj->getEstado()->getId(),
            'bairro' => $obj->getBairro()->getId()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $cep = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $cep = $this->insert($this->queryBuilderInsert($options));
        }
        return $cep;
    }

    /**
     * @param Cep $obj
     * @param LocalidadeFacade $facade
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