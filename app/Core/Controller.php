<?php

// Classe de base héritée par les controllers (comme sur RealConseil)
class Controller
{
    // Rend une vue HTML : inclut le header, rend les variables de $data disponibles,
    // puis inclut le fichier de vue demandé (ex: 'home' ou 'excuses/all')
    protected function render(string $view, array $data = []): void
    {
        // Transforme chaque clé de $data en variable utilisable directement dans la vue
        // ex: $data = ['message' => 'PHP'] devient une variable $message
        extract($data);

        // Header commun à toutes les pages
        include __DIR__ . '/../Views/layouts/header.php';

        // Construit le chemin du fichier de vue à partir de son nom
        // ex: 'excuses/all' -> .../app/Views/excuses/all.php
        include __DIR__ . '/../Views/' . $view . '.php';
    }

    // Renvoie une réponse JSON : utilisé par les controllers de l'API (ExcuseApiController)
    protected function json(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit; // on coupe l'exécution ici pour être sûr que rien d'autre ne s'ajoute à la réponse
    }
}
