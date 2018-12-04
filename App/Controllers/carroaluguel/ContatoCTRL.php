<?php

namespace Carroaluguel\Controllers\carroaluguel;


use Carroaluguel\Controllers\ILandingPage;
use Core\Controller;
use Psr\Http\Message\ServerRequestInterface;

class ContatoCTRL extends Controller implements ILandingPage
{
    public function __construct($generator)
    {
        parent::__construct($generator);
    }

    public function index(ServerRequestInterface $request)
    {
        if($this->agent->isMobile()){
            $this->indexMobile($request);
            exit;
        }
        $this->resources->add('css', '/css/contato.css');
        $res = $this->resources->toData();
        var_dump($res);
        $dados = [
            'css' => $res['css']
        ];
        $this->render('home/lp_contato.tpl',$dados);
    }

    public function indexMobile(ServerRequestInterface $request)
    {
        // TODO: Implement indexMobile() method.
    }

    public function getCss()
    {
        //$this->resources->add('unique_css', '/css/carroaluguel/colors.min.css');
        $this->resources->add('unique_css', 'css/foundation-5/normalize.css');
        $this->resources->add('unique_css', 'css/foundation-5/foundation.css');
        $this->resources->add('unique_css', 'css/ie8-grid.css');
        $this->resources->add('unique_css', 'css/carroaluguel/jquery-ui.css');
        $this->resources->add('unique_css', 'css/validationEngine.jquery.css');
        $this->resources->add('unique_css', 'css/carroaluguel/geral/geral.css');
        $this->resources->add('unique_css', 'css/carroaluguel/geral/footer.css');
        $this->resources->add('unique_css', 'css/carroaluguel/home/contato.css');
        echo $this->resources->getCss();
    }

    public function getJs()
    {
        $this->up_js->add('js', '/js/carroaluguel/jquery-1.11.1.min.js');
        $this->up_js->add('js', '/js/flash.js');
        $this->resources->add('js', '/js/vendor/custom.modernizr.js');
        $this->resources->add('js', '/js/carroaluguel/jquery.waitforimages.min.js');
        $this->resources->add('js', '/js/carroaluguel/jquery-ui.min.js');
        $this->resources->add('js', '/js/foundation/foundation.min.js');
        $this->resources->add('js', '/js/foundation/foundation.reveal.js');
        $this->resources->add('js', '/js/vendor/zepto.min.js');
        $this->resources->add('js', '/js/cufon-yui.js');
        $this->resources->add('js', '/js/Angelina_400.font.js');
        $this->resources->add('js', '/js/carroaluguel/jquery.validationEngine-pt_BR.js');
        $this->resources->add('js', '/js/carroaluguel/jquery.validationEngine.min.js');
        $this->resources->add('js', '/js/carroaluguel/jquery.maskedinput.min.js');
        $this->resources->add('js', 'https://maps.google.com/maps/api/js?sensor=false&region=BR');
        $this->resources->add('js', '/js/carroaluguel/funilreservas/contato.min.js');
    }

}