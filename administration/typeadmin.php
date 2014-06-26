<?php
include("../config.php");

$fl = new TemplatePower("./typeadmin.tpl");

require("./header.php");

if($submittype && $typename!="")
{
$typename=invoer($typename);
$query="INSERT INTO fl_types (name) VALUES ('$typename')";
$result=mysql_query($query);
}

$query="SELECT id, name FROM fl_types ORDER BY name ASC";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
	$fl->newBlock("type");
	$fl->assign("ID", $row[0]);
	$fl->assign("TYPE", opmaak($row[1]));
}

$fl->printToScreen();
?>
