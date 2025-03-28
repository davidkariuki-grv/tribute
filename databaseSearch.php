<?php 
$data = json_decode(file_get_contents('php://input'), true);
$name = $data['name'];
$con = new mysqli('localhost', 'root', 'kinyanjui001david', 'tribute');
$searchSql = "select * from bio_data where name like ('$name%');";
$result = mysqli_query($con, $searchSql);
$bioData = mysqli_num_rows($result);
while($bioData = mysqli_fetch_row($result)){
    $requestedData = [
        "name" => "$bioData[0]", 
        "type" => "$bioData[1]",
        "image" => "$bioData[2]",
        "born" => "$bioData[3]",
        "education" => "$bioData[4]",
        "spouse" => "$bioData[5]",
        "children" => "$bioData[6]",
        "organizations" => "$bioData[7]",
        "partner" => "$bioData[8]",
        "networth" => "$bioData[9]"        
    ];
    echo json_encode($requestedData);
}
?>
