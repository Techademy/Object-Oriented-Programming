<?php
include("./config.php");

$fl = new TemplatePower("./templates/index.tpl");

require("./header.php");

$fl->assign("_ROOT.SITENAAM", $sitenaam);

$query="SELECT UNIX_TIMESTAMP(datetime), title, message FROM fl_news ORDER BY datetime DESC LIMIT 5";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
  $fl->newBlock("news");
  $fl->assign("DATETIME", date("d M Y", $row[0]));
  $fl->assign("TITLE", opmaak($row[1]));
  $fl->assign("MESSAGE", stripslashes($row[2]));
}

$query="SELECT b.id, b.title, b.summary FROM fl_books b ORDER BY b.approved DESC LIMIT 3";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
  $fl->newBlock("latestbooks");
  $fl->assign("BOOK", opmaak($row[1]));
  $fl->assign("ID", $row[0]);
  $fl->assign("SUMMARY", strip_tags(stripslashes(substr($row[2], 0, 150)."...")));
  $aquery="SELECT a.id, a.name, a.firstname FROM fl_authors a, fl_author_book b WHERE b.book='$row[0]' AND b.author=a.id";
  $aresult=mysql_query($aquery);
  if(mysql_num_rows($aresult)==1)
  {
    while($arow=mysql_fetch_row($aresult))
    {
      $fl->newBlock("authors");
      $fl->assign("AUTHOR", opmaak("$arow[2] $arow[1]"));
      $fl->assign("AID", opmaak($arow[0]));
    }
  }
  else
  {
    $fl->newBlock("variousauthors");
  }
}

$fl->printToScreen();
?>