<?php 

class PageController extends Controller {

    private PDO $pdo;

    public function __construct() {
    global $pdo;
    $this->pdo = $pdo;
    }

    public function home(): void {
        $stmt = $this->pdo->prepare('SELECT * FROM excuses ORDER BY RAND() LIMIT 1');
        $stmt->execute();
        $excuse = $stmt->fetch();

        $this->render('home', ['excuse' => $excuse]);
    }

    public function all(): void {
        $stmt = $this->pdo->prepare('SELECT * FROM excuses ORDER BY id DESC');
        $stmt->execute();
        $excuses = $stmt->fetchAll();

        $this->render('excuses/all', ['excuses' => $excuses]);
    }

    public function detail(int $httpCode): void {
        $stmt = $this->pdo->prepare('SELECT * FROM excuses WHERE http_code = :http_code');
        $stmt->execute(['http_code' => $httpCode]);
        $excuse = $stmt->fetch();

        if (!$excuse) {
            http_response_code(404);
            $this->render('errors/404');
            return;
        }

        $this->render('excuses/detail', ['excuse' => $excuse]);
    }

    public function add(): void {
        $this->render('excuses/add');
    }

}
