<?php
    include "header.php";
    include "navigation.php";
?>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
            <h2>Search User By Name:</h2>
            <hr>
                <form action="search_user_result.php" method="get">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Search user by name..." required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-dark" value="Search">
                    </div>
                </form>
            </div>
        </div>
    </div>


    
<?php include "footer.php"; ?>