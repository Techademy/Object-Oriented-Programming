<?php
include("../config.php");

$fl = new TemplatePower("./newsadmin.tpl");

require("./header.php");

$query="SELECT id, UNIX_TIMESTAMP(datetime), title, message FROM fl_news ORDER BY datetime DESC";
$result=mysql_query($query);
while($row=mysql_fetch_row($result))
{
$fl->newBlock("newsitem");
$fl->assign("ID", $row[0]);
$fl->assign("DATETIME", date("d-m-Y G:i", $row[1]));
$fl->assign("TITLE", opmaak($row[2]));
$fl->assign("MESSAGE", htmlopmaak($row[3]));
}

$fl->printToScreen();
?>
