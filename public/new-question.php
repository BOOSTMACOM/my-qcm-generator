<?php

require '../app/Manager/QcmManager.php';

$message = "";

if(isset($_POST['submit']))
{
    if(!empty($_POST['title']))
    {
        require '../app/Manager/QuestionManager.php';
        $manager = new QuestionManager();
        $questionId = $manager->insert($_POST['title'], $_POST['id_qcm']);

        if($questionId)
        {
            require '../app/Manager/AnswerManager.php';
            $answerManager = new AnswerManager();

            foreach($_POST['answers'] as $answer)
            {
                try{
                    $answerId = $answerManager->insert($questionId, $answer['text'], $answer['is_the_good']);

                    if(!$answerId)
                    {
                        throw new Exception("Erreur lors de l'insertion de la réponse");
                    }
                }
                catch(Exception $e)
                {
                    $message = $e->getMessage();
                    break;
                }
            }
        
            header('Location: /index-answers.php?id=' . $questionId); die;
        
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

if(isset($_GET['id']))
{
    $qcmManager = new QcmManager();

    // On vérifie si le qcm existe
    $qcm = $qcmManager->get($_GET['id']);

    // Si le qcm n'existe pas, on redirige vers la liste des qcm
    if(!$qcm)
    {
        header('Location: /index.php'); die;
    }

    require '../template/new-question.tpl.php';
}
else
{
    header('Location: /index.php'); die;
}
