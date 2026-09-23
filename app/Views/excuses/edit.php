<div class="container">
    <h1>Modifier l'excuse</h1>
</div>

<form id="edit-form" class="excuse-generator" data-http-code="<?= $excuse['http_code'] ?>">
    <label for="http_code">Code HTTP</label>
    <input type="number" id="http_code" name="http_code" value="<?= $excuse['http_code'] ?>" disabled>

    <label for="tag">Catégorie</label>
    <input type="text" id="tag" name="tag" value="<?= $excuse['tag'] ?>" required>

    <label for="message">Excuse</label>
    <input type="text" id="message" name="message" value="<?= $excuse['message'] ?>" required>

    <button type="submit">Enregistrer</button>
</form>

<div id="toast"></div>

<script src="/assets/js/edit.js"></script>
