<?php

namespace Carroaluguel\Models\Utilizador\DAO;


use Carroaluguel\Models\Localidade\Endereco;
use Carroaluguel\Models\Utilizador\Cliente;
use Carroaluguel\Models\UtilizadorFacade;
use Core\QueryBuilder;
use Core\Repository;

class ClienteDAO extends Repository
{
    protected $table = "r_emissor";
    protected $primary_key = 'id_emissor';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Cliente($facade);
            $obj->setId($dados->id_emissor);
            $endereco = new Endereco();
            $endereco->setRua($dados->endereco)
                ->setNumero($dados->numero)
                ->setComplemento($dados->complemento)
                ->setBairro($dados->bairro)
                ->setCep($dados->cep)
                ->setCidade($dados->id_cidade)
                ->setCidadeNome($dados->cidade)
                ->setEstadoAbr($dados->estado)
                ->setPais($dados->pais);
            $obj->setEndereco($endereco)
                ->setDataCadastro($dados->data_cadastro)
                ->setNome($dados->nome)
                ->setCpf($dados->cpf_cliente)
                ->setRg($dados->rg_cliente)
                ->setPassaporte($dados->passaporte_cliente)
                ->setDataNascimento($dados->data_nascimento)
                ->setEmail($dados->email)
                ->setTelefone($dados->telefone)
                ->setCelular($dados->celular)
                ->setLogin($dados->cpf_cliente)
                ->setSenha($dados->email)
                ->setAtivo($dados->ativo_emissor)
                ->setMaster($dados->master)
                ->setEmissor($dados->id_empresas)
                ->setFacebookId($dados->facebook_id);
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
            if (isset($options['id_emissor'])) {
                $builder->where('id_emissor', $options['id_emissor']);
            }
            if (isset($options['cpf_cliente'])) {
                $builder->like('cpf_cliente', $options['cpf_cliente']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('id_emissor', $options['id']);
        }

        if (isset($options['inId'])) {
            $builder->where_in('id_emissor', $options['inId']);
        }

        if (isset($options['nome'])) {
            $builder->where('nome', $options['nome']);
        }

        if (isset($options['cpf'])) {
            $builder->where('cpf_cliente', $options['cpf']);
        }

        if (isset($options['facebook_id'])) {
            $builder->where('facebook_id', $options['facebook_id']);
        }

        if (isset($options['passaporte'])) {
            $builder->where('passaporte_cliente', $options['passaporte']);
        }

        if (isset($options['dataNascimento'])) {
            $builder->where('dt_nascimento', $options['dataNascimento']);
        }

        if (isset($options['emissor'])) {
            $builder->where('id_empresas', $options['emissor']);
        }

        if (isset($options['telefone'])) {
            $builder->where('telefone', $options['telefone']);
        }

        if (isset($options['celular'])) {
            $builder->where('celular', $options['celular']);
        }

        if (isset($options['email'])) {
            $builder->where('email', $options['email']);
        }

        if (isset($options['old_id'])) {
            $builder->where('old_id', $options['old_id']);
        }

        if (isset($options['usuario'])) {
            $builder->where('usuario', $options['usuario']);
        }

        if (isset($options['senha'])) {
            $builder->where('senha', $options['senha']);
        }

        if (isset($options['dataInicial'])) {
            $builder->lower('data_cadastro', "'" . $options['dataInicial'] . "'");
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
            $postData['nome'] = $options['nome'];
        } else {
            $postData['nome'] = null;
        }

        if (isset($options['cpf_cliente'])) {
            $postData['cpf_cliente'] = $options['cpf_cliente'];
        } else {
            $postData['cpf_cliente'] = null;
        }

        if (isset($options['rg_cliente'])) {
            $postData['rg_cliente'] = $options['rg_cliente'];
        } else {
            $postData['rg_cliente'] = null;
        }

        if (isset($options['passaporte_cliente'])) {
            $postData['passaporte_cliente'] = $options['passaporte_cliente'];
        } else {
            $postData['passaporte_cliente'] = null;
        }

        if (isset($options['cliente_direto'])) {
            $postData['cliente_direto'] = $options['cliente_direto'];
        } else {
            $postData['cliente_direto'] = 1;
        }

        if (isset($options['dt_nascimento'])) {
            $postData['dt_nascimento'] = $options['dt_nascimento'];
        } else {
            $postData['dt_nascimento'] = null;
        }

        if (isset($options['data_nascimento'])) {
            $postData['data_nascimento'] = $options['data_nascimento'];
        } else {
            $postData['data_nascimento'] = null;
        }


        if (isset($options['id_empresas'])) {
            $postData['id_empresas'] = $options['id_empresas'];
        } else {
            $postData['id_empresas'] = 47;
        }

        if (isset($options['cep'])) {
            $postData['cep'] = $options['cep'];
        } else {
            $postData['cep'] = null;
        }

        if (isset($options['data_cadastro'])) {
            $postData['data_cadastro'] = $options['data_cadastro'];
        } else {
            $postData['data_cadastro'] = date("Y-m-d H:i:s");
        }

        if (isset($options['endereco'])) {
            $postData['endereco'] = $options['endereco'];
        } else {
            $postData['endereco'] = null;
        }

        if (isset($options['numero'])) {
            $postData['numero'] = $options['numero'];
        } else {
            $postData['numero'] = null;
        }

        if (isset($options['complemento'])) {
            $postData['complemento'] = $options['complemento'];
        } else {
            $postData['complemento'] = null;
        }

        if (isset($options['bairro'])) {
            $postData['bairro'] = $options['bairro'];
        } else {
            $postData['bairro'] = null;
        }

        if (isset($options['cidade'])) {
            $postData['cidade'] = $options['cidade'];
        } else {
            $postData['cidade'] = null;
        }

        if (isset($options['id_cidade'])) {
            $postData['id_cidade'] = $options['id_cidade'];
        } else {
            $postData['id_cidade'] = null;
        }

        if (isset($options['estado'])) {
            $postData['estado'] = $options['estado'];
        } else {
            $postData['estado'] = null;
        }

        if (isset($options['pais'])) {
            $postData['pais'] = $options['pais'];
        } else {
            $postData['pais'] = null;
        }

        if (isset($options['telefone'])) {
            $postData['telefone'] = $options['telefone'];
        } else {
            $postData['telefone'] = null;
        }

        if (isset($options['celular'])) {
            $postData['celular'] = $options['celular'];
        } else {
            $postData['celular'] = null;
        }

        if (isset($options['email'])) {
            $postData['email'] = $options['email'];
        } else {
            $postData['email'] = null;
        }

        if (isset($options['senha'])) {
            $postData['senha'] = $options['senha'];
        } else {
            $postData['senha'] = null;
        }

        if (isset($options['usuario'])) {
            $postData['usuario'] = $options['usuario'];
        } else {
            $postData['usuario'] = null;
        }

        if (isset($options['ativo_emissor'])) {
            $postData['ativo_emissor'] = $options['ativo_emissor'];
        } else {
            $postData['ativo_emissor'] = null;
        }

        if (isset($options['old_id'])) {
            $postData['old_id'] = $options['old_id'];
        } else {
            $postData['old_id'] = null;
        }

        if (isset($options['afiliado_cod'])) {
            $postData['afiliado_cod'] = $options['afiliado_cod'];
        } else {
            $postData['afiliado_cod'] = null;
        }

        if (isset($options['afiliado_data'])) {
            $postData['afiliado_data'] = $options['afiliado_data'];
        } else {
            $postData['afiliado_data'] = null;
        }

        if (isset($options['facebook_id'])) {
            $postData['facebook_id'] = $options['facebook_id'];
        } else {
            $postData['facebook_id'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set('nome', $options['nome']);
        }

        if (isset($options['cpf_cliente'])) {
            $builder->set('cpf_cliente', $options['cpf_cliente']);
        }

        if (isset($options['facebook_id'])) {
            $builder->set('facebook_id', $options['facebook_id']);
        }

        if (isset($options['rg_cliente'])) {
            $builder->set('rg_cliente', $options['rg_cliente']);
        }

        if (isset($options['passaporte_cliente'])) {
            $builder->set('passaporte_cliente', $options['passaporte_cliente']);
        }

        if (isset($options['dt_nascimento'])) {
            $builder->set('dt_nascimento', $options['dt_nascimento']);
        }

        if (isset($options['data_nascimento'])) {
            $builder->set('data_nascimento', $options['data_nascimento']);
        }

        if (isset($options['cep'])) {
            $builder->set('cep', $options['cep']);
        }

        if (isset($options['endereco'])) {
            $builder->set('endereco', $options['endereco']);
        }

        if (isset($options['numero'])) {
            $builder->set('numero', $options['numero']);
        }

        if (isset($options['complemento'])) {
            $builder->set('complemento', $options['complemento']);
        }

        if (isset($options['bairro'])) {
            $builder->set('bairro', $options['bairro']);
        }

        if (isset($options['cidade'])) {
            $builder->set('cidade', $options['cidade']);
        }

        if (isset($options['id_cidade'])) {
            $builder->set('id_cidade', $options['id_cidade']);
        }

        if (isset($options['estado'])) {
            $builder->set('estado', $options['estado']);
        }

        if (isset($options['pais'])) {
            $builder->set('pais', $options['pais']);
        }

        if (isset($options['telefone'])) {
            $builder->set('telefone', $options['telefone']);
        }

        if (isset($options['celular'])) {
            $builder->set('celular', $options['celular']);
        }

        if (isset($options['email'])) {
            $builder->set('email', $options['email']);
        }

        $builder->where("id_emissor", $options['id']);

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
     * @param Cliente $obj
     * @param UtilizadorFacade $facade
     * @return Cliente
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'cpf_cliente' => $obj->getCpf(),
            'rg_cliente' => $obj->getRg(),
            'passaporte_cliente' => $obj->getPassaporte(),
            'cliente_direto' => 1,
            'dt_nascimento' => $obj->getDataNascimento()->getDataSql(),
            'data_nascimento' => $obj->getDataNascimento()->getDataBr(),
            'id_empresas' => $obj->getEmissor(),
            'cep' => $obj->getEndereco()->getCep(),
            'data_cadastro' => $obj->getDataNascimento()->getDataHoraSql(),
            'endereco' => $obj->getEndereco()->getRua(),
            'numero' => $obj->getEndereco()->getNumero(),
            'complemento' => $obj->getEndereco()->getComplemento(),
            'bairro' => $obj->getEndereco()->getBairro(),
            'cidade' => ($obj->getEndereco()->getCidade()->getNome()) ? $obj->getEndereco()->getCidade()->getNome() : $obj->getEndereco()->getCidadeNome(),
            'id_cidade' => ($obj->getEndereco()->getCidade()->getId()) ? $obj->getEndereco()->getCidade()->getId() : null,
            'estado' => $obj->getEndereco()->getCidade()->getEstado()->getAbreviacao(),
            'pais' => $obj->getEndereco()->getPais(),
            'telefone' => $obj->getTelefone(),
            'celular' => $obj->getCelular(),
            'email' => $obj->getEmail(),
            'usuario' => $obj->getEmail(),
            'ativo_emissor' => $obj->getAtivo(),
            'afiliado_cod' => $obj->getAfiliadoCod(),
            'facebook_id' => $obj->getFacebookId()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $cliente = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $cliente = $this->insert($this->queryBuilderInsert($options));
        }
        return $cliente;
    }

    /**
     * @param Cliente $obj
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