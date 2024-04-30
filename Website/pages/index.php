<?php
    include ("header.php");
    include ("nav.php");
    try {
        include ("../scripts/liga_db.php");
    } catch (\Throwable $th) {
        echo "Error: " . $th->getMessage();
    }
    ?>
<body>
    <h1>Welcome to My Website</h1>
    <button><a href="login.php">Click to log</a></button>
    <?php
    //for php code
    ?>
    
    <!--Contacts Section-->
    <section>
        <h2>Contacts</h2>
        <p>Phone: 123-456-7890</p>
        <p>Email:-----</p>
    </section>
</body>
<?php
include ("footer.php");
?>