<?php


namespace Carroaluguel\Models\Localidade\DAO;


use Carroaluguel\Models\Localidade\Aeroporto;
use Carroaluguel\Models\Localidade\Endereco;
use Carroaluguel\Models\LocalidadeFacade;
use Core\QueryBuilder;
use Core\Repository;

class AeroportoDAO extends Repository
{
    protected $table = "aeroporto";
    protected $primary_key = 'aero_id';

    public function hidrate($dados, $facade = null)
    {
        $obj = null;
        if (is_object($dados)) {
            $obj = new Aeroporto($facade);
            $obj->setId($dados->aero_id)
                ->setSigla($dados->aero_sigla)
                ->setNome($dados->aero_nome)
                ->setCidade($dados->aero_cidade)
                ->setDescricao($dados->aero_descricao)
                ->setFacilidade($dados->aero_facilidade)
                ->setFone($dados->aero_fone)
                ->setFax($dados->aero_fax)
                ->setPabx($dados->aero_pabx)
                ->setCep($dados->aero_cep)
                ->setLatitude($dados->aero_latitude)
                ->setLongitude($dados->aero_longitude);
            $endereco = new Endereco();
            $endereco->setRua($dados->aero_endereco)
                ->setCep($dados->aero_cep)
                ->setCidade($dados->aero_cidade)
                ->setLatitude($dados->aero_latitude)
                ->setLongitude($dados->aero_longitude);
            $obj->setEndereco($endereco);
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
            if (isset($options['aero_id'])) {
                $builder->where("aero_id", $options['aero_id']);
            }
            if (isset($options['aero_nome'])) {
                $builder->like("aero_nome", $options['aero_nome']);
            }
        }
        if (isset($options['id'])) {
            $builder->where("aero_id", $options['id']);
        }
        if (isset($options['nome'])) {
            $builder->like("aero_nome", $options['nome']);
        }
        if (isset($options['sigla'])) {
            $builder->where("aero_sigla", $options['sigla']);
        }
        if (isset($options['cidade'])) {
            $builder->where("aero_cidade", $options['cidade']);
        }
        if (isset($options['estado'])) {
            $builder->where("aero_estado", $options['estado']);
        }
        if (isset($options['descricao'])) {
            $builder->like("aero_descricao", $options['descricao']);
        }
        if (isset($options['facilidade'])) {
            $builder->like("aero_facilidade", $options['facilidade']);
        }
        if (isset($options['endereco'])) {
            $builder->where("aero_endereco", $options['endereco']);
        }
        if (isset($options['fone'])) {
            $builder->where("aero_fone", $options['fone']);
        }
        if (isset($options['pabx'])) {
            $builder->where("aero_pabx", $options['pabx']);
        }
        if (isset($options['fax'])) {
            $builder->where("aero_fax", $options['fax']);
        }
        if (isset($options['cep'])) {
            $builder->where("aero_cep", $options['cep']);
        }
        if (isset($options['latitude'])) {
            $builder->where("aero_latitude", $options['latitude']);
        }
        if (isset($options['longitude'])) {
            $builder->where("aero_longitude", $options['longitude']);
        }
        if (isset($options['cidade_nome'])) {
            $builder->where("aero_cidade_nome", $options['cidade_nome']);
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
            $postData['aero_nome'] = $options['nome'];
        } else {
            $postData['aero_nome'] = null;
        }

        if (isset($options['sigla'])) {
            $postData['aero_sigla'] = $options['sigla'];
        } else {
            $postData['aero_sigla'] = null;
        }

        if (isset($options['cidade'])) {
            $postData['aero_cidade'] = $options['cidade'];
        } else {
            $postData['aero_cidade'] = null;
        }

        if (isset($options['estado'])) {
            $postData['aero_estado'] = $options['estado'];
        } else {
            $postData['aero_estado'] = null;
        }

        if (isset($options['descricao'])) {
            $postData['aero_descricao'] = $options['descricao'];
        } else {
            $postData['aero_descricao'] = null;
        }

        if (isset($options['facilidade'])) {
            $postData['aero_facilidade'] = $options['facilidade'];
        } else {
            $postData['aero_facilidade'] = null;
        }

        if (isset($options['endereco'])) {
            $postData['aero_endereco'] = $options['endereco'];
        } else {
            $postData['aero_endereco'] = null;
        }

        if (isset($options['fone'])) {
            $postData['aero_fone'] = $options['fone'];
        } else {
            $postData['aero_fone'] = null;
        }

        if (isset($options['pabx'])) {
            $postData['aero_pabx'] = $options['pabx'];
        } else {
            $postData['aero_pabx'] = null;
        }

        if (isset($options['fax'])) {
            $postData['aero_fax'] = $options['fax'];
        } else {
            $postData['aero_fax'] = null;
        }

        if (isset($options['cep'])) {
            $postData['aero_cep'] = $options['cep'];
        } else {
            $postData['aero_cep'] = null;
        }

        if (isset($options['latitude'])) {
            $postData['aero_latitude'] = $options['latitude'];
        } else {
            $postData['aero_latitude'] = null;
        }

        if (isset($options['longitude'])) {
            $postData['aero_longitude'] = $options['longitude'];
        } else {
            $postData['aero_longitude'] = null;
        }

        if (isset($options['cidade_nome'])) {
            $postData['aero_cidade_nome'] = $options['cidade_nome'];
        } else {
            $postData['aero_cidade_nome'] = null;
        }

        $query = $builder->getQueryInsert($this->table, $postData);

        return $query;
    }

    public function queryBuilderUpdate($options)
    {
        $builder = new QueryBuilder();
        if (isset($options['nome'])) {
            $builder->set("aero_nome", $options['nome']);
        }
        if (isset($options['sigla'])) {
            $builder->set("aero_sigla", $options['sigla']);
        }
        if (isset($options['cidade'])) {
            $builder->set("aero_cidade", $options['cidade']);
        }
        if (isset($options['estado'])) {
            $builder->set("aero_estado", $options['estado']);
        }
        if (isset($options['descricao'])) {
            $builder->set("aero_descricao", $options['descricao']);
        }
        if (isset($options['facilidade'])) {
            $builder->set("aero_facilidade", $options['facilidade']);
        }
        if (isset($options['endereco'])) {
            $builder->set("aero_endereco", $options['endereco']);
        }
        if (isset($options['fone'])) {
            $builder->set("aero_fone", $options['fone']);
        }
        if (isset($options['pabx'])) {
            $builder->set("aero_pabx", $options['pabx']);
        }
        if (isset($options['fax'])) {
            $builder->set("aero_fax", $options['fax']);
        }
        if (isset($options['cep'])) {
            $builder->set("aero_cep", $options['cep']);
        }
        if (isset($options['latitude'])) {
            $builder->set("aero_latitude", $options['latitude']);
        }
        if (isset($options['longitude'])) {
            $builder->set("aero_longitude", $options['longitude']);
        }
        if (isset($options['cidade_nome'])) {
            $builder->set("aero_cidade_nome", $options['cidade_nome']);
        }

        $builder->where("aero_id", $options['id']);

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
     * @param Aeroporto $obj
     * @param LocalidadeFacade $facade
     * @return Aeroporto
     */
    public function save($obj, $facade = null)
    {
        $options = [
            'sigla' => $obj->getSigla(),
            'aero_nome' => $obj->getNome(),
            'aero_cidade' => $obj->getCidade()->getId(),
            'aero_estado' => $obj->getCidade()->getEstado()->getAbreviacao(),
            'aero_descricao' => $obj->getDescricao(),
            'aero_facilidade' => $obj->getfacilidade(),
            'aero_endereco' => $obj->getEndereco(),
            'aero_fone' => $obj->getFone(),
            'aero_pabx' => $obj->getPabx(),
            'aero_fax' => $obj->getFax(),
            'aero_cep' => $obj->getCep(),
            'aero_latitude' => $obj->getLatitude(),
            'aero_longitude' => $obj->getLongitude(),
            'aero_cidade_nome' => $obj->getCidade()->getNome()
        ];
        if ($obj->getId()) {
            $options['id'] = $obj->getId();
            $aeroporto = $this->update($this->queryBuilderUpdate($options), $options['id']);
        } else {
            $aeroporto = $this->insert($this->queryBuilderInsert($options));
        }
        return $aeroporto;
    }

    /**
     * @param Aeroporto $obj
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