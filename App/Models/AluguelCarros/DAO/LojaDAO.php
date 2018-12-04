<?php

namespace Carroaluguel\Models\AluguelCarros\DAO;

use Carroaluguel\Models\AluguelCarros\Loja;
use Carroaluguel\Models\AluguelCarrosFacade;
use Carroaluguel\Models\Localidade\Endereco;
use Core\QueryBuilder;
use Core\Repository;

class LojaDAO extends Repository
{
    protected $table = "loc_lojas";
    protected $primary_key = 'id_loja';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Loja($facade);
            $obj->setId($dados->id_locadora)
                ->setMinDiarias($dados->min_diarias)
                ->setLojVendaLivre(($dados->loj_venda_livre == 1) ? true : false)
                ->setLojVendaLivreDelay($dados->loj_venda_livre_delay)
                ->setNome($dados->nome)
                ->setNomeSize($dados->nome_size)
                ->setCidade($dados->cidade)
                ->setIata($dados->iata_loja);
            $endereco = new Endereco();
            $endereco->setRua($dados->endereco)
                ->setBairro($dados->bairro)
                ->setCep($dados->cep)
                ->setCidade($dados->id_cidade)
                ->setLatitude($dados->lat_geocode)
                ->setLongitude($dados->long_geocode);
            $obj->setEndereco($endereco)
                ->setPais($dados->country_id)
                ->setFone($dados->telefone)
                ->setFax($dados->fax)
                ->setTollFree($dados->tollfree)
                ->setPlantao($dados->plantao_lojas)
                ->setEmail($dados->email)
                ->setEmail2($dados->email2)
                ->setEmail3($dados->email3)
                ->setAeroporto(($dados->sigla == 1) ? true : false)
                ->setAtendAero($dados->atend_aero)
                ->setAeroPortoId($dados->loj_aeroporto)
                ->setAtivo(($dados->ativo == 1) ? true : false)
                ->setValorExtra($dados->valor_extra)
                ->setWebservice(($dados->loja_xml == 1) ? true : false)
                ->setTextoLivre($dados->texto_livre_lojas)
                ->setLocadora($dados->id_locadoras)
                ->setObs($dados->obs_lojas)
                ->setLinkName($dados->link_name)
                ->setTextoH1($dados->textoh1)
                ->setMetaTitle($dados->meta_title)
                ->setMetaDescription($dados->meta_description)
                ->setMetaKeywords($dados->meta_keywords)
                ->setTarifaExclusiva(true);
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
            if (isset($options['id_loja'])) {
                $builder->where('id_loja', $options['id_loja']);
            }

            if (isset($options['id_locadoras'])) {
                $builder->where('id_locadoras', $options['id_locadoras']);
            }

            if (isset($options['loc_lojas.cidade'])) {
                $builder->like('loc_lojas.cidade', $options['loc_lojas.cidade']);
            }

            if (isset($options['loc_lojas.estado'])) {
                $builder->like('loc_lojas.estado', $options['loc_lojas.estado']);
            }

            if (isset($options['loc_lojas.ativo'])) {
                $builder->where('loc_lojas.ativo', $options['loc_lojas.ativo']);
            }

            if (isset($options['fornecedor'])) {
                $builder->where('fornecedor', $options['fornecedor']);
            }

            if (isset($options['regional'])) {
                $builder->where('regional', $options['regional']);
            }

            if (isset($options['data_atualizacao'])) {
                $builder->where('data_atualizacao', $options['data_atualizacao']);
            }
        }
        if (isset($options['cidades_disponiveis'])) {
            $builder->select(array('DISTINCT loc_lojas.cidade as cidade_id'));
        }

        if (isset($options['cidades_ativas'])) {
            $builder->select('DISTINCT loc_lojas.id_cidade as ativa_cidades');
            $builder->select('cidade.*');
            $builder->tableJoin('cidade', 'cidade.id_cidade = loc_lojas.id_cidade', 'LEFT');
            $builder->tableJoin('loc_locadoras', 'loc_locadoras.id_locadora = loc_lojas.id_locadoras', 'LEFT');
            $builder->where('loc_lojas.ativo', 1);
            $builder->where('loc_locadoras.ativo', 1);
            if (isset($options['estado_cidade'])) {
                $builder->where('cidade.estado_cidade', $options['estado_cidade']);
            }
            if (isset($options['linkname_cidade'])) {
                $builder->where('cidade.linkname_cidade', $options['linkname_cidade']);
            } else if(isset($options['cidade_url'])){
                $builder->where('cidade.cidade_url', $options['cidade_url']);
            }
            if (isset($options['cidade_nome_url'])) {
                $builder->like('cidade.nome_cidade', $options['cidade_nome_url']);
            }
        }

        if (isset($options['locadoraslojas_ativas'])) {
            $builder->tableJoin('loc_locadoras', 'loc_locadoras.id_locadora = loc_lojas.id_locadoras', 'LEFT');
            $builder->where('loc_lojas.ativo', 1);
            $builder->where('loc_locadoras.ativo', 1);
            if (isset($options['id_cidade'])) {
                $builder->where('loc_lojas.id_cidade', $options['id_cidade']);
            }
        }

        if (isset($options['aero_nome'])) {
            $builder->tableJoin('aeroporto', 'aeroporto.aero_id = loc_lojas.loj_aeroporto', 'LEFT');
            $builder->like('aeroporto.aero_nome', $options['aero_nome']);
            $builder->tableJoin('loc_locadoras', 'loc_locadoras.id_locadora = loc_lojas.id_locadoras', 'LEFT');
            $builder->where('loc_lojas.ativo', 1);
            $builder->where('loc_locadoras.ativo', 1);
        }

        if (isset($options['loja_ativa'])) {
            $builder->tableJoin('loc_locadoras', 'loc_locadoras.id_locadora = loc_lojas.id_locadoras', 'LEFT');
            $builder->where('loc_lojas.ativo', 1);
            $builder->where('loc_locadoras.ativo', 1);
        }

        if (isset($options['cidade_autocomplete'])) {
            $builder->tableJoin('cidade', 'cidade.id_cidade = loc_lojas.id_cidade', 'LEFT');

            $builder->like('cidade.nome_cidade', $options['cidade_autocomplete']);
        }
        if (isset($options['joinCidade'])) {
            $builder->tableJoin('cidade', 'cidade.id_cidade = loc_lojas.id_cidade', 'LEFT');
        }

        if (isset($options['cidade_horario'])) {
            $builder->tableJoin('loc_lojas_horarios', 'loc_lojas.id_loja = loc_lojas_horarios.lojhora_loja', 'LEFT');
            if (isset($options['lojhora_dom']) && $options['lojhora_dom'] == true) {
                $builder->where('loc_lojas_horarios.lojhora_dom', 1);
            }
            if (isset($options['lojhora_seg']) && $options['lojhora_seg'] == true) {
                $builder->where('loc_lojas_horarios.lojhora_seg', 1);
            }
            if (isset($options['lojhora_ter']) && $options['lojhora_ter'] == true) {
                $builder->where('loc_lojas_horarios.lojhora_ter', 1);
            }
            if (isset($options['lojhora_qua']) && $options['lojhora_qua'] == true) {
                $builder->where('loc_lojas_horarios.lojhora_qua', 1);
            }
            if (isset($options['lojhora_qui']) && $options['lojhora_qui'] == true) {
                $builder->where('loc_lojas_horarios.lojhora_qui', 1);
            }
            if (isset($options['lojhora_sex']) && $options['lojhora_sex'] == true) {
                $builder->where('loc_lojas_horarios.lojhora_sex', 1);
            }
            if (isset($options['lojhora_sab']) && $options['lojhora_sab'] == true) {
                $builder->where('loc_lojas_horarios.lojhora_sab', 1);
            }
            if (isset($options['lojhora_inicio'])) {
                $builder->greater('loc_lojas_horarios.lojhora_inicio', "'" . $options['lojhora_inicio'] . "'");
            }
            if (isset($options['lojhora_fim'])) {
                $builder->lower('loc_lojas_horarios.lojhora_fim', "'" . $options['lojhora_fim'] . "'");
            }
        }

        if (isset($options['id'])) {
            $builder->where('id_loja', $options['id']);
        }

        if (isset($options['inId'])) {
            $builder->where_in('id_loja', $options['inId']);
        }

        if (isset($options['inIdCidade'])) {
            $builder->where_in('loc_lojas.id_cidade', $options['inIdCidade']);
        }

        if (isset($options['idCidade'])) {
            $builder->where_in('loc_lojas.id_cidade', $options['idCidade']);
        }

        if (isset($options['locadora'])) {
            $builder->where('id_locadoras', $options['locadora']);
        }

        if (isset($options['inLocadora'])) {
            $builder->where_in('id_locadoras', $options['inLocadora']);
        }

        if (isset($options['nome'])) {
            $builder->where('nome', $options['nome']);
        }

        if (isset($options['nome_fontsize'])) {
            $builder->where('nome_size', $options['nome_fontsize']);
        }

        if (isset($options['aeroporto'])) {
            $builder->where('sigla', $options['aeroporto']);
        }

        if (isset($options['aeroporto_id'])) {
            $builder->where('loj_aeroporto', $options['aeroporto_id']);
        }

        if (isset($options['bairro_aero'])) {
            $builder->where('sigla', $options['bairro_aero']);
        }

        if (isset($options['endereco'])) {
            $builder->where('endereco', $options['endereco']);
        }

        if (isset($options['endereco_google'])) {
            $builder->where('endereco_google', $options['endereco_google']);
        }

        if (isset($options['bairro'])) {
            $builder->like('loc_lojas.bairro', $options['bairro']);
        }

        if (isset($options['loc_lojas.bairro'])) {
            $builder->like('loc_lojas.bairro', $options['loc_lojas.bairro']);
        }

        if (isset($options['iata'])) {
            $builder->where('iata_loja', $options['iata']);
        }

        if (isset($options['cidade'])) {
            $builder->where('loc_lojas.cidade', $options['cidade']);
        }

        if (isset($options['cidade_like'])) {
            $builder->like('loc_lojas.cidade', $options['cidade_like']);
        }

        if (isset($options['inCidade'])) {
            $builder->where_in('cidade', $options['inCidade']);
        }

        if (isset($options['webservice'])) {
            $builder->where('loja_xml', $options['webservice']);
        }

        if (isset($options['estado'])) {
            $builder->where('estado', $options['estado']);
        }

        if (isset($options['cep'])) {
            $builder->where('cep', $options['cep']);
        }

        if (isset($options['telefone'])) {
            $builder->where('telefone', $options['telefone']);
        }

        if (isset($options['fax'])) {
            $builder->where('fax', $options['fax']);
        }

        if (isset($options['tollfree'])) {
            $builder->where('tollfree', $options['tollfree']);
        }

        if (isset($options['plantao'])) {
            $builder->where('plantao_lojas', $options['plantao']);
        }

        if (isset($options['email'])) {
            $builder->where('email', $options['email']);
        }

        if (isset($options['hora_ini'])) {
            $builder->greater('hora_ini', "'" . $options['hora_ini'] . "'");
        }

        if (isset($options['hora_fim'])) {
            $builder->lower('hora_fim', "'" . $options['hora_fim'] . "'");
        }

        if (isset($options['hora_ini_sab'])) {
            $builder->greater('hora_ini_sab', "'" . $options['hora_ini_sab'] . "'");
        }

        if (isset($options['hora_fim_sab'])) {
            $builder->lower('hora_fim_sab', "'" . $options['hora_fim_sab'] . "'");
        }

        if (isset($options['hora_ini_dom'])) {
            $builder->greater('hora_ini_dom', "'" . $options['hora_ini_dom'] . "'");
        }

        if (isset($options['hora_fim_dom'])) {
            $builder->lower('hora_fim_dom', "'" . $options['hora_fim_dom'] . "'");
        }

        if (isset($options['dom'])) {
            $builder->where('dom', $options['dom']);
        }

        if (isset($options['seg'])) {
            $builder->where('seg', $options['seg']);
        }

        if (isset($options['ter'])) {
            $builder->where('ter', $options['ter']);
        }

        if (isset($options['qua'])) {
            $builder->where('qua', $options['qua']);
        }

        if (isset($options['qui'])) {
            $builder->where('qui', $options['qui']);
        }

        if (isset($options['sex'])) {
            $builder->where('sex', $options['sex']);
        }

        if (isset($options['sab'])) {
            $builder->where('sab', $options['sab']);
        }

        if (isset($options['grupos'])) {
            $builder->where('grupos', $options['grupos']);
        }

        if (isset($options['valor_extra'])) {
            $builder->where('valor_extra', $options['valor_extra']);
        }

        if (isset($options['ativo'])) {
            $builder->where('loc_lojas.ativo', $options['ativo']);
        }

        if (isset($options['loj_venda_livre'])) {
            $builder->where('loj_venda_livre', $options['loj_venda_livre']);
        }

        if (isset($options['loj_venda_livre_delay'])) {
            $builder->where('loj_venda_livre_delay', $options['loj_venda_livre_delay']);
        }

        if (isset($options['obs_lojas'])) {
            $builder->where('obs_lojas', $options['obs_lojas']);
        }

        if (isset($options['link_name'])) {
            $builder->where('link_name', $options['link_name']);
        }

        if (isset($options['meta_title'])) {
            $builder->where('meta_title', $options['meta_title']);
        }

        if (isset($options['meta_description'])) {
            $builder->where('meta_description', $options['meta_description']);
        }

        if (isset($options['meta_keywords'])) {
            $builder->where('meta_keywords', $options['meta_keywords']);
        }

        if (isset($options['pais'])) {
            $builder->where('country_id', $options['pais']);
        }

        if (isset($options['lat_geocode'])) {
            $builder->where('lat_geocode', $options['lat_geocode']);
        }

        if (isset($options['long_geocode'])) {
            $builder->where('long_geocode', $options['long_geocode']);
        }

        if (isset($options['show_map_lojas'])) {
            $builder->where('show_map_lojas', $options['show_map_lojas']);
        }

        if (isset($options['texto_livre_lojas'])) {
            $builder->where('texto_livre_lojas', $options['texto_livre_lojas']);
        }

        if (isset($options['tarifa_exclusiva'])) {
            $builder->where('tarifa_exclusiva', $options['tarifa_exclusiva']);
        }

        if (isset($options['min_diarias'])) {
            $builder->greater('min_diarias', "'" . $options['min_diarias'] . "'");
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
            $postData['id_locadoras'] = $options['locadora'];
        } else {
            $postData['id_locadoras'] = null;
        }

        if (isset($options['min_diarias'])) {
            $postData['min_diarias'] = $options['min_diarias'];
        } else {
            $postData['min_diarias'] = null;
        }

        if (isset($options['venda_livre'])) {
            $postData['loj_venda_livre'] = $options['venda_livre'];
        } else {
            $postData['loj_venda_livre'] = null;
        }

        if (isset($options['venda_livre_delay'])) {
            $postData['loj_venda_livre_delay'] = $options['venda_livre_delay'];
        } else {
            $postData['loj_venda_livre_delay'] = null;
        }

        if (isset($options['nome'])) {
            $postData['nome'] = $options['nome'];
        } else {
            $postData['nome'] = null;
        }

        if (isset($options['loj_aeroporto'])) {
            $postData['loj_aeroporto'] = $options['loj_aeroporto'];
        } else {
            $postData['loj_aeroporto'] = null;
        }

        if (isset($options['nome_fontsize'])) {
            $postData['nome_size'] = $options['nome_fontsize'];
        } else {
            $postData['nome_size'] = null;
        }

        if (isset($options['aeroporto'])) {
            $postData['sigla'] = $options['aeroporto'];
        } else {
            $postData['sigla'] = null;
        }

        if (isset($options['endereco'])) {
            $postData['endereco'] = $options['endereco'];
        } else {
            $postData['endereco'] = null;
        }

        if (isset($options['endereco_google'])) {
            $postData['endereco_google'] = $options['endereco_google'];
        } else {
            $postData['endereco_google'] = null;
        }

        if (isset($options['bairro'])) {
            $postData['bairro'] = $options['bairro'];
        } else {
            $postData['bairro'] = null;
        }

        if (isset($options['iata'])) {
            $postData['iata_loja'] = $options['iata'];
        } else {
            $postData['iata_loja'] = null;
        }

        if (isset($options['cidade'])) {
            $postData['cidade'] = $options['cidade'];
        } else {
            $postData['cidade'] = null;
        }

        if (isset($options['id_cidade'])) {
            $postData['id_cidade'] = $options['id_cidade'];
        } else {
            $postData['id_cidade'] = null;
        }

        if (isset($options['webservice'])) {
            $postData['loja_xml'] = $options['webservice'];
        } else {
            $postData['loja_xml'] = null;
        }

        if (isset($options['estado'])) {
            $postData['estado'] = $options['estado'];
        } else {
            $postData['estado'] = null;
        }

        if (isset($options['uf_id'])) {
            $postData['uf_id'] = $options['uf_id'];
        } else {
            $postData['uf_id'] = null;
        }

        if (isset($options['cep'])) {
            $postData['cep'] = $options['cep'];
        } else {
            $postData['cep'] = null;
        }

        if (isset($options['telefone'])) {
            $postData['telefone'] = $options['telefone'];
        } else {
            $postData['telefone'] = null;
        }

        if (isset($options['fax'])) {
            $postData['fax'] = $options['fax'];
        } else {
            $postData['fax'] = null;
        }

        if (isset($options['tollfree'])) {
            $postData['tollfree'] = $options['tollfree'];
        } else {
            $postData['tollfree'] = null;
        }

        if (isset($options['plantao'])) {
            $postData['plantao_lojas'] = $options['plantao'];
        } else {
            $postData['plantao_lojas'] = null;
        }

        if (isset($options['admin_celular'])) {
            $postData['admin_celular'] = $options['admin_celular'];
        } else {
            $postData['admin_celular'] = null;
        }

        if (isset($options['admin_email'])) {
            $postData['admin_email'] = $options['admin_email'];
        } else {
            $postData['admin_email'] = null;
        }

        if (isset($options['email'])) {
            $postData['email'] = $options['email'];
        } else {
            $postData['email'] = null;
        }

        if (isset($options['email2'])) {
            $postData['email2'] = $options['email2'];
        } else {
            $postData['email2'] = null;
        }

        if (isset($options['email3'])) {
            $postData['email3'] = $options['email3'];
        } else {
            $postData['email3'] = null;
        }

        if (isset($options['hora_ini'])) {
            $postData['hora_ini'] = $options['hora_ini'];
        } else {
            $postData['hora_ini'] = null;
        }

        if (isset($options['hora_fim'])) {
            $postData['hora_fim'] = $options['hora_fim'];
        } else {
            $postData['hora_fim'] = null;
        }

        if (isset($options['hora_ini_sab'])) {
            $postData['hora_ini_sab'] = $options['hora_ini_sab'];
        } else {
            $postData['hora_ini_sab'] = null;
        }

        if (isset($options['hora_fim_sab'])) {
            $postData['hora_fim_sab'] = $options['hora_fim_sab'];
        } else {
            $postData['hora_fim_sab'] = null;
        }

        if (isset($options['hora_ini_dom'])) {
            $postData['hora_ini_dom'] = $options['hora_ini_dom'];
        } else {
            $postData['hora_ini_dom'] = null;
        }

        if (isset($options['hora_fim_dom'])) {
            $postData['hora_fim_dom'] = $options['hora_fim_dom'];
        } else {
            $postData['hora_fim_dom'] = null;
        }

        if (isset($options['dom'])) {
            $postData['dom'] = $options['dom'];
        } else {
            $postData['dom'] = null;
        }

        if (isset($options['seg'])) {
            $postData['seg'] = $options['seg'];
        } else {
            $postData['seg'] = null;
        }

        if (isset($options['ter'])) {
            $postData['ter'] = $options['ter'];
        } else {
            $postData['ter'] = null;
        }

        if (isset($options['qua'])) {
            $postData['qua'] = $options['qua'];
        } else {
            $postData['qua'] = null;
        }

        if (isset($options['qui'])) {
            $postData['qui'] = $options['qui'];
        } else {
            $postData['qui'] = null;
        }

        if (isset($options['sex'])) {
            $postData['sex'] = $options['sex'];
        } else {
            $postData['sex'] = null;
        }

        if (isset($options['sab'])) {
            $postData['sab'] = $options['sab'];
        } else {
            $postData['sab'] = null;
        }

        if (isset($options['grupos'])) {
            $postData['grupos'] = $options['grupos'];
        } else {
            $postData['grupos'] = null;
        }

        if (isset($options['valor_extra'])) {
            $postData['valor_extra'] = $options['valor_extra'];
        } else {
            $postData['valor_extra'] = null;
        }

        if (isset($options['ativo'])) {
            $postData['ativo'] = $options['ativo'];
        } else {
            $postData['ativo'] = '0';
        }

        if (isset($options['obs_lojas'])) {
            $postData['obs_lojas'] = $options['obs_lojas'];
        } else {
            $postData['obs_lojas'] = null;
        }

        if (isset($options['link_name'])) {
            $postData['link_name'] = $options['link_name'];
        } else {
            $postData['link_name'] = null;
        }

        if (isset($options['meta_title'])) {
            $postData['meta_title'] = $options['meta_title'];
        } else {
            $postData['meta_title'] = null;
        }

        if (isset($options['meta_description'])) {
            $postData['meta_description'] = $options['meta_description'];
        } else {
            $postData['meta_description'] = null;
        }

        if (isset($options['meta_keywords'])) {
            $postData['meta_keywords'] = $options['meta_keywords'];
        } else {
            $postData['meta_keywords'] = null;
        }

        if (isset($options['lat_geocode'])) {
            $postData['lat_geocode'] = $options['lat_geocode'];
        } else {
            $postData['lat_geocode'] = null;
        }

        if (isset($options['long_geocode'])) {
            $postData['long_geocode'] = $options['long_geocode'];
        } else {
            $postData['long_geocode'] = null;
        }

        if (isset($options['show_map_lojas'])) {
            $postData['show_map_lojas'] = $options['show_map_lojas'];
        } else {
            $postData['show_map_lojas'] = '0';
        }

        if (isset($options['texto_livre_lojas'])) {
            $postData['texto_livre_lojas'] = $options['texto_livre_lojas'];
        } else {
            $postData['texto_livre_lojas'] = null;
        }

        if (isset($options['tarifa_exclusiva'])) {
            $postData['tarifa_exclusiva'] = $options['tarifa_exclusiva'];
        } else {
            $postData['tarifa_exclusiva'] = null;
        }

        if (isset($options['textoh1'])) {
            $postData['textoh1'] = $options['textoh1'];
        } else {
            $postData['textoh1'] = null;
        }

        if (isset($options['textoh2'])) {
            $postData['textoh2'] = $options['textoh2'];
        } else {
            $postData['textoh2'] = null;
        }

        if (isset($options['nomeh2'])) {
            $postData['nomeh2'] = $options['nomeh2'];
        } else {
            $postData['nomeh2'] = null;
        }

        if (isset($options['textoh1size'])) {
            $postData['textoh1size'] = $options['textoh1size'];
        } else {
            $postData['textoh1size'] = null;
        }

        if (isset($options['img_texto_livre'])) {
            $postData['img_texto_livre'] = $options['img_texto_livre'];
        } else {
            $postData['img_texto_livre'] = null;
        }

        if (isset($options['img_legenda_texto_livre'])) {
            $postData['img_legenda_texto_livre'] = $options['img_legenda_texto_livre'];
        } else {
            $postData['img_legenda_texto_livre'] = null;
        }

        if (isset($options['img_alt_texto_livre'])) {
            $postData['img_alt_texto_livre'] = $options['img_alt_texto_livre'];
        } else {
            $postData['img_alt_texto_livre'] = null;
        }

        if (isset($options['img_align_texto_livre'])) {
            $postData['img_align_texto_livre'] = $options['img_align_texto_livre'];
        } else {
            $postData['img_align_texto_livre'] = null;
        }

        if (isset($options['data_atualizacao'])) {
            $postData['data_atualizacao'] = $options['data_atualizacao'];
        } else {
            $postData['data_atualizacao'] = date('Y-m-d H:i:s');
        }

        if (isset($options['fornecedor'])) {
            $postData['fornecedor'] = $options['fornecedor'];
        } else {
            $postData['fornecedor'] = null;
        }

        if (isset($options['regional'])) {
            $postData['regional'] = $options['regional'];
        } else {
            $postData['regional'] = null;
        }

        if (isset($options['id_loja_parent'])) {
            $postData['id_loja_parent'] = $options['id_loja_parent'];
        } else {
            $postData['id_loja_parent'] = null;
        }

        if (isset($options['parcela_min'])) {
            $postData['loja_parcela_min'] = $options['parcela_min'];
        } else {
            $postData['loja_parcela_min'] = null;
        }

        if (isset($options['num_parcelas'])) {
            $postData['loja_num_parcelas'] = $options['num_parcelas'];
        } else {
            $postData['loja_num_parcelas'] = null;
        }

        if (isset($options['cartao_visa'])) {
            $postData['loja_cartao_visa'] = $options['cartao_visa'];
        } else {
            $postData['loja_cartao_visa'] = null;
        }

        if (isset($options['cartao_master'])) {
            $postData['loja_cartao_master'] = $options['cartao_master'];
        } else {
            $postData['loja_cartao_master'] = null;
        }

        if (isset($options['cartao_american'])) {
            $postData['loja_cartao_american'] = $options['cartao_american'];
        } else {
            $postData['loja_cartao_american'] = null;
        }

        if (isset($options['cartao_hipercard'])) {
            $postData['loja_cartao_hipercard'] = $options['cartao_hipercard'];
        } else {
            $postData['loja_cartao_hipercard'] = null;
        }

        if (isset($options['cartao_dinners'])) {
            $postData['loja_cartao_dinners'] = $options['cartao_dinners'];
        } else {
            $postData['loja_cartao_dinners'] = null;
        }

        if (isset($options['cartao_elo'])) {
            $postData['loja_cartao_elo'] = $options['cartao_elo'];
        } else {
            $postData['loja_cartao_elo'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['locadora'])) {
            $builder->set('id_locadoras', $options['locadora']);
        }

        if (isset($options['min_diarias'])) {
            $builder->set('min_diarias', $options['min_diarias']);
        }

        if (isset($options['venda_livre'])) {
            $builder->set('loj_venda_livre', $options['venda_livre']);
        }

        if (isset($options['venda_livre_delay'])) {
            $builder->set('loj_venda_livre_delay', $options['venda_livre_delay']);
        }

        if (isset($options['nome'])) {
            $builder->set('nome', $options['nome']);
        }

        if (isset($options['loj_aeroporto'])) {
            $builder->set('loj_aeroporto', $options['loj_aeroporto']);
        }

        if (isset($options['nome_fontsize'])) {
            $builder->set('nome_size', $options['nome_fontsize']);
        }

        if (isset($options['aeroporto'])) {
            $builder->set('sigla', $options['aeroporto']);
        }

        if (isset($options['endereco'])) {
            $builder->set('endereco', $options['endereco']);
        }

        if (isset($options['endereco_google'])) {
            $builder->set('endereco_google', $options['endereco_google']);
        }

        if (isset($options['bairro'])) {
            $builder->set('bairro', $options['bairro']);
        }

        if (isset($options['iata'])) {
            $builder->set('iata_loja', $options['iata']);
        }

        if (isset($options['cidade'])) {
            $builder->set('cidade', $options['cidade']);
        }

        if (isset($options['id_cidade'])) {
            $builder->set('id_cidade', $options['id_cidade']);
        }

        if (isset($options['webservice'])) {
            $builder->set('loja_xml', $options['webservice']);
        }

        if (isset($options['estado'])) {
            $builder->set('estado', $options['estado']);
        }

        if (isset($options['uf_id'])) {
            $builder->set('uf_id', $options['uf_id']);
        }

        if (isset($options['cep'])) {
            $builder->set('cep', $options['cep']);
        }

        if (isset($options['telefone'])) {
            $builder->set('telefone', $options['telefone']);
        }

        if (isset($options['fax'])) {
            $builder->set('fax', $options['fax']);
        }

        if (isset($options['tollfree'])) {
            $builder->set('tollfree', $options['tollfree']);
        }

        if (isset($options['plantao'])) {
            $builder->set('plantao_lojas', $options['plantao']);
        }

        if (isset($options['admin_celular'])) {
            $builder->set('admin_celular', $options['admin_celular']);
        }

        if (isset($options['admin_email'])) {
            $builder->set('admin_email', $options['admin_email']);
        }

        if (isset($options['email'])) {
            $builder->set('email', $options['email']);
        }

        if (isset($options['email2'])) {
            $builder->set('email2', $options['email2']);
        }

        if (isset($options['email3'])) {
            $builder->set('email3', $options['email3']);
        }

        if (isset($options['hora_ini'])) {
            $builder->set('hora_ini', $options['hora_ini']);
        }

        if (isset($options['hora_fim'])) {
            $builder->set('hora_fim', $options['hora_fim']);
        }

        if (isset($options['hora_ini_sab'])) {
            $builder->set('hora_ini_sab', $options['hora_ini_sab']);
        }

        if (isset($options['hora_fim_sab'])) {
            $builder->set('hora_fim_sab', $options['hora_fim_sab']);
        }

        if (isset($options['hora_ini_dom'])) {
            $builder->set('hora_ini_dom', $options['hora_ini_dom']);
        }

        if (isset($options['hora_fim_dom'])) {
            $builder->set('hora_fim_dom', $options['hora_fim_dom']);
        }

        if (isset($options['dom'])) {
            $builder->set('dom', $options['dom']);
        }

        if (isset($options['seg'])) {
            $builder->set('seg', $options['seg']);
        }

        if (isset($options['ter'])) {
            $builder->set('ter', $options['ter']);
        }

        if (isset($options['qua'])) {
            $builder->set('qua', $options['qua']);
        }

        if (isset($options['qui'])) {
            $builder->set('qui', $options['qui']);
        }

        if (isset($options['sex'])) {
            $builder->set('sex', $options['sex']);
        }

        if (isset($options['sab'])) {
            $builder->set('sab', $options['sab']);
        }

        if (isset($options['grupos'])) {
            $builder->set('grupos', $options['grupos']);
        }

        if (isset($options['valor_extra'])) {
            $builder->set('valor_extra', $options['valor_extra']);
        }

        if (isset($options['ativo'])) {
            $builder->set('ativo', $options['ativo']);
        }

        if (isset($options['obs_lojas'])) {
            $builder->set('obs_lojas', $options['obs_lojas']);
        }

        if (isset($options['link_name'])) {
            $builder->set('link_name', $options['link_name']);
        }

        if (isset($options['meta_title'])) {
            $builder->set('meta_title', $options['meta_title']);
        }

        if (isset($options['meta_description'])) {
            $builder->set('meta_description', $options['meta_description']);
        }

        if (isset($options['meta_keywords'])) {
            $builder->set('meta_keywords', $options['meta_keywords']);
        }

        if (isset($options['lat_geocode'])) {
            $builder->set('lat_geocode', $options['lat_geocode']);
        }

        if (isset($options['long_geocode'])) {
            $builder->set('long_geocode', $options['long_geocode']);
        }

        if (isset($options['show_map_lojas'])) {
            $builder->set('show_map_lojas', $options['show_map_lojas']);
        }

        if (isset($options['texto_livre_lojas'])) {
            $builder->set('texto_livre_lojas', $options['texto_livre_lojas']);
        }

        if (isset($options['tarifa_exclusiva'])) {
            $builder->set('tarifa_exclusiva', $options['tarifa_exclusiva']);
        }

        if (isset($options['textoh1'])) {
            $builder->set('textoh1', $options['textoh1']);
        }

        if (isset($options['textoh2'])) {
            $builder->set('textoh2', $options['textoh2']);
        }

        if (isset($options['nomeh2'])) {
            $builder->set('nomeh2', $options['nomeh2']);
        }

        if (isset($options['textoh1size'])) {
            $builder->set('textoh1size', $options['textoh1size']);
        }

        if (isset($options['img_texto_livre'])) {
            $builder->set('img_texto_livre', $options['img_texto_livre']);
        }

        if (isset($options['img_legenda_texto_livre'])) {
            $builder->set('img_legenda_texto_livre', $options['img_legenda_texto_livre']);
        }

        if (isset($options['img_alt_texto_livre'])) {
            $builder->set('img_alt_texto_livre', $options['img_alt_texto_livre']);
        }

        if (isset($options['img_align_texto_livre'])) {
            $builder->set('img_align_texto_livre', $options['img_align_texto_livre']);
        }

        if (isset($options['data_atualizacao'])) {
            $builder->set('data_atualizacao', $options['data_atualizacao']);
        }

        if (isset($options['operador_atualizacao'])) {
            $builder->set('operador_atualizacao', $options['operador_atualizacao']);
        }

        if (isset($options['nome_operador_atualizacao'])) {
            $builder->set('nome_operador_atualizacao', $options['nome_operador_atualizacao']);
        }

        if (isset($options['fornecedor'])) {
            $builder->set('fornecedor', $options['fornecedor']);
        }

        if (isset($options['regional'])) {
            $builder->set('regional', $options['regional']);
        }

        if (isset($options['id_loja_parent'])) {
            $builder->set('id_loja_parent', $options['id_loja_parent']);
        }

        if (isset($options['parcela_min'])) {
            $builder->set('loja_parcela_min', $options['parcela_min']);
        }

        if (isset($options['num_parcelas'])) {
            $builder->set('loja_num_parcelas', $options['num_parcelas']);
        }

        if (isset($options['cartao_visa'])) {
            $builder->set('loja_cartao_visa', $options['cartao_visa']);
        }

        if (isset($options['cartao_master'])) {
            $builder->set('loja_cartao_master', $options['cartao_master']);
        }

        if (isset($options['cartao_american'])) {
            $builder->set('loja_cartao_american', $options['cartao_american']);
        }

        if (isset($options['cartao_hipercard'])) {
            $builder->set('loja_cartao_hipercard', $options['cartao_hipercard']);
        }

        if (isset($options['cartao_dinners'])) {
            $builder->set('loja_cartao_dinners', $options['cartao_dinners']);
        }

        if (isset($options['cartao_elo'])) {
            $builder->set('loja_cartao_elo', $options['cartao_elo']);
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
     * @param Loja $obj
     * @param AluguelCarrosFacade $facade
     * @return Loja
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $loja = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $loja = $this->insert($this->queryBuilderInsert($options));
        }
        return $loja;
    }

    /**
     * @param Loja $obj
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