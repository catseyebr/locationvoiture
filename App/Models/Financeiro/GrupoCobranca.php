<?php

namespace Carroaluguel\Models\Financeiro;


use Carroaluguel\Models\FinanceiroFacade;

class GrupoCobranca
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
    private $email_primario;

    /**
     * @var string
     */
    private $email_secundario;

    /**
     * @var string
     */
    private $email_terciario;

    /**
     * @var string
     */
    private $nome_responsavel;

    /**
     * @var Fornecedor[]
     */
    private $fornecedores;

    /**
     * @var Venda[]
     */
    private $vendas;

    /**
     * @var float
     */
    private $total_comissao;

    /**
     * @var array
     */
    private $arquivos_cobranca;

    /**
     * @var FinanceiroFacade
     */
    private $financeiro;

    public function __construct($facade = null)
    {
        if ($facade) {
            $this->financeiro = $facade;
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
     * @return GrupoCobranca
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
     * @return GrupoCobranca
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailPrimario()
    {
        return $this->email_primario;
    }

    /**
     * @param string $email_primario
     * @return GrupoCobranca
     */
    public function setEmailPrimario($email_primario)
    {
        $this->email_primario = $email_primario;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailSecundario()
    {
        return $this->email_secundario;
    }

    /**
     * @param string $email_secundario
     * @return GrupoCobranca
     */
    public function setEmailSecundario($email_secundario)
    {
        $this->email_secundario = $email_secundario;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailTerciario()
    {
        return $this->email_terciario;
    }

    /**
     * @param string $email_terciario
     * @return GrupoCobranca
     */
    public function setEmailTerciario($email_terciario)
    {
        $this->email_terciario = $email_terciario;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomeResponsavel()
    {
        return $this->nome_responsavel;
    }

    /**
     * @param string $nome_responsavel
     * @return GrupoCobranca
     */
    public function setNomeResponsavel($nome_responsavel)
    {
        $this->nome_responsavel = $nome_responsavel;
        return $this;
    }

    /**
     * @return Fornecedor[]
     */
    public function getFornecedores()
    {
        if(!is_array($this->fornecedores)){
            $this->fornecedores = $this->financeiro->listFornecedor(array('grupo' => $this->getId()));
        }
        return $this->fornecedores;
    }

    /**
     * @param Fornecedor[] $fornecedores
     * @return GrupoCobranca
     */
    public function setFornecedores($fornecedores)
    {
        $this->fornecedores = $fornecedores;
        return $this;
    }

    /**
     * Retorna as vendas que pertencem ao grupo de cobrança
     * Necessário informar a data de referencia
     * Status é opcional
     *
     * @param string $data_ref
     * @param string $data_ini
     * @param int $status
     * @param string $id_conf
     *
     * @return Venda[]
     */
    public function getVendas($data_ref, $status = NULL, $data_ini = NULL, $id_conf = NULL)
    {
        if(is_array($this->getFornecedores())){
            $this->arquivos_cobranca = NULL;
            $forn_array = NULL;
            foreach($this->getFornecedores() as $forn){
                $forn_array[] = $forn->getId();
            }

            if($data_ini){
                $array_search['dataInicialReport'] = $data_ref;
                $array_search['dataFinalReport'] = $data_ini;
            }else{
                $array_search['dataFinalValida'] = $data_ref;
            }
            if($status){
                $array_search['status'] = $status;
            }
            if($id_conf){
                $array_search['idconf'] = $id_conf;
            }
            $array_search['inFornecedor'] = implode(',',$forn_array);
            $this->vendas = $this->financeiro->listVendas($array_search);
            $valor_total_comissao = 0;
            foreach($this->vendas as $ven){
                $valor_total_comissao += $ven->getValorComissao();
            }
            $this->total_comissao = (float)$valor_total_comissao;
            foreach($this->vendas as $ven_file){
                $this->arquivos_cobranca[$ven_file->getIdConf()]['vendas'][] = $ven_file;
            }
            if(is_array($this->arquivos_cobranca)){
                foreach($this->arquivos_cobranca as $arquivos_k => $arquivos_f){
                    $valor_total_comissao_file = 0;

                    foreach($arquivos_f['vendas'] as $ven_file){
                        $valor_total_comissao_file += $ven_file->getValorComissao();
                    }
                    $this->arquivos_cobranca[$arquivos_k]['valorTotalComissao'] = $valor_total_comissao_file;
                }
            }
        }
        return $this->vendas;
    }

    /**
     * @param Venda[] $vendas
     * @return GrupoCobranca
     */
    public function setVendas($vendas)
    {
        $this->vendas = $vendas;
        return $this;
    }

    /**
     * Retorna o valor total da comissão das vendas que pertencem ao grupo de cobrança
     * Necessário informar a data de referencia
     * Status é opcional
     *
     * @param string $data_ref
     * @param string $data_ini
     * @param int $status
     * @param string $id_conf
     *
     * @return float
     */
    public function getTotalComissao($data_ref, $status = NULL, $data_ini = NULL, $id_conf = NULL)
    {
        if(!is_array($this->vendas)){
            $this->getVendas($data_ref, $status, $data_ini,$id_conf);
        }
        return $this->total_comissao;
    }

    /**
     * @param float $total_comissao
     * @return GrupoCobranca
     */
    public function setTotalComissao($total_comissao)
    {
        $this->total_comissao = $total_comissao;
        return $this;
    }

    /**
     * Retorna as vendas que pertencem ao grupo de cobrança separadas por arquivos
     * Necessário informar a data de referencia
     * Status é opcional
     *
     * @param string $data_ref
     * @param string $data_ini
     * @param int $status
     *
     * @return array
     */
    public function getArquivosCobranca($data_ref, $status = NULL, $data_ini = NULL)
    {
        if(!is_array($this->vendas)){
            $this->getVendas($data_ref, $status, $data_ini);
        }
        return $this->arquivos_cobranca;
    }

    /**
     * @param array $arquivos_cobranca
     * @return GrupoCobranca
     */
    public function setArquivosCobranca($arquivos_cobranca)
    {
        $this->arquivos_cobranca = $arquivos_cobranca;
        return $this;
    }

}