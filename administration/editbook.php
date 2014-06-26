<?php
include("../config.php");

$fl = new TemplatePower("./editbook.tpl");

require("./header.php");

$query="SELECT title, summary, pubdate, publisher, isbn, world, submittedby, category, type, language, image from fl_books where id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$asin=ereg_replace("-", "", $row[4]);
$fl->assignGlobal("ASIN", $asin);
$fl->assignGlobal("ID", $id);

$fl->assign("_ROOT.UID", $row[6]);

$uquery="SELECT name FROM fl_users WHERE id='$row[6]'";
$uresult=mysql_query($uquery);
$urow=mysql_fetch_row($uresult);
$fl->assign("_ROOT.UNAME", $urow[0]);

$fl->assign("_ROOT.TITLE", $row[0]);
$fl->assign("_ROOT.SUMMARY", $row[1]);
$fl->assign("_ROOT.ISBN", $row[4]);
$fl->assign("_ROOT.PUBDATE", $row[2]);

$pubquery="SELECT id, name FROM fl_publishers WHERE approved='1' ORDER BY name";
$pubresult=mysql_query($pubquery);
while($pubrow=mysql_fetch_row($pubresult))
{
	$fl->newBlock("publisher");
	$fl->assign("PID", $pubrow[0]);
	$fl->assign("PUBNAME", $pubrow[1]);
	if($pubrow[0]==$row[3])
	{
		$fl->assign("SELECTED", "SELECTED");
	}
	else
	{
		$fl->assign("SELECTED", "");
	}
}

$themequery="SELECT id, name FROM fl_worlds WHERE approved='1' ORDER BY name";
$themeresult=mysql_query($themequery);
while($themerow=mysql_fetch_row($themeresult))
{
	$fl->newBlock("theme");
	$fl->assign("TID", $themerow[0]);
	$fl->assign("THEMENAME", $themerow[1]);
	if($themerow[0]==$row[5])
	{
		$fl->assign("SELECTED", "SELECTED");
	}
	else
	{
		$fl->assign("SELECTED", "");
	}
}

$catquery="SELECT id, name FROM fl_categories ORDER BY name";
$catresult=mysql_query($catquery);
while($catrow=mysql_fetch_row($catresult))
{
	$fl->newBlock("category");
	$fl->assign("CID", $catrow[0]);
	$fl->assign("CATNAME", $catrow[1]);
	if($catrow[0]==$row[7])
	{
		$fl->assign("SELECTED", "SELECTED");
	}
	else
	{
		$fl->assign("SELECTED", "");
	}
}

$typequery="SELECT name FROM fl_types ORDER BY name";
$typeresult=mysql_query($typequery);
while($typerow=mysql_fetch_row($typeresult))
{
	$fl->newBlock("type");
	$fl->assign("TYPENAME", $typerow[0]);
	if($typerow[0]==$row[8])
	{
		$fl->assign("SELECTED", "SELECTED");
	}
	else
	{
		$fl->assign("SELECTED", "");
	}
}

$langquery="SELECT name FROM fl_languages ORDER BY name";
$langresult=mysql_query($langquery);
while($langrow=mysql_fetch_row($langresult))
{
	$fl->newBlock("language");
	$fl->assign("LANGNAME", $langrow[0]);
	if($langrow[0]==$row[9])
	{
		$fl->assign("SELECTED", "SELECTED");
	}
	else
	{
		$fl->assign("SELECTED", "");
	}
}

if ($handle = opendir('../images/books')) {
    while (false !== ($file = readdir($handle))) { 
        if ($file != "." && $file != ".." && (ereg(".jpg", $file) || ereg(".gif", $file) || ereg(".png", $file) )) { 
            $fl->newBlock("image");
			$fl->assign("IMAGE", $file);
			if($file==$row[10])
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