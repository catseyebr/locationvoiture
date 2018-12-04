<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\HorarioAtendimento;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class HorarioAtendimentoDAO extends Repository
{
    protected $table = "loc_atendimento_horarios";
    protected $primary_key = 'atendhora_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new HorarioAtendimento($facade);
            $obj->setId($dados->atendhora_id)
                ->setLocadora($dados->atendhora_locadora)
                ->setLoja($dados->atendhora_loja)
                ->setHoraIni($dados->atendhora_inicio)
                ->setHoraFim($dados->atendhora_fim)
                ->setDom(($dados->atendhora_dom == 1) ? true : false)
                ->setSeg(($dados->atendhora_seg == 1) ? true : false)
                ->setTer(($dados->atendhora_ter == 1) ? true : false)
                ->setQua(($dados->atendhora_qua == 1) ? true : false)
                ->setQui(($dados->atendhora_qui == 1) ? true : false)
                ->setSex(($dados->atendhora_sex == 1) ? true : false)
                ->setSab(($dados->atendhora_sab == 1) ? true : false);
        }
        return $obj;
    }

    public function queryBuilder($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['count'])) {
            $builder->select('count(*)');
        }

        if (isset($options['admin'])) {
            if (isset($options['atendhora_id'])) {
                $builder->where('atendhora_id', $options['atendhora_id']);
            }
            if (isset($options['atendhora_locadora'])) {
                $builder->where('atendhora_locadora', $options['atendhora_locadora']);
            }
            if (isset($options['atendhora_loja'])) {
                $builder->where('atendhora_loja', $options['atendhora_loja']);
            }
            if (isset($options['atendhora_inicio'])) {
                $builder->greater('atendhora_inicio', $options['atendhora_inicio']);
            }
            if (isset($options['atendhora_fim'])) {
                $builder->lower('atendhora_fim', $options['atendhora_fim']);
            }
            if (isset($options['atendhora_dom'])) {
                $builder->where('atendhora_dom', $options['atendhora_dom']);
            }
            if (isset($options['atendhora_seg'])) {
                $builder->where('atendhora_seg', $options['atendhora_seg']);
            }
            if (isset($options['atendhora_ter'])) {
                $builder->where('atendhora_ter', $options['atendhora_ter']);
            }
            if (isset($options['atendhora_qua'])) {
                $builder->where('atendhora_qua', $options['atendhora_qua']);
            }
            if (isset($options['atendhora_qui'])) {
                $builder->where('atendhora_qui', $options['atendhora_qui']);
            }
            if (isset($options['atendhora_sex'])) {
                $builder->where('atendhora_sex', $options['atendhora_sex']);
            }
            if (isset($options['atendhora_sab'])) {
                $builder->where('atendhora_sab', $options['atendhora_sab']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('atendhora_id', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('atendhora_id', $options['inId']);
        }
        if (isset($options['locadora'])) {
            $builder->where('atendhora_locadora', $options['locadora']);
        }
        if (isset($options['inLocadora'])) {
            $builder->where_in('atendhora_locadora', $options['inLocadora']);
        }
        if (isset($options['lojas'])) {
            $builder->where('atendhora_lojas', $options['lojas']);
        }
        if (isset($options['horaini'])) {
            $builder->greater('atendhora_inicio', "'" . $options['horaini'] . "'");
        }
        if (isset($options['horafim'])) {
            $builder->lower('atendhora_fim', "'" . $options['horafim'] . "'");
        }
        if (isset($options['dom'])) {
            $builder->where('atendhora_dom', $options['domingo']);
        }
        if (isset($options['seg'])) {
            $builder->where('atendhora_seg', $options['segunda']);
        }
        if (isset($options['ter'])) {
            $builder->where('atendhora_ter', $options['terca']);
        }
        if (isset($options['qua'])) {
            $builder->where('atendhora_qua', $options['quarta']);
        }
        if (isset($options['qui'])) {
            $builder->where('atendhora_qui', $options['quinta']);
        }
        if (isset($options['sex'])) {
            $builder->where('atendhora_sex', $options['sexta']);
        }
        if (isset($options['sab'])) {
            $builder->where('atendhora_sab', $options['sabado']);
        }
        if (isset($options['limit']) && isset($options['offset'])) {
            $builder->limit($options['limit'], $options['offset']);
        } else {
            if (isset($options['limit'])) {
                $builder->limit($options['limit']);
            }
        }
        if (isset($options['sortBy']) && isset($options['sortDirection'])) {
            $builder->order_by($options['sortBy'], $options['sortDirection']);
        }

        $query = $builder->getQuery($this->table);

        return $query;
    }

    public function queryBuilderInsert($options)
    {
        $builder = new QueryBuilder();
        $postData = null;
        if (isset($options['locadora'])) {
            $postData['atendhora_locadora'] = $options['locadora'];
        } else {
            $postData['atendhora_locadora'] = null;
        }

        if (isset($options['lojas'])) {
            $postData['atendhora_loja'] = $options['lojas'];
        } else {
            $postData['atendhora_loja'] = null;
        }

        if (isset($options['horaini'])) {
            $postData['atendhora_inicio'] = $options['horaini'];
        } else {
            $postData['atendhora_inicio'] = null;
        }

        if (isset($options['horafim'])) {
            $postData['atendhora_fim'] = $options['horafim'];
        } else {
            $postData['atendhora_fim'] = null;
        }

        if (isset($options['domingo'])) {
            $postData['atendhora_dom'] = $options['domingo'];
        } else {
            $postData['atendhora_dom'] = null;
        }

        if (isset($options['segunda'])) {
            $postData['atendhora_seg'] = $options['segunda'];
        } else {
            $postData['atendhora_seg'] = null;
        }

        if (isset($options['terca'])) {
            $postData['atendhora_ter'] = $options['terca'];
        } else {
            $postData['atendhora_ter'] = null;
        }

        if (isset($options['quarta'])) {
            $postData['atendhora_qua'] = $options['quarta'];
        } else {
            $postData['atendhora_qua'] = null;
        }

        if (isset($options['quinta'])) {
            $postData['atendhora_qui'] = $options['quinta'];
        } else {
            $postData['atendhora_qui'] = null;
        }

        if (isset($options['sexta'])) {
            $postData['atendhora_sex'] = $options['sexta'];
        } else {
            $postData['atendhora_sex'] = null;
        }

        if (isset($options['sabado'])) {
            $postData['atendhora_sab'] = $options['sabado'];
        } else {
            $postData['atendhora_sab'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['locadora'])) {
            $builder->set('atendhora_locadora', $options['locadora']);
        }
        if (isset($options['lojas'])) {
            $builder->set('atendhora_loja', $options['lojas']);
        }
        if (isset($options['horaini'])) {
            $builder->set('atendhora_inicio', $options['horaini']);
        }
        if (isset($options['horafim'])) {
            $builder->set('atendhora_fim', $options['horafim']);
        }
        if (isset($options['domingo'])) {
            $builder->set('atendhora_dom', $options['domingo']);
        }
        if (isset($options['segunda'])) {
            $builder->set('atendhora_seg', $options['segunda']);
        }
        if (isset($options['terca'])) {
            $builder->set('atendhora_ter', $options['terca']);
        }
        if (isset($options['quarta'])) {
            $builder->set('atendhora_qua', $options['quarta']);
        }
        if (isset($options['quinta'])) {
            $builder->set('atendhora_qui', $options['quinta']);
        }
        if (isset($options['sexta'])) {
            $builder->set('atendhora_sex', $options['sexta']);
        }
        if (isset($options['sabado'])) {
            $builder->set('atendhora_sab', $options['sabado']);
        }

        $builder->where($this->primary_key, $options['id']);

        $query = $builder->getQueryUpdate($this->table);

        return $query;
    }

    public function queryBuilderDelete($options)
    {
        $builder = new QueryBuilder();
        $builder->where($this->primary_key, $options['id']);
        $query = $builder->getQueryDelete($this->table);
        return $query;
    }

    /**
     * @param HorarioAtendimento $obj
     * @param AluguelCarrosFacade $facade
     * @return HorarioAtendimento
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'locadora' => (is_object($obj->getLocadora())) ? $obj->getLocadora()->getId() : null,
            'lojas' => (is_array($obj->getLoja())) ? implode(',', $obj->getLoja()) : null,
            'horaini' => $obj->getHoraIni(),
            'horafim' => $obj->getHoraFim(),
            'domingo' => (($obj->getDom())) ? '1' : '0',
            'segunda' => (($obj->getSeg())) ? '1' : '0',
            'terca' => (($obj->getTer())) ? '1' : '0',
            'quarta' => (($obj->getQua())) ? '1' : '0',
            'quinta' => (($obj->getQui())) ? '1' : '0',
            'sexta' => (($obj->getSex())) ? '1' : '0',
            'sabado' => (($obj->getSab())) ? '1' : '0'
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $save = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $save = $this->insert($this->queryBuilderInsert($options));
        }
        return $save;
    }

    /**
     * @param HorarioAtendimento $obj
     * @param AluguelCarrosFacade $facade
     * @return bool
     */
    public function delete($obj, $facade = null)
    {
        $del = false;
        if ($obj->getId()) {
            $options = [
                'id' => $obj->getId()
            ];
            $del = $this->purge($this->queryBuilderDelete($options));
        }
        return $del;
    }
}