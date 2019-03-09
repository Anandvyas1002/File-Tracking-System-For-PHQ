<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>

</head>
<body>
  <Table class='table table-bordered'>
  <thead>
  <th>ID</th>
  <th>subjecT</th>
  </thead>
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
          $get_inbox='SELECT n.id, n.number, n.subject, n.date_created, u.user_name, file_id from notesheet n inner join user u on u.user_id=n.created_by';
          $result = $conn->query($get_inbox);
          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["subject"]."</td>
                     </tr>";
              }
          } else {
            $response['error']=true;
          }
          $conn->close();
}
else {
  header('location: index.php');
}
?>
  </table>
</body>
</html>

