<!-- INCLUDE BLOCK : header -->
<br>
<br>
<table>
<tr>
<td>
<strong>Title</strong>
</td>
<td>
<strong>Date added</strong>
</td>
</tr>
<!-- START BLOCK : book -->
<tr>
<td>
{TITLE}
</td>
<td>
{ADDED}
</td>
<td>
<a href="approvebook1.php?id={ID}">start approving</a>
</td>
<td>
<a href="denybook.php?id={ID}">deny</a>
</td>
<!-- START BLOCK : exists -->
<td>
<strong>Book with this ISBN exists:</strong> <a href="{FILEROOT}/book.php/{ID}" target="_blank">{TITLE}</a> ({ADDED} / {APPROVED})
</td>
<!-- END BLOCK : exists -->
</tr>
<!-- END BLOCK : book -->
</table>
<!-- INCLUDE BLOCK : footer -->
