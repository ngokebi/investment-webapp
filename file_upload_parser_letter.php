<?php
date_default_timezone_set('Africa/Lagos');

$fileName2 = $_FILES["statement"]["name"]; // The file name
$fileTmpLoc2 = $_FILES["statement"]["tmp_name"]; // File in the PHP tmp folder
$fileType2 = $_FILES["statement"]["type"]; // The type of file it is
$fileSize2 = $_FILES["statement"]["size"]; // File size in bytes
$fileErrorMsg2 = $_FILES["statement"]["error"]; // 0 for false... and 1 for true

$fileNameArray2 = explode('.', $fileName2);
$fileExtension2 = $fileNameArray2[count($fileNameArray2)-1];

if (!$fileTmpLoc2) { // if file not chosen
    // echo "ERROR: Please browse for a file before clicking the upload button.".$fileTmpLoc;
    error_log($fileName2);
    echo "failed";
    exit();
}
// if(move_uploaded_file($fileTmpLoc, "test_uploads/".$_POST['file_name'].'.'.$fileExtension)){
if(move_uploaded_file($fileTmpLoc2, "uploads/".$_POST['file_name'].'.'.$fileExtension2)){
    echo "$fileName2 upload is complete";
} else {
    echo "failed";
    // echo $_POST['file_name'].':: file_name ::'.$fileExtension;
}

?>
