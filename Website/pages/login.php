<?php
    session_start();
    include ("../pages/nav.php");
    include ("../pages/header.php");

<body>
    <h2>Log</h2>
    <form action="../scripts/login.php" method="post">
        <label class="registertext" for="username">Username:</label>
        <input class= "textboxes" type="text" name="username" id="username" required>
        <label class= "registertext" for="password">Password:</label>
        <input class= "textboxes" type="password" name="password" id="password" required>
        <button class="registerbutton" type="submit">Log</button>
        <p><label class="registertext"> Dont have an account?</p>
        <a class= "registertext" href="register.php">Register</a>
    </form>
</body>
<?php
    include ("../pages/footer.php");
?>