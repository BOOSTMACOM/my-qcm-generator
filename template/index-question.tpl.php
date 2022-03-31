<?php require '../template/partials/_top.tpl.php'; ?>
<div class="container">
    <h1>Mes questions</h1>

    <a href="/new-question.php">Nouveau</a>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($questions as $q): ?>
            <tr>
                <td><?= $q->getId() ?></td>
                <td><?= $q->getTitle() ?></td>
                <td>
                    <a href="/edit-question.php?id=<?= $q->getId() ?>">Modifier</a>
                    <a href="">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<?php require '../template/partials/_bottom.tpl.php'; ?>
