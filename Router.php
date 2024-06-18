<?php

class Router
{
    protected $routes = [];
    /**
     * Add a route to the router
     *
     * @param string $method
     * @param string $uri
     * @param string  $controller
     * @return void
     */
    public function registerRoute($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    /**
     * Add a GET Route 
     * @param string $uri
     * @param string $controller
     * @return void 
     */

    public function get($uri, $controller)
    {
        $this->registerRoute('GET', $uri, $controller);
    }

    /**
     * Add a POST Route 
     * @param string $uri
     * @param string $controller
     */

    public function post($uri, $controller)
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    /**
     * Add a PUT Route 
     * @param string $uri
     * @param string $controller
     */

    public function put($uri, $controller)
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    /**
     * Add a DELETE Route 
     * @param string $uri
     * @param string $controller
     */

    public function delete($uri, $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    /**
     * Add a PATCH Route 
     * @param string $uri
     * @param string $controller
     */

    public function patch($uri, $controller)
    {
        $this->registerRoute('PATCH', $uri, $controller);
    }

    /**
     * Load error page
     * @return void 
     */

    public function error($statusCode = 404)
    {
        http_response_code($statusCode);
        loadView("errors/{$statusCode}");
        exit;
    }

    /**
     * Route the request 
     * @param string $uri
     * @param string $method
     * @return void
     */

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                require base_path($route['controller']);
                return;
            }
        }
        $this->error(404);
    }
}
