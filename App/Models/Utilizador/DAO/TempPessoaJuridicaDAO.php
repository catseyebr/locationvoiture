<?php

namespace Carroaluguel\Models\Utilizador\DAO;


use Carroaluguel\Models\Utilizador\TempPessoaJuridica;
use Carroaluguel\Models\UtilizadorFacade;
use Core\QueryBuilder;
use Core\Repository;

class TempPessoaJuridicaDAO extends Repository
{
    protected $table = "loc_tempcnpj";
    protected $primary_key = 'tempcnpj_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new TempPessoaJuridica($facade);
            $obj->setId($dados->tempcnpj_id)
                ->setTelefone($dados->tempcnpj_telefone)
                ->setFax($dados->tempcnpj_fax)
                ->setEmail($dados->tempcnpj_email)
                ->setCep($dados->tempcnpj_cep)
                ->setBairro($dados->tempcnpj_bairro)
                ->setCidade($dados->tempcnpj_cidade)
                ->setUf($dados->tempcnpj_uf)
                ->setCnpjCod($dados->tempcnpj_cnpj_cod)
                ->setNomeFantasia($dados->tempcnpj_nomefantasia)
                ->setEndereco($dados->tempcnpj_endereco)
                ->setNomeResp($dados->tempcnpj_nomeresp)
                ->setEmailResp($dados->tempcnpj_emailresp)
                ->setDthCadastro($dados->tempcnpj_dthcadastro)
                ->setAtivo($dados->tempcnpj_ativo)
                ->setDthProcess($dados->tempcnpj_dthprocess)
                ->setRazao($dados->tempcnpj_razao)
                ->setEndNumero($dados->tempcnpj_end_numero)
                ->setEndComplemento($dados->tempcnpj_end_complemento)
                ->setNomeMaster($dados->tempcnpj_nome_master)
                ->setCpfMaster($dados->tempcnpj_cpf_master)
                ->setNascimentoMaster($dados->tempcnpj_nascimento_master)
                ->setCepMaster($dados->tempcnpj_cep_master)
                ->setEndEnderecoMaster($dados->tempcnpj_end_endereco_master)
                ->setNumeroMaster($dados->tempcnpj_numero_master)
                ->setComplementoMaster($dados->tempcnpj_complemento_master)
                ->setEndBairroMaster($dados->tempcnpj_end_bairro_master)
                ->setEndEstadoMaster($dados->tempcnpj_end_estado_master)
                ->setEndCidadeMaster($dados->tempcnpj_end_cidade_master)
                ->setTelefoneMaster($dados->tempcnpj_telefone_master)
                ->setCelularMaster($dados->tempcnpj_celular_master)
                ->setEmailMaster($dados->tempcnpj_email_master)
                ->setLoginMaster($dados->tempcnpj_login_master)
                ->setSenhaMaster($dados->tempcnpj_senha_master);
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
            if (isset($options['tempcnpj_id'])) {
                $builder->where('tempcnpj_id', $options['tempcnpj_id']);
            }

            if (isset($options['tempcnpj_razao'])) {
                $builder->like('tempcnpj_razao', $options['tempcnpj_razao']);
            }

            if (isset($options['tempcnpj_cnpj_cod'])) {
                $builder->like('tempcnpj_cnpj_cod', $options['tempcnpj_cnpj_cod']);
            }

            if (isset($options['tempcnpj_cnpj_cod'])) {
                $builder->like('tempcnpj_cnpj_cod', $options['tempcnpj_cnpj_cod']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('tempcnpj_id', $options['id']);
        }

        if (isset($options['inId'])) {
            $builder->where_in('tempcnpj_id', $options['inId']);
        }

        if (isset($options['tempcnpj_telefone'])) {
            $builder->where('tempcnpj_telefone', $options['telefone']);
        }

        if (isset($options['tempcnpj_fax'])) {
            $builder->where('tempcnpj_fax', $options['fax']);
        }

        if (isset($options['tempcnpj_email'])) {
            $builder->where('tempcnpj_email', $options['email']);
        }

        if (isset($options['tempcnpj_cep'])) {
            $builder->where('tempcnpj_cep', $options['cep']);
        }

        if (isset($options['tempcnpj_bairro'])) {
            $builder->where('tempcnpj_bairro', $options['bairro']);
        }

        if (isset($options['tempcnpj_cidade'])) {
            $builder->where('tempcnpj_cidade', $options['cidade']);
        }

        if (isset($options['tempcnpj_uf'])) {
            $builder->where('tempcnpj_uf', $options['uf']);
        }

        if (isset($options['tempcnpj_cnpj_cod'])) {
            $builder->where('tempcnpj_cnpj_cod', $options['cnpj']);
        }

        if (isset($options['tempcnpj_nomefantasia'])) {
            $builder->where('tempcnpj_nomefantasia', $options['tempcnpj_nomefantasia']);
        }

        if (isset($options['tempcnpj_endereco'])) {
            $builder->where('tempcnpj_endereco', $options['tempcnpj_endereco']);
        }

        if (isset($options['tempcnpj_nomeresp'])) {
            $builder->where('tempcnpj_nomeresp', $options['tempcnpj_nomeresp']);
        }

        if (isset($options['tempcnpj_emailresp'])) {
            $builder->where('tempcnpj_emailresp', $options['tempcnpj_emailresp']);
        }

        if (isset($options['tempcnpj_dthcadastro'])) {
            $builder->where('tempcnpj_dthcadastro', $options['tempcnpj_dthcadastro']);
        }

        if (isset($options['tempcnpj_ativo'])) {
            $builder->where('tempcnpj_ativo', $options['tempcnpj_ativo']);
        }

        if (isset($options['tempcnpj_dthprocess'])) {
            $builder->where('tempcnpj_dthprocess', $options['tempcnpj_dthprocess']);
        }

        if (isset($options['tempcnpj_razao'])) {
            $builder->like('tempcnpj_razao', $options['tempcnpj_razao']);
        }

        if (isset($options['tempcnpj_end_numero'])) {
            $builder->where('tempcnpj_end_numero', $options['tempcnpj_end_numero']);
        }

        if (isset($options['tempcnpj_end_complemento'])) {
            $builder->where('tempcnpj_end_complemento', $options['tempcnpj_end_complemento']);
        }

        if (isset($options['tempcnpj_nome_master'])) {
            $builder->where('tempcnpj_nome_master', $options['tempcnpj_nome_master']);
        }

        if (isset($options['tempcnpj_cpf_master'])) {
            $builder->where('tempcnpj_cpf_master', $options['tempcnpj_cpf_master']);
        }

        if (isset($options['tempcnpj_nascimento_master'])) {
            $builder->where('tempcnpj_nascimento_master', $options['tempcnpj_nascimento_master']);
        }

        if (isset($options['tempcnpj_cep_master'])) {
            $builder->where('tempcnpj_cep_master', $options['tempcnpj_cep_master']);
        }

        if (isset($options['tempcnpj_end_endereco_master'])) {
            $builder->where('tempcnpj_end_endereco_master', $options['tempcnpj_end_endereco_master']);
        }

        if (isset($options['tempcnpj_numero_master'])) {
            $builder->where('tempcnpj_numero_master', $options['tempcnpj_numero_master']);
        }

        if (isset($options['tempcnpj_complemento_master'])) {
            $builder->where('tempcnpj_complemento_master', $options['tempcnpj_complemento_master']);
        }

        if (isset($options['tempcnpj_end_bairro_master'])) {
            $builder->where('tempcnpj_end_bairro_master', $options['tempcnpj_end_bairro_master']);
        }

        if (isset($options['tempcnpj_end_estado_master'])) {
            $builder->where('tempcnpj_end_estado_master', $options['tempcnpj_end_estado_master']);
        }

        if (isset($options['tempcnpj_end_cidade_master'])) {
            $builder->where('tempcnpj_end_cidade_master', $options['tempcnpj_end_cidade_master']);
        }

        if (isset($options['tempcnpj_telefone_master'])) {
            $builder->where('tempcnpj_telefone_master', $options['tempcnpj_telefone_master']);
        }

        if (isset($options['tempcnpj_celular_master'])) {
            $builder->where('tempcnpj_celular_master', $options['tempcnpj_celular_master']);
        }

        if (isset($options['tempcnpj_email_master'])) {
            $builder->where('tempcnpj_email_master', $options['tempcnpj_email_master']);
        }

        if (isset($options['tempcnpj_login_master'])) {
            $builder->where('tempcnpj_login_master', $options['tempcnpj_login_master']);
        }

        if (isset($options['tempcnpj_senha_master'])) {
            $builder->where('tempcnpj_senha_master', $options['tempcnpj_senha_master']);
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
        if (isset($options['tempcnpj_telefone'])) {
            $postData['tempcnpj_telefone'] = $options['tempcnpj_telefone'];
        } else {
            $postData['tempcnpj_telefone'] = null;
        }

        if (isset($options['tempcnpj_fax'])) {
            $postData['tempcnpj_fax'] = $options['tempcnpj_fax'];
        } else {
            $postData['tempcnpj_fax'] = null;
        }

        if (isset($options['tempcnpj_email'])) {
            $postData['tempcnpj_email'] = $options['tempcnpj_email'];
        } else {
            $postData['tempcnpj_email'] = null;
        }

        if (isset($options['tempcnpj_cep'])) {
            $postData['tempcnpj_cep'] = $options['tempcnpj_cep'];
        } else {
            $postData['tempcnpj_cep'] = null;
        }

        if (isset($options['tempcnpj_bairro'])) {
            $postData['tempcnpj_bairro'] = $options['tempcnpj_bairro'];
        } else {
            $postData['tempcnpj_bairro'] = null;
        }

        if (isset($options['tempcnpj_cidade'])) {
            $postData['tempcnpj_cidade'] = $options['tempcnpj_cidade'];
        } else {
            $postData['tempcnpj_cidade'] = null;
        }

        if (isset($options['tempcnpj_uf'])) {
            $postData['tempcnpj_uf'] = $options['tempcnpj_uf'];
        } else {
            $postData['tempcnpj_uf'] = null;
        }

        if (isset($options['tempcnpj_cnpj_cod'])) {
            $postData['tempcnpj_cnpj_cod'] = $options['tempcnpj_cnpj_cod'];
        } else {
            $postData['tempcnpj_cnpj_cod'] = null;
        }

        if (isset($options['tempcnpj_nomefantasia'])) {
            $postData['tempcnpj_nomefantasia'] = $options['tempcnpj_nomefantasia'];
        } else {
            $postData['tempcnpj_nomefantasia'] = null;
        }

        if (isset($options['tempcnpj_endereco'])) {
            $postData['tempcnpj_endereco'] = $options['tempcnpj_endereco'];
        } else {
            $postData['tempcnpj_endereco'] = null;
        }

        if (isset($options['tempcnpj_nomeresp'])) {
            $postData['tempcnpj_nomeresp'] = $options['tempcnpj_nomeresp'];
        } else {
            $postData['tempcnpj_nomeresp'] = null;
        }

        if (isset($options['tempcnpj_emailresp'])) {
            $postData['tempcnpj_emailresp'] = $options['tempcnpj_emailresp'];
        } else {
            $postData['tempcnpj_emailresp'] = null;
        }

        if (isset($options['tempcnpj_dthcadastro'])) {
            $postData['tempcnpj_dthcadastro'] = $options['tempcnpj_dthcadastro'];
        } else {
            $postData['tempcnpj_dthcadastro'] = null;
        }

        if (isset($options['tempcnpj_ativo'])) {
            $postData['tempcnpj_ativo'] = $options['tempcnpj_ativo'];
        } else {
            $postData['tempcnpj_ativo'] = null;
        }

        if (isset($options['tempcnpj_dthprocess'])) {
            $postData['tempcnpj_dthprocess'] = $options['tempcnpj_dthprocess'];
        } else {
            $postData['tempcnpj_dthprocess'] = null;
        }

        if (isset($options['tempcnpj_razao'])) {
            $postData['tempcnpj_razao'] = $options['tempcnpj_razao'];
        } else {
            $postData['tempcnpj_razao'] = null;
        }

        if (isset($options['tempcnpj_end_numero'])) {
            $postData['tempcnpj_end_numero'] = $options['tempcnpj_end_numero'];
        } else {
            $postData['tempcnpj_end_numero'] = null;
        }

        if (isset($options['tempcnpj_end_complemento'])) {
            $postData['tempcnpj_end_complemento'] = $options['tempcnpj_end_complemento'];
        } else {
            $postData['tempcnpj_end_complemento'] = null;
        }

        if (isset($options['tempcnpj_nome_master'])) {
            $postData['tempcnpj_nome_master'] = $options['tempcnpj_nome_master'];
        } else {
            $postData['tempcnpj_nome_master'] = null;
        }

        if (isset($options['tempcnpj_cpf_master'])) {
            $postData['tempcnpj_cpf_master'] = $options['tempcnpj_cpf_master'];
        } else {
            $postData['tempcnpj_cpf_master'] = null;
        }

        if (isset($options['tempcnpj_nascimento_master'])) {
            $postData['tempcnpj_nascimento_master'] = $options['tempcnpj_nascimento_master'];
        } else {
            $postData['tempcnpj_nascimento_master'] = null;
        }

        if (isset($options['tempcnpj_cep_master'])) {
            $postData['tempcnpj_cep_master'] = $options['tempcnpj_cep_master'];
        } else {
            $postData['tempcnpj_cep_master'] = null;
        }

        if (isset($options['tempcnpj_end_endereco_master'])) {
            $postData['tempcnpj_end_endereco_master'] = $options['tempcnpj_end_endereco_master'];
        } else {
            $postData['tempcnpj_end_endereco_master'] = null;
        }

        if (isset($options['tempcnpj_numero_master'])) {
            $postData['tempcnpj_numero_master'] = $options['tempcnpj_numero_master'];
        } else {
            $postData['tempcnpj_numero_master'] = null;
        }

        if (isset($options['tempcnpj_complemento_master'])) {
            $postData['tempcnpj_complemento_master'] = $options['tempcnpj_complemento_master'];
        } else {
            $postData['tempcnpj_complemento_master'] = null;
        }

        if (isset($options['tempcnpj_end_bairro_master'])) {
            $postData['tempcnpj_end_bairro_master'] = $options['tempcnpj_end_bairro_master'];
        } else {
            $postData['tempcnpj_end_bairro_master'] = null;
        }

        if (isset($options['tempcnpj_end_estado_master'])) {
            $postData['tempcnpj_end_estado_master'] = $options['tempcnpj_end_estado_master'];
        } else {
            $postData['tempcnpj_end_estado_master'] = null;
        }

        if (isset($options['tempcnpj_end_cidade_master'])) {
            $postData['tempcnpj_end_cidade_master'] = $options['tempcnpj_end_cidade_master'];
        } else {
            $postData['tempcnpj_end_cidade_master'] = null;
        }

        if (isset($options['tempcnpj_telefone_master'])) {
            $postData['tempcnpj_telefone_master'] = $options['tempcnpj_telefone_master'];
        } else {
            $postData['tempcnpj_telefone_master'] = null;
        }

        if (isset($options['tempcnpj_celular_master'])) {
            $postData['tempcnpj_celular_master'] = $options['tempcnpj_celular_master'];
        } else {
            $postData['tempcnpj_celular_master'] = null;
        }

        if (isset($options['tempcnpj_email_master'])) {
            $postData['tempcnpj_email_master'] = $options['tempcnpj_email_master'];
        } else {
            $postData['tempcnpj_email_master'] = null;
        }

        if (isset($options['tempcnpj_login_master'])) {
            $postData['tempcnpj_login_master'] = $options['tempcnpj_login_master'];
        } else {
            $postData['tempcnpj_login_master'] = null;
        }

        if (isset($options['tempcnpj_senha_master'])) {
            $postData['tempcnpj_senha_master'] = $options['tempcnpj_senha_master'];
        } else {
            $postData['tempcnpj_senha_master'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['tempcnpj_telefone'])) {
            $builder->set('tempcnpj_telefone', $options['tempcnpj_telefone']);
        }

        if (isset($options['tempcnpj_fax'])) {
            $builder->set('tempcnpj_fax', $options['tempcnpj_fax']);
        }

        if (isset($options['tempcnpj_email'])) {
            $builder->set('tempcnpj_email', $options['tempcnpj_email']);
        }

        if (isset($options['tempcnpj_cep'])) {
            $builder->set('tempcnpj_cep', $options['tempcnpj_cep']);
        }

        if (isset($options['tempcnpj_bairro'])) {
            $builder->set('tempcnpj_bairro', $options['tempcnpj_bairro']);
        }

        if (isset($options['tempcnpj_cidade'])) {
            $builder->set('tempcnpj_cidade', $options['tempcnpj_cidade']);
        }

        if (isset($options['tempcnpj_uf'])) {
            $builder->set('tempcnpj_uf', $options['tempcnpj_uf']);
        }

        if (isset($options['tempcnpj_cnpj_cod'])) {
            $builder->set('tempcnpj_cnpj_cod', $options['tempcnpj_cnpj_cod']);
        }

        if (isset($options['tempcnpj_nomefantasia'])) {
            $builder->set('tempcnpj_nomefantasia', $options['tempcnpj_nomefantasia']);
        }

        if (isset($options['tempcnpj_endereco'])) {
            $builder->set('tempcnpj_endereco', $options['tempcnpj_endereco']);
        }

        if (isset($options['tempcnpj_nomeresp'])) {
            $builder->set('tempcnpj_nomeresp', $options['tempcnpj_nomeresp']);
        }

        if (isset($options['tempcnpj_emailresp'])) {
            $builder->set('tempcnpj_emailresp', $options['tempcnpj_emailresp']);
        }

        if (isset($options['tempcnpj_dthcadastro'])) {
            $builder->set('tempcnpj_dthcadastro', $options['tempcnpj_dthcadastro']);
        }

        if (isset($options['tempcnpj_ativo'])) {
            $builder->set('tempcnpj_ativo', $options['tempcnpj_ativo']);
        }

        if (isset($options['tempcnpj_dthprocess'])) {
            $builder->set('tempcnpj_dthprocess', $options['tempcnpj_dthprocess']);
        }

        if (isset($options['tempcnpj_razao'])) {
            $builder->set('tempcnpj_razao', $options['tempcnpj_razao']);
        }

        if (isset($options['tempcnpj_end_numero'])) {
            $builder->set('tempcnpj_end_numero', $options['tempcnpj_end_numero']);
        }

        if (isset($options['tempcnpj_end_complemento'])) {
            $builder->set('tempcnpj_end_complemento', $options['tempcnpj_end_complemento']);
        }

        if (isset($options['tempcnpj_nome_master'])) {
            $builder->set('tempcnpj_nome_master', $options['tempcnpj_nome_master']);
        }

        if (isset($options['tempcnpj_cpf_master'])) {
            $builder->set('tempcnpj_cpf_master', $options['tempcnpj_cpf_master']);
        }

        if (isset($options['tempcnpj_nascimento_master'])) {
            $builder->set('tempcnpj_nascimento_master', $options['tempcnpj_nascimento_master']);
        }

        if (isset($options['tempcnpj_cep_master'])) {
            $builder->set('tempcnpj_cep_master', $options['tempcnpj_cep_master']);
        }

        if (isset($options['tempcnpj_end_endereco_master'])) {
            $builder->set('tempcnpj_end_endereco_master', $options['tempcnpj_end_endereco_master']);
        }

        if (isset($options['tempcnpj_numero_master'])) {
            $builder->set('tempcnpj_numero_master', $options['tempcnpj_numero_master']);
        }

        if (isset($options['tempcnpj_complemento_master'])) {
            $builder->set('tempcnpj_complemento_master', $options['tempcnpj_complemento_master']);
        }

        if (isset($options['tempcnpj_end_bairro_master'])) {
            $builder->set('tempcnpj_end_bairro_master', $options['tempcnpj_end_bairro_master']);
        }

        if (isset($options['tempcnpj_end_estado_master'])) {
            $builder->set('tempcnpj_end_estado_master', $options['tempcnpj_end_estado_master']);
        }

        if (isset($options['tempcnpj_end_cidade_master'])) {
            $builder->set('tempcnpj_end_cidade_master', $options['tempcnpj_end_cidade_master']);
        }

        if (isset($options['tempcnpj_telefone_master'])) {
            $builder->set('tempcnpj_telefone_master', $options['tempcnpj_telefone_master']);
        }

        if (isset($options['tempcnpj_celular_master'])) {
            $builder->set('tempcnpj_celular_master', $options['tempcnpj_celular_master']);
        }

        if (isset($options['tempcnpj_email_master'])) {
            $builder->set('tempcnpj_email_master', $options['tempcnpj_email_master']);
        }

        if (isset($options['tempcnpj_login_master'])) {
            $builder->set('tempcnpj_login_master', $options['tempcnpj_login_master']);
        }

        if (isset($options['tempcnpj_senha_master'])) {
            $builder->set('tempcnpj_senha_master', $options['tempcnpj_senha_master']);
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
     * @param TempPessoaJuridica $obj
     * @param UtilizadorFacade $facade
     * @return TempPessoaJuridica
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'tempcnpj_telefone' => $obj->getTelefone(),
            'tempcnpj_fax' => $obj->getFax(),
            'tempcnpj_email' => $obj->getEmail(),
            'tempcnpj_cep' => $obj->getCep(),
            'tempcnpj_bairro' => $obj->getBairro(),
            'tempcnpj_cidade' => (is_object($obj->getCidade())) ? $obj->getCidade()->getId() : null,
            'tempcnpj_uf' => (is_object($obj->getUf())) ? $obj->getUf()->getId() : null,
            'tempcnpj_cnpj_cod' => $obj->getCnpjCod(),
            'tempcnpj_nomefantasia' => $obj->getNomeFantasia(),
            'tempcnpj_endereco' => $obj->getEndereco(),
            'tempcnpj_nomeresp' => $obj->getNomeResp(),
            'tempcnpj_emailresp' => $obj->getEmailResp(),
            'tempcnpj_dthcadastro' => (is_object($obj->getDthCadastro())) ? $obj->getDthCadastro()->getDataHoraSql() : null,
            'tempcnpj_ativo' => $obj->getAtivo(),
            'tempcnpj_dthprocess' => (is_object($obj->getDthProcess())) ? $obj->getDthProcess()->getDataHoraSql() : null,
            'tempcnpj_razao' => $obj->getRazao(),
            'tempcnpj_end_numero' => $obj->getEndNumero(),
            'tempcnpj_end_complemento' => $obj->getEndComplemento(),
            'tempcnpj_nome_master' => $obj->getNomeMaster(),
            'tempcnpj_cpf_master' => $obj->getCpfMaster(),
            'tempcnpj_nascimento_master' => $obj->getNascimentoMaster(),
            'tempcnpj_cep_master' => $obj->getCepMaster(),
            'tempcnpj_end_endereco_master' => $obj->getEndEnderecoMaster(),
            'tempcnpj_numero_master' => $obj->getNumeroMaster(),
            'tempcnpj_complemento_master' => $obj->getComplementoMaster(),
            'tempcnpj_end_bairro_master' => $obj->getEndBairroMaster(),
            'tempcnpj_end_estado_master' => (is_object($obj->getEndEstadoMaster())) ? $obj->getEndEstadoMaster()->getId() : null,
            'tempcnpj_end_cidade_master' => (is_object($obj->getEndCidadeMaster())) ? $obj->getEndCidadeMaster()->getId() : null,
            'tempcnpj_telefone_master' => $obj->getTelefoneMaster(),
            'tempcnpj_celular_master' => $obj->getCelularMaster(),
            'tempcnpj_email_master' => $obj->getEmailMaster(),
            'tempcnpj_login_master' => $obj->getLoginMaster(),
            'tempcnpj_senha_master' => $obj->getSenhaMaster(),
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $temppj = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $temppj = $this->insert($this->queryBuilderInsert($options));
        }
        return $temppj;
    }

    /**
     * @param TempPessoaJuridica $obj
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