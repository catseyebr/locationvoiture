<?php

namespace Carroaluguel\Models\Utilizador\DAO;


use Carroaluguel\Models\Localidade\Endereco;
use Carroaluguel\Models\Utilizador\Usuario;
use Carroaluguel\Models\UtilizadorFacade;
use Core\QueryBuilder;
use Core\Repository;

class UsuarioDAO extends Repository
{
    protected $table = "tb_usuario";
    protected $primary_key = 'usu_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Usuario($facade);
            $obj->setId($dados->usu_id)
                ->setNome($dados->usu_nome)
                ->setDataCadastro($dados->usu_datacadastro);
            $endereco = new Endereco();
            $endereco->setCidade($dados->usu_end_cidade)
                ->setBairro($dados->usu_end_bairro)
                ->setCep($dados->usu_end_cep)
                ->setRua($dados->usu_end_rua)
                ->setNumero($dados->usu_end_numero)
                ->setComplemento($dados->usu_end_complemento);
            $obj->setEndereco($endereco)
                ->setCpf($dados->usu_cpf)
                ->setRg($dados->usu_rg)
                ->setPassaporte($dados->usu_passaporte)
                ->setDataNascimento($dados->usu_datanascimento)
                ->setEmailPrincipal($dados->usu_emailprincipal)
                ->setSenha($dados->usu_senha)
                ->setAtivo($dados->usu_ativo)
                ->setNivel($dados->usu_nivel)
                ->setEmailHost($dados->usu_email_host)
                ->setEmailPort($dados->usu_email_port)
                ->setEmailUsuario($dados->usu_email_usuario)
                ->setEmailSenha($dados->usu_email_senha)
                ->setOperador($dados->usu_codop)
                ->setAfiliado($dados->usu_afiliado)
                ->setOperadorUser($dados->usu_usop)
                ->setOperadorCod($dados->usu_uscod);
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
            if (isset($options['usu_id'])) {
                $builder->where("usu_id", $options['usu_id']);
            }
            if (isset($options['usu_nome'])) {
                $builder->like("usu_nome", $options['usu_nome']);
            }
            if (isset($options['usu_emailprincipal'])) {
                $builder->like("usu_emailprincipal", $options['usu_emailprincipal']);
            }
        }
        if (isset($options['id'])) {
            $builder->where("usu_id", $options['id']);
        }
        if (isset($options['nivel'])) {
            $builder->where("usu_nivel", $options['nivel']);
        }
        if (isset($options['emailprincipal'])) {
            $builder->where("usu_emailprincipal", $options['emailprincipal']);
        }
        if (isset($options['senha'])) {
            $builder->where("usu_senha", $options['senha']);
        }
        if (isset($options['ativo'])) {
            $builder->where("usu_ativo", $options['ativo']);
        }
        if (isset($options['nome'])) {
            $builder->like("usu_nome", $options['nome']);
        }
        if (isset($options['dataCadastro'])) {
            $builder->where("usu_datacadastro", $options['dataCadastro']);
        }
        if (isset($options['cpf'])) {
            $builder->where("usu_cpf", $options['cpf']);
        }
        if (isset($options['rg'])) {
            $builder->like("usu_rg", $options['rg']);
        }
        if (isset($options['passaporte'])) {
            $builder->like("usu_passaporte", $options['passaporte']);
        }
        if (isset($options['dataNascimento'])) {
            $builder->like("usu_datanascimento", $options['dataNascimento']);
        }
        if (isset($options['cep'])) {
            $builder->where("usu_end_cep", $options['cep']);
        }
        if (isset($options['cidade'])) {
            $builder->where("usu_end_cidade", $options['cidade']);
        }
        if (isset($options['rua'])) {
            $builder->like("usu_end_rua", $options['rua']);
        }
        if (isset($options['numero'])) {
            $builder->like("usu_end_numero", $options['numero']);
        }
        if (isset($options['complemento'])) {
            $builder->like("usu_end_complemento", $options['complemento']);
        }
        if (isset($options['bairro'])) {
            $builder->like("usu_end_bairro", $options['bairro']);
        }
        if (isset($options['codop'])) {
            $builder->where("usu_codop", $options['codop']);
        }
        if (isset($options['codop_notnull'])) {
            $builder->where_notnull('usu_codop');
        }
        if (isset($options['afiliado'])) {
            $builder->where("usu_afiliado", $options['afiliado']);
        }
        if (isset($options['userop'])) {
            $builder->where("usu_usop", $options['usu_usop']);
        }
        if (isset($options['usercod'])) {
            $builder->where("usu_uscod", $options['usu_uscod']);
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

        if (isset($options['nivel'])) {
            $postData['usu_nivel'] = $options['nivel'];
        } else {
            $postData['usu_nivel'] = null;
        }

        if (isset($options['emailprincipal'])) {
            $postData['usu_emailprincipal'] = $options['emailprincipal'];
        } else {
            $postData['usu_emailprincipal'] = null;
        }

        if (isset($options['emailHost'])) {
            $postData['usu_email_host'] = $options['emailHost'];
        } else {
            $postData['usu_email_host'] = null;
        }

        if (isset($options['emailPort'])) {
            $postData['usu_email_port'] = $options['emailPort'];
        } else {
            $postData['usu_email_port'] = null;
        }

        if (isset($options['emailUsuario'])) {
            $postData['usu_email_usuario'] = $options['emailUsuario'];
        } else {
            $postData['usu_email_usuario'] = null;
        }

        if (isset($options['emailSenha'])) {
            $postData['usu_email_senha'] = $options['emailSenha'];
        } else {
            $postData['usu_email_senha'] = null;
        }

        if (isset($options['senha'])) {
            $postData['usu_senha'] = $options['senha'];
        } else {
            $postData['usu_senha'] = null;
        }

        if (isset($options['ativo'])) {
            $postData['usu_ativo'] = $options['ativo'];
        } else {
            $postData['usu_ativo'] = null;
        }

        if (isset($options['nome'])) {
            $postData['usu_nome'] = $options['nome'];
        } else {
            $postData['usu_nome'] = null;
        }

        if (isset($options['dataCadastro'])) {
            $postData['usu_datacadastro'] = $options['dataCadastro'];
        } else {
            $postData['usu_datacadastro'] = date('Y-m-d H:i:s');
        }

        if (isset($options['cpf'])) {
            $postData['usu_cpf'] = $options['cpf'];
        } else {
            $postData['usu_cpf'] = null;
        }

        if (isset($options['rg'])) {
            $postData['usu_rg'] = $options['rg'];
        } else {
            $postData['usu_rg'] = null;
        }

        if (isset($options['passaporte'])) {
            $postData['usu_passaporte'] = $options['passaporte'];
        } else {
            $postData['usu_passaporte'] = null;
        }

        if (isset($options['dataNascimento'])) {
            $postData['usu_datanascimento'] = $options['dataNascimento'];
        } else {
            $postData['usu_datanascimento'] = null;
        }

        if (isset($options['cep'])) {
            $postData['usu_end_cep'] = $options['cep'];
        } else {
            $postData['usu_end_cep'] = null;
        }

        if (isset($options['cidade'])) {
            $postData['usu_end_cidade'] = $options['cidade'];
        } else {
            $postData['usu_end_cidade'] = null;
        }

        if (isset($options['rua'])) {
            $postData['usu_end_rua'] = $options['rua'];
        } else {
            $postData['usu_end_rua'] = null;
        }

        if (isset($options['numero'])) {
            $postData['usu_end_numero'] = $options['numero'];
        } else {
            $postData['usu_end_numero'] = null;
        }

        if (isset($options['complemento'])) {
            $postData['usu_end_complemento'] = $options['complemento'];
        } else {
            $postData['usu_end_complemento'] = null;
        }

        if (isset($options['bairro'])) {
            $postData['usu_end_bairro'] = $options['complemento'];
        } else {
            $postData['usu_end_bairro'] = null;
        }

        if (isset($options['preferencias'])) {
            $postData['usu_preferencias'] = $options['preferencias'];
        } else {
            $postData['usu_preferencias'] = null;
        }

        if (isset($options['codop'])) {
            $postData['usu_codop'] = $options['codop'];
        } else {
            $postData['usu_codop'] = null;
        }

        if (isset($options['afiliado'])) {
            $postData['usu_afiliado'] = $options['afiliado'];
        } else {
            $postData['usu_afiliado'] = null;
        }

        if (isset($options['userop'])) {
            $postData['usu_usop'] = $options['userop'];
        } else {
            $postData['usu_usop'] = null;
        }

        if (isset($options['usercod'])) {
            $postData['usu_uscod'] = $options['usercod'];
        } else {
            $postData['usu_uscod'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nivel'])) {
            $builder->set("usu_nivel", $options['nivel']);
        }
        if (isset($options['emailprincipal'])) {
            $builder->set("usu_emailprincipal", $options['emailprincipal']);
        }
        if (isset($options['emailHost'])) {
            $builder->set("usu_email_host", $options['emailHost']);
        }
        if (isset($options['emailPort'])) {
            $builder->set("usu_email_port", $options['emailPort']);
        }
        if (isset($options['emailUsuario'])) {
            $builder->set("usu_email_usuario", $options['emailUsuario']);
        }
        if (isset($options['emailSenha'])) {
            $builder->set("usu_email_senha", $options['emailSenha']);
        }
        if (isset($options['senha'])) {
            $builder->set("usu_senha", $options['senha']);
        }
        if (isset($options['ativo'])) {
            $builder->set("usu_ativo", $options['ativo']);
        }
        if (isset($options['nome'])) {
            $builder->set("usu_nome", $options['nome']);
        }
        if (isset($options['dataCadastro'])) {
            $builder->set("usu_datacadastro", $options['dataCadastro']);
        }
        if (isset($options['cpf'])) {
            $builder->set("usu_cpf", $options['cpf']);
        }
        if (isset($options['rg'])) {
            $builder->set("usu_rg", $options['rg']);
        }
        if (isset($options['passaporte'])) {
            $builder->set("usu_passaporte", $options['passaporte']);
        }
        if (isset($options['dataNascimento'])) {
            $builder->set("usu_datanascimento", $options['dataNascimento']);
        }
        if (isset($options['cep'])) {
            $builder->set("usu_end_cep", $options['cep']);
        }
        if (isset($options['cidade'])) {
            $builder->set("usu_end_cidade", $options['cidade']);
        }
        if (isset($options['rua'])) {
            $builder->set("usu_end_rua", $options['rua']);
        }
        if (isset($options['numero'])) {
            $builder->set("usu_end_numero", $options['numero']);
        }
        if (isset($options['complemento'])) {
            $builder->set("usu_end_complemento", $options['complemento']);
        }
        if (isset($options['bairro'])) {
            $builder->set("usu_end_bairro", $options['bairro']);
        }
        if (isset($options['preferencias'])) {
            $builder->set("usu_preferencias", $options['preferencias']);
        }
        if (isset($options['codop'])) {
            $builder->set("usu_codop", $options['codop']);
        }
        if (isset($options['afiliado'])) {
            $builder->set("usu_afiliado", $options['afiliado']);
        }
        if (isset($options['userop'])) {
            $builder->set("usu_usop", $options['usu_usop']);
        }
        if (isset($options['usercod'])) {
            $builder->set("usu_uscod", $options['usu_uscod']);
        }

        $builder->where("usu_id", $options['id']);

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
     * @param Usuario $obj
     * @param UtilizadorFacade $facade
     * @return Usuario
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nivel' => $obj->getNivel()->getId(),
            'emailprincipal' => $obj->getEmailPrincipal(),
            'senha' => ($obj->getSenha() != '') ? $obj->getSenha() : null,
            'ativo' => ($obj->getAtivo()) ? '1' : '0',
            'nome' => $obj->getNome(),
            'cpf' => $obj->getCpf(),
            'rg' => $obj->getRg(),
            'passaporte' => $obj->getPassaporte(),
            'dataNascimento' => (is_object($obj->getDataNascimento())) ? $obj->getDataNascimento()->getDataSql() : null,
            'cep' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getCep() : null,
            'cidade' => (is_object($obj->getEndereco())) ? ((is_object($obj->getEndereco()->getCidade()) ? $obj->getEndereco()->getCidade()->getId() : null)) : null,
            'rua' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getRua() : null,
            'numero' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getNumero() : null,
            'complemento' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getComplemento() : null,
            'bairro' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getBairro() : null,
            'emailHost' => $obj->getEmailHost(),
            'emailPort' => $obj->getEmailPort(),
            'emailUsuario' => $obj->getEmailUsuario(),
            'emailSenha' => $obj->getEmailSenha(),
            'codop' => $obj->getOperador(),
            'afiliado' => (is_object($obj->getAfiliado())) ? $obj->getAfiliado()->getId() : null,
            'userop' => $obj->getOperadorUser(),
            'usercod' => $obj->getOperadorCod(),
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $usuario = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $usuario = $this->insert($this->queryBuilderInsert($options));
        }
        return $usuario;
    }

    /**
     * @param Usuario $obj
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