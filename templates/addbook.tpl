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
				add a book: step {STEP}
			</div>
			<div class="maincontent">
<!-- START BLOCK : feedback -->
<strong>{FEEDBACK}</strong><br><br>
<!-- END BLOCK : feedback -->

<!-- START BLOCK : addbookform -->
Before you add a book, make sure that the publisher, author and theme of the book are already in out database. They don't need to be approved yet on the site, but they need to be in the database before you start to fill in this form. <strong>Please make sure the author(s) is/are in the database by checking the site before starting this form. Proceeding to the next step means information is already entered into the database which is then lost for you to come back to when you need to add another author.</strong><br /><br />
Adding a book to the site is a two-step procedure. This form is the first step of the procedure. In this form, most of the information is entered about the book. Fields with a * are required fields, all other fields are optional. If you have the optional information though, we appreciate it if you enter it, so that the site is as complete as possible.<br>
<br>
<form method="post" action="addbook.php">
<table>
<tr>
<td valign="top">
Title *:
</td>
<td valign="top">
<input type="text" name="title" value="{FORMTITLE}">
</td>
</tr>
<tr>
<td valign="top">
ISBN *:
</td>
<td valign="top">
<input type="text" name="isbn" value="{FORMISBN}">
</td>
</tr>
<tr>
<td valign="top">
Summary:
</td>
<td valign="top">
<textarea name="summary" rows="4" cols="25">{FORMSUMMARY}</textarea>
</td>
</tr>
<tr>
<td valign="top">
Publisher *:
</td>
<td valign="top">
<select name="publisher">
<!-- START BLOCK : selectpub -->
<option value="{PID}" {SELECTED}>{PUBLISHER}</option>
<!-- END BLOCK : selectpub -->
</select>
</td>
</tr>
<tr>
<td valign="top">
Date of publishing:
</td>
<td valign="top">
<input type="text" name="pubdate" value="{FORMPUBDATE}"> [format: (MONTH) YYYY]
</td>
</tr>
<tr>
<td valign="top">
Theme:
</td>
<td valign="top">
<select name="theme">
<option value="">None</option>
<!-- START BLOCK : selecttheme -->
<option value="{TID}" {SELECTED}>{THEME}</option>
<!-- END BLOCK : selecttheme -->
</select>
</td>
</tr>
<tr>
<td valign="top">
Category *:
</td>
<td valign="top">
<select name="category">
<!-- START BLOCK : selectcat -->
<option value="{CID}" {SELECTED}>{CATEGORY}</option>
<!-- END BLOCK : selectcat -->
</select>
</td>
</tr>
<tr>
<td valign="top">
Language *:
</td>
<td valign="top">
<select name="language">
<!-- START BLOCK : languages -->
<option value="{LANG}" {SELECTED}>{LANG}</option>
<!-- START BLOCK : languages -->
</select>
</td>
</tr>
<tr>
<td valign="top">
Type *:
</td>
<td valign="top">
<select name="type">
<!-- START BLOCK : types -->
<option value="{TYPE}" {SELECTED}>{TYPE}</option>
<!-- START BLOCK : types -->
</select>
</td>
</tr>
<tr>
<td valign="top">
Notify me when approved:
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
<input type="submit" name="submitbook" value="Next Step: Select author(s)" class="knop">
</td>
</tr>
</table>
</form>
<!-- END BLOCK : addbookform -->
<!-- START BLOCK : addauthorform -->
The next step is to select the author or authors that are responsible for the book. Artists are also welcome, though not required. For each author for this book, click the Add Author button. Only when all authors are added, press the Ready button.<br />
<br />
<form method="post" action="addbook.php">
<input type="hidden" name="bid" value="{BID}">
<input type="hidden" name="num" value="{NUM}">
<input type="hidden" name="notify" value="{NOTIFY}">
<table>
<!-- START BLOCK : author -->
<tr>
<td valign="top">
Author {NUM}:
</td>
<td valign="top">
<select name="author[{NUM}]">
<!-- START BLOCK : noauthor -->
<option value="none">no author / remove</option>
<!-- END BLOCK : noauthor -->
<!-- START BLOCK : selectauthor -->
<option value="{AID}" {SELECTED}>{AUTHOR}</option>
<!-- END BLOCK : selectauthor -->
</select>
</td>
</tr>
<!-- END BLOCK : author -->
<tr>
<td valign="top">
<input type="submit" name="addanotherauthor" value="Add Author" class="knop">
</td>
<td valign="top">
<input type="submit" name="finished" value="Ready" class="knop">
</td>
</tr>
</table>
</form>
<!-- END BLOCK : addauthorform -->

			</div>
		</div>
      </td>
      <td valign="top" width="10">
      &nbsp;
      </td>
      <td valign="top">
		<div class="right">
			<div class="blockheader">
				books
			</div>
			<div class="rightblock">
With this form you can add a book to the FantasyLibrary.net database.<br>
<br>
After you've added a book, it will not immediately be visible in our library. Before it becomes visible, the book needs to be checked by one of our librarians to see if it is in good shape.<br>
<br>
Please make sure all information you enter is correct. Also, try to enter as much information as you can gather on specific books, since that will increase the speed of approval of our librarians. Don't worry if you can't find specific information, just try to find as much information as possible.<br>
<br>
The most important piece of information to enter is the ISBN number. This is a unique number that is given to books to identify them. With this number, we should be able to track down a lot of information from other sites such as book merchants.<br>
<br>
Thank you for your attention and for adding books to the library.<br>
<br>
<strong>The Librarians</strong>
			</div>
		</div>
		<br />
<!-- INCLUDE BLOCK : footer -->