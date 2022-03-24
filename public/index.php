<?php

require '../app/Manager/QcmManager.php';

$qcmManager = new QcmManager();
$qcms = $qcmManager->getAll();

require '../template/index.tpl.php';