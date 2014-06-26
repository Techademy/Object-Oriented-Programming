<?php
include("../config.php");

$fl = new TemplatePower("./error.tpl");

require("./header.php");

if($submiterror && $error!="" && $source!="")
{
     $error=invoer($error);
     $source=invoer($source);
     $query="INSERT INTO fl_errors (error, source, type) VALUES ('$error', '$source', '$type')";
     $result=mysql_query($query);
}

$query="SELECT id, error, type FROM fl_errors ORDER BY type ASC, error ASC";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
	$fl->newBlock("error");
	$fl->assign("ID", $row[0]);
	$fl->assign("QUOTE", opmaak($row[1]));
     $fl->assign("TYPE", $row[2]);
}

$fl->printToScreen();
?>
