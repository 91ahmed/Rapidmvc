<?php
// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
// ...
$router->get('/', '\App\Controller\HomeController@index');

// Run it!
$router->run();

?>