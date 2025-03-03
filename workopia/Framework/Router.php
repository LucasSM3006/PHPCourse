<?php 

namespace Framework;

use App\Controllers\ErrorController;

class Router
{
    protected $routes = [];

    /**
     * Registers a route based on $method param.
     * @param string method
     * @param string uri
     * @param string action
     * 
     * method is the http method (GET, POST, PUT, DELETE), uri is the location, controller is the controller
     * 
     */

    public function registerRoute($method, $uri, $action)
    {
        // Will take the values and put them into these two variables.
        // For example, In routes.php, we send 'HomeController@index'.
        // List will split and put HomeController on $controller and then index on $controllerMethod.
        list($controller, $controllerMethod) = explode('@', $action);

        $this->routes[] =
        [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
        ];
    }

    /**
     * Add a GET route
     * 
     * @param string uri
     * @param string controller
     * 
     * @return void
     * 
     */

    public function get($uri, $controller)
    {
        $this->registerRoute("GET", $uri, $controller);
    }

    /**
     * Add a POST route
     * 
     * @param string uri
     * @param string controller
     * 
     * @return void
     * 
     */

    public function post($uri, $controller)
    {
        $this->registerRoute("POST", $uri, $controller);
    }

    /**
     * Add a PUT route
     * 
     * @param string uri
     * @param string controller
     * 
     * @return void
     * 
     */

    public function put($uri, $controller)
    {
        $this->registerRoute("PUT", $uri, $controller);
    }

    /**
     * Add a DELETE route
     * 
     * @param string uri
     * @param string controller
     * 
     * @return void
     * 
     */

    public function delete($uri, $controller)
    {
        $this->registerRoute("DELETE", $uri, $controller);
    }

    /**
    * Route the request
    *
    * @param string uri
    * @param string controller
    *
    * @return void
    *
    * the uri for this one will be the one in $_SERVER['REQUEST_URI']
    */

    public function route($uri, $method)
    {
        foreach($this->routes as $route)
        {
            if($route['uri'] === $uri && $route['method'] === $method)
            {
                // Extract controller and controller method
                $controller = 'App\\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];

                // Instantiating the controller class & calling the method
                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod();

                return;
            }
        }

        ErrorController::notFound();
    }

}