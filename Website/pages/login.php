<?php
    session_start();
    include ("../pages/nav.php");
    include ("../pages/header.php");
    include ("../scripts/iflog.php");
    ?>
<body>
    <div class="rbackground">
    <h2 class=htext>Login</h2>
    <div class= "rbacktext">
    <form action="../scripts/login.php" method="post">
        <label class="registertext" for="username">Username:</label>
        <p><input class= "textboxes" type="text" name="username" id="username" required></p>
        <p><label class= "registertext" for="password">Password:</label></p>
        <p><input class= "textboxes" type="password" name="password" id="password" required></p>
        <p><button class="registerbutton" type="submit">Login</button></p>
        <p><label class="registertext"> Dont have an account?</p>
        <a class= "registertext" href="register.php">Register</a>
    </form>
    </div>
    </div>
</body>
<?php
    include ("../pages/footer.php");
?>