<?php

if(isset($_GET['id']))
{

    $message = "";

    // Récupère les données de la question dont l'id est == à $_GET['id']
    require '../app/Manager/QuestionManager.php';
    $questionManager = new QuestionManager();
    $question = $questionManager->get($_GET['id']);

    // On recupère tous les qcms depuis la db
    require '../app/Manager/QcmManager.php';
    $qcmManager = new QcmManager();
    $qcms = $qcmManager->getAll();


    if(isset($_POST['submit']))
    {
        try
        {
            $formErrors = [];
            if(empty($_POST['title']))
                $formErrors[] = "Le titre est obligatoire";

            if(empty($_POST['id_qcm']))
                $formErrors[] = "Le choix d'un QCM est obligatoire !";

            if(count($formErrors) > 0)
                throw new Exception(implode("<br />", $formErrors));

            $questionManager->update($_GET['id'], $_POST['title'], $_POST['id_qcm']);
            header('Location: /index-question.php');
        }
        catch(Exception $e)
        {
            $message = $e->getMessage();
        }
        
    }

    require '../template/edit-question.tpl.php';
}