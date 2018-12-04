<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;

class HorarioAtendimento
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
     * @var string
     */
    private $loja;

    /**
     * @var string
     */
    private $horaIni;

    /**
     * @var string
     */
    private $horaFim;

    /**
     * @var bool
     */
    private $dom;

    /**
     * @var bool
     */
    private $seg;

    /**
     * @var bool
     */
    private $ter;

    /**
     * @var bool
     */
    private $qua;

    /**
     * @var bool
     */
    private $qui;

    /**
     * @var bool
     */
    private $sex;

    /**
     * @var bool
     */
    private $sab;

    /**
     * @var string
     */
    private $data_base;

    /**
     * @var AluguelCarrosFacade
     */
    private $aluguelcarros;

    public function __construct($facade = NULL)
    {
        if($facade){
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
     * @return HorarioAtendimento
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
        if(!is_object($this->locadora) && $this->locadora){
            $this->locadora = $this->aluguelcarros->showLocadora($this->locadora);
        }
        return $this->locadora;
    }

    /**
     * @param Locadora $locadora
     * @return HorarioAtendimento
     */
    public function setLocadora($locadora)
    {
        $this->locadora = $locadora;
        return $this;
    }

    /**
     * @return array
     */
    public function getLoja()
    {
        if(!is_array($this->loja) && $this->loja){
            $lojas = explode(',',$this->loja);
            $this->loja = $lojas;
        }
        return $this->loja;
    }

    /**
     * @param string $loja
     * @return HorarioAtendimento
     */
    public function setLoja($loja)
    {
        $this->loja = $loja;
        return $this;
    }

    /**
     * @return string
     */
    public function getHoraIni()
    {
        return $this->horaIni;
    }

    /**
     * @param string $horaIni
     * @return HorarioAtendimento
     */
    public function setHoraIni($horaIni)
    {
        $this->horaIni = $horaIni;
        return $this;
    }

    /**
     * @return string
     */
    public function getHoraFim()
    {
        return $this->horaFim;
    }

    /**
     * @param string $horaFim
     * @return HorarioAtendimento
     */
    public function setHoraFim($horaFim)
    {
        $this->horaFim = $horaFim;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDom()
    {
        return $this->dom;
    }

    /**
     * @param bool $dom
     * @return HorarioAtendimento
     */
    public function setDom($dom)
    {
        $this->dom = $dom;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSeg()
    {
        return $this->seg;
    }

    /**
     * @param bool $seg
     * @return HorarioAtendimento
     */
    public function setSeg($seg)
    {
        $this->seg = $seg;
        return $this;
    }

    /**
     * @return bool
     */
    public function getTer()
    {
        return $this->ter;
    }

    /**
     * @param bool $ter
     * @return HorarioAtendimento
     */
    public function setTer($ter)
    {
        $this->ter = $ter;
        return $this;
    }

    /**
     * @return bool
     */
    public function getQua()
    {
        return $this->qua;
    }

    /**
     * @param bool $qua
     * @return HorarioAtendimento
     */
    public function setQua($qua)
    {
        $this->qua = $qua;
        return $this;
    }

    /**
     * @return bool
     */
    public function getQui()
    {
        return $this->qui;
    }

    /**
     * @param bool $qui
     * @return HorarioAtendimento
     */
    public function setQui($qui)
    {
        $this->qui = $qui;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param bool $sex
     * @return HorarioAtendimento
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSab()
    {
        return $this->sab;
    }

    /**
     * @param bool $sab
     * @return HorarioAtendimento
     */
    public function setSab($sab)
    {
        $this->sab = $sab;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataBase()
    {
        return $this->data_base;
    }

    /**
     * @param string $data_base
     * @return HorarioAtendimento
     */
    public function setDataBase($data_base)
    {
        $this->data_base = $data_base;
        return $this;
    }


}