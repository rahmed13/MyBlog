<?php
//Connect to database
$connect=mysqli_connect("localhost","rahmed13","rahmed13","rahmed13");
//Check connection
if (!$connect)
	{
                echo "failed to connect to MySql: " . mysqli_connect_error();
        }
	session_start();
	session_unset();
        //Collect form data
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];
        $userEmail = $_POST['email'];
        $password = $_POST['password1'];
        //Making sure password matches before creating account
        if ($_POST['password1']!= $_POST['password2'])
 {
     echo("Password did not match! Try again. ");
 }
        else {
        $sql= "INSERT INTO user (firstName, lastName,username, userEmail, password,verfiedUser, adminUser) VALUES
        ('$firstName', '$lastName','$username', '$userEmail', '$password', 1, 0)";
        if(mysqli_query($connect, $sql)){
		header("Location: VerifiedUser.php");
        }
	else {
              	echo "ERROR" . mysqli_error($connect);
        }
}
mysqli_close($connect);
?>
