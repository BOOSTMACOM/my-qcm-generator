<?php

if(isset($_POST['submit']) && isset($_POST['id']))
{

    require '../app/Manager/QuestionManager.php';
    $questionManager = new QuestionManager();
    $questionManager->delete($_POST['id']);

    header('Location: /index-question.php'); die;

}