<?php
include("./config.php");

$fl = new TemplatePower("./templates/author.tpl");

require("./header.php");
$file=eregi_replace($_SERVER['SERVER_NAME'], "", $_SERVER['REQUEST_URI']);
if($fileroot!="")
{
$file=eregi_replace($fileroot, "", $file);
}
$var=explode("/", $file);
$query="SELECT name, bio, image, firstname FROM fl_authors WHERE approved='1' AND id='".invoer($var[2])."'";
$result=mysql_query($query);
if(mysql_num_rows($result)==1)
{
	$row=mysql_fetch_row($result);
	$fl->newBlock("author");
	$fl->assign("_ROOT.SITENAAM", $sitenaam." / ".opmaak($row[3])." ".opmaak($row[0]));
	$fl->assignGlobal("AUTHOR", opmaak($row[3].' '.$row[0]));
	$fl->assign("BIO", stripslashes($row[1]));
  $keywords = '';
     if($row[2]!="")
     {
          $fl->newBlock("picture");
          $fl->assign("IMAGE", $row[2]);
          $fl->assign("ALT", opmaak("picture: ".opmaak($row[3].' '.$row[0])));
     }
 
	$keywords.=opmaak($row[0]).", ";
	$keywords.=opmaak($row[3]).", ";
	$bquery="SELECT b.id, b.title FROM fl_books b, fl_author_book a WHERE a.author='".invoer($var[2])."' AND a.book=b.id AND b.approved!='0000-00-00 00:00:00'";
	$bresult=mysql_query($bquery);
	$baantal=mysql_num_rows($bresult);
	if($baantal>0)
	{
		$fl->newBlock("bookheader");
		if($baantal==1)
		{
			$fl->assign("BOOKHEADER", "Book by this author");
		}
		else
		{
			$fl->assign("BOOKHEADER", "Books by this author");
		}
		while($brow=mysql_fetch_row($bresult))
		{
			$fl->newBlock("books");
			$fl->assign("BID", opmaak($brow[0]));
			$fl->assign("BOOK", opmaak($brow[1]));
		}
	}
}
else
{
	$fl->newBlock("feedback");
	$fl->assign("_ROOT.SITENAAM", $sitenaam." / Author not found");
	$fl->assign("FEEDBACK", "Something seems to be wrong: make sure you have the correct link, or else <a href=\"$fileroot/authors.php\">check this list</a> to find the author you are looking for");
}

if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
{
$fl->newBlock("commentform");
$fl->assign("AID", $var[2]);
}
else
{
$fl->newBlock("loggedoutcommentform");
}

$comquery="SELECT u.name, c.comment, UNIX_TIMESTAMP(c.datetime), c.user_id FROM fl_users u, fl_authorcomments c WHERE c.author_id='".invoer($var[2])."' AND c.user_id=u.id ORDER BY c.datetime DESC LIMIT 3";
$comresult=mysql_query($comquery);
$comaantal=mysql_num_rows($comresult);
if($comaantal>0)
{
	$fl->newBlock("mostrecentcomments");
	if($comaantal>1)
	{
		$fl->assign("S", "s");
	}
	
	while($comrow=mysql_fetch_row($comresult))
	{
		$fl->newBlock("comment");
		$fl->assign("COMMENT", opmaak($comrow[1]));
		$fl->assign("USER", opmaak($comrow[0]));
		$fl->assign("UID", opmaak($comrow[3]));
		$fl->assign("DATETIME", date("d-m-Y G:i", $comrow[2]));
	}
	
	$comcountquery="SELECT COUNT(id) FROM fl_authorcomments WHERE author_id='".invoer($var[2])."'";
	$comcountresult=mysql_query($comcountquery);
	$comcountrow=mysql_fetch_row($comcountresult);
	if($comcountrow[0]>3)
	{
		$fl->newBlock("morecommentslink");
		$fl->assign("AID", opmaak($var[2]));
	}
}

$keywords.="Author Details";
$fl->assign("_ROOT.KEYWORDS", $keywords);
$fl->printToScreen();
?>
