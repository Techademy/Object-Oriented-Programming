<?php
include("../config.php");

$fl = new TemplatePower("./authordeleted.tpl");

require("./header.php");

$query="SELECT b.name, b.firstname FROM fl_authors b WHERE b.id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.NAME", opmaak("$row[1] $row[0]"));

$dquery="DELETE FROM fl_authors WHERE id='$id'";
$dresult=mysql_query($dquery);
if($dresult==1)
{
	$d2query="DELETE FROM fl_author_book WHERE author='$id'";
	$d2result=mysql_query($d2query);
	$fl->assign("_ROOT.FEEDBACK", "Author has been deleted");
}
else
{
	$fl->assign("_ROOT.FEEDBACK", "Something went wrong: ".mysql_error());
}
$fl->printToScreen();
?>