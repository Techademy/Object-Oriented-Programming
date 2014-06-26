<?php
include("./config.php");

$fl = new TemplatePower("./templates/comments.tpl");

require("./header.php");
$file=eregi_replace($_SEVER['SERVER_NAME'], "", $_SERVER['REQUEST_URI']);
if($fileroot!="")
{
  $file=eregi_replace($fileroot, "", $file);
}
$var=explode("/", $file);
$query="SELECT name, firstname FROM fl_authors WHERE approved='1' AND id='".invoer($var[2])."'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.AUTHOR", opmaak($row[1]." ".$row[0]));
$fl->assign("_ROOT.AID", opmaak($var[2]));
$fl->assign("_ROOT.SITENAAM", $sitenaam." / Comments on ".opmaak($row[1]." ".$row[0]));

$keywords.=opmaak($row[0]).", ";

if(isset($login)&&$login==1 || isset($authenticated)&&$authenticated==1)
{
  $fl->newBlock("commentform");
  $fl->assign("AID", $var[2]);
}
else
{
  $fl->newBlock("loggedoutcommentform");
}

if($var[3] && $var[3]>0)
{
  $start=$var[3];
}
else
{
  $start=0;
}

$comquery="SELECT u.name, c.comment, UNIX_TIMESTAMP(c.datetime), c.user_id FROM fl_users u, fl_authorcomments c WHERE c.author_id='".invoer($var[2])."' AND c.user_id=u.id ORDER BY c.datetime DESC LIMIT ".intval($start).", 30";
$comresult=mysql_query($comquery);
$comaantal=mysql_num_rows($comresult);
if($comaantal>0)
{

  while($comrow=mysql_fetch_row($comresult))
  {
    $fl->newBlock("comment");
    $fl->assign("COMMENT", opmaak($comrow[1]));
    $fl->assign("USER", opmaak($comrow[0]));
    $fl->assign("UID", opmaak($comrow[3]));
    $fl->assign("DATETIME", date("d-m-Y G:i", $comrow[2]));
  }
}

if($comaantal>0)
{
  if($start>0 && $start>29)
  {
    $fl->newBlock("prevpage");
    $fl->assign("AID", $var[2]);
    $fl->assign("START", $start-30);
  }
  elseif($start>0&&$start<30)
  {
    $fl->newBlock("prevpage");
    $fl->assign("AID", $var[2]);
    $fl->assign("START", 0);
  }
  if($start+30<$comaantal)
  {
    $fl->newBlock("nextpage");
    $fl->assign("AID", $var[2]);
    $fl->assign("START", $start+30);
  }
}

$keywords.="Comments on Author";
$fl->assign("_ROOT.KEYWORDS", $keywords);
$fl->printToScreen();
?>
