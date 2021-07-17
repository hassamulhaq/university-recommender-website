<?php
include "header.php";
include "navigation.php";
include "session_checker.php";
include 'connection.php';
?>


<?php

$user_id = $_SESSION['user_session']['user_id'];


$sql = "SELECT * FROM users_table WHERE user_id = '$user_id'";
$stmt = $conn->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>


    <div class="container-fluid mt-4">
    <div class="row">
        <div class="col-8 m-auto">
            <div class="jumbotron">
                <h1>User Update: </h1>
                <hr>
                <form action="profile_update.php" method="post">
                    <input type="hidden" class="form-control" name="user_id" required value="<?php echo $result['user_id'] ?>" />
                    <div class="form-group">
                        <label>First Name: </label>
                        <input type="text" class="form-control" name="first_name" required value="<?php echo $result['first_name'] ?>" />
                    </div>

                    <div class="form-group">
                        <label>Last Name: </label>
                        <input type="text" class="form-control" name="last_name" required value="<?php echo $result['last_name'] ?>" />
                    </div>


                    <div class="form-group">
                        <label class="mr-2">Gender: (previously selected:  <?php echo $result['gender'] ?>) </label>
                        <br>
                        <label>
                            Male: <input type="radio" name="gender" value="male" checked />
                        </label>
                        <label>
                            Female: <input type="radio" name="gender" value="female"/>
                        </label>
                    </div>


                    <div class="form-group">
                        <label>Date of Birth </label>
                        <input type="date" class="form-control" name="date_of_birth" required value="<?php echo $result['date_of_birth'] ?>" />
                    </div>

                    <div class="form-group">
                        <label>CNIC: </label>
                        <input type="text" class="form-control" name="cnic" required value="<?php echo $result['cnic'] ?>" />
                    </div>



                    <div class="form-group">
                        <label>Address </label>
                        <input type="text" class="form-control" name="address" required value="<?php echo $result['address'] ?>" />
                    </div>

                    <div class="form-group">
                        <label>Email: </label>
                        <input type="email" class="form-control" name="email" required value="<?php echo $result['email'] ?>" />
                    </div>

                    <div class="form-group">
                        <label class="mr-2">Phone: </label>
                        <input type="text" class="form-control" name="phone" required value="<?php echo $result['phone'] ?>" />
                    </div>



                    <div class="form-group">
                        <label>University Name: (Optional) </label>
                        <input type="text" class="form-control" name="university_name" value="<?php echo $result['university_name'] ?>" />
                    </div>

                    <div class="form-group">
                        <label>Study Program:  (Optional)</label>
                        <input type="text" class="form-control" name="study_program" value="<?php echo $result['study_program'] ?>" />
                    </div>

                    <div class="form-group">
                        <label class="mr-2">Current Semester:  (Optional)</label>
                        <input type="text" class="form-control" name="current_semester" value="<?php echo $result['current_semester'] ?>" />
                    </div>


                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password" class="form-control" name="password" required value="<?php echo $result['password'] ?>" />
                    </div>
                    <div class="form-group">
                        <br>
                        <input class="btn btn-primary" type="submit" name="submit" value="Update" />
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include "footer.php"; ?>