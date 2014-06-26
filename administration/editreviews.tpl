<!-- INCLUDE BLOCK : header -->
<br>
<br>
<table>
<!-- START BLOCK : review -->
<tr>
<td valign="top">
{DATETIME}
</td>
<td valign="top">
{REVIEW}
</td>
<td valign="top">
{RATING}/5
</td>
<td valign="top">
<a href="{FILEROOT}/user.php/{UID}" target="_blank">{UNAME}</a>
</td>
<td valign="top">
<a href="{FILEROOT}/book.php/{BID}" target="_blank">{BOOK}</a>
</td>
<td>
<a href="editreviews.php?empty=yes&rid={ID}">delete review / keep rating</a>
</td>
<td>
<a href="editreviews.php?delete=yes&rid={ID}">delete review and rating</a>
</td>
</tr>
<!-- END BLOCK : review -->
</table>
<!-- INCLUDE BLOCK : footer -->
