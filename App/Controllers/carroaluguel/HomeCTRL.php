<?php

namespace Carroaluguel\Controllers\carroaluguel;


use Carroaluguel\Controllers\ILandingPage;
use Core\Controller;
use Core\Language;
use Psr\Http\Message\ServerRequestInterface;

class HomeCTRL extends Controller implements ILandingPage
{
    public function __construct($generator)
    {
        parent::__construct($generator);
        if($this->agent->isMobile()) {
            $this->setResources(TRUE);
        }else{
            $this->setResources();
        }
    }

    function index(ServerRequestInterface $request)
    {
        if($this->agent->isMobile()){
            $this->indexMobile($request);
            exit;
        }
        if (isset($_COOKIE['dadosPesquisa_modalCTA']) && $_COOKIE['dadosPesquisa_modalCTA'] != "") {
            $dadosModalCTA = unserialize($_COOKIE['dadosPesquisa_modalCTA']);
            $this->smarty->assign('trava_modalCTA', 1);
            $this->smarty->assign('arr_dados_cookie', $dadosModalCTA);
            $this->smarty->assign('travaESPECIAL', 1);
        }

        $cssjs = $this->resources->toData();
        $dados['css'] = "<link rel='stylesheet' type='text/css' href='/css/carroaluguel/css_minified/home.css'/>";
        $dados['js'] = $cssjs['js'];

        if (!isset($_GET['att'])) {
            if (isset($_COOKIE['userafil']) && in_array($_COOKIE['userafil'], $this->afiliados_operadores)) {
                $this->resources->add('js', '/js/responsivo/operadores_motivo.js');
            } else {
                if (isset($_GET['afiliado']) && in_array($_GET['afiliado'], $this->afiliados_operadores)) {
                    $this->resources->add('js', '/js/responsivo/operadores_motivo.js');
                }
            }
        }

        $new_combo = $this->aluguelcarros->listLocadoras(array(
            'ativo' => 1,
            'sortBy' => 'locadora',
            'sortDirection' => 'ASC'
        ));
        $dados['combo_locs'] = $new_combo;
        $nmb_locadoras = count($new_combo);
        $lista_lojas = $this->aluguelcarros->countLojas(array('loja_ativa' => 1));
        $nmb_cidades = $this->aluguelcarros->countLojas(array('cidades_ativas' => true));
        $lang_array = new Language('home.xml', array(
                'nmb_locadoras' => $nmb_locadoras,
                'nmb_locadoras_mais' => ($nmb_locadoras - 8),
                'nmb_cidades' => $nmb_cidades,
                'nmb_lojas' => $lista_lojas
            )
        );
        $dados['language'] = $lang_array->getTraducao();
        //$this->render('home/lp_home.tpl',$dados);
    }

    public function indexMobile(ServerRequestInterface $request)
    {

    }

    public function getCss()
    {
        echo $this->resources->getCss('home');
    }

    public function getJs()
    {
        echo $this->resources->getJs('home');
    }

    public function setResources($mobile = false)
    {
        if ($mobile) {
            $this->resources->add('css', '/css/ie8-grid.min.css')
                ->add('css', '/css/carroaluguel/jquery-ui.min.css')
                ->add('css', '/css/validationEngine.jquery.min.css')
                ->add('css', '/css/carroaluguel/icones_acessorios.min.css')
                ->add('css', '/css/carroaluguel/imagens_opcionais.min.css')
                ->add('css', '/css/carroaluguel/slick.min.css')
                ->add('css', '/css/carroaluguel/slick-theme.min.css')
                ->add('css', '/js/carroaluguel/cotacao/jquery.bxslider/jquery.bxslider.css')
                ->add('css', '/css/carroaluguel/cotacao/default.css')
                ->add('css', '/css/carroaluguel/cotacao/default.date.css')
                ->add('css', '/css/carroaluguel/cotacao/default.time.css')
                ->add('css', '/css/carroaluguel/funilreservas/geral.css')
                ->add('css', '/css/carroaluguel/funilreservas/home_eraldo.css')
                ->add('css', '/css/carroaluguel/combo_autocomplete.css')
                ->add('css', '/css/carroaluguel/lp-locadoras/sweetalert2.css')
                ->add('js', '/js/carroaluguel/jquery-1.11.1.min.js')
                ->add('js', '/js/vendor/custom.modernizr.js')
                ->add('js', '/js/carroaluguel/jquery.waitforimages.min.js')
                ->add('js', '/js/carroaluguel/jquery-ui.min.js')
                ->add('js', '/js/carroaluguel/cotacao/picker.js')
                ->add('js', '/js/carroaluguel/cotacao/picker.date.js')
                ->add('js', '/js/carroaluguel/cotacao/picker.time.js')
                ->add('js', '/js/carroaluguel/cotacao/legacy.js')
                ->add('js', '/js/foundation/foundation.min.js')
                ->add('js', '/js/foundation/foundation.reveal.js')
                ->add('js', '/foundation-5/js/foundation/foundation.orbit.min.js')
                ->add('js', '/js/validator.js')
                ->add('js', '/js/jquery.autocomplete.js')
                ->add('js', '/js/carroaluguel/combo_autocomplete.js')
                ->add('js', '/js/vendor/zepto.min.js')
                ->add('js', '/js/cufon-yui.js')
                ->add('js', '/js/Angelina_400.font.js')
                ->add('js', '/js/carroaluguel/jquery.validationEngine-pt_BR.js')
                ->add('js', '/js/carroaluguel/jquery.validationEngine.min.js')
                ->add('js', '/js/carroaluguel/jquery.maskedinput.min.js')
                ->add('js', 'https://d335luupugsy2.cloudfront.net/js/integration/stable/rd-js-integration.min.js')
                ->add('js', '/js/carroaluguel/cotacao/pt_BR.js')
                ->add('js', '/js/carroaluguel/cotacao/home_mobile.js')
                ->add('js', '/js/carroaluguel/cotacao/jquery.bxslider/jquery.bxslider.min.js')
                ->add('js', '/js/carroaluguel/cotacao/funcoes_home.js')
                ->add('js', '/js/carroaluguel/exitintent.js')
                ->add('js', '/js/carroaluguel/slick.min.js')
                ->add('js', '/js/carroaluguel/funilreservas/sweetalert2.js')
                ->add('js', '/css/carroaluguel/nh_slider/gnmenu.js')
                ->add('js', '/js/foundation/foundation.offcanvas.js');
        } else {
            $this->resources->add('css', '/css/ie8-grid.min.css')
                ->add('css', '/css/carroaluguel/jquery-ui.min.css')
                ->add('css', '/css/validationEngine.jquery.min.css')
                ->add('css', '/css/carroaluguel/icones_acessorios.min.css')
                ->add('css', '/css/carroaluguel/imagens_opcionais.min.css')
                ->add('css', '/css/carroaluguel/slick.min.css')
                ->add('css', '/css/carroaluguel/slick-theme.min.css')
                ->add('css', '/js/carroaluguel/cotacao/jquery.bxslider/jquery.bxslider.css')
                ->add('css', '/css/carroaluguel/cotacao/default.css')
                ->add('css', '/css/carroaluguel/cotacao/default.date.css')
                ->add('css', '/css/carroaluguel/cotacao/default.time.css')
                ->add('css', '/css/carroaluguel/funilreservas/geral.css')
                ->add('css', '/css/carroaluguel/funilreservas/home_eraldo.css')
                ->add('css', '/css/carroaluguel/combo_autocomplete.css')
                ->add('css', '/css/carroaluguel/lp-locadoras/sweetalert2.css')
                ->add('js', '/js/carroaluguel/jquery-1.11.1.min.js')
                ->add('js', '/js/vendor/custom.modernizr.js')
                ->add('js', '/js/carroaluguel/jquery.waitforimages.min.js')
                ->add('js', '/js/carroaluguel/jquery-ui.min.js')
                ->add('js', '/js/carroaluguel/cotacao/picker.js')
                ->add('js', '/js/carroaluguel/cotacao/picker.date.js')
                ->add('js', '/js/carroaluguel/cotacao/picker.time.js')
                ->add('js', '/js/carroaluguel/cotacao/legacy.js')
                ->add('js', '/js/foundation/foundation.min.js')
                ->add('js', '/js/foundation/foundation.reveal.js')
                ->add('js', '/foundation-5/js/foundation/foundation.orbit.min.js')
                ->add('js', '/js/validator.js')
                ->add('js', '/js/jquery.autocomplete.js')
                ->add('js', '/js/carroaluguel/combo_autocomplete.js')
                ->add('js', '/js/vendor/zepto.min.js')
                ->add('js', '/js/cufon-yui.js')
                ->add('js', '/js/Angelina_400.font.js')
                ->add('js', '/js/carroaluguel/jquery.validationEngine-pt_BR.js')
                ->add('js', '/js/carroaluguel/jquery.validationEngine.min.js')
                ->add('js', '/js/carroaluguel/jquery.maskedinput.min.js')
                ->add('js', 'https://d335luupugsy2.cloudfront.net/js/integration/stable/rd-js-integration.min.js')
                ->add('js', '/js/carroaluguel/cotacao/pt_BR.js')
                ->add('js', '/js/carroaluguel/cotacao/home_mobile.js')
                ->add('js', '/js/carroaluguel/cotacao/jquery.bxslider/jquery.bxslider.min.js')
                ->add('js', '/js/carroaluguel/cotacao/funcoes_home.js')
                ->add('js', '/js/carroaluguel/exitintent.js')
                ->add('js', '/js/carroaluguel/slick.min.js')
                ->add('js', '/js/carroaluguel/funilreservas/sweetalert2.js')
                ->add('js', '/css/carroaluguel/nh_slider/gnmenu.js')
                ->add('js', '/js/foundation/foundation.offcanvas.js');
        }
    }
}