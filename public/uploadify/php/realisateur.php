<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/Blog/web/bundles/eopblog/images/realisateurs/'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES)){// && $_POST['token'] == $verifyToken) {
    
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	echo "extention : ".$fileParts['extension']."<br>target : ".$targetFile."<br>";
        
        $newName=rtrim($targetPath,'/') . '/' . str_replace(' ','',$_GET['nom'])."_100.".$fileParts['extension'];
        
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$newName);
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
?>