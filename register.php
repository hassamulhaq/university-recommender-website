<?php
include "header.php";
include "navigation.php";
?>

<div align="center" style="padding: 10px">
    <?php
    echo '<br>';
    if (isset($_GET['success'])){
        echo "<h2>SignUp Success</h2>";
    } elseif (isset($_GET['error'])){
        echo "<h2>SignUp Error</h2>";
    }
    ?>
</div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1>User Registration</h1>
                    <hr>
                    <form action="register_submit.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-4">
                                <label>First Name: </label>
                                <input type="text" class="form-control" name="first_name" required/>
                            </div>
                            <div class="col-4">
                                <label>Last Name: </label>
                                <input type="text" class="form-control" name="last_name" required/>
                            </div>
                            <div class="col-4">
                                <label class="mr-2">Gender: </label>
                                <br>
                                <label>
                                    Male: <input type="radio" name="gender" value="male" checked/>
                                </label>
                                <label>
                                    Female: <input type="radio" name="gender" value="female"/>
                                </label>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-4">
                                <label>Date of Birth </label>
                                <input type="date" class="form-control" name="date_of_birth" required/>
                            </div>
                            <div class="col-4">
                                <label>CNIC: </label>
                                <input type="text" class="form-control" name="cnic" required/>
                            </div>
                            <div class="col-4">
                                <label class="mr-2">Profile Image: </label>
                                <input type="file" class="form-control" name="profile_image" required/>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-4">
                                <label>Address </label>
                                <input type="text" class="form-control" name="address" required/>
                            </div>
                            <div class="col-4">
                                <label>Email: </label>
                                <input type="email" class="form-control" name="email" required/>
                            </div>
                            <div class="col-4">
                                <label class="mr-2">Phone: </label>
                                <input type="text" class="form-control" name="phone" required/>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-4">
                                <label>University Name: (Optional) </label>
                                <input type="text" class="form-control" name="university_name"/>
                            </div>
                            <div class="col-4">
                                <label>Study Program:  (Optional)</label>
                                <input type="text" class="form-control" name="study_program"/>
                            </div>
                            <div class="col-4">
                                <label class="mr-2">Current Semester:  (Optional)</label>
                                <input type="text" class="form-control" name="current_semester">
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col-4">
                                <label for="password">Password: </label>
                                <input type="password" class="form-control" name="password" required/>
                            </div>
                            <div class="col-4">
                                <br>
                                <input class="btn btn-drak" type="submit" name="submit" value="Sign Up" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "footer.php"; ?>