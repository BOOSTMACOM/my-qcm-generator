<?php

require '../app/Entity/QCM.php';
require_once '../app/Manager/Manager.php';

class QcmManager extends Manager
{

    public function getAll()
    {
        $sql = 'SELECT * FROM qcm';
        $req = $this->getPdo()->prepare($sql);
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
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'title' => $title,
        ]);

        return $this->getPdo()->lastInsertId();
    }

}