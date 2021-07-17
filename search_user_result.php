<?php
    session_start();
    include "header.php";
    include "navigation.php";
?>

    <div class="container-fluid mt-3">
        <div class="jumbotron">
            <div class="row">
                <div class="col-12">
                    <h2>Search User By Name</h2>
                    <hr>
                    <table class="table table-md table-bordered bg-light">
                        <thead class="bg-dark text-light">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($_GET['username'])) {
                                    require "connection.php";
                                    $username = $_GET['username'];
                                    $sql = "SELECT * FROM users WHERE username LIKE '%$username%'";
                                    $fire = $conn->prepare($sql);
                                    $fire->execute();
                                    if ($fire->rowCount() > 0) {
                                        $results = $fire->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($results as $result) {
                                            echo '<tr>';
                                                echo '<td>'. $result['first_name'] .'</td>';
                                                echo '<td>'. $result['last_name'] .'</td>';
                                                echo '<td>'. $result['email'] .'</td>';
                                            echo '</tr>';
                                        }
                                    }
                                    else {
                                        echo '<tr><td>No User Found.</td></tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



<?php include "footer.php"; ?>