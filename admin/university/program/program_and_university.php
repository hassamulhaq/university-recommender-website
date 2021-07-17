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
                    } elseif(isset($_GET['status']) && $_GET['status'] == 'already_exists') {
                        echo '<h6 class="alert alert-warning">This program is already assigned to selected university.</h6>';
                    }
                    ?>
                    <h2>Programs and details</h2>
                    <br>
                    <form action="program_and_university_submit.php" method="post">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Choose University</label>
                                    <select class="form-control" name="university_id" required>
                                        <option value="" disabled selected>Choose University</option>
                                        <?php
                                        require_once '../../../connection.php';
                                        $sql = "SELECT * FROM universities";
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
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Choose Program</label>
                                    <select class="form-control" name="program_id" required>
                                        <option value="" disabled selected>Choose Program</option>
                                        <?php
                                        require_once '../../../connection.php';
                                        $sql = "SELECT * FROM programs ORDER BY program_id DESC";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        if ($stmt->rowCount() > 0) {
                                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                echo '<option value="'.$result["program_id"].'">'.$result["program_name"].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <label>Merit of this program</label>
                                <input type="number" min="0" max="100" class="form-control" name="merit" required placeholder="Merit in %age">
                            </div>
                            <div class="col-2">
                                <label for="">Duration</label>
                                <input type="text" class="form-control" name="duration" required>
                            </div>
                            <div class="col-2">
                                <label for="">Fee</label>
                                <input type="text" class="form-control" name="fee" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Best For (Students)</label>
                                    <select class="form-control" name="best_for" required="">
                                        <option value="" selected="" disabled="">Choose</option>
                                        <option value="Fsc Engineering">Fsc Engineering</option>
                                        <option value="Fsc Bio">Fsc Bio</option>
                                        <option value="ICS">ICS</option>
                                        <option value="FA">FA</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Program link</label>
                                    <input type="text" name="program_link" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea rows="7" name="details" id="details" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <br>
                                    <input type="submit" name="submit" class="btn btn-outline-dark" value="Save">
                                </div>
                            </div>
                        </div>
                    </form>


                    <hr>
                    <h2>Universities and their programs details</h2>
                    <table border="0" class="table table-sm table-bordered table-secondary">
                        <tr>
                            <td><strong>Id</strong></td>
                            <td><strong>University Name</strong></td>
                            <td><strong>Program Name</strong></td>
                            <td><strong>Merit</strong></td>
                            <td><strong>Duration</strong></td>
                            <td><strong>Fee</strong></td>
                            <td><strong>Best For</strong></td>
                            <td><strong>Details</strong></td>
                            <td><strong>Action</strong></td>
                        </tr>

                        <?php
                        require_once '../../../connection.php';
                        $sql = "SELECT * FROM program_university ORDER BY id DESC";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        // rowCount() check how many rows are exits in database.
                        if ($stmt->rowCount() > 0) {
                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>".$result['id']."</td>";
                                //echo "<td>".$result['university_id']."</td>";
                                $university_id = $result['university_id'];
                                $university_sql = "SELECT university_name FROM universities WHERE university_id='$university_id' ";
                                $university_stmt = $conn->prepare($university_sql);
                                $university_stmt->execute();
                                $university_result = $university_stmt->fetch(PDO::FETCH_ASSOC);
                                echo "<td>".$university_result['university_name']."</td>";

                                //echo "<td>".$result['program_id']."</td>";
                                $program_sql = "SELECT program_name FROM programs WHERE program_id='".$result['program_id']."' ";
                                $program_stmt = $conn->prepare($program_sql);
                                $program_stmt->execute();
                                $program_result = $program_stmt->fetch(PDO::FETCH_ASSOC);
                                echo "<td>".$program_result['program_name']."</td>";

                                echo "<td>".$result['merit']."%</td>";
                                echo "<td>".$result['duration']."</td>";
                                echo "<td>".$result['fee']."</td>";
                                echo "<td>".$result['best_for']."</td>";
                                echo "<td>".$result['details']."</td>";
                                echo "<td>
                                            <a class='btn btn-outline-danger btn-sm delete' href='delete_program_and_university.php?id=".$result['id']."'>Delete</a>
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