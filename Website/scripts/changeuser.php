<?php
    session_start();
    try {
        include ("../scripts/liga_db.php");
    } catch (\Throwable $th) {
        echo "Error: " . $th->getMessage();
    }
    if (isset($_POST['newusername'])) {
        $newusername = $_POST['newusername'];
        $username = $_SESSION['username'];
        $sql = "UPDATE users SET username = '$newusername' WHERE username = '$username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $_SESSION['username'] = $newusername;
        header("Location: ../pages/manageac.php");
    }
    if (isset($_POST['newemail'])) {
        $newemail = $_POST['newemail'];
        $username = $_SESSION['username'];
        $sql = "UPDATE users SET email = '$newemail' WHERE username = '$username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header("Location: ../pages/manageac.php");
    }
    if (isset($_POST['newpass'])) {
        $newpass = $_POST['newpass'];
        $username = $_SESSION['username'];
        $sql = "UPDATE users SET password = '$newpass' WHERE username = '$username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header("Location: ../pages/manageac.php");
    }
    if (isset($_FILES['newprofilepic'])) {
        $username = $_SESSION['username'];
        $target_dir = "../img/profilepics/";
        $target_file = $target_dir . basename($_FILES["newprofilepic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (move_uploaded_file($_FILES["newprofilepic"]["tmp_name"], $target_file)) {
            $sql = "UPDATE users SET imglink = '$target_file' WHERE username = '$username'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            header("Location: ../pages/manageac.php");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    if (isset($_POST['delete'])) {
        $username = $_SESSION['username'];
        $sql = "DELETE FROM users WHERE username = '$username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        session_destroy();
        header("Location: ../pages/index.php");
    }
?>