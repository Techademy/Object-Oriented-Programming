<?php
include("../config.php");

$fl = new TemplatePower("./errordeleted.tpl");

require("./header.php");

$dquery="DELETE FROM fl_errors WHERE id='$id'";
$dresult=mysql_query($dquery);
if($dresult==1)
{
	$fl->assign("_ROOT.FEEDBACK", "Error has been deleted");
}
else
{
	$fl->assign("_ROOT.FEEDBACK", "Something went wrong: ".mysql_error());
}

$fl->printToScreen();
?>
