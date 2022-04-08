<?php
require_once '../app/Entity/Entity.php';

class Answer extends Entity
{
    private int $id;

    private string $text;

    private int $isTheGood = 0;

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
     * Get the value of isTheGood
     */ 
    public function getIsTheGood()
    {
        return $this->isTheGood;
    }

    /**
     * Set the value of isTheGood
     *
     * @return  self
     */ 
    public function setIsTheGood($isTheGood)
    {
        $this->isTheGood = $isTheGood;

        return $this;
    }

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
}