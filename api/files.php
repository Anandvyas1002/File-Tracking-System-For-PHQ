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
          $get_inbox='(select id, file_no, file_type, subject, description, sender, letter_date, ( select user_name from user where user_id=creator_id) as "creator", ( select "Closed" as status from files where status=1) as "status" from files where status=1) union all (select id, file_no, file_type, subject, description, sender, letter_date, ( select user_name from user where user_id=creator_id) as "creator", ( select "Pending" as status from files where status=0) as "status" from files where status=0);';
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
          //header('Content-Type: application/json');
          echo '{"aaData":'.json_encode($response).'}';
}
else {
  header('location: index.php');
}
?>
