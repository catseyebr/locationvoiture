<?php

namespace Carroaluguel\Models\Utilizador;


use Carroaluguel\Models\Localidade\Endereco;
use Core\DateTimeUnit;

class Usuario extends PessoaFisica
{
    /**
     * @var string
     */
    private $emailPrincipal;

    /**
     * @var string
     */
    private $emailHost;

    /**
     * @var string
     */
    private $emailPort;

    /**
     * @var string
     */
    private $emailUsuario;

    /**
     * @var string
     */
    private $emailSenha;

    /**
     * @var string
     */
    private $senha;

    /**
     * @var bool
     */
    private $ativo;

    /**
     * @var
     */
    private $nivel;

    /**
     * @var int
     */
    private $operador;

    /**
     * @var string
     */
    private $operador_user;

    /**
     * @var string
     */
    private $operador_cod;

    /**
     * @var array
     */
    private $afiliados;

    /**
     * @var
     */
    private $afiliado_cod;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = new DateTimeUnit($dataNascimento);
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
     * @return Usuario
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
     * @return Usuario
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
     * @return Usuario
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailPrincipal()
    {
        return $this->emailPrincipal;
    }

    /**
     * @param string $emailPrincipal
     * @return Usuario
     */
    public function setEmailPrincipal($emailPrincipal)
    {
        $this->emailPrincipal = $emailPrincipal;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailHost()
    {
        return $this->emailHost;
    }

    /**
     * @param string $emailHost
     * @return Usuario
     */
    public function setEmailHost($emailHost)
    {
        $this->emailHost = $emailHost;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailPort()
    {
        return $this->emailPort;
    }

    /**
     * @param string $emailPort
     * @return Usuario
     */
    public function setEmailPort($emailPort)
    {
        $this->emailPort = $emailPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailUsuario()
    {
        return $this->emailUsuario;
    }

    /**
     * @param string $emailUsuario
     * @return Usuario
     */
    public function setEmailUsuario($emailUsuario)
    {
        $this->emailUsuario = $emailUsuario;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailSenha()
    {
        return $this->emailSenha;
    }

    /**
     * @param string $emailSenha
     * @return Usuario
     */
    public function setEmailSenha($emailSenha)
    {
        $this->emailSenha = $emailSenha;
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
     * @return Usuario
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
     * @return Usuario
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * @param mixed $nivel
     * @return Usuario
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
        return $this;
    }

    /**
     * @return int
     */
    public function getOperador()
    {
        return $this->operador;
    }

    /**
     * @param int $operador
     * @return Usuario
     */
    public function setOperador($operador)
    {
        $this->operador = $operador;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperadorUser()
    {
        return $this->operador_user;
    }

    /**
     * @param string $operador_user
     * @return Usuario
     */
    public function setOperadorUser($operador_user)
    {
        $this->operador_user = $operador_user;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperadorCod()
    {
        return $this->operador_cod;
    }

    /**
     * @param string $operador_cod
     * @return Usuario
     */
    public function setOperadorCod($operador_cod)
    {
        $this->operador_cod = $operador_cod;
        return $this;
    }

    /**
     * @return array
     */
    public function getAfiliados()
    {
        return $this->afiliados;
    }

    /**
     * @param array $afiliados
     * @return Usuario
     */
    public function setAfiliados($afiliados)
    {
        $this->afiliados = $afiliados;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAfiliado()
    {
        return $this->afiliado_cod;
    }

    /**
     * @param mixed $afiliado_cod
     * @return Usuario
     */
    public function setAfiliado($afiliado_cod)
    {
        $this->afiliado_cod = $afiliado_cod;
        return $this;
    }

}