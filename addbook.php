<?php
include("./config.php");

$fl = new TemplatePower("./templates/addbook.tpl");

require("./header.php");

$fl->assign("_ROOT.SITENAAM", $sitenaam." / Add a book");

if((isset($login)&&$login==1) || (isset($authenticated)&&$authenticated==1))
{
  if((!isset($_POST['submitbook'])&&!isset($_POST['finished'])&&!isset($_POST['addanotherauthor'])&&!isset($_POST['finished'])) || (isset($_POST['submitbook'])&&($_POST['title']==""||$_POST['isbn']=="")))
  {
    $fl->assign("_ROOT.STEP", "1");
    $fl->newBlock("addbookform");

    $pquery="SELECT id, name FROM fl_publishers ORDER BY name";
    $presult=mysql_query($pquery);
    while($prow=mysql_fetch_row($presult))
    {
      $fl->newBlock("selectpub");
      $fl->assign("PID", opmaak($prow[0]));
      $fl->assign("PUBLISHER", opmaak($prow[1]));
      if(isset($_POST['publisher'])&&($prow[0]==$_POST['publisher']))
      {
        $fl->assign("SELECTED", "SELECTED");
      }
      else
      {
        $fl->assign("SELECTED", "");
      }
    }

    $tquery="SELECT id, name FROM fl_worlds ORDER BY name";
    $tresult=mysql_query($tquery);
    while($trow=mysql_fetch_row($tresult))
    {
      $fl->newBlock("selecttheme");
      $fl->assign("TID", opmaak($trow[0]));
      $fl->assign("THEME", opmaak($trow[1]));
      if(isset($_POST['theme'])&&($trow[0]==$_POST['theme']))
      {
        $fl->assign("SELECTED", "SELECTED");
      }
      else
      {
        $fl->assign("SELECTED", "");
      }
    }

    $cquery="SELECT id, name FROM fl_categories ORDER BY name";
    $cresult=mysql_query($cquery);
    while($crow=mysql_fetch_row($cresult))
    {
      $fl->newBlock("selectcat");
      $fl->assign("CID", opmaak($crow[0]));
      $fl->assign("CATEGORY", opmaak($crow[1]));
      if(isset($_POST['category'])&&($crow[0]==$_POST['category']))
      {
        $fl->assign("SELECTED", "SELECTED");
      }
      else
      {
        $fl->assign("SELECTED", "");
      }

    }

    $langquery="SELECT name FROM fl_languages ORDER BY name";
    $langresult=mysql_query($langquery);
    while($langrow=mysql_fetch_row($langresult))
    {
      $fl->newBlock("languages");
      $fl->assign("LANG", opmaak($langrow[0]));
      if(isset($_POST['language'])&&($langrow[0]==$_POST['language']))
      {
        $fl->assign("SELECTED", "SELECTED");
      }
      elseif($langrow[0]=="English")
      {
        $fl->assign("SELECTED", "SELECTED");
      }
      else
      {
        $fl->assign("SELECTED", "");
      }
    }

    $typequery="SELECT name FROM fl_types ORDER BY name";
    $typeresult=mysql_query($typequery);
    while($typerow=mysql_fetch_row($typeresult))
    {
      $fl->newBlock("types");
      $fl->assign("TYPE", opmaak($typerow[0]));
      if(isset($_POST['type'])&&($typerow[0]==$_POST['type']))
      {
        $fl->assign("SELECTED", "SELECTED");
      }
      else
      {
        $fl->assign("SELECTED", "");
      }
    }

    if(isset($_POST['submitbook'])&&($_POST['title']==""||$_POST['isbn']==""))
    {
      $fl->newBlock("feedback");
      $fl->assign("FEEDBACK", "You didn't fill in all required fields. Please complete the required fields and try again");
      $fl->assign("addbookform.FORMTITLE", stripslashes($_POST['title']));
      $fl->assign("addbookform.FORMISBN", stripslashes($_POST['isbn']));
      $fl->assign("addbookform.FORMSUMMARY", stripslashes($_POST['summary']));
      $fl->assign("addbookform.FORMPUBDATE", stripslashes($_POST['pubdate']));
      if(isset($_POST['notify'])&&$_POST['notify']=="yes")
      {
        $fl->assign("addbookform.CHECKED", "CHECKED");
      }

    }
  }
  elseif(isset($_POST['submitbook']) && ($_POST['title']!=""&&$_POST['isbn']!=""))
  {
    $firstletters=strtolower(substr($_POST['title'], 0, 4));
    if($firstletters=="the ")
    {
      $_POST['title']=substr_replace($_POST['title'], "", 0, 4).", The";
    }
    $title=invoer($_POST['title']);
    $summary=invoer($_POST['summary']);
    $pubdate=invoer($_POST['pubdate']);
    $isbn=invoer($_POST['isbn']);
    $language=invoer($_POST['language']);
    $type=invoer($_POST['type']);
    $publisher=invoer($_POST['publisher']);
    $theme=invoer($_POST['theme']);
    $category=invoer($_POST['category']);
    $invoerid=get_uid($username);
    if($_POST['notify']=="yes")
    {
      $notify=1;
    }
    else
    {
      $notify=0;
    }

    $iquery="INSERT INTO fl_books (title, summary, pubdate, publisher, isbn, world, submittedby, category, added, notify, language, type) VALUES ('".$title."', '".$summary."', '".$pubdate."', '".$publisher."', '".$isbn."', '".$theme."', '".$invoerid."', '".$category."', NOW(), '".$notify."', '".$language."', '".$type."')";
    $iresult=mysql_query($iquery);
    if($iresult==1)
    {
      $fl->assign("_ROOT.STEP", "2");
      $fl->newBlock("addauthorform");
      $fl->assign("BID", mysql_insert_id());
      $fl->assign("NUM", "1");
      $fl->assign("NOTIFY", $_POST['notify']);
      $fl->newBlock("author");
      $fl->assign("NUM", "1");
      $aquery="SELECT id, name, firstname FROM fl_authors ORDER BY firstname";
      $aresult=mysql_query($aquery);
      while($arow=mysql_fetch_row($aresult))
      {
        $fl->newBlock("selectauthor");
        $fl->assign("AID", opmaak($arow[0]));
        $fl->assign("AUTHOR", opmaak($arow[2]." ".$arow[1]));
      }
    }
    else
    {
      $fl->assign("_ROOT.STEP", "1");
      $fl->newBlock("feedback");
      $fl->assign("FEEDBACK", "something went wrong while inserting the data. Please try again later.");
      report_error("addbook.php", mysql_error());
    }
  }
  elseif(isset($_POST['addanotherauthor']))
  {
    $fl->assign("_ROOT.STEP", "2");
    $fl->newBlock("addauthorform");
    $fl->assign("BID", $_POST['bid']);
    $fl->assign("NUM", $_POST['num']+1);
    $fl->assign("NOTIFY", $_POST['notify']);

    for($index=1;$index<$_POST['num']+1;$index++)
    {
      $fl->newBlock("author");
      $fl->assign("NUM", $index);
      $aquery="SELECT id, name, firstname FROM fl_authors ORDER BY name";
      $aresult=mysql_query($aquery);
      while($arow=mysql_fetch_row($aresult))
      {
        $fl->newBlock("selectauthor");
        $fl->assign("AID", opmaak($arow[0]));
        $fl->assign("AUTHOR", opmaak($arow[2]." ".$arow[1]));
        if($arow[0]==$_POST['author'][$index])
        {
          $fl->assign("SELECTED", "SELECTED");
        }
        else
        {
          $fl->assign("SELECTED", "");
        }
      }
      $fl->newBlock("noauthor");
    }

    $fl->newBlock("author");
    $fl->assign("NUM", $_POST['num']+1);
    $aquery="SELECT id, name, firstname FROM fl_authors ORDER BY name";
    $aresult=mysql_query($aquery);
    while($arow=mysql_fetch_row($aresult))
    {
      $fl->newBlock("selectauthor");
      $fl->assign("AID", opmaak($arow[0]));
      $fl->assign("AUTHOR", opmaak($arow[2]." ".$arow[1]));
      $fl->assign("SELECTED", "");
    }
    $fl->newBlock("noauthor");
  }
  elseif(isset($_POST['finished']))
  {
    $fl->assign("_ROOT.STEP", "3");
    $numerrors=0;
    for($index=1;$index<$_POST['num']+1;$index++)
    {
      if($_POST['author'][$index]!="none")
      {
        $bid=invoer($_POST['bid']);
        $aquery="INSERT INTO fl_author_book(book, author) VALUES ('".$bid."', '".$_POST['author'][$index]."')";
        $aresult=mysql_query($aquery);
        if($aresult!=1)
        {
          report_error("addbook.php", mysql_error());
          $fl->newBlock("feedback");
          $fl->assign("FEEDBACK", "An error occured while inserting author ".$index.". Please try again later");
          $numerrors=$numerrors+1;
        }
      }
    }
    if($numerrors==0)
    {
      $fl->newBlock("feedback");
      $fl->assign("FEEDBACK", "All information has been added succesfully");
      if($_POST['notify']=="1")
      {
        $fl->newBlock("feedback");
        $fl->assign("FEEDBACK", "You will be notified when your book is approved by our librarians");
      }
    }
  }
}
else
{
  $fl->newBlock("feedback");
  $fl->assign("FEEDBACK", "You need to be logged in to add a book to the library. If you don't have an account yet, you can <a href=\"".$fileroot."/signup.php\">sign up for an account here</a>");
}
$fl->printToScreen();
?>