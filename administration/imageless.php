<?php
include("../config.php");

$fl = new TemplatePower("./imageless.tpl");

require("./header.php");

$query = "SELECT * FROM fl_books WHERE image=''";
$result = mysql_query($query);
while($array=mysql_fetch_assoc($result)) {
	$fl->newBlock("book");
	$fl->assign("BOOK", stripslashes($array['title']));
	$fl->assign("ID", $array['id']);
}

$fl->printToScreen();
?>