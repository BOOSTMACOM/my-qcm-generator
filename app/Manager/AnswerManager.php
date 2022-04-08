<?php
require_once '../app/Manager/Manager.php';
require_once '../app/Entity/Answer.php';

class AnswerManager extends Manager
{

    public function getAll()
    {
        $sql = 'SELECT * FROM answer';
        $req = $this->getPdo()->prepare($sql);
        $req->execute();
        $answers = $req->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach($answers as $answer)
        {
            $result[] = (new Answer())->hydrate($answer);
        }

        return $result;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM answer WHERE id = :id";
        $query = $this->getPdo()->prepare($sql);
        $query->execute(array(':id' => $id));
        $answer = $query->fetch(PDO::FETCH_ASSOC);
        return $answer;
    }

    public function getByQuestionId($id)
    {
        $sql = "SELECT * FROM answer WHERE id_question = :id";
        $query = $this->getPdo()->prepare($sql);
        $query->execute(array(':id' => $id));
        $answers = $query->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach($answers as $answer)
        {
            $result[] = (new Answer())->hydrate($answer);
        }

        return $result;
    }

    public function insert($questionId, $text, $isCorrect)
    {
        $sql = "INSERT INTO answer (id_question, text, is_the_good) VALUES (:id_question, :text, :is_the_good)";
        $query = $this->getPdo()->prepare($sql);
        $query->execute(array(':id_question' => $questionId, ':text' => $text, ':is_the_good' => $isCorrect));
        return $this->getPdo()->lastInsertId();
    }

    public function update($id, $title, $isCorrect)
    {
        $sql = "UPDATE answer SET title = :title, is_the_good = :is_the_good WHERE id = :id";
        $query = $this->getPdo()->prepare($sql);
        $query->execute(array(':id' => $id, ':title' => $title, ':is_the_good' => $isCorrect));
    }

    public function delete($id)
    {
        $sql = "DELETE FROM answer WHERE id = :id";
        $query = $this->getPdo()->prepare($sql);
        $query->execute(array(':id' => $id));
    }
}