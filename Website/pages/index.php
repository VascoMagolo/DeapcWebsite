<?php
    session_start();
    include ("header.php");
    include ("nav.php");
    try {
        include ("../scripts/liga_db.php");
    } catch (\Throwable $th) {
        echo "Error: " . $th->getMessage();
    }
    ?>
<body>
    <div>
        <img src="../img/main.png" alt="main">
    </div>
    <p>
        <?php
            if (isset($_SESSION["name"])){
                echo "Welcome " . $_SESSION["name"];
            }
        ?>
    </p>
    <!--About Section-->
    <div class="about">
        <h2>About</h2>
        <p>IoT Platform is a platform that allows you to connect your devices to the internet and control them remotely. It is a simple and easy-to-use platform that allows you to control your devices from anywhere in the world.</p>
        <div class="container">
            <div class="container-item">
                </div>
                <div class="container-item"></div>
                <div class="container-item"></div>
            </div>
    </div>
    <!--Contact Section-->
    <div class="contact">
        <div class="contact-item">
            
        </div>
        <div class="contact-item">
            <p>Phone: 123-456-7890</p>
            <p>Email:-----</p>
        </div>
        <div class="contact-item">bbbbbbbbbbbbbbb</div>
    </div>
</body>
<?php
include ("footer.php");
?>