<header>
    <div class="header-container">
        
        <!-- logo -->
        <a href="<?php echo BASE_URL . '/index.php' ?>" class="logo">
            <h1 class="logo-text"> <span>mind</span>Quiz</h1>
        </a>
        <!-- login -->
        <ul class="user">
            <?php if (isset(($_SESSION['id']))): ?>
                <li>
                    
                    <a href="#">
                        <i class="bi bi-person-fill"></i>
                        <?php echo $_SESSION['username']; ?>
                        <i class="bi bi-chevron-down" 
                            style="font-size: 0.8em;"></i>
                    </a>
                    <ul class="dropdown">
                        <li><a href="<?php echo BASE_URL . "/member/dashboard.php" ?>">Dashboard</a></li>
                        <li><a href="<?php echo BASE_URL . "/logout.php" ?>" class="logout">logout</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="<?php echo BASE_URL . "/register.php" ?>">Sign Up</a></li>
                <li><a href="<?php echo BASE_URL . "/login.php" ?>">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</header>