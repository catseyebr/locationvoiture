<?php

namespace Core;


class EntityManager
{
    private $db;
    private $class;
    private $repository;
    public function __construct(\PDO $con)
    {
        $this->db = $con;
    }

    /**
     * @param $class
     * @return Repository
     */
    public function getRepository($class){
        $class_split = explode('\\',$class);
        $entity = array_pop($class_split);
        $classdao = implode('\\',$class_split).'\\DAO\\'.$entity.'DAO';
        $this->class = new $class;
        $this->repository = new $classdao($this->db);
        return $this->repository;
    }
}