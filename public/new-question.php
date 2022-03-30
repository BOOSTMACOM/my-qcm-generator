<?php

require '../app/Manager/QcmManager.php';
$qcmManager = new QcmManager();
$qcms = $qcmManager->getAll();

$message = "";

if(isset($_POST['submit']))
{
    if(!empty($_POST['title']))
    {
        require '../app/Manager/QuestionManager.php';
        $manager = new QuestionManager();
        $qcmId = $manager->insert($_POST['title'], $_POST['id_qcm']);

        if($qcmId)
        {
            header('Location: /index-question.php'); die;
        }
        else
        {
            $message = "Une erreur s'est produite lors de l'enregistrement";
        }
    }
    else
    {
        $message = "Le titre est obligatoire";
    }
}


require '../template/new-question.tpl.php';