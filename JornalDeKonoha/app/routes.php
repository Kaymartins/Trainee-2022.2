<?php

use App\Core\Router;

//-----------Rotas do Front-------------//
//Rota de exemplo: 
//Rota para pagina inicial

// $router->get('home', 'TestController@index');
$router->get('users', 'UserController@index');
$router->post('users/delete', 'UserController@delete');
$router->post('users/create', 'UserController@create');
$router->post('users/update', 'UserController@update');