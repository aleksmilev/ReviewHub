<?php

$helperList = [
    'controller' => __DIR__ . '/helper/controller.php',
    'database' => __DIR__ . '/helper/database.php',
    'layout' => __DIR__ . '/helper/layout.php',
    'model' => __DIR__ . '/helper/model.php',
    'routher' => __DIR__ . '/helper/routher.php',
];

foreach ($helperList as $helper) {
    include_once($helper);
}

$routher = new Routher();
$routher->exec();

exit;