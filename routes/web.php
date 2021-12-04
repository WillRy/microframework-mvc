<?php
$route = new \CoffeeCode\Router\Router(base_url(), ":");
$route->namespace("App\Controllers");

$route->group(null);
$route->get("/", "WebController:home");
$route->get("/users", "WebController:users");

$route->dispatch();


if ($route->error()) {
    var_dump($route->error());
}