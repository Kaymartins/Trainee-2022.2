<?php

use App\Core\Router;

//-----------Rotas do Front-------------//
//Rota de exemplo: 
//Rota para pagina inicial

//$router->get('home', 'TestController@index');


$router->get('posts', 'PostController@index');