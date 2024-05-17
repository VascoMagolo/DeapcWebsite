<body>
    <nav>
        <div>
            <div>
                <h1>IoT Platform</h1>
            </div>
            <div class="navB">
                <?php
                if (isset($_SESSION["username"])) {
                        echo "<div>
                        <a id='home' href='graph.php'>Graph</a>
                    </div>";
                }
                ?>
            
                <div>   
                <?php
                    if (isset($_SESSION["username"]) && $_SESSION['type_id'] == 1) {
                        echo "<a id='home' href='users.php' style='color: red; margin-right: 10px;'>Users</a>";
                    } else 
                    ?>
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
                                    <a href='../pages/manageac.php'>Manage account</a>
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
