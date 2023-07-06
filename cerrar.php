<?php

session_destroy();

$url = "index";
header("Location: $url.php");
die();