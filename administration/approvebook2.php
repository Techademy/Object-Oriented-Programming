<?php
include("../config.php");

$fl = new TemplatePower("./approvebook2.tpl");

require("./header.php");

$updatequery="UPDATE fl_books SET title='$title', summary='$summary', pubdate='$pubdate', publisher='$publisher', isbn='$isbn', world='$theme', category='$category', type='$type', language='$language' WHERE id='$id'";
$updateresult=mysql_query($updatequery);

$query="SELECT title, isbn, submittedby, UNIX_TIMESTAMP(added), notify from fl_books where id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$asin=ereg_replace("-", "", $row[1]);
$fl->assignGlobal("ASIN", $asin);
$fl->assignGlobal("ID", $id);

$fl->assign("_ROOT.UID", $row[2]);
$fl->assign("_ROOT.ADDED", date("d-m-Y G:i", $row[3]));
if($row[4]==1)
{
	$notify="yes";
}
elseif($row[4]==0)
{
	$notify="no";
}
$fl->assign("_ROOT.NOTIFY", $notify);

$uquery="SELECT name FROM fl_users WHERE id='$row[2]'";
$uresult=mysql_query($uquery);
$urow=mysql_fetch_row($uresult);
$fl->assign("_ROOT.UNAME", $urow[0]);
$fl->assign("_ROOT.TITLE", $row[0]);

if ($handle = opendir('../images/books')) {
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