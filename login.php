<?php
    include "header.php";
    include "navigation.php";
?>

<div align="center" style="padding: 10px">
    <?php
    if (isset($_GET['status']) && $_GET['status'] == 'error'){
        echo '<br>';
        echo "<h2 class='alert alert-danger'>Wrong Email or Password</h2>";
    }
    ?>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="jumbotron">
                <h1>Login Form</h1>
                <hr>
                <form action="login_check.php" method="post">
                    <div class="form-group">
                        <label for="Email">Email: </label>
                        <input type="text" class="form-control" name="email" size="50" required/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password" class="form-control" name="password" size="50" required/>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-dark" type="submit" name="submit" value="Login" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>