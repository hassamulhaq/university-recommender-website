<?php
include '../header.php';
include 'navigation.php';
?>
    <div class="container-fluid mt-2">
        <div class="p-4 mt-2 jumbotron">
            <h1>Manage User</h1>
            <br>
            <table border="0" class="table table-sm table-bordered">
                <tr>
                    <td><strong>Id</strong></td>
                    <td><strong>First Name</strong></td>
                    <td><strong>Last Name</strong></td>
                    <td><strong>Phone</strong></td>
                    <td><strong>Email</strong></td>
                    <td><strong>Gender</strong></td>
                    <td><strong>Password</strong></td>
                    <td><strong>Role</strong></td>
                    <td><strong>Status</strong></td>
                    <td><strong>Join Date</strong></td>
                    <td><strong>Action</strong></td>
                </tr>

                <?php

                require_once '../connection.php';
                $sql = "SELECT * FROM users WHERE user_role = 'user'";
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
                        echo "<td>".$result['gender']."</td>";
                        echo "<td>".$result['password']."</td>";
                        echo "<td>".$result['user_role']."</td>";
                        echo "<td>".$result['status']."</td>";
                        echo "<td>".$result['join_date']."</td>";
                        echo "<td class='btn-group'>
                                    <a class='btn btn-primary edit' href='user_edit.php?id=".$result['user_id']."&action=edit'>Edit</a>
                                    <a class='delete-button btn btn-danger delete' href='user_delete.php?id=".$result['user_id']."'>Delete</a>
                                </td>";
                        echo "</tr>";
                    }
                } else {
                    echo '<tr>';
                    echo '<td colspan="20"><h2>No User Found</h2></td>';
                    echo '</tr>';
                }

                ?>
            </table>
        </div>
    </div>



<?php include '../footer.php'; ?>