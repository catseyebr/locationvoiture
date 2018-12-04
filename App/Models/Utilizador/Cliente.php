<?php

namespace Carroaluguel\Models\Utilizador;


use Carroaluguel\Models\Localidade\Endereco;
use Core\DateTimeUnit;

class Cliente extends PessoaFisica
{
    /**
     * @var string
     */
    protected $email;
    /**
     * @var string
     */
    protected $login;
    /**
     * @var string
     */
    protected $senha;
    /**
     * @var bool
     */
    protected $ativo;
    /**
     * @var int
     */
    protected $oldid;
    /**
     * @var bool
     */
    protected $master;
    /**
     * @var array
     */
    protected $emissores;
    /**
     * @var Emissor
     */
    protected $emissor;
    /**
     * @var bool
     */
    protected $is_pj;
    /**
     * @var string
     */
    protected $afiliado_cod;
    /**
     * @var string
     */
    protected $facebook_id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Cliente
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Cliente
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * @param DateTimeUnit $data_cadastro
     * @return Cliente
     */
    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = new DateTimeUnit($data_cadastro);
        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Cliente
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     * @return Cliente
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param string $sexo
     * @return Cliente
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
        return $this;
    }

    /**
     * @return string
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @param string $rg
     * @return Cliente
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassaporte()
    {
        return $this->passaporte;
    }

    /**
     * @param string $passaporte
     * @return Cliente
     */
    public function setPassaporte($passaporte)
    {
        $this->passaporte = $passaporte;
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
     * @param string $dataNascimento
     * @return Cliente
     */
    public function setDataNascimento($dataNascimento)
    {
        if($dataNascimento != '--') {
            $this->dataNascimento = new DateTimeUnit($dataNascimento);
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getEmpresas()
    {
        return $this->empresas;
    }

    /**
     * @param string $empresas
     * @return Cliente
     */
    public function setEmpresas($empresas)
    {
        $this->empresas = $empresas;
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
     * @return Cliente
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }

    /**
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param string $celular
     * @return Cliente
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
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
     * @return Cliente
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return Cliente
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     * @return Cliente
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
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
     * @return Cliente
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return int
     */
    public function getOldid()
    {
        return $this->oldid;
    }

    /**
     * @param int $oldid
     * @return Cliente
     */
    public function setOldid($oldid)
    {
        $this->oldid = $oldid;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMaster()
    {
        return $this->master;
    }

    /**
     * @param bool $master
     * @return Cliente
     */
    public function setMaster($master)
    {
        $this->master = $master;
        return $this;
    }

    /**
     * @return array
     */
    public function getEmissores()
    {
        return $this->emissores;
    }

    /**
     * @param array $emissores
     * @return Cliente
     */
    public function setEmissores($emissores)
    {
        $this->emissores = $emissores;
        return $this;
    }

    /**
     * @return Emissor
     */
    public function getEmissor()
    {
        return $this->emissor;
    }

    /**
     * @param Emissor $emissor
     * @return Cliente
     */
    public function setEmissor($emissor)
    {
        $this->emissor = $emissor;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPj()
    {
        return $this->is_pj;
    }

    /**
     * @param bool $is_pj
     * @return Cliente
     */
    public function setIsPj($is_pj)
    {
        $this->is_pj = $is_pj;
        return $this;
    }

    /**
     * @return string
     */
    public function getAfiliadoCod()
    {
        return $this->afiliado_cod;
    }

    /**
     * @param string $afiliado_cod
     * @return Cliente
     */
    public function setAfiliadoCod($afiliado_cod)
    {
        $this->afiliado_cod = $afiliado_cod;
        return $this;
    }

    /**
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebook_id;
    }

    /**
     * @param string $facebook_id
     * @return Cliente
     */
    public function setFacebookId($facebook_id)
    {
        $this->facebook_id = $facebook_id;
        return $this;
    }


}