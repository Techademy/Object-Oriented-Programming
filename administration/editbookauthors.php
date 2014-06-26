<?php
include("../config.php");

$fl = new TemplatePower("./editbookauthors.tpl");

require("./header.php");

if($addauthor)
{
	$addquery="INSERT INTO fl_author_book (author, book) VALUES ('$addauthorselect', '$id')";
	$addresult=mysql_query($addquery);
}
if($deleteauthor)
{
	$delquery="DELETE FROM fl_author_book WHERE id='$del_id'";
	$delresult=mysql_query($delquery);
}
$query="SELECT title, isbn, submittedby, UNIX_TIMESTAMP(added) from fl_books where id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$asin=ereg_replace("-", "", $row[1]);
$fl->assignGlobal("ASIN", $asin);
$fl->assignGlobal("ID", $id);

$fl->assign("_ROOT.UID", $row[2]);
$fl->assign("_ROOT.ADDED", date("d-m-Y G:i", $row[3]));

$uquery="SELECT name FROM fl_users WHERE id='$row[2]'";
$uresult=mysql_query($uquery);
$urow=mysql_fetch_row($uresult);
$fl->assign("_ROOT.UNAME", opmaak($urow[0]));

$num=1;

$query="SELECT b.id, a.name, a.firstname FROM fl_author_book b, fl_authors a WHERE book='$id' AND b.author=a.id ORDER BY b.id";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
	$fl->newBlock("author");
	$fl->assign("NUM", $num);
	$fl->assign("AUTHOR", opmaak("$row[2] $row[1]"));
	$fl->assign("DEL_ID", $row[0]);
	$num=$num+1;
}

$query="SELECT id, name, firstname FROM fl_authors WHERE approved='1' ORDER BY name";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
	$fl->newBlock("addauthor");
	$fl->assign("AID", $row[0]);
	$fl->assign("ANAME", opmaak("$row[2] $row[1]"));
}

$fl->printToScreen();
?>