<?php
include "header.php";
include "navigation.php";
require_once 'connection.php';
$university_id = $_GET['id'];


?>


<div class="container mt-1">
    <div class="jumbotron">
        <div class="row">
            <div class="col-10 m-auto">
                <?php
                $university_sql = "SELECT * FROM universities WHERE university_id='$university_id' ";
                $university_stmt = $conn->prepare($university_sql);
                $university_stmt->execute();
                $university_result = $university_stmt->fetch(PDO::FETCH_ASSOC);
                { ?>
                    <center>
                        <?php echo "<img class='w-100' src='images/" . $university_result['image'] . "'>"; ?>
                        <br>
                        <br>
                        <h2 class="text-dark font-weight-bold"><?php echo $university_result['university_name'] ?></h2>
                        <hr>
                        <p class="text-center mt-1">
                            <?php echo $university_result['details'] ?>
                        </p>
                    </center>
                    <div class="p-4 bg-light my-4">
                        <h3>Details</h3>
                        <table class="table table-sm table-bordered">
                            <tr>
                                <td>Founded</td>
                                <td>Website</td>
                                <td>Phone</td>
                                <td>Location</td>
                                <td>Campus</td>
                                <td>Hours</td>
                            </tr>
                            <tr>
                                <td><?php echo $university_result['founded'] ?></td>
                                <td><?php echo $university_result['website'] ?></td>
                                <td><?php echo $university_result['phone'] ?></td>
                                <td><?php echo $university_result['location'] ?></td>
                                <td><?php echo $university_result['campus'] ?></td>
                                <td><?php echo $university_result['hours'] ?></td>
                            </tr>
                        </table>
                    </div>

                    <div class="p-2 bg-light my-4">
                        <h3>Programs Details</h3>
                        <table class="table table-sm table-bordered">
                            <tr>
                                <td>Program Name</td>
                                <td>Merit</td>
                                <td>Duration</td>
                                <td>Fee</td>
                                <td>Details</td>
                                <td>Apply</td>
                            </tr>
                            <?php
                            $program_university_sql = "SELECT * FROM program_university WHERE university_id='$university_id' ";
                            $program_university_stmt = $conn->prepare($program_university_sql);
                            $program_university_stmt->execute();
                            while ($program_university_result = $program_university_stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <!-- <td>BSCS</td> -->
                                    <?php
                                    $program_id = $program_university_result['program_id'];
                                    $program_sql = "SELECT * FROM programs WHERE program_id='$program_id' ";
                                    $program_stmt = $conn->prepare($program_sql);
                                    $program_stmt->execute();
                                    $program_result = $program_stmt->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <td><?php echo $program_result['program_name'] ?></td>
                                    <td><span class="badge badge-success"><?php echo $program_university_result['merit']; ?></span></td>
                                    <td><?php echo $program_university_result['duration'] ?></td>
                                    <td><?php echo $program_university_result['fee'] ?></td>
                                    <td><?php echo $program_university_result['details'] ?></td>
                                    <td><a href="<?php echo $program_university_result['program_link'] ?>"
                                           target="_blank" class="btn btn-outline-dark btn-sm">Apply for this program.</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                    <div class="p-2 bg-light my-4">
                        <h3>Universities and admissions details</h3>
                        <table class="table table-sm table-bordered">
                            <tr>
                                <td>Season</td>
                                <td>Start Date</td>
                                <td>End Date</td>
                                <td>Details</td>
                            </tr>
                            <?php
                            $uni_admission_sql = "SELECT * FROM admission_details WHERE university_id='$university_id' ";
                            $uni_admission_stmt = $conn->prepare($uni_admission_sql);
                            $uni_admission_stmt->execute();
                            if ($uni_admission_stmt->rowCount() > 0) {
                                while ($uni_admission_result = $uni_admission_stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <tr>
                                        <td><?php echo $uni_admission_result['season'] ?></td>
                                        <td><?php echo $uni_admission_result['start_date'] ?></td>
                                        <td><?php echo $uni_admission_result['end_date'] ?></td>
                                        <td><?php echo $uni_admission_result['details'] ?></td>
                                    </tr>
                                    <?php
                                } //while
                            } else {
                                echo '<tr><td>Data not found</td></tr>';
                            } ?>

                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<?php include "footer.php"; ?>
