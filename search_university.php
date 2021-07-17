<?php
include "header.php";
include "navigation.php";
require_once 'connection.php';
?>
<div class="container-fluid">
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM search_list WHERE list_id='$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($result);



    $list_id = $result['list_id'];
    $user_id = $result['user_id'];
    $inter_subject = $result['inter_subject'];
    $inter_percentage = $result['inter_percentage'];
    $interested_program = $result['interested_program'];
    $fee_start = $result['fee_start'];
    $fee_end = $result['fee_end'];
    $admission_date = $result['admission_date'];
    $season = $result['season'];

    $filter_sql = "SELECT 
                    program_university.university_id, 
                    program_university.program_id, 
                    program_university.duration,
                    program_university.merit,
                    program_university.fee,
                    program_university.best_for,
                    program_university.program_link,
                    program_university.details,
                    programs.program_id,
                    programs.program_name,
                    
                    universities.university_id,
                    universities.university_name,
                    universities.founded,
                    universities.website,
                    universities.phone,
                    universities.location,
                    universities.campus,
                    universities.hours,
                    universities.details,
                    universities.image,
                    universities.created_at
                    
                    FROM program_university 
                    INNER JOIN programs ON program_university.program_id = programs.program_id
                    INNER JOIN universities ON program_university.university_id = universities.university_id
                    WHERE program_university.best_for LIKE '%$inter_subject%' 
                    AND program_university.fee BETWEEN '$fee_start' AND '$fee_end'
                    AND program_university.merit <= '$inter_percentage' ";
    $filter_stmt = $conn->prepare($filter_sql);
    $filter_stmt->execute();
    if ($filter_stmt->rowCount() == 0) {
        echo '<div class="jumbotron mt-4 h3">No University Found according to your list.</div>';
    }
    while ($filter_result = $filter_stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="jumbotron p-4 mt-1">
            <div class="row">
                <div class="col-3">
                    <center>
                        <?php echo "<img class='img img-fluid' src='images/".$filter_result['image']."'>"; ?>
                        <br>
                        <br>
                        <h4><?php echo $filter_result['university_name'] ?></h4>
                        <hr>
                        <p class="text-center mt-1">
                            <?php echo $filter_result['details'] ?>
                        </p>
                    </center>
                </div>
                <div class="col-9">
                    <h2 class="text-dark font-weight-bold"><?php echo $filter_result['university_name'] ?></h2>
                    <div class="p-2 bg-light">
                        <h5>Details</h5>
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
                                <td><?php echo $filter_result['founded'] ?></td>
                                <td><?php echo $filter_result['website'] ?></td>
                                <td><?php echo $filter_result['phone'] ?></td>
                                <td><?php echo $filter_result['location'] ?></td>
                                <td><?php echo $filter_result['campus'] ?></td>
                                <td><?php echo $filter_result['hours'] ?></td>
                            </tr>
                        </table>
                    </div>

                    <div class="p-2 bg-light mt-1">
                        <h5>Programs Details</h5>
                        <table class="table table-sm table-bordered">
                            <tr>
                                <td>Program Name</td>
                                <td>Duration</td>
                                <td>Fee</td>
                                <td>Details</td>
                                <td>Apply</td>
                            </tr>
                                <tr>
                                    <td><?php echo $filter_result['program_name'] ?></td>
                                    <td><?php echo $filter_result['duration'] ?></td>
                                    <td><?php echo $filter_result['fee'] ?></td>
                                    <td><?php echo $filter_result['details'] ?></td>
                                    <td><a href="<?php echo $filter_result['program_link'] ?>" target="_blank" class="btn btn-dark btn-sm">Apply for this program.</a></td>
                                </tr>
                        </table>
                    </div>

                    <div class="p-2 bg-light mt-1">
                        <h5>Universities and admissions details</h5>
                        <table class="table table-sm table-bordered">
                            <tr>
                                <td>Season</td>
                                <td>Start Date</td>
                                <td>End Date</td>
                                <td>Details</td>
                            </tr>
                            <?php
                            $university_id = $filter_result['university_id'];
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

                </div>
            </div>
        </div>
    <?php } ?>

</div>


<?php exit; ?>


<div class="container-fluid">
<?php
    $id = $_GET['id'];
    $university_sql = "SELECT * FROM universities WHERE university_id='1' ";
    $university_stmt = $conn->prepare($university_sql);
    $university_stmt->execute();

    while ($university_result = $university_stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="jumbotron p-4 mt-1">
                <div class="row">
                    <div class="col-3">
                        <center>
                            <?php echo "<img class='img img-fluid' src='images/".$university_result['image']."'>"; ?>
                            <br>
                            <br>
                            <h4><?php echo $university_result['university_name'] ?></h4>
                            <hr>
                            <p class="text-center mt-1">
                                <?php echo $university_result['details'] ?>
                            </p>
                        </center>
                    </div>
                    <div class="col-9">
                        <h2 class="text-dark font-weight-bold"><?php echo $university_result['university_name'] ?></h2>
                        <div class="p-2 bg-light">
                            <h5>Details</h5>
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

                        <div class="p-2 bg-light mt-1">
                            <h5>Programs Details</h5>
                            <table class="table table-sm table-bordered">
                                <tr>
                                    <td>Program Name</td>
                                    <td>Duration</td>
                                    <td>Fee</td>
                                    <td>Details</td>
                                    <td>Apply</td>
                                </tr>
                                <?php
                                $university_id = $university_result['university_id'];
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
                                        <td><?php echo $program_university_result['duration'] ?></td>
                                        <td><?php echo $program_university_result['fee'] ?></td>
                                        <td><?php echo $program_university_result['details'] ?></td>
                                        <td><a href="<?php echo $program_university_result['program_link'] ?>" target="_blank" class="btn btn-dark btn-sm">Apply for this program.</a></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>

                        <div class="p-2 bg-light mt-1">
                            <h5>Universities and admissions details</h5>
                            <table class="table table-sm table-bordered">
                                <tr>
                                    <td>Season</td>
                                    <td>Start Date</td>
                                    <td>End Date</td>
                                    <td>Details</td>
                                </tr>
                                <?php
                                $university_id = $university_result['university_id'];
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

                    </div>
                </div>
            </div>
    <?php } ?>
</div>



<?php include "footer.php"; ?>
