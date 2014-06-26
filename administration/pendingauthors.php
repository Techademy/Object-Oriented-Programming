<?php
include("../config.php");

$fl = new TemplatePower("./pendingauthors.tpl");

require("./header.php");

$query="SELECT id, name, firstname FROM fl_authors WHERE approved='0' ORDER BY id ASC";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
	$fl->newBlock("author");
	$fl->assign("ID", $row[0]);
	$fl->assign("NAME", opmaak("$row[2] $row[1]"));
}

$fl->printToScreen();
?>