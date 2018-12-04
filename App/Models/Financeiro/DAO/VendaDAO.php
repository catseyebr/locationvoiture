<?php

namespace Carroaluguel\Models\Financeiro\DAO;


use Carroaluguel\Models\Financeiro\Venda;
use Carroaluguel\Models\FinanceiroFacade;
use Core\DateTimeUnit;
use Core\Period;
use Core\QueryBuilder;
use Core\Repository;

class VendaDAO extends Repository
{
    protected $table = "tb_venda";
    protected $primary_key = 'ven_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Venda($facade);
            $obj->setId($dados->ven_id)
                ->setProduto($dados->ven_produto)
                ->setCliente($dados->ven_cliente)
                ->setCondutor($dados->ven_condutor)
                ->setFornecedor($dados->ven_fornecedor)
                ->setReserva($dados->ven_reserva);
            $data_inicial = new DateTimeUnit($dados->ven_datainicial);
            $data_final = new DateTimeUnit($dados->ven_datafinal);
            $periodo_venda = new Period($data_inicial->getDataHora(), $data_final->getDataHora());
            $obj->setPeriodo($periodo_venda)
                ->setConfFornecedor($dados->ven_conf_fornecedor)
                ->setValorTotal($dados->ven_valortotal)
                ->setValorComissao($dados->ven_valorcomissao)
                ->setAliquotaComissao($dados->ven_aliquotacomissao)
                ->setDataVencimento($dados->ven_datavencimento)
                ->setStatus($dados->ven_status)
                ->setDataEnvioCobrancaComissao($dados->ven_dataenviocobrancacomissao)
                ->setDataEnvioCobranca($dados->ven_dataenviocobranca)
                ->setDataAtualizacao($dados->ven_dataatualizacao)
                ->setDataBaixa($dados->ven_databaixa)
                ->setValorRecebido($dados->ven_valorrecebido)
                ->setObsBaixa($dados->ven_obsbaixa)
                ->setContaBaixa($dados->ven_baixaconta)
                ->setVendedor($dados->ven_vendedor)
                ->setArquivoProcessamento($dados->ven_arquivoprocessamento)
                ->setDataProcessamento($dados->ven_dataarquivoprocessamento)
                ->setLocadora($dados->ven_locadora)
                ->setCpfCliente($dados->ven_cpf_cliente)
                ->setCidade($dados->ven_cidade)
                ->setIdConf($dados->ven_idconf);
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
            if (isset($options['ven_id'])) {
                $builder->where("ven_id", $options['ven_id']);
            }
            if (isset($options['ven_reserva'])) {
                $builder->where("ven_reserva", $options['ven_reserva']);
            }
            if (isset($options['ven_produto'])) {
                $builder->where("ven_produto", $options['ven_produto']);
            }
            if (isset($options['ven_cliente'])) {
                $builder->like("ven_cliente", $options['ven_cliente']);
            }
            if (isset($options['ven_fornecedor'])) {
                $builder->where("ven_fornecedor", $options['ven_fornecedor']);
            }
            if (isset($options['ven_status'])) {
                $builder->where("ven_status", $options['ven_status']);
            }
            if (isset($options['ven_conf_fornecedor'])) {
                $builder->like("ven_conf_fornecedor", $options['ven_conf_fornecedor']);
            }
            if (isset($options['ven_locadora'])) {
                $builder->where("ven_locadora", $options['ven_locadora']);
            }
            if (isset($options['ven_cidade'])) {
                $builder->like("ven_cidade", $options['ven_cidade']);
            }
            if (isset($options['ven_vendedor'])) {
                $builder->like("ven_vendedor", $options['ven_vendedor']);
            }
            if (isset($options['ven_vendedor_notnull'])) {
                $builder->where_notnull('ven_vendedor');
            }
            if (isset($options['ven_idconf'])) {
                $builder->where("ven_idconf", $options['ven_idconf']);
            }
        }
        if (isset($options['sortFornecedor'])) {
            if ($options['sortFornecedor'] == 'ASC' || $options['sortFornecedor'] == 'DESC') {
                $builder->tableJoin('tb_fornecedor', 'tb_fornecedor.forn_id = tb_venda.ven_fornecedor', 'LEFT');
                $builder->order_by('tb_fornecedor.forn_nome', $options['sortFornecedor']);
            }
        }
        $custom_query = null;
        if (isset($options['id'])) {
            $builder->where("ven_id", $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in("ven_id", $options['inId']);
        }
        if (isset($options['produto'])) {
            $builder->where("ven_produto", $options['produto']);
        }
        if (isset($options['cliente'])) {
            $builder->where("ven_cliente", $options['cliente']);
        }
        if (isset($options['condutor'])) {
            $builder->where("ven_condutor", $options['condutor']);
        }
        if (isset($options['fornecedor'])) {
            $builder->where("ven_fornecedor", $options['fornecedor']);
        }
        if (isset($options['inFornecedor'])) {
            $builder->where_in("ven_fornecedor", $options['inFornecedor']);
        }
        if (isset($options['reserva'])) {
            $builder->where("ven_reserva", $options['reserva']);
        }
        if (isset($options['dataInicial'])) {
            $builder->where("ven_datainicial", $options['dataInicial']);
        }
        if (isset($options['dataFinal'])) {
            $builder->where("ven_datafinal", $options['dataFinal']);
        }
        if (isset($options['dataInicialReport']) && isset($options['dataFinalReport'])) {
            $builder->lower('ven_datafinal', "'" . $options['dataInicialReport'] . "'");
            $builder->greater('ven_datafinal', "'" . $options['dataFinalReport'] . "'");
        }
        if (isset($options['dataFinalValida'])) {
            $builder->lower('ven_datafinal', "'2014-05-01 00:00:00'");
            $builder->greater('ven_datafinal', "'" . $options['dataFinalValida'] . "'");
        }
        if (isset($options['dataQuitacaoId'])) {
            $builder->tableJoin('tb_movimentacao', 'tb_movimentacao.mov_venda = tb_venda.ven_id', 'LEFT');
            $builder->greater("mov_dataquitacao_id", $options['dataQuitacaoId']);
        }
        if (isset($options['dataQuitacaoPer'])) {
            $builder->tableJoin('tb_movimentacao', 'tb_movimentacao.mov_venda = tb_venda.ven_id', 'LEFT');
            $builder->greater('mov_dataquitacao', "'" . $options['dataQuitacaoPer'] . " 23:59:59'");
            $builder->lower('mov_dataquitacao', "'" . $options['dataQuitacaoPer'] . " 00:00:00'");
        }
        if (isset($options['dataQuitacaoPeriodo'])) {
            $builder->tableJoin('tb_movimentacao', 'tb_movimentacao.mov_venda = tb_venda.ven_id', 'LEFT');
            $builder->greater('mov_dataquitacao', "'" . $options['dataQuitacaoPerFinal'] . "'");
            $builder->lower('mov_dataquitacao', "'" . $options['dataQuitacaoPerInicial'] . "'");
        }
        if (isset($options['confFornecedor'])) {
            $builder->where("ven_conf_fornecedor", $options['confFornecedor']);
        }
        if (isset($options['valorTotal'])) {
            $builder->where("ven_valortotal", $options['valorTotal']);
        }
        if (isset($options['valorComissao'])) {
            $builder->where("ven_valorcomissao", $options['valorComissao']);
        }
        if (isset($options['aliquotaComissao'])) {
            $builder->where("ven_aliquotacomissao", $options['aliquotaComissao']);
        }
        if (isset($options['dataVencimento'])) {
            $builder->greater('ven_datavencimento', "'" . $options['dataVencimento'] . " 23:59:59'");
            $builder->lower('ven_datavencimento', "'" . $options['dataVencimento'] . " 00:00:00'");
        }
        if (isset($options['status'])) {
            $builder->where("ven_status", $options['status']);
        }
        if (isset($options['inStatus'])) {
            $builder->where_in("ven_status", $options['inStatus']);
        }
        if (isset($options['dataEnvioCobrancaComissao'])) {
            $builder->where("ven_dataenviocobrancacomissao", $options['dataEnvioCobrancaComissao']);
        }
        if (isset($options['dataEnvioCobranca'])) {
            $builder->where("ven_dataenviocobranca", $options['dataEnvioCobranca']);
        }
        if (isset($options['vendedor'])) {
            $builder->where("ven_vendedor", $options['vendedor']);
        }
        if (isset($options['vendedor_notnull'])) {
            $builder->where_notnull('ven_vendedor');
        }
        if (isset($options['arquivoProcessamento'])) {
            $builder->where("ven_arquivoprocessamento", $options['arquivoProcessamento']);
        }
        if (isset($options['dataArquivoProcessamento'])) {
            $builder->where("ven_dataarquivoprocessamento", $options['dataArquivoProcessamento']);
        }
        if (isset($options['locadora'])) {
            $builder->where("ven_locadora", $options['locadora']);
        }
        if (isset($options['null_locadora'])) {
            $builder->where_null("ven_locadora");
        }
        if (isset($options['cpf'])) {
            $builder->where("ven_cpf_cliente", $options['cpf']);
        }
        if (isset($options['cidade'])) {
            $builder->where("ven_cidade", $options['cidade']);
        }
        if (isset($options['idconf'])) {
            $builder->where("ven_idconf", $options['idconf']);
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
        if (isset($options['produto'])) {
            $postData['ven_produto'] = $options['produto'];
        } else {
            $postData['ven_produto'] = null;
        }

        if (isset($options['cliente'])) {
            $postData['ven_cliente'] = $options['cliente'];
        } else {
            $postData['ven_cliente'] = null;
        }

        if (isset($options['condutor'])) {
            $postData['ven_condutor'] = $options['condutor'];
        } else {
            $postData['ven_condutor'] = null;
        }

        if (isset($options['fornecedor'])) {
            $postData['ven_fornecedor'] = $options['fornecedor'];
        } else {
            $postData['ven_fornecedor'] = null;
        }

        if (isset($options['reserva'])) {
            $postData['ven_reserva'] = $options['reserva'];
        } else {
            $postData['ven_reserva'] = null;
        }

        if (isset($options['dataInicial'])) {
            $postData['ven_datainicial'] = $options['dataInicial'];
        } else {
            $postData['ven_datainicial'] = null;
        }

        if (isset($options['dataFinal'])) {
            $postData['ven_datafinal'] = $options['dataFinal'];
        } else {
            $postData['ven_datafinal'] = null;
        }

        if (isset($options['confFornecedor'])) {
            $postData['ven_conf_fornecedor'] = $options['confFornecedor'];
        } else {
            $postData['ven_conf_fornecedor'] = null;
        }

        if (isset($options['valorTotal'])) {
            $postData['ven_valortotal'] = $options['valorTotal'];
        } else {
            $postData['ven_valortotal'] = null;
        }

        if (isset($options['valorComissao'])) {
            $postData['ven_valorcomissao'] = $options['valorComissao'];
        } else {
            $postData['ven_valorcomissao'] = null;
        }

        if (isset($options['valorCalculo'])) {
            $postData['ven_valorcalculo'] = $options['valorCalculo'];
        } else {
            $postData['ven_valorcalculo'] = null;
        }

        if (isset($options['aliquotaComissao'])) {
            $postData['ven_aliquotacomissao'] = $options['aliquotaComissao'];
        } else {
            $postData['ven_aliquotacomissao'] = null;
        }

        if (isset($options['dataVencimento'])) {
            $postData['ven_datavencimento'] = $options['dataVencimento'];
        } else {
            $postData['ven_datavencimento'] = null;
        }

        if (isset($options['status'])) {
            $postData['ven_status'] = $options['status'];
        } else {
            $postData['ven_status'] = null;
        }

        if (isset($options['dataEnvioCobrancaComissao'])) {
            $postData['ven_dataenviocobrancacomissao'] = $options['dataEnvioCobrancaComissao'];
        } else {
            $postData['ven_dataenviocobrancacomissao'] = null;
        }

        if (isset($options['dataEnvioCobranca'])) {
            $postData['ven_dataenviocobranca'] = $options['dataEnvioCobranca'];
        } else {
            $postData['ven_dataenviocobranca'] = null;
        }

        if (isset($options['vendedor'])) {
            $postData['ven_vendedor'] = $options['vendedor'];
        } else {
            $postData['ven_vendedor'] = null;
        }

        $postData['ven_dataatualizacao'] = date("Y-m-d H:i:s");

        if (isset($options['locadora'])) {
            $postData['ven_locadora'] = $options['locadora'];
        } else {
            $postData['ven_locadora'] = null;
        }

        if (isset($options['cpf'])) {
            $postData['ven_cpf_cliente'] = $options['cpf'];
        } else {
            $postData['ven_cpf_cliente'] = null;
        }

        if (isset($options['cidade'])) {
            $postData['ven_cidade'] = $options['cidade'];
        } else {
            $postData['ven_cidade'] = null;
        }

        if (isset($options['idconf'])) {
            $postData['ven_idconf'] = $options['idconf'];
        } else {
            $postData['ven_idconf'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['produto'])) {
            $builder->set("ven_produto", $options['produto']);
        }
        if (isset($options['cliente'])) {
            $builder->set("ven_cliente", $options['cliente']);
        }
        if (isset($options['condutor'])) {
            $builder->set("ven_condutor", $options['condutor']);
        }
        if (isset($options['fornecedor'])) {
            $builder->set("ven_fornecedor", $options['fornecedor']);
        }
        if (isset($options['reserva'])) {
            $builder->set("ven_reserva", $options['reserva']);
        }
        if (isset($options['dataInicial'])) {
            $builder->set("ven_datainicial", $options['dataInicial']);
        }
        if (isset($options['dataFinal'])) {
            $builder->set("ven_datafinal", $options['dataFinal']);
        }
        if (isset($options['confFornecedor'])) {
            $builder->set("ven_conf_fornecedor", $options['confFornecedor']);
        }
        if (isset($options['valorTotal'])) {
            $builder->set("ven_valortotal", $options['valorTotal']);
        }
        if (isset($options['valorComissao'])) {
            $builder->set("ven_valorcomissao", $options['valorComissao']);
        }
        if (isset($options['valorCalculo'])) {
            $builder->set("ven_valorcalculo", $options['valorCalculo']);
        }
        if (isset($options['aliquotaComissao'])) {
            $builder->set("ven_aliquotacomissao", $options['aliquotaComissao']);
        }
        if (isset($options['dataVencimento'])) {
            $builder->set("ven_datavencimento", $options['dataVencimento']);
        }
        if (isset($options['status'])) {
            $builder->set("ven_status", $options['status']);
        }
        if (isset($options['dataEnvioCobrancaComissao'])) {
            $builder->set("ven_dataenviocobrancacomissao", $options['dataEnvioCobrancaComissao']);
        }
        if (isset($options['dataEnvioCobranca'])) {
            $builder->set("ven_dataenviocobranca", $options['dataEnvioCobranca']);
        }
        $builder->set("ven_dataatualizacao", date("Y-m-d H:i:s"));
        if (isset($options['dataBaixa'])) {
            $builder->set("ven_databaixa", $options['dataBaixa']);
        }
        if (isset($options['valorRecebido'])) {
            $builder->set("ven_valorrecebido", $options['valorRecebido']);
        }
        if (isset($options['obsBaixa'])) {
            $builder->set("ven_obsbaixa", $options['obsBaixa']);
        }
        if (isset($options['contaBaixa'])) {
            $builder->set("ven_baixaconta", $options['contaBaixa']);
        }
        if (isset($options['vendedor'])) {
            $builder->set("ven_vendedor", $options['vendedor']);
        }
        if (isset($options['arquivoProcessamento'])) {
            $builder->set("ven_arquivoprocessamento", $options['arquivoProcessamento']);
        }
        if (isset($options['dataArquivoProcessamento'])) {
            $builder->set("ven_dataarquivoprocessamento", $options['dataArquivoProcessamento']);
        }
        if (isset($options['locadora'])) {
            $builder->set("ven_locadora", $options['locadora']);
        }
        if (isset($options['cpf'])) {
            $builder->set("ven_cpf_cliente", $options['cpf']);
        }
        if (isset($options['cidade'])) {
            $builder->set("ven_cidade", $options['cidade']);
        }
        if (isset($options['idconf'])) {
            $builder->set("ven_idconf", $options['idconf']);
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
     * @param Venda $obj
     * @param FinanceiroFacade $facade
     * @return Venda
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'produto' => $obj->getProduto()->getId(),
            'cliente' => (is_object($obj->getCliente())) ? $obj->getCliente()->getId() : null,
            'condutor' => (is_object($obj->getCondutor())) ? $obj->getCondutor()->getId() : null,
            'fornecedor' => (is_object($obj->getFornecedor())) ? $obj->getFornecedor()->getId() : null,
            'reserva' => $obj->getReserva(),
            'dataInicial' => (is_object($obj->getPeriodo())) ? $obj->getPeriodo()->getDataHoraInicial()->getDataHoraSql() : null,
            'dataFinal' => (is_object($obj->getPeriodo())) ? $obj->getPeriodo()->getDataHoraFinal()->getDataHoraSql() : null,
            'confFornecedor' => $obj->getConfFornecedor(),
            'valorTotal' => $obj->getValorTotal(),
            'valorComissao' => $obj->getValorComissao(),
            'valorCalculo' => $obj->getValorCalculo(),
            'aliquotaComissao' => $obj->getAliquotaComissao(),
            'dataVencimento' => (is_object($obj->getDataVencimento())) ? $obj->getDataVencimento()->getDataHoraSql() : null,
            'status' => $obj->getStatus()->getId(),
            'dataEnvioCobrancaComissao' => (is_object($obj->getDataEnvioCobrancaComissao())) ? $obj->getDataEnvioCobrancaComissao() : null,
            'dataEnvioCobranca' => (is_object($obj->getDataEnvioCobranca())) ? $obj->getDataEnvioCobranca() : null,
            'dataBaixa' => (is_object($obj->getDataBaixa())) ? $obj->getDataBaixa()->getDataHoraSql() : null,
            'valorRecebido' => $obj->getValorRecebido(),
            'obsBaixa' => $obj->getObsBaixa(),
            'contaBaixa' => $obj->getContaBaixa(),
            'vendedor' => $obj->getVendedor(),
            'arquivoProcessamento' => $obj->getArquivoProcessamento(),
            'dataArquivoProcessamento' => (is_object($obj->getDataProcessamento()) ? $obj->getDataProcessamento()->getDataHoraSql() : null),
            'locadora' => (is_object($obj->getLocadora()) ? $obj->getLocadora()->getId() : null),
            'cpf' => $obj->getCpfCliente(),
            'cidade' => $obj->getCidade(),
            'idconf' => $obj->getIdConf()
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
     * @param Venda $obj
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