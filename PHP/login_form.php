<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    if(isset($_SESSION['logged'])){
      header('Location: account.php?username='.$_SESSION['logged']);
      exit;
    } 
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styling_credentials.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=BIZ+UDPMincho&family=Familjen+Grotesk&family=Koulen&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200&family=Ubuntu:wght@300&display=swap"
        rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <section id="main_section">
        <div id="form-wrapper">
            <form method="post" action="../PHP/login.php">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" value="<?php echo (isset($_GET['user']))?$_GET['user']:'';?>"><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br><br><br>
                <input type="submit" value="Login" name="login">
            </form>
        </div>
        <?php
        if(isset($_GET['credentials'])){
        switch($_GET['credentials']){
            case 1:{
                echo "<div id = \"error\">";
                echo "INVALID CREDENTIALS!";
                echo "</div>";
                break;
            }
            case 2:{
                echo "<div id = \"success\">";
                echo "ACCOUNT CREATED SUCCESFULLY!";
                echo "</div>";
                break;
            }
        } 

        }
        ?>
        <div id="other">
            <p>Don't have and account? <a href="register_form.php">REGISTER</a></p>
            <p><a href="../HTML/index.html">BACK <img src="../images/previous.png"></a></p>
        </div>
    </section>
</body>

</html>