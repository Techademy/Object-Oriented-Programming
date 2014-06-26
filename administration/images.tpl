<!-- INCLUDE BLOCK : header -->

<h1>Upload an image</h1>

<form method="post" action="uploadimage.php" enctype="multipart/form-data">
<table>
<tr>
<td valign="top"><strong>Image</strong></td>
<td valign="top"><input type="file" name="image" class="knop"></td>
</tr>
<tr>
<td valign="top"><strong>Image Type</strong></td>
<td valign="top"><select name="type"><option value="books">Book</option><option value="authors">Author</option><option value="publishers">Publisher</option></select></td>
</tr>
<tr>
<td valign="top">&nbsp;</td>
<td valign="top"><input type="submit" name="do_upload" value="OK" class="knop"></td>
</tr>
</table>

</form>
<!-- INCLUDE BLOCK : footer -->
