<?php
require_once 'config.php';

$data = json_decode(file_get_contents("php://input"));
$id = $data->id;
$sql="select * from patient WHERE id=$id "; 
$data = array();
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
} else {
	echo json_encode ("0 results");
}
echo json_encode($data);
?>
