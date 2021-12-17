<?php


namespace App\Controller;

use App\Model\Usuario;
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{
    
    public function timeline(){

        session_start();

        if($_SESSION['id']!= '' && $_SESSION['nome'] != '')
        {
           $tweet = Container::getModel('Tweet');
           $tweet->__set('id_usuario',$_SESSION['id']);
          
         

          //variaveis de paginação
          $total_registros_pagina = 10;
          $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1 ;
          $deslocamento = ($pagina - 1)* $total_registros_pagina;
          $this->view->pagina_ativa = $pagina;
        //   $total_registros_pagina = 10;
        //   $deslocamento = 10;
        //   $pagina = 2;

         // echo "<br><br><br><br><br>Página: $pagina Total de registros: $total_registros_pagina | Deslocamento: $deslocamento";
          $tweets =  $tweet->getPorPagina($total_registros_pagina,$deslocamento);
          $total_tweets = $tweet->getTotalregistros();
          $this->view->total_de_paginas = ceil($total_tweets['total']/$total_registros_pagina);
          $this->view->tweets= $tweets;
         // echo '<br>' .$total_tweets['total'];

         $usuario = Container::getModel('Usuario');
         $usuario->__set('id',$_SESSION['id']);
       $this->view->info_totaltweets = $usuario->getTotalTweets();
       $this->view->info_usuario = $usuario->getinfoUsuario();
       $this->view->info_totalseguindo = $usuario->getTotalseguindo();
       $this->view->info_totalseguidores = $usuario->getTotalseguidores();

         $this->render('timeline');
        }
        else{
            header('Location: /?login=erro');
        }
     
    }
    public function tweet()
    {
        session_start();

        if($_SESSION['id']!= '' && $_SESSION['nome'] != '')
        {
           $tweet = Container::getModel('Tweet');

           $tweet->__set('tweet',$_POST['tweet']);
           $tweet->__set('id_usuario',$_SESSION['id']);
          // $tweet->__set('img',$_POST['img']);
           $tweet->salvar();

           header('location: /timeline');
            
        }
        else{
            header('Location: /?login=erro');
        }
        

    }
    public function quemseguir(){
        session_start();

        if($_SESSION['id']!= '' && $_SESSION['nome'] != '')
        {   

            $pesquisarPor = isset($_GET['pesquisarPor']) ? $_GET['pesquisarPor'] : '';
		
            $usuarios = array();
            if($pesquisarPor != '') {
                
                $usuario = Container::getModel('Usuario');
                $usuario->__set('nome', $pesquisarPor);
                $usuario->__set('id',$_SESSION['id']);
                $usuarios = $usuario->getAll();
            }
    
            $this->view->usuarios = $usuarios;
    
            $this->render('quemSeguir');
           
        }
        else{
            header('Location: /?login=erro');
        }
        

    }
    public function acao(){
        session_start();

        if($_SESSION['id']!= '' && $_SESSION['nome'] != '')
        {   

         $acao = isset($_GET['acao'])? $_GET['acao'] : '';
         $id_usuario_seguindo = isset($_GET['id_usuario'])? $_GET['id_usuario'] : '';
        
         $usuario = Container::getModel('Usuario');
         $usuario->__set('id',$_SESSION['id']);

         if($acao == 'seguir')
         {
            $usuario->seguirUsuario($id_usuario_seguindo);
            header('Location: /quemseguir?pesquisarPor=');
         }
         else if($acao == 'deixar_de_seguir')
         {
            $usuario->deixarSeguirUsuario($id_usuario_seguindo);
            header('Location: /quemseguir?pesquisarPor=');
         }
        }
        else{
            header('Location: /?login=erro');
        }
        

    }
    public function excluir(){
        session_start();

        if($_SESSION['id']!= '' && $_SESSION['nome'] != '')
        {   
            $tweet = Container::getModel('Tweet');
            $tweet->__set('id_usuario',$_SESSION['id']);
            $tweet->__set('id',$_GET['id']);
            $tweet->excluir();
            header('Location: /timeline');
        
        }
        else{
            header('Location: /?login=erro');
        }
    }
}

?>