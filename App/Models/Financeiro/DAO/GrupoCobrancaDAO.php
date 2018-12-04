<?php

namespace Carroaluguel\Models\Financeiro\DAO;


use Carroaluguel\Models\Financeiro\GrupoCobranca;
use Carroaluguel\Models\FinanceiroFacade;
use Core\QueryBuilder;
use Core\Repository;

class GrupoCobrancaDAO extends Repository
{
    protected $table = "tb_grupocobranca";
    protected $primary_key = 'grpcob_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new GrupoCobranca($facade);
            $obj->setId($dados->grpcob_id)
                ->setNome($dados->grpcob_nome)
                ->setEmailPrimario($dados->grpcob_emailpri)
                ->setEmailSecundario($dados->grpcob_emailsec)
                ->setEmailTerciario($dados->grpcob_emailter)
                ->setNomeResponsavel($dados->grpcob_responsavel);
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
            if (isset($options['grpcob_id'])) {
                $builder->where("grpcob_id", $options['grpcob_id']);
            }
            if (isset($options['grpcob_nome'])) {
                $builder->like("grpcob_nome", $options['grpcob_nome']);
            }
            if (isset($options['grpcob_emailpri'])) {
                $builder->like("grpcob_emailpri", $options['grpcob_emailpri']);
            }
            if (isset($options['grpcob_responsavel'])) {
                $builder->like("grpcob_responsavel", $options['grpcob_responsavel']);
            }
        }
        if (isset($options['fornecedor'])) {
            $builder->tableJoin('tb_grupofornecedor', 'tb_grupofornecedor.grpforn_grupo = tb_grupocobranca.grpcob_id',
                'LEFT');
            $builder->where("grpforn_fornecedor", $options['fornecedor']);
        }
        if (isset($options['id'])) {
            $builder->where("grpcob_id", $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in("grpcob_id", $options['inId']);
        }
        if (isset($options['nome'])) {
            $builder->like("grpcob_nome", $options['nome']);
        }
        if (isset($options['emailpri'])) {
            $builder->like("grpcob_emailpri", $options['emailpri']);
        }
        if (isset($options['emailsec'])) {
            $builder->like("grpcob_emailsec", $options['emailsec']);
        }
        if (isset($options['emailter'])) {
            $builder->like("grpcob_emailter", $options['emailter']);
        }
        if (isset($options['responsavel'])) {
            $builder->like("grpcob_responsavel", $options['responsavel']);
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
            $postData['grpcob_nome'] = $options['nome'];
        } else {
            $postData['grpcob_nome'] = null;
        }

        if (isset($options['emailpri'])) {
            $postData['grpcob_emailpri'] = $options['emailpri'];
        } else {
            $postData['grpcob_emailpri'] = null;
        }

        if (isset($options['emailsec'])) {
            $postData['grpcob_emailsec'] = $options['emailsec'];
        } else {
            $postData['grpcob_emailsec'] = null;
        }

        if (isset($options['emailter'])) {
            $postData['grpcob_emailter'] = $options['emailter'];
        } else {
            $postData['grpcob_emailter'] = null;
        }

        if (isset($options['responsavel'])) {
            $postData['grpcob_responsavel'] = $options['responsavel'];
        } else {
            $postData['grpcob_responsavel'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set("grpcob_nome", $options['nome']);
        }
        if (isset($options['emailpri'])) {
            $builder->set("grpcob_emailpri", $options['emailpri']);
        }
        if (isset($options['emailsec'])) {
            $builder->set("grpcob_emailsec", $options['emailsec']);
        }
        if (isset($options['emailter'])) {
            $builder->set("grpcob_emailter", $options['emailter']);
        }
        if (isset($options['responsavel'])) {
            $builder->set("grpcob_responsavel", $options['responsavel']);
        }

        $builder->where($this->primary_key, $options['id']);

        $query = $builder->getQueryUpdate($this->table);

        return $query;
    }

    public function queryBuilderDelete($options)
    {
        $builder = new QueryBuilder();
        $builder->where("grpcob_id", $options['id']);
        $query = $builder->getQueryDelete($this->table);
        return $query;
    }

    /**
     * @param GrupoCobranca $obj
     * @param FinanceiroFacade $facade
     * @return GrupoCobranca
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'emailpri' => $obj->getEmailPrimario(),
            'emailsec' => $obj->getEmailSecundario(),
            'emailter' => $obj->getEmailTerciario(),
            'responsavel' => $obj->getNomeResponsavel()
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
     * @param GrupoCobranca $obj
     * @param FinanceiroFacade $facade
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