<?php

$message = "";

if(isset($_POST['submit']))
{
    if(!empty($_POST['title']))
    {
        require '../app/Manager/QcmManager.php';
        $manager = new QcmManager();
        $qcmId = $manager->insert($_POST['title']);

        if($qcmId)
        {
            header('Location: /'); die;
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


require '../template/new-qcm.tpl.php';