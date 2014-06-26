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
				adding a theme
			</div>
			<div class="maincontent">
<!-- START BLOCK : feedback -->
<strong>{FEEDBACK}</strong><br><br>
<!-- END BLOCK : feedback -->

<!-- START BLOCK : themeform -->
Fields with a * are required<br>
<br>
<form method="post" action="addtheme.php">
<table>
<tr>
<td valign="top">
Name *:
</td>
<td valign="top">
<input type="text" name="name" value="{FORMNAME}">
</td>
</tr>
<tr>
<td valign="top">
Description:
</td>
<td valign="top">
<textarea name="description" rows="4" cols="25">{FORMDESC}</textarea>
</td>
</tr>
<tr>
<td valign="top">
Notify me of approval
</td>
<td valign="top">
<input type="checkbox" name="notify" value="yes" class="radio" {CHECKED}>
</td>
</tr>
<tr>
<td valign="top">
&nbsp;
</td>
<td valign="top">
<input type="submit" name="finished" value="Add Theme" class="knop">
</td>
</tr>
</table>
</form>
<!-- END BLOCK : themeform -->


			</div>
		</div>
      </td>
      <td valign="top" width="10">
      &nbsp;
      </td>
      <td valign="top">
		<div class="right">
			<div class="blockheader">
				themes
			</div>
			<div class="rightblock">
With this form you can add a theme to the FantasyLibrary.net database.<br>
<br>
After you've added a theme, it will not immediately be visible in our library. Before it becomes visible, the theme needs to be checked by one of our librarians to see if it fits in the library.<br>
<br>
Thank you for adding a new theme to the library.<br>
<br>
<strong>The Librarians</strong>
			</div>
		</div>
		<br />
<!-- INCLUDE BLOCK : footer -->