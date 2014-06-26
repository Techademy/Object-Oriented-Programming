<!-- INCLUDE BLOCK : header -->

<h1>Approve a book</h1>
<table>
<tr>
<td valign="top">
<form method="post" action="approvebook2.php">
<input type="hidden" name="id" value="{ID}">
<table>
<tr>
<td valign="top">
<strong>Title</strong>
</td>
<td valign="top">
<input type="text" name="title" value="{TITLE}">
</td>
</tr>
<tr>
<td valign="top">
<strong>Summary</strong>
</td>
<td valign="top">
<textarea name="summary" rows="4" cols="40">{SUMMARY}</textarea>
</td>
</tr>
<tr>
<td valign="top">
<strong>ISBN</strong>
</td>
<td valign="top">
<input type="text" name="isbn" value="{ISBN}">
</td>
</tr>
<tr>
<td valign="top">
<strong>Date of Publishing</strong>
</td>
<td valign="top">
<input type="text" name="pubdate" value="{PUBDATE}">
</td>
</tr>
<tr>
<td valign="top">
<strong>Publisher</strong>
</td>
<td valign="top">
<select name="publisher">
<!-- START BLOCK : publisher -->
<option value="{PID}" {SELECTED}>{PUBNAME}</option>
<!-- END BLOCK : publisher -->
</select>
</td>
</tr>
<tr>
<td valign="top">
<strong>Theme</strong>
</td>
<td valign="top">
<select name="theme">
<option value="">None</option>
<!-- START BLOCK : theme -->
<option value="{TID}" {SELECTED}>{THEMENAME}</option>
<!-- END BLOCK : theme -->
</select>
</td>
</tr>
<tr>
<td valign="top">
<strong>Category</strong>
</td>
<td valign="top">
<select name="category">
<!-- START BLOCK : category -->
<option value="{CID}" {SELECTED}>{CATNAME}</option>
<!-- END BLOCK : category -->
</select>
</td>
</tr>
<tr>
<td valign="top">
<strong>Type</strong>
</td>
<td valign="top">
<select name="type">
<!-- START BLOCK : type -->
<option value="{TYPENAME}" {SELECTED}>{TYPENAME}</option>
<!-- END BLOCK : type -->
</select>
</td>
</tr>
<tr>
<td valign="top">
<strong>Language</strong>
</td>
<td valign="top">
<select name="language">
<!-- START BLOCK : language -->
<option value="{LANGNAME}" {SELECTED}>{LANGNAME}</option>
<!-- END BLOCK : language -->
</select>
</td>
</tr>
<tr>
<td valign="top">
&nbsp;
</td>
<td valign="top">
<input type="submit" name="step1complete" value="Next Step >>" class="knop">
</td>
</tr>
</table>
</form>
</td>
<td valign="top">
<a href="http://www.amazon.com/exec/obidos/ASIN/{ASIN}/electronicmus-20" target="_blank">check on amazon.com</a><br>
<a href="http://my.linkbaton.com/isbn/" target="_blank">check on linkbaton</a> (<strong>{ASIN}</strong>)<br>
<br>
<strong>General Information</strong><br>
<br>
Submitting User: <a href="{FILEROOT}/user.php/{UID}" target="_blank">{UNAME}</a><br>
Date & Time of Addition: {ADDED}<br>
System will notify user: {NOTIFY}<br>
</td>
</tr>
</table>
<!-- INCLUDE BLOCK : footer -->
