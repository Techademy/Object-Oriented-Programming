<!-- INCLUDE BLOCK : header -->

<h1>Edit a book</h1>
<table>
<tr>
<td valign="top">
<table>
<!-- START BLOCK : author -->
<tr>
<td valign="top">
<strong>Author {NUM}</strong>
</td>
<td valign="top">
{AUTHOR}
</td>
<td valign="top">
<form method="post" action="editbookauthors.php">
<input type="hidden" name="id" value="{ID}">
<input type="hidden" name="del_id" value="{DEL_ID}">
<input type="submit" name="deleteauthor" value="Delete" class="knop">
</form>
</td>
</tr>
<!-- END BLOCK : author -->
<tr>
<td valign="top">
&nbsp;
</td>
<td valign="top">
<form method="post" action="editbookauthors.php">
<select name="addauthorselect">
<!-- START BLOCK : addauthor -->
<option value="{AID}">{ANAME}</option>
<!-- END BLOCK : addauthor -->
</select>
</td>
<td valign="top">
<input type="hidden" name="id" value="{ID}">
<input type="submit" name="addauthor" value="Add Author" class="knop">
</form>
</td>
</tr>

<tr>
<td valign="top">
&nbsp;
</td>
<td valign="top" colspan="2">
<form method="post" action="bookadmin.php">
<input type="submit" name="step3complete" value="Ready >>" class="knop">
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
</td>
</tr>
</table>
<!-- INCLUDE BLOCK : footer -->
