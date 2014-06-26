<?php
include("../config.php");

$fl = new TemplatePower("./useradmin.tpl");

require("./header.php");

$query="SELECT id, name, userlevel, UNIX_TIMESTAMP(since) FROM fl_users ORDER BY name ASC";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
	$fl->newBlock("user");
	$fl->assign("ID", $row[0]);
	$fl->assign("USER", opmaak($row[1]));
     $fl->assign("LEVEL", $row[2]);
     $fl->assign("SINCE", date("d-m-Y G:i", $row[3]));
}

$fl->printToScreen();
?>
