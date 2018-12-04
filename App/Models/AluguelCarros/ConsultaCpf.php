<?php

namespace Carroaluguel\Models\AluguelCarros;


use Core\DateTimeUnit;

class ConsultaCpf
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $cpf;
    /**
     * @var string
     */
    private $dados;
    /**
     * @var DateTimeUnit
     */
    private $dataConsulta;
    /**
     * @var float
     */
    private $tempoConsulta;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ConsultaCpf
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     * @return ConsultaCpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return array
     */
    public function getDados()
    {
        $cpf_data = null;
        $dados = $this->getArrayResults();
        if (is_array($dados)) {
            $cpf_rdata = NULL;
            foreach ($dados['Entities'] as $entidades) {
                $cpf_rdata[$entidades['SourceName']] = $entidades;
            }
            $contact = null;
            $emails = NULL;
            foreach ($cpf_rdata['Contacts Data']['People'][0]['Contacts'] as $cont) {
                $data = null;
                if($cont['ContactType'] == 'PHONE'){
                    $data = $cont['Phone']['AreaCode'].' '.$cont['Phone']['Number'];
                }else if($cont['ContactType'] == 'ADDRESS'){
                    $data = $cont['Address']['AddressCore'].', '.$cont['Address']['Number'].' '.$cont['Address']['Complement'].' | '.$cont['Address']['Neighborhood'].' | '.$cont['Address']['City'].' - '.$cont['Address']['State'].' | '.$cont['Address']['ZipCode'];
                }
                $contact[] = [
                    'type' => $cont['ContactType'],
                    'data' => $data
                ];
                foreach ($cpf_rdata['Contacts Data']['People'][0]['Emails'] as $email) {
                    $emails[$email] = $email;
                }

            }
            $cpf_data = [
                'name'      => $cpf_rdata['Basic Data']['People'][0]['Name'],
                'birthDate' => $cpf_rdata['Basic Data']['People'][0]['Birthdate'],
                'gender'    => $cpf_rdata['Basic Data']['People'][0]['Gender'],
                'contacts'  => $contact,
                'emails'    => $emails
            ];
        }
        return $cpf_data;
    }

    /**
     * @param string $dados
     * @return ConsultaCpf
     */
    public function setDados($dados)
    {
        $this->dados = base64_decode($dados);
        return $this;
    }

    /**
     * @return DateTimeUnit
     */
    public function getDataConsulta()
    {
        return $this->dataConsulta;
    }

    /**
     * @param DateTimeUnit $dataConsulta
     * @return ConsultaCpf
     */
    public function setDataConsulta($dataConsulta)
    {
        $this->dataConsulta = $dataConsulta;
        return $this;
    }

    /**
     * @return float
     */
    public function getTempoConsulta()
    {
        return $this->tempoConsulta;
    }

    /**
     * @param float $tempoConsulta
     * @return ConsultaCpf
     */
    public function setTempoConsulta($tempoConsulta)
    {
        $this->tempoConsulta = $tempoConsulta;
        return $this;
    }

    /**
     * @return string
     */
    public function getDadosEncript()
    {
        return base64_encode($this->dados);
    }

    function getArrayResults()
    {
        $dados = json_decode($this->dados);
        return json_decode($dados->OperationResult, true);
    }

}