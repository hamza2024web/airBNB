<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BaseController
{
    protected $twigPro;
    protected $twigAdmin;
    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../Views/proprietaires');
        $this->twigPro = new Environment($loader, [
            'cache' => false,
            'debug' => true,
        ]);
        $loaderAdmin = new FilesystemLoader(__DIR__.'/../../Views/admins');
        $this->twigAdmin = new Environment($loaderAdmin, [
            'cache' => false,
            'debug' => true,
        ]);
    }

    protected function render($template, $data = [])
    {
        echo $this->twigPro->render($template . '.twig', $data);
    }
    protected function renderAdmin($template, $data = [])
    {
        echo $this->twigAdmin->render($template . '.twig', $data);
    }
}
