<?php
$id = $_GET['id'];
require_once 'connection.php';

$sql = "DELETE FROM search_list WHERE list_id = $id";
$result = $conn->prepare($sql);
$result->execute();
if($result->rowCount() > 0){
    header("location:my_search_list.php?status=deleted");
}
else {
    echo '<h1>Data Not Deleted. ERROR</h1>';
}


