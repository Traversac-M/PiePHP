<?php
namespace src\Controller;

use \Core\Controller;

class AppController extends Controller
{
    public function indexAction()
    {
        $this->render('index');
    }
}