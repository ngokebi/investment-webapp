<?php
date_default_timezone_set('Africa/Lagos');

$fileName = $_FILES["statement"]["name"]; // The file name
$fileTmpLoc = $_FILES["statement"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["statement"]["type"]; // The type of file it is
$fileSize = $_FILES["statement"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["statement"]["error"]; // 0 for false... and 1 for true

$fileNameArray = explode('.', $fileName);
$fileExtension = $fileNameArray[count($fileNameArray)-1];

if (!$fileTmpLoc) { // if file not chosen
    // echo "ERROR: Please browse for a file before clicking the upload button.".$fileTmpLoc;
    error_log($fileName);
    echo "failed";
    exit();
}
// if(move_uploaded_file($fileTmpLoc, "test_uploads/".$_POST['file_name'].'.'.$fileExtension)){
if(move_uploaded_file($fileTmpLoc, "uploads/".$_POST['file_name'].'.'.$fileExtension)){
    echo "$fileName upload is complete";
} else {
    echo "failed";
    // echo $_POST['file_name'].':: file_name ::'.$fileExtension;
}

?>
