<?php
include("./config.php");

$fl = new TemplatePower("./templates/themes.tpl");

require("./header.php");

$fl->assign("_ROOT.SITENAAM", $sitenaam." / Themes");

$file=eregi_replace($_SERVER['SERVER_NAME'], "", $_SERVER['REQUEST_URI']);
if($fileroot!="")
{
  $file=eregi_replace($fileroot, "", $file);
}
$var=explode("/", $file);

if(isset($var[2]) && $var[2]>0)
{
  $start=intval($var[2]);
}
else
{
  $start=0;
}

$query="SELECT id, name FROM fl_worlds WHERE approved='1' ORDER BY name LIMIT ".$start.", 30";
$result=mysql_query($query);
$aantal=mysql_num_rows($result);
while($row=mysql_fetch_row($result))
{
  $fl->newBlock("theme");
  $fl->assign("TID", opmaak($row[0]));
  $fl->assign("THEME", opmaak($row[1]));
}

if($aantal==0)
{
  $fl->newBlock("feedback");
  $fl->assign("FEEDBACK", "The listing you are requesting contains no themes. Sorry.");
}

if($aantal>0)
{
  if($start>0 && $start>29)
  {
    $fl->newBlock("prevpage");
    $fl->assign("START", $start-30);
  }
  elseif($start>0&&$start<30)
  {
    $fl->newBlock("prevpage");
    $fl->assign("START", 0);
  }
  if($start+30<$aantal)
  {
    $fl->newBlock("nextpage");
    $fl->assign("START", $start+30);
  }
}

if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
{
  $fl->newBlock("addtheme");
} else {
  $fl->newBlock('nonmemberaddtheme');
}

$keywords="Theme Listing";
$fl->assign("_ROOT.KEYWORDS", $keywords);
$fl->printToScreen();
?>
