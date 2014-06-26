<?php
include("./config.php");

$fl = new TemplatePower("./templates/wanted.tpl");

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
$fl->assign("_ROOT.SITENAAM", $sitenaam." / Users looking for ".opmaak($row[0]));

$keywords=opmaak($row[0]).", ";

$wquery="SELECT b.user, u.name FROM fl_wanted b, fl_users u WHERE b. book='".invoer($var[2])."' AND u.id=b.user";
$wresult=mysql_query($wquery);
while($wrow=mysql_fetch_row($wresult))
{
  $fl->newBlock("user");
  $fl->assign("UID", opmaak($wrow[0]));
  $fl->assign("USER", opmaak($wrow[1]));
}

$keywords.="Users looking for a book";
$fl->assign("_ROOT.KEYWORDS", $keywords);
$fl->printToScreen();
?>
