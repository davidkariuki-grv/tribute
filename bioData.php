<?php
include('config.php');
$sql = 'select * from bio_data';
$result = mysqli_query($con, $sql);
if($result){
    $bioData = mysqli_num_rows($result);
    while($bioData = mysqli_fetch_all($result)){
        echo json_encode($bioData);
    }
}
else{
    echo ("Error");
}

?>