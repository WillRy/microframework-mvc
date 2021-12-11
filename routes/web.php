<?php
$route = new \CoffeeCode\Router\Router(base_url(), ":");
$route->namespace("App\Controllers");

$route->group(null);
$route->get("/", "WebController:home");
$route->get("/session", "WebController:session");

/**pesquisa de usuarios*/
$route->group(null);
$route->get("/users", "UserController:index");

/** exemplo de debug */
$route->get("/debug", "UserController:debug");

/**JSON de usuários*/
$route->group("ajax");
$route->get("/users", "UserController:users");
$route->get("/users/{id}", "UserController:profile");

$route->dispatch();


if ($route->error()) {
    var_dump($route->error());
}