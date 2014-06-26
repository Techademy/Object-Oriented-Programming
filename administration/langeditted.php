<?php
include("../config.php");

$fl = new TemplatePower("./langeditted.tpl");

require("./header.php");

$query="UPDATE fl_languages SET name='$name' WHERE id='$id'";
$result=mysql_query($query);

if($result==1)
{
	$fl->newBlock("confirm");
	$fl->assign("CONFIRM", "Language has been editted");
}

$fl->printToScreen();
?>
