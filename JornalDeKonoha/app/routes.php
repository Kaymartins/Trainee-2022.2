<?php

use App\Core\Router;

//-----------Rotas do Front-------------//
//Rota de exemplo: 
//Rota para pagina inicial

//-----------User-------------//

$router->get('home', 'HomeController@index');
$router->get('', 'HomeController@index');
$router->get('login', 'LoginController@index');

$router->get('listaposts', 'ListaPostController@index');
$router->get('listaposts/search', 'ListaPostController@search');

//-----------Admin-------------//

$router->get('posts', 'PostController@index');
$router->post('posts/create', 'PostController@create');
$router->post('posts/update', 'PostController@update');
$router->post('posts/delete', 'PostController@delete');

$router->get('users', 'UserController@index');
$router->post('users/delete', 'UserController@delete');
$router->post('users/create', 'UserController@create');
$router->post('users/update', 'UserController@update');