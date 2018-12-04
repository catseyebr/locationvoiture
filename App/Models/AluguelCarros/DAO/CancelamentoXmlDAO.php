<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\CancelamentoXml;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class CancelamentoXmlDAO extends Repository
{
    protected $table = "loc_cancelamento_xml";
    protected $primary_key = 'cancel_xml_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new CancelamentoXml($facade);
            $obj->setId($dados->cancel_xml_id)
                ->setCodConfirmacao($dados->cancel_xml_confid)
                ->setStatus(($dados->cancel_xml_status == 1) ? true : false)
                ->setReserva($dados->cancel_xml_reserva)
                ->setLocadora($dados->cancel_xml_locadora)
                ->setOperador($dados->cancel_xml_operador)
                ->setData($dados->cancel_xml_data)
                ->setSendXml($dados->cancel_xml_sendxml)
                ->setReceivedXml($dados->cancel_xml_fullxml)
                ->setMotivo($dados->cancel_xml_motivo);
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
            if (isset($options['cancel_xml_id'])) {
                $builder->where('cancel_xml_id', $options['cancel_xml_id']);
            }
            if (isset($options['cancel_xml_confid'])) {
                $builder->where('cancel_xml_confid', $options['cancel_xml_confid']);
            }
            if (isset($options['cancel_xml_status'])) {
                $builder->where('cancel_xml_status', $options['cancel_xml_status']);
            }
            if (isset($options['cancel_xml_reserva'])) {
                $builder->where('cancel_xml_reserva', $options['cancel_xml_reserva']);
            }
            if (isset($options['cancel_xml_locadora'])) {
                $builder->where('cancel_xml_locadora', $options['cancel_xml_locadora']);
            }

        }
        if (isset($options['id'])) {
            $builder->where('cancel_xml_id', $options['id']);
        }

        if (isset($options['inId'])) {
            $builder->where_in('cancel_xml_id', $options['inId']);
        }

        if (isset($options['cod_confirmacao'])) {
            $builder->where('cancel_xml_confid', $options['cod_confirmacao']);
        }

        if (isset($options['status'])) {
            $builder->where('cancel_xml_status', $options['status']);
        }

        if (isset($options['reserva'])) {
            $builder->where('cancel_xml_reserva', $options['reserva']);
        }

        if (isset($options['locadora'])) {
            $builder->where('cancel_xml_locadora', $options['locadora']);
        }

        if (isset($options['operador'])) {
            $builder->where('cancel_xml_operador', $options['operador']);
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

        if (isset($options['cod_confirmacao'])) {
            $postData['cancel_xml_confid'] = $options['cod_confirmacao'];
        } else {
            $postData['cancel_xml_confid'] = null;
        }

        if (isset($options['status'])) {
            $postData['cancel_xml_status'] = $options['status'];
        } else {
            $postData['cancel_xml_status'] = null;
        }

        if (isset($options['reserva'])) {
            $postData['cancel_xml_reserva'] = $options['reserva'];
        } else {
            $postData['cancel_xml_reserva'] = null;
        }

        if (isset($options['locadora'])) {
            $postData['cancel_xml_locadora'] = $options['locadora'];
        } else {
            $postData['cancel_xml_locadora'] = null;
        }

        if (isset($options['operador'])) {
            $postData['cancel_xml_operador'] = $options['operador'];
        } else {
            $postData['cancel_xml_operador'] = null;
        }

        if (isset($options['data'])) {
            $postData['cancel_xml_data'] = $options['data'];
        } else {
            $postData['cancel_xml_data'] = date('Y-m-d H:i:s');
        }

        if (isset($options['sendxml'])) {
            $postData['cancel_xml_sendxml'] = $options['sendxml'];
        } else {
            $postData['cancel_xml_sendxml'] = null;
        }

        if (isset($options['receivedxml'])) {
            $postData['cancel_xml_fullxml'] = $options['receivedxml'];
        } else {
            $postData['cancel_xml_fullxml'] = null;
        }

        if (isset($options['motivo'])) {
            $postData['cancel_xml_motivo'] = $options['motivo'];
        } else {
            $postData['cancel_xml_motivo'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['cod_confirmacao'])) {
            $builder->set('cancel_xml_confid', $options['nome']);
        }
        if (isset($options['status'])) {
            $builder->set('cancel_xml_status', $options['status']);
        }
        if (isset($options['reserva'])) {
            $builder->set('cancel_xml_reserva', $options['reserva']);
        }
        if (isset($options['locadora'])) {
            $builder->set('cancel_xml_locadora', $options['locadora']);
        }
        if (isset($options['operador'])) {
            $builder->set('cancel_xml_operador', $options['operador']);
        }
        if (isset($options['sendxml'])) {
            $builder->set('cancel_xml_data', $options['sendxml']);
        }
        if (isset($options['receivedxml'])) {
            $builder->set('cancel_xml_fullxml', $options['receivedxml']);
        }
        if (isset($options['motivo'])) {
            $builder->set('cancel_xml_motivo', $options['motivo']);
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
     * @param CancelamentoXml $obj
     * @param AluguelCarrosFacade $facade
     * @return CancelamentoXml
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'cod_confirmacao' => $obj->getCodConfirmacao(),
            'status' => ($obj->getStatus()) ? 1 : 0,
            'reserva' => (is_object($obj->getReserva())) ? $obj->getReserva()->getId() : null,
            'locadora' => (is_object($obj->getLocadora())) ? $obj->getLocadora()->getId() : null,
            'operador' => $obj->getOperador(),
            'data' => (is_object($obj->getData())) ? $obj->getData()->getDataHoraSql() : null,
            'sendxml' => $obj->getSendXml(),
            'receivedxml' => $obj->getReceivedXml(),
            'motivo' => $obj->getMotivo()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $cancelxml = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $cancelxml = $this->insert($this->queryBuilderInsert($options));
        }
        return $cancelxml;
    }

    /**
     * @param CancelamentoXml $obj
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