<?php
include("../config.php");

$fl = new TemplatePower("./deleteuser.tpl");

require("./header.php");

$query="SELECT b.name FROM fl_users b WHERE b.id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.USER", opmaak($row[0]));
$fl->assign("_ROOT.ID", $id);

$fl->printToScreen();
?>
