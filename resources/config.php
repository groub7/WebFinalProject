<?php
ob_start();

session_start();

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates\\front");

defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates\\back");

defined("UPLOAD_DIRECTORY") ? null : define("UPLOAD_DIRECTORY", __DIR__ . DS);

//defined("DB_HOST") ? null : define("DB_HOST", "localhost");
//defined("DB_USER") ? null : define("DB_USER", "root");
//defined("DB_PASS") ? null : define("DB_PASS", "");
//defined("DB_NAME") ? null : define("DB_NAME", "mydemy");

defined("DB_HOST") ? null : define("DB_HOST", "eu-cdbr-west-02.cleardb.net");
defined("DB_USER") ? null : define("DB_USER", "b3c2723fa090bf");
defined("DB_PASS") ? null : define("DB_PASS", "edb38139");
defined("DB_NAME") ? null : define("DB_NAME", "heroku_ffd5020397b6e96");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

require_once("functions.php");
