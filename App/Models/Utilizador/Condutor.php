<?php

namespace Carroaluguel\Models\Utilizador;


use Carroaluguel\Models\Localidade\Endereco;
use Carroaluguel\Models\UtilizadorFacade;
use Core\DateTimeUnit;

class Condutor extends PessoaFisica
{
    /**
     * @var string
     */
    protected $sobrenome;
    /**
     * @var string
     */
    protected $cnh;
    /**
     * @var string
     */
    protected $validade_cnh;
    /**
     * @var string
     */
    protected $cih;
    /**
     * @var string
     */
    protected $validade_cih;
    /**
     * @var Cliente
     */
    protected $cliente;
    /**
     * @var string
     */
    protected $tipo;
    /**
     * @var int
     */
    protected $old_id;
    /**
     * @var bool
     */
    protected $inativo;

    /**
     * @var UtilizadorFacade
     */
    private $utilizador;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->utilizador = $facade;
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
     * @return Condutor
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
     * @return Condutor
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
     * @return Condutor
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
     * @return Condutor
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * @param string $sobrenome
     * @return Condutor
     */
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
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
     * @return Condutor
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
     * @return Condutor
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
     * @return Condutor
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
     * @return Condutor
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
     * @return Condutor
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
     * @return Condutor
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
     * @return Condutor
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
     * @return Condutor
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
        return $this;
    }

    /**
     * @return string
     */
    public function getCnh()
    {
        return $this->cnh;
    }

    /**
     * @param string $cnh
     * @return Condutor
     */
    public function setCnh($cnh)
    {
        $this->cnh = $cnh;
        return $this;
    }

    /**
     * @return string
     */
    public function getValidadeCnh()
    {
        return $this->validade_cnh;
    }

    /**
     * @param string $validade_cnh
     * @return Condutor
     */
    public function setValidadeCnh($validade_cnh)
    {
        $this->validade_cnh = $validade_cnh;
        return $this;
    }

    /**
     * @return string
     */
    public function getCih()
    {
        return $this->cih;
    }

    /**
     * @param string $cih
     * @return Condutor
     */
    public function setCih($cih)
    {
        $this->cih = $cih;
        return $this;
    }

    /**
     * @return string
     */
    public function getValidadeCih()
    {
        return $this->validade_cih;
    }

    /**
     * @param string $validade_cih
     * @return Condutor
     */
    public function setValidadeCih($validade_cih)
    {
        $this->validade_cih = $validade_cih;
        return $this;
    }

    /**
     * @return Cliente
     */
    public function getCliente()
    {
        if(!is_object($this->cliente) && $this->cliente){
            $cliente = $this->utilizador->showCliente($this->cliente);
            $this->cliente = $cliente;
        }
        return $this->cliente;
    }

    /**
     * @param Cliente $cliente
     * @return Condutor
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
        return $this;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     * @return Condutor
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return int
     */
    public function getOldId()
    {
        return $this->old_id;
    }

    /**
     * @param int $old_id
     * @return Condutor
     */
    public function setOldId($old_id)
    {
        $this->old_id = $old_id;
        return $this;
    }

    /**
     * @return bool
     */
    public function getInativo()
    {
        return $this->inativo;
    }

    /**
     * @param bool $inativo
     * @return Condutor
     */
    public function setInativo($inativo)
    {
        $this->inativo = $inativo;
        return $this;
    }

}