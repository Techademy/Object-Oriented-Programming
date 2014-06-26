<?php
include("../config.php");

$fl = new TemplatePower("./edituser.tpl");

require("./header.php");

$query="SELECT name, userlevel FROM fl_users WHERE id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.ID", $id);
$fl->assign("_ROOT.NAME", opmaak($row[0]));
$fl->assign("_ROOT.$row[1]SELECTED", "SELECTED");

$fl->printToScreen();
?>
