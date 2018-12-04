<?php

namespace Core;

abstract class Repository
{
    protected $db;
    protected $table;
    protected $primary_key;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    abstract function hidrate($dados, $facade);

    abstract function queryBuilder($dados);

    abstract function queryBuilderInsert($options);

    abstract function queryBuilderUpdate($options);

    abstract function queryBuilderDelete($options);

    public function fetchAll($options = null, $facade = null)
    {
        $arr_dados = null;
        $query = $this->queryBuilder($options);
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
        if (is_array($result)) {
            foreach ($result as $dados) {
                $arr_dados[] = $this->hidrate($dados, $facade);
            }
        }
        return $arr_dados;
    }

    public function find($id, $facade = null, $options = null)
    {
        $options['id'] = $id;
        $query = $this->queryBuilder($options);
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_OBJ);
        return $this->hidrate($result, $facade);
    }

    public function count($options = null)
    {
        $options['count'] = true;
        $query = $this->queryBuilder($options);
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return (int)$stmt->fetchColumn();
    }

    abstract function save($obj, $facade = null);

    function update($query, $id, $options = null)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $this->find($id, $this, $options);
    }

    function insert($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $newId = $this->db->lastInsertId();
        return $this->find($newId, $this);
    }

    abstract function delete($obj, $facade = null);

    public function purge($query)
    {
        $stmt = $this->db->prepare($query);
        return $stmt->execute();
    }
}