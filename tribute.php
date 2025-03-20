<?php
// $session_start();
$data = json_decode('file_get_contents("php://input")', true);
$name = $data['name'];
$type = $data['type'];
$image = $data['image'];
$born = $data['born']; 
if(isset($data['education'])){
    $education = $data['education'];
}
else{
    $education = "undefined";
}
if(isset($data['spouse'])){
    $spouse = $data['spouse'];
}
else{
    $spouse = "undefined";
}
if(isset($data['children'])){
    $children = $data['children'];
}
else{
    $children = "undefined";
}
if(isset($data['organization'])){
    $organization = $data['organization'];
}
else{
    $organization = "undefined";
}
if(isset($data['partner'])){
    $partner = $data['partner'];
}
else{
    $partner = "undefined";
}
if(isset($data['networth'])){
    $networth = $data['networth'];
}
else{
    $networth = "undefined";
}
$con = new mysqli('localhost', 'root', 'kinyanjui001david', 'tribute');
$searchSql = "select * from bio_data where name = '$name' and born = '$born';";
$result = mysqli_query($con, $searchSql);
$bioData = mysqli_num_rows($result);
if($bioData === 1){
    echo json_encode("Data is already input");
}
else{
    $sql = $con->prepare("insert into bio_data values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
    $sql->execute(["$name", "$type", "$image", "$born", "$education", "$spouse", "$children", "$organization", "$partner", "$networth"]);
}


?>