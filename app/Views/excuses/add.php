<div class="container">
    <h1>Ajouter une excuse</h1>
</div>

<form id="add-form" class="excuse-generator">
    <label for="http_code">Code HTTP</label>
    <input type="number" id="http_code" name="http_code" required>

    <label for="tag">Catégorie</label>
    <input type="text" id="tag" name="tag" required>

    <label for="message">Excuse</label>
    <input type="text" id="message" name="message" required>

    <button type="submit">Ajouter</button>
</form>

<div id="toast"></div>

<script src="/assets/js/add.js"></script>
