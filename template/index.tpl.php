<?php require '../template/partials/_top.tpl.php'; ?>
<div class="container py-5">
    <h1>Mes QCMs</h1>

    <div class="text-end mb-4">
        <a href="/new-qcm.php" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Nouveau</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($qcms as $qcm): ?>
            <tr>
                <td><?= $qcm->getId() ?></td>
                <td><?= $qcm->getTitle() ?></td>
                <td class="fit-width">
                    <a href="/qcm.php?id=<?= $qcm->getId() ?>" class="btn btn-outline-primary"><i class="bi bi-eye"></i></a>
                    <a href="/new-question.php?id=<?= $qcm->getId() ?>" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Ajouter question</a>
                    <a href="/edit-qcm.php?id=<?= $qcm->getId() ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                </td>
                <td class="fit-width">
                    <form action="/delete-qcm.php" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce qcm ?')">
                        <input type="hidden" name="id" value="<?= $qcm->getId() ?>" />
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<?php require '../template/partials/_bottom.tpl.php'; ?>
