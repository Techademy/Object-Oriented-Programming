<?php
include("./config.php");

$fl = new TemplatePower("./templates/about.tpl");

require("./header.php");

$fl->assign("_ROOT.SITENAAM", $sitenaam ." / About");
$fl->assign("_ROOT.PHPVERSION", phpversion());

$fl->printToScreen();
?>