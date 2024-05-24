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
<head>
    <link rel="stylesheet" type="text/css" href="../css/style_slideshow.css">
</head>
<body>

    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="../img/main_pictures/main.png" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="../img/main_pictures/main2.png" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="../img/main_pictures/main.png" style="width:100%">
        </div>
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
    </div>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);
    </script>

    <!--About Section-->
    <div class="about">
        <div class="container">
        <div class="container-item">
            <h2>IoT Platform</h2>
            <p>IoT Platform is a platform that allows you to connect your devices to the internet and control them remotely. It is a simple and easy-to-use platform that allows you to control your devices from anywhere in the world.</p>
        </div>
        <div class="container-item">
            <h2>Features</h2>
            <ul>
                <li>Control your devices from anywhere in the world</li>
                <li>Monitor your devices remotely</li>
                <li>Set schedules for your devices</li>
                <li>Receive notifications when your devices are activated</li>
            </ul>
        </div>
    </div>
    <!--Contact Section-->
    <div class="contact">
        <div class="contact-item">
            <p>aaa</p>
        </div>
        <div class="contact-item">
            <p>Phone: 123-456-7890</p>
            <address>Address: 123 Main St, City, State, 12345</address>
            
            <a href="mailto:example@example.com">Email: example@example.com</a>
        </div>
        <div class="contact-item">
            <p>bbbbbbbbbbbbbbb</p>
        </div>
    </div>
</body>
<?php
include ("footer.php");
?>