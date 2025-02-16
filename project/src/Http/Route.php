<?php

namespace Src\Http;

class Route 
{
    public Request $request ;
    public Response $response;
    public static array $routes = [];
    public function __construct($request,$response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public static function get($route , $action){
        self::$routes['get'][$route] = $action;
    }

    public static function post($route , $action){
        self::$routes['post'][$route] = $action;
    }
   
   

    public function resolve(){
        $path = $this->request->path(); 
        $method = $this->request->Methode();
        


        if(isset(self::$routes[$method][$path])){

        $action = self::$routes[$method][$path];
        
    } else {

        // Vérifie si une route dynamique correspond
        foreach (self::$routes[$method] as $route => $action) {
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([a-zA-Z0-9_-]+)', $route);
            
            if (preg_match("#^$pattern$#", $path, $matches)) {
                array_shift($matches); 
                $params = $matches;  
                break;              
            }
        }
        
    }

        if (is_string($action)){
        
        
            [$controllerAction , $methodeAction] = explode('@',$action);

            $controllerAction = "App\\Controllers\\$controllerAction";
<<<<<<< HEAD

=======
>>>>>>> de94d5f3f0c877c3b9645c9ccc47d3af133ca02d
          
            if(!class_exists($controllerAction)){
                echo "class not exist";
                exit;
            }

    if (is_callable($action)) {
        call_user_func_array($action, $params ?? []);
        return;
    }

    if (is_string($action)) {
        [$controller, $method] = explode('@', $action);
        $controller = "App\\Controllers\\$controller";

        if (!class_exists($controller)) {
            echo "Class $controller does not exist";
            exit;
        }
      
        $object = new $controller();
        if (!method_exists($object, $method)) {
            echo "Method $method does not exist in $controller";
            exit;
        }
        
        return call_user_func_array([$object, $method], $params ?? []);
    }else{
        echo'error 404';
        
    }

}
    }
<<<<<<< HEAD
=======
}

<<<<<<< HEAD
}
>>>>>>> de94d5f3f0c877c3b9645c9ccc47d3af133ca02d
=======
>>>>>>> b9c6661908d85d87032be580047d5c0333fc43da

