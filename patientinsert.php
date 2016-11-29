<?php 
require_once 'config.php';

     $postdata = file_get_contents("php://input");
     $request = json_decode($postdata);
     $Fname = mysqli_real_escape_string($conn,$request->Fname);
     echo json_encode("M IN INSERT PHP");
     $Lname = mysqli_real_escape_string($conn,$request->Lname);
     $Age=intval($request->Age);
     $Dob=mysqli_real_escape_string($conn,$request->Dob);
     $Gender=mysqli_real_escape_string($conn,$request->Gender);
     $Phone=mysqli_real_escape_string($conn,$request->Phone);
     $Comment=mysqli_real_escape_string($conn,$request->Comment);

//echo json_encode($Gender);
    
    $sql = "INSERT INTO patient(Fname,Lname,Age,Dob,Gender,Phone,Comment)
      VALUES ('$Fname','$Lname',$Age,'$Dob','$Gender','$Phone','$Comment')";

if($conn->query($sql)===TRUE)
{
    echo json_encode("Inserted data successfully");
}
else{
    header("HTTP/1.0 404 ERROR IN INSERT");
    exit;
  //  echo json_encode("Error INTO insertion" . $conn->error) ;
}
?>
