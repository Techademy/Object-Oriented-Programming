<?php
include("../config.php");

$fl = new TemplatePower("./bookdeleted.tpl");

require("./header.php");

$query="SELECT b.title FROM fl_books b WHERE b.id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.TITLE", opmaak($row[0]));

$dquery="DELETE FROM fl_books WHERE id='$id'";
$dresult=mysql_query($dquery);
if($dresult==1)
{
	$d2query="DELETE FROM fl_author_book WHERE book='$id'";
	$d2result=mysql_query($d2query);
	$fl->assign("_ROOT.FEEDBACK", "Book has been deleted");
}
else
{
	$fl->assign("_ROOT.FEEDBACK", "Something went wrong: ".mysql_error());
}

$fl->printToScreen();
?>