<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;

class Grupo
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var Categoria
     */
    private $categoria;
    /**
     * @var int
     */
    private $categoria_id;
    /**
     * @var Locadora
     */
    private $locadora;
    /**
     * @var int
     */
    private $locadora_id;
    /**
     * @var string
     */
    private $country;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var string
     */
    private $sipp;
    /**
     * @var int
     */
    private $ota_tipo;
    /**
     * @var int
     */
    private $ota_size;
    /**
     * @var int
     */
    private $ota_portas;
    /**
     * @var string
     */
    private $franquia;
    /**
     * @var
     */
    private $franquias;
    /**
     * @var string
     */
    private $franquia_terceiros;
    /**
     * @var string
     */
    private $caucao;
    /**
     * @var int
     */
    private $caucao_real;
    /**
     * @var bool
     */
    private $cambio_auto;
    /**
     * @var array
     */
    private $carros;
    /**
     * @var array
     */
    private $carros_ordem;
    /**
     * @var
     */
    private $carro_principal;
    /**
     * @var string
     */
    private $lista_carros;
    /**
     * @var
     */
    private $protecoes;
    /**
     * @var
     */
    private $protecao_padrao;
    /**
     * @var
     */
    private $tarifas;
    /**
     * @var
     */
    private $tarifas_loja;
    /**
     * @var bool
     */
    private $duas_portas = false;
    /**
     * @var bool
     */
    private $quatro_portas = false;
    /**
     * @var bool
     */
    private $dh = false;
    /**
     * @var bool
     */
    private $ac = false;
    /**
     * @var bool
     */
    private $te = false;
    /**
     * @var bool
     */
    private $cd = false;
    /**
     * @var bool
     */
    private $airbag = false;
    /**
     * @var bool
     */
    private $freio_abs = false;
    /**
     * @var bool
     */
    private $gps = false;
    /**
     * @var string
     */
    private $motor;
    /**
     * @var bool
     */
    private $webservice;
    /**
     * @var int
     */
    private $tipo_rdcar;
    /**
     * @var bool
     */
    private $online_dispo;
    /**
     * @var string
     */
    private $km;
    /**
     * @var bool
     */
    private $vendaLivre;
    /**
     * @var bool
     */
    private $inativo;

    /**
     * @var AluguelCarrosFacade
     */
    private $aluguelcarros;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->aluguelcarros = $facade;
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
     * @return Grupo
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Categoria
     */
    public function getCategoria()
    {
        if (!is_object($this->categoria) && $this->categoria) {
            $categoria = $this->aluguelcarros->showCategoria($this->categoria);
            $this->categoria = $categoria;
        }
        return $this->categoria;
    }

    /**
     * @param Categoria $categoria
     * @return Grupo
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
        $this->categoria_id = $categoria;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    /**
     * @param int $categoria_id
     * @return Grupo
     */
    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
        return $this;
    }

    /**
     * @return Locadora
     */
    public function getLocadora()
    {
        return $this->locadora;
    }

    /**
     * @param Locadora $locadora
     * @return Grupo
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        return $this;
    }

    /**
     * @return int
     */
    public function getLocadoraId()
    {
        return $this->locadora_id;
    }

    /**
     * @param int $locadora_id
     * @return Grupo
     */
    public function setLocadoraId($locadora_id)
    {
        $this->locadora_id = $locadora_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Grupo
     */
    public function setCountry($country)
    {
        $this->country = $country;
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
     * @return Grupo
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getSipp()
    {
        return $this->sipp;
    }

    /**
     * @param string $sipp
     * @return Grupo
     */
    public function setSipp($sipp)
    {
        $this->sipp = $sipp;
        return $this;
    }

    /**
     * @return int
     */
    public function getOtaTipo()
    {
        return $this->ota_tipo;
    }

    /**
     * @param int $ota_tipo
     * @return Grupo
     */
    public function setOtaTipo($ota_tipo)
    {
        $this->ota_tipo = $ota_tipo;
        return $this;
    }

    /**
     * @return int
     */
    public function getOtaSize()
    {
        return $this->ota_size;
    }

    /**
     * @param int $ota_size
     * @return Grupo
     */
    public function setOtaSize($ota_size)
    {
        $this->ota_size = $ota_size;
        return $this;
    }

    /**
     * @return int
     */
    public function getOtaPortas()
    {
        return $this->ota_portas;
    }

    /**
     * @param int $ota_portas
     * @return Grupo
     */
    public function setOtaPortas($ota_portas)
    {
        $this->ota_portas = $ota_portas;
        return $this;
    }

    /**
     * @return string
     */
    public function getFranquia()
    {
        return $this->franquia;
    }

    /**
     * @param string $franquia
     * @return Grupo
     */
    public function setFranquia($franquia)
    {
        $this->franquia = $franquia;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFranquias()
    {
        return $this->franquias;
    }

    /**
     * @param mixed $franquias
     * @return Grupo
     */
    public function setFranquias($franquias)
    {
        $this->franquias = $franquias;
        return $this;
    }

    /**
     * @return string
     */
    public function getFranquiaTerceiros()
    {
        return $this->franquia_terceiros;
    }

    /**
     * @param string $franquia_terceiros
     * @return Grupo
     */
    public function setFranquiaTerceiros($franquia_terceiros)
    {
        $this->franquia_terceiros = $franquia_terceiros;
        return $this;
    }

    /**
     * @return string
     */
    public function getCaucao()
    {
        return $this->caucao;
    }

    /**
     * @param string $caucao
     * @return Grupo
     */
    public function setCaucao($caucao)
    {
        $this->caucao = $caucao;
        return $this;
    }

    /**
     * @return int
     */
    public function getCaucaoReal()
    {
        return $this->caucao_real;
    }

    /**
     * @param int $caucao_real
     * @return Grupo
     */
    public function setCaucaoReal($caucao_real)
    {
        $this->caucao_real = $caucao_real;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCambioAuto()
    {
        return $this->cambio_auto;
    }

    /**
     * @param bool $cambio_auto
     * @return Grupo
     */
    public function setCambioAuto($cambio_auto)
    {
        $this->cambio_auto = $cambio_auto;
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
     * @return Grupo
     */
    public function setCarros($carros)
    {
        $this->carros = $carros;
        return $this;
    }

    /**
     * @return array
     */
    public function getCarrosOrdem()
    {
        return $this->carros_ordem;
    }

    /**
     * @param array $carros_ordem
     * @return Grupo
     */
    public function setCarrosOrdem($carros_ordem)
    {
        $this->carros_ordem = $carros_ordem;
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
     * @return Grupo
     */
    public function setCarroPrincipal($carro_principal)
    {
        $this->carro_principal = $carro_principal;
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
     * @return Grupo
     */
    public function setListaCarros($lista_carros)
    {
        $this->lista_carros = $lista_carros;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProtecoes()
    {
        return $this->protecoes;
    }

    /**
     * @param mixed $protecoes
     * @return Grupo
     */
    public function setProtecoes($protecoes)
    {
        $this->protecoes = $protecoes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProtecaoPadrao()
    {
        return $this->protecao_padrao;
    }

    /**
     * @param mixed $protecao_padrao
     * @return Grupo
     */
    public function setProtecaoPadrao($protecao_padrao)
    {
        $this->protecao_padrao = $protecao_padrao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTarifas()
    {
        return $this->tarifas;
    }

    /**
     * @param mixed $tarifas
     * @return Grupo
     */
    public function setTarifas($tarifas)
    {
        $this->tarifas = $tarifas;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTarifasLoja()
    {
        return $this->tarifas_loja;
    }

    /**
     * @param mixed $tarifas_loja
     * @return Grupo
     */
    public function setTarifasLoja($tarifas_loja)
    {
        $this->tarifas_loja = $tarifas_loja;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDuasPortas()
    {
        return $this->duas_portas;
    }

    /**
     * @param bool $duas_portas
     * @return Grupo
     */
    public function setDuasPortas($duas_portas)
    {
        $this->duas_portas = $duas_portas;
        return $this;
    }

    /**
     * @return bool
     */
    public function getQuatroPortas()
    {
        return $this->quatro_portas;
    }

    /**
     * @param bool $quatro_portas
     * @return Grupo
     */
    public function setQuatroPortas($quatro_portas)
    {
        $this->quatro_portas = $quatro_portas;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDh()
    {
        return $this->dh;
    }

    /**
     * @param bool $dh
     * @return Grupo
     */
    public function setDh($dh)
    {
        $this->dh = $dh;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAc()
    {
        return $this->ac;
    }

    /**
     * @param bool $ac
     * @return Grupo
     */
    public function setAc($ac)
    {
        $this->ac = $ac;
        return $this;
    }

    /**
     * @return bool
     */
    public function getTe()
    {
        return $this->te;
    }

    /**
     * @param bool $te
     * @return Grupo
     */
    public function setTe($te)
    {
        $this->te = $te;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCd()
    {
        return $this->cd;
    }

    /**
     * @param bool $cd
     * @return Grupo
     */
    public function setCd($cd)
    {
        $this->cd = $cd;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAirbag()
    {
        return $this->airbag;
    }

    /**
     * @param bool $airbag
     * @return Grupo
     */
    public function setAirbag($airbag)
    {
        $this->airbag = $airbag;
        return $this;
    }

    /**
     * @return bool
     */
    public function getFreioAbs()
    {
        return $this->freio_abs;
    }

    /**
     * @param bool $freio_abs
     * @return Grupo
     */
    public function setFreioAbs($freio_abs)
    {
        $this->freio_abs = $freio_abs;
        return $this;
    }

    /**
     * @return bool
     */
    public function getGps()
    {
        return $this->gps;
    }

    /**
     * @param bool $gps
     * @return Grupo
     */
    public function setGps($gps)
    {
        $this->gps = $gps;
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
     * @return Grupo
     */
    public function setMotor($motor)
    {
        $this->motor = $motor;
        return $this;
    }

    /**
     * @return bool
     */
    public function getWebservice()
    {
        return $this->webservice;
    }

    /**
     * @param bool $webservice
     * @return Grupo
     */
    public function setWebservice($webservice)
    {
        $this->webservice = $webservice;
        return $this;
    }

    /**
     * @return int
     */
    public function getTipoRdcar()
    {
        return $this->tipo_rdcar;
    }

    /**
     * @param int $tipo_rdcar
     * @return Grupo
     */
    public function setTipoRdcar($tipo_rdcar)
    {
        $this->tipo_rdcar = $tipo_rdcar;
        return $this;
    }

    /**
     * @return bool
     */
    public function getOnlineDispo()
    {
        return $this->online_dispo;
    }

    /**
     * @param bool $online_dispo
     * @return Grupo
     */
    public function setOnlineDispo($online_dispo)
    {
        $this->online_dispo = $online_dispo;
        return $this;
    }

    /**
     * @return string
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * @param string $km
     * @return Grupo
     */
    public function setKm($km)
    {
        $this->km = $km;
        return $this;
    }

    /**
     * @return bool
     */
    public function getVendaLivre()
    {
        return $this->vendaLivre;
    }

    /**
     * @param bool $vendaLivre
     * @return Grupo
     */
    public function setVendaLivre($vendaLivre)
    {
        $this->vendaLivre = $vendaLivre;
        return $this;
    }

    /**
     * @return bool
     */
    public function getInativo()
    {
        return $this->inativo;
    }

    /**
     * @param bool $inativo
     * @return Grupo
     */
    public function setInativo($inativo)
    {
        $this->inativo = $inativo;
        return $this;
    }


}