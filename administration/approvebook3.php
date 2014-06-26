<?php
include("../config.php");

$fl = new TemplatePower("./approvebook3.tpl");

require("./header.php");

if($step2complete)
{
	$updatequery="UPDATE fl_books SET image='$image' WHERE id='$id'";
	$updateresult=mysql_query($updatequery);
}
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
$query="SELECT title, isbn, submittedby, UNIX_TIMESTAMP(added), notify from fl_books where id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$asin=ereg_replace("-", "", $row[1]);
$fl->assignGlobal("ASIN", $asin);
$fl->assignGlobal("ID", $id);

$fl->assign("_ROOT.UID", $row[2]);
$fl->assign("_ROOT.ADDED", date("d-m-Y G:i", $row[3]));
if($row[4]==1)
{
	$notify="yes";
}
elseif($row[4]==0)
{
	$notify="no";
}
$fl->assign("_ROOT.NOTIFY", $notify);

$num=1;

$query="SELECT b.id, a.name, a.firstname FROM fl_author_book b, fl_authors a WHERE b.book='$id' AND b.author=a.id ORDER BY b.id";
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