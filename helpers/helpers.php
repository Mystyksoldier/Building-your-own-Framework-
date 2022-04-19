<?php
require_once('../helpers/rb.php');

use Twig\Environment;
use Twig\Loader\FilesystemLoader;


    function render($folder, $templateArguments, $replace)
    {
        $loader = new FilesystemLoader("../views/$folder/");
        $twig = new Environment($loader);
        echo $twig->render($templateArguments, $replace);
    }

function error($folder, $errorNumber, $errorMessage)
{
    http_response_code($errorNumber);
    render("$folder", 'error.html', ['errorMessage' => $errorMessage]);
    exit;
}





?>