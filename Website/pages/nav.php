<body>
    <nav>
        <div>
            <div>
                <h1>IoT Platform</h1>
            </div>
            <div class="navB">
                <div>
                    <a id="home" href="graph.php">Graph</a>
                </div>
                <div>
                    <a id="home" href="index.php">Home</a>
                </div>
                <div>
                    <?php
                    if (isset($_SESSION["username"])) {
                        echo "<div class='dropdown'>
                                <button class='dropbtn'><img id='imguser' src='",$_SESSION["imglink"],"'>",$_SESSION["username"],"</button>
                                <div class='dropdown-content'>
                                    <a href='#'>Manage account</a>
                                    <a href='#'>Definitions</a>
                                    <hr>
                                    <a href='../scripts/logout.php'>Logout</a>
                                </div>
                                </div>";
                    } else {
                        echo "<button class='dropbtn'><a href='login.php'>Login</a></button>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
</body>
