<?php
include("../config.php");

$fl = new TemplatePower("./editreviews.tpl");

require("./header.php");

if($empty=="yes")
{
 $query="UPDATE fl_bookreviews SET review='' WHERE id='$rid'";
 $result=mysql_query($query);
}

if($delete=="yes")
{
 $query="DELETE FROM fl_bookreviews WHERE id='$rid'";
 $result=mysql_query($query);
}

$query="SELECT r.id, r.book_id, r.user_id, r.review, UNIX_TIMESTAMP(r.datetime), r.rating, b.title, u.name FROM fl_bookreviews r, fl_books b, fl_users u WHERE r.book_id=b.id AND r.user_id=u.id ORDER BY r.datetime DESC";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
 $fl->newBlock("review");
 $fl->assign("ID", $row[0]);
 $fl->assign("BID", $row[1]);
 $fl->assign("UID", $row[2]);
 $fl->assign("REVIEW", opmaak($row[3]));
 $fl->assign("DATETIME", date("d-m-Y G:i", $row[4]));
 $fl->assign("RATING", $row[5]);
 $fl->assign("BOOK", opmaak($row[6]));
 $fl->assign("UNAME", opmaak($row[7]));
}

$fl->printToScreen();
?>
