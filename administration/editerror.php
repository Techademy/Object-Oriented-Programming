<?php
include("../config.php");

$fl = new TemplatePower("./editerror.tpl");

require("./header.php");

$query="SELECT error, source, type FROM fl_errors WHERE id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.ID", $id);
$fl->assign("_ROOT.ERROR", $row[0]);
$fl->assign("_ROOT.SOURCE", $row[1]);
$fl->assign("_ROOT.$row[2]SELECTED", "SELECTED");

$fl->printToScreen();
?>
