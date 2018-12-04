<?php

namespace Carroaluguel\Models\Utilizador;


use Core\DateTimeUnit;

abstract class PessoaFisica extends Pessoa
{
    /**
     * @var string
     */
    protected $nome;
    /**
     * @var string
     */
    protected $cpf;
    /**
     * @var string
     */
    protected $sexo;
    /**
     * @var string
     */
    protected $rg;
    /**
     * @var string
     */
    protected $passaporte;
    /**
     * @var DateTimeUnit
     */
    protected $dataNascimento;
    /**
     * @var array
     */
    protected $empresas;
    /**
     * @var string
     */
    protected $telefone;
    /**
     * @var string
     */
    protected $celular;

    abstract public function getNome();

    abstract public function setNome($nome);

    abstract public function getCpf();

    abstract public function setCpf($cpf);

    abstract public function getSexo();

    abstract public function setSexo($sexo);

    abstract public function getRg();

    abstract public function setRg($rg);

    abstract public function getPassaporte();

    abstract public function setPassaporte($passaporte);

    abstract public function getDataNascimento();

    abstract public function setDataNascimento($dataNascimento);

    abstract public function getEmpresas();

    abstract public function setEmpresas($empresas);

    abstract public function getTelefone();

    abstract public function setTelefone($telefone);

    abstract public function getCelular();

    abstract public function setCelular($celular);

}