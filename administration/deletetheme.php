<?php
include("../config.php");

$fl = new TemplatePower("./deletetheme.tpl");

require("./header.php");

$query="SELECT b.name FROM fl_worlds b WHERE b.id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.NAME", opmaak($row[0]));
$fl->assign("_ROOT.ID", $id);

$fl->printToScreen();
?>