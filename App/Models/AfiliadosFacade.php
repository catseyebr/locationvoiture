<?php

namespace Carroaluguel\Models;

use Carroaluguel\Models\Afiliados\Afiliado;
use Core\EntityManager;

class AfiliadosFacade
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param $id
     * @return Afiliado
     */
    public function showAfiliado($id)
    {
        $repository = $this->entityManager->getRepository(Afiliado::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Afiliado[]
     */
    public function listAfiliados($options = null)
    {
        $repository = $this->entityManager->getRepository(Afiliado::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countAfiliados($options = null)
    {
        $repository = $this->entityManager->getRepository(Afiliado::class);
        return $repository->count($options);
    }

    /**
     * @param Afiliado $obj
     * @return Afiliado
     */
    public function saveAfiliado(Afiliado $obj)
    {
        $repository = $this->entityManager->getRepository(Afiliado::class);
        return $repository->save($obj);
    }

    /**
     * @param Afiliado $obj
     * @return bool
     */
    public function deleteAfiliado(Afiliado $obj)
    {
        $repository = $this->entityManager->getRepository(Afiliado::class);
        return $repository->delete($obj);
    }

}
