<?php

require '../app/Entity/Question.php';

class QuestionManager
{
    private $pdo;

    public function __construct()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=my_qcm_generator','root');
        }
        catch(PDOException $e)
        {
            echo 'Error : ' . $e->getMessage();
            die;
        }
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM question';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $qcms = $req->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach($qcms as $qcm)
        {
            $obj = new Question();
            $obj->setId($qcm['id']);
            $obj->setTitle($qcm['title']);
            $result[] = $obj;
        }

        return $result;
    }

    public function insert(string $title, int $id_qcm) : int
    {
        $sql = "INSERT INTO question (title, id_qcm) VALUES (:title, :id_qcm)";
        $req = $this->pdo->prepare($sql);
        $req->execute([
            'title' => $title,
            'id_qcm' => $id_qcm
        ]);

        return $this->pdo->lastInsertId();
    }

}