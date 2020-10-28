<?php

use CoffeeCode\Router\Router;

require_once "./vendor/autoload.php";

$router = new Router(ROOT);
$router->namespace("Src\Controllers");

$router->group(null);

$router->get("/", "App:home", "app.home");
$router->post("/create", "", "");
$router->get("/{id}/update", "", "");
$router->get("/save", "", "");
$router->post("/delete", "", "");

$router->dispatch();

if ($router->error()) {
  var_dump($router->error());
}
