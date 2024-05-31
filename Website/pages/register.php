<?php
include("header.php");
include("nav.php");
?>
<body>
    <div class="rbackground">
    <h2>Register</h2>
    <div class= "rbacktext">
    <form action="../scripts/register.php" method="post">
        <label class= "registertext" for="username">Username:</label>
        <p></p>
        <input class="textboxes" type="text" name="username" id="username" required>
        <p></p>
        <label class= "registertext" for="password">Password:</label>
        <p></p>
        <input class="textboxes" type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <p></p>
        <label class= "registertext" for="email">Email:</label>
        <p></p>
        <input class="textboxes" type="email" name="email" id="email" required>
        <p></p>
        <label class= "registertext" for="firstname">First Name:</label>
        <p></p>
        <input class="textboxes" type="text" name="firstname" id="firstname" required>
        <p></p>
        <label class= "registertext" for="lastname">Last Name:</label>
        <p></p>
        <input class="textboxes" type="text" name="lastname" id="lastname" required>
        <p></p>
        <label class= "registertext" for="age">Age:</label>
        <p></p>
        <input class="textboxes" type="number" name="age" id="age" required>
        <p></p>
        <label class= "registertext" for="address">Address:</label>
        <p></p>
        <input class="textboxes" type="text" name="address" id="address" required>
        <p></p>
        <button class="registerbutton" type="submit">Register</button>
        <p> 
            <label class= "registertext">  Already have an account? </label></p>
        <a class= "registertext"  href="login.php">Login</a>
    </form>
</div>
</div>
</body>
<?php
include("footer.php");
?>