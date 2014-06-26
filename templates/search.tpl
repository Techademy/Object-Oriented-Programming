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
				<form method="post" action="search.php"><input type="text" name="searchquery" size="10" value="{SEARCHQUERY}" /><br /><br /><input type="submit" class="submit" value="Search" name="search"></form>
			</div>
		</div>
      </td>
      <td valign="top" width="25">
      &nbsp;
      </td>
      <td valign="top">
     <div class="main">
			<div class="bigblockheader">
				my.fantasylibrary
			</div>
			<div class="maincontent">
						<!-- START BLOCK : error -->
						<strong>{ERROR}</strong><br />
						<br />
						<!-- END BLOCK : error -->
						<form method="post" action="search.php">
						<strong>Search for</strong>
					  <input type="text" class="login" name="searchquery" value="{SEARCHQUERY}"><br /><br />
						<input type="submit" name="search" value="Search" class="knop"><br />
						</form>
						<!-- START BLOCK : result -->
						<strong>{SECTION}</strong><br />
						<!-- START BLOCK : noresults -->
						<br /><br /><strong>No results found in {SECTION}</strong><br />
						<br />
						<!-- END BLOCK : noresults -->
						<!-- START BLOCK : yesresults -->
							<!-- START BLOCK : item -->
              <a href="{LINK}">{TITLE}</a><br />
							<!-- END BLOCK : item -->
						<!-- END BLOCK : yesresults -->
						<br />
						<!-- END BLOCK : result -->

			</div>
		</div>
      </td>
      <td valign="top" width="10">
      &nbsp;
      </td>
      <td valign="top">
		<div class="right">
			<div class="blockheader">
				search
			</div>
			<div class="rightblock">
										Searching the site using this form will check all sections of the site for the keyword(s) you entered. Keywords should be at least 4 characters long. Use a space to seperate several keywords.
			</div>
		</div>
		<br />
<!-- INCLUDE BLOCK : footer -->