<?php

require_once '../app/Entity/Entity.php';

class QCM extends Entity
{

    private int $id;

    private string $title;

    /** @var Question[] */
    private array $questions;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param Question $question
     * 
     * @return [type]
     */
    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;
    }

    /**
     * Get the value of questions
     */ 
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Permet d'afficher le template HTML d'un QCM
     * @return [type]
     */
    public function show()
    {
       include 'template.php';
    }

    /**
     * Permet de vérifier les réponses du QCM
     * @return [type]
     */
    public function check()
    {
        // ...
        $this->show();
        foreach($_POST['answers'] as $questionKey => $answerKey)
        {
            $question = $this->questions[$questionKey];
            $answers = $question->getAnswers();
            $checkedAnswer = $answers[$answerKey];
            $result = $checkedAnswer->getIsTheGoodAnswer() ? 'bonne' : 'fausse';
            echo "<p>La réponse à la question " . $question->getTitle() . " est " . $result . "</p>";
        }
    }


    
}