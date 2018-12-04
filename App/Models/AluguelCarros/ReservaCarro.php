<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Carroaluguel\Models\Utilizador\Cliente;
use Carroaluguel\Models\Utilizador\Condutor;
use Carroaluguel\Models\Utilizador\Emissor;
use Carroaluguel\Models\UtilizadorFacade;
use Core\DateTimeUnit;
use Core\Period;

class ReservaCarro
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
     * @var Loja
     */
    private $loja_retirar;
    /**
     * @var int
     */
    private $loja_retirar_id;
    /**
     * @var Loja
     */
    private $loja_devolver;
    /**
     * @var int
     */
    private $loja_devolver_id;
    /**
     * @var Grupo
     */
    private $grupo;
    /**
     * @var int
     */
    private $grupo_id;
    /**
     * @var Protecao
     */
    private $protecao;
    /**
     * @var int
     */
    private $protecao_id;
    /**
     * @var Emissor
     */
    private $emissor;
    /**
     * @var int
     */
    private $operador;
    /**
     * @var Cliente
     */
    private $cliente;
    /**
     * @var bool
     */
    private $ispj;
    /**
     * @var int
     */
    private $cliente_id;
    /**
     * @var Condutor
     */
    private $condutor;
    /**
     * @var int
     */
    private $condutor_id;
    /**
     * @var Condutor
     */
    private $condutor_adicional;
    /**
     * @var int
     */
    private $condutor_adicional_id;
    /**
     * @var Period
     */
    private $periodo;
    /**
     * @var int
     */
    private $diarias;
    /**
     * @var bool
     */
    private $diaria_extra;
    /**
     * @var float
     */
    private $valor_diarias;
    /**
     * @var float
     */
    private $valor_taxas;
    /**
     * @var float
     */
    private $valor_protecao;
    /**
     * @var array
     */
    private $taxas_extra_lojas;
    /**
     * @var array
     */
    private $opcionais;
    /**
     * @var float
     */
    private $valor_hora_extra;
    /**
     * @var float
     */
    private $valor_hora_extra_protecao;
    /**
     * @var float
     */
    private $valor_hora_extra_opcionais;
    /**
     * @var float
     */
    private $valor_total;
    /**
     * @var float
     */
    private $valor_devolucao;
    /**
     * @var int
     */
    private $pagamento;
    /**
     * @var DateTimeUnit
     */
    private $dataCadastro;
    /**
     * @var DateTimeUnit
     */
    private $dataAtualizacao;
    /**
     * @var string
     */
    private $cod_confirmacao;
    /**
     * @var string
     */
    private $nome_confirmacao;
    /**
     * @var string
     */
    private $cia_aerea;
    /**
     * @var int
     */
    private $num_voo;
    /**
     * @var int
     */
    private $status;
    /**
     * @var bool
     */
    private $ativaOpcao;
    /**
     * @var
     */
    private $limiteOpcao;
    /**
     * @var string
     */
    private $statusnome;
    /**
     * @var bool
     */
    private $online;
    /**
     * @var int
     */
    private $agencia;
    /**
     * @var string
     */
    private $observacoes;
    /**
     * @var int
     */
    private $stur;
    /**
     * @var ReservaCarroPesquisa
     */
    private $pesquisa;
    /**
     * @var int
     */
    private $pesquisa_id;

    /**
     * @var
     */
    private $avaliacao;

    /**
     * @var int
     */
    private $site;

    /**
     * @var int
     */
    private $old_id;

    /**
     * @var string
     */
    private $mdCode;

    /**
     * @var array
     */
    private $reservas_similares;

    /**
     * @var string
     */
    private $reservas_similares_str;

    /**
     * @var bool
     */
    private $reservas_similares_visto;

    /**
     * @var bool
     */
    private $venda_livre;

    /**
     * @var int
     */
    private $codAfiliado;

    /**
     * @var int
     */
    private $modAfiliado;

    /**
     * @var
     */
    private $objAfiliado;

    /**
     * @var array
     */
    private $obs_operadores;

    /**
     * @var array
     */
    private $obs_locadoras;

    /**
     * @var array
     */
    private $log_reservacarro;

    /**
     * @var bool
     */
    private $solicita_cancelamento;

    /**
     * @var array
     */
    private $altera_reserva;

    /**
     * @var
     */
    private $delivery;
    /**
     * @var integer
     */
    private $deliveryid;
    /**
     * @var float
     */
    private $valor_delivery;
    /**
     * @var
     */
    private $delivery_devo;
    /**
     * @var int
     */
    private $deliverydevoid;
    /**
     * @var float
     */
    private $valor_delivery_devo;
    /**
     * @var string
     */
    private $nome_delivery;
    /**
     * @var string
     */
    private $confirmacao_xml;
    /**
     * @var
     */
    private $venda;

    /**
     * @var AluguelCarrosFacade
     */
    private $aluguelcarros;

    /**
     * @var UtilizadorFacade
     */
    private $utilizador;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->aluguelcarros = $facade;
            $this->utilizador = new UtilizadorFacade($this->aluguelcarros->getEntityManager());
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
     * @return ReservaCarro
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
     * @param mixed $locadora
     * @return ReservaCarro
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
     * @return ReservaCarro
     */
    public function setLocadoraId($locadora_id)
    {
        $this->locadora_id = $locadora_id;
        return $this;
    }

    /**
     * @return Loja
     */
    public function getLojaRetirar()
    {
        if (!is_object($this->loja_retirar) && $this->loja_retirar) {
            $loja = $this->aluguelcarros->showLoja($this->loja_retirar);
            $this->loja_retirar = $loja;
        }
        return $this->loja_retirar;
    }

    /**
     * @param mixed $loja_retirar
     * @return ReservaCarro
     */
    public function setLojaRetirar($loja_retirar)
    {
        $this->loja_retirar = $loja_retirar;
        $this->setLojaRetirarId($loja_retirar);
        return $this;
    }

    /**
     * @return int
     */
    public function getLojaRetirarId()
    {
        return $this->loja_retirar_id;
    }

    /**
     * @param int $loja_retirar_id
     * @return ReservaCarro
     */
    public function setLojaRetirarId($loja_retirar_id)
    {
        $this->loja_retirar_id = $loja_retirar_id;
        return $this;
    }

    /**
     * @return Loja
     */
    public function getLojaDevolver()
    {
        if (!is_object($this->loja_devolver) && $this->loja_devolver) {
            $loja = $this->aluguelcarros->showLoja($this->loja_devolver);
            $this->loja_devolver = $loja;
        }
        return $this->loja_devolver;
    }

    /**
     * @param mixed $loja_devolver
     * @return ReservaCarro
     */
    public function setLojaDevolver($loja_devolver)
    {
        $this->loja_devolver = $loja_devolver;
        $this->setLojaDevolverId($loja_devolver);
        return $this;
    }

    /**
     * @return int
     */
    public function getLojaDevolverId()
    {
        return $this->loja_devolver_id;
    }

    /**
     * @param int $loja_devolver_id
     * @return ReservaCarro
     */
    public function setLojaDevolverId($loja_devolver_id)
    {
        $this->loja_devolver_id = $loja_devolver_id;
        return $this;
    }

    /**
     * @return Grupo
     */
    public function getGrupo()
    {
        if (!is_object($this->grupo) && $this->grupo) {
            $grupo = $this->aluguelcarros->showGrupo($this->grupo);
            $this->grupo = $grupo;
        }
        return $this->grupo;
    }

    /**
     * @param mixed $grupo
     * @return ReservaCarro
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
        $this->setGrupoId($grupo);
        return $this;
    }

    /**
     * @return int
     */
    public function getGrupoId()
    {
        return $this->grupo_id;
    }

    /**
     * @param int $grupo_id
     * @return ReservaCarro
     */
    public function setGrupoId($grupo_id)
    {
        $this->grupo_id = $grupo_id;
        return $this;
    }

    /**
     * @return Protecao
     */
    public function getProtecao()
    {
        if (!is_object($this->protecao) && $this->protecao) {
            $protecao = $this->aluguelcarros->showProtecao($this->protecao);
            $this->protecao = $protecao;
        }
        return $this->protecao;
    }

    /**
     * @param mixed $protecao
     * @return ReservaCarro
     */
    public function setProtecao($protecao)
    {
        $this->protecao = $protecao;
        $this->setProtecaoId($protecao);
        return $this;
    }

    /**
     * @return int
     */
    public function getProtecaoId()
    {
        return $this->protecao_id;
    }

    /**
     * @param int $protecao_id
     * @return ReservaCarro
     */
    public function setProtecaoId($protecao_id)
    {
        $this->protecao_id = $protecao_id;
        return $this;
    }

    /**
     * @return Emissor
     */
    public function getEmissor()
    {
        if(!is_object($this->emissor) && $this->emissor){
            $emissor = $this->utilizador->showEmissor($this->emissor);
            $this->emissor = $emissor;
        }
        return $this->emissor;
    }

    /**
     * @param int $emissor
     * @return ReservaCarro
     */
    public function setEmissor($emissor)
    {
        $this->emissor = $emissor;
        return $this;
    }

    /**
     * @return int
     */
    public function getOperador()
    {
        return $this->operador;
    }

    /**
     * @param int $operador
     * @return ReservaCarro
     */
    public function setOperador($operador)
    {
        $this->operador = $operador;
        return $this;
    }

    /**
     * @return Cliente
     */
    public function getCliente()
    {
        if(!is_object($this->cliente) && $this->cliente){
            $cliente =$this->utilizador->showCliente($this->cliente);
            $this->cliente = $cliente;
        }
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     * @return ReservaCarro
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
        $this->setClienteId($cliente);
        return $this;
    }

    /**
     * @return bool
     */
    public function getIspj()
    {
        return $this->ispj;
    }

    /**
     * @param bool $ispj
     * @return ReservaCarro
     */
    public function setIspj($ispj)
    {
        $this->ispj = $ispj;
        return $this;
    }

    /**
     * @return int
     */
    public function getClienteId()
    {
        return $this->cliente_id;
    }

    /**
     * @param int $cliente_id
     * @return ReservaCarro
     */
    public function setClienteId($cliente_id)
    {
        $this->cliente_id = $cliente_id;
        return $this;
    }

    /**
     * @return Condutor
     */
    public function getCondutor()
    {
        if(!is_object($this->condutor) && $this->condutor){
            $condutor =$this->utilizador->showCondutor($this->condutor);
            $this->condutor = $condutor;
        }
        return $this->condutor;
    }

    /**
     * @param mixed $condutor
     * @return ReservaCarro
     */
    public function setCondutor($condutor)
    {
        $this->condutor = $condutor;
        $this->setCondutorId($condutor);
        return $this;
    }

    /**
     * @return int
     */
    public function getCondutorId()
    {
        return $this->condutor_id;
    }

    /**
     * @param int $condutor_id
     * @return ReservaCarro
     */
    public function setCondutorId($condutor_id)
    {
        $this->condutor_id = $condutor_id;
        return $this;
    }

    /**
     * @return Condutor
     */
    public function getCondutorAdicional()
    {
        if(!is_object($this->condutor_adicional) && $this->condutor_adicional){
            $condutor =$this->utilizador->showCondutor($this->condutor);
            $this->condutor_adicional = $condutor;
        }
        return $this->condutor_adicional;
    }

    /**
     * @param mixed $condutor_adicional
     * @return ReservaCarro
     */
    public function setCondutorAdicional($condutor_adicional)
    {
        $this->condutor_adicional = $condutor_adicional;
        $this->setCondutorAdicionalId($condutor_adicional);
        return $this;
    }

    /**
     * @return int
     */
    public function getCondutorAdicionalId()
    {
        return $this->condutor_adicional_id;
    }

    /**
     * @param int $condutor_adicional_id
     * @return ReservaCarro
     */
    public function setCondutorAdicionalId($condutor_adicional_id)
    {
        $this->condutor_adicional_id = $condutor_adicional_id;
        return $this;
    }

    /**
     * @return Period
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param Period $periodo
     * @return ReservaCarro
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
        return $this;
    }

    /**
     * @return int
     */
    public function getDiarias()
    {
        return $this->diarias;
    }

    /**
     * @param int $diarias
     * @return ReservaCarro
     */
    public function setDiarias($diarias)
    {
        $this->diarias = $diarias;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDiariaExtra()
    {
        return $this->diaria_extra;
    }

    /**
     * @param bool $diaria_extra
     * @return ReservaCarro
     */
    public function setDiariaExtra($diaria_extra)
    {
        $this->diaria_extra = $diaria_extra;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorDiarias()
    {
        return $this->valor_diarias;
    }

    /**
     * @param float $valor_diarias
     * @return ReservaCarro
     */
    public function setValorDiarias($valor_diarias)
    {
        $this->valor_diarias = $valor_diarias;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorTaxas()
    {
        return $this->valor_taxas;
    }

    /**
     * @param float $valor_taxas
     * @return ReservaCarro
     */
    public function setValorTaxas($valor_taxas)
    {
        $this->valor_taxas = $valor_taxas;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorProtecao()
    {
        return $this->valor_protecao;
    }

    /**
     * @param float $valor_protecao
     * @return ReservaCarro
     */
    public function setValorProtecao($valor_protecao)
    {
        $this->valor_protecao = $valor_protecao;
        return $this;
    }

    /**
     * @return TaxaExtraLoja[]
     */
    public function getTaxasExtraLojas()
    {
        $taxas_extra_lojas = NULL;
        if(is_array($this->taxas_extra_lojas)){
            $taxas_extra_lojas = $this->aluguelcarros->listTaxasExtrasLoja(array('inId' => $this->taxas_extra_lojas));
        }
        return $taxas_extra_lojas;
    }

    /**
     * @param string $taxas_extra_lojas
     * @return ReservaCarro
     */
    public function setTaxasExtraLojas($taxas_extra_lojas)
    {
        if ($taxas_extra_lojas) {
            $taxas_array = $taxas_extra_lojas;
            $tx = explode('-', $taxas_array);
            foreach ($tx as $txs) {
                if ($txs != '') {
                    $taxc = explode(':', $txs);
                    $taxas_extra_lojas[] = $taxc[0];
                }
            }
        }
        $this->taxas_extra_lojas = $taxas_extra_lojas;
        return $this;
    }

    /**
     * @return array
     */
    public function getOpcionais()
    {
        return $this->opcionais;
    }

    /**
     * @param array $opcionais
     * @return ReservaCarro
     */
    public function setOpcionais($opcionais)
    {
        $this->opcionais = $opcionais;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorHoraExtra()
    {
        return $this->valor_hora_extra;
    }

    /**
     * @param float $valor_hora_extra
     * @return ReservaCarro
     */
    public function setValorHoraExtra($valor_hora_extra)
    {
        $this->valor_hora_extra = $valor_hora_extra;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorHoraExtraProtecao()
    {
        return $this->valor_hora_extra_protecao;
    }

    /**
     * @param float $valor_hora_extra_protecao
     * @return ReservaCarro
     */
    public function setValorHoraExtraProtecao($valor_hora_extra_protecao)
    {
        $this->valor_hora_extra_protecao = $valor_hora_extra_protecao;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorHoraExtraOpcionais()
    {
        return $this->valor_hora_extra_opcionais;
    }

    /**
     * @param float $valor_hora_extra_opcionais
     * @return ReservaCarro
     */
    public function setValorHoraExtraOpcionais($valor_hora_extra_opcionais)
    {
        $this->valor_hora_extra_opcionais = $valor_hora_extra_opcionais;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorTotal()
    {
        return $this->valor_total;
    }

    /**
     * @param float $valor_total
     * @return ReservaCarro
     */
    public function setValorTotal($valor_total)
    {
        $this->valor_total = $valor_total;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorDevolucao()
    {
        return $this->valor_devolucao;
    }

    /**
     * @param float $valor_devolucao
     * @return ReservaCarro
     */
    public function setValorDevolucao($valor_devolucao)
    {
        $this->valor_devolucao = $valor_devolucao;
        return $this;
    }

    /**
     * @return int
     */
    public function getPagamento()
    {
        return $this->pagamento;
    }

    /**
     * @param int $pagamento
     * @return ReservaCarro
     */
    public function setPagamento($pagamento)
    {
        $this->pagamento = $pagamento;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * @param mixed $dataCadastro
     * @return ReservaCarro
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = new DateTimeUnit($dataCadastro);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataAtualizacao()
    {
        return $this->dataAtualizacao;
    }

    /**
     * @param mixed $dataAtualizacao
     * @return ReservaCarro
     */
    public function setDataAtualizacao($dataAtualizacao)
    {
        $this->dataAtualizacao = new DateTimeUnit($dataAtualizacao);
        return $this;
    }

    /**
     * @return string
     */
    public function getCodConfirmacao()
    {
        return $this->cod_confirmacao;
    }

    /**
     * @param string $cod_confirmacao
     * @return ReservaCarro
     */
    public function setCodConfirmacao($cod_confirmacao)
    {
        $this->cod_confirmacao = $cod_confirmacao;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeConfirmacao()
    {
        return $this->nome_confirmacao;
    }

    /**
     * @param string $nome_confirmacao
     * @return ReservaCarro
     */
    public function setNomeConfirmacao($nome_confirmacao)
    {
        $this->nome_confirmacao = $nome_confirmacao;
        return $this;
    }

    /**
     * @return string
     */
    public function getCiaAerea()
    {
        return $this->cia_aerea;
    }

    /**
     * @param string $cia_aerea
     * @return ReservaCarro
     */
    public function setCiaAerea($cia_aerea)
    {
        $this->cia_aerea = $cia_aerea;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumVoo()
    {
        return $this->num_voo;
    }

    /**
     * @param int $num_voo
     * @return ReservaCarro
     */
    public function setNumVoo($num_voo)
    {
        $this->num_voo = $num_voo;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return ReservaCarro
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAtivaOpcao()
    {
        return $this->ativaOpcao;
    }

    /**
     * @param bool $ativaOpcao
     * @return ReservaCarro
     */
    public function setAtivaOpcao($ativaOpcao)
    {
        $this->ativaOpcao = $ativaOpcao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLimiteOpcao()
    {
        return $this->limiteOpcao;
    }

    /**
     * @param mixed $limiteOpcao
     * @return ReservaCarro
     */
    public function setLimiteOpcao($limiteOpcao)
    {
        $this->limiteOpcao = $limiteOpcao;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusnome()
    {
        return $this->statusnome;
    }

    /**
     * @param string $statusnome
     * @return ReservaCarro
     */
    public function setStatusnome($statusnome)
    {
        $this->statusnome = $statusnome;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOnline()
    {
        return $this->online;
    }

    /**
     * @param bool $online
     * @return ReservaCarro
     */
    public function setOnline($online)
    {
        $this->online = $online;
        return $this;
    }

    /**
     * @return int
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @param int $agencia
     * @return ReservaCarro
     */
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;
        return $this;
    }

    /**
     * @return string
     */
    public function getObservacoes()
    {
        return $this->observacoes;
    }

    /**
     * @param string $observacoes
     * @return ReservaCarro
     */
    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;
        return $this;
    }

    /**
     * @return int
     */
    public function getStur()
    {
        return $this->stur;
    }

    /**
     * @param int $stur
     * @return ReservaCarro
     */
    public function setStur($stur)
    {
        $this->stur = $stur;
        return $this;
    }

    /**
     * @return ReservaCarroPesquisa
     */
    public function getPesquisa()
    {
        if (!is_object($this->pesquisa) && $this->pesquisa) {
            $pesquisa = $this->aluguelcarros->showReservaCarroPesquisa($this->pesquisa);
            $this->pesquisa = $pesquisa;
        }
        return $this->pesquisa;
    }

    /**
     * @param int $pesquisa
     * @return ReservaCarro
     */
    public function setPesquisa($pesquisa)
    {
        $this->pesquisa = $pesquisa;
        $this->setPesquisaId($pesquisa);
        return $this;
    }

    /**
     * @return int
     */
    public function getPesquisaId()
    {
        return $this->pesquisa_id;
    }

    /**
     * @param int $pesquisa_id
     * @return ReservaCarro
     */
    public function setPesquisaId($pesquisa_id)
    {
        $this->pesquisa_id = $pesquisa_id;
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
     * @return ReservaCarro
     */
    public function setAvaliacao($avaliacao)
    {
        $this->avaliacao = $avaliacao;
        return $this;
    }

    /**
     * @return int
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param int $site
     * @return ReservaCarro
     */
    public function setSite($site)
    {
        $this->site = $site;
        return $this;
    }

    /**
     * @return int
     */
    public function getOldId()
    {
        return $this->old_id;
    }

    /**
     * @param int $old_id
     * @return ReservaCarro
     */
    public function setOldId($old_id)
    {
        $this->old_id = $old_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getMdCode()
    {
        return $this->mdCode;
    }

    /**
     * @param string $mdCode
     * @return ReservaCarro
     */
    public function setMdCode($mdCode)
    {
        $this->mdCode = $mdCode;
        return $this;
    }

    /**
     * @return array
     */
    public function getReservasSimilares()
    {
        return $this->reservas_similares;
    }

    /**
     * @param array $reservas_similares
     * @return ReservaCarro
     */
    public function setReservasSimilares($reservas_similares)
    {
        $this->reservas_similares = $reservas_similares;
        return $this;
    }

    /**
     * @return string
     */
    public function getReservasSimilaresStr()
    {
        return $this->reservas_similares_str;
    }

    /**
     * @param string $reservas_similares_str
     * @return ReservaCarro
     */
    public function setReservasSimilaresStr($reservas_similares_str)
    {
        $this->reservas_similares_str = $reservas_similares_str;
        return $this;
    }

    /**
     * @return bool
     */
    public function isReservasSimilaresVisto()
    {
        return $this->reservas_similares_visto;
    }

    /**
     * @param bool $reservas_similares_visto
     * @return ReservaCarro
     */
    public function setReservasSimilaresVisto($reservas_similares_visto)
    {
        $this->reservas_similares_visto = $reservas_similares_visto;
        return $this;
    }

    /**
     * @return bool
     */
    public function getVendaLivre()
    {
        return $this->venda_livre;
    }

    /**
     * @param bool $venda_livre
     * @return ReservaCarro
     */
    public function setVendaLivre($venda_livre)
    {
        $this->venda_livre = $venda_livre;
        return $this;
    }

    /**
     * @return int
     */
    public function getCodAfiliado()
    {
        return $this->codAfiliado;
    }

    /**
     * @param int $codAfiliado
     * @return ReservaCarro
     */
    public function setCodAfiliado($codAfiliado)
    {
        $this->codAfiliado = $codAfiliado;
        return $this;
    }

    /**
     * @return int
     */
    public function getModAfiliado()
    {
        return $this->modAfiliado;
    }

    /**
     * @param int $modAfiliado
     * @return ReservaCarro
     */
    public function setModAfiliado($modAfiliado)
    {
        $this->modAfiliado = $modAfiliado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getObjAfiliado()
    {
        return $this->objAfiliado;
    }

    /**
     * @param mixed $objAfiliado
     * @return ReservaCarro
     */
    public function setObjAfiliado($objAfiliado)
    {
        $this->objAfiliado = $objAfiliado;
        return $this;
    }

    /**
     * @return array
     */
    public function getObsOperadores()
    {
        return $this->obs_operadores;
    }

    /**
     * @param array $obs_operadores
     * @return ReservaCarro
     */
    public function setObsOperadores($obs_operadores)
    {
        $this->obs_operadores = $obs_operadores;
        return $this;
    }

    /**
     * @return array
     */
    public function getObsLocadoras()
    {
        return $this->obs_locadoras;
    }

    /**
     * @param array $obs_locadoras
     * @return ReservaCarro
     */
    public function setObsLocadoras($obs_locadoras)
    {
        $this->obs_locadoras = $obs_locadoras;
        return $this;
    }

    /**
     * @return array
     */
    public function getLogReservacarro()
    {
        return $this->log_reservacarro;
    }

    /**
     * @param array $log_reservacarro
     * @return ReservaCarro
     */
    public function setLogReservacarro($log_reservacarro)
    {
        $this->log_reservacarro = $log_reservacarro;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSolicitaCancelamento()
    {
        return $this->solicita_cancelamento;
    }

    /**
     * @param bool $solicita_cancelamento
     * @return ReservaCarro
     */
    public function setSolicitaCancelamento($solicita_cancelamento)
    {
        $this->solicita_cancelamento = $solicita_cancelamento;
        return $this;
    }

    /**
     * @return array
     */
    public function getAlteraReserva()
    {
        return $this->altera_reserva;
    }

    /**
     * @param array $altera_reserva
     * @return ReservaCarro
     */
    public function setAlteraReserva($altera_reserva)
    {
        $this->altera_reserva = $altera_reserva;
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
     * @return ReservaCarro
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
        return $this;
    }

    /**
     * @return int
     */
    public function getDeliveryid()
    {
        return $this->deliveryid;
    }

    /**
     * @param int $deliveryid
     * @return ReservaCarro
     */
    public function setDeliveryid($deliveryid)
    {
        $this->deliveryid = $deliveryid;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorDelivery()
    {
        return $this->valor_delivery;
    }

    /**
     * @param float $valor_delivery
     * @return ReservaCarro
     */
    public function setValorDelivery($valor_delivery)
    {
        $this->valor_delivery = $valor_delivery;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeliveryDevo()
    {
        return $this->delivery_devo;
    }

    /**
     * @param mixed $delivery_devo
     * @return ReservaCarro
     */
    public function setDeliveryDevo($delivery_devo)
    {
        $this->delivery_devo = $delivery_devo;
        return $this;
    }

    /**
     * @return int
     */
    public function getDeliverydevoid()
    {
        return $this->deliverydevoid;
    }

    /**
     * @param int $deliverydevoid
     * @return ReservaCarro
     */
    public function setDeliverydevoid($deliverydevoid)
    {
        $this->deliverydevoid = $deliverydevoid;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorDeliveryDevo()
    {
        return $this->valor_delivery_devo;
    }

    /**
     * @param float $valor_delivery_devo
     * @return ReservaCarro
     */
    public function setValorDeliveryDevo($valor_delivery_devo)
    {
        $this->valor_delivery_devo = $valor_delivery_devo;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeDelivery()
    {
        return $this->nome_delivery;
    }

    /**
     * @param string $nome_delivery
     * @return ReservaCarro
     */
    public function setNomeDelivery($nome_delivery)
    {
        $this->nome_delivery = $nome_delivery;
        return $this;
    }

    /**
     * @return string
     */
    public function getConfirmacaoXml()
    {
        return $this->confirmacao_xml;
    }

    /**
     * @param string $confirmacao_xml
     * @return ReservaCarro
     */
    public function setConfirmacaoXml($confirmacao_xml)
    {
        $this->confirmacao_xml = $confirmacao_xml;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVenda()
    {
        return $this->venda;
    }

    /**
     * @param mixed $venda
     * @return ReservaCarro
     */
    public function setVenda($venda)
    {
        $this->venda = $venda;
        return $this;
    }

}