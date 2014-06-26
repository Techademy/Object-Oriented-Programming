<?php
include("../config.php");

$fl = new TemplatePower("./erroreditted.tpl");

require("./header.php");

$query="UPDATE fl_errors SET error='$error', source='$source', type='$type' WHERE id='$id'";
$result=mysql_query($query);

if($result==1)
{
	$fl->newBlock("confirm");
	$fl->assign("CONFIRM", "Error has been editted");
}

$fl->printToScreen();
?>
