<?php
include("../config.php");

$fl = new TemplatePower("./authoreditted.tpl");

require("./header.php");

$query="UPDATE fl_authors SET name='$name', bio='$bio', image='$image', firstname='$firstname' WHERE id='$id'";
$result=mysql_query($query);

$equery="SELECT name, submittedby, firstname FROM fl_authors WHERE id='$id'";
$eresult=mysql_query($equery);
$erow=mysql_fetch_row($eresult);

if($result==1)
{
	$fl->newBlock("confirm");
	$fl->assign("CONFIRM", "Author has been editted and the new information can now be found on the site: <a href=\"$fileroot/author.php/$id\">$erow[2] $erow[0]</a>");
}

$fl->assign("_ROOT.UID", $erow[1]);

$uquery="SELECT name FROM fl_users WHERE id='$erow[1]'";
$uresult=mysql_query($uquery);
$urow=mysql_fetch_row($uresult);
$fl->assign("_ROOT.UNAME", opmaak($urow[0]));

$fl->printToScreen();
?>
