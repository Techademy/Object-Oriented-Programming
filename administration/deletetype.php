<?php
include("../config.php");

$fl = new TemplatePower("./deletetype.tpl");

require("./header.php");

$query="SELECT b.name FROM fl_types b WHERE b.id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.TYPE", opmaak($row[0]));
$fl->assign("_ROOT.ID", $id);

$fl->printToScreen();
?>
