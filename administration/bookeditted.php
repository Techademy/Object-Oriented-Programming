<?php
include("../config.php");

$fl = new TemplatePower("./bookeditted.tpl");

require("./header.php");

$updatequery="UPDATE fl_books SET title='$title', summary='$summary', pubdate='$pubdate', publisher='$publisher', isbn='$isbn', world='$world', category='$category', type='$type', language='$language', image='$image' WHERE id='$id'";
$result=mysql_query($updatequery);

$equery="SELECT title, submittedby FROM fl_books WHERE id='$id'";
$eresult=mysql_query($equery);
$erow=mysql_fetch_row($eresult);

if($result==1)
{
	$fl->newBlock("confirm");
	$fl->assign("CONFIRM", "Book has been editted and the new information can now be found on the site: <a href=\"$fileroot/book.php/$id\">$erow[0]</a>");
}

$fl->assign("_ROOT.UID", $erow[1]);

$uquery="SELECT name FROM fl_users WHERE id='$erow[1]'";
$uresult=mysql_query($uquery);
$urow=mysql_fetch_row($uresult);
$fl->assign("_ROOT.UNAME", opmaak($urow[0]));

$fl->printToScreen();
?>