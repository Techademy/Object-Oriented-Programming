<?php
include("../config.php");

$fl = new TemplatePower("./deletelang.tpl");

require("./header.php");

$query="SELECT b.name FROM fl_languages b WHERE b.id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.LANG", opmaak($row[0]));
$fl->assign("_ROOT.ID", $id);

$fl->printToScreen();
?>
