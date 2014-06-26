<?php
include("../config.php");

$fl = new TemplatePower("./publishereditted.tpl");

require("./header.php");

$query="UPDATE fl_publishers SET name='".$_POST['name']."', address='".$_POST['address']."', country='".$_POST['country']."', description='".$_POST['description']."', logo='".$_POST['logo']."', url='".$_POST['url']."' WHERE id='".$_POST['id']."'";
$result=mysql_query($query);

$equery="SELECT u.email, a.notify, u.id FROM fl_users u, fl_publishers a WHERE a.id='".$_POST['id']."' AND u.id=a.submittedby";
$eresult=mysql_query($equery);
$erow=mysql_fetch_row($eresult);

if($result==1)
{
	$fl->newBlock("confirm");
	$fl->assign("CONFIRM", "Publisher has been editted and can now be found on the site: <a href=\"$fileroot/publisher.php/".$_POST['id']."\">".$_POST['name']."</a>");
}

$fl->assign("_ROOT.UID", $erow[2]);

$uquery="SELECT name FROM fl_users WHERE id='$erow[2]'";
$uresult=mysql_query($uquery);
$urow=mysql_fetch_row($uresult);
$fl->assign("_ROOT.UNAME", opmaak($urow[0]));

$fl->printToScreen();
?>