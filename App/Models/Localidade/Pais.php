<?php

namespace Carroaluguel\Models\Localidade;


class Pais
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var string
     */
    private $iso;
    /**
     * @var Pais
     */
    private $tld;
    /**
     * @var string
     */
    private $continente;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Pais
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Pais
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * @param string $iso
     * @return Pais
     */
    public function setIso($iso)
    {
        $this->iso = $iso;
        return $this;
    }

    /**
     * @return Pais
     */
    public function getTld()
    {
        return $this->tld;
    }

    /**
     * @param Pais $tld
     * @return Pais
     */
    public function setTld($tld)
    {
        $this->tld = $tld;
        return $this;
    }

    /**
     * @return string
     */
    public function getContinente()
    {
        return $this->continente;
    }

    /**
     * @param string $continente
     * @return Pais
     */
    public function setContinente($continente)
    {
        $this->continente = $continente;
        return $this;
    }


}