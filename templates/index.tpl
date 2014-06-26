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
		</div>
		
      </td>
      <td valign="top" width="25">
      &nbsp;
      </td>
      <td valign="top">
     <div class="main">
			<div class="bigblockheader">
				news
			</div>
			<div class="maincontent">
				<!-- START BLOCK : news -->
<font class="newsdate">{DATETIME}</font> : <strong>{TITLE}</strong><br>
<font class="newsmessage">{MESSAGE}</font><br>
<br>
<!-- END BLOCK : news -->

			</div>
		</div>
      </td>
      <td valign="top" width="10">
      &nbsp;
      </td>
      <td valign="top">
		<div class="right">
			<div class="blockheader">
				latest books
			</div>
			<div class="rightblock">
				<!-- START BLOCK : latestbooks -->
<strong><a href=" {FILEROOT}/book.php/{ID}">{BOOK}</a></strong><br>
<!-- START BLOCK : authors -->
<a href="{FILEROOT}/author.php/{AID}">{AUTHOR}</a><br>
<!-- END BLOCK : authors -->
<!-- START BLOCK : variousauthors -->
Various Authors<br>
<!-- END BLOCK : variousauthors -->
{SUMMARY}<br>
<a href="{FILEROOT}/book.php/{ID}">more ...</a><br>
<br>
<!-- END BLOCK : latestbooks -->
			</div>
		</div>
		<br />
<!-- INCLUDE BLOCK : footer -->