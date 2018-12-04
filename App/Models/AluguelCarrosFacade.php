<?php

namespace Carroaluguel\Models;

use Carroaluguel\Models\AluguelCarros\AlteraReservaCarro;
use Carroaluguel\Models\AluguelCarros\Avaliacao;
use Carroaluguel\Models\AluguelCarros\BannerCotacao;
use Carroaluguel\Models\AluguelCarros\BlackoutGrupo;
use Carroaluguel\Models\AluguelCarros\BlackoutLoja;
use Carroaluguel\Models\AluguelCarros\BloqueioCliente;
use Carroaluguel\Models\AluguelCarros\CancelamentoXml;
use Carroaluguel\Models\AluguelCarros\Carro;
use Carroaluguel\Models\AluguelCarros\Categoria;
use Carroaluguel\Models\AluguelCarros\CaucaoLoja;
use Carroaluguel\Models\AluguelCarros\CiaAerea;
use Carroaluguel\Models\AluguelCarros\CondutorGratis;
use Carroaluguel\Models\AluguelCarros\ConsultaCpf;
use Carroaluguel\Models\AluguelCarros\ContatoLojaAdmin;
use Carroaluguel\Models\AluguelCarros\DadosDelivery;
use Carroaluguel\Models\AluguelCarros\Delivery;
use Carroaluguel\Models\AluguelCarros\DeliveryLojas;
use Carroaluguel\Models\AluguelCarros\Feriado;
use Carroaluguel\Models\AluguelCarros\FeriadoAtendimento;
use Carroaluguel\Models\AluguelCarros\FeriadoLoja;
use Carroaluguel\Models\AluguelCarros\Franquia;
use Carroaluguel\Models\AluguelCarros\Grupo;
use Carroaluguel\Models\AluguelCarros\HorarioAtendimento;
use Carroaluguel\Models\AluguelCarros\HorarioLoja;
use Carroaluguel\Models\AluguelCarros\Locadora;
use Carroaluguel\Models\AluguelCarros\Loja;
use Carroaluguel\Models\AluguelCarros\PromocaoWebservice;
use Carroaluguel\Models\AluguelCarros\Protecao;
use Carroaluguel\Models\AluguelCarros\ReservaCarro;
use Carroaluguel\Models\AluguelCarros\ReservaCarroPesquisa;
use Carroaluguel\Models\AluguelCarros\TarifaGrupo;
use Carroaluguel\Models\AluguelCarros\TarifaLoja;
use Carroaluguel\Models\AluguelCarros\TarifaProtecao;
use Carroaluguel\Models\AluguelCarros\TaxaExtraLoja;
use Carroaluguel\Models\AluguelCarros\TaxaOutraLoja;
use Carroaluguel\Models\AluguelCarros\TelefoneCidade;
use Carroaluguel\Models\AluguelCarros\TelefoneNumero;
use Carroaluguel\Models\AluguelCarros\VendaLivre;
use Carroaluguel\Models\AluguelCarros\XmlProdutos;
use Core\EntityManager;

class AluguelCarrosFacade
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
     * @return AlteraReservaCarro
     */
    public function showAlteraReservaCarro($id)
    {
        $repository = $this->entityManager->getRepository(AlteraReservaCarro::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return AlteraReservaCarro[]
     */
    public function listAlteraReservasCarro($options = null)
    {
        $repository = $this->entityManager->getRepository(AlteraReservaCarro::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countAlteraReservasCarro($options = null)
    {
        $repository = $this->entityManager->getRepository(AlteraReservaCarro::class);
        return $repository->count($options);
    }

    /**
     * @param AlteraReservaCarro $obj
     * @return AlteraReservaCarro
     */
    public function saveAlteraReservaCarro(AlteraReservaCarro $obj)
    {
        $repository = $this->entityManager->getRepository(AlteraReservaCarro::class);
        return $repository->save($obj);
    }

    /**
     * @param AlteraReservaCarro $obj
     * @return bool
     */
    public function deleteAlteraReservaCarro(AlteraReservaCarro $obj)
    {
        $repository = $this->entityManager->getRepository(AlteraReservaCarro::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Avaliacao
     */
    public function showAvaliacao($id)
    {
        $repository = $this->entityManager->getRepository(Avaliacao::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Avaliacao[]
     */
    public function listAvaliacoes($options = null)
    {
        $repository = $this->entityManager->getRepository(Avaliacao::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countAvaliacoes($options = null)
    {
        $repository = $this->entityManager->getRepository(Avaliacao::class);
        return $repository->count($options);
    }

    /**
     * @param Avaliacao $obj
     * @return Avaliacao
     */
    public function saveAvaliacao(Avaliacao $obj)
    {
        $repository = $this->entityManager->getRepository(Avaliacao::class);
        return $repository->save($obj);
    }

    /**
     * @param Avaliacao $obj
     * @return bool
     */
    public function deleteAvaliacao(Avaliacao $obj)
    {
        $repository = $this->entityManager->getRepository(Avaliacao::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return BannerCotacao
     */
    public function showBannerCotacao($id)
    {
        $repository = $this->entityManager->getRepository(BannerCotacao::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return BannerCotacao[]
     */
    public function listBannersCotacao($options = null)
    {
        $repository = $this->entityManager->getRepository(BannerCotacao::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countBannerCotacao($options = null)
    {
        $repository = $this->entityManager->getRepository(BannerCotacao::class);
        return $repository->count($options);
    }

    /**
     * @param BannerCotacao $obj
     * @return BannerCotacao
     */
    public function saveBannerCotacao(BannerCotacao $obj)
    {
        $repository = $this->entityManager->getRepository(BannerCotacao::class);
        return $repository->save($obj);
    }

    /**
     * @param BannerCotacao $obj
     * @return bool
     */
    public function deleteBannerCotacao(BannerCotacao $obj)
    {
        $repository = $this->entityManager->getRepository(BannerCotacao::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return BlackoutGrupo
     */
    public function showBlackoutGrupo($id)
    {
        $repository = $this->entityManager->getRepository(BlackoutGrupo::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return BlackoutGrupo[]
     */
    public function listBlackoutsGrupo($options = null)
    {
        $repository = $this->entityManager->getRepository(BlackoutGrupo::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countBlackoutsGrupo($options = null)
    {
        $repository = $this->entityManager->getRepository(BlackoutGrupo::class);
        return $repository->count($options);
    }

    /**
     * @param BlackoutGrupo $obj
     * @return BlackoutGrupo
     */
    public function saveBlackoutGrupo(BlackoutGrupo $obj)
    {
        $repository = $this->entityManager->getRepository(BlackoutGrupo::class);
        return $repository->save($obj);
    }

    /**
     * @param BlackoutGrupo $obj
     * @return bool
     */
    public function deleteBlackoutGrupo(BlackoutGrupo $obj)
    {
        $repository = $this->entityManager->getRepository(BlackoutGrupo::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return BlackoutLoja
     */
    public function showBlackoutLoja($id)
    {
        $repository = $this->entityManager->getRepository(BlackoutLoja::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return BlackoutLoja[]
     */
    public function listBlackoutsLoja($options = null)
    {
        $repository = $this->entityManager->getRepository(BlackoutLoja::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countBlackoutsLoja($options = null)
    {
        $repository = $this->entityManager->getRepository(BlackoutLoja::class);
        return $repository->count($options);
    }

    /**
     * @param BlackoutLoja $obj
     * @return BlackoutLoja
     */
    public function saveBlackoutLoja(BlackoutLoja $obj)
    {
        $repository = $this->entityManager->getRepository(BlackoutLoja::class);
        return $repository->save($obj);
    }

    /**
     * @param BlackoutLoja $obj
     * @return bool
     */
    public function deleteBlackoutLoja(BlackoutLoja $obj)
    {
        $repository = $this->entityManager->getRepository(BlackoutLoja::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return BloqueioCliente
     */
    public function showBloqueioCliente($id)
    {
        $repository = $this->entityManager->getRepository(BloqueioCliente::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return BloqueioCliente[]
     */
    public function listBloqueiosClientes($options = null)
    {
        $repository = $this->entityManager->getRepository(BloqueioCliente::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countBloqueiosClientes($options = null)
    {
        $repository = $this->entityManager->getRepository(BloqueioCliente::class);
        return $repository->count($options);
    }

    /**
     * @param BloqueioCliente $obj
     * @return BloqueioCliente
     */
    public function saveBloqueioCliente(BloqueioCliente $obj)
    {
        $repository = $this->entityManager->getRepository(BloqueioCliente::class);
        return $repository->save($obj);
    }

    /**
     * @param BloqueioCliente $obj
     * @return bool
     */
    public function deleteBloqueioCliente(BloqueioCliente $obj)
    {
        $repository = $this->entityManager->getRepository(BloqueioCliente::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return CancelamentoXml
     */
    public function showCancelamentoXml($id)
    {
        $repository = $this->entityManager->getRepository(CancelamentoXml::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return CancelamentoXml[]
     */
    public function listCancelamentosXml($options = null)
    {
        $repository = $this->entityManager->getRepository(CancelamentoXml::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countCancelamentosXml($options = null)
    {
        $repository = $this->entityManager->getRepository(CancelamentoXml::class);
        return $repository->count($options);
    }

    /**
     * @param CancelamentoXml $obj
     * @return CancelamentoXml
     */
    public function saveCancelamentoXml(CancelamentoXml $obj)
    {
        $repository = $this->entityManager->getRepository(CancelamentoXml::class);
        return $repository->save($obj);
    }

    /**
     * @param CancelamentoXml $obj
     * @return bool
     */
    public function deleteCancelamentoXml(CancelamentoXml $obj)
    {
        $repository = $this->entityManager->getRepository(CancelamentoXml::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Carro
     */
    public function showCarro($id)
    {
        $repository = $this->entityManager->getRepository(Carro::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Carro[]
     */
    public function listCarros($options = null)
    {
        $repository = $this->entityManager->getRepository(Carro::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countCarros($options = null)
    {
        $repository = $this->entityManager->getRepository(Carro::class);
        return $repository->count($options);
    }

    /**
     * @param Carro $obj
     * @return Carro
     */
    public function saveCarro(Carro $obj)
    {
        $repository = $this->entityManager->getRepository(Carro::class);
        return $repository->save($obj);
    }

    /**
     * @param Carro $obj
     * @return bool
     */
    public function deleteCarro(Carro $obj)
    {
        $repository = $this->entityManager->getRepository(Carro::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Categoria
     */
    public function showCategoria($id)
    {
        $repository = $this->entityManager->getRepository(Categoria::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Categoria[]
     */
    public function listCategorias($options = null)
    {
        $repository = $this->entityManager->getRepository(Categoria::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countCategorias($options = null)
    {
        $repository = $this->entityManager->getRepository(Categoria::class);
        return $repository->count($options);
    }

    /**
     * @param Categoria $obj
     * @return Categoria
     */
    public function saveCategoria(Categoria $obj)
    {
        $repository = $this->entityManager->getRepository(Categoria::class);
        return $repository->save($obj);
    }

    /**
     * @param Categoria $obj
     * @return bool
     */
    public function deleteCategoria(Categoria $obj)
    {
        $repository = $this->entityManager->getRepository(Categoria::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return CaucaoLoja
     */
    public function showCaucaoLoja($id)
    {
        $repository = $this->entityManager->getRepository(CaucaoLoja::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return CaucaoLoja[]
     */
    public function listCaucaoLojas($options = null)
    {
        $repository = $this->entityManager->getRepository(CaucaoLoja::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countCaucaoLojas($options = null)
    {
        $repository = $this->entityManager->getRepository(CaucaoLoja::class);
        return $repository->count($options);
    }

    /**
     * @param CaucaoLoja $obj
     * @return CaucaoLoja
     */
    public function saveCaucaoLoja(CaucaoLoja $obj)
    {
        $repository = $this->entityManager->getRepository(CaucaoLoja::class);
        return $repository->save($obj);
    }

    /**
     * @param CaucaoLoja $obj
     * @return bool
     */
    public function deleteCaucaoLoja(CaucaoLoja $obj)
    {
        $repository = $this->entityManager->getRepository(CaucaoLoja::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return CiaAerea
     */
    public function showCiaAerea($id)
    {
        $repository = $this->entityManager->getRepository(CiaAerea::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return CiaAerea[]
     */
    public function listCiasAereas($options = null)
    {
        $repository = $this->entityManager->getRepository(CiaAerea::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countCiasAereas($options = null)
    {
        $repository = $this->entityManager->getRepository(CiaAerea::class);
        return $repository->count($options);
    }

    /**
     * @param CiaAerea $obj
     * @return CiaAerea
     */
    public function saveCiaAerea(CiaAerea $obj)
    {
        $repository = $this->entityManager->getRepository(CiaAerea::class);
        return $repository->save($obj);
    }

    /**
     * @param CiaAerea $obj
     * @return bool
     */
    public function deleteCiaAerea(CiaAerea $obj)
    {
        $repository = $this->entityManager->getRepository(CiaAerea::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return CondutorGratis
     */
    public function showCondutorGratis($id)
    {
        $repository = $this->entityManager->getRepository(CondutorGratis::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return CondutorGratis[]
     */
    public function listCondutoresGratis($options = null)
    {
        $repository = $this->entityManager->getRepository(CondutorGratis::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countCondutoresGratis($options = null)
    {
        $repository = $this->entityManager->getRepository(CondutorGratis::class);
        return $repository->count($options);
    }

    /**
     * @param CondutorGratis $obj
     * @return CondutorGratis
     */
    public function saveCondutorGratis(CondutorGratis $obj)
    {
        $repository = $this->entityManager->getRepository(CondutorGratis::class);
        return $repository->save($obj);
    }

    /**
     * @param CondutorGratis $obj
     * @return bool
     */
    public function deleteCondutorGratis(CondutorGratis $obj)
    {
        $repository = $this->entityManager->getRepository(CondutorGratis::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return ConsultaCpf
     */
    public function showConsultaCpf($id)
    {
        $repository = $this->entityManager->getRepository(ConsultaCpf::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return ConsultaCpf[]
     */
    public function listConsultaCpfs($options = null)
    {
        $repository = $this->entityManager->getRepository(ConsultaCpf::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countConsultaCpfs($options = null)
    {
        $repository = $this->entityManager->getRepository(ConsultaCpf::class);
        return $repository->count($options);
    }

    /**
     * @param ConsultaCpf $obj
     * @return ConsultaCpf
     */
    public function saveConsultaCpf(ConsultaCpf $obj)
    {
        $repository = $this->entityManager->getRepository(ConsultaCpf::class);
        return $repository->save($obj);
    }

    /**
     * @param ConsultaCpf $obj
     * @return bool
     */
    public function deleteConsultaCpf(ConsultaCpf $obj)
    {
        $repository = $this->entityManager->getRepository(ConsultaCpf::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return ContatoLojaAdmin
     */
    public function showContatoLojaAdmin($id)
    {
        $repository = $this->entityManager->getRepository(ContatoLojaAdmin::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return ContatoLojaAdmin[]
     */
    public function listContatosLojasAdmin($options = null)
    {
        $repository = $this->entityManager->getRepository(ContatoLojaAdmin::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countContatosLojasAdmin($options = null)
    {
        $repository = $this->entityManager->getRepository(ContatoLojaAdmin::class);
        return $repository->count($options);
    }

    /**
     * @param ContatoLojaAdmin $obj
     * @return ContatoLojaAdmin
     */
    public function saveContatoLojaAdmin(ContatoLojaAdmin $obj)
    {
        $repository = $this->entityManager->getRepository(ContatoLojaAdmin::class);
        return $repository->save($obj);
    }

    /**
     * @param ContatoLojaAdmin $obj
     * @return bool
     */
    public function deleteContatoLojaAdmin(ContatoLojaAdmin $obj)
    {
        $repository = $this->entityManager->getRepository(ContatoLojaAdmin::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return DadosDelivery
     */
    public function showDadosDelivery($id)
    {
        $repository = $this->entityManager->getRepository(DadosDelivery::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return DadosDelivery[]
     */
    public function listDadosDelivery($options = null)
    {
        $repository = $this->entityManager->getRepository(DadosDelivery::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countDadosDelivery($options = null)
    {
        $repository = $this->entityManager->getRepository(DadosDelivery::class);
        return $repository->count($options);
    }

    /**
     * @param DadosDelivery $obj
     * @return DadosDelivery
     */
    public function saveDadosDelivery(DadosDelivery $obj)
    {
        $repository = $this->entityManager->getRepository(DadosDelivery::class);
        return $repository->save($obj);
    }

    /**
     * @param DadosDelivery $obj
     * @return bool
     */
    public function deleteDadosDelivery(DadosDelivery $obj)
    {
        $repository = $this->entityManager->getRepository(DadosDelivery::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Delivery
     */
    public function showDelivery($id)
    {
        $repository = $this->entityManager->getRepository(Delivery::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Delivery[]
     */
    public function listDelivery($options = null)
    {
        $repository = $this->entityManager->getRepository(Delivery::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countDelivery($options = null)
    {
        $repository = $this->entityManager->getRepository(Delivery::class);
        return $repository->count($options);
    }

    /**
     * @param Delivery $obj
     * @return Delivery
     */
    public function saveDelivery(Delivery $obj)
    {
        $repository = $this->entityManager->getRepository(Delivery::class);
        return $repository->save($obj);
    }

    /**
     * @param Delivery $obj
     * @return bool
     */
    public function deleteDelivery(Delivery $obj)
    {
        $repository = $this->entityManager->getRepository(Delivery::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return DeliveryLojas
     */
    public function showDeliveryLojas($id)
    {
        $repository = $this->entityManager->getRepository(DeliveryLojas::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return DeliveryLojas[]
     */
    public function listDeliveryLojas($options = null)
    {
        $repository = $this->entityManager->getRepository(DeliveryLojas::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countDeliveryLojas($options = null)
    {
        $repository = $this->entityManager->getRepository(DeliveryLojas::class);
        return $repository->count($options);
    }

    /**
     * @param DeliveryLojas $obj
     * @return DeliveryLojas
     */
    public function saveDeliveryLojas(DeliveryLojas $obj)
    {
        $repository = $this->entityManager->getRepository(DeliveryLojas::class);
        return $repository->save($obj);
    }

    /**
     * @param DeliveryLojas $obj
     * @return bool
     */
    public function deleteDeliveryLojas(DeliveryLojas $obj)
    {
        $repository = $this->entityManager->getRepository(DeliveryLojas::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Feriado
     */
    public function showFeriado($id)
    {
        $repository = $this->entityManager->getRepository(Feriado::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Feriado[]
     */
    public function listFeriados($options = null)
    {
        $repository = $this->entityManager->getRepository(Feriado::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countFeriados($options = null)
    {
        $repository = $this->entityManager->getRepository(Feriado::class);
        return $repository->count($options);
    }

    /**
     * @param Feriado $obj
     * @return Feriado
     */
    public function saveFeriado(Feriado $obj)
    {
        $repository = $this->entityManager->getRepository(Feriado::class);
        return $repository->save($obj);
    }

    /**
     * @param Feriado $obj
     * @return bool
     */
    public function deleteFeriado(Feriado $obj)
    {
        $repository = $this->entityManager->getRepository(Feriado::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return FeriadoAtendimento
     */
    public function showFeriadoAtendimento($id)
    {
        $repository = $this->entityManager->getRepository(FeriadoAtendimento::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return FeriadoAtendimento[]
     */
    public function listFeriadosAtendimento($options = null)
    {
        $repository = $this->entityManager->getRepository(FeriadoAtendimento::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countFeriadosAtendimento($options = null)
    {
        $repository = $this->entityManager->getRepository(FeriadoAtendimento::class);
        return $repository->count($options);
    }

    /**
     * @param FeriadoAtendimento $obj
     * @return FeriadoAtendimento
     */
    public function saveFeriadoAtendimento(FeriadoAtendimento $obj)
    {
        $repository = $this->entityManager->getRepository(FeriadoAtendimento::class);
        return $repository->save($obj);
    }

    /**
     * @param FeriadoAtendimento $obj
     * @return bool
     */
    public function deleteFeriadoAtendimento(FeriadoAtendimento $obj)
    {
        $repository = $this->entityManager->getRepository(FeriadoAtendimento::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return FeriadoLoja
     */
    public function showFeriadoLoja($id)
    {
        $repository = $this->entityManager->getRepository(FeriadoLoja::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return FeriadoLoja[]
     */
    public function listFeriadosLoja($options = null)
    {
        $repository = $this->entityManager->getRepository(FeriadoLoja::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countFeriadosLoja($options = null)
    {
        $repository = $this->entityManager->getRepository(FeriadoLoja::class);
        return $repository->count($options);
    }

    /**
     * @param FeriadoLoja $obj
     * @return FeriadoLoja
     */
    public function saveFeriadoLoja(FeriadoLoja $obj)
    {
        $repository = $this->entityManager->getRepository(FeriadoLoja::class);
        return $repository->save($obj);
    }

    /**
     * @param FeriadoLoja $obj
     * @return bool
     */
    public function deleteFeriadoLoja(FeriadoLoja $obj)
    {
        $repository = $this->entityManager->getRepository(FeriadoLoja::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Franquia
     */
    public function showFranquia($id)
    {
        $repository = $this->entityManager->getRepository(Franquia::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Franquia[]
     */
    public function listFranquias($options = null)
    {
        $repository = $this->entityManager->getRepository(Franquia::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countFranquias($options = null)
    {
        $repository = $this->entityManager->getRepository(Franquia::class);
        return $repository->count($options);
    }

    /**
     * @param Franquia $obj
     * @return Franquia
     */
    public function saveFranquia(Franquia $obj)
    {
        $repository = $this->entityManager->getRepository(Franquia::class);
        return $repository->save($obj);
    }

    /**
     * @param Franquia $obj
     * @return bool
     */
    public function deleteFranquia(Franquia $obj)
    {
        $repository = $this->entityManager->getRepository(Franquia::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Grupo
     */
    public function showGrupo($id)
    {
        $repository = $this->entityManager->getRepository(Grupo::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Grupo[]
     */
    public function listGrupos($options = null)
    {
        $repository = $this->entityManager->getRepository(Grupo::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countGrupos($options = null)
    {
        $repository = $this->entityManager->getRepository(Grupo::class);
        return $repository->count($options);
    }

    /**
     * @param Grupo $obj
     * @return Grupo
     */
    public function saveGrupo(Grupo $obj)
    {
        $repository = $this->entityManager->getRepository(Grupo::class);
        return $repository->save($obj);
    }

    /**
     * @param Grupo $obj
     * @return bool
     */
    public function deleteGrupo(Grupo $obj)
    {
        $repository = $this->entityManager->getRepository(Grupo::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return HorarioAtendimento
     */
    public function showHorarioAtendimento($id)
    {
        $repository = $this->entityManager->getRepository(HorarioAtendimento::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return HorarioAtendimento[]
     */
    public function listHorariosAtendimento($options = null)
    {
        $repository = $this->entityManager->getRepository(HorarioAtendimento::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countHorariosAtendimento($options = null)
    {
        $repository = $this->entityManager->getRepository(HorarioAtendimento::class);
        return $repository->count($options);
    }

    /**
     * @param HorarioAtendimento $obj
     * @return HorarioAtendimento
     */
    public function saveHorarioAtendimento(HorarioAtendimento $obj)
    {
        $repository = $this->entityManager->getRepository(HorarioAtendimento::class);
        return $repository->save($obj);
    }

    /**
     * @param HorarioAtendimento $obj
     * @return bool
     */
    public function deleteHorarioAtendimento(HorarioAtendimento $obj)
    {
        $repository = $this->entityManager->getRepository(HorarioAtendimento::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return HorarioLoja
     */
    public function showHorarioLoja($id)
    {
        $repository = $this->entityManager->getRepository(HorarioLoja::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return HorarioLoja[]
     */
    public function listHorariosLoja($options = null)
    {
        $repository = $this->entityManager->getRepository(HorarioLoja::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countHorariosLoja($options = null)
    {
        $repository = $this->entityManager->getRepository(HorarioLoja::class);
        return $repository->count($options);
    }

    /**
     * @param HorarioLoja $obj
     * @return HorarioLoja
     */
    public function saveHorarioLoja(HorarioLoja $obj)
    {
        $repository = $this->entityManager->getRepository(HorarioLoja::class);
        return $repository->save($obj);
    }

    /**
     * @param HorarioLoja $obj
     * @return bool
     */
    public function deleteHorarioLoja(HorarioLoja $obj)
    {
        $repository = $this->entityManager->getRepository(HorarioLoja::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Locadora
     */
    public function showLocadora($id)
    {
        $repository = $this->entityManager->getRepository(Locadora::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Locadora[]
     */
    public function listLocadoras($options = null)
    {
        $repository = $this->entityManager->getRepository(Locadora::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countLocadoras($options = null)
    {
        $repository = $this->entityManager->getRepository(Locadora::class);
        return $repository->count($options);
    }

    /**
     * @param Locadora $obj
     * @return Locadora
     */
    public function saveLocadora(Locadora $obj)
    {
        $repository = $this->entityManager->getRepository(Locadora::class);
        return $repository->save($obj);
    }

    /**
     * @param Locadora $obj
     * @return bool
     */
    public function deleteLocadora(Locadora $obj)
    {
        $repository = $this->entityManager->getRepository(Locadora::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Loja
     */
    public function showLoja($id)
    {
        $repository = $this->entityManager->getRepository(Loja::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Loja[]
     */
    public function listLojas($options = null)
    {
        $repository = $this->entityManager->getRepository(Loja::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countLojas($options = null)
    {
        $repository = $this->entityManager->getRepository(Loja::class);
        return $repository->count($options);
    }

    /**
     * @param Loja $obj
     * @return Loja
     */
    public function saveLoja(Loja $obj)
    {
        $repository = $this->entityManager->getRepository(Loja::class);
        return $repository->save($obj);
    }

    /**
     * @param Loja $obj
     * @return bool
     */
    public function deleteLoja(Loja $obj)
    {
        $repository = $this->entityManager->getRepository(Loja::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return PromocaoWebservice
     */
    public function showPromocaoWebservice($id)
    {
        $repository = $this->entityManager->getRepository(PromocaoWebservice::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return PromocaoWebservice[]
     */
    public function listPromocoesWebservice($options = null)
    {
        $repository = $this->entityManager->getRepository(PromocaoWebservice::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countPromocoesWebservice($options = null)
    {
        $repository = $this->entityManager->getRepository(PromocaoWebservice::class);
        return $repository->count($options);
    }

    /**
     * @param PromocaoWebservice $obj
     * @return PromocaoWebservice
     */
    public function savePromocaoWebservice(PromocaoWebservice $obj)
    {
        $repository = $this->entityManager->getRepository(PromocaoWebservice::class);
        return $repository->save($obj);
    }

    /**
     * @param PromocaoWebservice $obj
     * @return bool
     */
    public function deletePromocaoWebservice(PromocaoWebservice $obj)
    {
        $repository = $this->entityManager->getRepository(PromocaoWebservice::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return Protecao
     */
    public function showProtecao($id)
    {
        $repository = $this->entityManager->getRepository(Protecao::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return Protecao[]
     */
    public function listProtecoes($options = null)
    {
        $repository = $this->entityManager->getRepository(Protecao::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countProtecoes($options = null)
    {
        $repository = $this->entityManager->getRepository(Protecao::class);
        return $repository->count($options);
    }

    /**
     * @param Protecao $obj
     * @return Protecao
     */
    public function saveProtecao(Protecao $obj)
    {
        $repository = $this->entityManager->getRepository(Protecao::class);
        return $repository->save($obj);
    }

    /**
     * @param Protecao $obj
     * @return bool
     */
    public function deleteProtecao(Protecao $obj)
    {
        $repository = $this->entityManager->getRepository(Protecao::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return ReservaCarro
     */
    public function showReservaCarro($id)
    {
        $repository = $this->entityManager->getRepository(ReservaCarro::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return ReservaCarro[]
     */
    public function listReservasCarro($options = null)
    {
        $repository = $this->entityManager->getRepository(ReservaCarro::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countReservasCarro($options = null)
    {
        $repository = $this->entityManager->getRepository(ReservaCarro::class);
        return $repository->count($options);
    }

    /**
     * @param ReservaCarro $obj
     * @return ReservaCarro
     */
    public function saveReservaCarro(ReservaCarro $obj)
    {
        $repository = $this->entityManager->getRepository(ReservaCarro::class);
        return $repository->save($obj, $this);
    }

    /**
     * @param ReservaCarro $obj
     * @return bool
     */
    public function deleteReservaCarro(ReservaCarro $obj)
    {
        $repository = $this->entityManager->getRepository(ReservaCarro::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return ReservaCarroPesquisa
     */
    public function showReservaCarroPesquisa($id)
    {
        $repository = $this->entityManager->getRepository(ReservaCarroPesquisa::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return ReservaCarroPesquisa[]
     */
    public function listReservasCarroPesquisa($options = null)
    {
        $repository = $this->entityManager->getRepository(ReservaCarroPesquisa::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countReservasCarroPesquisa($options = null)
    {
        $repository = $this->entityManager->getRepository(ReservaCarroPesquisa::class);
        return $repository->count($options);
    }

    /**
     * @param ReservaCarroPesquisa $obj
     * @return ReservaCarroPesquisa
     */
    public function saveReservaCarroPesquisa(ReservaCarroPesquisa $obj)
    {
        $repository = $this->entityManager->getRepository(ReservaCarroPesquisa::class);
        return $repository->save($obj, $this);
    }

    /**
     * @param ReservaCarroPesquisa $obj
     * @return bool
     */
    public function deleteReservaCarroPesquisa(ReservaCarroPesquisa $obj)
    {
        $repository = $this->entityManager->getRepository(ReservaCarroPesquisa::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return TarifaGrupo
     */
    public function showTarifaGrupo($id)
    {
        $repository = $this->entityManager->getRepository(TarifaGrupo::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return TarifaGrupo[]
     */
    public function listTarifasGrupo($options = null)
    {
        $repository = $this->entityManager->getRepository(TarifaGrupo::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countTarifasGrupo($options = null)
    {
        $repository = $this->entityManager->getRepository(TarifaGrupo::class);
        return $repository->count($options);
    }

    /**
     * @param TarifaGrupo $obj
     * @return TarifaGrupo
     */
    public function saveTarifaGrupo(TarifaGrupo $obj)
    {
        $repository = $this->entityManager->getRepository(TarifaGrupo::class);
        return $repository->save($obj, $this);
    }

    /**
     * @param TarifaGrupo $obj
     * @return bool
     */
    public function deleteTarifaGrupo(TarifaGrupo $obj)
    {
        $repository = $this->entityManager->getRepository(TarifaGrupo::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return TarifaLoja
     */
    public function showTarifaLoja($id)
    {
        $repository = $this->entityManager->getRepository(TarifaLoja::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return TarifaLoja[]
     */
    public function listTarifasLoja($options = null)
    {
        $repository = $this->entityManager->getRepository(TarifaLoja::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countTarifasLoja($options = null)
    {
        $repository = $this->entityManager->getRepository(TarifaLoja::class);
        return $repository->count($options);
    }

    /**
     * @param TarifaLoja $obj
     * @return TarifaLoja
     */
    public function saveTarifaLoja(TarifaLoja $obj)
    {
        $repository = $this->entityManager->getRepository(TarifaLoja::class);
        return $repository->save($obj, $this);
    }

    /**
     * @param TarifaLoja $obj
     * @return bool
     */
    public function deleteTarifaLoja(TarifaLoja $obj)
    {
        $repository = $this->entityManager->getRepository(TarifaLoja::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return TarifaProtecao
     */
    public function showTarifaProtecao($id)
    {
        $repository = $this->entityManager->getRepository(TarifaProtecao::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return TarifaProtecao[]
     */
    public function listTarifasProtecao($options = null)
    {
        $repository = $this->entityManager->getRepository(TarifaProtecao::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countTarifasProtecao($options = null)
    {
        $repository = $this->entityManager->getRepository(TarifaProtecao::class);
        return $repository->count($options);
    }

    /**
     * @param TarifaProtecao $obj
     * @return TarifaProtecao
     */
    public function saveTarifaProtecao(TarifaProtecao $obj)
    {
        $repository = $this->entityManager->getRepository(TarifaProtecao::class);
        return $repository->save($obj, $this);
    }

    /**
     * @param TarifaProtecao $obj
     * @return bool
     */
    public function deleteTarifaProtecao(TarifaProtecao $obj)
    {
        $repository = $this->entityManager->getRepository(TarifaProtecao::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return TaxaExtraLoja
     */
    public function showTaxaExtraLoja($id)
    {
        $repository = $this->entityManager->getRepository(TaxaExtraLoja::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return TaxaExtraLoja[]
     */
    public function listTaxasExtrasLoja($options = null)
    {
        $repository = $this->entityManager->getRepository(TaxaExtraLoja::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countTaxasExtrasLoja($options = null)
    {
        $repository = $this->entityManager->getRepository(TaxaExtraLoja::class);
        return $repository->count($options);
    }

    /**
     * @param TaxaExtraLoja $obj
     * @return TaxaExtraLoja
     */
    public function saveTaxaExtraLoja(TaxaExtraLoja $obj)
    {
        $repository = $this->entityManager->getRepository(TaxaExtraLoja::class);
        return $repository->save($obj);
    }

    /**
     * @param TaxaExtraLoja $obj
     * @return bool
     */
    public function deleteTaxaExtraLoja(TaxaExtraLoja $obj)
    {
        $repository = $this->entityManager->getRepository(TaxaExtraLoja::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return TaxaOutraLoja
     */
    public function showTaxaOutraLoja($id)
    {
        $repository = $this->entityManager->getRepository(TaxaOutraLoja::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return TaxaOutraLoja[]
     */
    public function listTaxasOutraLoja($options = null)
    {
        $repository = $this->entityManager->getRepository(TaxaOutraLoja::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countTaxasOutraLoja($options = null)
    {
        $repository = $this->entityManager->getRepository(TaxaOutraLoja::class);
        return $repository->count($options);
    }

    /**
     * @param TaxaOutraLoja $obj
     * @return TaxaOutraLoja
     */
    public function saveTaxaOutraLoja(TaxaOutraLoja $obj)
    {
        $repository = $this->entityManager->getRepository(TaxaOutraLoja::class);
        return $repository->save($obj);
    }

    /**
     * @param TaxaOutraLoja $obj
     * @return bool
     */
    public function deleteTaxaOutraLoja(TaxaOutraLoja $obj)
    {
        $repository = $this->entityManager->getRepository(TaxaOutraLoja::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return TelefoneCidade
     */
    public function showTelefoneCidade($id)
    {
        $repository = $this->entityManager->getRepository(TelefoneCidade::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return TelefoneCidade[]
     */
    public function listTelefonesCidade($options = null)
    {
        $repository = $this->entityManager->getRepository(TelefoneCidade::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countTelefonesCidade($options = null)
    {
        $repository = $this->entityManager->getRepository(TelefoneCidade::class);
        return $repository->count($options);
    }

    /**
     * @param TelefoneCidade $obj
     * @return TelefoneCidade
     */
    public function saveTelefoneCidade(TelefoneCidade $obj)
    {
        $repository = $this->entityManager->getRepository(TelefoneCidade::class);
        return $repository->save($obj);
    }

    /**
     * @param TelefoneCidade $obj
     * @return bool
     */
    public function deleteTelefoneCidade(TelefoneCidade $obj)
    {
        $repository = $this->entityManager->getRepository(TelefoneCidade::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return TelefoneNumero
     */
    public function showTelefoneNumero($id)
    {
        $repository = $this->entityManager->getRepository(TelefoneNumero::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return TelefoneNumero[]
     */
    public function listTelefonesNumero($options = null)
    {
        $repository = $this->entityManager->getRepository(TelefoneNumero::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countTelefonesNumero($options = null)
    {
        $repository = $this->entityManager->getRepository(TelefoneNumero::class);
        return $repository->count($options);
    }

    /**
     * @param TelefoneNumero $obj
     * @return TelefoneNumero
     */
    public function saveTelefoneNumero(TelefoneNumero $obj)
    {
        $repository = $this->entityManager->getRepository(TelefoneNumero::class);
        return $repository->save($obj);
    }

    /**
     * @param TelefoneNumero $obj
     * @return bool
     */
    public function deleteTelefoneNumero(TelefoneNumero $obj)
    {
        $repository = $this->entityManager->getRepository(TelefoneNumero::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return VendaLivre
     */
    public function showVendaLivre($id)
    {
        $repository = $this->entityManager->getRepository(VendaLivre::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return VendaLivre[]
     */
    public function listVendaLivre($options = null)
    {
        $repository = $this->entityManager->getRepository(VendaLivre::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countVendaLivre($options = null)
    {
        $repository = $this->entityManager->getRepository(VendaLivre::class);
        return $repository->count($options);
    }

    /**
     * @param VendaLivre $obj
     * @return VendaLivre
     */
    public function saveVendaLivre(VendaLivre $obj)
    {
        $repository = $this->entityManager->getRepository(VendaLivre::class);
        return $repository->save($obj);
    }

    /**
     * @param VendaLivre $obj
     * @return bool
     */
    public function deleteVendaLivre(VendaLivre $obj)
    {
        $repository = $this->entityManager->getRepository(VendaLivre::class);
        return $repository->delete($obj);
    }

    /**
     * @param $id
     * @return XmlProdutos
     */
    public function showXmlProdutos($id)
    {
        $repository = $this->entityManager->getRepository(XmlProdutos::class);
        return $repository->find($id, $this);
    }

    /**
     * @param $options
     * @return XmlProdutos[]
     */
    public function listXmlsProdutos($options = null)
    {
        $repository = $this->entityManager->getRepository(XmlProdutos::class);
        return $repository->fetchAll($options, $this);
    }

    /**
     * @param $options
     * @return int
     */
    public function countXmlsProdutos($options = null)
    {
        $repository = $this->entityManager->getRepository(XmlProdutos::class);
        return $repository->count($options);
    }

    /**
     * @param XmlProdutos $obj
     * @return XmlProdutos
     */
    public function saveXmlProdutos(XmlProdutos $obj)
    {
        $repository = $this->entityManager->getRepository(XmlProdutos::class);
        return $repository->save($obj);
    }

    /**
     * @param XmlProdutos $obj
     * @return bool
     */
    public function deleteXmlProdutos(XmlProdutos $obj)
    {
        $repository = $this->entityManager->getRepository(XmlProdutos::class);
        return $repository->delete($obj);
    }

}
