<?php
include("./config.php");

$fl = new TemplatePower("./templates/book.tpl");

require("./header.php");
$file=eregi_replace($_SERVER['SERVER_NAME'], "", $_SERVER['REQUEST_URI']);
if($fileroot!="")
{
  $file=eregi_replace($fileroot, "", $file);
}
$var=explode("/", $file);

$query="SELECT b.title, b.summary, b.pubdate, b.publisher, b.image, b.isbn, b.world, b.submittedby, b.category, UNIX_TIMESTAMP(b.added), UNIX_TIMESTAMP(b.approved), b.language, b.type FROM fl_books b WHERE b.id='".invoer($var[2])."' AND b.approved!='0000-00-00 00:00:00'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);
if(mysql_num_rows($result)>0)
{
  $keywords = '';
  $fl->newBlock("bookinfo");
  $fl->assignGlobal("TITLE", opmaak($row[0]));
  $fl->assign("_ROOT.SITENAAM", $sitenaam." / ".opmaak($row[0]));
  $keywords.=opmaak($row[0]).", ";
  $fl->assign("SUMMARY", stripslashes($row[1]));
  $fl->assign("PUBDATE", opmaak($row[2]));
  $fl->assign("ISBN", opmaak($row[5]));
  $fl->assign("ASIN", ereg_replace("-", "", $row[5]));
  $fl->assign("LANG", opmaak($row[11]));
  $fl->assign("TYPE", opmaak($row[12]));
  $keywords.=opmaak($row[5]).", ";
  $fl->assign("ADDED", date("d M Y G:i", $row[9]));
  $fl->assign("APPROVED", date("d M Y G:i", $row[10]));
  $squery="SELECT name FROM fl_users WHERE id='".invoer($row[7])."'";
  $sresult=mysql_query($squery);
  $srow=mysql_fetch_row($sresult);
  $fl->assign("UID", opmaak($row[7]));
  $fl->assign("SUBMITTER", opmaak($srow[0]));
  $cquery="SELECT name FROM fl_categories WHERE id='".invoer($row[8])."'";
  $cresult=mysql_query($cquery);
  $crow=mysql_fetch_row($cresult);
  $fl->assign("CID", $row[8]);
  $fl->assign("CATEGORY", opmaak($crow[0]));
  $keywords.=opmaak($crow[0]).", ";

  $bookrate=getrating($var[2]);
  if($bookrate>0)
  {
    $fl->newBlock("bookrate");
    $fl->assign("RATING", $bookrate);
  }
  else
  {
    $fl->newBlock("nobookrate");
  }


  if($row[4]!="")
  {
    $fl->newBlock("image");
    $fl->assign("IMAGE", $row[4]);
    $fl->assign('TITLE', opmaak($row[0]));
  }

  $pquery="SELECT name FROM fl_publishers WHERE id='".invoer($row[3])."' AND approved='1'";
  $presult=mysql_query($pquery);
  $prow=mysql_fetch_row($presult);
  if($prow[0]!="")
  {
    $fl->newBlock("publisher");
    $fl->assign("PID", $row[3]);
    $fl->assign("PUBLISHER", opmaak($prow[0]));
    $keywords.=opmaak($prow[0]).", ";
  }

  $aquery="SELECT a.id, a.name, a.firstname FROM fl_authors a, fl_author_book b WHERE b.book='".invoer($var[2])."' AND a.id=b.author AND a.approved='1'";
  $aresult=mysql_query($aquery);
  while($arow=mysql_fetch_row($aresult))
  {
    $fl->newBlock("author");
    $fl->assign("AID", $arow[0]);
    $fl->assign("AUTHOR", opmaak("$arow[2] $arow[1]"));
    $keywords.=opmaak($arow[1]).", ";
  }

  $wquery="SELECT name FROM fl_worlds WHERE id='".invoer($row[6])."' AND approved='1'";
  $wresult=mysql_query($wquery);
  $wrow=mysql_fetch_row($wresult);
  if($wrow[0]!="")
  {
    $fl->newBlock("world");
    $fl->assign("WID", $row[6]);
    $fl->assign("WORLD", opmaak($wrow[0]));
    $keywords.=opmaak($wrow[0]).", ";
  }
  $fl->newBlock("collection");
  $fl->assign("BID", $var[2]);
  $colquery="SELECT COUNT(id) FROM fl_collection WHERE book='".invoer($var[2])."'";
  $colresult=mysql_query($colquery);
  $colrow=mysql_fetch_row($colresult);
  $fl->assign("HAVENUMBER", $colrow[0]);
  if($colrow[0]==0 || $colrow[0]>1)
  {
    $fl->assign("HS", "s");
    $fl->assign("HAVE", "have");
  }
  else
  {
    $fl->assign("HAVE", "has");
  }

  $wantquery="SELECT COUNT(id) FROM fl_wanted WHERE book='".invoer($var[2])."'";
  $wantresult=mysql_query($wantquery);
  $wantrow=mysql_fetch_row($wantresult);
  $fl->assign("WANTNUMBER", $wantrow[0]);
  if($wantrow[0]==0 || $wantrow[0]>1)
  {
    $fl->assign("WS", "s");
    $fl->assign("WANT", "want");
  }
  else
  {
    $fl->assign("WANT", "wants");
  }
  if($wantrow[0]>0)
  {
    $fl->newBlock("who");
    $fl->assign("BID", $var[2]);
  }
  if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
  {
    $usid=get_uid($username);
    $incolquery="SELECT COUNT(id) FROM fl_collection WHERE user='".invoer($usid)."' AND book='".invoer($var[2])."'";
    $incolresult=mysql_query($incolquery);
    $incolrow=mysql_fetch_row($incolresult);
    if($incolrow[0]==0)
    {
      $fl->newBlock("useraddhave");
      $fl->assign("BID", $var[2]);
    }
    else
    {
      $fl->newBlock("userhave");
    }

    $inwantquery="SELECT COUNT(id) FROM fl_wanted WHERE user='".invoer($usid)."' AND book='".invoer($var[2])."'";
    $inwantresult=mysql_query($inwantquery);
    $inwantrow=mysql_fetch_row($inwantresult);
    if($inwantrow[0]==0)
    {
      $fl->newBlock("useraddwant");
      $fl->assign("BID", $var[2]);
    }
    else
    {
      $fl->newBlock("userwant");
    }
  }

  if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
  {
    $dezeuser=get_uid($username);
    $checkquery="SELECT id, rating FROM fl_bookreviews WHERE book_id='".invoer($var[2])."' AND user_id='".invoer($dezeuser)."'";
    $checkresult=mysql_query($checkquery);
    if(mysql_num_rows($checkresult)==0)
    {
      $fl->newBlock("commentform");
      $fl->assign("BID", $var[2]);
    }
    else
    {
      $checkrow=mysql_fetch_row($checkresult);
      $fl->newBlock("alreadyrated");
      $fl->assign("RATING", opmaak($checkrow[1]));
    }
  }
  else
  {
    $fl->newBlock("loggedoutcommentform");
  }

  $comquery="SELECT u.name, b.review, UNIX_TIMESTAMP(b.datetime), b.rating, b.user_id FROM fl_users u, fl_bookreviews b WHERE b.book_id='".invoer($var[2])."' AND b.user_id=u.id ORDER BY b.datetime DESC LIMIT 3";
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
      $fl->assign("USER", opmaak($comrow[0]));
      $fl->assign("UID", opmaak($comrow[4]));
      $fl->assign("DATETIME", date("d-m-Y G:i", $comrow[2]));
      $fl->assign("RATING", opmaak($comrow[3]));
      if($comrow[1]!="")
      {
        $fl->newBlock("review");
        $fl->assign("REVIEW", opmaak($comrow[1]));
      }
    }

    $comcountquery="SELECT COUNT(id) FROM fl_bookreviews WHERE book_id='".invoer($var[2])."'";
    $comcountresult=mysql_query($comcountquery);
    $comcountrow=mysql_fetch_row($comcountresult);
    if($comcountrow[0]>3)
    {
      $fl->newBlock("morecommentslink");
      $fl->assign("BID", opmaak($var[2]));
    }
  }

}
else
{
  $fl->newBlock("feedback");
  $fl->assign("_ROOT.SITENAAM", "$sitenaam / Book not found");
  $fl->assign("FEEDBACK", "Something seems to be wrong: make sure you have the correct link, or else <a href=\"$fileroot/books.php\">check this list</a> to find the book you are looking for");
}

$fl->assign("_ROOT.KEYWORDS", $keywords);
$fl->printToScreen();
?>
