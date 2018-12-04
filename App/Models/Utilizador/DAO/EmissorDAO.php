<?php

namespace Carroaluguel\Models\Utilizador\DAO;


use Carroaluguel\Models\Localidade\Endereco;
use Carroaluguel\Models\Utilizador\Emissor;
use Carroaluguel\Models\UtilizadorFacade;
use Core\QueryBuilder;
use Core\Repository;

class EmissorDAO extends Repository
{
    protected $table = "r_empresas";
    protected $primary_key = 'id_empresas';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Emissor($facade);
            $obj->setId($dados->id_empresas);
            $endereco = new Endereco();
            $endereco->setRua($dados->endereco_empresas)
                ->setBairro($dados->bairro_empresas)
                ->setCep($dados->cep_empresas)
                ->setCidadeNome($dados->cidade_empresas)
                ->setEstadoAbr($dados->uf_empresas)
                ->setPais('BR');
            $obj->setEndereco($endereco)
                ->setDataCadastro($dados->data_cadastro)
                ->setCnpj($dados->cnpj_empresas)
                ->setStur($dados->cod_stur_empresas)
                ->setRazaoSocial($dados->nome_empresas)
                ->setNomeFantasia($dados->nome_empresas)
                ->setFaturamento(($dados->ativo_empresas == "T") ? true : false)
                ->setTelefone($dados->telefone_empresas)
                ->setFax($dados->fax_empresas)
                ->setEmail($dados->email_empresas)
                ->setTipo($dados->tipo_empresas)
                ->setCodigoWeb($dados->codigoweb)
                ->setSenhaWeb($dados->senhaweb)
                ->setCredito($dados->credito);
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
            if (isset($options['id_empresas'])) {
                $builder->where('id_empresas', $options['id_empresas']);
            }
            if (isset($options['nome_empresas'])) {
                $builder->like('nome_empresas', $options['nome_empresas']);
            }
            if (isset($options['cnpj_empresas'])) {
                $builder->where('cnpj_empresas', $options['cnpj_empresas']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('id_empresas', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('id_empresas', $options['inId']);
        }
        if (isset($options['telefone'])) {
            $builder->where('telefone_empresas', $options['telefone']);
        }
        if (isset($options['fax'])) {
            $builder->where('fax_empresas', $options['fax']);
        }
        if (isset($options['email'])) {
            $builder->where('email_empresas', $options['email']);
        }
        if (isset($options['cep'])) {
            $builder->where('cep_empresas', $options['cep']);
        }
        if (isset($options['bairro'])) {
            $builder->where('bairro_empresas', $options['bairro']);
        }
        if (isset($options['cidade'])) {
            $builder->where('cidade_empresas', $options['cidade']);
        }
        if (isset($options['uf'])) {
            $builder->where('uf_empresas', $options['uf']);
        }
        if (isset($options['stur'])) {
            $builder->where('cod_stur_empresas', $options['stur']);
        }
        if (isset($options['tipo'])) {
            $builder->where('tipo_empresas', $options['tipo']);
        }
        if (isset($options['ativo'])) {
            $builder->where('ativo_empresas', $options['ativo']);
        }
        if (isset($options['cnpj'])) {
            $builder->where('cnpj_empresas', $options['cnpj']);
        }
        if (isset($options['nome'])) {
            $builder->like('nome_empresas', $options['nome']);
        }
        if (isset($options['endereco'])) {
            $builder->like('endereco_empresas', $options['endereco']);
        }
        if (isset($options['codigoweb'])) {
            $builder->where('codigoweb', $options['codigoweb']);
        }
        if (isset($options['senhaweb'])) {
            $builder->where('senhaweb', $options['senhaweb']);
        }
        if (isset($options['credito'])) {
            $builder->where('credito', $options['credito']);
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

        if (isset($options['telefone'])) {
            $postData['telefone_empresas'] = $options['telefone'];
        } else {
            $postData['telefone_empresas'] = null;
        }

        if (isset($options['fax'])) {
            $postData['fax_empresas'] = $options['fax'];
        } else {
            $postData['fax_empresas'] = null;
        }

        if (isset($options['email'])) {
            $postData['email_empresas'] = $options['email'];
        } else {
            $postData['email_empresas'] = null;
        }

        if (isset($options['cep'])) {
            $postData['cep_empresas'] = $options['cep'];
        } else {
            $postData['cep_empresas'] = null;
        }

        if (isset($options['bairro'])) {
            $postData['bairro_empresas'] = $options['bairro'];
        } else {
            $postData['bairro_empresas'] = null;
        }

        if (isset($options['cidade'])) {
            $postData['cidade_empresas'] = $options['cidade'];
        } else {
            $postData['cidade_empresas'] = null;
        }

        if (isset($options['uf'])) {
            $postData['uf_empresas'] = $options['uf'];
        } else {
            $postData['uf_empresas'] = null;
        }

        if (isset($options['stur'])) {
            $postData['cod_stur_empresas'] = $options['stur'];
        } else {
            $postData['cod_stur_empresas'] = null;
        }

        if (isset($options['tipo'])) {
            $postData['tipo_empresas'] = $options['tipo'];
        } else {
            $postData['tipo_empresas'] = null;
        }

        if (isset($options['ativo'])) {
            $postData['ativo_empresas'] = $options['ativo'];
        } else {
            $postData['ativo_empresas'] = null;
        }

        if (isset($options['cnpj'])) {
            $postData['cnpj_empresas'] = $options['cnpj'];
        } else {
            $postData['cnpj_empresas'] = null;
        }

        if (isset($options['nome'])) {
            $postData['nome_empresas'] = $options['nome'];
        } else {
            $postData['nome_empresas'] = null;
        }

        if (isset($options['endereco'])) {
            $postData['endereco_empresas'] = $options['endereco'];
        } else {
            $postData['endereco_empresas'] = null;
        }

        if (isset($options['codigoweb'])) {
            $postData['codigoweb'] = $options['codigoweb'];
        } else {
            $postData['codigoweb'] = null;
        }

        if (isset($options['senhaweb'])) {
            $postData['senhaweb'] = $options['senhaweb'];
        } else {
            $postData['senhaweb'] = null;
        }

        if (isset($options['credito'])) {
            $postData['credito'] = $options['credito'];
        } else {
            $postData['credito'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['telefone'])) {
            $builder->set('telefone_empresas', $options['telefone']);
        }
        if (isset($options['fax'])) {
            $builder->set('fax_empresas', $options['fax']);
        }
        if (isset($options['email'])) {
            $builder->set('email_empresas', $options['email']);
        }
        if (isset($options['cep'])) {
            $builder->set('cep_empresas', $options['cep']);
        }
        if (isset($options['bairro'])) {
            $builder->set('bairro_empresas', $options['bairro']);
        }
        if (isset($options['cidade'])) {
            $builder->set('cidade_empresas', $options['cidade']);
        }
        if (isset($options['uf'])) {
            $builder->set('uf_empresas', $options['uf']);
        }
        if (isset($options['stur'])) {
            $builder->set('cod_stur_empresas', $options['stur']);
        }
        if (isset($options['tipo'])) {
            $builder->set('tipo_empresas', $options['tipo']);
        }
        if (isset($options['ativo'])) {
            $builder->set('ativo_empresas', $options['ativo']);
        }
        if (isset($options['cnpj'])) {
            $builder->set('cnpj_empresas', $options['cnpj']);
        }
        if (isset($options['nome'])) {
            $builder->set('nome_empresas', $options['nome']);
        }
        if (isset($options['endereco'])) {
            $builder->set('endereco_empresas', $options['endereco']);
        }
        if (isset($options['codigoweb'])) {
            $builder->set('codigoweb', $options['codigoweb']);
        }
        if (isset($options['senhaweb'])) {
            $builder->set('senhaweb', $options['senhaweb']);
        }
        if (isset($options['credito'])) {
            $builder->set('credito', $options['credito']);
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
     * @param Emissor $obj
     * @param UtilizadorFacade $facade
     * @return Emissor
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'telefone' => $obj->getTelefone(),
            'fax' => $obj->getFax(),
            'email' => $obj->getEmail(),
            'endereco' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getEnderecoRua() : null,
            'bairro' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getBairro() : null,
            'cidade' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getCidadeNome() : null,
            'cep' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getCep() : null,
            'uf' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getEstadoAbr() : null,
            'stur' => $obj->getStur(),
            'tipo' => $obj->getTipo(),
            'ativo' => ($obj->getFaturamento()) ? 'T' : 'B',
            'cnpj' => $obj->getCnpj(),
            'nome' => $obj->getRazaoSocial(),
            'codigoweb' => $obj->getCodigoWeb(),
            'senhaweb' => $obj->getSenhaWeb(),
            'credito' => $obj->getCredito()
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
     * @param Emissor $obj
     * @param UtilizadorFacade $facade
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