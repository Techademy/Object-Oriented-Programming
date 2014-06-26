<?php
include("../config.php");

$fl = new TemplatePower("./approveauthor2.tpl");

require("./header.php");

$query="UPDATE fl_authors SET name='" . mysql_real_escape_string($name) . "', bio='" . mysql_real_escape_string($bio) . "', approved='1', firstname='" . mysql_real_escape_string($firstname) . "' WHERE id='$id'";
$result=mysql_query($query);

$equery="SELECT u.email, a.notify, u.id FROM fl_users u, fl_authors a WHERE a.id='$id' AND u.id=a.submittedby";
$eresult=mysql_query($equery);
$erow=mysql_fetch_row($eresult);

if($result==1)
{
	$fl->newBlock("confirm");
	$fl->assign("CONFIRM", "Author has been approved and can now be found on the site: <a href=\"$fileroot/author.php/$id\">$firstname $name</a>");
	if($erow[1]==1)
	{
		send_author_confirmation($id, $erow[0]);
		$fl->newBlock("confirm");
		$fl->assign("CONFIRM", "An e-mail has been sent to the submitting user");
	}
}

if($erow[1]==0)
{
	$fl->assign("_ROOT.NOTIFY", "no");
}
else
{
	$fl->assign("_ROOT.NOTIFY", "yes");
}
$fl->assign("_ROOT.UID", $erow[2]);

$uquery="SELECT name FROM fl_users WHERE id='$erow[2]'";
$uresult=mysql_query($uquery);
$urow=mysql_fetch_row($uresult);
$fl->assign("_ROOT.UNAME", opmaak($urow[0]));

$fl->printToScreen();
?>