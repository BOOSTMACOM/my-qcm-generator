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
            $result[] = (new QCM())->hydrate($qcm);
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