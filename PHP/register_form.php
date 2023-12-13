<!DOCTYPE html>
<html lang="en">
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
    <title>Register</title>
</head>
</head>
<body>
    <section id="main_section">
        <div id="form-wrapper">
            <form method="post" action="../PHP/register.php">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" value="<?php echo (isset($_GET['user']))?$_GET['user']:'';?>"> <br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br>
                <label for="password">Repeat password:</label><br>
                <input type="password" id="repassword" name="repassword"><br>
                <label for="password">Full name:</label><br>
                <input type="text" id="fullname" name="fullname"><br><br><br>
                <input type="submit" value="Register" name="register">
            </form>
        </div>
        <?php
        if(isset($_GET['credentials'])){
        switch($_GET['credentials']){
            case 1:{
                echo "<div id = \"error\">";
                echo "USERNAME AND PASSWORD MUST BE AT LEAST 6 CHARACTERS LONG!";
                echo "</div>";
                break;
            }    
            case 2:{
                echo "<div id = \"error\">";
                echo "PASSWORDS NOT MATCHING!";
                echo "</div>";
                break;
            }
            case 3:{
                echo "<div id = \"error\">";
                echo "USERNAME ALREADY TAKEN!";
                echo "</div>";
            }
        } 

        }
        ?>
        <div id="other">
            <p>Already have an account? <a href="login_form.php">LOGIN</a></p>
            <p><a href="../HTML/index.html">BACK <img src="../images/previous.png"></a></p>
        </div>
    </section>
</body>

</html>