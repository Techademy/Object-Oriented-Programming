<?php
include("../config.php");

$fl = new TemplatePower("./deletenews.tpl");

require("./header.php");

$query="SELECT b.title FROM fl_news b WHERE b.id='".$_GET['id']."'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.TITLE", opmaak($row[0]));
$fl->assign("_ROOT.ID", $_GET['id']);

$fl->printToScreen();
?>
