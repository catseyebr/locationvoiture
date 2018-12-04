<?php

namespace Core;

use Aura\Router\Generator;
use Carroaluguel\Models\AfiliadosFacade;
use Carroaluguel\Models\AluguelCarrosFacade;
use Carroaluguel\Models\FinanceiroFacade;
use Carroaluguel\Models\LocalidadeFacade;
use Carroaluguel\Models\UtilizadorFacade;
use Jenssegers\Agent\Agent;
use Pimple\Container;
use Zend\Diactoros\Response;

class Controller
{
    /**
     * @var Container
     */
    private $container;
    /**
     * @var EntityManager
     */
    public $entityManager;
    /**
     * @var \Smarty
     */
    public $smarty;
    /**
     * @var Response
     */
    public $response;
    /**
     * @var Generator
     */
    public $generator;
    /**
     * @var Resources
     */
    public $resources;
    /**
     * @var AluguelCarrosFacade
     */
    public $aluguelcarros;
    /**
     * @var LocalidadeFacade
     */
    public $localidade;
    /**
     * @var UtilizadorFacade
     */
    public $utilizador;
    /**
     * @var FinanceiroFacade
     */
    public $financeiro;
    /**
     * @var AfiliadosFacade
     */
    public $afiliados;
    /**
     * @var Agent
     */
    public $agent;
    /**
     * @var array
     */
    public $afiliados_operadores;

    public function __construct($generator)
    {
        $this->generator = $generator;
        $this->response = new Response();
        $this->container = new Container();
        $this->container['dsn'] = "mysql:host=177.153.8.168;dbname=layum";
        $this->container['user'] = "root";
        $this->container['pass'] = "Trav0510Lay2506";
        $this->agent = new Agent();
        $this->setEntityManager();
        $this->setSmarty();
        $this->setFacades();
        $this->setResources();
        $this->setAtendimento();
    }

    private function setEntityManager()
    {
        $this->container['conn'] = function ($c) {
            return new Conn($c['dsn'], $c['user'], $c['pass']);
        };
        $this->entityManager = $this->container['conn']->getEntityManager();
    }

    public function setSmarty()
    {
        $this->container['smarty'] = function () {
            return new \Smarty();
        };
        $this->smarty = $this->container['smarty'];
        $this->smarty->setCompileDir(__DIR__ . "/../../App/Views/templates_c/" . SITE);
        $this->smarty->setTemplateDir(__DIR__ . "/../../App/Views/" . SITE);
        $this->smarty->setCacheDir(__DIR__ . "/../../App/Views/cache/" . SITE);
        $this->smarty->setConfigDir(__DIR__ . "/../../App/Views/config/" . SITE);
        $this->smarty->setPluginsDir(__DIR__ . "/../smarty/smarty/libs/plugins");
        $this->smarty->muteExpectedErrors();
    }

    public function render($templateFile, $data = null)
    {
        if (is_array($data)) {
            foreach ($data as $dkey => $d) {
                $this->smarty->assign($dkey, $d);
            }
        }
        $output = $this->smarty->fetch($templateFile);
        $this->response->getBody()->write($output);
        echo $this->response->getBody();
    }

    public function redirect($routeName, $status = 302)
    {
        $uri = $this->generator->generate($routeName);
        $rsp = new Response\RedirectResponse($uri, $status);
        header("location:{$rsp->getHeader("location")[0]}");
    }

    public function setFacades()
    {
        $this->container['aluguelcarros'] = function () {
            return new AluguelCarrosFacade($this->entityManager);
        };
        $this->aluguelcarros = $this->container['aluguelcarros'];
        $this->container['localidade'] = function () {
            return new LocalidadeFacade($this->entityManager);
        };
        $this->localidade = $this->container['localidade'];
        $this->container['utilizador'] = function () {
            return new UtilizadorFacade($this->entityManager);
        };
        $this->utilizador = $this->container['utilizador'];
        $this->container['financeiro'] = function () {
            return new FinanceiroFacade($this->entityManager);
        };
        $this->financeiro = $this->container['financeiro'];
        $this->container['afiliados'] = function () {
            return new AfiliadosFacade($this->entityManager);
        };
        $this->financeiro = $this->container['afiliados'];
    }

    private function setResources()
    {
        $this->container['resources'] = function () {
            return new Resources();
        };
        $this->resources = $this->container['resources'];
    }

    private function setAtendimento()
    {
        $this->container['afiliados_operadores'] = function () {
            return array(20120012, 20120013, 20120014, 20120015, 20120016, 20120017, 20120018);
        };
        $this->afiliados_operadores = $this->container['afiliados_operadores'];
    }
}