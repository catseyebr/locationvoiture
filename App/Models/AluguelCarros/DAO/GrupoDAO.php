<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;


use Carroaluguel\Models\AluguelCarros\Grupo;
use Carroaluguel\Models\AluguelCarrosFacade;
use Core\QueryBuilder;
use Core\Repository;

class GrupoDAO extends Repository
{
    protected $table = "loc_grupos";
    protected $primary_key = 'id_grupo';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Grupo($facade);
            $obj->setId($dados->id_grupo)
                ->setCategoria($dados->id_categoria)
                ->setLocadora($dados->id_locadora)
                ->setCountry($dados->grp_country)
                ->setNome($dados->grupo)
                ->setWebservice($dados->webservice_in)
                ->setSipp($dados->sipp_code)
                ->setTipoRdcar($dados->tipo_rdcar)
                ->setOtaTipo($dados->ota_tipo)
                ->setOtaSize($dados->ota_size)
                ->setOtaPortas($dados->ota_portas)
                ->setFranquia($dados->franquia_grupos)
                ->setFranquiaTerceiros($dados->franquia_terceiros_grupos)
                ->setCaucao($dados->valor_caucao)
                ->setCaucaoReal($dados->valor_caucao_real)
                ->setCambioAuto($dados->cambio_auto)
                ->setDuasPortas($dados->duas_portas)
                ->setQuatroPortas($dados->quatro_portas)
                ->setDh(($dados->dh == 1) ? true : false)
                ->setAc(($dados->ac == 1) ? true : false)
                ->setTe(($dados->te == 1) ? true : false)
                ->setCd(($dados->cd == 1) ? true : false)
                ->setAirbag(($dados->airbag == 1) ? true : false)
                ->setFreioAbs(($dados->freio_abs == 1) ? true : false)
                ->setGps(($dados->gps == 1) ? true : false)
                ->setMotor($dados->motor)
                ->setOnlineDispo($dados->webservice_in)
                ->setInativo(($dados->grp_inativo == 1) ? true : false);
        }
        return $obj;
    }

    public function queryBuilder($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['count'])) {
            $builder->select('count(*)');
        } else {
            $builder->select('*');
            $builder->select('2p as duas_portas');
            $builder->select('4p as quatro_portas');
        }

        if (isset($options['categoria_join'])) {
            $builder->tableJoin('loc_categoria', 'loc_categoria.id_categoria = loc_grupos.id_categoria', 'LEFT');
        }
        if (isset($options['admin'])) {
            $options['mostra_todos'] = 1;
            $builder->tableJoin('loc_locadoras', 'loc_locadoras.id_locadora = loc_grupos.id_locadora', 'LEFT');
            if (isset($options['locadora_ativa'])) {
                $builder->where('ativo', $options['locadora_ativa']);
            }
            if (isset($options['id_grupo'])) {
                $builder->where('id_grupo', $options['id_grupo']);
            }
            if (isset($options['grupo'])) {
                $builder->like('grupo', $options['grupo']);
            }
            if (isset($options['id_categoria'])) {
                $builder->where('id_categoria', $options['id_categoria']);
            }
            if (isset($options['id_locadora'])) {
                $builder->where('loc_locadoras.id_locadora', $options['id_locadora']);
            }
            if (isset($options['busca_carro'])) {
                $builder->where_or("id_carro1=" . $options['busca_carro'] . " OR id_carro2=" . $options['busca_carro'] . " OR id_carro3=" . $options['busca_carro'] . " OR id_carro4=" . $options['busca_carro'] . " OR id_carro5=" . $options['busca_carro']);
            }
            if (isset($options['grp_inativo'])) {
                $builder->where('grp_inativo', $options['grp_inativo']);
            }
        }
        if (isset($options['id'])) {
            $builder->where('id_grupo', $options['id']);
        }
        if (isset($options['locadora'])) {
            $builder->where('id_locadora', $options['locadora']);
        }
        if (isset($options['inLocadora'])) {
            $builder->where_in('id_locadora', $options['inLocadora']);
        }
        if (isset($options['country'])) {
            $builder->where('grp_country', $options['country']);
        }
        if (isset($options['categoria'])) {
            $builder->where('id_categoria', $options['categoria']);
        }
        if (isset($options['inCategoria'])) {
            $builder->where_in('id_categoria', $options['inCategoria']);
        }
        if (isset($options['nome'])) {
            $builder->where('grupo', $options['nome']);
        }
        if (isset($options['inNome'])) {
            $builder->where_in('grupo', $options['inNome']);
        }
        if (isset($options['webservice'])) {
            $builder->where('webservice_in', $options['webservice']);
        }
        if (isset($options['sipp'])) {
            $builder->where('sipp_code', $options['sipp']);
        }
        if (isset($options['tipo_rdcar'])) {
            $builder->where('tipo_rdcar', $options['tipo_rdcar']);
        }
        if (isset($options['ota_tipo'])) {
            $builder->where('ota_tipo', $options['ota_tipo']);
        }
        if (isset($options['ota_size'])) {
            $builder->where('ota_size', $options['ota_size']);
        }
        if (isset($options['ota_portas'])) {
            $builder->where('ota_portas', $options['ota_portas']);
        }
        if (isset($options['categoria_desc'])) {
            $builder->where('categoria', $options['categoria_desc']);
        }
        if (isset($options['id_carro1'])) {
            $builder->where('id_carro1', $options['id_carro1']);
        }
        if (isset($options['motor_carro1'])) {
            $builder->where('motor_carro1', $options['motor_carro1']);
        }
        if (isset($options['passageiros_carro1'])) {
            $builder->where('passageiros_carro1', $options['passageiros_carro1']);
        }
        if (isset($options['cambio_carro1'])) {
            $builder->where('cambio_carro1', $options['cambio_carro1']);
        }
        if (isset($options['id_carro2'])) {
            $builder->where('id_carro2', $options['id_carro2']);
        }
        if (isset($options['motor_carro2'])) {
            $builder->where('motor_carro2', $options['motor_carro2']);
        }
        if (isset($options['passageiros_carro2'])) {
            $builder->where('passageiros_carro2', $options['passageiros_carro2']);
        }
        if (isset($options['cambio_carro2'])) {
            $builder->where('cambio_carro2', $options['cambio_carro2']);
        }
        if (isset($options['id_carro3'])) {
            $builder->where('id_carro3', $options['id_carro3']);
        }
        if (isset($options['motor_carro3'])) {
            $builder->where('motor_carro3', $options['motor_carro3']);
        }
        if (isset($options['passageiros_carro3'])) {
            $builder->where('passageiros_carro3', $options['passageiros_carro3']);
        }
        if (isset($options['cambio_carro3'])) {
            $builder->where('cambio_carro3', $options['cambio_carro3']);
        }
        if (isset($options['id_carro4'])) {
            $builder->where('id_carro4', $options['id_carro4']);
        }
        if (isset($options['motor_carro4'])) {
            $builder->where('motor_carro4', $options['motor_carro4']);
        }
        if (isset($options['passageiros_carro4'])) {
            $builder->where('passageiros_carro4', $options['passageiros_carro4']);
        }
        if (isset($options['cambio_carro4'])) {
            $builder->where('cambio_carro4', $options['cambio_carro4']);
        }
        if (isset($options['id_carro5'])) {
            $builder->where('id_carro5', $options['id_carro5']);
        }
        if (isset($options['motor_carro5'])) {
            $builder->where('motor_carro5', $options['motor_carro5']);
        }
        if (isset($options['passageiros_carro5'])) {
            $builder->where('passageiros_carro5', $options['passageiros_carro5']);
        }
        if (isset($options['cambio_carro5'])) {
            $builder->where('cambio_carro5', $options['cambio_carro5']);
        }
        if (isset($options['cambio_auto'])) {
            $builder->where('cambio_auto', $options['cambio_auto']);
        }
        if (isset($options['duas_portas'])) {
            $builder->where('2p', $options['duas_portas']);
        }
        if (isset($options['quatro_portas'])) {
            $builder->where('4p', $options['quatro_portas']);
        }
        if (isset($options['dh'])) {
            $builder->where('dh', $options['dh']);
        }
        if (isset($options['ac'])) {
            $builder->where('ac', $options['ac']);
        }
        if (isset($options['te'])) {
            $builder->where('te', $options['te']);
        }
        if (isset($options['cd'])) {
            $builder->where('cd', $options['cd']);
        }
        if (isset($options['airbag'])) {
            $builder->where('airbag', $options['airbag']);
        }
        if (isset($options['freio_abs'])) {
            $builder->where('freio_abs', $options['freio_abs']);
        }
        if (isset($options['gps'])) {
            $builder->where('gps', $options['gps']);
        }
        if (isset($options['caucao'])) {
            $builder->where('valor_caucao', $options['caucao']);
        }
        if (isset($options['franquia'])) {
            $builder->where('franquia_grupos', $options['franquia']);
        }
        if (isset($options['franquia_terceiros'])) {
            $builder->where('franquia_terceiros_grupos', $options['franquia_terceiros']);
        }
        if (isset($options['mostra_todos']) && $options['mostra_todos']) {
            $builder->where_in('grp_inativo', '0,1');
        } else {
            $builder->where_not('grp_inativo', 1);
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
            $postData['id_locadora'] = $options['locadora'];
        } else {
            $postData['id_locadora'] = null;
        }
        if (isset($options['country'])) {
            $postData['grp_country'] = $options['country'];
        } else {
            $postData['grp_country'] = "BR";
        }
        if (isset($options['categoria'])) {
            $postData['id_categoria'] = $options['categoria'];
        } else {
            $postData['id_categoria'] = null;
        }
        if (isset($options['nome'])) {
            $postData['grupo'] = $options['nome'];
        } else {
            $postData['grupo'] = null;
        }
        if (isset($options['webservice'])) {
            $postData['webservice_in'] = $options['webservice'];
        } else {
            $postData['webservice_in'] = null;
        }
        if (isset($options['sipp'])) {
            $postData['sipp_code'] = $options['sipp'];
        } else {
            $postData['sipp_code'] = null;
        }
        if (isset($options['tipo_rdcar'])) {
            $postData['tipo_rdcar'] = $options['tipo_rdcar'];
        } else {
            $postData['tipo_rdcar'] = null;
        }
        if (isset($options['ota_tipo'])) {
            $postData['ota_tipo'] = $options['ota_tipo'];
        } else {
            $postData['ota_tipo'] = null;
        }
        if (isset($options['ota_size'])) {
            $postData['ota_size'] = $options['ota_size'];
        } else {
            $postData['ota_size'] = null;
        }
        if (isset($options['ota_portas'])) {
            $postData['ota_portas'] = $options['ota_portas'];
        } else {
            $postData['ota_portas'] = null;
        }
        if (isset($options['categoria_desc'])) {
            $postData['categoria'] = $options['categoria_desc'];
        } else {
            $postData['categoria'] = null;
        }
        if (isset($options['id_carro1'])) {
            $postData['id_carro1'] = $options['id_carro1'];
        } else {
            $postData['id_carro1'] = null;
        }
        if (isset($options['motor_carro1'])) {
            $postData['motor_carro1'] = $options['motor_carro1'];
        } else {
            $postData['motor_carro1'] = null;
        }
        if (isset($options['passageiros_carro1'])) {
            $postData['passageiros_carro1'] = $options['passageiros_carro1'];
        } else {
            $postData['passageiros_carro1'] = null;
        }
        if (isset($options['cambio_carro1'])) {
            $postData['cambio_carro1'] = $options['cambio_carro1'];
        } else {
            $postData['cambio_carro1'] = null;
        }
        if (isset($options['id_carro2'])) {
            $postData['id_carro2'] = $options['id_carro2'];
        } else {
            $postData['id_carro2'] = null;
        }
        if (isset($options['motor_carro2'])) {
            $postData['motor_carro2'] = $options['motor_carro2'];
        } else {
            $postData['motor_carro2'] = null;
        }
        if (isset($options['passageiros_carro2'])) {
            $postData['passageiros_carro2'] = $options['passageiros_carro2'];
        } else {
            $postData['passageiros_carro2'] = null;
        }
        if (isset($options['cambio_carro2'])) {
            $postData['cambio_carro2'] = $options['cambio_carro2'];
        } else {
            $postData['cambio_carro2'] = null;
        }
        if (isset($options['id_carro3'])) {
            $postData['id_carro3'] = $options['id_carro3'];
        } else {
            $postData['id_carro3'] = null;
        }
        if (isset($options['motor_carro3'])) {
            $postData['motor_carro3'] = $options['motor_carro3'];
        } else {
            $postData['motor_carro3'] = null;
        }
        if (isset($options['passageiros_carro3'])) {
            $postData['passageiros_carro3'] = $options['passageiros_carro3'];
        } else {
            $postData['passageiros_carro3'] = null;
        }
        if (isset($options['cambio_carro3'])) {
            $postData['cambio_carro3'] = $options['cambio_carro3'];
        } else {
            $postData['cambio_carro3'] = null;
        }
        if (isset($options['id_carro4'])) {
            $postData['id_carro4'] = $options['id_carro4'];
        } else {
            $postData['id_carro4'] = null;
        }
        if (isset($options['motor_carro4'])) {
            $postData['motor_carro4'] = $options['motor_carro4'];
        } else {
            $postData['motor_carro4'] = null;
        }
        if (isset($options['passageiros_carro4'])) {
            $postData['passageiros_carro4'] = $options['passageiros_carro4'];
        } else {
            $postData['passageiros_carro4'] = null;
        }
        if (isset($options['cambio_carro4'])) {
            $postData['cambio_carro4'] = $options['cambio_carro4'];
        } else {
            $postData['cambio_carro4'] = null;
        }
        if (isset($options['id_carro5'])) {
            $postData['id_carro5'] = $options['id_carro5'];
        } else {
            $postData['id_carro5'] = null;
        }
        if (isset($options['motor_carro5'])) {
            $postData['motor_carro5'] = $options['motor_carro5'];
        } else {
            $postData['motor_carro5'] = null;
        }
        if (isset($options['passageiros_carro5'])) {
            $postData['passageiros_carro5'] = $options['passageiros_carro5'];
        } else {
            $postData['passageiros_carro5'] = null;
        }
        if (isset($options['cambio_carro5'])) {
            $postData['cambio_carro5'] = $options['cambio_carro5'];
        } else {
            $postData['cambio_carro5'] = null;
        }
        if (isset($options['cambio_auto'])) {
            $postData['cambio_auto'] = $options['cambio_auto'];
        } else {
            $postData['cambio_auto'] = null;
        }
        if (isset($options['duas_portas'])) {
            $postData['2p'] = $options['duas_portas'];
        } else {
            $postData['2p'] = null;
        }
        if (isset($options['quatro_portas'])) {
            $postData['4p'] = $options['quatro_portas'];
        } else {
            $postData['4p'] = null;
        }
        if (isset($options['dh'])) {
            $postData['dh'] = $options['dh'];
        } else {
            $postData['dh'] = null;
        }
        if (isset($options['ac'])) {
            $postData['ac'] = $options['ac'];
        } else {
            $postData['ac'] = null;
        }
        if (isset($options['te'])) {
            $postData['te'] = $options['te'];
        } else {
            $postData['te'] = null;
        }
        if (isset($options['cd'])) {
            $postData['cd'] = $options['cd'];
        } else {
            $postData['cd'] = null;
        }
        if (isset($options['airbag'])) {
            $postData['airbag'] = $options['airbag'];
        } else {
            $postData['airbag'] = null;
        }
        if (isset($options['freio_abs'])) {
            $postData['freio_abs'] = $options['freio_abs'];
        } else {
            $postData['freio_abs'] = null;
        }
        if (isset($options['gps'])) {
            $postData['gps'] = $options['gps'];
        } else {
            $postData['gps'] = null;
        }
        if (isset($options['motor'])) {
            $postData['motor'] = $options['motor'];
        } else {
            $postData['motor'] = null;
        }
        if (isset($options['caucao'])) {
            $postData['valor_caucao'] = $options['caucao'];
        } else {
            $postData['valor_caucao'] = null;
        }
        if (isset($options['valor_caucao_real'])) {
            $postData['valor_caucao_real'] = $options['valor_caucao_real'];
        } else {
            $postData['valor_caucao_real'] = null;
        }
        if (isset($options['franquia'])) {
            $postData['franquia_grupos'] = $options['franquia'];
        } else {
            $postData['franquia_grupos'] = null;
        }
        if (isset($options['franquia_terceiros'])) {
            $postData['franquia_terceiros_grupos'] = $options['franquia_terceiros'];
        } else {
            $postData['franquia_terceiros_grupos'] = null;
        }
        if (isset($options['nome_size'])) {
            $postData['nome_size'] = $options['nome_size'];
        } else {
            $postData['nome_size'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['locadora'])) {
            $builder->set('id_locadora', $options['locadora']);
        }
        if (isset($options['country'])) {
            $builder->set('grp_country', $options['country']);
        }
        if (isset($options['categoria'])) {
            $builder->set('id_categoria', $options['categoria']);
        }
        if (isset($options['nome'])) {
            $builder->set('grupo', $options['nome']);
        }
        if (isset($options['webservice'])) {
            $builder->set('webservice_in', $options['webservice']);
        }
        if (isset($options['sipp'])) {
            $builder->set('sipp_code', $options['sipp']);
        }
        if (isset($options['tipo_rdcar'])) {
            $builder->set('tipo_rdcar', $options['tipo_rdcar']);
        }
        if (isset($options['ota_tipo'])) {
            $builder->set('ota_tipo', $options['ota_tipo']);
        }
        if (isset($options['ota_size'])) {
            $builder->set('ota_size', $options['ota_size']);
        }
        if (isset($options['ota_portas'])) {
            $builder->set('ota_portas', $options['ota_portas']);
        }
        if (isset($options['categoria_desc'])) {
            $builder->set('categoria', $options['categoria_desc']);
        }
        if (isset($options['id_carro1'])) {
            $builder->set('id_carro1', $options['id_carro1']);
        }
        if (isset($options['motor_carro1'])) {
            $builder->set('motor_carro1', $options['motor_carro1']);
        }
        if (isset($options['passageiros_carro1'])) {
            $builder->set('passageiros_carro1', $options['passageiros_carro1']);
        }
        if (isset($options['cambio_carro1'])) {
            $builder->set('cambio_carro1', $options['cambio_carro1']);
        }
        if (isset($options['id_carro2'])) {
            $builder->set('id_carro2', $options['id_carro2']);
        }
        if (isset($options['motor_carro2'])) {
            $builder->set('motor_carro2', $options['motor_carro2']);
        }
        if (isset($options['passageiros_carro2'])) {
            $builder->set('passageiros_carro2', $options['passageiros_carro2']);
        }
        if (isset($options['cambio_carro2'])) {
            $builder->set('cambio_carro2', $options['cambio_carro2']);
        }
        if (isset($options['id_carro3'])) {
            $builder->set('id_carro3', $options['id_carro3']);
        }
        if (isset($options['motor_carro3'])) {
            $builder->set('motor_carro3', $options['motor_carro3']);
        }
        if (isset($options['passageiros_carro3'])) {
            $builder->set('passageiros_carro3', $options['passageiros_carro3']);
        }
        if (isset($options['cambio_carro3'])) {
            $builder->set('cambio_carro3', $options['cambio_carro3']);
        }
        if (isset($options['id_carro4'])) {
            $builder->set('id_carro4', $options['id_carro4']);
        }
        if (isset($options['motor_carro4'])) {
            $builder->set('motor_carro4', $options['motor_carro4']);
        }
        if (isset($options['passageiros_carro4'])) {
            $builder->set('passageiros_carro4', $options['passageiros_carro4']);
        }
        if (isset($options['cambio_carro4'])) {
            $builder->set('cambio_carro4', $options['cambio_carro4']);
        }
        if (isset($options['id_carro5'])) {
            $builder->set('id_carro5', $options['id_carro5']);
        }
        if (isset($options['motor_carro5'])) {
            $builder->set('motor_carro5', $options['motor_carro5']);
        }
        if (isset($options['passageiros_carro5'])) {
            $builder->set('passageiros_carro5', $options['passageiros_carro5']);
        }
        if (isset($options['cambio_carro5'])) {
            $builder->set('cambio_carro5', $options['cambio_carro5']);
        }
        if (isset($options['cambio_auto'])) {
            $builder->set('cambio_auto', $options['cambio_auto']);
        }
        if (isset($options['duas_portas'])) {
            $builder->set('2p', $options['duas_portas']);
        }
        if (isset($options['quatro_portas'])) {
            $builder->set('4p', $options['quatro_portas']);
        }
        if (isset($options['dh'])) {
            $builder->set('dh', $options['dh']);
        }
        if (isset($options['ac'])) {
            $builder->set('ac', $options['ac']);
        }
        if (isset($options['te'])) {
            $builder->set('te', $options['te']);
        }
        if (isset($options['cd'])) {
            $builder->set('cd', $options['cd']);
        }
        if (isset($options['airbag'])) {
            $builder->set('airbag', $options['airbag']);
        }
        if (isset($options['freio_abs'])) {
            $builder->set('freio_abs', $options['freio_abs']);
        }
        if (isset($options['gps'])) {
            $builder->set('gps', $options['gps']);
        }
        if (isset($options['motor'])) {
            $builder->set('motor', $options['motor']);
        }
        if (isset($options['caucao'])) {
            $builder->set('valor_caucao', $options['caucao']);
        }
        if (isset($options['valor_caucao_real'])) {
            $builder->set('valor_caucao_real', $options['valor_caucao_real']);
        }
        if (isset($options['franquia'])) {
            $builder->set('franquia_grupos', $options['franquia']);
        }
        if (isset($options['franquia_terceiros'])) {
            $builder->set('franquia_terceiros_grupos', $options['franquia_terceiros']);
        }
        if (isset($options['nome_size'])) {
            $builder->set('nome_size', $options['nome_size']);
        }
        if (isset($options['inativo'])) {
            $builder->set('grp_inativo', $options['inativo']);
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
     * @param Grupo $obj
     * @param AluguelCarrosFacade $facade
     * @return Grupo
     */
    public function save($obj, $facade = null)
    {
        $carros = $obj->getCarrosSave();
        $options = [
            'locadora' => $obj->getLocadoraId(),
            'country' => $obj->getCountry(),
            'categoria' => $obj->getCategoriaId(),
            'nome' => $obj->getNome(),
            'webservice' => ($obj->getWebservice()) ? '1' : '0',
            'sipp' => $obj->getSipp(),
            'tipo_rdcar' => $obj->getTipoRdcar(),
            'ota_tipo' => $obj->getOtaTipo(),
            'ota_size' => $obj->getOtaSize(),
            'ota_portas' => $obj->getOtaPortas(),
            'categoria_desc' => $obj->getCategoria()->getNome(),
            'id_carro1' => (isset($carros[1])) ? $carros[1]['id'] : null,
            'motor_carro1' => (isset($carros[1])) ? $carros[1]['motor'] : null,
            'passageiros_carro1' => (isset($carros[1])) ? $carros[1]['passageiros'] : null,
            'cambio_carro1' => (isset($carros[1]) && $carros[1]['cambio'] == 'Automatico') ? '1' : '0',
            'id_carro2' => (isset($carros[2])) ? $carros[2]['id'] : null,
            'motor_carro2' => (isset($carros[2])) ? $carros[2]['motor'] : null,
            'passageiros_carro2' => (isset($carros[2])) ? $carros[2]['passageiros'] : null,
            'cambio_carro2' => (isset($carros[2]) && $carros[2]['cambio'] == 'Automatico') ? '1' : '0',
            'id_carro3' => (isset($carros[3])) ? $carros[3]['id'] : null,
            'motor_carro3' => (isset($carros[3])) ? $carros[3]['motor'] : null,
            'passageiros_carro3' => (isset($carros[3])) ? $carros[3]['passageiros'] : null,
            'cambio_carro3' => (isset($carros[3]) && $carros[3]['cambio'] == 'Automatico') ? '1' : '0',
            'id_carro4' => (isset($carros[4])) ? $carros[4]['id'] : null,
            'motor_carro4' => (isset($carros[4])) ? $carros[4]['motor'] : null,
            'passageiros_carro4' => (isset($carros[4])) ? $carros[4]['passageiros'] : null,
            'cambio_carro4' => (isset($carros[4]) && $carros[4]['cambio'] == 'Automatico') ? '1' : '0',
            'id_carro5' => (isset($carros[5])) ? $carros[5]['id'] : null,
            'motor_carro5' => (isset($carros[5])) ? $carros[5]['motor'] : null,
            'passageiros_carro5' => (isset($carros[5])) ? $carros[5]['passageiros'] : null,
            'cambio_carro5' => (isset($carros[5]) && $carros[5]['cambio'] == 'Automatico') ? '1' : '0',
            'cambio_auto' => ($obj->getCambioAuto() == 'Automatic') ? '1' : '0',
            'duas_portas' => ($obj->getDuasPortas()) ? '1' : '0',
            'quatro_portas' => ($obj->getQuatroPortas()) ? '1' : '0',
            'dh' => ($obj->getDh()) ? '1' : '0',
            'ac' => ($obj->getAc()) ? '1' : '0',
            'te' => ($obj->getTe()) ? '1' : '0',
            'cd' => ($obj->getCd()) ? '1' : '0',
            'airbag' => ($obj->getAirbag()) ? '1' : '0',
            'freio_abs' => ($obj->getFreioAbs()) ? '1' : '0',
            'gps' => ($obj->getGps()) ? '1' : '0',
            'motor' => $obj->getMotor(),
            'caucao' => $obj->getCaucao(),
            'valor_caucao_real' => $obj->getCaucaoReal(),
            'franquia' => $obj->getFranquia(),
            'franquia_terceiros' => $obj->getFranquiaTerceiros(),
            'nome_size' => null,
            'inativo' => ($obj->getInativo()) ? '1' : '0',
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $categoria = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $categoria = $this->insert($this->queryBuilderInsert($options));
        }
        return $categoria;
    }

    /**
     * @param Grupo $obj
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