<?php

namespace Carroaluguel\Models;

use Carroaluguel\Models\Financeiro\CategoriaMovimentacao;
use Carroaluguel\Models\Financeiro\Conta;
use Carroaluguel\Models\Financeiro\Fornecedor;
use Carroaluguel\Models\Financeiro\GrupoCobranca;
use Carroaluguel\Models\Financeiro\Movimentacao;
use Carroaluguel\Models\Financeiro\Produto;
use Carroaluguel\Models\Financeiro\StatusVenda;
use Carroaluguel\Models\Financeiro\TipoFornecedor;
use Carroaluguel\Models\Financeiro\TipoPagamento;
use Carroaluguel\Models\Financeiro\Venda;
use Core\EntityManager;

class FinanceiroFacade
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
     * @return CategoriaMovimentacao
     */
    public function showCategoriaMovimentacao($id)
    {
        $repository = $this->entityManager->getRepository(CategoriaMovimentacao::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return CategoriaMovimentacao[]
     */
    public function listCategoriasMovimentacao($options = null)
    {
        $repository = $this->entityManager->getRepository(CategoriaMovimentacao::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countCategoriasMovimentacao($options = null)
    {
        $repository = $this->entityManager->getRepository(CategoriaMovimentacao::class);
        return $repository->count($options);
    }

    /**
     * @param CategoriaMovimentacao $obj
     * @return CategoriaMovimentacao
     */
    public function saveCategoriaMovimentacao(CategoriaMovimentacao $obj)
    {
        $repository = $this->entityManager->getRepository(CategoriaMovimentacao::class);
        return $repository->save($obj);
    }

    /**
     * @param CategoriaMovimentacao $obj
     * @return bool
     */
    public function deleteCategoriaMovimentacao(CategoriaMovimentacao $obj)
    {
        $repository = $this->entityManager->getRepository(CategoriaMovimentacao::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Conta
     */
    public function showConta($id)
    {
        $repository = $this->entityManager->getRepository(Conta::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Conta[]
     */
    public function listContas($options = null)
    {
        $repository = $this->entityManager->getRepository(Conta::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countContas($options = null)
    {
        $repository = $this->entityManager->getRepository(Conta::class);
        return $repository->count($options);
    }

    /**
     * @param Conta $obj
     * @return Conta
     */
    public function saveConta(Conta $obj)
    {
        $repository = $this->entityManager->getRepository(Conta::class);
        return $repository->save($obj);
    }

    /**
     * @param Conta $obj
     * @return bool
     */
    public function deleteConta(Conta $obj)
    {
        $repository = $this->entityManager->getRepository(Conta::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Fornecedor
     */
    public function showFornecedor($id)
    {
        $repository = $this->entityManager->getRepository(Fornecedor::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Fornecedor[]
     */
    public function listFornecedor($options = null)
    {
        $repository = $this->entityManager->getRepository(Fornecedor::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countFornecedor($options = null)
    {
        $repository = $this->entityManager->getRepository(Fornecedor::class);
        return $repository->count($options);
    }

    /**
     * @param Fornecedor $obj
     * @return Fornecedor
     */
    public function saveFornecedor(Fornecedor $obj)
    {
        $repository = $this->entityManager->getRepository(Fornecedor::class);
        return $repository->save($obj);
    }

    /**
     * @param Fornecedor $obj
     * @return bool
     */
    public function deleteFornecedor(Fornecedor $obj)
    {
        $repository = $this->entityManager->getRepository(Fornecedor::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return GrupoCobranca
     */
    public function showGrupoCobranca($id)
    {
        $repository = $this->entityManager->getRepository(GrupoCobranca::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return GrupoCobranca[]
     */
    public function listGrupoCobranca($options = null)
    {
        $repository = $this->entityManager->getRepository(GrupoCobranca::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countGrupoCobranca($options = null)
    {
        $repository = $this->entityManager->getRepository(GrupoCobranca::class);
        return $repository->count($options);
    }

    /**
     * @param GrupoCobranca $obj
     * @return GrupoCobranca
     */
    public function saveGrupoCobranca(GrupoCobranca $obj)
    {
        $repository = $this->entityManager->getRepository(GrupoCobranca::class);
        return $repository->save($obj);
    }

    /**
     * @param GrupoCobranca $obj
     * @return bool
     */
    public function deleteGrupoCobranca(GrupoCobranca $obj)
    {
        $repository = $this->entityManager->getRepository(GrupoCobranca::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Movimentacao
     */
    public function showMovimentacao($id)
    {
        $repository = $this->entityManager->getRepository(Movimentacao::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Movimentacao[]
     */
    public function listMovimentacoes($options = null)
    {
        $repository = $this->entityManager->getRepository(Movimentacao::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countMovimentacoes($options = null)
    {
        $repository = $this->entityManager->getRepository(Movimentacao::class);
        return $repository->count($options);
    }

    /**
     * @param Movimentacao $obj
     * @return Movimentacao
     */
    public function saveMovimentacao(Movimentacao $obj)
    {
        $repository = $this->entityManager->getRepository(Movimentacao::class);
        return $repository->save($obj);
    }

    /**
     * @param Movimentacao $obj
     * @return bool
     */
    public function deleteMovimentacao(Movimentacao $obj)
    {
        $repository = $this->entityManager->getRepository(Movimentacao::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Produto
     */
    public function showProduto($id)
    {
        $repository = $this->entityManager->getRepository(Produto::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Produto[]
     */
    public function listProdutos($options = null)
    {
        $repository = $this->entityManager->getRepository(Produto::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countProdutos($options = null)
    {
        $repository = $this->entityManager->getRepository(Produto::class);
        return $repository->count($options);
    }

    /**
     * @param Produto $obj
     * @return Produto
     */
    public function saveProduto(Produto $obj)
    {
        $repository = $this->entityManager->getRepository(Produto::class);
        return $repository->save($obj);
    }

    /**
     * @param Produto $obj
     * @return bool
     */
    public function deleteProduto(Produto $obj)
    {
        $repository = $this->entityManager->getRepository(Produto::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return StatusVenda
     */
    public function showStatusVenda($id)
    {
        $repository = $this->entityManager->getRepository(StatusVenda::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return StatusVenda[]
     */
    public function listStatusVendas($options = null)
    {
        $repository = $this->entityManager->getRepository(StatusVenda::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countStatusVendas($options = null)
    {
        $repository = $this->entityManager->getRepository(StatusVenda::class);
        return $repository->count($options);
    }

    /**
     * @param StatusVenda $obj
     * @return StatusVenda
     */
    public function saveStatusVenda(StatusVenda $obj)
    {
        $repository = $this->entityManager->getRepository(StatusVenda::class);
        return $repository->save($obj);
    }

    /**
     * @param StatusVenda $obj
     * @return bool
     */
    public function deleteStatusVenda(StatusVenda $obj)
    {
        $repository = $this->entityManager->getRepository(StatusVenda::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return TipoFornecedor
     */
    public function showTipoFornecedor($id)
    {
        $repository = $this->entityManager->getRepository(TipoFornecedor::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return TipoFornecedor[]
     */
    public function listTiposFornecedores($options = null)
    {
        $repository = $this->entityManager->getRepository(TipoFornecedor::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countTiposFornecedores($options = null)
    {
        $repository = $this->entityManager->getRepository(TipoFornecedor::class);
        return $repository->count($options);
    }

    /**
     * @param TipoFornecedor $obj
     * @return TipoFornecedor
     */
    public function saveTipoFornecedor(TipoFornecedor $obj)
    {
        $repository = $this->entityManager->getRepository(TipoFornecedor::class);
        return $repository->save($obj);
    }

    /**
     * @param TipoFornecedor $obj
     * @return bool
     */
    public function deleteTipoFornecedor(TipoFornecedor $obj)
    {
        $repository = $this->entityManager->getRepository(TipoFornecedor::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return TipoPagamento
     */
    public function showTipoPagamento($id)
    {
        $repository = $this->entityManager->getRepository(TipoPagamento::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return TipoPagamento[]
     */
    public function listTiposPagamentos($options = null)
    {
        $repository = $this->entityManager->getRepository(TipoPagamento::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countTiposPagamentos($options = null)
    {
        $repository = $this->entityManager->getRepository(TipoPagamento::class);
        return $repository->count($options);
    }

    /**
     * @param TipoPagamento $obj
     * @return TipoPagamento
     */
    public function saveTipoPagamento(TipoPagamento $obj)
    {
        $repository = $this->entityManager->getRepository(TipoPagamento::class);
        return $repository->save($obj);
    }

    /**
     * @param TipoPagamento $obj
     * @return bool
     */
    public function deleteTipoPagamento(TipoPagamento $obj)
    {
        $repository = $this->entityManager->getRepository(TipoPagamento::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Venda
     */
    public function showVenda($id)
    {
        $repository = $this->entityManager->getRepository(Venda::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Venda[]
     */
    public function listVendas($options = null)
    {
        $repository = $this->entityManager->getRepository(Venda::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countVendas($options = null)
    {
        $repository = $this->entityManager->getRepository(Venda::class);
        return $repository->count($options);
    }

    /**
     * @param Venda $obj
     * @return Venda
     */
    public function saveVenda(Venda $obj)
    {
        $repository = $this->entityManager->getRepository(Venda::class);
        return $repository->save($obj);
    }

    /**
     * @param Venda $obj
     * @return bool
     */
    public function deleteVenda(Venda $obj)
    {
        $repository = $this->entityManager->getRepository(Venda::class);
        return $repository->delete($obj);
    }
}
