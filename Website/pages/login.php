<?php
    session_start();
    include ("../pages/nav.php");
    include ("../pages/header.php");

    
<<<<<<< Updated upstream
    ?>
=======
        /* UPDATE
        1: correu tudo bem
        0: erro na QUERY
        */
    
        /* DELETE
        1: correu tudo bem
        0: erro na QUERY
        */
    
        /* INSERT
        id: correu tudo bem
        0: erro na QUERY
        */
        
        if(isset($result->num_rows)) { // SELECT
            $arrRes = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $arrRes[] = $row;
                }
            }
            return $arrRes;
        }
        else if ($result === TRUE) { // INSERT, DELETE, UPDATE
            if($last_id = $arrConfig['conn']->insert_id) {
                return $last_id;
            }
            return 1;
        } 
        return 0;
    }
    
>>>>>>> Stashed changes
?>
<body>
    <h2>Log</h2>
    <form action="../scripts/login.php" method="post">
        <label class="registertext" for="username">Username:</label>
        <input class= "textboxes" type="text" name="username" id="username" required>
        <label class= "registertext" for="password">Password:</label>
        <input class= "textboxes" type="password" name="password" id="password" required>
        <button class="registerbutton" type="submit">Log</button>
        <p><label class="registertext"> Don't have an account?</p>
        <a class= "registertext" href="register.php">Register</a>
    </form>
    <?php
    // Your PHP code goes here
    ?>
</body>
<?php
    include ("../pages/footer.php");
?>