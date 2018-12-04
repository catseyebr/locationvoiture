<?php

namespace Carroaluguel\Models\Utilizador;


use Carroaluguel\Models\Localidade\Endereco;
use Core\DateTimeUnit;

class Emissor extends PessoaJuridica
{
    /**
     * @var bool
     */
    protected $faturamento;

    /**
     * @var int
     */
    protected $stur;

    /**
     * @var string
     */
    protected $telefone;

    /**
     * @var string
     */
    protected $fax;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $tipo;

    /**
     * @var string
     */
    protected $codigoweb;

    /**
     * @var string
     */
    protected $senhaweb;

    /**
     * @var string
     */
    protected $credito;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Emissor
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
     * @return Emissor
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
     * @return Emissor
     */
    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = new DateTimeUnit($data_cadastro);
        return $this;
    }

    /**
     * @return string
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param string $cnpj
     * @return Emissor
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
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
     * @return Emissor
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;
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
     * @return Emissor
     */
    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
        return $this;
    }

    /**
     * @return string
     */
    public function getIe()
    {
        return $this->ie;
    }

    /**
     * @param string $ie
     * @return Emissor
     */
    public function setIe($ie)
    {
        $this->ie = $ie;
        return $this;
    }

    /**
     * @return array
     */
    public function getResponsavel(){
        return $this->responsavel;
    }

    /**
     * @param mixed $responsavel
     * @return Emissor
     */
    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;
        return $this;
    }

    /**
     * @return array
     */
    public function getFuncionarios()
    {
        return $this->funcionarios;
    }

    /**
     * @param array $funcionarios
     * @return Emissor
     */
    public function setFuncionarios($funcionarios)
    {
        $this->funcionarios = $funcionarios;
        return $this;
    }

    /**
     * @return bool
     */
    public function getFaturamento()
    {
        return $this->faturamento;
    }

    /**
     * @param bool $faturamento
     * @return Emissor
     */
    public function setFaturamento($faturamento)
    {
        $this->faturamento = $faturamento;
        return $this;
    }

    /**
     * @return int
     */
    public function getStur()
    {
        return $this->stur;
    }

    /**
     * @param int $stur
     * @return Emissor
     */
    public function setStur($stur)
    {
        $this->stur = $stur;
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
     * @return Emissor
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
     * @return Emissor
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
     * @return Emissor
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * @return Emissor
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodigoweb()
    {
        return $this->codigoweb;
    }

    /**
     * @param string $codigoweb
     * @return Emissor
     */
    public function setCodigoweb($codigoweb)
    {
        $this->codigoweb = $codigoweb;
        return $this;
    }

    /**
     * @return string
     */
    public function getSenhaweb()
    {
        return $this->senhaweb;
    }

    /**
     * @param string $senhaweb
     * @return Emissor
     */
    public function setSenhaweb($senhaweb)
    {
        $this->senhaweb = $senhaweb;
        return $this;
    }

    /**
     * @return string
     */
    public function getCredito()
    {
        return $this->credito;
    }

    /**
     * @param string $credito
     * @return Emissor
     */
    public function setCredito($credito)
    {
        $this->credito = $credito;
        return $this;
    }

}