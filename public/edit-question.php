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

    require '../template/edit-question.tpl.php';
}