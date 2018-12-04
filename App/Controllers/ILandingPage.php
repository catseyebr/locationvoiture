<?php


namespace Carroaluguel\Controllers;


use Psr\Http\Message\ServerRequestInterface;

interface ILandingPage
{
    public function __construct($generator);

    public function index(ServerRequestInterface $request);

    public function indexMobile(ServerRequestInterface $request);

    /**
     * Para gerar um novo css unico acessar a url: /css_minified/(nome do site - carroaluguel)/(nome da página - o "name" na rota).css
     * o css gerado fica salvo em public_html/css/(nome do site)/css_minified
     */
    public function getCss();

    public function getJs();

    public function setResources($mobile = FALSE);
}