<?php
include("../config.php");

$fl = new TemplatePower("./typeeditted.tpl");

require("./header.php");

$query="UPDATE fl_types SET name='$name' WHERE id='$id'";
$result=mysql_query($query);

if($result==1)
{
	$fl->newBlock("confirm");
	$fl->assign("CONFIRM", "Type has been editted");
}

$fl->printToScreen();
?>
