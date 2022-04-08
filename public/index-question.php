<?php

require '../app/Manager/QuestionManager.php';


if(isset($_GET['id']))
{
    $manager = new QuestionManager();
    $questions = $manager->getByQcmId($_GET['id']);

    require '../template/index-question.tpl.php';
}
else
{
    header('Location: /index.php'); die;
}

