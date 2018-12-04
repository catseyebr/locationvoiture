<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\DadosDelivery;
use Carroaluguel\Models\AluguelCarrosFacade;
use Carroaluguel\Models\Localidade\Endereco;
use Core\QueryBuilder;
use Core\Repository;

class DadosDeliveryDAO extends Repository
{
    protected $table = "loc_dados_delivery";
    protected $primary_key = 'ddelivery_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new DadosDelivery($facade);
            $obj->setId($dados->ddelivery_id)
                ->setDelivery($dados->ddelivery_deliveryid);
            $endereco = new Endereco();
            $endereco->setCep($dados->ddelivery_cep)
                ->setRua($dados->ddelivery_endereco)
                ->setNumero($dados->ddelivery_numero)
                ->setComplemento($dados->ddelivery_complemento)
                ->setCidade($dados->ddelivery_cidade)
                ->setBairro($dados->ddelivery_bairro);
            $obj->setEndereco($endereco)
                ->setNome($dados->ddelivery_nome)
                ->setFone($dados->ddelivery_fone)
                ->setCelular($dados->ddelivery_celular)
                ->setObs($dados->ddelivery_obs)
                ->setDataCadastro($dados->ddelivery_data)
                ->setValor($dados->ddelivery_valor);
        }
        return $obj;
    }

    public function queryBuilder($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['count'])) {
            $builder->select('count(*)');
        }

        if (isset($options['id'])) {
            $builder->where('ddelivery_id', $options['id']);
        }

        if (isset($options['delivery'])) {
            $builder->where('ddelivery_deliveryid', $options['delivery']);
        }

        if (isset($options['cep'])) {
            $builder->like('ddelivery_cep', $options['cep']);
        }

        if (isset($options['endereco'])) {
            $builder->like('ddelivery_endereco', $options['endereco']);
        }

        if (isset($options['numero'])) {
            $builder->like('ddelivery_numero', $options['numero']);
        }

        if (isset($options['complemento'])) {
            $builder->like('ddelivery_complemento', $options['complemento']);
        }

        if (isset($options['cidade'])) {
            $builder->where('ddelivery_cidade', $options['cidade']);
        }

        if (isset($options['bairro'])) {
            $builder->like('ddelivery_bairro', $options['bairro']);
        }

        if (isset($options['nome'])) {
            $builder->like('ddelivery_nome', $options['nome']);
        }

        if (isset($options['fone'])) {
            $builder->like('ddelivery_fone', $options['fone']);
        }

        if (isset($options['celular'])) {
            $builder->like('ddelivery_celular', $options['celular']);
        }

        if (isset($options['obs'])) {
            $builder->like('ddelivery_obs', $options['obs']);
        }

        if (isset($options['data'])) {
            $builder->like('ddelivery_data', $options['data']);
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

        if (isset($options['delivery'])) {
            $postData['ddelivery_deliveryid'] = $options['delivery'];
        } else {
            $postData['ddelivery_deliveryid'] = null;
        }

        if (isset($options['cep'])) {
            $postData['ddelivery_cep'] = $options['cep'];
        } else {
            $postData['ddelivery_cep'] = null;
        }

        if (isset($options['endereco'])) {
            $postData['ddelivery_endereco'] = $options['endereco'];
        } else {
            $postData['ddelivery_endereco'] = null;
        }

        if (isset($options['numero'])) {
            $postData['ddelivery_numero'] = $options['numero'];
        } else {
            $postData['ddelivery_numero'] = null;
        }

        if (isset($options['complemento'])) {
            $postData['ddelivery_complemento'] = $options['complemento'];
        } else {
            $postData['ddelivery_complemento'] = null;
        }

        if (isset($options['cidade'])) {
            $postData['ddelivery_cidade'] = $options['cidade'];
        } else {
            $postData['ddelivery_cidade'] = null;
        }

        if (isset($options['bairro'])) {
            $postData['ddelivery_bairro'] = $options['bairro'];
        } else {
            $postData['ddelivery_bairro'] = null;
        }

        if (isset($options['nome'])) {
            $postData['ddelivery_nome'] = $options['nome'];
        } else {
            $postData['ddelivery_nome'] = null;
        }

        if (isset($options['fone'])) {
            $postData['ddelivery_fone'] = $options['fone'];
        } else {
            $postData['ddelivery_fone'] = null;
        }

        if (isset($options['celular'])) {
            $postData['ddelivery_celular'] = $options['celular'];
        } else {
            $postData['ddelivery_celular'] = null;
        }

        if (isset($options['obs'])) {
            $postData['ddelivery_obs'] = $options['obs'];
        } else {
            $postData['ddelivery_obs'] = null;
        }

        if (isset($options['valor'])) {
            $postData['ddelivery_valor'] = $options['valor'];
        } else {
            $postData['ddelivery_valor'] = null;
        }

        $postData['ddelivery_data'] = date('Y-m-d H:i:s');

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['delivery'])) {
            $builder->set('ddelivery_deliveryid', $options['delivery']);
        }

        if (isset($options['cep'])) {
            $builder->set('ddelivery_cep', $options['valor']);
        }

        if (isset($options['endereco'])) {
            $builder->set('ddelivery_endereco', $options['endereco']);
        }

        if (isset($options['numero'])) {
            $builder->set('ddelivery_numero', $options['numero']);
        }

        if (isset($options['complemento'])) {
            $builder->set('ddelivery_complemento', $options['complemento']);
        }

        if (isset($options['cidade'])) {
            $builder->set('ddelivery_cidade', $options['cidade']);
        }

        if (isset($options['bairro'])) {
            $builder->set('ddelivery_bairro', $options['bairro']);
        }

        if (isset($options['nome'])) {
            $builder->set('ddelivery_nome', $options['nome']);
        }

        if (isset($options['fone'])) {
            $builder->set('ddelivery_fone', $options['fone']);
        }

        if (isset($options['celular'])) {
            $builder->set('ddelivery_celular', $options['celular']);
        }

        if (isset($options['obs'])) {
            $builder->set('ddelivery_obs', $options['obs']);
        }

        if (isset($options['valor'])) {
            $builder->set('ddelivery_valor', $options['valor']);
        }

        $builder->set('ddelivery_data', date('Y-m-d H:i:s'));

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
     * @param DadosDelivery $obj
     * @param AluguelCarrosFacade $facade
     * @return DadosDelivery
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'delivery' => (is_object($obj->getDelivery())) ? $obj->getDelivery()->getId() : null,
            'cep' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getCep() : null,
            'endereco' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getRua() : null,
            'numero' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getNumero() : null,
            'complemento' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getComplemento() : null,
            'cidade' => (is_object($obj->getDelivery()) && is_object($obj->getDelivery()->getCidade())) ? $obj->getDelivery()->getCidade()->getId() : null,
            'bairro' => (is_object($obj->getDelivery())) ? $obj->getDelivery()->getBairro() : null,
            'nome' => $obj->getNome(),
            'fone' => $obj->getFone(),
            'celular' => $obj->getCelular(),
            'obs' => $obj->getObs(),
            'valor' => $obj->getValor()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $ddelivery = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $ddelivery = $this->insert($this->queryBuilderInsert($options));
        }
        return $ddelivery;
    }

    /**
     * @param DadosDelivery $obj
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