<?php
include '../header.php';
include 'navigation.php';
?>
    <div class="container-fluid mt-2">
        <div class="mt-2 p-4 jumbotron">
            <h1>Manage Requests</h1>
            <br>
            <table border="0" class="table table-sm table-bordered">
                <tr>
                    <td><strong>Id</strong></td>
                    <td><strong>First Name</strong></td>
                    <td><strong>Last Name</strong></td>
                    <td><strong>Phone</strong></td>
                    <td><strong>Email</strong></td>
                    <td><strong>Join Date</strong></td>
                    <td><strong>Request</strong></td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>

                <?php

                require_once '../connection.php';
                $sql = "SELECT * FROM users WHERE user_role = 'user' AND status = 'pending' ";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                // rowCount() check how many rows are exits in database.
                if ($stmt->rowCount() > 0) {
                    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>".$result['user_id']."</td>";
                        echo "<td>".$result['first_name']."</td>";
                        echo "<td>".$result['last_name']."</td>";
                        echo "<td>".$result['phone']."</td>";
                        echo "<td>".$result['email']."</td>";
                        echo "<td>".$result['join_date']."</td>";
                        echo "<td>
                                    <a class='btn btn-success edit' href='request_approve.php?id=".$result['user_id']."'>Approve</a>
                                    <a class='btn btn-danger delete' href='request_reject.php?id=".$result['user_id']."'>Reject</a>
                                </td>";
                        echo "</tr>";
                    }
                } else {
                    echo '<tr>';
                    echo '<td colspan="20"><h4>No Request Found</h4></td>';
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
<?php include '../footer.php'; ?>