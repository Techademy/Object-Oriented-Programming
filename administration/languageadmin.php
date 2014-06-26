<?php
include("../config.php");

$fl = new TemplatePower("./languageadmin.tpl");

require("./header.php");

if($submitlanguage && $langname!="")
{
$langname=invoer($langname);
$query="INSERT INTO fl_languages (name) VALUES ('$langname')";
$result=mysql_query($query);
}

$query="SELECT id, name FROM fl_languages ORDER BY name ASC";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
	$fl->newBlock("lang");
	$fl->assign("ID", $row[0]);
	$fl->assign("LANGUAGE", opmaak($row[1]));
}

$fl->printToScreen();
?>
