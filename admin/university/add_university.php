<?php
include '../../header.php';
include '../navigation.php';
?>
    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col-8 m-auto">
                <div class="jumbotron">
                    <?php
                        if (isset($_GET['status']) && $_GET['status'] == 'success') {
                            echo '<h6 class="alert alert-success">University added.</h6>';
                        } elseif(isset($_GET['status']) && $_GET['status'] == 'error') {
                            echo '<h6 class="alert alert-danger">University not added.</h6>';
                        }
                    ?>
                    <h2>Add University</h2>
                    <br>
                    <form action="save_university.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>University Name</label>
                                    <input type="text" class="form-control" name="university_name" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Founded</label>
                                    <input type="date" class="form-control" name="founded">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>website</label>
                                    <input type="url" class="form-control" name="website" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" class="form-control" name="location">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Campus</label>
                                    <input type="text" class="form-control" name="campus">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Hours</label>
                                    <input type="text" class="form-control" name="hours">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea class="form-control" name="details" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <label>University Logo</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php include '../../footer.php'; ?>