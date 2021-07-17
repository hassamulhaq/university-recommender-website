<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo $path ?>/index.php">University Recommendation</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <?php

            if (isset($_SESSION['user_session'])) { ?>
                <li class="nav-item float-right">
                    <a class="nav-link" href="<?php echo $path ?>/admin/index.php">Admin Dashboard</a>
                </li>
                <li class="nav-item float-right">
                    <a class="nav-link" href="<?php echo $path ?>/admin/user_manage.php">Manage User</a>
                </li>
                <li class="nav-item float-right">
                    <a class="nav-link" href="<?php echo $path ?>/admin/user_request.php">Manage Request</a>
                </li>
                <li class="nav-item float-right">
                    <a class="nav-link" href="<?php echo $path ?>/admin/university/manage_university.php">Manage Universities</a>
                </li>
                <li class="nav-item float-right">
                    <a class="nav-link" href="<?php echo $path ?>/logout.php">Logout</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>