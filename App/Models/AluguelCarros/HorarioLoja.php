<?php

namespace Carroaluguel\Models\AluguelCarros;


use Carroaluguel\Models\AluguelCarrosFacade;

class HorarioLoja
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Loja
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
     * @return HorarioLoja
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Loja
     */
    public function getLoja()
    {
        if(!is_object($this->loja) && $this->loja){
            $this->loja = $this->aluguelcarros->showLoja($this->loja);
        }
        return $this->loja;
    }

    /**
     * @param Loja $loja
     * @return HorarioLoja
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
     * @return HorarioLoja
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
     * @return HorarioLoja
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
     * @return HorarioLoja
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
     * @return HorarioLoja
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
     * @return HorarioLoja
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
     * @return HorarioLoja
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
     * @return HorarioLoja
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
     * @return HorarioLoja
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
     * @return HorarioLoja
     */
    public function setSab($sab)
    {
        $this->sab = $sab;
        return $this;
    }

    /**
     * @return AluguelCarrosFacade
     */
    public function getAluguelcarros()
    {
        return $this->aluguelcarros;
    }

    /**
     * @param AluguelCarrosFacade $aluguelcarros
     * @return HorarioLoja
     */
    public function setAluguelcarros($aluguelcarros)
    {
        $this->aluguelcarros = $aluguelcarros;
        return $this;
    }


}