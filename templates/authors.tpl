<!-- INCLUDE BLOCK : header -->
		<div class="left">
			<div class="blockheader">
				account
			</div>
			<div class="block">
<!-- START BLOCK : logininput -->
<form name="login" action="{TARGET}.php" method="post">
username: <input name="login_username" type="text" class="login" tabindex="1"><br />
<!-- END BLOCK : logininput -->
<!-- START BLOCK : passwordinput -->
password: <input name="login_password" type="password" class="login" tabindex="2"><br /><br />
<input type="submit" value="{TARGET}" class="loginknop" name="loginknop" tabindex="3"></form>
<!-- END BLOCK : passwordinput -->
<!-- INCLUDE BLOCK : accountmenu -->
<!-- START BLOCK : admin -->
>> <a href="{FILEROOT}/administration/">Administration</a><br />
<!-- END BLOCK : admin -->
				<!-- START BLOCK : joinform -->
<br />
Do you want your own collection online? Want to comment on books, authors and publishers? Want to add your own books to the Fantasylibrary.net database? <a href="signup.php">Sign up for an account</a> and get all these privileges! It's free!<br>
<!-- END BLOCK : joinform -->
			</div>
			<div class="blockheader">
				search
			</div>
			<div class="block">
				<form method="post" action="search.php"><input type="text" name="searchquery" size="10" /><br /><br /><input type="submit" class="submit" value="Search" name="search"></form>
			</div>
			<div class="blockheader">
				ad
			</div>
			<div class="block">
				<script type="text/javascript"><!--
google_ad_client = "pub-0803742726684306";
google_ad_width = 125;
google_ad_height = 125;
google_ad_format = "125x125_as";
google_ad_channel ="7528484414";
google_ad_type = "text_image";
google_color_border = "596589";
google_color_bg = "F0F1F4";
google_color_link = "596589";
google_color_url = "596589";
google_color_text = "596589";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
			</div>
		</div>
      </td>
      <td valign="top" width="25">
      &nbsp;
      </td>
      <td valign="top">
     <div class="main">
			<div class="bigblockheader">
				authors
			</div>
			<div class="maincontent">
<!-- START BLOCK : feedback -->
{FEEDBACK}<br /><br />
<!-- END BLOCK : feedback -->
<a href="{FILEROOT}/authors.php/0">ALL</a> | <a href="{FILEROOT}/authors.php/0/a">A</a> | <a href="{FILEROOT}/authors.php/0/b">B</a> | <a href="{FILEROOT}/authors.php/0/c">C</a> | <a href="{FILEROOT}/authors.php/0/d">D</a> | <a href="{FILEROOT}/authors.php/0/e">E</a> | <a href="{FILEROOT}/authors.php/0/f">F</a> | <a href="{FILEROOT}/authors.php/0/g">G</a> | <a href="{FILEROOT}/authors.php/0/h">H</a> | <a href="{FILEROOT}/authors.php/0/i">I</a> | <a href="{FILEROOT}/authors.php/0/j">J</a> | <a href="{FILEROOT}/authors.php/0/k">K</a> | <a href="{FILEROOT}/authors.php/0/l">L</a> | <a href="{FILEROOT}/authors.php/0/m">M</a> | <a href="{FILEROOT}/authors.php/0/n">N</a> | <a href="{FILEROOT}/authors.php/0/o">O</a> | <a href="{FILEROOT}/authors.php/0/p">P</a> | <a href="{FILEROOT}/authors.php/0/q">Q</a> | <a href="{FILEROOT}/authors.php/0/r">R</a> | <a href="{FILEROOT}/authors.php/0/s">S</a> | <a href="{FILEROOT}/authors.php/0/t">T</a> | <a href="{FILEROOT}/authors.php/0/u">U</a> | <a href="{FILEROOT}/authors.php/0/v">V</a> | <a href="{FILEROOT}/authors.php/0/w">W</a> | <a href="{FILEROOT}/authors.php/0/x">X</a> | <a href="{FILEROOT}/authors.php/0/y">Y</a> | <a href="{FILEROOT}/authors.php/0/z">Z</a><br />
<br />
<table>
<!-- START BLOCK : author -->
<tr>
<td valign="top">
<a href="{FILEROOT}/author.php/{AID}">{AUTHOR}</a>
</td>
</tr>
<!-- END BLOCK : author -->
</table>
<br>
<br>
<!-- START BLOCK : prevpage -->
<a href="{FILEROOT}/authors.php/{START}/{LETTER}">previous page</a>
<!-- END BLOCK : prevpage -->
<!-- START BLOCK : nextpage -->
<a href="{FILEROOT}/authors.php/{START}/{LETTER}">next page</a>
<!-- END BLOCK : nextpage -->


			</div>
		</div>
      </td>
      <td valign="top" width="10">
      &nbsp;
      </td>
      <td valign="top">
		<div class="right">
			<div class="blockheader">
				add
			</div>
			<div class="rightblock">
				<!-- START BLOCK : addauthor -->
Can't find a specific author in our library? <a href="{FILEROOT}/addauthor.php">Add an author</a> yourself.
<!-- END BLOCK : addauthor -->
<!-- START BLOCK : nonmemberaddauthor -->
Can't find a specific author in our library? <a href="signup.php">Sign up for an account</a> and be able to add authors yourself!
<!-- END BLOCK : nonmemberaddauthor -->
			</div>
		</div>
		<br />
<!-- INCLUDE BLOCK : footer -->