<?php

namespace Carroaluguel\Models\AluguelCarros;


class Carro
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $modelo;
    /**
     * @var int
     */
    private $passageiros;
    /**
     * @var int
     */
    private $malagde;
    /**
     * @var int
     */
    private $malapeq;
    /**
     * @var string
     */
    private $motor;
    /**
     * @var string
     */
    private $cambio;
    /**
     * @var string
     */
    private $descricao;
    /**
     * @var string
     */
    private $meta_title;
    /**
     * @var string
     */
    private $meta_description;
    /**
     * @var string
     */
    private $meta_keywords;
    /**
     * @var string
     */
    private $linkyoutube;
    /**
     * @var string
     */
    private $txtyoutube;
    /**
     * @var string
     */
    private $imagem;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Carro
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param string $modelo
     * @return Carro
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
        return $this;
    }

    /**
     * @return int
     */
    public function getPassageiros()
    {
        return $this->passageiros;
    }

    /**
     * @param int $passageiros
     * @return Carro
     */
    public function setPassageiros($passageiros)
    {
        $this->passageiros = $passageiros;
        return $this;
    }

    /**
     * @return int
     */
    public function getMalagde()
    {
        return $this->malagde;
    }

    /**
     * @param int $malagde
     * @return Carro
     */
    public function setMalagde($malagde)
    {
        $this->malagde = $malagde;
        return $this;
    }

    /**
     * @return int
     */
    public function getMalapeq()
    {
        return $this->malapeq;
    }

    /**
     * @param int $malapeq
     * @return Carro
     */
    public function setMalapeq($malapeq)
    {
        $this->malapeq = $malapeq;
        return $this;
    }

    /**
     * @return string
     */
    public function getMotor()
    {
        return $this->motor;
    }

    /**
     * @param string $motor
     * @return Carro
     */
    public function setMotor($motor)
    {
        $this->motor = $motor;
        return $this;
    }

    /**
     * @return string
     */
    public function getCambio()
    {
        return $this->cambio;
    }

    /**
     * @param string $cambio
     * @return Carro
     */
    public function setCambio($cambio)
    {
        $this->cambio = $cambio;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return Carro
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * @param string $meta_title
     * @return Carro
     */
    public function setMetaTitle($meta_title)
    {
        $this->meta_title = $meta_title;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * @param string $meta_description
     * @return Carro
     */
    public function setMetaDescription($meta_description)
    {
        $this->meta_description = $meta_description;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * @param string $meta_keywords
     * @return Carro
     */
    public function setMetaKeywords($meta_keywords)
    {
        $this->meta_keywords = $meta_keywords;
        return $this;
    }

    /**
     * @return string
     */
    public function getLinkyoutube()
    {
        return $this->linkyoutube;
    }

    /**
     * @param string $linkyoutube
     * @return Carro
     */
    public function setLinkyoutube($linkyoutube)
    {
        $this->linkyoutube = $linkyoutube;
        return $this;
    }

    /**
     * @return string
     */
    public function getTxtyoutube()
    {
        return $this->txtyoutube;
    }

    /**
     * @param string $txtyoutube
     * @return Carro
     */
    public function setTxtyoutube($txtyoutube)
    {
        $this->txtyoutube = $txtyoutube;
        return $this;
    }

    /**
     * @return string
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param string $imagem
     * @return Carro
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
        return $this;
    }

}