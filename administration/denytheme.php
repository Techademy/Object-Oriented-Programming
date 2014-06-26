<?php
include("../config.php");

$fl = new TemplatePower("./denytheme.tpl");

require("./header.php");

$query="SELECT b.name, b.notify FROM fl_worlds b WHERE b.id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.NAME", opmaak($row[0]));
$fl->assign("_ROOT.ID", $id);
if($row[1]==1)
{
	$fl->newBlock("denymail");
}

$fl->printToScreen();
?>