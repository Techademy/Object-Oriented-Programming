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
				items I added
			</div>
			<div class="maincontent">
<!-- START BLOCK : feedback -->
<strong>{FEEDBACK}</strong><br>
<br>
<!-- END BLOCK : feedback -->
<!-- START BLOCK : mybooks -->
<strong>Books</strong><br>
<br>
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
<strong>Status</strong>
</td>
</tr>
<!-- START BLOCK : item -->
<tr>
<td valign="top">
<!-- START BLOCK : approvedtitle -->
<a href="{FILEROOT}/book.php/{BID}">{TITLE}</a>
<!-- END BLOCK : approvedtitle -->
<!-- START BLOCK : notapprovedtitle -->
{TITLE}
<!-- END BLOCK : notapprovedtitle -->
</td>
<td valign="top">
<!-- START BLOCK : author -->
<a href="{FILEROOT}/author.php/{AID}">{AUTHOR}</a><br> 
<!-- END BLOCK : author -->
<!-- START BLOCK : variousauthors -->
Various Authors<br>
<!-- END BLOCK : variousauthors -->
</td>
<td valign="top">
<a href="{FILEROOT}/publisher.php/{PID}">{PUBLISHER}</a>
</td>
<td valign="top">
{STATUS}
</td>
</tr>
<!-- END BLOCK : item -->
</table>
<br>
<!-- END BLOCK : mybooks -->

<!-- START BLOCK : myauthors -->
<strong>Authors</strong><br>
<br>
<table cellpadding="2" cellspacing="2">
<tr>
<td valign="top">
<strong>Author</strong>
</td>
<td valign="top">
<strong>Status</strong>
</td>
</tr>
<!-- START BLOCK : aitem -->
<tr>
<td valign="top">
<!-- START BLOCK : approvedauthor -->
<a href="{FILEROOT}/author.php/{AID}">{AUTHOR}</a><br> 
<!-- END BLOCK : approvedauthor -->
<!-- START BLOCK : notapprovedauthor -->
{AUTHOR}
<!-- END BLOCK : notapprovedauthor -->
</td>
<td valign="top">
{STATUS}
</td>
</tr>
<!-- END BLOCK : aitem -->
</table>
<br>
<!-- END BLOCK : myauthors -->

<!-- START BLOCK : mypubs -->
<strong>Publishers</strong><br>
<br>
<table cellpadding="2" cellspacing="2">
<tr>
<td valign="top">
<strong>Publisher</strong>
</td>
<td valign="top">
<strong>Status</strong>
</td>
</tr>
<!-- START BLOCK : pitem -->
<tr>
<td valign="top">
<!-- START BLOCK : approvedpub -->
<a href="{FILEROOT}/publisher.php/{PID}">{PUBLISHER}</a><br> 
<!-- END BLOCK : approvedpub -->
<!-- START BLOCK : notapprovedpub -->
{PUBLISHER}
<!-- END BLOCK : notapprovedpub -->
</td>
<td valign="top">
{STATUS}
</td>
</tr>
<!-- END BLOCK : pitem -->
</table>
<br>
<!-- END BLOCK : mypubs -->

<!-- START BLOCK : mythemes -->
<strong>Themes</strong><br>
<br>
<table cellpadding="2" cellspacing="2">
<tr>
<td valign="top">
<strong>Theme</strong>
</td>
<td valign="top">
<strong>Status</strong>
</td>
</tr>
<!-- START BLOCK : titem -->
<tr>
<td valign="top">
<!-- START BLOCK : approvedtheme -->
<a href="{FILEROOT}/theme.php/{TID}">{THEME}</a><br> 
<!-- END BLOCK : approvedtheme -->
<!-- START BLOCK : notapprovedtheme -->
{THEME}
<!-- END BLOCK : notapprovedtheme -->
</td>
<td valign="top">
{STATUS}
</td>
</tr>
<!-- END BLOCK : titem -->
</table>
<!-- END BLOCK : mythemes -->


			</div>
		</div>
      </td>
      <td valign="top" width="10">
      &nbsp;
      </td>
      <td valign="top">
		<div class="right">
			<div class="blockheader">
				your account
			</div>
			<div class="rightblock">
				With your my.fantasylibrary account, you can manage your collection and wantlist and check on the status of the items you have submitted to the site.
			</div>
		</div>
		<br />
<!-- INCLUDE BLOCK : footer -->