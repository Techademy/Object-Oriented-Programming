<!-- INCLUDE BLOCK : header -->
<br>
<br>
<table>
<tr>
<td>
<strong>Quote</strong>
</td>
<td>
<strong>Errortype</strong>
</td>
</tr>
<!-- START BLOCK : error -->
<tr>
<td valign="top">
{QUOTE}
</td>
<td valign="top">
{TYPE}
</td>
<td>
<a href="editerror.php?id={ID}">edit error</a>
</td>
<td>
<a href="deleteerror.php?id={ID}">delete</a>
</td>
</tr>
<!-- END BLOCK : error -->
<tr>
<td>
<br>
</td>
</tr>
<tr>
<td colspan="4">
<strong>New Error</strong><br>
<br>
<form method="post" action="error.php">
<strong>Error:</strong><br>
<textarea name="error" cols="25" rows="3"></textarea>
</td>
</tr>
<tr>
<td colspan="4">
<strong>Source:</strong><br>
<input type="text" name="source">
</td>
</tr>
<tr>
<td colspan="4">
<strong>Type of Error:</strong><br>
<select name="type">
<option value="404">404 File not Found</option>
<option value="401">401 Not Authorized</option>
</select>
</td>
</tr>
<tr>
<td colspan="4">
<input type="submit" name="submiterror" value="Add Error >>" class="knop">
</td>
</tr>

</table>
<!-- INCLUDE BLOCK : footer -->
