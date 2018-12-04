<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Carroaluguel\Models\Localidade\Cidade;
use Carroaluguel\Models\LocalidadeFacade;

class TelefoneCidade
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var Cidade
     */
    private $cidade;
    /**
     * @var int
     */
    private $cidade_id;
    /**
     * @var TelefoneNumero
     */
    private $numero;

    /**
     * @var AluguelCarrosFacade
     */
    private $aluguelcarros;

    /**
     * @var LocalidadeFacade
     */
    private $localidade;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->aluguelcarros = $facade;
            $this->localidade = new LocalidadeFacade($this->aluguelcarros->getEntityManager());
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
     * @return TelefoneCidade
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Cidade
     */
    public function getCidade()
    {
        if (!is_object($this->cidade) && $this->cidade){
            $this->cidade = $this->localidade->showCidade($this->cidade);
        }
        return $this->cidade;
    }

    /**
     * @param int $cidade
     * @return TelefoneCidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        $this->setCidadeId($cidade);
        return $this;
    }

    /**
     * @return int
     */
    public function getCidadeId()
    {
        return $this->cidade_id;
    }

    /**
     * @param int $cidade_id
     * @return TelefoneCidade
     */
    public function setCidadeId($cidade_id)
    {
        $this->cidade_id = $cidade_id;
        return $this;
    }

    /**
     * @return TelefoneNumero
     */
    public function getNumero()
    {
        if(!is_object($this->numero) && $this->numero){
            $this->numero = $this->aluguelcarros->showTelefoneNumero($this->numero);
        }
        return $this->numero;
    }

    /**
     * @param TelefoneNumero $numero
     * @return TelefoneCidade
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }


}