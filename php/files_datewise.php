<?php
session_start();
if ($_SESSION["logged_in"]=="true" && $_SESSION["privilage"]=="0") {
  include("../php/config.php");
  $user_id=$_SESSION["user_id"];
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
            $response['error']=true;
            $response['message']="Connection Failed";
            die(json_encode($response));
          }

          $startDate="'".date("Y-m-d", strtotime($_POST["startDate"]))."'";
          
          $endDate="'".date("Y-m-d", strtotime($_POST["endDate"]))."'";
          
echo $startDate;
echo $endDate;
          $get_inbox="select * from files where letter_date >=  "   .$startDate. "   and  letter_date<= ".$endDate. ";";
          
          $result = $conn->query($get_inbox);
          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $response[]=$row;
              }
          } else {
            $response['error']=true;
            $response['message']="No Range Found";
          }
          $conn->close();
          header('Content-Type: application/json');
          echo '{"aaData":'.json_encode($response).'}';
}
else {
  header('location: index.php');
}
?>
