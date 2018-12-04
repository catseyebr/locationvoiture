<?php

namespace Carroaluguel\Models\Localidade\DAO;


use Carroaluguel\Models\Localidade\Cidade;
use Carroaluguel\Models\Localidade\Estado;
use Carroaluguel\Models\LocalidadeFacade;
use Core\QueryBuilder;
use Core\Repository;

class CidadeDAO extends Repository
{
    protected $table = "cidade";
    protected $primary_key = 'id_cidade';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Cidade($facade);
            $obj->setId($dados->id_cidade)
                ->setNome($dados->nome_cidade)
                ->setUrlCidade($dados->cidade_url);
            $estado = new Estado();
            $estado->setId($dados->id_estado)
                ->setNome($dados->nome_estado)
                ->setAbreviacao($dados->abr_estado)
                ->setPais($dados->pais_estado);
            $obj->setEstado($estado)
                ->setPrefixoNome($dados->prefixo_nome_cidade)
                ->setLinkName($dados->linkname_cidade)
                ->setTexto($dados->texto_carroaluguel);
        }
        return $obj;
    }

    public function queryBuilder($options)
    {
        $builder = new QueryBuilder();

        if (isset($options['count'])) {
            $builder->select('count(*)');
        }

        $builder->tableJoin('estado', 'estado.id_estado = cidade.estado_cidade', 'LEFT');
        if (isset($options['busca'])) {
            //$this->db->select(array('distinct cidade.nome_cidade as nome_cidade','cidade.*'));
            $builder->tableJoin('loc_lojas', 'loc_lojas.id_cidade = cidade.id_cidade', 'LEFT');
            $builder->like('cidade.nome_cidade', $options['busca']);
            if (isset($options['loja_ativa'])) {
                $builder->where('loc_lojas.ativo', '1');
            }
            if (isset($options['aeroporto']) && $options['aeroporto'] == 1) {
                $builder->where('loc_lojas.sigla', '1');
            } else {
                if (isset($options['aeroporto']) && $options['aeroporto'] == 2) {
                    $builder->where('loc_lojas.sigla', '0');
                }
            }
        }

        if (isset($options['bairro'])) {
            $builder->tableJoin('loc_lojas', 'loc_lojas.id_cidade = cidade.id_cidade', 'LEFT');
            $builder->like('loc_lojas.bairro', $options['bairro']);
            if (isset($options['loja_ativa'])) {
                $builder->where('loc_lojas.ativo', '1');
            }
            if (isset($options['aeroporto']) && $options['aeroporto'] == 1) {
                $builder->where('loc_lojas.sigla', '1');
            } else {
                if (isset($options['aeroporto']) && $options['aeroporto'] == 2) {
                    $builder->where('loc_lojas.sigla', '0');
                }
            }
        }

        if (isset($options['id'])) {
            $builder->where('id_cidade', $options['id']);
        }

        if (isset($options['inId'])) {
            $builder->where_in('id_cidade', $options['inId']);
        }

        if (isset($options['nome'])) {
            $builder->where('nome_cidade', $options['nome']);
        }

        if (isset($options['cidade_url'])) {
            $builder->where('cidade_url', $options['cidade_url']);
        }

        if (isset($options['estado'])) {
            $builder->where_in('estado_cidade', $options['estado']);
        }

        if (isset($options['estado_abr'])) {
            $builder->where('abr_estado', $options['estado_abr']);
        }

        if (isset($options['pais'])) {
            $builder->where('pais_estado', $options['pais']);
        }

        if (isset($options['linkname'])) {
            $builder->where('linkname_cidade', $options['linkname']);
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
        if (isset($options['nome'])) {
            $postData['nome_cidade'] = $options['nome'];
        } else {
            $postData['nome_cidade'] = null;
        }

        if (isset($options['url'])) {
            $postData['cidade_url'] = $options['url'];
        } else {
            $postData['cidade_url'] = null;
        }

        if (isset($options['linkname'])) {
            $postData['linkname_cidade'] = $options['linkname'];
        } else {
            $postData['linkname_cidade'] = null;
        }

        if (isset($options['estado'])) {
            $postData['estado_cidade'] = $options['estado'];
        } else {
            $postData['estado_cidade'] = null;
        }

        if (isset($options['prefixo'])) {
            $postData['prefixo_nome_cidade'] = $options['prefixo'];
        } else {
            $postData['prefixo_nome_cidade'] = null;
        }

        if (isset($options['textoh1'])) {
            $postData['textoh1_cidade'] = $options['textoh1'];
        } else {
            $postData['textoh1_cidade'] = null;
        }

        if (isset($options['meta_title'])) {
            $postData['meta_title_cidade'] = $options['meta_title'];
        } else {
            $postData['meta_title_cidade'] = null;
        }

        if (isset($options['meta_description'])) {
            $postData['meta_description_cidade'] = $options['meta_description'];
        } else {
            $postData['meta_description_cidade'] = null;
        }

        if (isset($options['meta_keywords'])) {
            $postData['meta_keywords_cidade'] = $options['meta_keywords'];
        } else {
            $postData['meta_keywords_cidade'] = null;
        }

        if (isset($options['texto_carroaluguel'])) {
            $postData['texto_carroaluguel'] = $options['texto_carroaluguel'];
        } else {
            $postData['texto_carroaluguel'] = null;
        }

        $postData['cidade_dtatualiza'] = date('Y-m-d H:i:s');

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set('nome_cidade', $options['nome']);
        }

        if (isset($options['cidade_url'])) {
            $builder->set('cidade_url', $options['cidade_url']);
        }

        if (isset($options['estado'])) {
            $builder->set('estado_cidade', $options['estado']);
        }

        if (isset($options['prefixo'])) {
            $builder->set('prefixo_nome_cidade', $options['prefixo']);
        }

        if (isset($options['linkname'])) {
            $builder->set('linkname_cidade', $options['linkname']);
        }

        if (isset($options['meta_title'])) {
            $builder->set('meta_title_cidade', $options['meta_title']);
        }

        if (isset($options['meta_description'])) {
            $builder->set('meta_description_cidade', $options['meta_description']);
        }

        if (isset($options['meta_keywords'])) {
            $builder->set('meta_keywords_cidade', $options['meta_keywords']);
        }

        if (isset($options['texto_carroaluguel'])) {
            $builder->set('texto_carroaluguel', $options['texto_carroaluguel']);
        }

        $builder->where("id_cidade", $options['id']);

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
     * @param Cidade $obj
     * @param LocalidadeFacade $facade
     * @return Cidade
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'nome' => $obj->getNome(),
            'cidade_url' => $obj->getUrlCidade(),
            'estado' => (is_object($obj->getEstado())) ? $obj->getEstado()->getId() : null,
            'prefixo' => $obj->getPrefixoNome(),
            'meta_title' => $obj->getMetaTitle(),
            'meta_description' => $obj->getMetaDescription(),
            'meta_keywords' => $obj->getMetaKeywords(),
            'texto_carroaluguel' => $obj->getTexto()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $cidade = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $cidade = $this->insert($this->queryBuilderInsert($options));
        }
        return $cidade;
    }

    /**
     * @param Cidade $obj
     * @param LocalidadeFacade $facade
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