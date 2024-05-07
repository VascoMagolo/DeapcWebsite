<body>
    <nav>
        <div>
            <div>
                <h1>IoT Platform</h1>
            </div>
            <div class="navB">
                <?php
                    if ((isset($_SESSION["username"]) && ($_SESSION["type_id"] == 1))){
                        echo "<div><a id='home' href='profile.php'>Profile</a></div>";
                    }   
                ?>
                <div>
                    <a id="home" href="graph.php">Graph</a>
                </div>
                <div>
                    <a id="home" href="index.php">Home</a>
                </div>
                <div class="login">
                    <button>
                        <?php
                        if (isset($_SESSION["username"])) {
                            echo "<a href='../scripts/logout.php'>Logout</a>";
                        } else {
                            echo "<a href='login.php'>Login</a>";
                        }
                        ?>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</body>
