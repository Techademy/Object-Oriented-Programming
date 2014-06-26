<?php
include("./config.php");

$fl = new TemplatePower("./templates/search.tpl");

require("./header.php");

$fl->assign("_ROOT.SITENAAM", $sitenaam." / Search");

if(isset($_REQUEST['search']))
{
  if(!isset($_REQUEST['searchquery'])||$_REQUEST['searchquery']=="")
  {
    $fl->newBlock("error");
    $fl->assign("ERROR", "You can not search for nothing. Please enter a search string and try again");
  }
  else
  {
    $fl->assignGlobal("SEARCHQUERY", opmaak($_REQUEST['searchquery']));
    $_REQUEST['searchquery']=str_replace("'", "", $_REQUEST['searchquery']);
    $_REQUEST['searchquery']=str_replace("\"", "", $_REQUEST['searchquery']);
    $searcharray=explode(" ", $_REQUEST['searchquery']);
    $aantal=count($searcharray);
    // search books
    $query="SELECT DISTINCT id, title FROM fl_books WHERE approved!='0000-00-00 00:00:00' AND (title=''";
    for($i=0;$i<$aantal;$i++)
    {
      if(strlen($searcharray[$i])>3)
      {
        $query.=" OR title LIKE '%".invoer($searcharray[$i])."%' OR summary LIKE '%".invoer($searcharray[$i])."%'";
      }
    }
    $query.=") ORDER BY title ASC";
    $result=mysql_query($query);
    $fl->newBlock("result");
    $fl->assign("SECTION", "Books");
    if(mysql_num_rows($result)==0)
    {
      $fl->newBlock("noresults");
      $fl->assign("SECTION", "Books");
    }
    else
    {
      $fl->newBlock("yesresults");
      while($row=mysql_fetch_row($result))
      {
        $fl->newBlock("item");
        $fl->assign("TITLE", opmaak($row[1]));
        $fl->assign("LINK", "book.php/".$row[0]);
      }
    }
    reset($searcharray);
    // search authors
    $query="SELECT DISTINCT id, firstname, name FROM fl_authors WHERE approved='1' AND (name=''";
    for($i=0;$i<$aantal;$i++)
    {
      if(strlen($searcharray[$i])>3)
      {
        $query.=" OR name LIKE '%".invoer($searcharray[$i])."%' OR firstname LIKE '%".invoer($searcharray[$i])."' OR bio LIKE '%".invoer($searcharray[$i])."%'";
      }
    }
    $query.=") ORDER BY name ASC";
    $result=mysql_query($query);
    $fl->newBlock("result");
    $fl->assign("SECTION", "Authors");
    if(mysql_num_rows($result)==0)
    {
      $fl->newBlock("noresults");
      $fl->assign("SECTION", "Authors");
    }
    else
    {
      $fl->newBlock("yesresults");
      while($row=mysql_fetch_row($result))
      {
        $fl->newBlock("item");
        $fl->assign("TITLE", opmaak($row[1]." ".$row[2]));
        $fl->assign("LINK", "author.php/".$row[0]);
      }
    }
    reset($searcharray);
    // search publishers
    $query="SELECT DISTINCT id, name FROM fl_publishers WHERE approved='1' AND (name=''";
    for($i=0;$i<$aantal;$i++)
    {
      if(strlen($searcharray[$i])>3)
      {
        $query.=" OR name LIKE '%".invoer($searcharray[$i])."%' OR description LIKE '%".invoer($searcharray[$i])."%'";
      }
    }
    $query.=") ORDER BY name ASC";
    $result=mysql_query($query);
    echo mysql_error();
    $fl->newBlock("result");
    $fl->assign("SECTION", "Publishers");
    if(mysql_num_rows($result)==0)
    {
      $fl->newBlock("noresults");
      $fl->assign("SECTION", "Publishers");
    }
    else
    {
      $fl->newBlock("yesresults");
      while($row=mysql_fetch_row($result))
      {
        $fl->newBlock("item");
        $fl->assign("TITLE", opmaak($row[1]));
        $fl->assign("LINK", "publisher.php/".$row[0]);
      }
    }
    reset($searcharray);
    // search themes
    $query="SELECT DISTINCT id, name FROM fl_worlds WHERE approved='1' AND (name=''";
    for($i=0;$i<$aantal;$i++)
    {
      if(strlen($searcharray[$i])>3)
      {
        $query.=" OR name LIKE '%".invoer($searcharray[$i])."%' OR description LIKE '%".invoer($searcharray[$i])."%'";
      }
    }
    $query.=") ORDER BY name ASC";
    $result=mysql_query($query);
    echo mysql_error();
    $fl->newBlock("result");
    $fl->assign("SECTION", "Themes");
    if(mysql_num_rows($result)==0)
    {
      $fl->newBlock("noresults");
      $fl->assign("SECTION", "Themes");
    }
    else
    {
      $fl->newBlock("yesresults");
      while($row=mysql_fetch_row($result))
      {
        $fl->newBlock("item");
        $fl->assign("TITLE", opmaak($row[1]));
        $fl->assign("LINK", "theme.php/".$row[0]);
      }
    }
    reset($searcharray);
  }
}

$fl->printToScreen();

?>