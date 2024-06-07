<?php
session_start();
include ("header.php");
include ("nav.php");
try {
    include ("../scripts/liga_db.php");
} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage();
}
if (isset($_SESSION['error'])) {
    ?>
    <script>
        alert("<?php echo $_SESSION['error']; ?>");
    </script>
    <?php
    unset($_SESSION['error']);
}
?>
<head>
    <link rel="stylesheet" href="../css/manageac.css">
    <title>Manage Account</title>
</head>
<body>
    <div class="manageac">
        <h2>Manage Account</h2>
        <div class="manageac-container">
            <div class="manageac-item">
                <h3>Change Password</h3>
                <form action="../scripts/changeuser.php" method="POST" onsubmit="return validateFormpass()">
                    <label for="oldpass">Old Password:</label>
                    <input type="password" id="oldpass" name="oldpass" required>
                    <label for="newpass">New Password:</label>
                    <input type="password" id="newpass" name="newpass" required>
                    <label for="confirmpass">Confirm Password:</label>
                    <input type="password" id="confirmpass" name="confirmpass" required>
                    <input type="submit" value="Change Password">
                </form>
            </div>
            <div class="manageac-item">
                <h3>Change Email</h3>
                <form action="../scripts/changeuser.php" method="POST">
                    <label for="newemail">New Email:</label>
                    <input type="email" id="newemail" name="newemail" required>
                    <input type="submit" value="Change Email">
                </form>
            </div>
            <div class="manageac-item">
                <h3>Change Username</h3>
                <form action="../scripts/changeuser.php" method="POST">
                    <label for="newusername">New Username:</label>
                    <input type="text" id="newusername" name="newusername" required>
                    <input type="submit" value="Change Username">
                </form>
            </div>
            <div class="manageac-item">
                <h3>Change Profile Picture</h3>
                <form action="../scripts/changeuser.php" method="POST" enctype="multipart/form-data">
                    <label for="newprofilepic">New Profile Picture:</label>
                    <input type="file" accept="image/png" id="newprofilepic" name="newprofilepic" required>
                    <input type="submit" value="Change Profile Picture">
                </form>
            </div>
            <div class="manageac-item">
                <h3>Delete Account</h3>
                <form action="../scripts/changeuser.php" method="POST" onsubmit="return confirmDelete();">
                    <input type="submit" id="delete"value="Delete Account">
                </form>
            </div>
        </div>
    </div>
</body>
<?php
include ("footer.php");
?>