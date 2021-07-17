<?php
include '../../../header.php';
include '../../navigation.php';
?>
    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col-12 m-auto">
                <div class="jumbotron">
                    <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'success') {
                        echo '<h6 class="alert alert-success">Added.</h6>';
                    } elseif(isset($_GET['status']) && $_GET['status'] == 'error') {
                        echo '<h6 class="alert alert-danger">Data not added.</h6>';
                    } elseif(isset($_GET['status']) && $_GET['status'] == 'deleted') {
                        echo '<h6 class="alert alert-success">Data deleted.</h6>';
                    }
                    ?>
                    <h2>Universities and admissions details</h2>
                    <br>
                    <form action="university_admission_details_submit.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Choose University</label>
                                    <select class="form-control" name="university_id" required>
                                        <option value="" disabled selected>Choose University</option>
                                        <?php
                                        require_once '../../../connection.php';
                                        $sql = "SELECT * FROM universities ORDER BY university_id DESC";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        if ($stmt->rowCount() > 0) {
                                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                echo '<option value="'.$result["university_id"].'">'.$result["university_name"].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Choose Season</label>
                                    <select class="form-control" name="season" required>
                                        <option value="" disabled selected>Choose Season</option>
                                        <option value="Spring">Spring</option>
                                        <option value="Fall">Fall</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <label for="">Admission Start Date</label>
                                <input type="date" class="form-control" name="start_date" required>
                            </div>
                            <div class="col-2">
                                <label for="">Admission Close Date</label>
                                <input type="date" class="form-control" name="end_date" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea name="details" class="form-control" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <br>
                                    <input type="submit" name="submit" class="btn btn-dark" value="Save">
                                </div>
                            </div>
                        </div>
                    </form>


                    <hr>
                    <h2>Universities and admissions details</h2>
                    <table border="0" class="table table-sm table-bordered table-secondary">
                        <tr>
                            <td><strong>Id</strong></td>
                            <td><strong>University Name</strong></td>
                            <td><strong>Season</strong></td>
                            <td><strong>Start Date</strong></td>
                            <td><strong>End Date</strong></td>
                            <td><strong>Details</strong></td>
                            <td><strong>Action</strong></td>
                        </tr>

                        <?php
                        require_once '../../../connection.php';
                        $sql = "SELECT * FROM admission_details ORDER BY admission_id DESC";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        // rowCount() check how many rows are exits in database.
                        if ($stmt->rowCount() > 0) {
                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>".$result['admission_id']."</td>";
                                //echo "<td>".$result['university_id']."</td>";
                                $university_sql = "SELECT university_name FROM universities WHERE university_id='".$result['university_id']."' ";
                                $university_stmt = $conn->prepare($university_sql);
                                $university_stmt->execute();
                                $university_result = $university_stmt->fetch(PDO::FETCH_ASSOC);
                                echo "<td>".$university_result['university_name']."</td>";

                                echo "<td>".$result['season']."</td>";

                                echo "<td>".$result['start_date']."</td>";
                                echo "<td>".$result['end_date']."</td>";
                                echo "<td>".$result['details']."</td>";
                                echo "<td>
                                            <a class='delete-button btn btn-danger btn-sm delete' href='delete_admission_details.php?id=".$result['admission_id']."'>Delete</a>
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
        </div>
    </div>


<?php include '../../../footer.php'; ?>