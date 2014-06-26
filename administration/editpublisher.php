<?php
include("../config.php");

$fl = new TemplatePower("./editpublisher.tpl");

require("./header.php");

$query="SELECT name, address, country, description, logo, url, submittedby FROM fl_publishers WHERE id='".$_GET['id']."'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.ID", $_GET['id']);
$fl->assign("_ROOT.NAME", opmaak($row[0]));
$fl->assign("_ROOT.ADDRESS", $row[1]);
$fl->assign("_ROOT.COUNTRY", opmaak($row[2]));
$fl->assign("_ROOT.DESCRIPTION", $row[3]);
$fl->assign("_ROOT.URL", opmaak($row[5]));

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
			if($file==$row[4])
			{
				$fl->assign("IMAGESELECTED", "SELECTED");
			}
			else
			{
				$fl->assign("IMAGESELECTED", "");
			}
        } 
    }
    closedir($handle); 
}

$fl->printToScreen();
?>
