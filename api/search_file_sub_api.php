<?php
session_start();
if ($_SESSION["logged_in"]=="true" && $_SESSION["privilage"]=="0") {
  include("../php/config.php");

  
  $subject_name=$_POST['subject'];
  //$subject_name from files_subjectwise by searching with subject 
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
            $response['error']=true;
            $response['message']="Connection Failed";
            die(json_encode($response));
          }
          $get_inbox='SELECT * from files where subject ='.$subject_name;
          $result = $conn->query($get_inbox);
          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $response[]=$row;
              }
          } else {
            $response['error']=true;
          }
          $conn->close();
          header('Content-Type: application/json');
          echo '{"aaData":'.json_encode($response).'}';
          header('location: files_subjectwise.php');
        }
else {
  header('location: index.php');
}
?>
