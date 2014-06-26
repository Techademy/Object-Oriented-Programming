<?php
include("../config.php");

$fl = new TemplatePower("./editauthorcomments.tpl");

require("./header.php");

if($delete=="yes")
{
 $query="DELETE FROM fl_authorcomments WHERE id='$cid'";
 $result=mysql_query($query);
}

$query="SELECT c.id, c.author_id, c.user_id, c.comment, UNIX_TIMESTAMP(c.datetime), a.name, u.name, a.firstname FROM fl_authorcomments c, fl_authors a, fl_users u WHERE c.author_id=a.id AND c.user_id=u.id ORDER BY c.datetime DESC";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
 $fl->newBlock("review");
 $fl->assign("ID", $row[0]);
 $fl->assign("AID", $row[1]);
 $fl->assign("UID", $row[2]);
 $fl->assign("COMMENT", opmaak($row[3]));
 $fl->assign("DATETIME", date("d-m-Y G:i", $row[4]));
 $fl->assign("AUTHOR", opmaak("$row[7] $row[5]"));
 $fl->assign("UNAME", opmaak($row[6]));
}

$fl->printToScreen();
?>
