<?php
namespace Core;

class Core
{
    public function run()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/PiePHP/routes.php');
        $url = $_SERVER['REQUEST_URI'];
        $routes[$url] = Router::get($url);

        if ($routes[$url]) { // Si la fonction get est set alors :
            $controllerPath = "src\Controller\\" . $routes[$url]['controller']
            . "Controller";
            $action = $routes[$url]['action'] . "Action";

            if (class_exists($controllerPath)) { // Recherche le chemin du fichier
                $useController = new $controllerPath; // Si le fichier est trouvé, l'instancie
                
                if (method_exists($useController, $action)) { // Cherche la méthode demandée dans le fichier et l'instancie
                $useController->$action();
            } else {
                echo "Unknown method ". $action, $controllerPath. " ! ";
            }
        } else {
            echo "Unknown class ". $controllerPath. " ! ";
        }
    }
}
}