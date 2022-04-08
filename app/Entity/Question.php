<?php
require_once '../app/Entity/Entity.php';

class Question extends Entity
{
    private int $id;
    // TODO : ajouter les propriétés
    private string $title;

    private int $id_qcm;

    private array $answers;

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
     * Get the value of id_qcm
     */ 
    public function getIdQcm()
    {
        return $this->id_qcm;
    }

    /**
     * Set the value of id_qcm
     *
     * @return  self
     */ 
    public function setIdQcm($id_qcm)
    {
        $this->id_qcm = $id_qcm;

        return $this;
    }
}