<?php
include("./config.php");

$fl = new TemplatePower("./templates/books.tpl");

require("./header.php");

$fl->assign("_ROOT.SITENAAM", $sitenaam." / Books");

$file=eregi_replace($_SERVER['SERVER_NAME'], "", $_SERVER['REQUEST_URI']);
if($fileroot!="")
{
  $file=eregi_replace($fileroot, "", $file);
}
$var=explode("/", $file);

if(isset($var[3]) && $var[3]>0)
{
  $start=$var[3];
}
else
{
  $start=0;
}

if(!isset($var[2])||$var[2]==0)
{
  $var[2]=0;
}

$fl->assignGlobal("CAT", $var[2]);

if(isset($var[4]))
{
  $fl->assignGlobal("LETTER", $var[4]);
}

$query="SELECT id, title FROM fl_books WHERE approved!='0000-00-00 00:00:00'";
if(isset($var[2]) && $var[2]>0)
{
  $query.=" AND category='".invoer($var[2])."'";
}
if(isset($var[4])&&$var[4]!="")
{
  $query.=" AND (title LIKE '".invoer($var[4])."%' OR title LIKE '".addslashes(strtoupper($var[4]))."%')";
}
$query.=" ORDER BY title LIMIT ".$start.", 30";
$result=mysql_query($query);
$aantal=mysql_num_rows($result);
while($row=mysql_fetch_row($result))
{
  $keywords = '';
  $fl->newBlock("book");
  $fl->assign("BID", opmaak($row[0]));
  $fl->assign("TITLE", opmaak($row[1]));
  $bookrating=getrating($row[0]);
  if($bookrating && $bookrating>0)
  {
    $fl->newBlock("rating");
    $fl->assign("RATING", $bookrating);
  }
  else
  {
    $fl->newBlock("norating");
  }
  $keywords.=opmaak($row[1]).", ";
  $aquery="SELECT a.id, a.name, a.firstname FROM fl_authors a, fl_author_book b WHERE a.id=b.author AND b.book='".$row[0]."'";
  $aresult=mysql_query($aquery);
  if(mysql_num_rows($aresult)==1)
  {
    while($arow=mysql_fetch_row($aresult))
    {
      $fl->newBlock("authors");
      $fl->assign("AID", $arow[0]);
      $fl->assign("AUTHOR", opmaak("$arow[2] $arow[1]"));
      $keywords.=opmaak($arow[1]).", ";
    }
  }
  else
  {
    $fl->newBlock("variousauthors");
  }
}

if($aantal==0)
{
  $fl->newBlock("feedback");
  $fl->assign("FEEDBACK", "The listing you are requesting contains no books. Sorry.");
}

$telquery="SELECT COUNT(id) FROM fl_books WHERE approved!='0000-00-00 00:00:00'";
if($var[2] && $var[2]>0)
{
  $telquery.=" AND category='".invoer($var[2])."'";
}
if(isset($var[4])&&$var[4]!="")
{
  $telquery.=" AND (title LIKE '".invoer($var[4])."%' OR title LIKE '".addslashes(strtoupper($var[4]))."%')";
}
$telresult=mysql_query($telquery);
$telrow=mysql_fetch_row($telresult);
$telaantal=$telrow[0];

if($telaantal>$aantal)
{
  if($start>29)
  {
    $fl->newBlock("prevpage");
    $fl->assign("START", $start-30);
  }
  elseif($start>0&&$start<30)
  {
    $fl->newBlock("prevpage");
    $fl->assign("START", 0);
  }
  if($start+30<$telaantal&&$aantal==30)
  {
    $fl->newBlock("nextpage");
    $fl->assign("START", $start+30);
  }
}

if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
{
  $fl->newBlock("addabook");
}
$keywords.="Book Listing";
$fl->assign("_ROOT.KEYWORDS", $keywords);
$fl->printToScreen();
?>
