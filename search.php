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
$command = "SELECT username FROM users WHERE email LIKE '$email' AND password LIKE '$pw'";
$result = mysqli_query($conn, $command);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_array($result);
  $uname = $row['username'];
  echo "<h1 >Welcome</h1>" . "<br>" .  "<h1>$uname</h1>";
}

else {
  header("Location: http://localhost:8080/Database/login.html ");
}
 ?>
 <!DOCTYPE html>
 <html >
   <head>

     <style >
     h1 {
       border: 1px solid powderblue;
       padding: 30px;
     }
     h2{
       border: 1px solid black;
       padding: 30px;

     }
     </style>
   </head>
   <body>

   </body>
 </html>
