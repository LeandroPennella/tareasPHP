<?php

                
function procesarImagen($directorioSubida)
{
	echo "procesando imagen en"-$directorioSubida."<br/>";
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);
	               
	if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 20000)
		&& in_array($extension, $allowedExts)) 
	{
	  if ($_FILES["file"]["error"] > 0) 
	  {
	    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	  } 
	  else 
	  {
	  	/*
	    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	    echo "Type: " . $_FILES["file"]["type"] . "<br>";
	    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
	    */
		$nombreOriginal=$_FILES["file"]["name"];
    	$nombreNuevo=guid();
	    if (file_exists($directorioSubida . $nombreNuevo)) 
	    {
	      echo "<span class='error'>".$_FILES["file"]["name"] . " already exists.</span> ";
	    } 
	    else 
	    {

	      move_uploaded_file($_FILES["file"]["tmp_name"],$directorioSubida . $nombreNuevo);
	      //echo "Stored in: " . $directorioSubida. $nombreNuevo;
	      return $nombreNuevo;
	    }
	  }
	} 
	else 
	{
	  echo "Invalid file. Tipo :".$_FILES["file"]["type"]." - Tamaño :".$_FILES["file"]["size"];
	}
}

function guid(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
        return $uuid;
    }
}
?>