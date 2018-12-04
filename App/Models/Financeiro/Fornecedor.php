<?php

namespace Carroaluguel\Models\Financeiro;

use Carroaluguel\Models\FinanceiroFacade;
use Carroaluguel\Models\Localidade\Endereco;
use Core\DateTimeUnit;

class Fornecedor extends FornecedorCliente
{
    /**
     * @var TipoFornecedor
     */
    private $tipo;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var float
     */
    private $aliquotaComissao;

    /**
     * @var array
     */
    private $comissaoInclude;

    /**
     * @var Movimentacao[]
     */
    private $movimentacoes;

    /**
     * @var int
     */
    private $grupo;

    /**
     * @var FinanceiroFacade
     */
    private $financeiro;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->financeiro = $facade;
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Fornecedor
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    /**
     * @param string $nomeFantasia
     * @return Fornecedor
     */
    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
        return $this;
    }

    /**
     * @return string
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * @param string $razaoSocial
     * @return Fornecedor
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param bool $ativo
     * @return Fornecedor
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return bool
     */
    public function getPessoaJuridica()
    {
        return $this->pessoaJuridica;
    }

    /**
     * @param bool $pessoaJuridica
     * @return Fornecedor
     */
    public function setPessoaJuridica($pessoaJuridica)
    {
        $this->pessoaJuridica = $pessoaJuridica;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    /**
     * @param string $cpfCnpj
     * @return Fornecedor
     */
    public function setCpfCnpj($cpfCnpj)
    {
        $this->cpfCnpj = $cpfCnpj;
        return $this;
    }

    /**
     * @return string
     */
    public function getRgIe()
    {
        return $this->rgIe;
    }

    /**
     * @param string $rgIe
     * @return Fornecedor
     */
    public function setRgIe($rgIe)
    {
        $this->rgIe = $rgIe;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * @param DateTimeUnit $dataCadastro
     * @return Fornecedor
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
        return $this;
    }

    /**
     * @return Endereco
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param Endereco $endereco
     * @return Fornecedor
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return string
     */
    public function getFones()
    {
        return $this->fones;
    }

    /**
     * @param string $fones
     * @return Fornecedor
     */
    public function setFones($fones)
    {
        $this->fones = $fones;
        return $this;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return Fornecedor
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return string
     */
    public function getContato()
    {
        return $this->contato;
    }

    /**
     * @param string $contato
     * @return Fornecedor
     */
    public function setContato($contato)
    {
        $this->contato = $contato;
        return $this;
    }

    /**
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param string $cargo
     * @return Fornecedor
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * @param DateTimeUnit $dataNascimento
     * @return Fornecedor
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    /**
     * @return string
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * @param string $homepage
     * @return Fornecedor
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Fornecedor
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return TipoFornecedor
     */
    public function getTipo()
    {
        if (!is_object($this->tipo) && $this->tipo) {
            $this->tipo = $this->financeiro->showTipoFornecedor($this->tipo);
        }
        return $this->tipo;
    }

    /**
     * @param TipoFornecedor $tipo
     * @return Fornecedor
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return Fornecedor
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return float
     */
    public function getAliquotaComissao()
    {
        return $this->aliquotaComissao;
    }

    /**
     * @param float $aliquotaComissao
     * @return Fornecedor
     */
    public function setAliquotaComissao($aliquotaComissao)
    {
        $this->aliquotaComissao = $aliquotaComissao;
        return $this;
    }

    /**
     * @return array
     */
    public function getComissaoInclude()
    {
        return $this->comissaoInclude;
    }

    /**
     * @param string $comissaoInclude
     * @return Fornecedor
     */
    public function setComissaoInclude($comissaoInclude)
    {
        $includeArray = array();
        if ($comissaoInclude) {
            $includeArray = explode(',', $comissaoInclude);
        }
        $this->comissaoInclude = $includeArray;
        return $this;
    }

    /**
     * @return string
     */
    public function getComissaoIncludeString()
    {
        $comInclude = '';
        if (is_array($this->comissaoInclude)) {
            $num = 0;
            foreach ($this->comissaoInclude as $com) {
                if ($num != 0) {
                    $comInclude .= ',';
                }
                $comInclude .= $com;
                $num++;
            }
        }
        return $comInclude;
    }

    /**
     * @return array
     */
    public function getMovimentacoes()
    {
        if (!is_array($this->movimentacoes)) {
            $this->movimentacoes = $this->financeiro->listMovimentacoes(array('fornecedor' => $this->id));
        }
        return $this->movimentacoes;
    }

    /**
     * @param array $movimentacoes
     * @return Fornecedor
     */
    public function setMovimentacoes($movimentacoes)
    {
        $this->movimentacoes = $movimentacoes;
        return $this;
    }

    /**
     * @return int
     */
    public function getGrupo()
    {
        if (!is_object($this->grupo) && $this->grupo) {
            $this->grupo = $this->financeiro->showGrupoCobranca($this->grupo);
        }
        return $this->grupo;
    }

    /**
     * @param int $grupo
     * @return Fornecedor
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
        return $this;
    }

}