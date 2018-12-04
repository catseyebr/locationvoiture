<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;
use Carroaluguel\Models\Utilizador\Cliente;
use Carroaluguel\Models\UtilizadorFacade;
use Core\DateTimeUnit;

class Avaliacao
{
    /**
     * @var ReservaCarro
     */
    private $reserva;
    /**
     * @var int
     */
    private $id;
    /**
     * @var Cliente
     */
    private $cliente;
    /**
     * @var DateTimeUnit
     */
    private $data;
    /**
     * @var array
     */
    private $aval_carroaluguel;
    /**
     * @var array
     */
    private $aval_carroaluguel_conceito;
    /**
     * @var array
     */
    private $aval_atendimento;
    /**
     * @var array
     */
    private $aval_atendimento_conceito;
    /**
     * @var array
     */
    private $aval_servicos;
    /**
     * @var array
     */
    private $aval_loja;
    /**
     * @var array
     */
    private $aval_loja_conceito;
    /**
     * @var array
     */
    private $aval_carro;
    /**
     * @var array
     */
    private $aval_carro_conceito;
    /**
     * @var string
     */
    private $depoimento;
    /**
     * @var bool
     */
    private $mostradepo;
    /**
     * @var string
     */
    private $depoimento_resposta;
    /**
     * @var string
     */
    private $nome_depoimento;
    /**
     * @var bool
     */
    private $status;

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
     * @return ReservaCarro
     */
    public function getReserva()
    {
        if (!is_object($this->reserva) && $this->reserva) {
            $reserva = $this->aluguelcarros->showReservaCarro($this->reserva);
            $this->reserva = $reserva;
        }
        return $this->reserva;
    }

    /**
     * @param ReservaCarro $reserva
     * @return Avaliacao
     */
    public function setReserva($reserva)
    {
        $this->reserva = $reserva;
        return $this;
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
     * @return Avaliacao
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Cliente
     */
    public function getCliente()
    {
        if (!is_object($this->cliente) && $this->cliente) {
            $cliente = $this->utilizador->showCliente($this->cliente);
            $this->cliente = $cliente;
        }
        return $this->cliente;
    }

    /**
     * @param Cliente $cliente
     * @return Avaliacao
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param DateTimeUnit $data
     * @return Avaliacao
     */
    public function setData($data)
    {
        $this->data = new DateTimeUnit($data);
        return $this;
    }

    /**
     * @return array
     */
    public function getAvalCarroaluguel()
    {
        return $this->aval_carroaluguel;
    }

    /**
     * @param array $aval_carroaluguel
     * @return Avaliacao
     */
    public function setAvalCarroaluguel($aval_carroaluguel)
    {
        $this->aval_carroaluguel = $aval_carroaluguel;
        return $this;
    }

    /**
     * @return array
     */
    public function getAvalCarroaluguelConceito()
    {
        return $this->aval_carroaluguel_conceito;
    }

    /**
     * @param array $aval_carroaluguel_conceito
     * @return Avaliacao
     */
    public function setAvalCarroaluguelConceito($aval_carroaluguel_conceito)
    {
        $this->aval_carroaluguel_conceito = $aval_carroaluguel_conceito;
        return $this;
    }

    /**
     * @return array
     */
    public function getAvalAtendimento()
    {
        return $this->aval_atendimento;
    }

    /**
     * @param array $aval_atendimento
     * @return Avaliacao
     */
    public function setAvalAtendimento($aval_atendimento)
    {
        $this->aval_atendimento = $aval_atendimento;
        return $this;
    }

    /**
     * @return array
     */
    public function getAvalAtendimentoConceito()
    {
        return $this->aval_atendimento_conceito;
    }

    /**
     * @param array $aval_atendimento_conceito
     * @return Avaliacao
     */
    public function setAvalAtendimentoConceito($aval_atendimento_conceito)
    {
        $this->aval_atendimento_conceito = $aval_atendimento_conceito;
        return $this;
    }

    /**
     * @return array
     */
    public function getAvalServicos()
    {
        return $this->aval_servicos;
    }

    /**
     * @param array $aval_servicos
     * @return Avaliacao
     */
    public function setAvalServicos($aval_servicos)
    {
        $this->aval_servicos = $aval_servicos;
        return $this;
    }

    /**
     * @return array
     */
    public function getAvalLoja()
    {
        return $this->aval_loja;
    }

    /**
     * @param array $aval_loja
     * @return Avaliacao
     */
    public function setAvalLoja($aval_loja)
    {
        $this->aval_loja = $aval_loja;
        return $this;
    }

    /**
     * @return array
     */
    public function getAvalLojaConceito()
    {
        return $this->aval_loja_conceito;
    }

    /**
     * @param array $aval_loja_conceito
     * @return Avaliacao
     */
    public function setAvalLojaConceito($aval_loja_conceito)
    {
        $this->aval_loja_conceito = $aval_loja_conceito;
        return $this;
    }

    /**
     * @return array
     */
    public function getAvalCarro()
    {
        return $this->aval_carro;
    }

    /**
     * @param array $aval_carro
     * @return Avaliacao
     */
    public function setAvalCarro($aval_carro)
    {
        $this->aval_carro = $aval_carro;
        return $this;
    }

    /**
     * @return array
     */
    public function getAvalCarroConceito()
    {
        return $this->aval_carro_conceito;
    }

    /**
     * @param array $aval_carro_conceito
     * @return Avaliacao
     */
    public function setAvalCarroConceito($aval_carro_conceito)
    {
        $this->aval_carro_conceito = $aval_carro_conceito;
        return $this;
    }

    /**
     * @return string
     */
    public function getDepoimento()
    {
        return $this->depoimento;
    }

    /**
     * @param string $depoimento
     * @return Avaliacao
     */
    public function setDepoimento($depoimento)
    {
        $this->depoimento = $depoimento;
        return $this;
    }

    /**
     * @return bool
     */
    public function getMostradepo()
    {
        return $this->mostradepo;
    }

    /**
     * @param bool $mostradepo
     * @return Avaliacao
     */
    public function setMostradepo($mostradepo)
    {
        $this->mostradepo = $mostradepo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDepoimentoResposta()
    {
        return $this->depoimento_resposta;
    }

    /**
     * @param string $depoimento_resposta
     * @return Avaliacao
     */
    public function setDepoimentoResposta($depoimento_resposta)
    {
        $this->depoimento_resposta = $depoimento_resposta;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeDepoimento()
    {
        return $this->nome_depoimento;
    }

    /**
     * @param string $nome_depoimento
     * @return Avaliacao
     */
    public function setNomeDepoimento($nome_depoimento)
    {
        $this->nome_depoimento = $nome_depoimento;
        return $this;
    }

    /**
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param bool $status
     * @return Avaliacao
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Retorna a url de acesso à avaliação
     *
     * @return String
     */
    public function getLinkAval()
    {
        $link_locadora = $this->getReserva()->getLocadora()->getLinkName();
        $link_cidade = $this->getReserva()->getLojaRetirar()->getEndereco()->getCidade()->getUrlName();
        $link_loja = $this->getReserva()->getLojaRetirar()->getLojaUrl();
        $link = "/avaliacao/" . $link_locadora . "/" . $link_cidade . "/" . $link_loja . "/comentario" . $this->getReserva()->getId();
        return $link;
    }

    /**
     * Retorna um array com a média de notas dessa avaliação
     *
     * @return array
     */
    public function calculaAvaliacao()
    {

        $tipos_aval = [
            1 => 'Ruim',
            2 => 'Ruim',
            3 => 'Ruim',
            4 => 'Regular',
            5 => 'Regular',
            6 => 'Normal',
            7 => 'Normal',
            8 => 'Bom',
            9 => 'Bom',
            10 => 'Ótimo',
        ];

        $notaAval = 0;
        $notaAvalCarro = 0;

        foreach ($this->getAvalLoja() as $avalLoja) {
            $notaAval = $notaAval + $avalLoja;
        }
        foreach ($this->getAvalCarro() as $avalCarro) {
            $notaAvalCarro = $notaAvalCarro + $avalCarro;
        }
        $nota = round(($notaAval / 4), 1);
        $notaCarro = round(($notaAvalCarro / 7), 1);
        $retorno['nota'] = round(($nota) * 10, 2);
        $retorno['nota_10'] = round($retorno['nota'] / 10, 2);
        $retorno['notaCar'] = round(($notaCarro) * 10, 2);
        $retorno['notaCar_10'] = round($retorno['notaCar'] / 10, 2);
        $retorno['img_orange'] = '<img src="/images/carroaluguel/responsivo/aval_star/' . $this->getImagemClassStar($retorno['nota']) . '" align="absmiddle" width="73" height="13" alt="' . $retorno['nota'] . '" />';
        $retorno['img_car_orange'] = '<img src="/images/carroaluguel/responsivo/aval_star/' . $this->getImagemClassStar($retorno['notaCar']) . '" align="absmiddle" width="73" height="13" alt="' . $retorno['notaCar'] . '" />';
        return $retorno;
    }

    /**
     * Define a imagem classificatória dessa avaliação
     * É acessada pela função calculaAvaliacao()
     *
     * @param int $aval
     * @return string
     */
    private function getImagemClassStar($aval = null)
    {
        $imagem = null;
        if ($aval <= 0) {
            $imagem = 'aval_0.png';
        } else {
            if ($aval >= 0 && $aval < 10) {
                $imagem = 'aval_1.png';
            } else {
                if ($aval >= 10 && $aval < 20) {
                    $imagem = 'aval_2.png';
                } else {
                    if ($aval >= 20 && $aval < 30) {
                        $imagem = 'aval_3.png';
                    } else {
                        if ($aval >= 30 && $aval < 40) {
                            $imagem = 'aval_4.png';
                        } else {
                            if ($aval >= 40 && $aval < 50) {
                                $imagem = 'aval_5.png';
                            } else {
                                if ($aval >= 50 && $aval < 60) {
                                    $imagem = 'aval_6.png';
                                } else {
                                    if ($aval >= 60 && $aval < 70) {
                                        $imagem = 'aval_7.png';
                                    } else {
                                        if ($aval >= 70 && $aval < 80) {
                                            $imagem = 'aval_8.png';
                                        } else {
                                            if ($aval >= 80 && $aval < 90) {
                                                $imagem = 'aval_9.png';
                                            } else {
                                                if ($aval >= 90 && $aval < 100) {
                                                    $imagem = 'aval_10.png';
                                                } else {
                                                    if ($aval == 100) {
                                                        $imagem = 'aval_10.png';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $imagem;
    }

    /**
     * Retorna a pergunta conforme a chave no array associativo
     *
     * @param string $perg_pos
     * @return string
     */
    public function getPergunta($perg_pos)
    {
        $perguntas = array(
            'w_acesso' => 'Velocidade de acesso e navegação no website',
            'w_qualidade' => 'Qualidade de layout. ergonomia de navegação e acessibilidade de informações',
            'w_conteudo' => 'Qualidade de conteúdo exposto, clareza nas informações apresentadas e respostas às suas dúvidas',
            'w_reserva' => 'Nível de dificuldade encontrado em realizar sua locação online',
            'w_nota' => 'Dê sua nota para o website e sistema de locações online',
            'sac_tempo' => 'Agilidade e tempo de espera para o atendimento',
            'sac_info' => 'Clareza da atendente em transmitir todas as informações solicitadas e esclarecimento de suas dúvidas básicas e/ou técnicas',
            'sac_nota' => 'Dê sua nota para a central de atendimento ao cliente',
            'serv_retorno' => 'Pretende utilizar nossos serviços de locação de veículos no Brasil para suas próximas viagens?',
            'serv_indica' => 'Indicaria nossos serviços de locação de automóveis para seus amigos e parentes?',
            'emp_local' => 'Localização e acesso ás lojas de retirada e devolução do veículo',
            'emp_atendimento' => 'Qualidade do atendimento dos funcionários da locadora',
            'emp_horarios' => 'Disponibilidade de horário de funcionamento das lojas',
            'emp_nota' => 'Dê sua nota para os serviços da locadora',
            'car_potencia' => 'Potência de desempenho do veículo',
            'car_consumo' => 'Consumo de combustível',
            'car_manutencao' => 'Conservação e manutenção do veículo (interno e externo)',
            'car_seguranca' => 'Equipamentos, recursos e condições de segurança (cintos, sensores, cadeiras para crianças)',
            'car_capacidade' => 'Capacidade de acomodação de pessoas e bagagens',
            'car_limpeza' => 'Condições de limpeza, higiene e odores',
            'car_nota' => 'Sua nota para o veículo locado'
        );
        return $perguntas[$perg_pos];
    }

}