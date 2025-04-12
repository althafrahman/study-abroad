<?php
    $currentDirectory = getcwd();
    $uploadDirectory = "/uploads/";
    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['docx','pdf','doc']; // These will be the only file extensions allowed 

    if (isset($_FILES['file'])) {

       $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileTmpName  = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $result = explode('.',$fileName);
    $endResult = end($result);
    $fileExtension = strtolower($endResult);

    $uploadedFileName = time() . rand(2,5) . basename($fileName);
    $uploadPath = $currentDirectory . $uploadDirectory . $uploadedFileName; 

      if (!in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }

      if ($fileSize > 5000000) {
        $errors[] = "File exceeds maximum size (5MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
          echo "The file " . basename($fileName) . " has been uploaded";
        } else {
          echo "An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error . "These are the errors" . "\n";
        }
      }

    }
?>
