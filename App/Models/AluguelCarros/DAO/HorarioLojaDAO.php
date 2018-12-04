<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\HorarioLoja;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class HorarioLojaDAO extends Repository
{
    protected $table = "loc_lojas_horarios";
    protected $primary_key = 'lojhora_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new HorarioLoja($facade);
            $obj->setId($dados->lojhora_id)
                ->setLoja($dados->lojhora_loja)
                ->setHoraIni($dados->lojhora_inicio)
                ->setHoraFim($dados->lojhora_fim)
                ->setDom(($dados->lojhora_dom == 1) ? true : false)
                ->setSeg(($dados->lojhora_seg == 1) ? true : false)
                ->setTer(($dados->lojhora_ter == 1) ? true : false)
                ->setQua(($dados->lojhora_qua == 1) ? true : false)
                ->setQui(($dados->lojhora_qui == 1) ? true : false)
                ->setSex(($dados->lojhora_sex == 1) ? true : false)
                ->setSab(($dados->lojhora_sab == 1) ? true : false);
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
            if (isset($options['lojhora_id'])) {
                $builder->where('lojhora_id', $options['lojhora_id']);
            }
            if (isset($options['lojhora_loja'])) {
                $builder->where('lojhora_loja', $options['lojhora_loja']);
            }
            if (isset($options['lojhora_inicio'])) {
                $builder->greater('lojhora_inicio', $options['lojhora_inicio']);
            }
            if (isset($options['lojhora_fim'])) {
                $builder->lower('lojhora_fim', $options['lojhora_fim']);
            }
            if (isset($options['lojhora_dom'])) {
                $builder->where('lojhora_dom', $options['lojhora_dom']);
            }
            if (isset($options['lojhora_seg'])) {
                $builder->where('lojhora_seg', $options['lojhora_seg']);
            }
            if (isset($options['lojhora_ter'])) {
                $builder->where('lojhora_ter', $options['lojhora_ter']);
            }
            if (isset($options['lojhora_qua'])) {
                $builder->where('lojhora_qua', $options['lojhora_qua']);
            }
            if (isset($options['lojhora_qui'])) {
                $builder->where('lojhora_qui', $options['lojhora_qui']);
            }
            if (isset($options['lojhora_sex'])) {
                $builder->where('lojhora_sex', $options['lojhora_sex']);
            }
            if (isset($options['lojhora_sab'])) {
                $builder->where('lojhora_sab', $options['lojhora_sab']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('lojhora_id', $options['id']);
        }
        if (isset($options['inId'])) {
            $builder->where_in('lojhora_id', $options['inId']);
        }
        if (isset($options['loja'])) {
            $builder->where('lojhora_loja', $options['loja']);
        }
        if (isset($options['inLoja'])) {
            $builder->where_in('lojhora_loja', $options['inLoja']);
        }
        if (isset($options['horaini'])) {
            $builder->greater('lojhora_inicio', $options['horaini']);
        }
        if (isset($options['horafim'])) {
            $builder->lower('lojhora_fim', $options['horafim']);
        }
        if (isset($options['domingo'])) {
            $builder->where('lojhora_dom', $options['domingo']);
        }
        if (isset($options['segunda'])) {
            $builder->where('lojhora_seg', $options['segunda']);
        }
        if (isset($options['terca'])) {
            $builder->where('lojhora_ter', $options['terca']);
        }
        if (isset($options['quarta'])) {
            $builder->where('lojhora_qua', $options['quarta']);
        }
        if (isset($options['quinta'])) {
            $builder->where('lojhora_qui', $options['quinta']);
        }
        if (isset($options['sexta'])) {
            $builder->where('lojhora_sex', $options['sexta']);
        }
        if (isset($options['sabado'])) {
            $builder->where('lojhora_sab', $options['sabado']);
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
        if (isset($options['loja'])) {
            $postData['lojhora_loja'] = $options['loja'];
        } else {
            $postData['lojhora_loja'] = null;
        }

        if (isset($options['horaini'])) {
            $postData['lojhora_inicio'] = $options['horaini'];
        } else {
            $postData['lojhora_inicio'] = null;
        }

        if (isset($options['horafim'])) {
            $postData['lojhora_fim'] = $options['horafim'];
        } else {
            $postData['lojhora_fim'] = null;
        }

        if (isset($options['domingo'])) {
            $postData['lojhora_dom'] = $options['domingo'];
        } else {
            $postData['lojhora_dom'] = null;
        }

        if (isset($options['segunda'])) {
            $postData['lojhora_seg'] = $options['segunda'];
        } else {
            $postData['lojhora_seg'] = null;
        }

        if (isset($options['terca'])) {
            $postData['lojhora_ter'] = $options['terca'];
        } else {
            $postData['lojhora_ter'] = null;
        }

        if (isset($options['quarta'])) {
            $postData['lojhora_qua'] = $options['quarta'];
        } else {
            $postData['lojhora_qua'] = null;
        }

        if (isset($options['quinta'])) {
            $postData['lojhora_qui'] = $options['quinta'];
        } else {
            $postData['lojhora_qui'] = null;
        }

        if (isset($options['sexta'])) {
            $postData['lojhora_sex'] = $options['sexta'];
        } else {
            $postData['lojhora_sex'] = null;
        }

        if (isset($options['sabado'])) {
            $postData['lojhora_sab'] = $options['sabado'];
        } else {
            $postData['lojhora_sab'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['loja'])) {
            $builder->set('lojhora_loja', $options['loja']);
        }
        if (isset($options['horaini'])) {
            $builder->set('lojhora_inicio', $options['horaini']);
        }
        if (isset($options['horafim'])) {
            $builder->set('lojhora_fim', $options['horafim']);
        }
        if (isset($options['domingo'])) {
            $builder->set('lojhora_dom', $options['domingo']);
        }
        if (isset($options['segunda'])) {
            $builder->set('lojhora_seg', $options['segunda']);
        }
        if (isset($options['terca'])) {
            $builder->set('lojhora_ter', $options['terca']);
        }
        if (isset($options['quarta'])) {
            $builder->set('lojhora_qua', $options['quarta']);
        }
        if (isset($options['quinta'])) {
            $builder->set('lojhora_qui', $options['quinta']);
        }
        if (isset($options['sexta'])) {
            $builder->set('lojhora_sex', $options['sexta']);
        }
        if (isset($options['sabado'])) {
            $builder->set('lojhora_sab', $options['sabado']);
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
     * @param HorarioLoja $obj
     * @param AluguelCarrosFacade $facade
     * @return HorarioLoja
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'loja' => (is_object($obj->getLoja())) ? $obj->getLoja()->getId() : null,
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
     * @param HorarioLoja $obj
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