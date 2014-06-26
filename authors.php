<?php
include("./config.php");

$fl = new TemplatePower("./templates/authors.tpl");

require("./header.php");

$fl->assign("_ROOT.SITENAAM", $sitenaam." / Authors");

$file=eregi_replace($_SERVER['SERVER_NAME'], "", $_SERVER['REQUEST_URI']);
if($fileroot!="")
{
  $file=eregi_replace($fileroot, "", $file);
}
$var=explode("/", $file);

if(isset($var[2]) && $var[2]>0)
{
  $start=$var[2];
}
else
{
  $start=0;
}

$query="SELECT id, name, firstname FROM fl_authors WHERE approved='1' ";
if(isset($var[3])&&$var[3]!="")
{
  $fl->assignGlobal("LETTER", $var[3]);
  $query.="AND (name LIKE '".addslashes($var[3])."%' OR name LIKE '".addslashes(strtoupper($var[3]))."%')";
}
$query.="ORDER BY name LIMIT ".$start.", 30";
$result=mysql_query($query);
$aantal=mysql_num_rows($result);
$keywords = '';
while($row=mysql_fetch_row($result))
{
  $fl->newBlock("author");
  $fl->assign("AID", opmaak($row[0]));
  $fl->assign("AUTHOR", opmaak($row[1].", ".$row[2]));
  $keywords.=opmaak($row[1]).", ";
  $keywords.=opmaak($row[2]).", ";
}

$aquery="SELECT COUNT(id) FROM fl_authors WHERE approved='1'";
if(isset($var[3])&&$var[3]!="")
{
  $aquery.=" AND (name LIKE '".addslashes($var[3])."%' OR name LIKE '".addslashes(strtoupper($var[3]))."%')";
}
$aresult=mysql_query($aquery);
$arow=mysql_fetch_row($aresult);
$aantalindb=$arow[0];

if($aantal==0)
{
  $fl->newBlock("feedback");
  $fl->assign("FEEDBACK", "The listing you are requesting contains no authors. Sorry.");
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
  if($start+30<$aantalindb)
  {
    $fl->newBlock("nextpage");
    $fl->assign("START", $start+30);
  }
}

if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
{
  $fl->newBlock("addauthor");
} else {
  $fl->newBlock('nonmemberaddauthor');
}

$keywords.="Author Listing";
$fl->assign("_ROOT.KEYWORDS", $keywords);
$fl->printToScreen();
?>
