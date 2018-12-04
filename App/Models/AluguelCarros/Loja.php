<?php


namespace Carroaluguel\Models\AluguelCarros;

use Carroaluguel\Models\AluguelCarrosFacade;
use Core\DateTimeUnit;

class Loja
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var Locadora
     */
    private $locadora;
    /**
     * @var int
     */
    private $locadora_id;
    /**
     * @var int
     */
    private $min_diarias;
    /**
     * @var bool
     */
    private $loj_venda_livre;
    /**
     * @var int
     */
    private $loj_venda_livre_delay;
    /**
     * @var string
     */
    private $nome;
    /**
     * @var int
     */
    private $aeroPortoId;
    /**
     * @var int
     */
    private $nome_size;
    /**
     * @var bool
     */
    private $aeroporto;
    private $aeroPortoObj; // Aeroporto
    /**
     * @var int
     */
    private $atend_aero;
    private $endereco; //Endereco
    /**
     * @var string
     */
    private $iata;
    /**
     * @var bool
     */
    private $loj_propria;
    private $loja_url; //string
    /**
     * @var string
     */
    private $cidade;
    /**
     * @var int
     */
    private $fornecedor;
    /**
     * @var string
     */
    private $ratequal;
    /**
     * @var int
     */
    private $id_cidade;
    /**
     * @var bool
     */
    private $webservice;
    /**
     * @var string
     */
    private $estado;
    /**
     * @var int
     */
    private $id_estado;
    /**
     * @var string
     */
    private $pais;
    /**
     * @var string
     */
    private $fone;
    /**
     * @var string
     */
    private $fax;
    /**
     * @var string
     */
    private $tollfree;
    /**
     * @var string
     */
    private $plantao;
    /**
     * @var string
     */
    private $admin_celular;
    /**
     * @var string
     */
    private $admin_email;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $email2;
    /**
     * @var string
     */
    private $email3;
    /**
     * @var string
     */
    private $grupos;
    private $grupos_obj; //array Grupo
    private $grupos_txt;
    private $grupos_check;
    /**
     * @var float
     */
    private $valor_extra;
    /**
     * @var bool
     */
    private $ativo;
    /**
     * @var string
     */
    private $obs;
    /**
     * @var string
     */
    private $linkname;
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
     * @var float
     */
    private $lat_geocode;
    /**
     * @var float
     */
    private $long_geocode;
    /**
     * @var bool
     */
    private $show_map_lojas;
    /**
     * @var string
     */
    private $texto_livre;
    /**
     * @var bool
     */
    private $tarifa_exclusiva;
    /**
     * @var string
     */
    private $texto_h1;
    /**
     * @var DateTimeUnit
     */
    private $data_atualizacao;
    /**
     * @var int
     */
    private $operador_atualizacao;
    /**
     * @var int
     */
    private $usuario_id;
    /**
     * @var string
     */
    private $nome_operador_atualizacao;
    /**
     * @var bool
     */
    private $regional;
    /**
     * @var string
     */
    private $parcelaminima;
    /**
     * @var string
     */
    private $parcelas;
    /**
     * @var bool
     */
    private $cartao_visa;
    /**
     * @var bool
     */
    private $cartao_master;
    /**
     * @var bool
     */
    private $cartao_american;
    /**
     * @var bool
     */
    private $cartao_hipercard;
    /**
     * @var bool
     */
    private $cartao_dinners;
    /**
     * @var bool
     */
    private $cartao_elo;
    /**
     * @var bool
     */
    private $loj_noupdate;
    /**
     * @var HorarioLoja[]
     */
    private $horarios_atendimento;
    /**
     * @var HorarioLoja[]
     */
    private $horarios_atendimento_full;
    /**
     * @var HorarioAtendimento[]
     */
    private $horarios_solicitacao; //array
    private $tarifas; //array TarifaLoja
    private $has_tarifas; //boolean
    private $taxa_extra; //array
    private $taxa_outraloja; //array
    private $avaliacao; //array
    private $contato_admin; //array ContatoLojaAdmin
    private $feriados; //array FeriadoLoja
    private $delivery; //array Delivery
    private $cartoes_credito;
    private $cartoes_credito_arr;
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
     * @return Loja
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Locadora
     */
    public function getLocadora()
    {
        if (!is_object($this->locadora) && $this->locadora) {
            $locadora = $this->aluguelcarros->showLocadora($this->locadora);
            $this->locadora = $locadora;
        }
        return $this->locadora;
    }

    /**
     * @param int $locadora
     * @return Loja
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        $this->setLocadoraId($locadora);
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
     * @return Loja
     */
    public function setLocadoraId($locadora_id)
    {
        $this->locadora_id = $locadora_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinDiarias()
    {
        return $this->min_diarias;
    }

    /**
     * @param int $min_diarias
     * @return Loja
     */
    public function setMinDiarias($min_diarias)
    {
        $this->min_diarias = $min_diarias;
        return $this;
    }

    /**
     * @param string $datahora_retirada
     * @return bool
     */
    public function getLojVendaLivre($datahora_retirada = null)
    {
        $valida_venda_livre = false;
        $data_agora = new DateTimeUnit();
        if ($this->isOpen($data_agora)) {
            $horas_proximo_atendimento = $this->isOpen($data_agora);
            if ($this->getLocadora()->getVendaLivre()) {
                if ($datahora_retirada) {
                    $delay_locadora = $this->getLocadora()->getXmlDelay();
                    $data1 = new \DateTime($datahora_retirada);
                    $data2 = new \DateTime($data_agora->getDataHoraSql());
                    $intervalo = $data1->diff($data2);
                    $horas_dias = $intervalo->days * 24;
                    $segundos = $intervalo->s / 60;
                    $minutos = ($horas_dias + $intervalo->h - $delay_locadora) * 60;
                    if ($this->isOpen($data_agora) > 0) {
                        $delay = $minutos + $segundos + $intervalo->i - ($horas_proximo_atendimento);
                    } else {
                        $delay = $minutos + $segundos + $intervalo->i - 30;
                    }
                    if ($delay > 0) {
                        $valida_venda_livre = true;
                    } else {
                        $valida_venda_livre = false;
                    }
                }
            }
        }
        return $valida_venda_livre;
    }

    /**
     * @param bool $loj_venda_livre
     * @return Loja
     */
    public function setLojVendaLivre($loj_venda_livre)
    {
        $this->loj_venda_livre = $loj_venda_livre;
        return $this;
    }

    /**
     * @return int
     */
    public function getLojVendaLivreDelay()
    {
        return $this->loj_venda_livre_delay;
    }

    /**
     * @param int $loj_venda_livre_delay
     * @return Loja
     */
    public function setLojVendaLivreDelay($loj_venda_livre_delay)
    {
        $this->loj_venda_livre_delay = $loj_venda_livre_delay;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return Loja
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAeroPortoId()
    {
        return $this->aeroPortoId;
    }

    /**
     * @param mixed $aeroPortoId
     * @return Loja
     */
    public function setAeroPortoId($aeroPortoId)
    {
        $this->aeroPortoId = $aeroPortoId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomeSize()
    {
        return $this->nome_size;
    }

    /**
     * @param mixed $nome_size
     * @return Loja
     */
    public function setNomeSize($nome_size)
    {
        $this->nome_size = $nome_size;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAeroporto()
    {
        return $this->aeroporto;
    }

    /**
     * @param bool $aeroporto
     * @return Loja
     */
    public function setAeroporto($aeroporto)
    {
        $this->aeroporto = $aeroporto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAeroPortoObj()
    {
        return $this->aeroPortoObj;
    }

    /**
     * @param mixed $aeroPortoObj
     * @return Loja
     */
    public function setAeroPortoObj($aeroPortoObj)
    {
        $this->aeroPortoObj = $aeroPortoObj;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAtendAero()
    {
        return $this->atend_aero;
    }

    /**
     * @param mixed $atend_aero
     * @return Loja
     */
    public function setAtendAero($atend_aero)
    {
        $this->atend_aero = $atend_aero;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     * @return Loja
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIata()
    {
        return $this->iata;
    }

    /**
     * @param mixed $iata
     * @return Loja
     */
    public function setIata($iata)
    {
        $this->iata = $iata;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLojPropria()
    {
        return $this->loj_propria;
    }

    /**
     * @param mixed $loj_propria
     * @return Loja
     */
    public function setLojPropria($loj_propria)
    {
        $this->loj_propria = $loj_propria;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLojaUrl()
    {
        return $this->loja_url;
    }

    /**
     * @param mixed $loja_url
     * @return Loja
     */
    public function setLojaUrl($loja_url)
    {
        $this->loja_url = $loja_url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     * @return Loja
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    /**
     * @param mixed $fornecedor
     * @return Loja
     */
    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRatequal()
    {
        return $this->ratequal;
    }

    /**
     * @param mixed $ratequal
     * @return Loja
     */
    public function setRatequal($ratequal)
    {
        $this->ratequal = $ratequal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdCidade()
    {
        return $this->id_cidade;
    }

    /**
     * @param mixed $id_cidade
     * @return Loja
     */
    public function setIdCidade($id_cidade)
    {
        $this->id_cidade = $id_cidade;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWebservice()
    {
        return $this->webservice;
    }

    /**
     * @param mixed $webservice
     * @return Loja
     */
    public function setWebservice($webservice)
    {
        $this->webservice = $webservice;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     * @return Loja
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdEstado()
    {
        return $this->id_estado;
    }

    /**
     * @param mixed $id_estado
     * @return Loja
     */
    public function setIdEstado($id_estado)
    {
        $this->id_estado = $id_estado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @param mixed $pais
     * @return Loja
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFone()
    {
        return $this->fone;
    }

    /**
     * @param mixed $fone
     * @return Loja
     */
    public function setFone($fone)
    {
        $this->fone = $fone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $fax
     * @return Loja
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTollfree()
    {
        return $this->tollfree;
    }

    /**
     * @param mixed $tollfree
     * @return Loja
     */
    public function setTollfree($tollfree)
    {
        $this->tollfree = $tollfree;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlantao()
    {
        return $this->plantao;
    }

    /**
     * @param mixed $plantao
     * @return Loja
     */
    public function setPlantao($plantao)
    {
        $this->plantao = $plantao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdminCelular()
    {
        return $this->admin_celular;
    }

    /**
     * @param mixed $admin_celular
     * @return Loja
     */
    public function setAdminCelular($admin_celular)
    {
        $this->admin_celular = $admin_celular;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdminEmail()
    {
        return $this->admin_email;
    }

    /**
     * @param mixed $admin_email
     * @return Loja
     */
    public function setAdminEmail($admin_email)
    {
        $this->admin_email = $admin_email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Loja
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail2()
    {
        return $this->email2;
    }

    /**
     * @param mixed $email2
     * @return Loja
     */
    public function setEmail2($email2)
    {
        $this->email2 = $email2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail3()
    {
        return $this->email3;
    }

    /**
     * @param mixed $email3
     * @return Loja
     */
    public function setEmail3($email3)
    {
        $this->email3 = $email3;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrupos()
    {
        return $this->grupos;
    }

    /**
     * @param mixed $grupos
     * @return Loja
     */
    public function setGrupos($grupos)
    {
        $this->grupos = $grupos;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGruposObj()
    {
        return $this->grupos_obj;
    }

    /**
     * @param mixed $grupos_obj
     * @return Loja
     */
    public function setGruposObj($grupos_obj)
    {
        $this->grupos_obj = $grupos_obj;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGruposTxt()
    {
        return $this->grupos_txt;
    }

    /**
     * @param mixed $grupos_txt
     * @return Loja
     */
    public function setGruposTxt($grupos_txt)
    {
        $this->grupos_txt = $grupos_txt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGruposCheck()
    {
        return $this->grupos_check;
    }

    /**
     * @param mixed $grupos_check
     * @return Loja
     */
    public function setGruposCheck($grupos_check)
    {
        $this->grupos_check = $grupos_check;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValorExtra()
    {
        return $this->valor_extra;
    }

    /**
     * @param mixed $valor_extra
     * @return Loja
     */
    public function setValorExtra($valor_extra)
    {
        $this->valor_extra = $valor_extra;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param mixed $ativo
     * @return Loja
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * @param mixed $obs
     * @return Loja
     */
    public function setObs($obs)
    {
        $this->obs = $obs;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLinkname()
    {
        return $this->linkname;
    }

    /**
     * @param mixed $linkname
     * @return Loja
     */
    public function setLinkname($linkname)
    {
        $this->linkname = $linkname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * @param mixed $meta_title
     * @return Loja
     */
    public function setMetaTitle($meta_title)
    {
        $this->meta_title = $meta_title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * @param mixed $meta_description
     * @return Loja
     */
    public function setMetaDescription($meta_description)
    {
        $this->meta_description = $meta_description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    /**
     * @param mixed $meta_keywords
     * @return Loja
     */
    public function setMetaKeywords($meta_keywords)
    {
        $this->meta_keywords = $meta_keywords;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLatGeocode()
    {
        return $this->lat_geocode;
    }

    /**
     * @param mixed $lat_geocode
     * @return Loja
     */
    public function setLatGeocode($lat_geocode)
    {
        $this->lat_geocode = $lat_geocode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLongGeocode()
    {
        return $this->long_geocode;
    }

    /**
     * @param mixed $long_geocode
     * @return Loja
     */
    public function setLongGeocode($long_geocode)
    {
        $this->long_geocode = $long_geocode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getShowMapLojas()
    {
        return $this->show_map_lojas;
    }

    /**
     * @param mixed $show_map_lojas
     * @return Loja
     */
    public function setShowMapLojas($show_map_lojas)
    {
        $this->show_map_lojas = $show_map_lojas;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTextoLivre()
    {
        return $this->texto_livre;
    }

    /**
     * @param mixed $texto_livre
     * @return Loja
     */
    public function setTextoLivre($texto_livre)
    {
        $this->texto_livre = $texto_livre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTarifaExclusiva()
    {
        return $this->tarifa_exclusiva;
    }

    /**
     * @param mixed $tarifa_exclusiva
     * @return Loja
     */
    public function setTarifaExclusiva($tarifa_exclusiva)
    {
        $this->tarifa_exclusiva = $tarifa_exclusiva;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTextoH1()
    {
        return $this->texto_h1;
    }

    /**
     * @param mixed $texto_h1
     * @return Loja
     */
    public function setTextoH1($texto_h1)
    {
        $this->texto_h1 = $texto_h1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataAtualizacao()
    {
        return $this->data_atualizacao;
    }

    /**
     * @param mixed $data_atualizacao
     * @return Loja
     */
    public function setDataAtualizacao($data_atualizacao)
    {
        $this->data_atualizacao = $data_atualizacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperadorAtualizacao()
    {
        return $this->operador_atualizacao;
    }

    /**
     * @param mixed $operador_atualizacao
     * @return Loja
     */
    public function setOperadorAtualizacao($operador_atualizacao)
    {
        $this->operador_atualizacao = $operador_atualizacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     * @return Loja
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomeOperadorAtualizacao()
    {
        return $this->nome_operador_atualizacao;
    }

    /**
     * @param mixed $nome_operador_atualizacao
     * @return Loja
     */
    public function setNomeOperadorAtualizacao($nome_operador_atualizacao)
    {
        $this->nome_operador_atualizacao = $nome_operador_atualizacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegional()
    {
        return $this->regional;
    }

    /**
     * @param mixed $regional
     * @return Loja
     */
    public function setRegional($regional)
    {
        $this->regional = $regional;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParcelaminima()
    {
        return $this->parcelaminima;
    }

    /**
     * @param mixed $parcelaminima
     * @return Loja
     */
    public function setParcelaminima($parcelaminima)
    {
        $this->parcelaminima = $parcelaminima;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParcelas()
    {
        return $this->parcelas;
    }

    /**
     * @param mixed $parcelas
     * @return Loja
     */
    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartaoVisa()
    {
        return $this->cartao_visa;
    }

    /**
     * @param mixed $cartao_visa
     * @return Loja
     */
    public function setCartaoVisa($cartao_visa)
    {
        $this->cartao_visa = $cartao_visa;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartaoMaster()
    {
        return $this->cartao_master;
    }

    /**
     * @param mixed $cartao_master
     * @return Loja
     */
    public function setCartaoMaster($cartao_master)
    {
        $this->cartao_master = $cartao_master;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartaoAmerican()
    {
        return $this->cartao_american;
    }

    /**
     * @param mixed $cartao_american
     * @return Loja
     */
    public function setCartaoAmerican($cartao_american)
    {
        $this->cartao_american = $cartao_american;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartaoHipercard()
    {
        return $this->cartao_hipercard;
    }

    /**
     * @param mixed $cartao_hipercard
     * @return Loja
     */
    public function setCartaoHipercard($cartao_hipercard)
    {
        $this->cartao_hipercard = $cartao_hipercard;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartaoDinners()
    {
        return $this->cartao_dinners;
    }

    /**
     * @param mixed $cartao_dinners
     * @return Loja
     */
    public function setCartaoDinners($cartao_dinners)
    {
        $this->cartao_dinners = $cartao_dinners;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartaoElo()
    {
        return $this->cartao_elo;
    }

    /**
     * @param mixed $cartao_elo
     * @return Loja
     */
    public function setCartaoElo($cartao_elo)
    {
        $this->cartao_elo = $cartao_elo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLojNoupdate()
    {
        return $this->loj_noupdate;
    }

    /**
     * @param mixed $loj_noupdate
     * @return Loja
     */
    public function setLojNoupdate($loj_noupdate)
    {
        $this->loj_noupdate = $loj_noupdate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHorariosAtendimento()
    {
        return $this->horarios_atendimento;
    }

    /**
     * @param mixed $horarios_atendimento
     * @return Loja
     */
    public function setHorariosAtendimento($horarios_atendimento)
    {
        $this->horarios_atendimento = $horarios_atendimento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHorariosAtendimentoFull()
    {
        if(!is_array($this->horarios_atendimento_full)){
            $this->horarios_atendimento_full = $this->aluguelcarros->listHorariosLoja(array(
                'loja'          => $this->getId(),
                'sortBy'        => 'lojhora_inicio',
                'sortDirection' => 'ASC'
            ));
        }
        return $this->horarios_atendimento_full;
    }

    /**
     * @param mixed $horarios_atendimento_full
     * @return Loja
     */
    public function setHorariosAtendimentoFull($horarios_atendimento_full)
    {
        $this->horarios_atendimento_full = $horarios_atendimento_full;
        return $this;
    }

    /**
     * @return HorarioAtendimento[]
     */
    public function getHorariosSolicitacao()
    {
        if (!is_array($this->horarios_solicitacao)) {
            $horarios_solicitacao_arr = array(
                'locadora' => $this->getLocadora(),
                'sortBy' => 'atendhora_inicio',
                'sortDirection' => 'ASC'
            );
            $horarios_solicitacao = $this->aluguelcarros->listHorariosAtendimento($horarios_solicitacao_arr);
            foreach ($horarios_solicitacao as $hora_sol) {
                if (is_array($hora_sol->getLoja())) {
                    if (in_array($this->getId(), $hora_sol->getLoja())) {
                        $this->horarios_solicitacao[] = $hora_sol;
                    }
                } else {
                    $this->horarios_solicitacao[] = $hora_sol;
                }
            }
        }
        return $this->horarios_solicitacao;
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
     * @return Loja
     */
    public function setTarifas($tarifas)
    {
        $this->tarifas = $tarifas;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHasTarifas()
    {
        return $this->has_tarifas;
    }

    /**
     * @param mixed $has_tarifas
     * @return Loja
     */
    public function setHasTarifas($has_tarifas)
    {
        $this->has_tarifas = $has_tarifas;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTaxaExtra()
    {
        return $this->taxa_extra;
    }

    /**
     * @param mixed $taxa_extra
     * @return Loja
     */
    public function setTaxaExtra($taxa_extra)
    {
        $this->taxa_extra = $taxa_extra;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTaxaOutraloja()
    {
        return $this->taxa_outraloja;
    }

    /**
     * @param mixed $taxa_outraloja
     * @return Loja
     */
    public function setTaxaOutraloja($taxa_outraloja)
    {
        $this->taxa_outraloja = $taxa_outraloja;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvaliacao()
    {
        return $this->avaliacao;
    }

    /**
     * @param mixed $avaliacao
     * @return Loja
     */
    public function setAvaliacao($avaliacao)
    {
        $this->avaliacao = $avaliacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContatoAdmin()
    {
        return $this->contato_admin;
    }

    /**
     * @param mixed $contato_admin
     * @return Loja
     */
    public function setContatoAdmin($contato_admin)
    {
        $this->contato_admin = $contato_admin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFeriados()
    {
        return $this->feriados;
    }

    /**
     * @param mixed $feriados
     * @return Loja
     */
    public function setFeriados($feriados)
    {
        $this->feriados = $feriados;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param mixed $delivery
     * @return Loja
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartoesCredito()
    {
        return $this->cartoes_credito;
    }

    /**
     * @param mixed $cartoes_credito
     * @return Loja
     */
    public function setCartoesCredito($cartoes_credito)
    {
        $this->cartoes_credito = $cartoes_credito;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCartoesCreditoArr()
    {
        return $this->cartoes_credito_arr;
    }

    /**
     * @param mixed $cartoes_credito_arr
     * @return Loja
     */
    public function setCartoesCreditoArr($cartoes_credito_arr)
    {
        $this->cartoes_credito_arr = $cartoes_credito_arr;
        return $this;
    }

    /**
     * @param DateTimeUnit $data
     * @return float
     */
    public function isOpen($data)
    {
        $data_agora = new \DateTime($data->getDataHoraSql());
        $hora_atendimento = null;
        $atendimento = $this->getHorariosSolicitacao();
        if ($atendimento) {
            $horarios_solicitacao_arr[strtolower($data->getAbrSemana())] = true;
            $delay_atendimento = null;
            foreach ($atendimento as $horarios) {
                $dia_semana = 'get' . $data->getAbrSemana();
                $hora_ini = new \DateTime($data->getDataSql() . ' ' . $horarios->getHoraIni());
                $hora_fim = new \DateTime($data->getDataSql() . ' ' . $horarios->getHoraFim());
                $data1 = new DateTimeUnit($data->getDataSql() . ' ' . $horarios->getHoraIni());
                $intervalo = $data_agora->diff($hora_fim);
                $horas_dias = $intervalo->days * 24;
                $segundos = $intervalo->s / 60;
                $minutos = ($horas_dias + $intervalo->h) * 60;
                $delay = $minutos + $segundos + $intervalo->i - 30;
                if ($delay >= 0) {
                    if ($horarios->$dia_semana() && ($data_agora->getTimestamp() >= $hora_ini->getTimestamp()) && ($data_agora->getTimestamp() <= $hora_fim->getTimestamp())) {
                        $horarios->setDataBase($data1);
                        $hora_atendimento[$horarios->getHoraIni()] = $horarios;
                    } else {
                        if ($horarios->$dia_semana() && ($data_agora->getTimestamp() <= $hora_fim->getTimestamp())) {
                            $horarios->setDataBase($data1);
                            $hora_atendimento[$horarios->getHoraIni()] = $horarios;
                        }
                    }
                }

            }
            $data_atend = new DateTimeUnit($data->getDataHoraSql());
            $hr = 0;

            while ($hr <= 7) {
                if (!is_array($hora_atendimento)) {
                    $data_atend->addDay(1);
                    foreach ($atendimento as $horarios) {
                        $dia_semana = 'get' . $data_atend->getAbrSemana();
                        $hora_fim = new \DateTime($data_atend->getDataSql() . ' ' . $horarios->getHoraFim());
                        $data1 = new DateTimeUnit($data_atend->getDataSql() . ' ' . $horarios->getHoraIni(), 1);
                        $intervalo = $data_agora->diff($hora_fim);
                        $horas_dias = $intervalo->days * 24;
                        $segundos = $intervalo->s / 60;
                        $minutos = ($horas_dias + $intervalo->h) * 60;
                        $delay = $minutos + $segundos + $intervalo->i - 30;
                        if ($delay >= 0) {
                            if ($horarios->$dia_semana()) {
                                $horarios->setDataBase($data1);
                                $hora_atendimento[$horarios->getHoraIni()] = $horarios;
                            }
                        }
                    }
                }
                $hr++;
            }
        }
        $delay = null;
        $data_final = null;
        if (is_array($hora_atendimento)) {
            $data_final = new \DateTime(reset($hora_atendimento)->getDataBase()->getDataHoraSql());
            $intervalo = $data_agora->diff($data_final);
            $horas_dias = $intervalo->days * 24;
            $segundos = $intervalo->s / 60;
            $minutos = ($horas_dias + $intervalo->h) * 60;
            $delay = $minutos + $segundos + $intervalo->i - 30;
        }
        if ($delay >= 0 && $data_agora < $data_final) {
            $returnMinutos = $delay;
        } else {
            $returnMinutos = -$delay;
        }
        return round($returnMinutos);
    }

}