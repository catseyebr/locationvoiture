<?php

namespace Carroaluguel\Models\Financeiro\DAO;


use Carroaluguel\Models\Financeiro\Movimentacao;
use Carroaluguel\Models\FinanceiroFacade;
use Core\QueryBuilder;
use Core\Repository;

class MovimentacaoDAO extends Repository
{
    protected $table = "tb_movimentacao";
    protected $primary_key = 'mov_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Movimentacao($facade);
            $obj->setId($dados->mov_id)
                ->setTipo($dados->mov_tipo)
                ->setDescricao($dados->mov_descricao)
                ->setValor($dados->mov_valor)
                ->setDataVencimento($dados->mov_datavencimento)
                ->setCategoria($dados->mov_categoria)
                ->setTipoPagamento($dados->mov_pagamento)
                ->setConta($dados->mov_conta)
                ->setParcelamento($dados->mov_parcelamento)
                ->setDataCadastro($dados->mov_datacadastro)
                ->setDataQuitacao($dados->mov_dataquitacao)
                ->setVenda($dados->mov_venda)
                ->setFatura($dados->mov_fatura)
                ->setIdFatura($dados->mov_idfatura)
                ->setDataQuitacaoId($dados->mov_dataquitacao_id);
        }
        return $obj;
    }

    public function queryBuilder($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['count'])) {
            $builder->select('count(*)');
        }

        $custom_query = null;
        if (isset($options['id'])) {
            $builder->where("mov_id", $options['id']);
        }
        if (isset($options['tipo'])) {
            $builder->where("mov_tipo", $options['tipo']);
        }
        if (isset($options['descricao'])) {
            $builder->like("mov_descricao", $options['descricao']);
        }
        if (isset($options['valor'])) {
            $builder->where("mov_valor", $options['valor']);
        }
        if (isset($options['datavencimento'])) {
            $builder->where("mov_datavencimento", $options['datavencimento']);
        }
        if (isset($options['parcelamento'])) {
            $builder->like("mov_parcelamento", $options['parcelamento']);
        }
        if (isset($options['data_inicial']) && isset($options['data_final'])) {
            $builder->lower('mov_dataquitacao', "'" . $options['data_inicial'] . "'");
            $builder->greater('mov_dataquitacao', "'" . $options['data_final'] . "'");

        }
        if (isset($options['data_inicial_v']) && isset($options['data_final_v'])) {
            $builder->lower('mov_datavencimento', "'" . $options['data_inicial_v'] . "'");
            $builder->greater('mov_datavencimento', "'" . $options['data_final_v'] . "'");
            $builder->where_null('mov_dataquitacao');

        }
        if (isset($options['somar_total']) && isset($options['data_saldo']) && isset($options['tipo'])) {
            $custom_query = "SELECT sum(mov_valor::float) FROM tb_movimentacao WHERE mov_tipo = " . $options['tipo'] . " and mov_dataquitacao < '" . $options['data_saldo'] . "'";

        }
        if (isset($options['venda'])) {
            $builder->where("mov_venda", $options['venda']);
        }
        if (isset($options['fatura'])) {
            $builder->where("mov_fatura", $options['fatura']);
        }
        if (isset($options['idfatura'])) {
            $builder->where("mov_idfatura", $options['idfatura']);
        }
        if (isset($options['dataQuitacaoId'])) {
            $builder->where("mov_dataquitacao_id", $options['dataQuitacaoId']);
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

        $query = $builder->getQuery($this->table, $custom_query);

        return $query;
    }

    public function queryBuilderInsert($options)
    {
        $builder = new QueryBuilder();
        $postData = null;
        if (isset($options['tipo'])) {
            $postData['mov_tipo'] = $options['tipo'];
        } else {
            $postData['mov_tipo'] = null;
        }

        if (isset($options['descricao'])) {
            $postData['mov_descricao'] = $options['descricao'];
        } else {
            $postData['mov_descricao'] = null;
        }

        if (isset($options['valor'])) {
            $postData['mov_valor'] = $options['valor'];
        } else {
            $postData['mov_valor'] = null;
        }

        if (isset($options['dataVencimento'])) {
            $postData['mov_datavencimento'] = $options['dataVencimento'];
        } else {
            $postData['mov_datavencimento'] = null;
        }

        if (isset($options['categoria'])) {
            $postData['mov_categoria'] = $options['categoria'];
        } else {
            $postData['mov_categoria'] = null;
        }

        if (isset($options['pagamento'])) {
            $postData['mov_pagamento'] = $options['pagamento'];
        } else {
            $postData['mov_pagamento'] = null;
        }

        if (isset($options['conta'])) {
            $postData['mov_conta'] = $options['conta'];
        } else {
            $postData['mov_conta'] = null;
        }

        if (isset($options['parcelamento'])) {
            $postData['mov_parcelamento'] = $options['parcelamento'];
        } else {
            $postData['mov_parcelamento'] = null;
        }

        if (isset($options['dataCadastro'])) {
            $postData['mov_datacadastro'] = $options['dataCadastro'];
        } else {
            $postData['mov_datacadastro'] = null;
        }

        if (isset($options['dataQuitacao'])) {
            $postData['mov_dataquitacao'] = $options['dataQuitacao'];
        } else {
            $postData['mov_dataquitacao'] = null;
        }

        if (isset($options['venda'])) {
            $postData['mov_venda'] = $options['venda'];
        } else {
            $postData['mov_venda'] = null;
        }

        if (isset($options['fatura'])) {
            $postData['mov_fatura'] = $options['fatura'];
        } else {
            $postData['mov_fatura'] = null;
        }

        if (isset($options['idfatura'])) {
            $postData['mov_idfatura'] = $options['idfatura'];
        } else {
            $postData['mov_idfatura'] = null;
        }

        if (isset($options['dataQuitacaoId'])) {
            $postData['mov_dataquitacao_id'] = $options['dataQuitacaoId'];
        } else {
            $postData['mov_dataquitacao_id'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['tipo'])) {
            $builder->set("mov_tipo", $options['tipo']);
        }
        if (isset($options['descricao'])) {
            $builder->set("mov_descricao", $options['descricao']);
        }
        if (isset($options['valor'])) {
            $builder->set("mov_valor", $options['valor']);
        }
        if (isset($options['datavencimento'])) {
            $builder->set("mov_datavencimento", $options['datavencimento']);
        }
        if (isset($options['parcelamento'])) {
            $builder->set("mov_parcelamento", $options['parcelamento']);
        }
        if (isset($options['dataQuitacao'])) {
            $builder->set("mov_dataquitacao", $options['dataQuitacao']);
        }
        if (isset($options['venda'])) {
            $builder->set("mov_venda", $options['venda']);
        }
        if (isset($options['fatura'])) {
            $builder->set("mov_fatura", $options['fatura']);
        }
        if (isset($options['idfatura'])) {
            $builder->set("mov_idfatura", $options['idfatura']);
        }
        if (isset($options['dataQuitacaoId'])) {
            $builder->set("mov_dataquitacao_id", $options['dataQuitacaoId']);
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
     * @param Movimentacao $obj
     * @param FinanceiroFacade $facade
     * @return Movimentacao
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'tipo' => $obj->getTipo(),
            'descricao' => $obj->getDescricao(),
            'valor' => $obj->getValor(),
            'dataVencimento' => (is_object($obj->getDataVencimento())) ? $obj->getDataVencimento()->getDataHoraSql() : null,
            'categoria' => (is_object($obj->getCategoria())) ? $obj->getCategoria()->getId() : null,
            'pagamento' => (is_object($obj->getTipoPagamento())) ? $obj->getTipoPagamento()->getId() : null,
            'conta' => (is_object($obj->getConta())) ? $obj->getConta()->getId() : null,
            'parcelamento' => $obj->getParcelamento(),
            'dataCadastro' => (is_object($obj->getDataCadastro())) ? $obj->getDataCadastro()->getDataHoraSql() : null,
            'dataQuitacao' => (is_object($obj->getDataQuitacao())) ? $obj->getDataQuitacao()->getDataHoraSql() : null,
            'venda' => (is_object($obj->getVenda())) ? $obj->getVenda()->getId() : null,
            'fatura' => $obj->getFatura(),
            'idfatura' => $obj->getIdFatura(),
            'dataQuitacaoId' => $obj->getDataQuitacaoId()
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
     * @param Movimentacao $obj
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