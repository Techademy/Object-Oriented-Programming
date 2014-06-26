<?php
include("./config.php");

$fl = new TemplatePower("./templates/mycollection.tpl");

require("./header.php");

if(isset($login)&&$login==1 || isset($authenticated)&&$authenticated==1)
{
	$fl->assign("_ROOT.SITENAAM", $sitenaam." / My Collection");
	$selectid=get_uid($username);
	$query="SELECT b.id, b.title, b.publisher, p.name FROM fl_books b, fl_publishers p, fl_collection c WHERE c.user='".$selectid."' AND c.book=b.id AND b.publisher=p.id AND b.approved!='0000-00-00 00:00:00' ORDER BY title";
	$result=mysql_query($query);
	if(mysql_num_rows($result)>0)
	{
		$fl->newBlock("collection");
		while($row=mysql_fetch_row($result))
		{
			$fl->newBlock("item");
			$fl->assign("BID", opmaak($row[0]));
			$fl->assign("TITLE", opmaak($row[1]));
			$fl->assign("PID", opmaak($row[2]));
			$fl->assign("PUBLISHER", opmaak($row[3]));
			$aquery="SELECT a.id, a.name, a.firstname FROM fl_authors a, fl_author_book b WHERE b.book='".$row[0]."' AND b.author=a.id AND a.approved='1'";
			$aresult=mysql_query($aquery);
			if(mysql_num_rows($aresult)==1)
			{
			while($arow=mysql_fetch_row($aresult))
			{
				$fl->newBlock("author");
				$fl->assign("AID", opmaak($arow[0]));
				$fl->assign("AUTHOR", opmaak($arow[2]." ".$arow[1]));
			}
			}
			else
			{
			$fl->newBlock("variousauthors");
			}
		}
	}
	else
	{
		$fl->newBlock("feedback");
		$fl->assign("FEEDBACK", "There are currently no items in your collection");
	}
}
else
{
	$fl->newBlock("feedback");
	$fl->assign("FEEDBACK", "You need to be logged in to use the personal account pages. If you don't have an account yet, you can <a href=\"signup.php\">sign up for an account here</a>");
	$fl->assign("_ROOT.SITENAAM", $sitenaam." / Please log in");
}

$fl->printToScreen();
?>