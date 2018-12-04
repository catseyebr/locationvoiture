<?php

namespace Carroaluguel\Models\Afiliados\DAO;


use Carroaluguel\Models\Afiliados\Afiliado;
use Carroaluguel\Models\AfiliadosFacade;
use Core\QueryBuilder;
use Core\Repository;

class AfiliadoDAO extends Repository
{
    protected $table = "tb_afiliado";
    protected $primary_key = 'afil_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Afiliado($facade);
            $obj->setId($dados->afil_id)
                ->setCod($dados->afil_cod)
                ->setNome($dados->afil_nome)
                ->setEmail($dados->afil_email)
                ->setTimeClient($dados->afil_timeclient)
                ->setAtivo(($dados->afil_ativo) ? true : false)
                ->setAliquotaComissao($dados->afil_comissao)
                ->setComissaoInclude($dados->afil_comissaoinclude)
                ->setPagComissao($dados->afil_comissaopag)
                ->setPeriodComissao($dados->afil_comissaoperiodo);
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
            if (isset($options['afil_id'])) {
                $builder->where("afil_id", $options['afil_id']);
            }
            if (isset($options['afil_cod'])) {
                $builder->where("afil_cod", $options['afil_cod']);
            }
            if (isset($options['afil_nome'])) {
                $builder->like("afil_nome", $options['afil_nome']);
            }
            if (isset($options['afil_email'])) {
                $builder->where("afil_email", $options['afil_email']);
            }
            if (isset($options['afil_ativo'])) {
                if ($options['afil_ativo'] == 0) {
                    $builder->where_null("afil_ativo");
                } else {
                    $builder->where("afil_ativo", $options['afil_ativo']);
                }
            }
        }
        if (isset($options['id'])) {
            $builder->where('afil_id', $options['id']);
        }
        if (isset($options['cod'])) {
            $builder->where('afil_cod', $options['cod']);
        }
        if (isset($options['nome'])) {
            $builder->like('afil_nome', $options['nome']);
        }
        if (isset($options['email'])) {
            $builder->where('afil_email', $options['email']);
        }
        if (isset($options['timeclient'])) {
            $builder->where('afil_timeclient', $options['timeclient']);
        }
        if (isset($options['ativo'])) {
            $builder->where('afil_ativo', $options['ativo']);
        }
        if (isset($options['aliquotaComissao'])) {
            $builder->where("afil_comissao", $options['aliquotaComissao']);
        }
        if (isset($options['comissaoInclude'])) {
            $builder->like("afil_comissao", $options['comissaoInclude']);
        }
        if (isset($options['pagComissao'])) {
            $builder->where("afil_comissaopag", $options['pagComissao']);
        }
        if (isset($options['periodComissao'])) {
            $builder->where("afil_comissaoperiodo", $options['periodComissao']);
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
        if (isset($options['cod'])) {
            $postData['afil_cod'] = $options['cod'];
        } else {
            $postData['afil_cod'] = null;
        }

        if (isset($options['nome'])) {
            $postData['afil_nome'] = $options['nome'];
        } else {
            $postData['afil_nome'] = null;
        }

        if (isset($options['email'])) {
            $postData['afil_email'] = $options['email'];
        } else {
            $postData['afil_email'] = null;
        }

        if (isset($options['timeclient'])) {
            $postData['afil_timeclient'] = $options['timeclient'];
        } else {
            $postData['afil_timeclient'] = null;
        }

        if (isset($options['ativo'])) {
            $postData['afil_ativo'] = $options['ativo'];
        } else {
            $postData['afil_ativo'] = 0;
        }

        if (isset($options['aliquotaComissao'])) {
            $postData['afil_comissao'] = $options['aliquotaComissao'];
        } else {
            $postData['afil_comissao'] = null;
        }

        if (isset($options['comissaoInclude'])) {
            $postData['afil_comissaoinclude'] = $options['comissaoInclude'];
        } else {
            $postData['afil_comissaoinclude'] = null;
        }

        if (isset($options['dtCadastro'])) {
            $postData['afil_dtcadastro'] = $options['dtCadastro'];
        } else {
            $postData['afil_dtcadastro'] = date('Y-m-d H:i:s');
        }

        if (isset($options['pagComissao'])) {
            $postData['afil_comissaopag'] = $options['pagComissao'];
        } else {
            $postData['afil_comissaopag'] = 0;
        }

        if (isset($options['periodComissao'])) {
            $postData['afil_comissaoperiodo'] = $options['periodComissao'];
        } else {
            $postData['afil_comissaoperiodo'] = 30;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['cod'])) {
            $builder->set('afil_cod', $options['cod']);
        }
        if (isset($options['nome'])) {
            $builder->set('afil_nome', $options['nome']);
        }
        if (isset($options['email'])) {
            $builder->set('afil_email', $options['email']);
        }
        if (isset($options['timeclient'])) {
            $builder->set('afil_timeclient', $options['timeclient']);
        }
        if (isset($options['ativo'])) {
            $builder->set('afil_ativo', $options['ativo']);
        }
        if (isset($options['aliquotaComissao'])) {
            $builder->set("afil_comissao", $options['aliquotaComissao']);
        }
        if (isset($options['comissaoInclude'])) {
            $builder->set("afil_comissaoinclude", $options['comissaoInclude']);
        }
        if (isset($options['pagComissao'])) {
            $builder->set("afil_comissaopag", $options['pagComissao']);
        }
        if (isset($options['periodComissao'])) {
            $builder->set("afil_comissaoperiodo", $options['periodComissao']);
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
     * @param Afiliado $obj
     * @param AfiliadosFacade $facade
     * @return Afiliado
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'cod' => $obj->getCod(),
            'nome' => $obj->getNome(),
            'email' => $obj->getEmail(),
            'timeclient' => $obj->getTimeClient(),
            'ativo' => ($obj->getAtivo()) ? '1' : '0',
            'aliquotaComissao' => $obj->getAliquotaComissao(),
            'comissaoInclude' => $obj->getComissaoIncludeString(),
            'pagComissao' => ($obj->getPagComissao()) ? '1' : '0',
            'periodComissao' => ($obj->getPeriodComissao()) ? '1' : '0'
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
     * @param Afiliado $obj
     * @param AfiliadosFacade $facade
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