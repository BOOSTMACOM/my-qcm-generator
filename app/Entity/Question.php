<?php

class Question
{

    // TODO : ajouter les propriétés
    private string $title;

    private array $answers;

    public function __construct(string $title)
    {
        $this->setTitle($title);
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

    // TODO : Compléter les méthodes

    public function addAnswer(Answer $answer)
    {
        $this->answers[] = $answer;
    }

    /**
     * Get the value of answers
     */ 
    public function getAnswers()
    {
        return $this->answers;
    }
}