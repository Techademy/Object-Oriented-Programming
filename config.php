<?php

$db_hostname = "localhost";
$db_username = "username";
$db_password = "password";
$dbName = "fantasylibrary";
$fileroot="";
$docroot="/path/to/project/dir/";

// General Info
$sitenaam = "FantasyLibrary.net"; // Name of the site
$infoemail = ""; // Contact emailaddress

// mySQL connection
mysql_connect($db_hostname,$db_username,$db_password) OR DIE("Unable to connect to the mySQL server");
mysql_select_db("$dbName") OR DIE("Unable to select mySQL database");

// general layout function
function opmaak($variabele)
{
  $variabele=stripslashes($variabele);
  $variabele=htmlspecialchars($variabele);
  $variabele=nl2br($variabele);
  return $variabele;
}

function htmlopmaak($variabele)
{
  $variabele=stripslashes($variabele);
  $variabele=nl2br($variabele);
  return $variabele;
}

function invoer($variabele)
{
  $variabele=addslashes($variabele);
  return $variabele;
}

// central functions
function getrating($book)
{
  $query="SELECT AVG(rating) FROM fl_bookreviews WHERE book_id='".intval($book)."'";
  $result=mysql_query($query);
  $row=mysql_fetch_row($result);
  return substr($row[0], 0, 4);
}

function report_error($file, $error)
{
  mail("librarian@fantasylibrary.net", "Error on site: ".stripslashes($file)."!", stripslashes($error), "FROM: noreply@fantasylibrary.net");
}

function send_book_confirmation($id, $email)
{
  $query="SELECT title FROM fl_books WHERE id='".intval($id)."'";
  $result=mysql_query($query);
  $row=mysql_fetch_row($result);
  $message="Hello,\n\n";
  $message.="You have recently submitted ".stripslashes($row[0])." to the library. One of our librarians has looked at it and approved it for the library.\n";
  $message.="The book is now available on http://www.fantasylibrary.net/book.php/".$id."\n";
  $message.="Thank you for adding the book to the library.\n\n";
  $message.="The FantasyLibrary.net Librarians\n";
  mail($email, stripslashes($row[0])." has been added", stripslashes($message), "FROM: FantasyLibrary.net Librarians <librarian@fantasylibrary.net>");
}

function send_author_confirmation($id, $email)
{
  $query="SELECT name, firstname FROM fl_authors WHERE id='".intval($id)."'";
  $result=mysql_query($query);
  $row=mysql_fetch_row($result);
  $author=stripslashes($row[1].' '.$row[0]);
  $message="Hello,\n\n";
  $message.="You have recently submitted ".$author." to the library. One of our librarians has looked at the submitted information and approved the author for the library.\n";
  $message.="The author is now available on http://www.fantasylibrary.net/author.php/".$id."\n";
  $message.="Thank you for adding the author to the library.\n\n";
  $message.="The FantasyLibrary.net Librarians\n";
  mail($email, $author." has been added", stripslashes($message), "FROM: FantasyLibrary.net Librarians <librarian@fantasylibrary.net>");
}

function send_publisher_confirmation($id, $email)
{
  $query="SELECT name FROM fl_publishers WHERE id='".intval($id)."'";
  $result=mysql_query($query);
  $row=mysql_fetch_row($result);
  $message="Hello,\n\n";
  $message.="You have recently submitted ".stripslashes($row[0])." to the library. One of our librarians has looked at the submitted information and approved the publisher for the library.\n";
  $message.="The publisher is now available on http://www.fantasylibrary.net/publisher.php/".$id."\n";
  $message.="Thank you for adding the publisher to the library.\n\n";
  $message.="The FantasyLibrary.net Librarians\n";
  mail($email, stripslashes($row[0])." has been added", stripslashes($message), "FROM: FantasyLibrary.net Librarians <librarian@fantasylibrary.net>");
}

function send_theme_confirmation($id, $email)
{
  $query="SELECT name FROM fl_worlds WHERE id='".intval($id)."'";
  $result=mysql_query($query);
  $row=mysql_fetch_row($result);
  $message="Hello,\n\n";
  $message.="You have recently submitted ".stripslashes($row[0])." to the library. One of our librarians has looked at the submitted information and approved the theme for the library.\n";
  $message.="The theme is now available on http://www.fantasylibrary.net/theme.php/".$id."\n";
  $message.="Thank you for adding the theme to the library.\n\n";
  $message.="The FantasyLibrary.net Librarians\n";
  mail($email, stripslashes($row[0])." has been added", stripslashes($message), "FROM: FantasyLibrary.net Librarians <librarian@fantasylibrary.net>");
}

/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | TemplatePower:                                                       |
// | offers you the ability to separate your PHP code and your HTML       |
// +----------------------------------------------------------------------+
// |                                                                      |
// | Copyright (C) 2001,2002  R.P.J. Velzeboer, The Netherlands           |
// |                                                                      |
// | This program is free software; you can redistribute it and/or        |
// | modify it under the terms of the GNU General Public License          |
// | as published by the Free Software Foundation; either version 2       |
// | of the License, or (at your option) any later version.               |
// |                                                                      |
// | This program is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        |
// | GNU General Public License for more details.                         |
// |                                                                      |
// | You should have received a copy of the GNU General Public License    |
// | along with this program; if not, write to the Free Software          |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA            |
// | 02111-1307, USA.                                                     |
// |                                                                      |
// | Author: R.P.J. Velzeboer, rovel@codocad.nl   The Netherlands         |
// |                                                                      |
// +----------------------------------------------------------------------+
// | http://templatepower.codocad.com                                     |
// +----------------------------------------------------------------------+
//
// $Id: Version 3.0.1$

define("T_BYFILE",              0);
define("T_BYVAR",               1);

define("TP_ROOTBLOCK",    '_ROOT');

class TemplatePowerParser
{
  var $tpl_base;              //Array( [filename/varcontent], [T_BYFILE/T_BYVAR] )
  var $tpl_include;           //Array( [filename/varcontent], [T_BYFILE/T_BYVAR] )
  var $tpl_count;

  var $parent   = Array();    // $parent[{blockname}] = {parentblockname}
  var $defBlock = Array();

  var $rootBlockName;
  var $ignore_stack;

  var $version;

  /**
  * TemplatePowerParser::TemplatePowerParser()
  *
  * @param $tpl_file
  * @param $type
  * @return
  *
  * @access private
  */
  function TemplatePowerParser( $tpl_file, $type )
  {
    $this->version        = '3.0.1';

    $this->tpl_base       = Array( $tpl_file, $type );
    $this->tpl_count      = 0;
    $this->ignore_stack   = Array( false );
  }

  /**
  * TemplatePowerParser::__errorAlert()
  *
  * @param $message
  * @return
  *
  * @access private
  */
  function __errorAlert( $message )
  {
    print( '<br>'. $message .'<br>\r\n');
  }

  /**
  * TemplatePowerParser::__prepare()
  *
  * @return
  *
  * @access private
  */
  function __prepare()
  {
    $this->defBlock[ TP_ROOTBLOCK ] = Array();
    $tplvar = $this->__prepareTemplate( $this->tpl_base[0], $this->tpl_base[1]  );

    $initdev["varrow"]  = 0;
    $initdev["coderow"] = 0;
    $initdev["index"]   = 0;
    $initdev["ignore"]  = false;

    $this->__parseTemplate( $tplvar, TP_ROOTBLOCK, $initdev );
    $this->__cleanUp();
  }

  /**
  * TemplatePowerParser::__cleanUp()
  *
  * @return
  *
  * @access private
  */
  function __cleanUp()
  {
    for( $i=0; $i <= $this->tpl_count; $i++ )
    {
      $tplvar = 'tpl_rawContent'. $i;
      unset( $this->{$tplvar} );
    }
  }

  /**
  * TemplatePowerParser::__prepareTemplate()
  *
  * @param $tpl_file
  * @param $type
  * @return
  *
  * @access private
  */
  function __prepareTemplate( $tpl_file, $type )
  {
    $tplvar = 'tpl_rawContent'. $this->tpl_count;

    if( $type == T_BYVAR )
    {
      $this->{$tplvar}["content"] = preg_split('/\n/', $tpl_file, -1, PREG_SPLIT_DELIM_CAPTURE);
    }
    else
    {
      $this->{$tplvar}["content"] = @file( $tpl_file ) or
      die( $this->__errorAlert('TemplatePower Error: Couldn\'t open [ '. $tpl_file .' ]!'));
    }

    $this->{$tplvar}["size"]    = sizeof( $this->{$tplvar}["content"] );

    $this->tpl_count++;

    return $tplvar;
  }

  /**
  * TemplatePowerParser::__parseTemplate()
  *
  * @param $tplvar
  * @param $blockname
  * @param $initdev
  * @return
  *
  * @access private
  */
  function __parseTemplate( $tplvar, $blockname, $initdev )
  {
    $coderow = $initdev["coderow"];
    $varrow  = $initdev["varrow"];
    $index   = $initdev["index"];
    $ignore  = $initdev["ignore"];

    while( $index < $this->{$tplvar}["size"] )
    {
      if ( preg_match('/<!--[ ]?(START|END) IGNORE -->/', $this->{$tplvar}["content"][$index], $ignreg) )
      {
        if( $ignreg[1] == 'START')
        {
          //$ignore = true;
          array_push( $this->ignore_stack, true );
        }
        else
        {
          //$ignore = false;
          array_pop( $this->ignore_stack );
        }
      }
      else
      {
        if( !end( $this->ignore_stack ) )
        {
          if( preg_match('/<!--[ ]?(START|END|INCLUDE|INCLUDESCRIPT|REUSE) BLOCK : (.+)-->/', $this->{$tplvar}["content"][$index], $regs))
          {
            //remove trailing and leading spaces
            $regs[2] = trim( $regs[2] );

            if( $regs[1] == 'INCLUDE')
            {
              $include_defined = true;

              //check if the include file is assigned
              if( isset( $this->tpl_include[ $regs[2] ]) )
              {
                $tpl_file = $this->tpl_include[ $regs[2] ][0];
                $type   = $this->tpl_include[ $regs[2] ][1];
              }
              else
              if (file_exists( $regs[2] ))    //check if defined as constant in template
              {
                $tpl_file = $regs[2];
                $type     = T_BYFILE;
              }
              else
              {
                $include_defined = false;
              }

              if( $include_defined )
              {
                //initialize startvalues for recursive call
                $initdev["varrow"]  = $varrow;
                $initdev["coderow"] = $coderow;
                $initdev["index"]   = 0;
                $initdev["ignore"]  = false;

                $tplvar2 = $this->__prepareTemplate( $tpl_file, $type );
                $initdev = $this->__parseTemplate( $tplvar2, $blockname, $initdev );

                $coderow = $initdev["coderow"];
                $varrow  = $initdev["varrow"];
              }
            }
            else
            if( $regs[1] == 'INCLUDESCRIPT' )
            {
              $include_defined = true;

              //check if the includescript file is assigned by the assignInclude function
              if( isset( $this->tpl_include[ $regs[2] ]) )
              {
                $include_file = $this->tpl_include[ $regs[2] ][0];
                $type         = $this->tpl_include[ $regs[2] ][1];
              }
              else
              if (file_exists( $regs[2] ))    //check if defined as constant in template
              {
                $include_file = $regs[2];
                $type         = T_BYFILE;
              }
              else
              {
                $include_defined = false;
              }

              if( $include_defined )
              {
                ob_start();

                if( $type == T_BYFILE )
                {
                  if( !@include_once( $include_file ) )
                  {
                    $this->__errorAlert( 'TemplatePower Error: Couldn\'t include script [ '. $include_file .' ]!' );
                    exit();
                  }
                }
                else
                {
                  eval( "?>" . $include_file );
                }

                $this->defBlock[$blockname]["_C:$coderow"] = ob_get_contents();
                $coderow++;

                ob_end_clean();
              }
            }
            else
            if( $regs[1] == 'REUSE' )
            {
              //do match for 'AS'
              if (preg_match('/(.+) AS (.+)/', $regs[2], $reuse_regs))
              {
                $originalbname = trim( $reuse_regs[1] );
                $copybname     = trim( $reuse_regs[2] );

                //test if original block exist
                if (isset( $this->defBlock[ $originalbname ] ))
                {
                  //copy block
                  $this->defBlock[ $copybname ] = $this->defBlock[ $originalbname ];

                  //tell the parent that he has a child block
                  $this->defBlock[ $blockname ]["_B:". $copybname ] = '';

                  //create index and parent info
                  $this->index[ $copybname ]  = 0;
                  $this->parent[ $copybname ] = $blockname;
                }
                else
                {
                  $this->__errorAlert('TemplatePower Error: Can\'t find block \''. $originalbname .'\' to REUSE as \''. $copybname .'\'');
                }
              }
              else
              {
                //so it isn't a correct REUSE tag, save as code
                $this->defBlock[$blockname]["_C:$coderow"] = $this->{$tplvar}["content"][$index];
                $coderow++;
              }
            }
            else
            {
              if( $regs[2] == $blockname )     //is it the end of a block
              {
                break;
              }
              else                             //its the start of a block
              {
                //make a child block and tell the parent that he has a child
                $this->defBlock[ $regs[2] ] = Array();
                $this->defBlock[ $blockname ]["_B:". $regs[2]] = '';

                //set some vars that we need for the assign functions etc.
                $this->index[ $regs[2] ]  = 0;
                $this->parent[ $regs[2] ] = $blockname;

                //prepare for the recursive call
                $index++;
                $initdev["varrow"]  = 0;
                $initdev["coderow"] = 0;
                $initdev["index"]   = $index;
                $initdev["ignore"]  = false;

                $initdev = $this->__parseTemplate( $tplvar, $regs[2], $initdev );

                $index = $initdev["index"];
              }
            }
          }
          else                                                        //is it code and/or var(s)
          {
            //explode current template line on the curly bracket '{'
            $sstr = explode( '{', $this->{$tplvar}["content"][$index] );

            reset( $sstr );

            if (current($sstr) != '')
            {
              //the template didn't start with a '{',
              //so the first element of the array $sstr is just code
              $this->defBlock[$blockname]["_C:$coderow"] = current( $sstr );
              $coderow++;
            }

            while (next($sstr))
            {
              //find the position of the end curly bracket '}'
              $pos = strpos( current($sstr), "}" );

              if ( ($pos !== false) && ($pos > 0) )
              {
                //a curly bracket '}' is found
                //and at least on position 1, to eliminate '{}'

                //note: position 1 taken without '{', because we did explode on '{'

                $strlength = strlen( current($sstr) );
                $varname   = substr( current($sstr), 0, $pos );

                if (strstr( $varname, ' ' ))
                {
                  //the varname contains one or more spaces
                  //so, it isn't a variable, save as code
                  $this->defBlock[$blockname]["_C:$coderow"] = '{'. current( $sstr );
                  $coderow++;
                }
                else
                {
                  //save the variable
                  $this->defBlock[$blockname]["_V:$varrow" ] = $varname;
                  $varrow++;

                  //is there some code after the varname left?
                  if( ($pos + 1) != $strlength )
                  {
                    //yes, save that code
                    $this->defBlock[$blockname]["_C:$coderow"] = substr( current( $sstr ), ($pos + 1), ($strlength - ($pos + 1)) );
                    $coderow++;
                  }
                }
              }
              else
              {
                //no end curly bracket '}' found
                //so, the curly bracket is part of the text. Save as code, with the '{'
                $this->defBlock[$blockname]["_C:$coderow"] = '{'. current( $sstr );
                $coderow++;
              }
            }
          }
        }
        else
        {
          $this->defBlock[$blockname]["_C:$coderow"] = $this->{$tplvar}["content"][$index];
          $coderow++;
        }
      }

      $index++;
    }

    $initdev["varrow"]  = $varrow;
    $initdev["coderow"] = $coderow;
    $initdev["index"]   = $index;

    return $initdev;
  }


  /**
  * TemplatePowerParser::version()
  *
  * @return
  * @access public
  */
  function version()
  {
    return $this->version;
  }

  /**
  * TemplatePowerParser::assignInclude()
  *
  * @param $iblockname
  * @param $value
  * @param $type
  *
  * @return
  *
  * @access public
  */
  function assignInclude( $iblockname, $value, $type=T_BYFILE )
  {
    $this->tpl_include["$iblockname"] = Array( $value, $type );
  }
}

class TemplatePower extends TemplatePowerParser
{
  var $index    = Array();        // $index[{blockname}]  = {indexnumber}
  var $content  = Array();

  var $currentBlock;
  var $showUnAssigned;
  var $serialized;
  var $globalvars = Array();
  var $prepared;

  /**
  * TemplatePower::TemplatePower()
  *
  * @param $tpl_file
  * @param $type
  * @return
  *
  * @access public
  */
  function TemplatePower( $tpl_file='', $type= T_BYFILE )
  {
    TemplatePowerParser::TemplatePowerParser( $tpl_file, $type );

    $this->prepared       = false;
    $this->showUnAssigned = false;
    $this->serialized     = false;  //added: 26 April 2002
  }

  /**
  * TemplatePower::__deSerializeTPL()
  *
  * @param $stpl_file
  * @param $tplvar
  * @return
  *
  * @access private
  */
  function __deSerializeTPL( $stpl_file, $type )
  {
    if( $type == T_BYFILE )
    {
      $serializedTPL = @file( $stpl_file ) or
      die( $this->__errorAlert('TemplatePower Error: Can\'t open [ '. $stpl_file .' ]!'));
    }
    else
    {
      $serializedTPL = $stpl_file;
    }

    $serializedStuff = unserialize( join ('', $serializedTPL) );

    $this->defBlock = $serializedStuff["defBlock"];
    $this->index    = $serializedStuff["index"];
    $this->parent   = $serializedStuff["parent"];
  }

  /**
  * TemplatePower::__makeContentRoot()
  *
  * @return
  *
  * @access private
  */
  function __makeContentRoot()
  {
    $this->content[ TP_ROOTBLOCK ."_0"  ][0] = Array( TP_ROOTBLOCK );
    $this->currentBlock = &$this->content[ TP_ROOTBLOCK ."_0" ][0];
  }

  /**
  * TemplatePower::__assign()
  *
  * @param $varname
  * @param $value
  * @return
  *
  * @access private
  */
  function __assign( $varname, $value)
  {
    if( sizeof( $regs = explode('.', $varname ) ) == 2 )  //this is faster then preg_match
    {
      $ind_blockname = $regs[0] .'_'. $this->index[ $regs[0] ];

      $lastitem = sizeof( $this->content[ $ind_blockname ] );

      $lastitem > 1 ? $lastitem-- : $lastitem = 0;

      $block = &$this->content[ $ind_blockname ][ $lastitem ];
      $varname = $regs[1];
    }
    else
    {
      $block = &$this->currentBlock;
    }

    $block["_V:$varname"] = $value;

  }

  /**
  * TemplatePower::__assignGlobal()
  *
  * @param $varname
  * @param $value
  * @return
  *
  * @access private
  */
  function __assignGlobal( $varname, $value )
  {
    $this->globalvars[ $varname ] = $value;
  }


  /**
  * TemplatePower::__outputContent()
  *
  * @param $blockname
  * @return
  *
  * @access private
  */
  function __outputContent( $blockname )
  {
    $numrows = sizeof( $this->content[ $blockname ] );

    for( $i=0; $i < $numrows; $i++)
    {
      $defblockname = $this->content[ $blockname ][$i][0];

      for( reset( $this->defBlock[ $defblockname ]);  $k = key( $this->defBlock[ $defblockname ]);  next( $this->defBlock[ $defblockname ] ) )
      {
        if ($k[1] == 'C')
        {
          print( $this->defBlock[ $defblockname ][$k] );
        }
        else
        if ($k[1] == 'V')
        {
          $defValue = $this->defBlock[ $defblockname ][$k];

          if( !isset( $this->content[ $blockname ][$i][ "_V:". $defValue ] ) )
          {
            if( isset( $this->globalvars[ $defValue ] ) )
            {
              $value = $this->globalvars[ $defValue ];
            }
            else
            {
              if( $this->showUnAssigned )
              {
                //$value = '{'. $this->defBlock[ $defblockname ][$k] .'}';
                $value = '{'. $defValue .'}';
              }
              else
              {
                $value = '';
              }
            }
          }
          else
          {
            $value = $this->content[ $blockname ][$i][ "_V:". $defValue ];
          }

          print( $value );

        }
        else
        if ($k[1] == 'B')
        {
          if( isset( $this->content[ $blockname ][$i][$k] ) )
          {
            $this->__outputContent( $this->content[ $blockname ][$i][$k] );
          }
        }
      }
    }
  }

  function __printVars()
  {
    var_dump($this->defBlock);
    print("<br>--------------------<br>");
    var_dump($this->content);
  }


  /**********
  public members
  ***********/

  /**
  * TemplatePower::serializedBase()
  *
  * @return
  *
  * @access public
  */
  function serializedBase()
  {
    $this->serialized = true;
    $this->__deSerializeTPL( $this->tpl_base[0], $this->tpl_base[1] );
  }

  /**
  * TemplatePower::showUnAssigned()
  *
  * @param $state
  * @return
  *
  * @access public
  */
  function showUnAssigned( $state = true )
  {
    $this->showUnAssigned = $state;
  }

  /**
  * TemplatePower::prepare()
  *
  * @return
  *
  * @access public
  */
  function prepare()
  {
    if (!$this->serialized)
    {
      TemplatePowerParser::__prepare();
    }

    $this->prepared = true;

    $this->index[ TP_ROOTBLOCK ]    = 0;
    $this->__makeContentRoot();
  }

  /**
  * TemplatePower::newBlock()
  *
  * @param $blockname
  * @return
  *
  * @access public
  */
  function newBlock( $blockname )
  {
    $parent = &$this->content[ $this->parent[$blockname] .'_'. $this->index[$this->parent[$blockname]] ];

    $lastitem = sizeof( $parent );
    $lastitem > 1 ? $lastitem-- : $lastitem = 0;

    $ind_blockname = $blockname .'_'. $this->index[ $blockname ];

    if ( !isset( $parent[ $lastitem ]["_B:$blockname"] ))
    {
      //ok, there is no block found in the parentblock with the name of {$blockname}

      //so, increase the index counter and create a new {$blockname} block
      $this->index[ $blockname ] += 1;

      $ind_blockname = $blockname .'_'. $this->index[ $blockname ];

      if (!isset( $this->content[ $ind_blockname ] ) )
      {
        $this->content[ $ind_blockname ] = Array();
      }

      //tell the parent where his (possible) children are located
      $parent[ $lastitem ]["_B:$blockname"] = $ind_blockname;
    }

    //now, make a copy of the block defenition
    $blocksize = sizeof( $this->content[ $ind_blockname ] );

    $this->content[ $ind_blockname ][ $blocksize ] = Array( $blockname );

    //link the current block to the block we just created
    $this->currentBlock = &$this->content[ $ind_blockname ][ $blocksize ];
  }

  /**
  * TemplatePower::assignGlobal()
  *
  * @param $varname
  * @param $value
  * @return
  *
  * @access public
  */
  function assignGlobal( $varname, $value )
  {
    if (is_array( $varname ))
    {
      foreach($varname as $var => $value)
      {
        $this->__assignGlobal( $var, $value );
      }
    }
    else
    {
      $this->__assignGlobal( $varname, $value );
    }
  }


  /**
  * TemplatePower::assign()
  *
  * @param $varname
  * @param $value
  * @return
  *
  * @access public
  */
  function assign( $varname, $value='' )
  {
    if (is_array( $varname ))
    {
      foreach($varname as $var => $value)
      {
        $this->__assign( $var, $value );
      }
    }
    else
    {
      $this->__assign( $varname, $value );
    }
  }

  /**
  * TemplatePower::gotoBlock()
  *
  * @param $blockname
  * @return
  *
  * @access public
  */
  function gotoBlock( $blockname )
  {
    if ( isset( $this->defBlock[ $blockname ] ) )
    {
      $ind_blockname = $blockname .'_'. $this->index[ $blockname ];

      //get lastitem indexnumber
      $lastitem = sizeof( $this->content[ $ind_blockname ] );

      $lastitem > 1 ? $lastitem-- : $lastitem = 0;

      //link the current block
      $this->currentBlock = &$this->content[ $ind_blockname ][ $lastitem ];
    }
  }

  /**
  * TemplatePower::getVarValue()
  *
  * @param $varname
  * @return
  *
  * @access public
  */
  function getVarValue( $varname )
  {
    if( sizeof( $regs = explode('.', $varname ) ) == 2 )  //this is faster then preg_match
    {
      $ind_blockname = $regs[0] .'_'. $this->index[ $regs[0] ];

      $lastitem = sizeof( $this->content[ $ind_blockname ] );

      $lastitem > 1 ? $lastitem-- : $lastitem = 0;

      $block = &$this->content[ $ind_blockname ][ $lastitem ];
      $varname = $regs[1];
    }
    else
    {
      $block = &$this->currentBlock;
    }

    return $block["_V:$varname"];
  }

  /**
  * TemplatePower::printToScreen()
  *
  * @return
  *
  * @access public
  */
  function printToScreen()
  {
    if ($this->prepared)
    {
      $this->__outputContent( TP_ROOTBLOCK .'_0' );
    }
    else
    {
      $this->__errorAlert('TemplatePower Error: Template isn\'t prepared!');
    }
  }

  /**
  * TemplatePower::getOutputContent()
  *
  * @return
  *
  * @access public
  */
  function getOutputContent()
  {
    ob_start();

    $this->printToScreen();

    $content = ob_get_contents();

    ob_end_clean();

    return $content;
  }
}

/*
-
AmazonLiteXMLParser ver 0.9.0
Author: Daniel Kushner
Email: daniel@amazonlite.com
Release: 20 July, 2002
http://www.amazonlite.com/

*/
define('AMAZON_FIELD_TYPE_SINGLE', 1);
define('AMAZON_FIELD_TYPE_ARRAY', 2);
define('AMAZON_FIELD_TYPE_CONTAINER', 3);
class AmazonLiteXMLParser {

  var $parser;
  var $record;
  var $currentField = '';
  var $fieldType;
  var $endsRecord;
  var $records;
  var $wroteElementData = false;

  function AmazonLiteXMLParser($xml) {

    $xml = preg_replace(array('/&amp;/',
    '/<p>/i',
    '/<b>/i',
    '/\'/',
    '/\<br\>/i',
    '/&/'),
    array('and',
    '',
    '',
    '',
    ''), trim($xml));
    $this->records = array();

    $this->parser = xml_parser_create();
    xml_set_object($this->parser, $this);
    xml_set_element_handler($this->parser, 'startElement', 'EndElement');
    xml_set_character_data_handler($this->parser, 'cdata');

    $this->fieldType = array('title'            => AMAZON_FIELD_TYPE_SINGLE,
    'authors'          => AMAZON_FIELD_TYPE_CONTAINER,
    'author'           => AMAZON_FIELD_TYPE_ARRAY,
    'asin'             => AMAZON_FIELD_TYPE_SINGLE,
    'isbn'             => AMAZON_FIELD_TYPE_SINGLE,
    'media'            => AMAZON_FIELD_TYPE_SINGLE,
    'productname'      => AMAZON_FIELD_TYPE_SINGLE,
    'catalog'          => AMAZON_FIELD_TYPE_SINGLE,
    'releasedate'      => AMAZON_FIELD_TYPE_SINGLE,
    'manufacturer'     => AMAZON_FIELD_TYPE_SINGLE,
    'imageurlsmall'    => AMAZON_FIELD_TYPE_SINGLE,
    'imageurlmedium'   => AMAZON_FIELD_TYPE_SINGLE,
    'imageurllarge'    => AMAZON_FIELD_TYPE_SINGLE,
    'listprice'        => AMAZON_FIELD_TYPE_SINGLE,
    'ourprice'         => AMAZON_FIELD_TYPE_SINGLE,
    'usedprice'        => AMAZON_FIELD_TYPE_SINGLE,
    'salesrank'        => AMAZON_FIELD_TYPE_SINGLE,
    'media'            => AMAZON_FIELD_TYPE_SINGLE,
    'nummedia'         => AMAZON_FIELD_TYPE_SINGLE,
    'availability'     => AMAZON_FIELD_TYPE_SINGLE,
    'avgcustomerrating' => AMAZON_FIELD_TYPE_SINGLE,
    'rating'           => AMAZON_FIELD_TYPE_ARRAY,
    'summary'          => AMAZON_FIELD_TYPE_ARRAY,
    'comment'          => AMAZON_FIELD_TYPE_ARRAY,
    'product'          => AMAZON_FIELD_TYPE_ARRAY,
    );

    $this->endsRecord = array('details' => true);
    xml_parse($this->parser, $xml);
    xml_parser_free($this->parser);
  }

  function startElement($p, $element, &$attributes) {
    $element =strtolower($element);

    if(isset($attributes['URL'])) {
      $this->record['url'] = $attributes['URL'];
    }

    if(isset($this->fieldType[$element])) {
      $this->currentField = $element;
    } else {
      $this->currentField = '';
    }
    $this->wroteElementData = false;
  }

  function endElement($p, $element) {
    $element =strtolower($element);
    if(isset($this->endsRecord[$element])) {
      $this->records[] = $this->record;
      $this->record = array();
    }
    $this->currentField = '';
  }

  function cdata($p, $text) {
    $text = preg_replace('/lt;([a-z]+\>)/i', '<\\1', $text);
    if(@$this->fieldType[$this->currentField] === AMAZON_FIELD_TYPE_CONTAINER) {

    } elseif(@$this->fieldType[$this->currentField] === AMAZON_FIELD_TYPE_ARRAY) {
      $lastIndex = @count($this->record[$this->currentField]) - 1;
      $this->wroteElementData ?
      @$this->record[$this->currentField][$lastIndex] .= $text :
      @$this->record[$this->currentField][$lastIndex+1] = $text ;
    } elseif(@$this->fieldType[$this->currentField] === AMAZON_FIELD_TYPE_SINGLE) {
      @$this->record[$this->currentField] .= $text;
    }
    $this->wroteElementData = true;
  }
}

// this login script is based on EasyAuth by SilvrFang @ Avalon Web Solutions
// thank you for providing the web with a nice login script. it has helped me a lot in learning how to handle logins.

function login_user($user_name, $password)
{
  global $fileroot;
  // Query the database for the users' information
  $query = "SELECT * FROM fl_users WHERE user ='".invoer($user_name)."'";
  $result = mysql_query($query);
  $row = mysql_fetch_array($result);
  // If username/password combination is correct
  if (($row["user"] == $user_name) AND ($row["passwd"] == md5($password)) AND ($user_name != ""))
  {
    /* User has been authenticated, cookie can be set, of course with an md5 of the password, and not the password itself */
    $user_id = $row["user"];
    $password=md5($password);
    SetCookie("LoginCookie", "$user_id-$password", time()+360000);
    $success = 1;
  } else {
    $success = 0;
    logout_user();
  }
  return $success;
}


function verify_auth($cookie)
{
  // Split the cookie up into userid and password
  $auth = explode("-", $cookie);
  $query = "SELECT * FROM fl_users WHERE user = '".invoer($auth[0])."'";
  $result=mysql_query($query);
  $row = mysql_fetch_array($result);
  if (($row["user"] == $auth[0]) AND ($row['passwd'] == $auth[1]) AND ($auth[0] != ""))
  {
    $success = 1;
  } else {
    $success = 0;
    logout_user();
  }
  return $success;
}

function logout_user()
{
  SetCookie("LoginCookie", "", time() -3600);
}

function display_loginform()
{
  $form='<font class="login"><form name="login" action="/fantasylibrary.net/login.php" method="post">';
  $form.='User name: <input name="login_username" type="text" class="login"> Password: <input name="login_password" type="password" class="login"> <input type="submit" value="Log in" class="login"></form></font>';
  return $form;
}


//////////////// script entry point here
if(isset($_COOKIE['LoginCookie'])) // if cookie exists, check authenticity
{
  $authenticated=verify_auth($_COOKIE['LoginCookie']);
} else {
  if(isset($_POST['login_username'])) {
    $login=login_user($_POST['login_username'],$_POST['login_password']);
  }
}

function confirm_signup($emailaddress, $username, $password)
{
  GLOBAL $infoemail;
  $message="Hello,\n\n";
  $message.="Thank you for signing up for FantasyLibrary.net\n\n";
  $message.="This e-mail is to confirm your login information for the site. Please keep it safely with you, because there is no way to retrieve your password since it is encoded in our database\n\n";
  $message.="Your username: ".stripslashes($username)."\n";
  $message.="Your password: ".stripslashes($password)."\n\n";
  $message.="Sincerely,\n\n";
  $message.="The FantasyLibrary.net Librarian";
  //mail($emailaddress, "Fantasylibrary.net Account Created", $message, "FROM: The FantasyLibrary.net Librarian <".$infoemail.">");
}

function get_realname($id)
{
  $query="SELECT name FROM fl_users WHERE user='".invoer($id)."'";
  $result=mysql_query($query);
  $row=mysql_fetch_row($result);
  return $row[0];
}

function get_uid($username)
{
  $query="SELECT id FROM fl_users WHERE user='".invoer($username)."'";
  $result=mysql_query($query);
  $row=mysql_fetch_row($result);
  return $row[0];
}

function get_userlevel($username)
{
  $query="SELECT userlevel FROM fl_users WHERE user='".invoer($username)."'";
  $result=mysql_query($query);
  $row=mysql_fetch_row($result);
  return $row[0];
}
// if user has logged in, the script carries on here....
if(isset($_COOKIE['LoginCookie'])) {
  $cookie_var = split("-", $_COOKIE['LoginCookie']);

  // this variable contains who the user is logged in as!
  $username = $cookie_var[0];
  $cookiepass = $cookie_var[1];
}
?>
