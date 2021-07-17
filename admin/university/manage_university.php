<?php
include '../../header.php';
include '../navigation.php';
?>
    <div class="container-fluid mt-2">
        <div class="mt-2 p-4 jumbotron">
            <?php
            if (isset($_GET['status']) && $_GET['status'] == 'success') {
                echo '<h6 class="alert alert-success">University added.</h6>';
            } elseif(isset($_GET['status']) && $_GET['status'] == 'error') {
                echo '<h6 class="alert alert-danger">University not added.</h6>';
            } elseif(isset($_GET['status']) && $_GET['status'] == 'updated') {
                echo '<h6 class="alert alert-success">University updated.</h6>';
            }
            ?>
            <h1 class="float-left">Manage Universities</h1>
            <a href="add_university.php" class="btn btn-dark float-right">Add University</a>
            <br>
            <table border="0" class="table table-sm table-bordered">
                <tr>
                    <td><strong>Id</strong></td>
                    <td><strong>Image</strong></td>
                    <td><strong>Name</strong></td>
                    <td><strong>Founded</strong></td>
                    <td><strong>Website</strong></td>
                    <td><strong>Phone</strong></td>
                    <td><strong>Campus</strong></td>
                    <td><strong>Hours</strong></td>
                    <td><strong>Details</strong></td>
                    <td><strong>Created Date</strong></td>
                    <td><strong>Action</strong></td>
                </tr>

                <?php

                require_once '../../connection.php';
                $sql = "SELECT * FROM universities ORDER BY university_id DESC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                // rowCount() check how many rows are exits in database.
                if ($stmt->rowCount() > 0) {
                    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$result['university_id']."</td>";
                        echo "<td><img src='../../images/".$result['image']."' height='40'></td>";
                        echo "<td>".$result['university_name']."</td>";
                        echo "<td>".$result['founded']."</td>";
                        echo "<td>".$result['website']."</td>";
                        echo "<td>".$result['phone']."</td>";
                        echo "<td>".$result['campus']."</td>";
                        echo "<td>".$result['hours']."</td>";
                        echo "<td>".$result['details']."</td>";
                        echo "<td>".$result['created_at']."</td>";
                        echo "<td class='btn-group'>
                                    <a class='btn btn-dark edit' href='edit_university.php?id=".$result['university_id']."'>Edit</a>
                                    <a class='delete-button btn btn-danger delete' href='delete_university.php?id=".$result['university_id']."'>Delete</a>
                                </td>";
                        echo "</tr>";
                    }
                } else {
                    echo '<tr>';
                    echo '<td colspan="20"><h2>No Data Found</h2></td>';
                    echo '</tr>';
                }

                ?>
            </table>
        </div>
    </div>


    <script>
        $(document).on('click', '.delete', function () {
            var check_confirm = confirm('Delete this Record?');
            if (check_confirm === true) {
                return true;
            }
            else {
                return false;
            }
        });
    </script>
<?php include '../../footer.php'; ?>