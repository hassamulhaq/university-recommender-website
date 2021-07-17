<?php
    include "header.php";
    include "navigation.php";
    require_once 'connection.php';

    if (isset($_SESSION['user_session']) && $_SESSION['user_session']['status'] == 'pending') {
        echo '<h1 class="p-5 bg-danger text-light"> Your request is in pending. </h1>';
        exit;
    }
    ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <img class="img img-fluid" src="images/banner/banner-international.jpg" alt="">
        </div>
    </div>
</div>


<div class="container mt-4">
    <div class="row">
    <?php
    $university_sql = "SELECT * FROM universities ORDER BY university_id DESC";
    $university_stmt = $conn->prepare($university_sql);
    $university_stmt->execute();
    while ($university_result = $university_stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="col-6 my-5">
            <div class="bg-light p-3 shadow rounded border ">
                <center>
                    <?php echo "<img class='img img-fluid' src='images/".$university_result['image']."'>"; ?>
                </center>
                <br>
                <h4><?php echo $university_result['university_name'] ?></h4>
                <hr>
                <p class="mt-1">
                    <?php echo $university_result['details'] ?>
                </p>
                <a href="single-university.php?id=<?php echo $university_result['university_id'] ?>" class="btn btn-outline-dark btn-block">Details</a>
            </div>
        </div>
    <?php } ?>
    </div>
</div>



<?php include "footer.php"; ?>
