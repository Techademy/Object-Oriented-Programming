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
				my wantlist
			</div>
			<div class="maincontent">
<!-- START BLOCK : feedback -->
<strong>{FEEDBACK}</strong><br>
<br>
<!-- END BLOCK : feedback -->
<!-- START BLOCK : wantlist -->
<table cellpadding="2" cellspacing="2">
<tr>
<td valign="top">
<strong>Title</strong>
</td>
<td valign="top">
<strong>Author(s)</strong>
</td>
<td valign="top">
<strong>Publisher</strong>
</td>
<td valign="top">
&nbsp;
</td>
</tr>
<!-- START BLOCK : item -->
<tr>
<td valign="top">
<a href="{FILEROOT}/book.php/{BID}">{TITLE}</a>
</td>
<td valign="top">
<!-- START BLOCK : author -->
<a href="{FILEROOT}/author.php/{AID}">{AUTHOR}</a> 
<!-- END BLOCK : author -->
<!-- START BLOCK : variousauthors -->
Various Authors<br>
<!-- END BLOCK : variousauthors -->
</td>
<td valign="top">
<a href="{FILEROOT}/publisher.php/{PID}">{PUBLISHER}</a>
</td>
<td valign="top">
<form method="post" action="removefromwantlist.php"><input type="hidden" name="bid" value="{BID}"><input type="submit" name="remove" value="Remove" class="knop"></form>
</td>
</tr>
<!-- END BLOCK : item -->
</table>
<!-- END BLOCK : wantlist -->


			</div>
		</div>
      </td>
      <td valign="top" width="10">
      &nbsp;
      </td>
      <td valign="top">
		<div class="right">
			<div class="blockheader">
				wanlist
			</div>
			<div class="rightblock">
				If you want people to be able to contact you about items on your wantlist, make sure you have enabled the option in your account settings that people can send e-mails through your personal page.
			</div>
		</div>
		<br />
<!-- INCLUDE BLOCK : footer -->