<?php

namespace Carroaluguel\Models;

use Carroaluguel\Models\Localidade\Aeroporto;
use Carroaluguel\Models\Localidade\Bairro;
use Carroaluguel\Models\Localidade\Cep;
use Carroaluguel\Models\Localidade\Cidade;
use Carroaluguel\Models\Localidade\Estado;
use Carroaluguel\Models\Localidade\Pais;
use Core\EntityManager;

class LocalidadeFacade
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
     * @return Aeroporto
     */
    public function showAeroporto($id)
    {
        $repository = $this->entityManager->getRepository(Aeroporto::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Aeroporto[]
     */
    public function listAeroportos($options = null)
    {
        $repository = $this->entityManager->getRepository(Aeroporto::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countAeroportos($options = null)
    {
        $repository = $this->entityManager->getRepository(Aeroporto::class);
        return $repository->count($options);
    }

    /**
     * @param Aeroporto $aeroporto
     * @return Aeroporto
     */
    public function saveAeroporto(Aeroporto $aeroporto)
    {
        $repository = $this->entityManager->getRepository(Aeroporto::class);
        return $repository->save($aeroporto);
    }

    /**
     * @param Aeroporto $obj
     * @return bool
     */
    public function deleteAeroporto(Aeroporto $obj)
    {
        $repository = $this->entityManager->getRepository(Aeroporto::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Bairro
     */
    public function showBairro($id)
    {
        $repository = $this->entityManager->getRepository(Bairro::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Bairro[]
     */
    public function listBairros($options = null)
    {
        $repository = $this->entityManager->getRepository(Bairro::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countBairros($options = null)
    {
        $repository = $this->entityManager->getRepository(Bairro::class);
        return $repository->count($options);
    }

    /**
     * @param Bairro $bairro
     * @return Bairro
     */
    public function saveBairro(Bairro $bairro)
    {
        $repository = $this->entityManager->getRepository(Bairro::class);
        return $repository->save($bairro);
    }

    /**
     * @param Bairro $obj
     * @return bool
     */
    public function deleteBairro(Bairro $obj)
    {
        $repository = $this->entityManager->getRepository(Bairro::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Cep
     */
    public function showCep($id)
    {
        $repository = $this->entityManager->getRepository(Cep::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Cep[]
     */
    public function listCeps($options = null)
    {
        $repository = $this->entityManager->getRepository(Cep::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countCeps($options = null)
    {
        $repository = $this->entityManager->getRepository(Cep::class);
        return $repository->count($options);
    }

    /**
     * @param Cep $cep
     * @return Cep
     */
    public function saveCep(Cep $cep)
    {
        $repository = $this->entityManager->getRepository(Cep::class);
        return $repository->save($cep);
    }

    /**
     * @param Cep $obj
     * @return bool
     */
    public function deleteCep(Cep $obj)
    {
        $repository = $this->entityManager->getRepository(Cep::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Cidade
     */
    public function showCidade($id)
    {
        $repository = $this->entityManager->getRepository(Cidade::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Cidade[]
     */
    public function listCidades($options = null)
    {
        $repository = $this->entityManager->getRepository(Cidade::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countCidades($options = null)
    {
        $repository = $this->entityManager->getRepository(Cidade::class);
        return $repository->count($options);
    }

    /**
     * @param Cidade $cidade
     * @return Cidade
     */
    public function saveCidade(Cidade $cidade)
    {
        $repository = $this->entityManager->getRepository(Cidade::class);
        return $repository->save($cidade);
    }

    /**
     * @param Cidade $obj
     * @return bool
     */
    public function deleteCidade(Cidade $obj)
    {
        $repository = $this->entityManager->getRepository(Cidade::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Estado
     */
    public function showEstado($id)
    {
        $repository = $this->entityManager->getRepository(Estado::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Estado[]
     */
    public function listEstados($options = null)
    {
        $repository = $this->entityManager->getRepository(Estado::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countEstados($options = null)
    {
        $repository = $this->entityManager->getRepository(Estado::class);
        return $repository->count($options);
    }

    /**
     * @param Estado $estado
     * @return Estado
     */
    public function saveEstado(Estado $estado)
    {
        $repository = $this->entityManager->getRepository(Estado::class);
        return $repository->save($estado);
    }

    /**
     * @param Estado $obj
     * @return bool
     */
    public function deleteEstado(Estado $obj)
    {
        $repository = $this->entityManager->getRepository(Estado::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Pais
     */
    public function showPais($id)
    {
        $repository = $this->entityManager->getRepository(Pais::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Pais[]
     */
    public function listPaises($options = null)
    {
        $repository = $this->entityManager->getRepository(Pais::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countPaises($options = null)
    {
        $repository = $this->entityManager->getRepository(Pais::class);
        return $repository->count($options);
    }

    /**
     * @param Pais $pais
     * @return Pais
     */
    public function savePais(Pais $pais)
    {
        $repository = $this->entityManager->getRepository(Pais::class);
        return $repository->save($pais);
    }

    /**
     * @param Pais $obj
     * @return bool
     */
    public function deletePais(Pais $obj)
    {
        $repository = $this->entityManager->getRepository(Pais::class);
        return $repository->delete($obj);
    }

}