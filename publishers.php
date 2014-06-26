<?php
include("./config.php");

$fl = new TemplatePower("./templates/publishers.tpl");

require("./header.php");

$fl->assign("_ROOT.SITENAAM", "$sitenaam / Publishers");

$file=eregi_replace($_SERVER['SERVER_NAME'], "", $_SERVER['REQUEST_URI']);
if($fileroot!="")
{
  $file=eregi_replace($fileroot, "", $file);
}
$var=explode("/", $file);

if(isset($var[2]))
{
  $start=$var[2];
}
if(!isset($start)||$start==0)
{
  $start=0;
}

$query="SELECT id, name FROM fl_publishers WHERE approved='1' ";
if(isset($var[3])&&$var[3]!="")
{
  $fl->assignGlobal("LETTER", $var[3]);
  $query.="AND (name LIKE '".addslashes($var[3])."%' OR name LIKE '".addslashes(strtoupper($var[3]))."%') ";
}
$query.="ORDER BY name ASC LIMIT ".$start.", 30";
$result=mysql_query($query);
$aantal=mysql_num_rows($result);
$keywords = '';
while($row=mysql_fetch_row($result))
{
  $fl->newBlock("publisher");
  $fl->assign("PID", opmaak($row[0]));
  $fl->assign("NAME", opmaak($row[1]));
  $keywords.=opmaak($row[1]).", ";
}

if($aantal==0)
{
  $fl->newBlock("feedback");
  $fl->assign("FEEDBACK", "The listing you are requesting contains no publishers. Sorry.");
}

$query="SELECT COUNT(id) FROM fl_publishers WHERE approved='1' ";
if(isset($var[3])&&$var[3]!="")
{
  $query.="AND (name LIKE '".addslashes($var[3])."%' OR name LIKE '".addslashes(strtoupper($var[3]))."%') ";
}
$result=mysql_query($query);
$row=mysql_fetch_row($result);
$totaalaantal=$row[0];

if($totaalaantal>0)
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
  if($start+30<$totaalaantal)
  {
    $fl->newBlock("nextpage");
    $fl->assign("START", $start+30);
  }
}

if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
{
  $fl->newBlock("addpub");
} else {
  $fl->newBlock('nonmemberaddpub');
}

$keywords.="Publisher Listing";
$fl->assign("_ROOT.KEYWORDS", $keywords);
$fl->printToScreen();
?>
