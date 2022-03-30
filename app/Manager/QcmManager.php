<?php

require '../app/Entity/QCM.php';

class QcmManager
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
        $sql = 'SELECT * FROM qcm';
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $qcms = $req->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach($qcms as $qcm)
        {
            $obj = new QCM();
            $obj->setId($qcm['id']);
            $obj->setTitle($qcm['title']);
            $result[] = $obj;
        }

        return $result;
    }

    public function insert(string $title) : int
    {
        $sql = "INSERT INTO qcm (title) VALUES (:title)";
        $req = $this->pdo->prepare($sql);
        $req->execute([
            'title' => $title,
        ]);

        return $this->pdo->lastInsertId();
    }

}