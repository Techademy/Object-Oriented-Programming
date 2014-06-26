<?php
include("../config.php");

$fl = new TemplatePower("./usereditted.tpl");

require("./header.php");

$query="UPDATE fl_users SET userlevel='$level' WHERE id='$id'";
$result=mysql_query($query);

if($result==1)
{
	$fl->newBlock("confirm");
	$fl->assign("CONFIRM", "User has been editted");
}

$fl->printToScreen();
?>
