<?php
    require_once("config.php");

    $user = new Usuario();

    $user ->loadById(12);

    echo $user;
?>