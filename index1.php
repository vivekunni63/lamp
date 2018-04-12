
<?php
session_start();
$username = $_POST['username'];
$password = $_POST['pswd'];
if($username && $password)
{
$servername = "localhost";
$name = "root";
$dbname = "ssn";

// Create connection
$conn = mysqli_connect($servername, $name, "aravind", $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
       }

$query= mysqli_query($conn,"SELECT * From login WHERE name='$username'");
$numrows = mysqli_num_rows($query);

	if ($numrows!=0)
	{
	 while ($row = mysqli_fetch_assoc($query))
	 	{
			$dbusername = $row['name'];
			$dbpassword = $row['password'];
			//echo $dbusername;


		}

		if($username==$dbusername&&$password==$dbpassword)
		{
		
                     header('location:home.php');
			$_SESSION['username']=$username;
		}
		else
		 echo "Incorrect username or password!";
		
	}




}
else

 echo "enter password and username";
?>
