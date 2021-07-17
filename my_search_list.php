<?php
include "header.php";
include "navigation.php";
require_once 'connection.php';

if ($_SESSION['user_session']['status'] == 'pending') {
    echo '<h1 class="p-5 bg-danger text-light"> Your request is in pending. </h1>';
    echo '<h1 class="p-5 bg-danger text-light"> You cannot create list. </h1>';
    exit;
}
?>

<div class="container-fluid mt-1">
    <div class="jumbotron">
        <?php
        if (isset($_GET['status']) && $_GET['status'] == 'success') {
            echo '<h6 class="alert alert-success">List added.</h6>';
        } elseif(isset($_GET['status']) && $_GET['status'] == 'deleted') {
            echo '<h6 class="alert alert-danger">List Deleted.</h6>';
        }
        ?>
        <h2>Add Search List</h2>
        <hr>
        <form action="save_list.php" method="post">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label>Inter Subject</label>
                        <select class="form-control" name="inter_subject" required>
                            <option value="" selected disabled>Choose</option>
                            <option>Fsc Engineering</option>
                            <option>Fsc Bio</option>
                            <option>ICS</option>
                            <option>FA</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <label>Inter %age</label>
                    <input type="number" name="inter_percentage" min="0" max="100" class="form-control">
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Your are interested</label>
                        <select class="form-control" name="interested_program">
                            <option value="" selected disabled>Choose Program</option>
                            <?php
                            $sql = "SELECT * FROM programs ORDER BY program_id DESC";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) {
                                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="'.$result['program_name'].'">'.$result['program_name'].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Fee Start</label>
                        <input type="text" class="form-control" name="fee_start" value="0">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label>Fee End</label>
                        <input type="text" class="form-control" name="fee_end" value="0">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Admission Date Will</label>
                        <input type="date" class="form-control" name="admission_date">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Choose Season</label>
                        <select class="form-control" name="season" required>
                            <option value="" selected disabled>Choose Season</option>
                            <option value="fall">Fall</option>
                            <option value="spring">Spring</option>
                        </select>
                    </div>
                </div>
                <div class="col-3 mt-3">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-dark">Save List</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


    <div class="container-fluid mt-1">
        <div class="jumbotron p-4">
            <div class="row">
                <div class="col-12">
                    <div class="p-2">
                        <table class="table table-sm table-bordered">
                            <tr>
                                <td>List id </td>
                                <td>User</td>
                                <td>Inter Subject</td>
                                <td>Inter percentage</td>
                                <td>Interested Program</td>
                                <td>Fee Start</td>
                                <td>Fee End</td>
                                <td>Admission Date</td>
                                <td>Season</td>
                                <td>Save Date</td>
                                <td>Delete</td>
                                <td>Find University</td>
                            </tr>
                            <?php
                            $user_id = $_SESSION['user_session']['user_id'];

                            $sql = "SELECT * FROM search_list WHERE user_id='$user_id' ";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <td><?php echo $result['list_id'] ?></td>
                                    <td><?php echo $_SESSION['user_session']['username']; ?></td>
                                    <td><?php echo $result['inter_subject'] ?></td>
                                    <td><?php echo $result['inter_percentage'] ?></td>
                                    <td><?php echo $result['interested_program'] ?></td>
                                    <td><?php echo $result['fee_start'] ?></td>
                                    <td><?php echo $result['fee_end'] ?></td>
                                    <td><?php echo $result['admission_date'] ?></td>
                                    <td><?php echo $result['season'] ?></td>
                                    <td><?php echo $result['save_date'] ?></td>
                                    <td><a class="delete-button btn btn-sm btn-danger" href="delete_list.php?id=<?php echo $result['list_id'] ?>">Delete</a></td>
                                    <td><a class="btn btn-sm btn-dark" href="search_university.php?id=<?php echo $result['list_id'] ?>">Search University</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


<?php include "footer.php"; ?>