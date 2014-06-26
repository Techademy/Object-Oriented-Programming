<?php
include("./config.php");

$fl = new TemplatePower("./templates/user.tpl");

require("./header.php");
$file=eregi_replace($_SERVER['SERVER_NAME'], "", $_SERVER['REQUEST_URI']);
if($fileroot!="")
{
  $file=eregi_replace($fileroot, "", $file);
}
$var=explode("/", $file);

$query="SELECT name, url, country, allowemail FROM fl_users WHERE id='".invoer($var[2])."'";
$result=mysql_query($query);
$row=mysql_fetch_row($result);

$fl->assign("_ROOT.SITENAAM", $sitenaam." / ".opmaak($row[0]));

if(mysql_num_rows($result)==1)
{
  $fl->newBlock("userinfo");
  $fl->assignGlobal("NAME", opmaak($row[0]));
  $fl->assign("URL", opmaak($row[1]));
  $fl->assign("COUNTRY", opmaak($row[2]));
  $keywords=opmaak($row[0]).", ".opmaak($row[1]).", ".opmaak($row[2]).", ";
  if((isset($login)&&$login==1 || isset($authenticated)&&$authenticated==1) && $row[3]==1)
  {
    $fl->newBlock("email");
    $fl->assign("UID", $var[2]);
  }
  elseif(isset($login)&&$login!=1 && isset($authenticated)&&$authenticated!=1)
  {
    $fl->newBlock("noemail");
    $fl->assign("NOEMAILMESSAGE", "You have to be logged in to be able to send e-mail to users. Don't have an account yet? <a href=\"".$fileroot."/signup.php\">Sign up for one</a>!");
  }
  elseif($row[3]==0)
  {
    $fl->newBlock("noemail");
    $fl->assign("NOEMAILMESSAGE", "This user doesn't want to receive e-mail from other users of Fantasylibrary.net.");
  }

  $wquery="SELECT w.book, b.title FROM fl_wanted w, fl_books b WHERE w.user='".invoer($var[2])."' AND w.book=b.id";
  $wresult=mysql_query($wquery);
  if(mysql_num_rows($result)>0)
  {
    $fl->newBlock("wantlist");
    while($wrow=mysql_fetch_row($wresult))
    {
      $fl->newBlock("wantbook");
      $fl->assign("BID", opmaak($wrow[0]));
      $fl->assign("TITLE", opmaak($wrow[1]));
      $aquery="SELECT a.id, a.name, a.firstname FROM fl_authors a, fl_author_book b WHERE b.book='".$wrow[0]."' AND b.author=a.id";
      $aresult=mysql_query($aquery);
      while($arow=mysql_fetch_row($aresult))
      {
        $fl->newBlock("wantauthor");
        $fl->assign("AID", opmaak($arow[0]));
        $fl->assign("AUTHOR", opmaak($arow[2].' '.$arow[1]));
      }
    }
  }

  $wquery="SELECT c.book, b.title FROM fl_collection c, fl_books b WHERE c.user='".invoer($var[2])."' AND c.book=b.id";
  $wresult=mysql_query($wquery);
  if(mysql_num_rows($result)>0)
  {
    $fl->newBlock("collection");
    while($wrow=mysql_fetch_row($wresult))
    {
      $fl->newBlock("collbook");
      $fl->assign("BID", opmaak($wrow[0]));
      $fl->assign("TITLE", opmaak($wrow[1]));
      $aquery="SELECT a.id, a.name, a.firstname FROM fl_authors a, fl_author_book b WHERE b.book='".$wrow[0]."' AND b.author=a.id";
      $aresult=mysql_query($aquery);
      while($arow=mysql_fetch_row($aresult))
      {
        $fl->newBlock("collauthor");
        $fl->assign("AID", opmaak($arow[0]));
        $fl->assign("AUTHOR", opmaak($arow[2].' '.$arow[1]));
      }
    }
  }

}

$keywords.="User Information, Wantlist, Collection";
$fl->assign("_ROOT.KEYWORDS", $keywords);
$fl->printToScreen();
?>
