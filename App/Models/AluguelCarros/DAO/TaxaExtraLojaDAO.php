<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\TaxaExtraLoja;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class TaxaExtraLojaDAO extends Repository
{
    protected $table = "loc_taxa_extra";
    protected $primary_key = 'txextra_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new TaxaExtraLoja($facade);
            $obj->setId($dados->txextra_id)
                ->setLoja($dados->txextra_loja_id)
                ->setNome($dados->txextra_nome)
                ->setHoraInicial($dados->txextra_hora_inicial)
                ->setHoraFinal($dados->txextra_hora_final)
                ->setValidadeInicial($dados->txextra_validade_inicial)
                ->setValidadeFinal($dados->txextra_validade_final)
                ->setValor($dados->txextra_valor)
                ->setDiario(($dados->txextra_diario == 1) ? true : false)
                ->setRetiradaDevolucao($dados->txextra_retidevo)
                ->setDiaIni($dados->txextra_diaini)
                ->setDiaFim($dados->txextra_diafim);
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
            if (isset($options['txextra_id'])) {
                $builder->where('txextra_id', $options['txextra_id']);
            }
            if (isset($options['txextra_loja_id'])) {
                $builder->where('txextra_loja_id', $options['txextra_loja_id']);
            }
        }

        if (isset($options['id'])) {
            $builder->where('txextra_id', $options['id']);
        }

        if (isset($options['loja'])) {
            $builder->where('txextra_loja_id', $options['loja']);
        }

        if (isset($options['hora_inicial'])) {
            $builder->greater('txextra_hora_inicial', "'" . $options['hora_inicial'] . "'");
        }

        if (isset($options['hora_final'])) {
            $builder->lower('txextra_hora_final', "'" . $options['hora_final'] . "'");
        }

        if (isset($options['valor'])) {
            $builder->where('txextra_valor', $options['valor']);
        }

        if (isset($options['validade_inicial'])) {
            $builder->greater('txextra_validade_inicial', "'" . $options['validade_inicial'] . "'");
        }

        if (isset($options['validade_final'])) {
            $builder->lower('txextra_validade_final', "'" . $options['validade_final'] . "'");
        }

        if (isset($options['diario'])) {
            $builder->where('txextra_diario', $options['diario']);
        }

        if (isset($options['retiradadevolucao'])) {
            $builder->where_in('txextra_retidevo', $options['retiradadevolucao']);
        }

        if (isset($options['dom'])) {
            $builder->where_in('txextra_dom', $options['dom']);
        }

        if (isset($options['seg'])) {
            $builder->where_in('txextra_seg', $options['seg']);
        }

        if (isset($options['ter'])) {
            $builder->where_in('txextra_ter', $options['ter']);
        }

        if (isset($options['qua'])) {
            $builder->where_in('txextra_qua', $options['qua']);
        }

        if (isset($options['qui'])) {
            $builder->where_in('txextra_qui', $options['qui']);
        }

        if (isset($options['sex'])) {
            $builder->where_in('txextra_sex', $options['sex']);
        }

        if (isset($options['sab'])) {
            $builder->where_in('txextra_sab', $options['sab']);
        }

        if (isset($options['diaIni'])) {
            $builder->greater('txextra_diaini', $options['diaIni']);
        }

        if (isset($options['diaFim'])) {
            $builder->lower('txextra_diafim', $options['diaFim']);
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
        if (isset($options['loja'])) {
            $postData['txextra_loja_id'] = $options['loja'];
        } else {
            $postData['txextra_loja_id'] = null;
        }

        if (isset($options['nome'])) {
            $postData['txextra_nome'] = $options['nome'];
        } else {
            $postData['txextra_nome'] = null;
        }

        if (isset($options['hora_inicial'])) {
            $postData['txextra_hora_inicial'] = $options['hora_inicial'];
        } else {
            $postData['txextra_hora_inicial'] = null;
        }

        if (isset($options['hora_final'])) {
            $postData['txextra_hora_final'] = $options['hora_final'];
        } else {
            $postData['txextra_hora_final'] = null;
        }

        if (isset($options['valor'])) {
            $postData['txextra_valor'] = $options['valor'];
        } else {
            $postData['txextra_valor'] = null;
        }

        if (isset($options['validade_inicial'])) {
            $postData['txextra_validade_inicial'] = $options['validade_inicial'];
        } else {
            $postData['txextra_validade_inicial'] = null;
        }

        if (isset($options['validade_final'])) {
            $postData['txextra_validade_final'] = $options['validade_final'];
        } else {
            $postData['txextra_validade_final'] = null;
        }

        if (isset($options['diario'])) {
            $postData['txextra_diario'] = $options['diario'];
        } else {
            $postData['txextra_diario'] = null;
        }

        if (isset($options['retiradadevolucao'])) {
            $postData['txextra_retidevo'] = $options['retiradadevolucao'];
        } else {
            $postData['txextra_retidevo'] = null;
        }

        if (isset($options['dom'])) {
            $postData['txextra_dom'] = $options['dom'];
        } else {
            $postData['txextra_dom'] = null;
        }

        if (isset($options['seg'])) {
            $postData['txextra_seg'] = $options['seg'];
        } else {
            $postData['txextra_seg'] = null;
        }

        if (isset($options['ter'])) {
            $postData['txextra_ter'] = $options['ter'];
        } else {
            $postData['txextra_ter'] = null;
        }

        if (isset($options['qua'])) {
            $postData['txextra_qua'] = $options['qua'];
        } else {
            $postData['txextra_qua'] = null;
        }

        if (isset($options['qui'])) {
            $postData['txextra_qui'] = $options['qui'];
        } else {
            $postData['txextra_qui'] = null;
        }

        if (isset($options['sex'])) {
            $postData['txextra_sex'] = $options['sex'];
        } else {
            $postData['txextra_sex'] = null;
        }

        if (isset($options['sab'])) {
            $postData['txextra_sab'] = $options['sab'];
        } else {
            $postData['txextra_sab'] = null;
        }

        if (isset($options['diaIni'])) {
            $postData['txextra_diaini'] = $options['diaIni'];
        } else {
            $postData['txextra_diaini'] = null;
        }

        if (isset($options['diaFim'])) {
            $postData['txextra_diafim'] = $options['diaFim'];
        } else {
            $postData['txextra_diafim'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['loja'])) {
            $builder->set('txextra_loja_id', $options['loja']);
        }
        if (isset($options['nome'])) {
            $builder->set('txextra_nome', $options['nome']);
        }
        if (isset($options['hora_inicial'])) {
            $builder->set('txextra_hora_inicial', $options['hora_inicial']);
        }
        if (isset($options['hora_final'])) {
            $builder->set('txextra_hora_final', $options['hora_final']);
        }
        if (isset($options['valor'])) {
            $builder->set('txextra_valor', $options['valor']);
        }
        if (isset($options['validade_inicial'])) {
            $builder->set('txextra_validade_inicial', $options['validade_inicial']);
        }
        if (isset($options['validade_final'])) {
            $builder->set('txextra_validade_final', $options['validade_final']);
        }
        if (isset($options['diario'])) {
            $builder->set('txextra_diario', $options['diario']);
        }
        if (isset($options['retiradadevolucao'])) {
            $builder->set('txextra_retidevo', $options['retiradadevolucao']);
        }
        if (isset($options['dom'])) {
            $builder->set('txextra_dom', $options['dom']);
        }
        if (isset($options['seg'])) {
            $builder->set('txextra_seg', $options['seg']);
        }
        if (isset($options['ter'])) {
            $builder->set('txextra_ter', $options['ter']);
        }
        if (isset($options['qua'])) {
            $builder->set('txextra_qua', $options['qua']);
        }
        if (isset($options['qui'])) {
            $builder->set('txextra_qui', $options['qui']);
        }
        if (isset($options['sex'])) {
            $builder->set('txextra_sex', $options['sex']);
        }
        if (isset($options['sab'])) {
            $builder->set('txextra_sab', $options['sab']);
        }
        if (isset($options['diaIni'])) {
            $builder->set('txextra_diaini', $options['diaIni']);
        }
        if (isset($options['diaFim'])) {
            $builder->set('txextra_diafim', $options['diaFim']);
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
     * @param TaxaExtraLoja $obj
     * @param AluguelCarrosFacade $facade
     * @return TaxaExtraLoja
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getLoja()->getId(),
            'hora_inicial' => $obj->getHoraInicial(),
            'hora_final' => $obj->getHoraFinal(),
            'valor' => $obj->getValor(),
            'validade_inicial' => $obj->getValidadeInicial()->getDataHoraSql(),
            'validade_final' => $obj->getValidadeFinal()->getDataHoraSql(),
            'diario' => ($obj->getDiario()) ? '1' : '0',
            'retiradadevolucao' => $obj->getRetiradaDevolucao(),
            'dom' => null,
            'seg' => null,
            'ter' => null,
            'qua' => null,
            'qui' => null,
            'sex' => null,
            'sab' => null,
            'diaIni' => $obj->getDiaIni(),
            'diaFim' => $obj->getDiaFim(),
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $txextra = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $txextra = $this->insert($this->queryBuilderInsert($options));
        }
        return $txextra;
    }

    /**
     * @param TaxaExtraLoja $obj
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