<?php
include("../config.php");

$fl = new TemplatePower("./editlang.tpl");

require("./header.php");

$query="SELECT name FROM fl_languages WHERE id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.ID", $id);
$fl->assign("_ROOT.NAME", opmaak($row[0]));

$fl->printToScreen();
?>
