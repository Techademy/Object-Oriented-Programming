<?php
include("../config.php");

$fl = new TemplatePower("./themeeditted.tpl");

require("./header.php");

$query="UPDATE fl_worlds SET name='$name', description='$description' WHERE id='$id'";
$result=mysql_query($query);

$equery="SELECT a.submittedby FROM fl_worlds a WHERE a.id='$id'";
$eresult=mysql_query($equery);
$erow=mysql_fetch_row($eresult);

if($result==1)
{
	$fl->newBlock("confirm");
	$fl->assign("CONFIRM", "Theme has been approved and can now be found on the site: <a href=\"$fileroot/theme.php/$id\">$name</a>");
}

$fl->assign("_ROOT.UID", $erow[2]);

$uquery="SELECT name FROM fl_users WHERE id='$erow[2]'";
$uresult=mysql_query($uquery);
$urow=mysql_fetch_row($uresult);
$fl->assign("_ROOT.UNAME", opmaak($urow[0]));

$fl->printToScreen();
?>