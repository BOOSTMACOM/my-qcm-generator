<?php require '../template/partials/_top.tpl.php'; ?>
<div class="container py-5">
    <h1>Réponses à la question N°<?= $questionId ?></h1>
    <p><?= $question->getTitle() ?></p>

    <div class="text-end mb-4">
        <a href="/new-answer.php" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Nouvelle réponses</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Text</th>
                <th>Is the good</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($answers as $answer): ?>
            <tr>
                <td><?= $answer->getId() ?></td>
                <td><?= $answer->getText() ?></td>
                <td>
                    <input type="checkbox" disabled <?= $answer->getIsTheGood() ? "checked" : null ?> />
                </td>
                <td class="fit-width">
                    <a href="/edit-answer.php?id=<?= $answer->getId() ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                </td>
                <td class="fit-width">
                    <form action="/delete-answer.php" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réponse ?')">
                        <input type="hidden" name="id" value="<?= $answer->getId() ?>" />
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<?php require '../template/partials/_bottom.tpl.php'; ?>
