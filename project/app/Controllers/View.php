<?php
namespace App\Controllers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class View
{
    private static $twig;

    public static function init()
    {
        $loader = new \Twig\Loader\FilesystemLoader('/var/www/html/views/paiment'); 
        self::$twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

    }

    public static function render($template, $data = [])
    {
        if (!self::$twig) {
            self::init();
        }

        echo self::$twig->render($template, $data); 
    }
}
