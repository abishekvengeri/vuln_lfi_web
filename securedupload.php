<?php
$target_dir = "uploads/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$fileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
$allowedTypes = ["jpg", "jpeg", "png", "pdf", "doc", "docx"];

if (!in_array($fileType, $allowedTypes)) {
    die("Invalid file type.");
}


$newFileName = uniqid() . "." . $fileType;
$target_file = $target_dir . $newFileName;


if ($_FILES["fileToUpload"]["size"] > 5000000) {
    die("File too large.");
}


if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "File uploaded successfully!";
} else {
    echo "Error uploading file.";
}
?>
