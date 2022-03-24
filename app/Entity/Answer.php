<?php

class Answer
{

    private string $text;

    private bool $isTheGoodAnswer;

    public function __construct(string $text, bool $isTheGoodAnswer = false)
    {
        $this->setText($text)->setIsTheGoodAnswer($isTheGoodAnswer);
    }

    // TODO : ajouter les propriétés

    // TODO : ajouter les méthodes


    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of isTheGoodAnswer
     */ 
    public function getIsTheGoodAnswer()
    {
        return $this->isTheGoodAnswer;
    }

    /**
     * Set the value of isTheGoodAnswer
     *
     * @return  self
     */ 
    public function setIsTheGoodAnswer($isTheGoodAnswer)
    {
        $this->isTheGoodAnswer = $isTheGoodAnswer;

        return $this;
    }
}