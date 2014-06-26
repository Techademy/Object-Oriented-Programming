<?php
include("../config.php");

$fl = new TemplatePower("./editpublishercomments.tpl");

require("./header.php");

if($delete=="yes")
{
 $query="DELETE FROM fl_publishercomments WHERE id='$pid'";
 $result=mysql_query($query);
}

$query="SELECT p.id, p.pub_id, p.user_id, p.comment, UNIX_TIMESTAMP(p.datetime), pub.name, u.name FROM fl_publishercomments p, fl_publishers pub, fl_users u WHERE p.pub_id=pub.id AND p.user_id=u.id ORDER BY p.datetime DESC";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
 $fl->newBlock("review");
 $fl->assign("ID", $row[0]);
 $fl->assign("PID", $row[1]);
 $fl->assign("UID", $row[2]);
 $fl->assign("COMMENT", opmaak($row[3]));
 $fl->assign("DATETIME", date("d-m-Y G:i", $row[4]));
 $fl->assign("PUBLISHER", opmaak($row[5]));
 $fl->assign("UNAME", opmaak($row[6]));
}

$fl->printToScreen();
?>
