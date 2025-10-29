<?php

require "./app/views/head.php";
require "./app/views/header.php";

if(empty($_GET["path"])){
    require "./app/views/thisArt.php";
    require "./app/views/otherArt.php";
} else {
    $path = htmlspecialchars($_GET["path"]);
    require "./app/views/" . $path . ".php";
}
require "./app/views/footer.php";