<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <h2 style="color: black; font-weight:bold"> PERSONAL LEARNING ASSISTANT</h2>
            </li>
            <li>
                <div>
                    <a href=""> <h6 style="color: black; margin-left: 600px; margin-top: 10px; font-weight: bold">
                    <?php
                        session_start();
                        echo $_SESSION['username'];
                    ?>
                    </h6></a>
                </div>
            </li>
            <li>
                <div>
                    <a href="index.php"> <h6 style="color: black; margin-left: 10px; margin-top: 10px">Log out</h6></a>
                </div>
            </li>
    </nav>