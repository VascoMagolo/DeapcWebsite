<?php
    session_start();
    include ("../pages/nav.php");
    include ("../pages/header.php");

    function my_query($sql, $debug=0) {
        global $arrConfig;
        if($debug) echo $sql;
        $result = $arrConfig['conn']->query($sql);
        
        /* SELECT
        mysqli_result Object
        (
            [current_field] => 0
            [field_count] => 5
            [lengths] => 
            [num_rows] => 3
            [type] => 0
        )
        */
    
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
    ?>
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