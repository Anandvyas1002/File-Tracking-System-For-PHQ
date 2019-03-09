<?php
$userid=$_POST['userid'];
$pwd=$_POST['password'];
if ($userid==-1) {
	header('location: ../index.php');
}
session_start();
include('config.php');
$con= mysqli_connect($servername,$username,$password,$dbname);
$q="select privilage from user where user_id='$userid' && password='$pwd' limit 1";
if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
}
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if ($num==1) {
	$row=mysqli_fetch_array($result);
	session_start();
	$_SESSION["logged_in"]="true";
	$_SESSION["user_id"]=$userid;
	if($row['privilage']==1)
	{
		$_SESSION["privilage"]=1;
		header('location: ../admin.php');
	}
	else if($row['privilage']==0)
	{
		$_SESSION["privilage"]=0;
		header('location: ../inbox.php');
	}
}
else
{
	header('location: ../index.php');
}
mysqli_close($con);
?>
