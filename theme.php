<?php
include("./config.php");

$fl = new TemplatePower("./templates/theme.tpl");

require("./header.php");
$file=eregi_replace($_SERVER['SERVER_NAME'], "", $_SERVER['REQUEST_URI']);
if($fileroot!="")
{
  $file=eregi_replace($fileroot, "", $file);
}
$var=explode("/", $file);
$query="SELECT name, description FROM fl_worlds WHERE approved='1' AND id='".invoer($var[2])."'";
$result=mysql_query($query);
$keywords = '';
if(mysql_num_rows($result)==1)
{
  $row=mysql_fetch_row($result);
  $fl->assign("_ROOT.SITENAAM", $sitenaam." / ".opmaak($row[0]));
  $fl->newBlock("theme");
  $fl->assign("THEME", opmaak($row[0]));
  $fl->assign("DESCRIPTION", opmaak($row[1]));
  $keywords.=opmaak($row[0]).", ";
  $bquery="SELECT id, title FROM fl_books WHERE world='".invoer($var[2])."' AND approved!='0000-00-00 00:00:00'";
  $bresult=mysql_query($bquery);
  $baantal=mysql_num_rows($bresult);
  if($baantal>0)
  {
    $fl->newBlock("bookheader");
    if($baantal==1)
    {
      $fl->assign("BOOKHEADER", "Book with this theme");
    }
    else
    {
      $fl->assign("BOOKHEADER", "Books with this theme");
    }
    while($brow=mysql_fetch_row($bresult))
    {
      $fl->newBlock("books");
      $fl->assign("BID", opmaak($brow[0]));
      $fl->assign("BOOK", opmaak($brow[1]));
      $keywords.=opmaak($brow[1]).", ";
    }
  }
}
else
{
  $fl->newBlock("feedback");
  $fl->assign("FEEDBACK", "Something seems to be wrong: make sure you have the correct link, or else <a href=\"".$fileroot."/themes.php\">check this list</a> to find the theme you are looking for");
  $fl->assign("_ROOT.SITENAAM", $sitenaam." / Theme not found");
}

$keywords.="Theme Details";
$fl->assign("_ROOT.KEYWORDS", $keywords);
$fl->printToScreen();
?>
