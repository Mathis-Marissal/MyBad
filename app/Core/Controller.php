<?php

// Classe de base héritée par les controllers (comme sur RealConseil)
class Controller
{
    // Rend une vue HTML : inclut le header, rend les variables de $data disponibles,
    // puis inclut le fichier de vue demandé (ex: 'home' ou 'excuses/all')
    protected function render(string $view, array $data = []): void
    {
        extract($data);
        include __DIR__ . '/../Views/layouts/header.php';
        include __DIR__ . '/../Views/' . $view . '.php';
        echo '</body></html>';
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
