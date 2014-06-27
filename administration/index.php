<?php
include("../config.php");

$fl = new TemplatePower("./index.tpl");

require("./header.php");

$fl->printToScreen();
?>