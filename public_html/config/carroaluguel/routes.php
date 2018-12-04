<?php
$routes = [
    '/' => [
        'type' => 'get',
        'name' => 'home',
        'controller' => 'HomeCTRL',
        'action' => 'index',
        'crud' => false
    ],
    '/telefones-atendimento' => [
        'type' => 'get',
        'name' => 'contato',
        'controller' => 'ContatoCTRL',
        'action' => 'index',
        'crud' => false
    ],
    '/admin/read' => [
        'type' => 'get',
        'name' => 'read',
        'controller' => 'IndexController',
        'action' => 'actionHello',
        'crud' => false
    ],
    '/admin/statusvenda' => [
        'type' => 'get',
        'name' => 'statusvenda',
        'controller' => 'IndexController',
        'action' => 'statusVenda',
        'crud' => true
    ]
];