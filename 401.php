<?php
include("./config.php");

$fl = new TemplatePower("./templates/error.tpl");

require("./header.php");

$fl->assign("_ROOT.SITENAAM", $sitenaam." / Error 401 (Not Authorized)");

$query="SELECT id FROM fl_errors WHERE type='401'";
$result=mysql_query($query);
$teller=0;
while($row=mysql_fetch_row($result))
{
  $error[$teller]=$row[0];
}
srand ((double) microtime() * 1000000);
$num=rand(0,count($error)-1);
$key=$error[$num];
$query="SELECT error, source FROM fl_errors WHERE id='".$key."'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);
$fl->assign("_ROOT.ERROR", opmaak($row[0]));
$fl->assign("_ROOT.SOURCE", opmaak($row[1]));


$query="SELECT b.id, b.title, b.summary FROM fl_books b ORDER BY b.approved DESC LIMIT 3";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
  $fl->newBlock("latestbooks");
  $fl->assign("BOOK", opmaak($row[1]));
  $fl->assign("ID", $row[0]);
  $fl->assign("SUMMARY", opmaak(substr($row[2], 0, 150)."..."));
  $aquery="SELECT a.id, a.name FROM fl_authors a, fl_author_book b WHERE b.book='".$row[0]."' AND b.author=a.id";
  $aresult=mysql_query($aquery);
  if(mysql_num_rows($aresult)==1)
  {
    while($arow=mysql_fetch_row($aresult))
    {
      $fl->newBlock("authors");
      $fl->assign("AUTHOR", opmaak($arow[1]));
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