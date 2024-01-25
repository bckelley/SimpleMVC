<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <!-- Brand Logo and Link -->
        <a class="navbar-brand" href="<?php echo URL_ROOT ?>"><?php echo SITENAME ?></a>

        <!-- Navbar Toggler Button for Responsive Design -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topNavbarMain" aria-controls="topNavbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php
            // TODO: Add bootstrap active class dynamically based on the current page
        ?>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="topNavbarMain">
            <ul class="navbar-nav mr-auto">
                <!-- Home Link -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROOT ?>">Home</a>
                </li>
                
                <!-- About Link -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROOT ?>/pages/about">About</a>
                </li>
                
                <!-- Posts Link -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL_ROOT ?>/posts/">Posts</a>
                </li>
            </ul>

            <!-- Right-aligned Navbar Links -->
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['userId'])) : ?>
                    <!-- Logout Link if User is Logged In -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL_ROOT ?>/users/logout">Logout</a>
                    </li>
                <?php else : ?>
                    <!-- Register and Login Links if User is Not Logged In -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL_ROOT ?>/users/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL_ROOT ?>/users/login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>