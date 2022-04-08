<?php

// On récupère toutes les réponses liées à la question
if(isset($_GET['id']))
{
    // On vérifie si la question existe
    require '../app/Manager/QuestionManager.php';
    $questionManager = new QuestionManager();
    $question = $questionManager->get($_GET['id']);

    if($question)
    {
        require '../app/Manager/AnswerManager.php';
        $answerManager = new AnswerManager();
        $answers = $answerManager->getByQuestionId($_GET['id']);
    }
    else
    {
        $answers = [];
    }

    $questionId = $_GET['id'];

    require '../template/index-answers.tpl.php';
}