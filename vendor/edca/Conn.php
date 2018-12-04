<?php
    
    namespace Core;
    
    class Conn
    {
        private $entityManager;
        private $dsn;
        private $user;
        private $pass;

        public function __construct($dsn, $user, $pass)
        {
            $this->dsn = $dsn;
            $this->user = $user;
            $this->pass = $pass;
            $this->entityManager = new EntityManager(new \PDO($this->dsn,$this->user,$this->pass,array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")));
        }

        public function getEntityManager()
        {
            return $this->entityManager;
        }
    }