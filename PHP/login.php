
    <?php
    require("connect.php");
    session_start();

$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    // this session has worn out its welcome; kill it and start a brand new one
    session_unset();
    session_destroy();
    session_start();
}

// either new or old, it should live at most for another hour
$_SESSION['discard_after'] = $now + 3600;
    if(isset($_SESSION['logged'])){
      header('Location: account.php?username='.$_SESSION['logged']);
      exit;
    }
    else{
    $credentials = 0;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check_query = "SELECT password,id FROM user where username = '$username'";
    $result = mysqli_query($connection, $check_query);
    if(mysqli_num_rows($result) == 0){
      $credentials = 1;
      header('Location: login_form.php?credentials='.$credentials);
      exit;
    }
    else {
      $row = mysqli_fetch_row($result);
      if(password_verify($password, $row[0])){
        $_SESSION['logged'] = $username;
      $id = $row[1];
      header('Location: account.php?username='.$username);
      exit;
      }
      else{
        $credentials = 1;
        header('Location: login_form.php?credentials='.$credentials);
        exit;
      }
    }
  }
    ?>
