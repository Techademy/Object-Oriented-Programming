<?php
include("../config.php");

$fl = new TemplatePower("./deleteerror.tpl");

require("./header.php");

$query="SELECT b.error FROM fl_errors b WHERE b.id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.ERROR", opmaak($row[0]));
$fl->assign("_ROOT.ID", $id);

$fl->printToScreen();
?>
