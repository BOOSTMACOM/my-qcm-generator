<?php

require '../app/Entity/Question.php';
require_once '../app/Manager/Manager.php';

class QuestionManager extends Manager
{
    
    public function getAll()
    {
        $sql = 'SELECT * FROM question';
        $req = $this->getPdo()->prepare($sql);
        $req->execute();
        $qcms = $req->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach($qcms as $qcm)
        {
            $result[] = (new Question())->hydrate($qcm);
        }

        return $result;
    }

    /**
     * Recupère les infos d'une question via son id
     * @param int $id
     * 
     * @return Question
     */
    public function get(int $id) : Question
    {
        $sql = "SELECT * FROM question WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'id' => $id
        ]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        
        $question = (new Question())->hydrate($result);

        return $question;
    }

    public function insert(string $title, int $id_qcm) : int
    {
        $sql = "INSERT INTO question (title, id_qcm) VALUES (:title, :id_qcm)";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'title' => $title,
            'id_qcm' => $id_qcm
        ]);

        return $this->getPdo()->lastInsertId();
    }

    public function update(int $id, string $title, int $id_qcm)
    {
        $sql = "UPDATE question SET title = :title, id_qcm = :id_qcm WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        return $req->execute(compact('id','title','id_qcm'));
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM question WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        return $req->execute(compact('id'));
    }

}