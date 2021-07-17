<?php
include '../../../header.php';
include '../../navigation.php';
?>
    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col-8 m-auto">
                <div class="jumbotron">
                    <h2>Add Program</h2>
                    <form action="program_submit.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="program_name" value="" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-dark" name="submit" value="Add">
                        </div>
                    </form>

                    <hr>

                    <table class="table table-sm table-bordered table-secondary">
                        <tr>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                        <tbody>
                        <?php
                            require_once '../../../connection.php';
                            $sql = "SELECT * FROM programs ORDER BY program_id DESC";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) {
                                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . $result['program_name'] . "</td>";
                                    echo "<td>
                                            <a class='delete-button btn btn-danger btn-sm delete' href='delete_program.php?id=" . $result['program_id'] . "'>Delete</a>
                                          </td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php include '../../../footer.php'; ?>