<?php
include("../config.php");

$fl = new TemplatePower("./approvepublisher1.tpl");

require("./header.php");

$query="SELECT name, address, country, description, logo, url, submittedby, notify FROM fl_publishers WHERE id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.ID", $id);
$fl->assign("_ROOT.NAME", opmaak($row[0]));
$fl->assign("_ROOT.ADDRESS", $row[1]);
$fl->assign("_ROOT.COUNTRY", opmaak($row[2]));
$fl->assign("_ROOT.DESCRIPTION", $row[3]);
$fl->assign("_ROOT.URL", opmaak($row[5]));

if($row[7]==0)
{
	$fl->assign("_ROOT.NOTIFY", "no");
}
else
{
	$fl->assign("_ROOT.NOTIFY", "yes");
}
$fl->assign("_ROOT.UID", $row[6]);

$uquery="SELECT name FROM fl_users WHERE id='$row[6]'";
$uresult=mysql_query($uquery);
$urow=mysql_fetch_row($uresult);
$fl->assign("_ROOT.UNAME", opmaak($urow[0]));

if ($handle = opendir('../images/publishers')) {
    while (false !== ($file = readdir($handle))) { 
        if ($file != "." && $file != ".." && (ereg(".jpg", $file) || ereg(".gif", $file) || ereg(".png", $file) )) { 
            $fl->newBlock("image");
			$fl->assign("IMAGE", $file);
        } 
    }
    closedir($handle); 
}

$fl->printToScreen();
?>