<?php

// Mini routeur maison : associe une URL + une méthode HTTP à un controller/une action
class Router {

    private array $routes = [];

    // Enregistre une route dans $routes (appelé une fois par route dans public/index.php)
    public function add(string $method, string $path, string $controller, string $action): void {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }

    // Cherche la route qui correspond à l'URL/méthode actuelle et appelle son controller
    public function dispatch(): void {
        $url = strtok($_SERVER['REQUEST_URI'], '?');
        if ($url !== '/' && str_ends_with($url, '/')) {
            $url = rtrim($url, '/');
        }
        $method = $_SERVER['REQUEST_METHOD'];

        // Cas particulier : /excuses/701 (le numéro change à chaque fois)
        // On découpe l'URL sur les "/" : "/excuses/701" -> ['', 'excuses', '701']
        $segments = explode('/', $url);

        if ($method === 'GET' && count($segments) === 3 && $segments[1] === 'excuses' && is_numeric($segments[2])) {
            $controller = new PageController();
            $controller->detail($segments[2]);
            return;
        }

        if ($method === 'GET' && count($segments) === 4 && $segments[1] === 'api' && $segments[2] === 'excuses' && is_numeric($segments[3])) {
            $controller = new ExcuseApiController();
            $controller->detail($segments[3]);
            return;
        }

        // Toutes les autres routes : comparaison exacte, comme sur ZenTea
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $url) {
                $controller = new $route['controller']();
                $controller->{$route['action']}();
                return;
            }
        }

        // Aucune route ne correspond : vraie page 404 (avec le GIF et la redirection)
        $controller = new PageController();
        $controller->notFound();
    }
}
