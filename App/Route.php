<?php 
namespace App;
//parao autoload funcionar

use MF\Init\Bootstrap;
class Route extends Bootstrap{

   protected function initRoutes()
    {
        $routes['home'] = array(
            'route' => '/',
            'controller'=>'indexController',
            'action' => 'index'
        );
        $routes['increverse'] = array(
            'route' => '/inscreverse',
            'controller'=>'indexController',
            'action' => 'inscreverse'
        );
        $routes['registrar'] = array(
            'route' => '/registrar',
            'controller'=>'indexController',
            'action' => 'registrar'
        );
        $routes['autenticar'] = array(
            'route' => '/autenticar',
            'controller'=>'AuthController',
            'action' => 'autenticar'
        );
        $routes['timeline'] = array(
            'route' => '/timeline',
            'controller'=>'AppController',
            'action' => 'timeline'
        );
        $routes['sair'] = array(
            'route' => '/sair',
            'controller'=>'AuthController',
            'action' => 'sair'
        );
        $routes['tweet'] = array(
            'route' => '/tweet',
            'controller'=>'AppController',
            'action' => 'tweet'
        );
        $routes['quemseguir'] = array(
            'route' => '/quemseguir',
            'controller'=>'AppController',
            'action' => 'quemseguir'
        );
        $routes['acao'] = array(
            'route' => '/acao',
            'controller'=>'AppController',
            'action' => 'acao'
        );
        $routes['exluir'] = array(
            'route' => '/excluir',
            'controller'=>'AppController',
            'action' => 'excluir'
        );
        $this->setRoutes($routes);
    }

    
}

?>