<?php

namespace Carroaluguel\Models\Utilizador;


abstract class PessoaJuridica extends Pessoa
{
    /**
     * @var string
     */
    protected $cnpj;
    /**
     * @var string
     */
    protected $razaoSocial;
    /**
     * @var string
     */
    protected $nomeFantasia;
    /**
     * @var string
     */
    protected $ie;
    /**
     * @var
     */
    protected $responsavel;
    /**
     * @var array
     */
    protected $funcionarios;

    abstract public function getCnpj();

    abstract public function setCnpj($cnpj);

    abstract public function getRazaoSocial();

    abstract public function setRazaoSocial($razaoSocial);

    abstract public function getNomeFantasia();

    abstract public function setNomeFantasia($nomeFantasia);

    abstract public function getIe();

    abstract public function setIe($ie);

    abstract public function getResponsavel();

    abstract public function setResponsavel($responsavel);

    abstract public function getFuncionarios();

    abstract public function setFuncionarios($funcionarios);

}