<?php
include("./config.php");

$fl = new TemplatePower("./templates/rating.tpl");

require("./header.php");
$file=eregi_replace($_SERVER['SERVER_NAME'], "", $_SERVER['REQUEST_URI']);
if($fileroot!="")
{
  $file=eregi_replace($fileroot, "", $file);
}
$var=explode("/", $file);
$query="SELECT title FROM fl_books WHERE approved!='0000-00-00 00:00:00' AND id='".invoer($var[2])."'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.BOOK", opmaak($row[0]));
$fl->assign("_ROOT.BID", opmaak($var[2]));
$fl->assign("_ROOT.SITENAAM", $sitenaam." / Rating for ".opmaak($row[0]));
$keywords=opmaak($row[0]).", ";

if(isset($var[3]) && $var[3]>0)
{
  $start=$var[3];
}
else
{
  $start=0;
}

if(isset($login)&&$login==1 || isset($authenticated)&&$authenticated==1)
{
  $dezeuser=get_uid($username);
  $checkquery="SELECT id, rating FROM fl_bookreviews WHERE book_id='".invoer($var[2])."' AND user_id='".$dezeuser."'";
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

$comquery="SELECT u.name, b.review, UNIX_TIMESTAMP(b.datetime), b.rating, b.user_id FROM fl_users u, fl_bookreviews b WHERE b.book_id='".invoer($var[2])."' AND b.user_id=u.id ORDER BY b.datetime DESC";
$comresult=mysql_query($comquery);
$comaantal=mysql_num_rows($comresult);
if($comaantal>0)
{

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
}

if($comaantal>0)
{
  if($start>0 && $start>29)
  {
    $fl->newBlock("prevpage");
    $fl->assign("BID", $var[2]);
    $fl->assign("START", $start-30);
  }
  elseif($start>0&&$start<30)
  {
    $fl->newBlock("prevpage");
    $fl->assign("BID", $var[2]);
    $fl->assign("START", 0);
  }
  if($start+30<$comaantal)
  {
    $fl->newBlock("nextpage");
    $fl->assign("BID", $var[2]);
    $fl->assign("START", $start+30);
  }
}

$keywords.="Comments on Book";
$fl->assign("_ROOT.KEYWORDS", $keywords);
$fl->printToScreen();
?>
