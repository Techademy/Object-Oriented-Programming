<?php
$fl->assignInclude("header", "./templates/header.tpl");
$fl->assignInclude("footer", "./templates/footer.tpl");

$fl->prepare();

$fl->assignGlobal("FILEROOT", $fileroot);

if(((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1)) && get_userlevel($username)==3)
{
$fl->assign("TARGET", "logout");
}
else
{
	header("location: $fileroot/index.php");
}

$query="SELECT COUNT(id) FROM fl_books WHERE approved='0000-00-00 00:00:00'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);
	$fl->assign("_ROOT.PENBOOKS", $row[0]);

$query="SELECT COUNT(id) FROM fl_authors WHERE approved='0'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);
	$fl->assign("_ROOT.PENAUTHORS", $row[0]);

$query="SELECT COUNT(id) FROM fl_publishers WHERE approved='0'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);
	$fl->assign("_ROOT.PENPUBS", $row[0]);
	
$query="SELECT COUNT(id) FROM fl_worlds WHERE approved='0'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);
	$fl->assign("_ROOT.PENTHEMES", $row[0]);
?>