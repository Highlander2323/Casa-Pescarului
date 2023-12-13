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
    <title>Reservation</title>
</head>
</head>
<body>
    <section id="main_section">
        <div id="form-wrapper">
            <form method="post" action="reservation_validation.php?room=<?php echo $_GET['room'] ?>&id=<?php echo $_GET['id'] ?>&username=<?php echo $_GET['username'] ?>">
                <label for="number">Number of rooms:</label><br>
                <input type="text" id="number" name="number"> <br>
            <label for="start">Start date:</label><br>
            <input type="date" id="start" name="start"><br>
            <label for="end">End date:</label><br>
       <input type="date" id="end" name="end"><br><br><br>
       <input type="submit" value="Save" name="save">
       </form>
        </div>
        <?php
        if(isset($_GET['error'])){
        switch($_GET['error']){
            case 1:{
                echo "<div id = \"error\">";
                echo "INVALID DETAILS!";
                echo "</div>";
                break;
            }    
            case 2:{
                echo "<div id = \"error\">";
                echo "NOT ENOUGH ROOMS LEFT! THERE ARE ";
                if($_GET['total'] > 0)
                echo "ONLY ";
                echo $_GET['total']." LEFT!";
                echo "</div>";
                break;
            }
            case 3:{
                echo "<div id = \"error\">";
                echo "ERROR!";
                echo "</div>";
            }
        } 

        }
        ?>
        <div id="other">
            <p><a href="account.php?username=<?php echo $_GET['username']?>">BACK <img src="../images/previous.png"></a></p>
        </div>
    </section>
</body>

</html>