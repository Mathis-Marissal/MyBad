<div class="container">
    <h1>Toutes les excuses</h1>
</div>

<table class="excuses-table">
    <thead>
        <tr>
            <th>Code HTTP</th>
            <th>Catégorie</th>
            <th>Excuse</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($excuses as $excuse): ?>
        <tr>
            <td><a href="/excuses/<?= $excuse['http_code'] ?>"><?= $excuse['http_code'] ?></a></td>
            <td><?= $excuse['tag'] ?></td>
            <td><?= $excuse['message'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
