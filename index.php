<?php

use CoffeeCode\Router\Router;

require_once "./vendor/autoload.php";

$router = new Router(ROOT);
$router->namespace("Src\Controllers");

$router->group(null);

$router->get("/", "App:home", "app.home");
$router->get("/create", "App:create", "app.create");
$router->get("/products", "App:read", "app.read");
$router->get("/{id}/detail", "App:detail", "app.detail");
$router->get("/{id}/edit", "App:edit", "app.edit");
$router->get("/erro", "App:erro", "app.erro");

$router->post("/saveCreate", "App:saveCreate", "app.saveCreate");
$router->post("/saveEdit", "App:saveEdit", "app.saveEdit");
$router->post("/delete", "App:delete", "app.delete");

$router->dispatch();

// if ($router->error()) {
//   var_dump($router->error());
// }
