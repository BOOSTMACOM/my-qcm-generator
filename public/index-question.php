<?php

require '../app/Manager/QuestionManager.php';

$manager = new QuestionManager();
$questions = $manager->getAll();

require '../template/index-question.tpl.php';