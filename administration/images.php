<?php
include("../config.php");

$fl = new TemplatePower("./images.tpl");

require("./header.php");

$fl->printToScreen();
?>