<?php

namespace Carroaluguel\Models\AluguelCarros;


class Categoria
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
    private $url_categoria;
    /**
     * @var string
     */
    private $descricao;
    /**
     * @var int
     */
    private $ordem;
    /**
     * @var array
     */
    private $grupos;
    /**
     * @var array
     */
    private $locadoras;
    /**
     * @var array
     */
    private $lojas;
    /**
     * @var array
     */
    private $cidades;
    /**
     * @var array
     */
    private $carros;
    /**
     * @var string
     */
    private $lista_carros;
    /**
     * @var string
     */
    private $lista_carrosfull;
    /**
     * @var
     */
    private $carro_principal;
    /**
     * @var string
     */
    private $linkname;
    /**
     * @var string
     */
    private $texto;
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
    private $h1;
    /**
     * @var array
     */
    private $motorizacao; //array
    /**
     * @var array
     */
    private $portas;
    /**
     * @var int
     */
    private $nextCateogria;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Categoria
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
     * @return Categoria
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrlCategoria()
    {
        return $this->url_categoria;
    }

    /**
     * @param string $url_categoria
     * @return Categoria
     */
    public function setUrlCategoria($url_categoria)
    {
        $this->url_categoria = $url_categoria;
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
     * @return Categoria
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrdem()
    {
        return $this->ordem;
    }

    /**
     * @param int $ordem
     * @return Categoria
     */
    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;
        return $this;
    }

    /**
     * @return array
     */
    public function getGrupos()
    {
        return $this->grupos;
    }

    /**
     * @param array $grupos
     * @return Categoria
     */
    public function setGrupos($grupos)
    {
        $this->grupos = $grupos;
        return $this;
    }

    /**
     * @return array
     */
    public function getLocadoras()
    {
        return $this->locadoras;
    }

    /**
     * @param array $locadoras
     * @return Categoria
     */
    public function setLocadoras($locadoras)
    {
        $this->locadoras = $locadoras;
        return $this;
    }

    /**
     * @return array
     */
    public function getLojas()
    {
        return $this->lojas;
    }

    /**
     * @param array $lojas
     * @return Categoria
     */
    public function setLojas($lojas)
    {
        $this->lojas = $lojas;
        return $this;
    }

    /**
     * @return array
     */
    public function getCidades()
    {
        return $this->cidades;
    }

    /**
     * @param array $cidades
     * @return Categoria
     */
    public function setCidades($cidades)
    {
        $this->cidades = $cidades;
        return $this;
    }

    /**
     * @return array
     */
    public function getCarros()
    {
        return $this->carros;
    }

    /**
     * @param array $carros
     * @return Categoria
     */
    public function setCarros($carros)
    {
        $this->carros = $carros;
        return $this;
    }

    /**
     * @return string
     */
    public function getListaCarros()
    {
        return $this->lista_carros;
    }

    /**
     * @param string $lista_carros
     * @return Categoria
     */
    public function setListaCarros($lista_carros)
    {
        $this->lista_carros = $lista_carros;
        return $this;
    }

    /**
     * @return string
     */
    public function getListaCarrosfull()
    {
        return $this->lista_carrosfull;
    }

    /**
     * @param string $lista_carrosfull
     * @return Categoria
     */
    public function setListaCarrosfull($lista_carrosfull)
    {
        $this->lista_carrosfull = $lista_carrosfull;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCarroPrincipal()
    {
        return $this->carro_principal;
    }

    /**
     * @param mixed $carro_principal
     * @return Categoria
     */
    public function setCarroPrincipal($carro_principal)
    {
        $this->carro_principal = $carro_principal;
        return $this;
    }

    /**
     * @return string
     */
    public function getLinkname()
    {
        return $this->linkname;
    }

    /**
     * @param string $linkname
     * @return Categoria
     */
    public function setLinkname($linkname)
    {
        $this->linkname = $linkname;
        return $this;
    }

    /**
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param string $texto
     * @return Categoria
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
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
     * @return Categoria
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
     * @return Categoria
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
     * @return Categoria
     */
    public function setMetaKeywords($meta_keywords)
    {
        $this->meta_keywords = $meta_keywords;
        return $this;
    }

    /**
     * @return string
     */
    public function getH1()
    {
        return $this->h1;
    }

    /**
     * @param string $h1
     * @return Categoria
     */
    public function setH1($h1)
    {
        $this->h1 = $h1;
        return $this;
    }

    /**
     * @return array
     */
    public function getMotorizacao()
    {
        return $this->motorizacao;
    }

    /**
     * @param array $motorizacao
     * @return Categoria
     */
    public function setMotorizacao($motorizacao)
    {
        $this->motorizacao = $motorizacao;
        return $this;
    }

    /**
     * @return array
     */
    public function getPortas()
    {
        return $this->portas;
    }

    /**
     * @param array $portas
     * @return Categoria
     */
    public function setPortas($portas)
    {
        $this->portas = $portas;
        return $this;
    }

    /**
     * @return int
     */
    public function getNextCateogria()
    {
        return $this->nextCateogria;
    }

    /**
     * @param int $nextCateogria
     * @return Categoria
     */
    public function setNextCateogria($nextCateogria)
    {
        $this->nextCateogria = $nextCateogria;
        return $this;
    }


}