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
				collection
			</div>
			<div class="block">
<!-- START BLOCK : collection -->
{HAVENUMBER} user{HS} {HAVE} this book<br>
{WANTNUMBER} user{WS} {WANT} this book 
<!-- START BLOCK : who -->
(<a href="{FILEROOT}/wanted.php/{BID}">who?</a>)
<!-- END BLOCK : who -->
<br>
<br>
<!-- START BLOCK : useraddhave -->
<a href="{FILEROOT}/have.php/{BID}">add this book to my collection</a><br>
<!-- END BLOCK : useraddhave -->
<!-- START BLOCK : userhave -->
this book is in your collection<br>
<!-- END BLOCK : userhave -->
<!-- START BLOCK : useraddwant -->
<a href="{FILEROOT}/want.php/{BID}">add this book to my wantlist</a>
<!-- END BLOCK : useraddwant -->
<!-- START BLOCK : userwant -->
this book is currently on your wantlist
<!-- END BLOCK : userwant -->

<!-- END BLOCK : collection -->

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
				{TITLE}
			</div>
			<div class="maincontent">
<!-- START BLOCK : feedback -->
{FEEDBACK}
<!-- END BLOCK : feedback -->

<!-- START BLOCK : bookinfo -->
<table>
<tr>
<td valign="top" width="105">
<table cellpadding="3" cellspacing="3">
<tr>
<td>
<!-- START BLOCK : image -->
<img src="{FILEROOT}/images/books/{IMAGE}" alt="{TITLE}"><br />
<!-- END BLOCK : image -->
<a href="http://www.amazon.com/exec/obidos/ASIN/{ASIN}/fantasylibrary-20" target="_blank" class="amazon">buy @ amazon.com</a><br>
<a href="http://www.amazon.co.uk/exec/obidos/ASIN/{ASIN}/electronicmus-21" target="_blank" class="amazon">buy @ amazon.co.uk</a><br>
</td>
</tr>
</table>
</td>
<td valign="top" align="left">
<!-- START BLOCK : author -->
<a href="{FILEROOT}/author.php/{AID}">{AUTHOR}</a><br>
<!-- END BLOCK : author -->
<br>
<!-- START BLOCK : world -->
<a href="{FILEROOT}/theme.php/{WID}">{WORLD}</a><br>
<!-- END BLOCK : world -->
published {PUBDATE}<br>
<!-- START BLOCK : publisher -->
by <a href="{FILEROOT}/publisher.php/{PID}">{PUBLISHER}</a><br>
<!-- END BLOCK : publisher -->
ISBN: {ISBN}<br>
category: <a href="{FILEROOT}/books.php/{CID}">{CATEGORY}</a><br>
language: {LANG}<br>
type: {TYPE}<br>
added: {ADDED} by <a href="{FILEROOT}/user.php/{UID}">{SUBMITTER}</a><br>
approved: {APPROVED}<br>
rating: 
<!-- START BLOCK : bookrate -->
{RATING}/5
<!-- END BLOCK : bookrate -->
<!-- START BLOCK : nobookrate -->
This book hasn't been rated yet
<!-- END BLOCK : nobookrate -->
<br>
</td>
</tr>
<tr>
<td valign="top" colspan="2">
<strong>Summary</strong><br>
<br>
<em>{SUMMARY}</em><br>
</td>
</tr>
</table>
<!-- END BLOCK : bookinfo -->


			</div>
		</div>
      </td>
      <td valign="top" width="10">
      &nbsp;
      </td>
      <td valign="top">
		<div class="right">
			<div class="blockheader">
				comment
			</div>
			<div class="rightblock">
<!-- START BLOCK : commentform -->
<strong>Rate (and review)</strong><br>
<form method="post" action="{FILEROOT}/rate.php">
<input type="hidden" name="bid" value="{BID}"><br>
My rating:<br>
<input type="radio" name="rating" value="1" class="radio"> 1<br>
<input type="radio" name="rating" value="2" class="radio"> 2<br>
<input type="radio" name="rating" value="3" class="radio"> 3<br>
<input type="radio" name="rating" value="4" class="radio"> 4<br>
<input type="radio" name="rating" value="5" class="radio"> 5<br>
<br>
My review (optional):
<textarea name="review" rows="4" cols="15" class="sidearea"></textarea><br>
<input type="submit" name="submitrating" value="Rate this book" class="sidearea">
</form><br>
<br>
<!-- END BLOCK : commentform -->
<!-- START BLOCK : alreadyrated -->
You have already rated this book. Your rating of this book is <strong>{RATING}</strong>/5<br>
<br>
<!-- END BLOCK : alreadyrated -->
<!-- START BLOCK : loggedoutcommentform -->
You need to be logged in to rate and review books. Don't have an account yet? <a href="{FILEROOT}/signup.php">Sign up!</a><br>
<br>
<!-- END BLOCK : loggedoutcommentform -->
<!-- START BLOCK : mostrecentcomments -->
<br>
<strong>Most recent rating{S}</strong><br>
<!-- END BLOCK : mostrecentcomments -->
<!-- START BLOCK : comment -->
Rating: <strong>{RATING}</strong>/5<br>
<!-- START BLOCK : review -->
<em>{REVIEW}</em><br>
<!-- END BLOCK : review -->
by <a href="{FILEROOT}/user.php/{UID}">{USER}</a> on {DATETIME}<br>
<br>
<!-- END BLOCK : comment -->
<!-- START BLOCK : morecommentslink -->
<a href="{FILEROOT}/ratings.php/{BID}">more ratings/reviews...</a>
<!-- END BLOCK : morecommentslink -->
<br />
			</div>
		</div>
		<br />
<!-- INCLUDE BLOCK : footer -->