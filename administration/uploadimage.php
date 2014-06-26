<?php
include("../config.php");

$fl = new TemplatePower("./uploadimage.tpl");

require("./header.php");

if($do_upload)
	{
	while(file_exists("$docroot/images/$type/$image_name"))
		{
		$image_name=time().$image_name;
		}
	if(move_uploaded_file($image, "$docroot/images/$type/$image_name"))
		{
		$fl->assign("_ROOT.FEEDBACK", "Image has been uploaded succesfully. Filename is $image_name");
		}
	else
		{
		$fl->assign("_ROOT.FEEDBACK", "Something went wrong while uploading the image. Extra info: $image, $image_name, $image_size, $image_type");
		}
	}

$fl->printToScreen();
?>