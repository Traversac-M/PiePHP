<?php 
namespace src\Controller;

use \Core\Controller;

class ErrorController extends Controller
{
    public function errorAction()
    {
        $this->render('404');
    }
}