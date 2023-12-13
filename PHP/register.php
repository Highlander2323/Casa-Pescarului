

<?php
require("connect.php");
$credentials = 0;
$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$fullname = $_POST['fullname'];
if(strlen($username) < 6 || strlen($password) < 6){
  $credentials = 1;
  header('Location: register_form.php?credentials='.$credentials);
  exit;
}
else{
  if($password != $repassword){
    $credentials = 2;
    header('Location: register_form.php?credentials='.$credentials);
    exit;
  }
  else{
$hashed = password_hash($password, PASSWORD_DEFAULT);
$insert_query = "INSERT INTO user (username, password, fullname) 
VALUES ('$username', '$hashed', '$fullname')";
$check_query = "SELECT id FROM user where username = '$username'";
$result = mysqli_query($connection, $check_query);
if(mysqli_num_rows($result) == 0){
if (mysqli_query($connection, $insert_query)) {
  $credentials = 2;
  header('Location: login_form.php?credentials='.$credentials);
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . $connection->error;
  }
}
else {
  $credentials = 3;
  header('Location: register_form.php?credentials='.$credentials);
  exit;
}
  }
}
?>


