<?php

namespace Core;

use Aura\Router\RouterContainer;
use Zend\Diactoros\ServerRequestFactory;

class Route
{
    private $routeContainer;

    public function __construct()
    {
        $request = ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
        $this->routeContainer = new RouterContainer();
        $this->setSite($request->getServerParams());
        $this->setLanguage($request->getServerParams());
        $generator = $this->routeContainer->getGenerator();
        $this->generateMap();
        $matcher = $this->routeContainer->getMatcher();
        $route = $matcher->match($request);
        if (!$route) {
            header("HTTP/1.0 404 Not Found");
            echo "Url não encontrada";
            exit();
        }
        if (isset($route->handler['values']["controller"])) {
            $controller_file = 'Carroaluguel\Controllers\\' . SITE . '\\' . $route->handler['values']["controller"];
            if (class_exists($controller_file)) {
                $controller = $controller_file;
            } else {
                $controller = 'Carroaluguel\Controllers\\' . SITE . '\NotFoundController';
            }
        } else {
            $controller = 'Carroaluguel\Controllers\\' . SITE . '\NotFoundController';
        }
        if (isset($route->handler['values']["action"])) {
            $action = $route->handler['values']["action"];
        } else {
            $action = "index";
        }
        $page = new $controller($generator);
        foreach ($route->attributes as $key => $value) {
            $request = $request->withAttribute($key, $value);
        }
        if (method_exists($page, $action)) {
            $exec_action = $action;
        } else {
            $exec_action = 'index';
        }
        echo $page->$exec_action($request);
    }

    private function generateMap()
    {
        $map = $this->routeContainer->getMap();
        $routes = null;
        $arr_crud = [
            'list' => [
                'type' => 'get',
                'params' => '',
                'url' => ''
            ],
            'create' => [
                'type' => 'get',
                'params' => '',
                'url' => '/create'
            ],
            'store' => [
                'type' => 'post',
                'params' => '',
                'url' => '/store'
            ],
            'edit' => [
                'type' => 'get',
                'params' => '/{id}',
                'url' => '/edit'
            ],
            'update' => [
                'type' => 'post',
                'params' => '/{id}',
                'url' => '/update'
            ],
            'remove' => [
                'type' => 'get',
                'params' => '/{id}',
                'url' => '/remove'
            ],
            'find' => [
                'type' => 'get',
                'params' => '',
                'url' => '/find'
            ],
        ];

        require_once __DIR__ . "/../../public_html/config/" . SITE . "/routes.php";
        if (is_array($routes)) {
            foreach ($routes as $key => $val) {
                if ($val['crud']) {
                    foreach ($arr_crud as $vkey => $verb) {
                        $map->$verb['type']($val['name'] . '.' . $vkey, $key . $verb['params'] . $verb['url'], [
                            "values" => [
                                "controller" => $val['controller'],
                                "action" => $val['action'] . ucfirst($vkey)
                            ]
                        ]);
                    }
                } else {
                    $map->$val['type']($val['name'], $key, [
                        "values" => [
                            "controller" => $val['controller'],
                            "action" => $val['action']
                        ]
                    ]);
                    $map->get($val['name'] . '_css', "/css_minified/".SITE."/". $val['name'] . ".css", [
                        "values" => [
                            "controller" => $val['controller'],
                            "action" => 'getCss'
                        ]
                    ]);
                    $map->get($val['name'] . '_js', "/js_minified/".SITE."/" . $val['name'] . ".js", [
                        "values" => [
                            "controller" => $val['controller'],
                            "action" => 'getJs'
                        ]
                    ]);
                }
            }
        }
    }

    public function setSite($request)
    {
        $host = str_replace('www.', '', $request['HTTP_HOST']);
        $site_array = [
            'carroaluguel.net' => 'carroaluguel',
            'carroaluguel.com' => 'carroaluguel',
            'layum.com' => 'layum',
            'layum.tur.br' => 'layumtur'
        ];
        if (isset($site_array[$host])) {
            $site = $site_array[$host];
        } else {
            $site = 'carroaluguel';
        }
        define('SITE', $site);
    }

    public function setLanguage($request)
    {
        $host = str_replace('www.', '', $request['HTTP_HOST']);
        $servidor_arr = explode('.',$host);
        if($servidor_arr[0] == 'en'){
            define('LANGUAGE','en');
        }else if($servidor_arr[0] == 'es'){
            define('LANGUAGE','es');
        }else{
            define('LANGUAGE','pt');
        }
    }
}