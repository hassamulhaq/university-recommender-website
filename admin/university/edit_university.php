<?php
    include "../../header.php";
    include "../navigation.php";
    $user_id = $_GET['id'];

    require_once '../../connection.php';
    $sql = "SELECT * FROM universities WHERE university_id = '$user_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

?>
    <div class="container-fluid mt-2">
        <div class="roe">
            <div class="col-8 m-auto">
                <div class="mt-2 p-4">
                    <h2>Update University</h2>
                    <br>
                    <form action="update_university.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="university_id" value="<?php echo $result['university_id'] ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>University Name</label>
                                    <input type="text" class="form-control" name="university_name" value="<?php echo $result['university_name'] ?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Founded</label>
                                    <input type="date" class="form-control" name="founded" value="<?php echo $result['founded'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>website</label>
                                    <input type="text" class="form-control" name="website" value="<?php echo $result['website'] ?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo $result['phone'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" name="location" value="<?php echo $result['location'] ?>" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Campus</label>
                                    <input type="text" class="form-control" name="campus" value="<?php echo $result['campus'] ?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Hours</label>
                                    <input type="text" class="form-control" name="hours" value="<?php echo $result['hours'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea class="form-control" name="details" rows="2"><?php echo $result['details'];?></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <label>University Image</label>
                                <img src="../../images/<?php echo $result['image'] ?>" alt="" height="30">
                                <input type="file" class="form-control" name="image" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php include '../../footer.php'; ?>