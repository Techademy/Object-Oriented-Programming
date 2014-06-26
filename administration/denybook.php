<?php
include("../config.php");

$fl = new TemplatePower("./denybook.tpl");

require("./header.php");

$query="SELECT b.title, b.notify FROM fl_books b WHERE b.id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.TITLE", opmaak($row[0]));
$fl->assign("_ROOT.ID", $id);
if($row[1]==1)
{
	$fl->newBlock("denymail");
}

$fl->printToScreen();
?>