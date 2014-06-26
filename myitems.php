<?php
include("./config.php");

$fl = new TemplatePower("./templates/myitems.tpl");

require("./header.php");

if(isset($login)&&$login==1 || isset($authenticated)&&$authenticated==1)
{
  $fl->assign("_ROOT.SITENAAM", $sitenaam." / Items I Added");
  $selectid=get_uid($username);
  $query="SELECT b.id, b.title, b.publisher, p.name, UNIX_TIMESTAMP(b.approved) FROM fl_books b, fl_publishers p WHERE b.publisher=p.id AND b.submittedby='".$selectid."' ORDER BY b.approved";
  $result=mysql_query($query);
  if(mysql_num_rows($result)>0)
  {
    $fl->newBlock("mybooks");
    while($row=mysql_fetch_row($result))
    {
      $fl->newBlock("item");
      $fl->assign("PID", opmaak($row[2]));
      $fl->assign("PUBLISHER", opmaak($row[3]));
      $aquery="SELECT a.id, a.name, a.firstname FROM fl_authors a, fl_author_book b WHERE b.book='".$row[0]."' AND b.author=a.id AND a.approved='1'";
      $aresult=mysql_query($aquery);
      if(mysql_num_rows($aresult)==1)
      {
        while($arow=mysql_fetch_row($aresult))
        {
          $fl->newBlock("author");
          $fl->assign("AID", opmaak($arow[0]));
          $fl->assign("AUTHOR", opmaak($arow[2].' '.$arow[1]));
        }
      }
      else
      {
        $fl->newBlock("variousauthors");
      }
      if($row[4]==0)
      {
        $fl->assign("item.STATUS", "Not Approved");
        $fl->newBlock("notapprovedtitle");
        $fl->assign("TITLE", opmaak($row[1]));
      }
      else
      {
        $fl->assign("item.STATUS", "Approved on ".date("d-m-Y G:i", $row[4]));
        $fl->newBlock("approvedtitle");
        $fl->assign("BID", opmaak($row[0]));
        $fl->assign("TITLE", opmaak($row[1]));
      }
    }
  }

  $authquery="SELECT id, name, approved, firstname FROM fl_authors WHERE submittedby='".$selectid."' ORDER BY approved";
  $authresult=mysql_query($authquery);
  if(mysql_num_rows($authresult)>0)
  {
    $fl->newBlock("myauthors");
    while($authrow=mysql_fetch_row($authresult))
    {
      $fl->newBlock("aitem");
      if($authrow[2]==0)
      {
        $fl->newBlock("notapprovedauthor");
        $fl->assign("AUTHOR", opmaak($authrow[3].' '.$authrow[1]));
        $fl->assign("aitem.STATUS", "Not Approved");
      }
      elseif($authrow[2]==1)
      {
        $fl->newBlock("approvedauthor");
        $fl->assign("AUTHOR", opmaak($authrow[3].' '.$authrow[1]));
        $fl->assign("AID", opmaak($authrow[0]));
        $fl->assign("aitem.STATUS", "Approved");
      }
    }
  }

  $pubquery="SELECT id, name, approved FROM fl_publishers WHERE submittedby='".$selectid."' ORDER BY approved";
  $pubresult=mysql_query($pubquery);
  if(mysql_num_rows($pubresult)>0)
  {
    $fl->newBlock("mypubs");
    while($pubrow=mysql_fetch_row($pubresult))
    {
      $fl->newBlock("pitem");
      if($pubrow[2]==0)
      {
        $fl->assign("STATUS", "Not Approved");
        $fl->newBlock("notapprovedpub");
        $fl->assign("PUBLISHER", opmaak($pubrow[1]));
      }
      elseif($pubrow[2]==1)
      {
        $fl->assign("STATUS", "Approved");
        $fl->newBlock("approvedpub");
        $fl->assign("PUBLISHER", opmaak($pubrow[1]));
        $fl->assign("PID", opmaak($pubrow[0]));
      }
    }
  }

  $themequery="SELECT id, name, approved FROM fl_worlds WHERE submittedby='".$selectid."' ORDER BY approved";
  $themeresult=mysql_query($themequery);
  if(mysql_num_rows($themeresult)>0)
  {
    $fl->newBlock("mythemes");
    while($themerow=mysql_fetch_row($themeresult))
    {
      $fl->newBlock("titem");
      if($themerow[2]==0)
      {
        $fl->assign("STATUS", "Not Approved");
        $fl->newBlock("notapprovedtheme");
        $fl->assign("THEME", opmaak($themerow[1]));
      }
      elseif($themerow[2]==1)
      {
        $fl->assign("STATUS", "Approved");
        $fl->newBlock("approvedtheme");
        $fl->assign("THEME", opmaak($themerow[1]));
        $fl->assign("TID", opmaak($themerow[0]));
      }
    }
  }
}
else
{
  $fl->newBlock("feedback");
  $fl->assign("FEEDBACK", "You need to be logged in to use the personal account pages. If you don't have an account yet, you can <a href=\"signup.php\">sign up for an account here</a>");
  $fl->assign("_ROOT.SITENAAM", $sitenaam." / Please log in");
}

$fl->printToScreen();
?>