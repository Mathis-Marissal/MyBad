<div class="container excuse-generator">
    <h1>Détail de l'excuse</h1>
    <p id="excuse-code"><?= $excuse['http_code'] ?> — <?= $excuse['tag'] ?></p>
    <p id="excuse-message"><?= $excuse['message'] ?></p>
    <a href="/excuses/<?= $excuse['http_code'] ?>/edit">Modifier cette excuse</a>
    <a href="/excuses/all">Retour à la liste</a>
</div>
