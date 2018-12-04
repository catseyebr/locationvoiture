<?php

namespace Carroaluguel\Models\AluguelCarros;


use Core\DateTimeUnit;

class BannerCotacao
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $grupo;
    /**
     * @var string
     */
    private $imageurl;
    /**
     * @var string
     */
    private $lojas;
    /**
     * @var array
     */
    private $lojas_array;
    /**
     * @var string
     */
    private $cidades;
    /**
     * @var array
     */
    private $cidades_array;
    /**
     * @var DateTimeUnit
     */
    private $data_inicial;
    /**
     * @var DateTimeUnit
     */
    private $data_final;
    /**
     * @var string
     */
    private $tipo_validade;
    /**
     * @var bool
     */
    private $ativo;
    /**
     * @var int
     */
    private $categoria;
    /**
     * @var string
     */
    private $image_cta;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return BannerCotacao
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * @param int $grupo
     * @return BannerCotacao
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageurl()
    {
        return $this->imageurl;
    }

    /**
     * @param string $imageurl
     * @return BannerCotacao
     */
    public function setImageurl($imageurl)
    {
        $this->imageurl = $imageurl;
        return $this;
    }

    /**
     * @return string
     */
    public function getLojas()
    {
        return $this->lojas;
    }

    /**
     * @param string $lojas
     * @return BannerCotacao
     */
    public function setLojas($lojas)
    {
        $this->lojas = $lojas;
        $this->setLojasArray(explode(',',$lojas));
        return $this;
    }

    /**
     * @return array
     */
    public function getLojasArray()
    {
        return $this->lojas_array;
    }

    /**
     * @param array $lojas_array
     * @return BannerCotacao
     */
    public function setLojasArray($lojas_array)
    {
        $this->lojas_array = $lojas_array;
        return $this;
    }

    /**
     * @return string
     */
    public function getCidades()
    {
        return $this->cidades;
    }

    /**
     * @param string $cidades
     * @return BannerCotacao
     */
    public function setCidades($cidades)
    {
        $this->cidades = $cidades;
        $this->setCidadesArray(explode(',', $cidades));
        return $this;
    }

    /**
     * @return array
     */
    public function getCidadesArray()
    {
        return $this->cidades_array;
    }

    /**
     * @param array $cidades_array
     * @return BannerCotacao
     */
    public function setCidadesArray($cidades_array)
    {
        $this->cidades_array = $cidades_array;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataInicial()
    {
        return $this->data_inicial;
    }

    /**
     * @param DateTimeUnit $data_inicial
     * @return BannerCotacao
     */
    public function setDataInicial($data_inicial)
    {
        $this->data_inicial = new DateTimeUnit($data_inicial);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataFinal()
    {
        return $this->data_final;
    }

    /**
     * @param DateTimeUnit $data_final
     * @return BannerCotacao
     */
    public function setDataFinal($data_final)
    {
        $this->data_final = new DateTimeUnit($data_final);
        return $this;
    }

    /**
     * Retorna o tipo de validade do banner
     *
     * 1 - pela data de solicitação da reserva
     * 2 - pela data de retirada
     * 3 - pela data de devolução
     * @return string
     */
    public function getTipoValidade()
    {
        return $this->tipo_validade;
    }

    /**
     * @param string $tipo_validade
     * @return BannerCotacao
     */
    public function setTipoValidade($tipo_validade)
    {
        $this->tipo_validade = $tipo_validade;
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
     * @return BannerCotacao
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     * @return BannerCotacao
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
        return $this;
    }

    /**
     * @return int
     */
    public function getImageCta()
    {
        return $this->image_cta;
    }

    /**
     * @param int $image_cta
     * @return BannerCotacao
     */
    public function setImageCta($image_cta)
    {
        $this->image_cta = $image_cta;
        return $this;
    }


}