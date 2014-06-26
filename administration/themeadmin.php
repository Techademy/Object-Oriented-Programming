<?php
include("../config.php");

$fl = new TemplatePower("./themeadmin.tpl");

require("./header.php");

$query="SELECT id, name FROM fl_worlds WHERE approved='1' ORDER BY name ASC";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
	$fl->newBlock("theme");
	$fl->assign("ID", $row[0]);
	$fl->assign("NAME", opmaak($row[1]));
}

$fl->printToScreen();
?>