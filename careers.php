<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = htmlspecialchars($_POST['name']);
    $email    = htmlspecialchars($_POST['email']);
    $phone    = htmlspecialchars($_POST['phone']);
    $position = htmlspecialchars($_POST['position']);

    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileTmpPath = $_FILES['resume']['tmp_name'];
    $fileName    = basename($_FILES['resume']['name']);
    $uploadPath  = $uploadDir . time() . "_" . $fileName;

    if (move_uploaded_file($fileTmpPath, $uploadPath)) {
        $status = "Resume uploaded";
    } else {
        $status = "Resume not uploaded";
        $uploadPath = "Not uploaded";
    }

    $data = "Name: $name\nEmail: $email\nPhone: $phone\nPosition: $position\nResume: $uploadPath\n------------------\n";
    file_put_contents("careers.txt", $data, FILE_APPEND | LOCK_EX);

    echo "<script>alert('Application submitted successfully!'); window.location.href='index.html';</script>";
    exit();
}
?>
