<div class="container">
    <h1>Toutes les excuses</h1>
</div>

<table class="excuses-table">
    <thead>
        <tr>
            <th>Code HTTP</th>
            <th>Catégorie</th>
            <th>Excuse</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($excuses as $excuse): ?>
        <tr data-http-code="<?= $excuse['http_code'] ?>">
            <td><a href="/excuses/<?= $excuse['http_code'] ?>"><?= $excuse['http_code'] ?></a></td>
            <td><?= $excuse['tag'] ?></td>
            <td><?= $excuse['message'] ?></td>
            <td><a href="/excuses/<?= $excuse['http_code'] ?>/edit">Modifier</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script src="/assets/js/all.js"></script>
