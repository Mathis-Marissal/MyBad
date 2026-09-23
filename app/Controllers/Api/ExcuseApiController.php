<?php

class ExcuseApiController extends Controller {

    private PDO $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function list(): void {
        $stmt = $this->pdo->prepare('SELECT * FROM excuses ORDER BY id DESC');
        $stmt->execute();
        $excuses = $stmt->fetchAll();

        $this->json($excuses);
    }

    public function detail(int $httpCode): void {
        $stmt = $this->pdo->prepare('SELECT * FROM excuses WHERE http_code = :http_code');
        $stmt->execute(['http_code' => $httpCode]);
        $excuse = $stmt->fetch();

        if (!$excuse) {
            $this->json(['error' => 'Excuse not found'], 404);
            return;
        }

        $this->json($excuse);
    }

    public function random(): void {
        $stmt = $this->pdo->prepare('SELECT * FROM excuses ORDER BY RAND() LIMIT 1');
        $stmt->execute();
        $excuse = $stmt->fetch();

        if (!$excuse) {
            $this->json(['error' => 'No excuses found'], 404);
            return;
        }

        $this->json($excuse);
    }

    public function store(): void {
        $httpCode = $_POST['http_code'] ?? null;
        $tag = $_POST['tag'] ?? null;
        $message = $_POST['message'] ?? null;

        if (!$httpCode || !$tag || !$message) {
            $this->json(['error' => 'Missing required fields'], 400);
            return;
        }

        // try/catch comme dans Database.php : si l'INSERT échoue (ex: http_code déjà
        // utilisé, contrainte UNIQUE en BDD), on attrape l'erreur au lieu de planter,
        // et on renvoie une réponse JSON propre plutôt que l'erreur PHP brute.
        try {
            $stmt = $this->pdo->prepare('INSERT INTO excuses (http_code, tag, message) VALUES (:http_code, :tag, :message)');
            $stmt->execute([
                'http_code' => $httpCode,
                'tag' => $tag,
                'message' => $message
            ]);
        } catch (PDOException $e) {
            $this->json(['error' => 'Ce code HTTP existe déjà'], 400);
            return;
        }

        $this->json(['success' => true, 'message' => 'Excuse created successfully'], 201);
    }

}
