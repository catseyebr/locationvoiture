<?php

namespace Carroaluguel\Models\Financeiro\DAO;


use Carroaluguel\Models\Financeiro\Fornecedor;
use Carroaluguel\Models\FinanceiroFacade;
use Carroaluguel\Models\Localidade\Endereco;
use Core\QueryBuilder;
use Core\Repository;

class FornecedorDAO extends Repository
{
    protected $table = "tb_fornecedor";
    protected $primary_key = 'forn_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Fornecedor($facade);
            $obj->setId($dados->forn_id)
                ->setNomeFantasia($dados->forn_nome)
                ->setRazaoSocial($dados->forn_razaosocial)
                ->setAtivo($dados->forn_ativo)
                ->setPessoaJuridica($dados->forn_pesjur)
                ->setCpfCnpj($dados->forn_cpfcnpj)
                ->setRgIe($dados->forn_rgie)
                ->setDataCadastro($dados->forn_dthcadastro);
            $endereco = new Endereco();
            $endereco->setCidade($dados->forn_end_cidade)
                ->setBairro($dados->forn_end_bairro)
                ->setCep($dados->forn_end_cep)
                ->setRua($dados->forn_end_rua)
                ->setNumero($dados->forn_end_numero)
                ->setComplemento($dados->forn_end_complemento);
            $obj->setEndereco($endereco)
                ->setFones($dados->forn_fones)
                ->setFax($dados->forn_fax)
                ->setContato($dados->forn_contato)
                ->setCargo($dados->forn_cargo)
                ->setDataNascimento($dados->forn_dthnasc)
                ->setHomepage($dados->forn_homepage)
                ->setEmail($dados->forn_email)
                ->setTipo($dados->forn_tipo)
                ->setDescricao($dados->forn_descricao)
                ->setAliquotaComissao($dados->forn_comissao)
                ->setComissaoInclude($dados->forn_comissaoinclude);
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
            if (isset($options['forn_id'])) {
                $builder->where("forn_id", $options['forn_id']);
            }
            if (isset($options['forn_tipo'])) {
                $builder->where("forn_tipo", $options['forn_tipo']);
            }
            if (isset($options['forn_cpfcnpj'])) {
                $builder->like("forn_cpfcnpj", $options['forn_cpfcnpj']);
            }
            if (isset($options['forn_nome'])) {
                $builder->like("forn_nome", $options['forn_nome']);
            }
            if (isset($options['forn_razaosocial'])) {
                $builder->like("forn_razaosocial", $options['forn_razaosocial']);
            }
            if (isset($options['forn_comissao'])) {
                $builder->where("forn_comissao", $options['forn_comissao']);
            }
        }
        if (isset($options['grupo'])) {
            $builder->tableJoin('tb_grupofornecedor', 'tb_grupofornecedor.grpforn_fornecedor = tb_fornecedor.forn_id',
                'LEFT');
            $builder->where("grpforn_grupo", $options['grupo']);
        }
        if (isset($options['inIdGrupo'])) {
            $builder->tableJoin('tb_grupofornecedor', 'tb_grupofornecedor.grpforn_fornecedor = tb_fornecedor.forn_id',
                'LEFT');
            $builder->where_in("grpforn_grupo", $options['inIdGrupo']);
        }
        if (isset($options['id'])) {
            $builder->where("forn_id", $options['id']);
        }
        if (isset($options['nome'])) {
            $builder->like("forn_nome", $options['nome']);
        }
        if (isset($options['razaoSocial'])) {
            $builder->like("forn_razaosocial", $options['razaoSocial']);
        }
        if (isset($options['ativo'])) {
            $builder->where("forn_ativo", $options['ativo']);
        }
        if (isset($options['pessoaJuridica'])) {
            $builder->like("forn_pesjur", $options['ativo']);
        }
        if (isset($options['cpfcnpj'])) {
            $builder->where("forn_cpfcnpj", $options['cpfcnpj']);
        }
        if (isset($options['rgie'])) {
            $builder->like("forn_rgie", $options['rgie']);
        }
        if (isset($options['dataCadastro'])) {
            $builder->where("forn_dthcadastro", $options['dataCadastro']);
        }
        if (isset($options['cidade'])) {
            $builder->where("forn_end_cidade", $options['cidade']);
        }
        if (isset($options['bairro'])) {
            $builder->like("forn_end_bairro", $options['bairro']);
        }
        if (isset($options['cep'])) {
            $builder->like("forn_end_cep", $options['cep']);
        }
        if (isset($options['rua'])) {
            $builder->like("forn_end_rua", $options['rua']);
        }
        if (isset($options['numero'])) {
            $builder->like("forn_end_numero", $options['numero']);
        }
        if (isset($options['complemento'])) {
            $builder->like("forn_end_complemento", $options['complemento']);
        }
        if (isset($options['fones'])) {
            $builder->like("forn_fones", $options['fones']);
        }
        if (isset($options['fax'])) {
            $builder->like("forn_fax", $options['fax']);
        }
        if (isset($options['contato'])) {
            $builder->like("forn_contato", $options['contato']);
        }
        if (isset($options['cargo'])) {
            $builder->like("forn_cargo", $options['cargo']);
        }
        if (isset($options['dataNascimento'])) {
            $builder->where("forn_dthnasc", $options['dataNascimento']);
        }
        if (isset($options['homepage'])) {
            $builder->like("forn_homepage", $options['homepage']);
        }
        if (isset($options['email'])) {
            $builder->like("forn_email", $options['email']);
        }
        if (isset($options['tipo'])) {
            $builder->where("forn_tipo", $options['tipo']);
        }
        if (isset($options['descricao'])) {
            $builder->like("forn_descricao", $options['descricao']);
        }
        if (isset($options['aliquotaComissao'])) {
            $builder->where("forn_comissao", $options['aliquotaComissao']);
        }
        if (isset($options['comissaoInclude'])) {
            $builder->like("forn_comissaoinclude", $options['comissaoInclude']);
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
            $postData['forn_nome'] = $options['nome'];
        } else {
            $postData['forn_nome'] = null;
        }

        if (isset($options['razaoSocial'])) {
            $postData['forn_razaosocial'] = $options['razaoSocial'];
        } else {
            $postData['forn_razaosocial'] = null;
        }

        if (isset($options['ativo'])) {
            $postData['forn_ativo'] = $options['ativo'];
        } else {
            $postData['forn_ativo'] = 0;
        }

        if (isset($options['pessoaJuridica'])) {
            $postData['forn_pesjur'] = $options['pessoaJuridica'];
        } else {
            $postData['forn_pesjur'] = 0;
        }

        if (isset($options['cpfcnpj'])) {
            $postData['forn_cpfcnpj'] = $options['cpfcnpj'];
        } else {
            $postData['forn_cpfcnpj'] = null;
        }

        if (isset($options['rgie'])) {
            $postData['forn_rgie'] = $options['rgie'];
        } else {
            $postData['forn_rgie'] = null;
        }

        if (isset($options['dataCadastro'])) {
            $postData['forn_dthcadastro'] = $options['dataCadastro'];
        } else {
            $postData['forn_dthcadastro'] = date('Y-m-d H:i:s');
        }

        if (isset($options['cidade'])) {
            $postData['forn_end_cidade'] = $options['cidade'];
        } else {
            $postData['forn_end_cidade'] = null;
        }

        if (isset($options['bairro'])) {
            $postData['forn_end_bairro'] = $options['bairro'];
        } else {
            $postData['forn_end_bairro'] = null;
        }

        if (isset($options['cep'])) {
            $postData['forn_end_cep'] = $options['cep'];
        } else {
            $postData['forn_end_cep'] = null;
        }

        if (isset($options['rua'])) {
            $postData['forn_end_rua'] = $options['rua'];
        } else {
            $postData['forn_end_rua'] = null;
        }

        if (isset($options['numero'])) {
            $postData['forn_end_numero'] = $options['numero'];
        } else {
            $postData['forn_end_numero'] = null;
        }

        if (isset($options['complemento'])) {
            $postData['forn_end_complemento'] = $options['complemento'];
        } else {
            $postData['forn_end_complemento'] = null;
        }

        if (isset($options['fones'])) {
            $postData['forn_fones'] = $options['fones'];
        } else {
            $postData['forn_fones'] = null;
        }

        if (isset($options['fax'])) {
            $postData['forn_fax'] = $options['fax'];
        } else {
            $postData['forn_fax'] = null;
        }

        if (isset($options['contato'])) {
            $postData['forn_contato'] = $options['contato'];
        } else {
            $postData['forn_contato'] = null;
        }

        if (isset($options['cargo'])) {
            $postData['forn_cargo'] = $options['cargo'];
        } else {
            $postData['forn_cargo'] = null;
        }

        if (isset($options['dataNascimento'])) {
            $postData['forn_dthnasc'] = $options['dataNascimento'];
        } else {
            $postData['forn_dthnasc'] = null;
        }

        if (isset($options['homepage'])) {
            $postData['forn_homepage'] = $options['homepage'];
        } else {
            $postData['forn_homepage'] = null;
        }

        if (isset($options['email'])) {
            $postData['forn_email'] = $options['email'];
        } else {
            $postData['forn_email'] = null;
        }

        if (isset($options['tipo'])) {
            $postData['forn_tipo'] = $options['tipo'];
        } else {
            $postData['forn_tipo'] = null;
        }

        if (isset($options['descricao'])) {
            $postData['forn_descricao'] = $options['descricao'];
        } else {
            $postData['forn_descricao'] = null;
        }

        if (isset($options['aliquotaComissao'])) {
            $postData['forn_comissao'] = $options['aliquotaComissao'];
        } else {
            $postData['forn_comissao'] = null;
        }

        if (isset($options['comissaoInclude'])) {
            $postData['forn_comissaoinclude'] = $options['comissaoInclude'];
        } else {
            $postData['forn_comissaoinclude'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set("forn_nome", $options['nome']);
        }
        if (isset($options['razaoSocial'])) {
            $builder->set("forn_razaosocial", $options['razaoSocial']);
        }
        if (isset($options['ativo'])) {
            $builder->set("forn_ativo", $options['ativo']);
        }
        if (isset($options['pessoajuridica'])) {
            $builder->set("forn_pesjur", $options['ativo']);
        }
        if (isset($options['cpfcnpj'])) {
            $builder->set("forn_cpfcnpj", $options['cpfcnpj']);
        }
        if (isset($options['rgie'])) {
            $builder->set("forn_rgie", $options['rgie']);
        }
        if (isset($options['dataCadastro'])) {
            $builder->set("forn_dthcadastro", $options['dataCadastro']);
        }
        if (isset($options['cidade'])) {
            $builder->set("forn_end_cidade", $options['cidade']);
        }
        if (isset($options['bairro'])) {
            $builder->set("forn_end_bairro", $options['bairro']);
        }
        if (isset($options['cep'])) {
            $builder->set("forn_end_cep", $options['cep']);
        }
        if (isset($options['rua'])) {
            $builder->set("forn_end_rua", $options['rua']);
        }
        if (isset($options['numero'])) {
            $builder->set("forn_end_numero", $options['numero']);
        }
        if (isset($options['complemento'])) {
            $builder->set("forn_end_complemento", $options['complemento']);
        }
        if (isset($options['fones'])) {
            $builder->set("forn_fones", $options['fones']);
        }
        if (isset($options['fax'])) {
            $builder->set("forn_fax", $options['fax']);
        }
        if (isset($options['contato'])) {
            $builder->set("forn_contato", $options['contato']);
        }
        if (isset($options['cargo'])) {
            $builder->set("forn_cargo", $options['cargo']);
        }
        if (isset($options['dataNascimento'])) {
            $builder->set("forn_dthnasc", $options['dataNascimento']);
        }
        if (isset($options['homepage'])) {
            $builder->set("forn_homepage", $options['homepage']);
        }
        if (isset($options['email'])) {
            $builder->set("forn_email", $options['email']);
        }
        if (isset($options['tipo'])) {
            $builder->set("forn_tipo", $options['tipo']);
        }
        if (isset($options['descricao'])) {
            $builder->set("forn_descricao", $options['descricao']);
        }
        if (isset($options['aliquotaComissao'])) {
            $builder->set("forn_comissao", $options['aliquotaComissao']);
        }
        if (isset($options['comissaoInclude'])) {
            $builder->set("forn_comissaoinclude", $options['comissaoInclude']);
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
     * @param Fornecedor $obj
     * @param FinanceiroFacade $facade
     * @return Fornecedor
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNomeFantasia(),
            'razaoSocial' => $obj->getRazaoSocial(),
            'ativo' => ($obj->getAtivo()) ? '1' : '0',
            'pessoaJuridica' => ($obj->getPessoaJuridica()) ? '1' : '0',
            'cpfcnpj' => $obj->getCpfCnpj(),
            'rgie' => $obj->getRgIe(),
            'dataCadastro' => (is_object($obj->getDataCadastro())) ? $obj->getDataCadastro()->getDataHoraSql() : null,
            'cep' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getCep() : null,
            'cidade' => (is_object($obj->getEndereco())) ? ((is_object($obj->getEndereco()->getCidade()) ? $obj->getEndereco()->getCidade()->getId() : null)) : null,
            'rua' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getRua() : null,
            'numero' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getNumero() : null,
            'complemento' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getComplemento() : null,
            'bairro' => (is_object($obj->getEndereco())) ? $obj->getEndereco()->getBairro() : null,
            'fones' => $obj->getFones(),
            'fax' => $obj->getFax(),
            'contato' => $obj->getContato(),
            'cargo' => $obj->getCargo(),
            'dataNascimento' => (is_object($obj->getDataNascimento())) ? $obj->getDataNascimento()->getDataHoraSql() : null,
            'homepage' => $obj->getHomePage(),
            'email' => $obj->getEmail(),
            'tipo' => $obj->getTipo()->getId(),
            'descricao' => $obj->getDescricao(),
            'aliquotaComissao' => $obj->getAliquotaComissao(),
            'comissaoInclude' => $obj->getComissaoIncludeString()
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
     * @param Fornecedor $obj
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