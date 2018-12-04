<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\TaxaOutraLoja;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class TaxaOutraLojaDAO extends Repository
{
    protected $table = "loc_taxa_outraloja";
    protected $primary_key = 'taxoloja_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new TaxaOutraLoja($facade);
            $obj->setId($dados->taxoloja_id)
                ->setLojaRetirada($dados->taxoloja_idretirada)
                ->setLojaDevolucao($dados->taxoloja_iddevolucao)
                ->setValor($dados->taxoloja_valor)
                ->setDataValidadeFinal($dados->taxoloja_datavalfim)
                ->setDataValidadeInicial($dados->taxoloja_datavalini)
                ->setAtivo(($dados->taxoloja_ativo == 1) ? true : false)
                ->setNome($dados->taxoloja_nome);
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
            if (isset($options['taxoloja_id'])) {
                $builder->where('taxoloja_id', $options['taxoloja_id']);
            }

            if (isset($options['taxoloja_idretirada'])) {
                $builder->where('taxoloja_idretirada', $options['taxoloja_idretirada']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('taxoloja_id', $options['id']);
        }

        if (isset($options['idLojaRetirada'])) {
            $builder->where('taxoloja_idretirada', $options['idLojaRetirada']);
        }

        if (isset($options['idLojaDevolucao'])) {
            $builder->where('taxoloja_iddevolucao', $options['idLojaDevolucao']);
        }

        if (isset($options['valor'])) {
            $builder->where('taxoloja_valor', $options['valor']);
        }

        if (isset($options['ativo'])) {
            $builder->where('taxoloja_ativo', $options['ativo']);
        }

        if (isset($options['dataValidadeInicial'])) {
            $builder->where('taxoloja_datavalini', "'" . $options['dataValidadeInicial'] . "'");
        }

        if (isset($options['dataValidadeFinal'])) {
            $builder->where('taxoloja_datavalfim', "'" . $options['dataValidadeFinal'] . "'");
        }

        if (isset($options['nome'])) {
            $builder->where('taxoloja_nome', "'" . $options['nome'] . "'");
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
        if (isset($options['idLojaRetirada'])) {
            $postData['taxoloja_idretirada'] = $options['loja'];
        } else {
            $postData['taxoloja_idretirada'] = null;
        }

        if (isset($options['idLojaDevolucao'])) {
            $postData['taxoloja_iddevolucao'] = $options['idLojaDevolucao'];
        } else {
            $postData['taxoloja_iddevolucao'] = null;
        }

        if (isset($options['valor'])) {
            $postData['taxoloja_valor'] = $options['valor'];
        } else {
            $postData['taxoloja_valor'] = null;
        }

        if (isset($options['ativo'])) {
            $postData['taxoloja_ativo'] = $options['ativo'];
        } else {
            $postData['taxoloja_ativo'] = null;
        }

        if (isset($options['dataValidadeInicial'])) {
            $postData['taxoloja_datavalini'] = $options['dataValidadeInicial'];
        } else {
            $postData['taxoloja_datavalini'] = null;
        }

        if (isset($options['dataValidadeFinal'])) {
            $postData['taxoloja_datavalfim'] = $options['dataValidadeFinal'];
        } else {
            $postData['taxoloja_datavalfim'] = null;
        }

        if (isset($options['nome'])) {
            $postData['taxoloja_nome'] = $options['nome'];
        } else {
            $postData['taxoloja_nome'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['idLojaRetirada'])) {
            $builder->set('taxoloja_idretirada', $options['idLojaRetirada']);
        }

        if (isset($options['idLojaDevolucao'])) {
            $builder->set('taxoloja_iddevolucao', $options['idLojaDevolucao']);
        }

        if (isset($options['valor'])) {
            $builder->set('taxoloja_valor', $options['valor']);
        }

        if (isset($options['ativo'])) {
            $builder->set('taxoloja_ativo', $options['ativo']);
        }

        if (isset($options['dataValidadeInicial'])) {
            $builder->set('taxoloja_datavalini', $options['dataValidadeInicial']);
        }

        if (isset($options['dataValidadeFinal'])) {
            $builder->set('taxoloja_datavalfim', $options['dataValidadeFinal']);
        }

        if (isset($options['nome'])) {
            $builder->set('taxoloja_nome', $options['nome']);
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
     * @param TaxaOutraLoja $obj
     * @param AluguelCarrosFacade $facade
     * @return TaxaOutraLoja
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'idLojaRetirada' => $obj->getIdLojaRetirada(),
            'idLojaDevolucao' => $obj->getIdLojaDevolucao(),
            'valor' => $obj->getValor(),
            'ativo' => ($obj->getAtivo()) ? '1' : '0',
            'dataValidadeInicial' => (is_object($obj->getDataValidadeInicial())) ? $obj->getDataValidadeInicial()->getDataHoraSql() : null,
            'dataValidadeFinal' => (is_object($obj->getDataValidadeFinal())) ? $obj->getDataValidadeFinal()->getDataHoraSql() : null,
            'nome' => $obj->getNome()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $txoutralj = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $txoutralj = $this->insert($this->queryBuilderInsert($options));
        }
        return $txoutralj;
    }

    /**
     * @param TaxaOutraLoja $obj
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