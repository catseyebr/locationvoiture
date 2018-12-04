<?php


namespace Carroaluguel\Models\Utilizador;

use Carroaluguel\Models\Localidade\Endereco;
use Core\DateTimeUnit;

abstract class Pessoa
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var Endereco
     */
    protected $endereco;
    /**
     * @var DateTimeUnit
     */
    protected $data_cadastro;

    abstract public function getId();

    abstract public function setId($id);

    abstract public function getEndereco();

    abstract public function setEndereco($endereco);

    abstract public function getDataCadastro();

    abstract public function setDataCadastro($data_cadastro);
}