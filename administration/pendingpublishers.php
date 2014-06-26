<?php
include("../config.php");

$fl = new TemplatePower("./pendingpublishers.tpl");

require("./header.php");

$query="SELECT id, name FROM fl_publishers WHERE approved='0' ORDER BY id ASC";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
	$fl->newBlock("pub");
	$fl->assign("ID", $row[0]);
	$fl->assign("NAME", opmaak($row[1]));
}

$fl->printToScreen();
?>