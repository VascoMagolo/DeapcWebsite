<?php
    session_start();
    include ("../pages/nav.php");
    include ("../pages/header.php");
?>
<body>
    <h2>Log</h2>
    <form action="../scripts/login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Log</button>
        <p>Don't have an account?</p>
        <a href="register.php">Register</a>
    </form>
    <?php
    // Your PHP code goes here
    ?>
</body>
<?php
    include ("../pages/footer.php");
?>