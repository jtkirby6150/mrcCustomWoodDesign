<nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background: rgba(255,255,255,0.58);">
    <div class="container"><a class="navbar-brand" href="../index.php">MRC Custom Wood Design</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="../index.php"><strong>Home</strong></a></li>
                <li class="nav-item"><a class="nav-link" href="../gallery.php"><strong>Gallery</strong></a></li>
<!--                <li class="nav-item"><a class="nav-link" href="../aboutus.php"><strong>About Us</strong></a></li>-->
                <li class="nav-item"><a class="nav-link" href="../contactus.php"><strong>Contact Us</strong></a></li>
                <?php
                if(isset($_SESSION['username'])){
                    $username = strtoupper($_SESSION['username']);
                    echo "<li class='nav-item dropdown'><a class='dropdown-toggle nav-link' data-toggle='dropdown' aria-expanded='false' href='#'><strong>Welcome, $username</strong></a>
                    <div class='dropdown-menu'>
                    <a class='dropdown-item' href='admin.php'>Dashboard</a>
                    <a class='dropdown-item' href='logout.php'>Logout</a>
                </li>";
                }
                ?>

            </ul>
        </div>
    </div>
</nav>