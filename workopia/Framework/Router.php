<?php 

namespace Framework;

use App\Controllers\ErrorController;
use Framework\middleware\Authorize;

class Router
{
    protected $routes = [];

    /**
     * Registers a route based on $method param.
     * @param string method
     * @param string uri
     * @param string action
     * @param array middleware
     * 
     * method is the http method (GET, POST, PUT, DELETE), uri is the location, controller is the controller
     * 
     */

    public function registerRoute($method, $uri, $action, $middleware = [])
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
            'controllerMethod' => $controllerMethod,
            'middleware' => $middleware
        ];
    }

    /**
     * Add a GET route
     * 
     * @param string uri
     * @param string controller
     * @param array middleware
     * 
     * @return void
     * 
     */

    public function get($uri, $controller, $middleware = [])
    {
        $this->registerRoute("GET", $uri, $controller, $middleware);
    }

    /**
     * Add a POST route
     * 
     * @param string uri
     * @param string controller
     * @param array middleware
     * 
     * @return void
     * 
     */

    public function post($uri, $controller, $middleware = [])
    {
        $this->registerRoute("POST", $uri, $controller, $middleware);
    }

    /**
     * Add a PUT route
     * 
     * @param string uri
     * @param string controller
     * @param array middleware
     * 
     * @return void
     * 
     */

    public function put($uri, $controller, $middleware = [])
    {
        $this->registerRoute("PUT", $uri, $controller, $middleware);
    }

    /**
     * Add a DELETE route
     * 
     * @param string uri
     * @param string controller
     * @param array middleware
     * 
     * @return void
     * 
     */

    public function delete($uri, $controller, $middleware = [])
    {
        $this->registerRoute("DELETE", $uri, $controller, $middleware);
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

    public function route($uri)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // Check for _method hidden field
        if($requestMethod == 'POST' && isset($_POST['_method']))
        {
            // Override the request method w/ the value of _method
            $requestMethod = strtoupper($_POST['_method']);
        }

        foreach($this->routes as $route)
        {
            // Splits the URI into segments.
            // The trim is necessary otherwise we get an empty value at the start of the array.
            // A regular trim didn't work.
            $uriSegments = explode("/", trim($uri, '/'));
            
            // Split the route URI into segments. From the routes themselves.
            $routeSegments = explode("/", trim($route['uri'], '/'));

            $match = true;

            // Check if n of segments match
            if( count($uriSegments) === count($routeSegments) &&
                strtoupper($route['method']) === $requestMethod)
            {
                $params = [];

                $match = true;

                // for loop to check if segments match
                for($i = 0; $i < count($uriSegments); $i++)
                {
                    // regex to find parameters. we're using {}.
                    // if the uri's do not match and there is no param
                    if($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i]))
                    {
                        $match = false;
                        break;
                    }

                    // $matches will work like the "out" from C#. $matches will hold whatever value it gets sent.
                    // ex. {id}. $matches becomes an array with "{id}" and "id" on it.
                    // can get the actual values w/ $matches[1] for example.

                    // check for the param and add to the $params array
                    if(preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches))
                    {
                        // Setting the key as the "id" and then the value being passed in the uri.
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }

                if($match)
                {
                    foreach($route['middleware'] as $middleware)
                    {
                        (new Authorize())->handle($middleware);
                    }

                    $controller = 'App\\Controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];

                    // Instantiating the controller class & calling the method
                    $controllerInstance = new $controller();
                    // Passing params to the method in case it needs it.
                    $controllerInstance->$controllerMethod($params);

                    return;
                }
            }
        }

        ErrorController::notFound();
    }

}