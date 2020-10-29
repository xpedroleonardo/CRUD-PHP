<?php

use CoffeeCode\Router\Router;

require_once "./vendor/autoload.php";

$router = new Router(ROOT);
$router->namespace("Src\Controllers");

$router->group(null);

$router->get("/", "App:home", "app.home");
$router->get("/create", "App:create", "app.create");
$router->post("/saveCreate", "App:saveCreate", "app.saveCreate");

$router->get("/products", "App:read", "app.read");

$router->get("/{id}/update", "", "");
$router->get("/save", "", "");
$router->post("/delete", "", "");

$router->dispatch();

// if ($router->error()) {
//   var_dump($router->error());
// }
