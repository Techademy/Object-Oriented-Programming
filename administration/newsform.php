<?php
include("../config.php");

$fl = new TemplatePower("./newsform.tpl");

require("./header.php");

if(isset($_REQUEST['id']))
{
$query="SELECT id, UNIX_TIMESTAMP(datetime), title, message FROM fl_news WHERE id='".$_REQUEST['id']."'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.TITLE", $row[2]);
$fl->assign("_ROOT.MESSAGE", $row[3]);
$fl->newBlock("resetdate");
$fl->assign("ID", $row[0]);
}

$fl->printToScreen();
?>
