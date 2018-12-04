<?php

namespace Carroaluguel\Models\Financeiro;

use Carroaluguel\Models\Afiliados\Afiliado;
use Carroaluguel\Models\AfiliadosFacade;
use Carroaluguel\Models\AluguelCarros\Locadora;
use Carroaluguel\Models\AluguelCarros\ReservaCarro;
use Carroaluguel\Models\AluguelCarrosFacade;
use Carroaluguel\Models\FinanceiroFacade;
use Carroaluguel\Models\Utilizador\Cliente;
use Carroaluguel\Models\Utilizador\Condutor;
use Carroaluguel\Models\UtilizadorFacade;
use Core\DateTimeUnit;
use Core\Period;

class Venda
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var Produto
     */
    private $produto;

    /**
     * @var Cliente
     */
    private $cliente;

    /**
     * @var Condutor
     */
    private $condutor;

    /**
     * @var Fornecedor
     */
    private $fornecedor;

    /**
     * @var int
     */
    private $fornecedorid;

    /**
     * @var integer
     */
    private $reserva;

    /**
     * @var ReservaCarro
     */
    private $reservaCarroObj;

    /**
     * @var string
     */
    private $reservaCidade;

    /**
     * @var Period
     */
    private $periodo;

    /**
     * @var string
     */
    private $confFornecedor;

    /**
     * @var float
     */
    private $valorTotal;

    /**
     * @var float
     */
    private $valorComissao;

    /**
     * @var float
     */
    private $valorComissaoPagar;

    /**
     * @var float
     */
    private $valorCalculo;

    /**
     * @var float
     */
    private $valorCalculoPagar;

    /**
     * @var float
     */
    private $aliquotaComissao;

    /**
     * @var float
     */
    private $aliquotaComissaoPagar;

    /**
     * @var DateTimeUnit
     */
    private $dataVencimento;

    /**
     * @var StatusVenda
     */
    private $status;

    /**
     * @var int
     */
    private $status_id;

    /**
     * @var DateTimeUnit
     */
    private $dataEnvioCobrancaComissao;

    /**
     * @var DateTimeUnit
     */
    private $dataEnvioCobranca;

    /**
     * @var DateTimeUnit
     */
    private $dataAtualizacao;

    /**
     * @var DateTimeUnit
     */
    private $dataBaixa;

    /**
     * @var float
     */
    private $valorRecebido;

    /**
     * @var string
     */
    private $obsBaixa;

    /**
     * @var int
     */
    private $contaBaixa;

    /**
     * Módulo utilizado para acessar as funções específicas do produto
     *
     * @var string
     */
    private $moduloProduto;

    /**
     * @var string
     */
    private $vendedor;

    /**
     * @var string
     */
    private $vendedor_obj;

    /**
     * @var string
     */
    private $arquivo_processamento;

    /**
     * @var DateTimeUnit
     */
    private $data_processamento;

    /**
     * @var int
     */
    private $locadora;

    /**
     * @var string
     */
    private $cpf_cliente;

    /**
     * @var string
     */
    private $cidade;

    /**
     * @var string
     */
    private $idconf;

    /**
     * @var DateTimeUnit
     */
    private $dataQuitacao;

    /**
     * @var GrupoCobranca
     */
    private $grupocobranca;

    /**
     * @var FinanceiroFacade
     */
    private $financeiro;

    /**
     * @var UtilizadorFacade
     */
    private $utilizador;

    /**
     * @var AluguelCarrosFacade
     */
    private $aluguelcarros;

    /**
     * @var AfiliadosFacade
     */
    private $afiliados;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->financeiro = $facade;
            $this->utilizador = new UtilizadorFacade($this->financeiro->getEntityManager());
            $this->aluguelcarros = new AluguelCarrosFacade($this->financeiro->getEntityManager());
            $this->afiliados = new AfiliadosFacade($this->financeiro->getEntityManager());
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
     * @return Venda
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Produto
     */
    public function getProduto()
    {
        if (!is_object($this->produto) && $this->produto) {
            $this->produto = $this->financeiro->showProduto($this->produto);
        }
        return $this->produto;
    }

    /**
     * @param Produto $produto
     * @return Venda
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;
        return $this;
    }

    /**
     * @return Cliente
     */
    public function getCliente()
    {
        if (!is_object($this->cliente) && $this->cliente) {
            $this->cliente = $this->utilizador->showEmissor($this->cliente);
        }
        return $this->cliente;
    }

    /**
     * @param Cliente $cliente
     * @return Venda
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
        return $this;
    }

    /**
     * @return Condutor
     */
    public function getCondutor()
    {
        if (!is_object($this->condutor) && $this->condutor) {
            $this->condutor = $this->utilizador->showCondutor($this->condutor);
        }
        return $this->condutor;
    }

    /**
     * @param Condutor $condutor
     * @return Venda
     */
    public function setCondutor($condutor)
    {
        $this->condutor = $condutor;
        return $this;
    }

    /**
     * @return Fornecedor
     */
    public function getFornecedor()
    {
        if (!is_object($this->fornecedor) && $this->fornecedor) {
            $this->fornecedor = $this->financeiro->showFornecedor($this->fornecedor);
        }
        return $this->fornecedor;
    }

    /**
     * @param int $fornecedor
     * @return Venda
     */
    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;
        $this->setFornecedorid($fornecedor);
        return $this;
    }

    /**
     * @return int
     */
    public function getFornecedorid()
    {
        return $this->fornecedorid;
    }

    /**
     * @param int $fornecedorid
     * @return Venda
     */
    public function setFornecedorid($fornecedorid)
    {
        $this->fornecedorid = $fornecedorid;
        return $this;
    }

    /**
     * @return int
     */
    public function getReserva()
    {
        return $this->reserva;
    }

    /**
     * @param int $reserva
     * @return Venda
     */
    public function setReserva($reserva)
    {
        $this->reserva = $reserva;
        $this->setReservaCarroObj($reserva);
        return $this;
    }

    /**
     * @return ReservaCarro
     */
    public function getReservaCarroObj()
    {
        if (!is_object($this->reservaCarroObj) && $this->reservaCarroObj) {
            $this->reservaCarroObj = $this->aluguelcarros->showReservaCarro($this->reservaCarroObj);
        }
        return $this->reservaCarroObj;
    }

    /**
     * @param int $reservaCarroObj
     * @return Venda
     */
    public function setReservaCarroObj($reservaCarroObj)
    {
        $this->reservaCarroObj = $reservaCarroObj;
        return $this;
    }

    /**
     * @return string
     */
    public function getReservaCidade()
    {
        if (is_object($this->reservaCarroObj)) {
            if (is_object($this->reservaCarroObj->getLojaRetirar())) {
                $this->reservaCidade = $this->reservaCarroObj->getLojaRetirar()->getEndereco()->getCidade()->getNome();
            }
        }
        return $this->reservaCidade;
    }

    /**
     * @param string $reservaCidade
     * @return Venda
     */
    public function setReservaCidade($reservaCidade)
    {
        $this->reservaCidade = $reservaCidade;
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
     * @return Venda
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
        return $this;
    }

    /**
     * @return string
     */
    public function getConfFornecedor()
    {
        return $this->confFornecedor;
    }

    /**
     * @param string $confFornecedor
     * @return Venda
     */
    public function setConfFornecedor($confFornecedor)
    {
        $this->confFornecedor = $confFornecedor;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * @param float $valorTotal
     * @return Venda
     */
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorComissao()
    {
        if ($this->valorComissao < 1 && $this->getAliquotaComissao() && $this->valorTotal) {
            if ($this->getValorCalculo() > 0) {
                $this->valorComissao = $this->getValorCalculo() * $this->getAliquotaComissao();
            }
        }
        return $this->valorComissao;
    }

    /**
     * @param float $valorComissao
     * @return Venda
     */
    public function setValorComissao($valorComissao)
    {
        $this->valorComissao = $valorComissao;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorComissaoPagar()
    {
        if ($this->valorComissaoPagar < 1 && $this->getAliquotaComissaoPagar() && $this->valorTotal) {
            if ($this->getValorCalculoPagar() > 0) {
                $this->valorComissaoPagar = $this->getValorCalculoPagar() * $this->getAliquotaComissaoPagar();
            }
        }
        return $this->valorComissaoPagar;
    }

    /**
     * @param float $valorComissaoPagar
     * @return Venda
     */
    public function setValorComissaoPagar($valorComissaoPagar)
    {
        $this->valorComissaoPagar = $valorComissaoPagar;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorCalculo()
    {
        $valorCalculo = 0;
        if (is_object($this->getFornecedor())) {
            $include = $this->getFornecedor()->getComissaoInclude();
            if (in_array('diaria', $include)) {
                $valorCalculo = $valorCalculo + $this->getReservaCarroObj()->getValorDiarias();
            }
            if (in_array('horaextra', $include)) {
                $valorCalculo = $valorCalculo + $this->getReservaCarroObj()->getValorHoraExtra();
            }
            if (in_array('protecao', $include)) {
                $valorCalculo = $valorCalculo + $this->getReservaCarroObj()->getValorProtecao();
            }
            if (in_array('taxas', $include)) {
                $valorCalculo = $valorCalculo + $this->getReservaCarroObj()->getValorTaxas();
            }
            if (in_array('extraprotecao', $include)) {
                $valorCalculo = $valorCalculo + $this->getReservaCarroObj()->getValorHoraExtraProtecao();
            }
            if (in_array('extraopcionais', $include)) {
                $valorCalculo = $valorCalculo + $this->getReservaCarroObj()->getValorHoraExtraOpcionais();
            }
        }
        if ($valorCalculo > 0) {
            $this->valorCalculo = $valorCalculo;

        }
        return $this->valorCalculo;
    }

    /**
     * @param float $valorCalculo
     * @return Venda
     */
    public function setValorCalculo($valorCalculo)
    {
        $this->valorCalculo = $valorCalculo;
        return $this;
    }

    /**
     * @return float
     */
    public function getValorCalculoPagar()
    {
        $valorCalculoPagar = 0;
        if (is_object($this->getVendedorObj())) {
            $include = $this->getVendedorObj()->getComissaoInclude();
            if (in_array('diaria', $include)) {
                $valorCalculoPagar = $valorCalculoPagar + $this->getReservaCarroObj()->getValorDiarias();
            }
            if (in_array('horaextra', $include)) {
                $valorCalculoPagar = $valorCalculoPagar + $this->getReservaCarroObj()->getValorHoraExtra();
            }
            if (in_array('protecao', $include)) {
                $valorCalculoPagar = $valorCalculoPagar + $this->getReservaCarroObj()->getValorProtecao();
            }
            if (in_array('taxas', $include)) {
                $valorCalculoPagar = $valorCalculoPagar + $this->getReservaCarroObj()->getValorTaxas();
            }
            if (in_array('extraprotecao', $include)) {
                $valorCalculoPagar = $valorCalculoPagar + $this->getReservaCarroObj()->getValorHoraExtraProtecao();
            }
            if (in_array('extraopcionais', $include)) {
                $valorCalculoPagar = $valorCalculoPagar + $this->getReservaCarroObj()->getValorHoraExtraOpcionais();
            }
        }
        if ($valorCalculoPagar > 0) {
            $this->valorCalculoPagar = $valorCalculoPagar;

        }
        return $this->valorCalculoPagar;
    }

    /**
     * @param float $valorCalculoPagar
     * @return Venda
     */
    public function setValorCalculoPagar($valorCalculoPagar)
    {
        $this->valorCalculoPagar = $valorCalculoPagar;
        return $this;
    }

    /**
     * @return float
     */
    public function getAliquotaComissao()
    {
        $aliquota = 0;
        if ($this->valorComissao < 1) {
            if (is_object($this->getFornecedor())) {
                $aliquota_fornecedor = $this->getFornecedor()->getAliquotaComissao();
                if ($aliquota_fornecedor > 0) {
                    $aliquota = $aliquota_fornecedor / 100;
                }
            }
        } else {
            $aliquota = ($this->valorComissao / $this->valorCalculo);
        }
        $this->aliquotaComissao = number_format($aliquota, '3');
        return $this->aliquotaComissao;
    }

    /**
     * @param float $aliquotaComissao
     * @return Venda
     */
    public function setAliquotaComissao($aliquotaComissao)
    {
        $this->aliquotaComissao = $aliquotaComissao;
        return $this;
    }

    /**
     * @return float
     */
    public function getAliquotaComissaoPagar()
    {
        $aliquota = 0;
        if (is_object($this->getVendedorObj())) {
            $aliquota_vendedor = $this->getVendedorObj()->getAliquotaComissao();
            if ($aliquota_vendedor > 0) {
                $aliquota = $aliquota_vendedor / 100;
            }

        }
        $this->aliquotaComissaoPagar = $aliquota;
        return $this->aliquotaComissaoPagar;
    }

    /**
     * @param float $aliquotaComissaoPagar
     * @return Venda
     */
    public function setAliquotaComissaoPagar($aliquotaComissaoPagar)
    {
        $this->aliquotaComissaoPagar = $aliquotaComissaoPagar;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataVencimento()
    {
        return $this->dataVencimento;
    }

    /**
     * @param DateTimeUnit $dataVencimento
     * @return Venda
     */
    public function setDataVencimento($dataVencimento)
    {
        $this->dataVencimento = new DateTimeUnit($dataVencimento);
        return $this;
    }

    /**
     * @return StatusVenda
     */
    public function getStatus()
    {
        if (!is_object($this->status)) {
            $this->status = $this->financeiro->showStatusVenda($this->status);

        } else if ($this->status->getId() == 1) {
            if ($this->getArquivoProcessamento() && $this->getDataProcessamento()) {
                $this->status = $this->financeiro->showStatusVenda(6);
            }
        }
        return $this->status;
    }

    /**
     * @param int $status
     * @return Venda
     */
    public function setStatus($status)
    {
        $this->status = $status;
        $this->setStatusId($status);
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusId()
    {
        if(!$this->status_id){
            $this->status = $this->getStatus()->getId();
        }
        return $this->status_id;
    }

    /**
     * @param int $status_id
     * @return Venda
     */
    public function setStatusId($status_id)
    {
        $this->status_id = $status_id;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataEnvioCobrancaComissao()
    {
        return $this->dataEnvioCobrancaComissao;
    }

    /**
     * @param DateTimeUnit $dataEnvioCobrancaComissao
     * @return Venda
     */
    public function setDataEnvioCobrancaComissao($dataEnvioCobrancaComissao)
    {
        $this->dataEnvioCobrancaComissao = new DateTimeUnit($dataEnvioCobrancaComissao);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataEnvioCobranca()
    {
        return $this->dataEnvioCobranca;
    }

    /**
     * @param DateTimeUnit $dataEnvioCobranca
     * @return Venda
     */
    public function setDataEnvioCobranca($dataEnvioCobranca)
    {
        $this->dataEnvioCobranca = new DateTimeUnit($dataEnvioCobranca);
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
     * @param DateTimeUnit $dataAtualizacao
     * @return Venda
     */
    public function setDataAtualizacao($dataAtualizacao)
    {
        $this->dataAtualizacao = new DateTimeUnit($dataAtualizacao);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataBaixa()
    {
        return $this->dataBaixa;
    }

    /**
     * @param DateTimeUnit $dataBaixa
     * @return Venda
     */
    public function setDataBaixa($dataBaixa)
    {
        $this->dataBaixa = new DateTimeUnit($dataBaixa);
        return $this;
    }

    /**
     * @return float
     */
    public function getValorRecebido()
    {
        return $this->valorRecebido;
    }

    /**
     * @param float $valorRecebido
     * @return Venda
     */
    public function setValorRecebido($valorRecebido)
    {
        $this->valorRecebido = $valorRecebido;
        return $this;
    }

    /**
     * @return string
     */
    public function getObsBaixa()
    {
        return $this->obsBaixa;
    }

    /**
     * @param string $obsBaixa
     * @return Venda
     */
    public function setObsBaixa($obsBaixa)
    {
        $this->obsBaixa = $obsBaixa;
        return $this;
    }

    /**
     * @return int
     */
    public function getContaBaixa()
    {
        return $this->contaBaixa;
    }

    /**
     * @param int $contaBaixa
     * @return Venda
     */
    public function setContaBaixa($contaBaixa)
    {
        $this->contaBaixa = $contaBaixa;
        return $this;
    }

    /**
     * @return string
     */
    public function getModuloProduto()
    {
        $this->moduloProduto = $this->getProduto()->getModulo();
        return $this->moduloProduto;
    }

    /**
     * @param string $moduloProduto
     * @return Venda
     */
    public function setModuloProduto($moduloProduto)
    {
        $this->moduloProduto = $moduloProduto;
        return $this;
    }

    /**
     * @return string
     */
    public function getVendedor()
    {
        return $this->vendedor;
    }

    /**
     * @param string $vendedor
     * @return Venda
     */
    public function setVendedor($vendedor)
    {
        $this->vendedor = $vendedor;
        $this->setVendedorObj($vendedor);
        return $this;
    }

    /**
     * @return Afiliado
     */
    public function getVendedorObj()
    {
        if (!is_object($this->vendedor_obj) && $this->vendedor_obj) {
            $this->vendedor_obj = $this->afiliados->showAfiliado($this->vendedor_obj);
        }
        return $this->vendedor_obj;
    }

    /**
     * @param string $vendedor_obj
     * @return Venda
     */
    public function setVendedorObj($vendedor_obj)
    {
        $this->vendedor_obj = $vendedor_obj;
        return $this;
    }

    /**
     * @return string
     */
    public function getArquivoProcessamento()
    {
        return $this->arquivo_processamento;
    }

    /**
     * @param string $arquivo_processamento
     * @return Venda
     */
    public function setArquivoProcessamento($arquivo_processamento)
    {
        $this->arquivo_processamento = $arquivo_processamento;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataProcessamento()
    {
        return $this->data_processamento;
    }

    /**
     * @param DateTimeUnit $data_processamento
     * @return Venda
     */
    public function setDataProcessamento($data_processamento)
    {
        $this->data_processamento = new DateTimeUnit($data_processamento);
        return $this;
    }

    /**
     * @return Locadora
     */
    public function getLocadora()
    {
        if (!is_object($this->locadora) && $this->locadora) {
            $this->locadora = $this->aluguelcarros->showLocadora($this->locadora);
        }
        return $this->locadora;
    }

    /**
     * @param int $locadora
     * @return Venda
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpfCliente()
    {
        return $this->cpf_cliente;
    }

    /**
     * @param string $cpf_cliente
     * @return Venda
     */
    public function setCpfCliente($cpf_cliente)
    {
        $this->cpf_cliente = $cpf_cliente;
        return $this;
    }

    /**
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param string $cidade
     * @return Venda
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdconf()
    {
        return $this->idconf;
    }

    /**
     * @param string $idconf
     * @return Venda
     */
    public function setIdconf($idconf)
    {
        $this->idconf = $idconf;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataQuitacao()
    {
        if (!is_object($this->dataQuitacao)) {
            $this->setDataQuitacao();
        }
        return $this->dataQuitacao;
    }

    /**
     * @return Venda
     */
    public function setDataQuitacao()
    {
        if ($this->getStatusId() == 2) {
            $mov_data = $this->financeiro->listMovimentacoes(array(
                'venda' => $this->getId()
            ));
            if (isset($mov_data[0]) && is_object($mov_data[0])) {
                $mov = $mov_data[0];
                if (is_object($mov->getDataQuitacao())) {
                    $this->dataQuitacao = new DateTimeUnit($mov->getDataQuitacao()->getDataHoraSql(), 1);
                }
            }
        }
        return $this;
    }

    /**
     * @return GrupoCobranca
     */
    public function getGrupocobranca()
    {
        return $this->grupocobranca;
    }

    /**
     * @param GrupoCobranca $grupocobranca
     * @return Venda
     */
    public function setGrupocobranca($grupocobranca)
    {
        $this->grupocobranca = $grupocobranca;
        return $this;
    }

}