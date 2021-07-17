<?php
    include "../header.php";
    include "navigation.php";
    $user_id = $_GET['id'];

    require_once '../connection.php';
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12">
            <div class="jumbotron">
                <h1>Edit: <?php echo $result['first_name'] ?></h1>
                <hr>
                <form action="user_update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" value="<?php echo $result['user_id'] ?>">
                    <div class="row">
                        <div class="col-4">
                            <label>First Name: </label>
                            <input type="text" class="form-control" name="first_name" required value="<?php echo $result['first_name'] ?>"/>
                        </div>
                        <div class="col-4">
                            <label>Last Name: </label>
                            <input type="text" class="form-control" name="last_name" required value="<?php echo $result['last_name'] ?>"/>
                        </div>
                        <div class="col-4">
                            <label class="mr-2">Gender: (<?php echo $result['gender'] ?>) </label>
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
                            <input type="date" class="form-control" name="date_of_birth" required value="<?php echo $result['date_of_birth'] ?>"/>
                        </div>
                        <div class="col-4">
                            <label>CNIC: </label>
                            <input type="text" class="form-control" name="cnic" required value="<?php echo $result['cnic'] ?>" />
                        </div>
                        <div class="col-4">
                            <label class="mr-2">Profile Image: </label>
                            <img src="../<?php echo $result['profile_image'] ?>" height="40px">
                            <input type="file" class="form-control" name="profile_image" required/>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-4">
                            <label>Address </label>
                            <input type="text" class="form-control" name="address" required value="<?php echo $result['address'] ?>" />
                        </div>
                        <div class="col-4">
                            <label>Email: </label>
                            <input type="email" class="form-control" name="email" required value="<?php echo $result['email'] ?>" />
                        </div>
                        <div class="col-4">
                            <label class="mr-2">Phone: </label>
                            <input type="text" class="form-control" name="phone" required value="<?php echo $result['phone'] ?>" />
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-4">
                            <label>University Name: (Optional) </label>
                            <input type="text" class="form-control" name="university_name" value="<?php echo $result['university_name'] ?>" />
                        </div>
                        <div class="col-4">
                            <label>Study Program:  (Optional)</label>
                            <input type="text" class="form-control" name="study_program" value="<?php echo $result['study_program'] ?>" />
                        </div>
                        <div class="col-4">
                            <label class="mr-2">Current Semester:  (Optional)</label>
                            <input type="text" class="form-control" name="current_semester" value="<?php echo $result['current_semester'] ?>" />
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-4">
                            <label for="password">Password: </label>
                            <input type="password" class="form-control" name="password" required value="<?php echo $result['password'] ?>" />
                        </div>
                        <div class="col-4">
                            <br>
                            <input class="btn btn-primary" type="submit" name="submit" value="Update" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "../footer.php"; ?>

