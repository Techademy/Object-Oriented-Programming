<?php
include("./config.php");

$fl = new TemplatePower("./templates/publisher.tpl");

require("./header.php");
$file=eregi_replace($_SERVER['SERVER_NAME'], "", $_SERVER['REQUEST_URI']);
if($fileroot!="")
{
  $file=eregi_replace($fileroot, "", $file);
}
$var=explode("/", $file);

$query="SELECT p.name, p.address, p.country, p.description, p.logo, p.url, p.submittedby, u.name FROM fl_publishers p, fl_users u WHERE p.approved='1' AND p.id='".intval($var[2])."' AND u.id=p.submittedby";
$result=mysql_query($query);
if(mysql_num_rows($result)==1)
{
  $row=mysql_fetch_row($result);
  $fl->assign("_ROOT.SITENAAM", $sitenaam." / ".opmaak($row[0]));
  $fl->newBlock("publisher");
  $fl->assignGlobal("NAME", opmaak($row[0]));
  $fl->assign("ADDRESS", opmaak($row[1]));
  $fl->assign("COUNTRY", opmaak($row[2]));
  $fl->assign("URL", opmaak($row[5]));
  $fl->assign("UID", opmaak($row[6]));
  $fl->assign("USER", opmaak($row[7]));

  if($row[4]!="")
  {
    $fl->newBlock("image");
    $fl->assign("IMAGE", opmaak($row[4]));
    $fl->assign("DESCRIPTION", opmaak($row[3]));
  }
  else
  {
    $fl->newBlock("noimage");
    $fl->assign("DESCRIPTION", opmaak($row[3]));
  }
  $keywords = '';
  $keywords.=opmaak($row[0]).", ".opmaak($row[2]).", ".opmaak($row[5]).", ";


}
else
{
  $fl->newBlock("feedback");
  $fl->assign("FEEDBACK", "Something seems to be wrong: make sure you have the correct link, or else <a href=\"$fileroot/publishers.php\">check this list</a> to find the publisher you are looking for");
  $fl->assign("_ROOT.SITENAAM", $sitenaam." / Publisher not found");
}

if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
{
  $fl->newBlock("commentform");
  $fl->assign("PID", $var[2]);
}
else
{
  $fl->newBlock("loggedoutcommentform");
}

$comquery="SELECT u.name, c.comment, UNIX_TIMESTAMP(c.datetime), c.user_id FROM fl_users u, fl_publishercomments c WHERE c.pub_id='".intval($var[2])."' AND c.user_id=u.id ORDER BY c.datetime DESC LIMIT 3";
$comresult=mysql_query($comquery);
$comaantal=mysql_num_rows($comresult);
if($comaantal>0)
{
  $fl->newBlock("mostrecentcomments");
  if($comaantal>1)
  {
    $fl->assign("S", "s");
  }

  while($comrow=mysql_fetch_row($comresult))
  {
    $fl->newBlock("comment");
    $fl->assign("COMMENT", opmaak($comrow[1]));
    $fl->assign("USER", opmaak($comrow[0]));
    $fl->assign("UID", opmaak($comrow[3]));
    $fl->assign("DATETIME", date("d-m-Y G:i", $comrow[2]));
  }

  $comcountquery="SELECT COUNT(id) FROM fl_publishercomments WHERE pub_id='".intval($var[2])."'";
  $comcountresult=mysql_query($comcountquery);
  $comcountrow=mysql_fetch_row($comcountresult);
  if($comcountrow[0]>3)
  {
    $fl->newBlock("morecommentslink");
    $fl->assign("PID", opmaak($var[2]));
  }
}

$keywords.="Publisher Details";
$fl->assign("_ROOT.KEYWORDS", $keywords);
$fl->printToScreen();
?>
