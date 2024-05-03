<body>
    <nav>
        <div>
            <div>
                <h1>IoT Platform</h1>
            </div>
            <div class="navB">
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
