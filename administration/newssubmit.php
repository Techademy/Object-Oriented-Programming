<?php
include("../config.php");

$fl = new TemplatePower("./newssubmit.tpl");

require("./header.php");

$title=invoer($_POST['title']);
$message=invoer($_POST['message']);

if(isset($_POST['id']))
{
$query="UPDATE fl_news SET title='$title', message='$message'";
if($reset=="yes")
{
$query.=", datetime=NOW()";
}
$query.=" WHERE id='".$_POST['id']."'";
}
else
{
$query="INSERT INTO fl_news (title, message, datetime) VALUES ('$title', '$message', NOW())";
}
$result=mysql_query($query);
if($result==1&&isset($_POST['id']))
{
$fl->assign("_ROOT.FEEDBACK", "The newsitem has been updated.");
}elseif($result==1&&!isset($_POST['id']))
{
$fl->assign("_ROOT.FEEDBACK", "The newsitem has been published.");
}else
{
$fl->assign("_ROOT.FEEDBACK", "Something went wrong. ".mysql_error());
}


$fl->printToScreen();
?>
