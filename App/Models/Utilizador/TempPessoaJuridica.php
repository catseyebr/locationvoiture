<?php

namespace Carroaluguel\Models\Utilizador;


use Carroaluguel\Models\UtilizadorFacade;
use Carroaluguel\Models\Localidade\Cidade;
use Carroaluguel\Models\Localidade\Estado;
use Carroaluguel\Models\LocalidadeFacade;
use Core\DateTimeUnit;

class TempPessoaJuridica
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $telefone;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $cep;

    /**
     * @var string
     */
    private $bairro;

    /**
     * @var Cidade
     */
    private $cidade;

    /**
     * @var Estado
     */
    private $uf;

    /**
     * @var string
     */
    private $cnpj_cod;

    /**
     * @var string
     */
    private $nomefantasia;

    /**
     * @var string
     */
    private $endereco;

    /**
     * @var string
     */
    private $nomeresp;

    /**
     * @var string
     */
    private $emailresp;

    /**
     * @var DateTimeUnit
     */
    private $dthcadastro;

    /**
     * @var bool
     */
    private $ativo;

    /**
     * @var DateTimeUnit
     */
    private $dthprocess;

    /**
     * @var string
     */
    private $razao;

    /**
     * @var string
     */
    private $end_numero;

    /**
     * @var string
     */
    private $end_complemento;

    /**
     * @var string
     */
    private $nome_master;

    /**
     * @var string
     */
    private $cpf_master;

    /**
     * @var string
     */
    private $nascimento_master;

    /**
     * @var string
     */
    private $cep_master;

    /**
     * @var string
     */
    private $end_endereco_master;

    /**
     * @var string
     */
    private $numero_master;

    /**
     * @var string
     */
    private $complemento_master;

    /**
     * @var string
     */
    private $end_bairro_master;

    /**
     * @var Estado
     */
    private $end_estado_master;

    /**
     * @var Cidade
     */
    private $end_cidade_master;

    /**
     * @var string
     */
    private $telefone_master;

    /**
     * @var string
     */
    private $celular_master;

    /**
     * @var string
     */
    private $email_master;

    /**
     * @var string
     */
    private $login_master;

    /**
     * @var string
     */
    private $senha_master;

    /**
     * @var UtilizadorFacade
     */
    private $utilizador;

    /**
     * @var LocalidadeFacade
     */
    private $localidade;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->utilizador = $facade;
            $this->localidade = new LocalidadeFacade($this->utilizador->getEntityManager());
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
     * @return TempPessoaJuridica
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param string $telefone
     * @return TempPessoaJuridica
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
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
     * @return TempPessoaJuridica
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
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
     * @return TempPessoaJuridica
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     * @return TempPessoaJuridica
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }

    /**
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     * @return TempPessoaJuridica
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @return Cidade
     */
    public function getCidade()
    {
        if (!is_object($this->cidade) && $this->cidade) {
            $this->cidade = $this->localidade->showCidade($this->cidade);
        }
        return $this->cidade;
    }

    /**
     * @param Cidade $cidade
     * @return TempPessoaJuridica
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return Estado
     */
    public function getUf()
    {
        if (!is_object($this->uf) && $this->uf) {
            $this->uf = $this->localidade->showEstado($this->uf);
        }
        return $this->uf;
    }

    /**
     * @param Estado $uf
     * @return TempPessoaJuridica
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
        return $this;
    }

    /**
     * @return string
     */
    public function getCnpjCod()
    {
        return $this->cnpj_cod;
    }

    /**
     * @param string $cnpj_cod
     * @return TempPessoaJuridica
     */
    public function setCnpjCod($cnpj_cod)
    {
        $this->cnpj_cod = $cnpj_cod;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomefantasia()
    {
        return $this->nomefantasia;
    }

    /**
     * @param string $nomefantasia
     * @return TempPessoaJuridica
     */
    public function setNomefantasia($nomefantasia)
    {
        $this->nomefantasia = $nomefantasia;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param string $endereco
     * @return TempPessoaJuridica
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeresp()
    {
        return $this->nomeresp;
    }

    /**
     * @param string $nomeresp
     * @return TempPessoaJuridica
     */
    public function setNomeresp($nomeresp)
    {
        $this->nomeresp = $nomeresp;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailResp()
    {
        return $this->emailresp;
    }

    /**
     * @param string $emailresp
     * @return TempPessoaJuridica
     */
    public function setEmailResp($emailresp)
    {
        $this->emailresp = $emailresp;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDthcadastro()
    {
        return $this->dthcadastro;
    }

    /**
     * @param DateTimeUnit $dthcadastro
     * @return TempPessoaJuridica
     */
    public function setDthcadastro($dthcadastro)
    {
        $this->dthcadastro = new DateTimeUnit($dthcadastro);
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
     * @return TempPessoaJuridica
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDthprocess()
    {
        return $this->dthprocess;
    }

    /**
     * @param DateTimeUnit $dthprocess
     * @return TempPessoaJuridica
     */
    public function setDthprocess($dthprocess)
    {
        $this->dthprocess = new DateTimeUnit($dthprocess);
        return $this;
    }

    /**
     * @return string
     */
    public function getRazao()
    {
        return $this->razao;
    }

    /**
     * @param string $razao
     * @return TempPessoaJuridica
     */
    public function setRazao($razao)
    {
        $this->razao = $razao;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndNumero()
    {
        return $this->end_numero;
    }

    /**
     * @param string $end_numero
     * @return TempPessoaJuridica
     */
    public function setEndNumero($end_numero)
    {
        $this->end_numero = $end_numero;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndComplemento()
    {
        return $this->end_complemento;
    }

    /**
     * @param string $end_complemento
     * @return TempPessoaJuridica
     */
    public function setEndComplemento($end_complemento)
    {
        $this->end_complemento = $end_complemento;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeMaster()
    {
        return $this->nome_master;
    }

    /**
     * @param string $nome_master
     * @return TempPessoaJuridica
     */
    public function setNomeMaster($nome_master)
    {
        $this->nome_master = $nome_master;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpfMaster()
    {
        return $this->cpf_master;
    }

    /**
     * @param string $cpf_master
     * @return TempPessoaJuridica
     */
    public function setCpfMaster($cpf_master)
    {
        $this->cpf_master = $cpf_master;
        return $this;
    }

    /**
     * @return string
     */
    public function getNascimentoMaster()
    {
        return $this->nascimento_master;
    }

    /**
     * @param string $nascimento_master
     * @return TempPessoaJuridica
     */
    public function setNascimentoMaster($nascimento_master)
    {
        $this->nascimento_master = $nascimento_master;
        return $this;
    }

    /**
     * @return string
     */
    public function getCepMaster()
    {
        return $this->cep_master;
    }

    /**
     * @param string $cep_master
     * @return TempPessoaJuridica
     */
    public function setCepMaster($cep_master)
    {
        $this->cep_master = $cep_master;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndEnderecoMaster()
    {
        return $this->end_endereco_master;
    }

    /**
     * @param string $end_endereco_master
     * @return TempPessoaJuridica
     */
    public function setEndEnderecoMaster($end_endereco_master)
    {
        $this->end_endereco_master = $end_endereco_master;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumeroMaster()
    {
        return $this->numero_master;
    }

    /**
     * @param string $numero_master
     * @return TempPessoaJuridica
     */
    public function setNumeroMaster($numero_master)
    {
        $this->numero_master = $numero_master;
        return $this;
    }

    /**
     * @return string
     */
    public function getComplementoMaster()
    {
        return $this->complemento_master;
    }

    /**
     * @param string $complemento_master
     * @return TempPessoaJuridica
     */
    public function setComplementoMaster($complemento_master)
    {
        $this->complemento_master = $complemento_master;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndBairroMaster()
    {
        return $this->end_bairro_master;
    }

    /**
     * @param string $end_bairro_master
     * @return TempPessoaJuridica
     */
    public function setEndBairroMaster($end_bairro_master)
    {
        $this->end_bairro_master = $end_bairro_master;
        return $this;
    }

    /**
     * @return Estado
     */
    public function getEndEstadoMaster()
    {
        if (!is_object($this->end_estado_master) && $this->end_estado_master) {
            $this->end_estado_master = $this->localidade->showEstado($this->end_estado_master);
        }
        return $this->end_estado_master;
    }

    /**
     * @param Estado $end_estado_master
     * @return TempPessoaJuridica
     */
    public function setEndEstadoMaster($end_estado_master)
    {
        $this->end_estado_master = $end_estado_master;
        return $this;
    }

    /**
     * @return Cidade
     */
    public function getEndCidadeMaster()
    {
        if (!is_object($this->end_cidade_master) && $this->end_cidade_master) {
            $this->end_cidade_master = $this->localidade->showCidade($this->end_cidade_master);
        }
        return $this->end_cidade_master;
    }

    /**
     * @param Cidade $end_cidade_master
     * @return TempPessoaJuridica
     */
    public function setEndCidadeMaster($end_cidade_master)
    {
        $this->end_cidade_master = $end_cidade_master;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelefoneMaster()
    {
        return $this->telefone_master;
    }

    /**
     * @param string $telefone_master
     * @return TempPessoaJuridica
     */
    public function setTelefoneMaster($telefone_master)
    {
        $this->telefone_master = $telefone_master;
        return $this;
    }

    /**
     * @return string
     */
    public function getCelularMaster()
    {
        return $this->celular_master;
    }

    /**
     * @param string $celular_master
     * @return TempPessoaJuridica
     */
    public function setCelularMaster($celular_master)
    {
        $this->celular_master = $celular_master;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailMaster()
    {
        return $this->email_master;
    }

    /**
     * @param string $email_master
     * @return TempPessoaJuridica
     */
    public function setEmailMaster($email_master)
    {
        $this->email_master = $email_master;
        return $this;
    }

    /**
     * @return string
     */
    public function getLoginMaster()
    {
        return $this->login_master;
    }

    /**
     * @param string $login_master
     * @return TempPessoaJuridica
     */
    public function setLoginMaster($login_master)
    {
        $this->login_master = $login_master;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenhaMaster()
    {
        return $this->senha_master;
    }

    /**
     * @param string $senha_master
     * @return TempPessoaJuridica
     */
    public function setSenhaMaster($senha_master)
    {
        $this->senha_master = $senha_master;
        return $this;
    }


}