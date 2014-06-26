<?php
include("../config.php");

$fl = new TemplatePower("./approvetheme1.tpl");

require("./header.php");

$query="SELECT name, description, submittedby, notify FROM fl_worlds WHERE id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.ID", $id);
$fl->assign("_ROOT.NAME", opmaak($row[0]));
$fl->assign("_ROOT.DESCRIPTION", $row[1]);

if($row[3]==0)
{
	$fl->assign("_ROOT.NOTIFY", "no");
}
else
{
	$fl->assign("_ROOT.NOTIFY", "yes");
}
$fl->assign("_ROOT.UID", $row[2]);

$uquery="SELECT name FROM fl_users WHERE id='$row[2]'";
$uresult=mysql_query($uquery);
$urow=mysql_fetch_row($uresult);
$fl->assign("_ROOT.UNAME", opmaak($urow[0]));

$fl->printToScreen();
?>