<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">University Recommendation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo $path ?>/index.php"> Home <span class="sr-only">(current)</span></a>
        </li>
        <?php

        if (! isset($_SESSION['user_session'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $path ?>/login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $path ?>/register.php">Sign Up</a>
            </li>
        <?php } else if (isset($_SESSION['user_session']) && $_SESSION['user_session']['user_role'] == 'admin') { ?>
            <li class="nav-item float-right">
                <a class="nav-link" href="<?php echo $path ?>/admin/index.php">Admin Dashboard</a>
            </li>
        <?php } ?>

        <?php
        if (isset($_SESSION['user_session'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="my_search_list.php">My Search List</a>
            </li>
        <?php } ?>

        <?php
        if (isset($_SESSION['user_session'])) { ?>
            <li class="nav-item float-right">
                <a class="nav-link" href="<?php echo $path ?>/logout.php">Logout</a>
            </li>
        <?php } ?>


        <?php
        if (isset($_SESSION['user_session'])) { ?>
        <li class="nav-item">
            <a class="nav-link bg-info rounded" href="profile.php">
                <?php echo $_SESSION['user_session']['first_name'] ?>
            </a>
        </li>
        <?php } ?>

    </ul>
  </div>
</nav>