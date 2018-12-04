<?php

namespace Carroaluguel\Models\Financeiro;


use Carroaluguel\Models\Localidade\Endereco;
use Core\DateTimeUnit;

abstract class FornecedorCliente
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $nomeFantasia;

    /**
     * @var string
     */
    protected $razaoSocial;

    /**
     * @var bool
     */
    protected $ativo;

    /**
     * @var bool
     */
    protected $pessoaJuridica;

    /**
     * @var string
     */
    protected $cpfCnpj;

    /**
     * @var string
     */
    protected $rgIe;

    /**
     * @var DateTimeUnit
     */
    protected $dataCadastro;

    /**
     * @var Endereco
     */
    protected $endereco;

    /**
     * @var string
     */
    protected $fones;

    /**
     * @var string
     */
    protected $fax;

    /**
     * @var string
     */
    protected $contato;

    /**
     * @var string
     */
    protected $cargo;

    /**
     * @var DateTimeUnit
     */
    protected $dataNascimento;

    /**
     * @var string
     */
    protected $homepage;

    /**
     * @var string
     */
    protected $email;

    abstract public function getId();

    abstract public function setId($id);

    abstract public function getNomeFantasia();

    abstract public function setNomeFantasia($nomeFantasia);

    abstract public function getRazaoSocial();

    abstract public function setRazaoSocial($razaoSocial);

    abstract public function getAtivo();

    abstract public function setAtivo($ativo);

    abstract public function getPessoaJuridica();

    abstract public function setPessoaJuridica($pessoaJuridica);

    abstract public function getCpfCnpj();

    abstract public function setCpfCnpj($cpfCnpj);

    abstract public function getRgIe();

    abstract public function setRgIe($rgIe);

    abstract public function getDataCadastro();

    abstract public function setDataCadastro($dataCadastro);

    abstract public function getEndereco();

    abstract public function setEndereco($endereco);

    abstract public function getFones();

    abstract public function setFones($fones);

    abstract public function getFax();

    abstract public function setFax($fax);

    abstract public function getContato();

    abstract public function setContato($contato);

    abstract public function getCargo();

    abstract public function setCargo($cargo);

    abstract public function getDataNascimento();

    abstract public function setDataNascimento($dataNascimento);

    abstract public function getHomepage();

    abstract public function setHomepage($homepage);

    abstract public function getEmail();

    abstract public function setEmail($email);

}