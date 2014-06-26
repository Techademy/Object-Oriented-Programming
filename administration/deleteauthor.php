<?
include("../config.php");

$fl = new TemplatePower("./deleteauthor.tpl");

require("./header.php");

$query="SELECT b.name, b.firstname FROM fl_authors b WHERE b.id='$id'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.NAME", opmaak("$row[1] $row[0]"));
$fl->assign("_ROOT.ID", $id);

$fl->printToScreen();
?>