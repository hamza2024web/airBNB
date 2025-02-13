<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class BaseController
{
    protected $twig;

    public function __construct()
    {
        // Load templates from the Views directory
        $loader = new FilesystemLoader(__DIR__ . '/../../Views/proprietaires');
        $this->twig = new Environment($loader, [
            'cache' => false, // Set a path if you want caching
            'debug' => true,
        ]);
    }

    protected function render($template, $data = [])
    {
        echo $this->twig->render($template . '.twig', $data);
    }
}
