<?php
include("../config.php");

$fl = new TemplatePower("./typedeleted.tpl");

require("./header.php");

$query="SELECT b.name FROM fl_types b WHERE b.id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.TYPE", opmaak($row[0]));

$dquery="DELETE FROM fl_types WHERE id='$id'";
$dresult=mysql_query($dquery);
if($dresult==1)
{
	$fl->assign("_ROOT.FEEDBACK", "Type has been deleted");
}
else
{
	$fl->assign("_ROOT.FEEDBACK", "Something went wrong: ".mysql_error());
}

$fl->printToScreen();
?>
