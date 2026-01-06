<?php
// admin/file_handler.php

function uploadImage($file) {
    // 1. Check if a file was actually uploaded
    if (!isset($file['name']) || $file['name'] == "") {
        return "default.png"; // Return a default image if none selected
    }

    // 2. Define the target directory (Going back one level from 'admin' to 'uploads')
    $targetDir = "../../uploads/";

    // 3. Generate a unique name: time + original name to prevent duplicates
    $fileName = time() . "_" . basename($file['name']);
    $targetFile = $targetDir . $fileName;

    // 4. Move the file
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return $fileName; // Success: Return the new name to save in DB
    } else {
        return "default.png"; // Failed: Return default
    }
}
?>