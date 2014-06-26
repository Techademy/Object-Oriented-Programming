<?php
include("../config.php");

$fl = new TemplatePower("./pendingbooks.tpl");

require("./header.php");

$query="SELECT id, title, isbn, UNIX_TIMESTAMP(added) FROM fl_books WHERE approved='0000-00-00 00:00:00' ORDER BY added ASC";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
	$fl->newBlock("book");
	$fl->assign("ID", $row[0]);
	$fl->assign("TITLE", opmaak($row[1]));
	$fl->assign("ADDED", date("d-m-Y G:i", $row[3]));
	
	$cquery="SELECT id, title, UNIX_TIMESTAMP(added), UNIX_TIMESTAMP(approved) FROM fl_books WHERE approved!='0000-00-00 00:00:00' AND isbn='$row[2]'";
	$cresult=mysql_query($cquery);
	if(mysql_num_rows($cresult)>0)
	{
		$crow=mysql_fetch_row($cresult);
		$fl->newBlock("exists");
		$fl->assign("ID", $crow[0]);
		$fl->assign("TITLE", opmaak($crow[1]));
		$fl->assign("ADDED", date("d-m-Y G:i", $crow[2]));
		$fl->assign("APPROVED", date("d-m-Y G:i", $crow[3]));
	}
}

$fl->printToScreen();
?>