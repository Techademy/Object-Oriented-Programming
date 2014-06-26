<?php
include("../config.php");

$fl = new TemplatePower("./bookadmin.tpl");

require("./header.php");

$query="SELECT id, title, isbn, UNIX_TIMESTAMP(added) FROM fl_books WHERE approved!='0000-00-00 00:00:00' ORDER BY title ASC";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
	$fl->newBlock("book");
	$fl->assign("ID", $row[0]);
	$fl->assign("TITLE", opmaak($row[1]));
	$fl->assign("ADDED", date("d-m-Y G:i", $row[3]));
}

$fl->printToScreen();
?>