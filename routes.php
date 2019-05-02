<?php
namespace Core;

Router::connect('/PiePHP/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/PiePHP/app', ['controller' => 'app', 'action' => 'index']);

Router::connect('/PiePHP/user/add', ['controller' => 'user', 'action' => 'add']);

Router::connect('/PiePHP/home', ['controller' => 'user', 'action' => 'index']);
Router::connect('/PiePHP/register', ['controller' => 'user', 'action' => 'add']);
Router::connect('/PiePHP/login', ['controller' => 'user', 'action' => 'login']);
Router::connect('/PiePHP/user/logout', ['controller' => 'user', 'action' => 'logout']);
Router::connect('/PiePHP/user/show', ['controller' => 'user', 'action' => 'show']);

Router::connect('/PiePHP/movies', ['controller' => 'movie', 'action' => 'movie']);
Router::connect('/PiePHP/add/movies', ['controller' => 'movie', 'action' => 'movie']);
Router::connect('/PiePHP/delete/movies', ['controller' => 'movie', 'action' => 'movie']);