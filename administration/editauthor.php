<?php
include("../config.php");

$fl = new TemplatePower("./editauthor.tpl");

require("./header.php");

$query="SELECT name, bio, submittedby, image, firstname FROM fl_authors WHERE id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.ID", $id);
$fl->assign("_ROOT.NAME", opmaak($row[0]));
$fl->assign("_ROOT.FIRSTNAME", opmaak($row[4]));
$fl->assign("_ROOT.BIO", $row[1]);

$fl->assign("_ROOT.UID", $row[2]);

$uquery="SELECT name FROM fl_users WHERE id='$row[2]'";
$uresult=mysql_query($uquery);
$urow=mysql_fetch_row($uresult);
$fl->assign("_ROOT.UNAME", opmaak($urow[0]));

if ($handle = opendir('../images/authors')) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != ".." && (ereg(".jpg", $file) || ereg(".gif", $file) || ereg(".png", $file) )) {
            $fl->newBlock("image");
			$fl->assign("IMAGE", $file);
			if($file==$row[3])
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
