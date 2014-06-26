<?php
$hide=1;
include("config.php");
logout_user();
header("location: ".$_SERVER['HTTP_REFERER']);
?>