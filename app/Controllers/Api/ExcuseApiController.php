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

    // Modifie le tag/message d'une excuse existante (le http_code ne change pas,
    // c'est lui qui identifie l'excuse dans l'URL)
    public function update(int $httpCode): void {
        $tag = $_POST['tag'] ?? null;
        $message = $_POST['message'] ?? null;

        if (!$tag || !$message) {
            $this->json(['error' => 'Missing required fields'], 400);
            return;
        }

        $stmt = $this->pdo->prepare('UPDATE excuses SET tag = :tag, message = :message WHERE http_code = :http_code');
        $stmt->execute([
            'tag' => $tag,
            'message' => $message,
            'http_code' => $httpCode
        ]);

        $this->json(['success' => true, 'message' => 'Excuse updated successfully'], 200);
    }

}
