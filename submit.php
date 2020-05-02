<?php
$servername = "localhost";
$username = "root";
$password = "";
$email = $_POST['emailAdr'];
$pw = $_POST['passWord'];
$pw = md5($pw);


$conn = new mysqli($servername, $username, $password, 'registration');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$check = "SELECT username FROM users WHERE email LIKE '$email' AND password LIKE '$pw'";
$result = mysqli_query($conn, $check);
if (mysqli_num_rows($result) > 0) {
header("Location: http://localhost:8080/Database/login.html ");
}
else {
  $command = "INSERT INTO users(email, username, password)values('$email', '$_POST[userName]', '$pw')";
  if(mysqli_query($conn, $command))
  {
    echo "<h1 style= "align-self: center">Welcome</h1>" . "<br>" .  "<h2>$_POST['userName']</h2>";;
  }
  else {
    echo "Error" . $command . "<br>" .  mysqli_error($conn);
  }
}

 ?>
