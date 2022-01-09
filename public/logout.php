<?php

session_start();
session_destroy();
header("Location: ../public");
session_start();
die();

?>
