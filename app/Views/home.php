<div class="container">
    <h1>Bienvenue sur MyBad</h1>
    <p>Ceci est un site de génération d'excuses.</p>
</div>

<div class="excuse-generator">
    <h2>Générateur d'excuses</h2>
    <p id="excuse-code"><?= $excuse['http_code'] ?> — <?= $excuse['tag'] ?></p>
    <p id="excuse-message"><?= $excuse['message'] ?></p>
    <button id="change-excuse">Changer d'excuse</button>
    <a href="/add">Ajouter une excuse</a>
</div>

<footer>
    <p>Mathis Marissal</p>
    <p>2026 - MyBad</p>
</footer>