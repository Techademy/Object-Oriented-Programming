<?php
include("../config.php");

$fl = new TemplatePower("./newsdeleted.tpl");

require("./header.php");

$query="SELECT b.title FROM fl_news b WHERE b.id='".$_POST['id']."'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.TITLE", opmaak($row[0]));

$dquery="DELETE FROM fl_news WHERE id='".$_POST['id']."'";
$dresult=mysql_query($dquery);
if($dresult==1)
{
	$fl->assign("_ROOT.FEEDBACK", "Newsitem has been deleted");
}
else
{
	$fl->assign("_ROOT.FEEDBACK", "Something went wrong: ".mysql_error());
}

$fl->printToScreen();
?>
