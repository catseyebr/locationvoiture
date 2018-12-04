<?php

namespace Carroaluguel\Models;

use Carroaluguel\Models\Utilizador\Cliente;
use Carroaluguel\Models\Utilizador\Condutor;
use Carroaluguel\Models\Utilizador\Contato;
use Carroaluguel\Models\Utilizador\Emissor;
use Carroaluguel\Models\Utilizador\Nivel;
use Carroaluguel\Models\Utilizador\NivelPermissao;
use Carroaluguel\Models\Utilizador\Permissao;
use Carroaluguel\Models\Utilizador\TempPessoaJuridica;
use Carroaluguel\Models\Utilizador\TipoContato;
use Carroaluguel\Models\Utilizador\Usuario;
use Core\EntityManager;

class UtilizadorFacade
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
     * @return Cliente
     */
    public function showCliente($id)
    {
        $repository = $this->entityManager->getRepository(Cliente::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Cliente[]
     */
    public function listClientes($options = null)
    {
        $repository = $this->entityManager->getRepository(Cliente::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countClientes($options = null)
    {
        $repository = $this->entityManager->getRepository(Cliente::class);
        return $repository->count($options);
    }

    /**
     * @param Cliente $obj
     * @return Cliente
     */
    public function saveCliente(Cliente $obj)
    {
        $repository = $this->entityManager->getRepository(Emissor::class);
        return $repository->save($obj);
    }

    /**
     * @param Cliente $obj
     * @return bool
     */
    public function deleteCliente(Cliente $obj)
    {
        $repository = $this->entityManager->getRepository(Cliente::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Condutor
     */
    public function showCondutor($id)
    {
        $repository = $this->entityManager->getRepository(Condutor::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Condutor[]
     */
    public function listCondutores($options = null)
    {
        $repository = $this->entityManager->getRepository(Condutor::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countCondutores($options = null)
    {
        $repository = $this->entityManager->getRepository(Condutor::class);
        return $repository->count($options);
    }

    /**
     * @param Condutor $obj
     * @return Condutor
     */
    public function saveCondutor(Condutor $obj)
    {
        $repository = $this->entityManager->getRepository(Condutor::class);
        return $repository->save($obj);
    }

    /**
     * @param Condutor $obj
     * @return bool
     */
    public function deleteCondutor(Condutor $obj)
    {
        $repository = $this->entityManager->getRepository(Condutor::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Contato
     */
    public function showContato($id)
    {
        $repository = $this->entityManager->getRepository(Contato::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Contato[]
     */
    public function listContatos($options = null)
    {
        $repository = $this->entityManager->getRepository(Contato::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countContatos($options = null)
    {
        $repository = $this->entityManager->getRepository(Contato::class);
        return $repository->count($options);
    }

    /**
     * @param Contato $obj
     * @return Contato
     */
    public function saveContatos(Contato $obj)
    {
        $repository = $this->entityManager->getRepository(Contato::class);
        return $repository->save($obj);
    }

    /**
     * @param Contato $obj
     * @return bool
     */
    public function deleteContato(Contato $obj)
    {
        $repository = $this->entityManager->getRepository(Contato::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Emissor
     */
    public function showEmissor($id)
    {
        $repository = $this->entityManager->getRepository(Emissor::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Emissor[]
     */
    public function listEmissores($options = null)
    {
        $repository = $this->entityManager->getRepository(Emissor::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countEmissores($options = null)
    {
        $repository = $this->entityManager->getRepository(Emissor::class);
        return $repository->count($options);
    }

    /**
     * @param Emissor $obj
     * @return Emissor
     */
    public function saveEmissor(Emissor $obj)
    {
        $repository = $this->entityManager->getRepository(Emissor::class);
        return $repository->save($obj);
    }

    /**
     * @param Emissor $obj
     * @return bool
     */
    public function deleteEmissor(Emissor $obj)
    {
        $repository = $this->entityManager->getRepository(Emissor::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Nivel
     */
    public function showNivel($id)
    {
        $repository = $this->entityManager->getRepository(Nivel::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Nivel[]
     */
    public function listNiveis($options = null)
    {
        $repository = $this->entityManager->getRepository(Nivel::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countNiveis($options = null)
    {
        $repository = $this->entityManager->getRepository(Nivel::class);
        return $repository->count($options);
    }

    /**
     * @param Nivel $obj
     * @return Nivel
     */
    public function saveNivel(Nivel $obj)
    {
        $repository = $this->entityManager->getRepository(Nivel::class);
        return $repository->save($obj);
    }

    /**
     * @param Nivel $obj
     * @return bool
     */
    public function deleteNivel(Nivel $obj)
    {
        $repository = $this->entityManager->getRepository(Nivel::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return NivelPermissao
     */
    public function showNivelPermissao($id)
    {
        $repository = $this->entityManager->getRepository(NivelPermissao::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return NivelPermissao[]
     */
    public function listNiveisPermissoes($options = null)
    {
        $repository = $this->entityManager->getRepository(NivelPermissao::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countNiveisPermissao($options = null)
    {
        $repository = $this->entityManager->getRepository(NivelPermissao::class);
        return $repository->count($options);
    }

    /**
     * @param NivelPermissao $obj
     * @return NivelPermissao
     */
    public function saveNivelPermissao(NivelPermissao $obj)
    {
        $repository = $this->entityManager->getRepository(NivelPermissao::class);
        return $repository->save($obj);
    }

    /**
     * @param NivelPermissao $obj
     * @return bool
     */
    public function deleteNivelPermissao(NivelPermissao $obj)
    {
        $repository = $this->entityManager->getRepository(NivelPermissao::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Permissao
     */
    public function showPermissao($id)
    {
        $repository = $this->entityManager->getRepository(Permissao::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Permissao[]
     */
    public function listPermissoes($options = null)
    {
        $repository = $this->entityManager->getRepository(Permissao::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countPermissoes($options = null)
    {
        $repository = $this->entityManager->getRepository(Permissao::class);
        return $repository->count($options);
    }

    /**
     * @param Permissao $obj
     * @return Permissao
     */
    public function savePermissao(Permissao $obj)
    {
        $repository = $this->entityManager->getRepository(Permissao::class);
        return $repository->save($obj);
    }

    /**
     * @param Permissao $obj
     * @return bool
     */
    public function deletePermissao(Permissao $obj)
    {
        $repository = $this->entityManager->getRepository(Permissao::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return TempPessoaJuridica
     */
    public function showTempPessoaJuridica($id)
    {
        $repository = $this->entityManager->getRepository(TempPessoaJuridica::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return TempPessoaJuridica[]
     */
    public function listTempPessoaJuridica($options = null)
    {
        $repository = $this->entityManager->getRepository(TempPessoaJuridica::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countTempPessoaJuridica($options = null)
    {
        $repository = $this->entityManager->getRepository(TempPessoaJuridica::class);
        return $repository->count($options);
    }

    /**
     * @param TempPessoaJuridica $obj
     * @return TempPessoaJuridica
     */
    public function saveTempPessoaJuridica(TempPessoaJuridica $obj)
    {
        $repository = $this->entityManager->getRepository(TempPessoaJuridica::class);
        return $repository->save($obj);
    }

    /**
     * @param TempPessoaJuridica $obj
     * @return bool
     */
    public function deleteTempPessoaJuridica(TempPessoaJuridica $obj)
    {
        $repository = $this->entityManager->getRepository(TempPessoaJuridica::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return TipoContato
     */
    public function showTipoContato($id)
    {
        $repository = $this->entityManager->getRepository(TipoContato::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return TipoContato[]
     */
    public function listTipoContato($options = null)
    {
        $repository = $this->entityManager->getRepository(TipoContato::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countTipoContato($options = null)
    {
        $repository = $this->entityManager->getRepository(TipoContato::class);
        return $repository->count($options);
    }

    /**
     * @param TipoContato $obj
     * @return TipoContato
     */
    public function saveTipoContato(TipoContato $obj)
    {
        $repository = $this->entityManager->getRepository(TipoContato::class);
        return $repository->save($obj);
    }

    /**
     * @param TipoContato $obj
     * @return bool
     */
    public function deleteTipoContato(TipoContato $obj)
    {
        $repository = $this->entityManager->getRepository(TipoContato::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Usuario
     */
    public function showUsuario($id)
    {
        $repository = $this->entityManager->getRepository(Usuario::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Usuario[]
     */
    public function listUsuarios($options = null)
    {
        $repository = $this->entityManager->getRepository(Usuario::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countUsuarios($options = null)
    {
        $repository = $this->entityManager->getRepository(Usuario::class);
        return $repository->count($options);
    }

    /**
     * @param Usuario $obj
     * @return Usuario
     */
    public function saveUsuario(Usuario $obj)
    {
        $repository = $this->entityManager->getRepository(Usuario::class);
        return $repository->save($obj);
    }

    /**
     * @param Usuario $obj
     * @return bool
     */
    public function deleteUsuario(Usuario $obj)
    {
        $repository = $this->entityManager->getRepository(Usuario::class);
        return $repository->delete($obj);
    }
}