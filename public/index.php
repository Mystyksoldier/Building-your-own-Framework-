<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once '../vendor/autoload.php';
require_once '../helpers/rb.php';
R::setup( 'mysql:host=localhost;dbname=framework', 'root', '');
session_start();
$route = explode("/", $_SERVER["REDIRECT_URL"]);
$controller = ucfirst($route[1]."Controller");
$method = $route[2] ?? 'index';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $method .= 'Post';
}


if (!class_exists($controller) ) {
    error('error', 404, "controller $controller not found");
} elseif (!method_exists($controller, $method)) {
    error('error', 404, "method $method not found");
}

if (!isset($method)) {
    $method = 'index';
}
(new $controller())->$method();

?>