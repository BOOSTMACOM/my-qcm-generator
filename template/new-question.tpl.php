<?php require '../template/partials/_top.tpl.php'; ?>
<div class="container">
    <form action="" method="POST">
        <input type="hidden" name="id_qcm" value="<?= $qcm->getId() ?>" />

        <label>Intitulé de la question</label>
        <input type="text" name="title" required/>

        <label>Réponses</label>

        <div class="answer-form">
            <input type="text" name="answers[0][text]" required/>
            <input type="hidden" name="answers[0][is_the_good]" value="0"/>
            <label><input type="checkbox" name="answers[0][is_the_good]" value="1"/> C'est la bonne</label>
        </div>

        <button class="btn btn-outline-secondary" type="button" onclick="addAnswer()"><i class="bi bi-plus"></i> Ajouter une réponse</button>

        <input type="submit" name="submit" value="Enregistrer" />
    </form>
    <?php if(!empty($message)): ?>
    <div class="alert">
        <?= $message ?>
    </div>
    <?php endif; ?>
</div>

<script>
    let count = 0;
    function addAnswer()
    {
        count += 1;
        let answerForm = document.querySelector('.answer-form');
        let clone = answerForm.cloneNode(true);
        clone.querySelector('input[type="checkbox"]').checked = false;
        clone.querySelector('input[type="text"]').value = "";
        clone.querySelector('input[type="text"]').name = "answers["+ count +"][text]";
        clone.querySelector('input[type="hidden"]').name = "answers["+ count +"][is_the_good]";
        clone.querySelector('input[type="checkbox"]').name = "answers["+ count +"][is_the_good]";

        answerForm.parentNode.insertBefore(clone, answerForm.nextSibling);
    }

</script>

<?php require '../template/partials/_bottom.tpl.php'; ?>
