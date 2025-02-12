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
       
        
        $action = self::$routes[$method][$path];
 
        if (!$action){
            return ;
        }

        if (is_callable($action)){
            call_user_func_array($action , []);
        }

        if (is_string($action)){

            [$controllerAction , $methodeAction] = explode('@',$action);

            $controllerAction = "App\\Controllers\\$controllerAction";

            if(!class_exists($controllerAction)){
                echo "class not exist";
                exit;
            }

            if (!method_exists($controllerAction,$methodeAction)){
                echo "methode not exist";
                exit;
            }
          


            $objectController = new $controllerAction();
            return $objectController->$methodeAction();
        }
    }
}
