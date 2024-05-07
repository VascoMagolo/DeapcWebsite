<?php
include("header.php");
include("nav.php");
?>
<body>
    <h2>Register</h2>
    <form action="../scripts/register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" id="firstname" required>
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" id="lastname" required>
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required>
        <button type="submit">Register</button>
        <p>Already have an account?</p>
        <a href="login.php">Login</a>
    </form>
</body>
<?php
include("footer.php");
?>