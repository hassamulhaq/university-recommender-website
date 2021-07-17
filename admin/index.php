<?php
include '../header.php';
include 'navigation.php';
?>
    <div class="container-fluid mt-2">
        <div class="jumbotron">
            <h1 class="m-2 ml-4">Admin Dashboard</h1>
            <div class="row m-2">
                <div class="col-4">
                    <a href="user_request.php" class="p-4 btn btn-lg btn-block btn-dark">Request Management</a>
                </div>
                <div class="col-4">
                    <a href="university/manage_university.php" class="p-4 btn btn-lg btn-block btn-dark">University
                        Management</a>
                </div>
                <div class="col-4"><a href="university/program/add_program.php" class="p-4 btn btn-lg btn-block btn-dark">University
                        Program</a>
                </div>
            </div>

            <div class="row m-2">
                <div class="col-4">
                    <a href="university/program/program_and_university.php" class="p-4 btn btn-lg btn-block btn-dark">University
                        and Program</a>
                </div>
                <div class="col-4">
                    <a href="university/admission-details/admission_and_university.php"
                       class="p-4 btn btn-lg btn-block btn-dark">University Admission Details</a>
                </div>
            </div>
        </div>
    </div>

<?php include '../footer.php'; ?>