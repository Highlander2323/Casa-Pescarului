<!DOCTYPE html>
<html lang="en">
<?php 
require("connect.php"); 
    $check_query = "SELECT id, fullname, username FROM user where username = '".$_GET['username']."'";
    $result = mysqli_query($connection, $check_query);
    $row = mysqli_fetch_row($result);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styling_account.css">
    <title>Casa Pescarului "La Maxea"</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=BIZ+UDPMincho&family=Familjen+Grotesk&family=Koulen&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200&family=Ubuntu:wght@300&display=swap"
        rel="stylesheet">
</head>

<body>
    <header id="page_header">
        <div id="header_logo">
            <a href="index.html"><img src="../images/logo.svg" alt="logo"></a>
        </div>

        <div id="header_menu">
            <a href="login_form.php"><img id="accimg" src="../images/user.png" alt="account"></a>
            <img src="../images/menu.png" id="menuimg" alt="menu" onclick="dropdownFunction()">
            <div id="dropdown_content">
                <a href="../HTML/index.html">HOME</a>
                <a href="../HTML/accomodation.html">ACCOMODATION</a>
                <a href="../HTML/experiences.html">EXPERIENCES</a>
                <a href="../HTML/info.html">USEFUL INFO</a>
            </div>
        </div>

        <nav>
            <ul>
                <li><a href="../HTML/index.html">HOME</a></li>
                <li><a href="../HTML/accomodation.html">ACCOMODATION</a></li>
                <li><a href="../HTML/experiences.html">EXPERIENCES</a></li>
                <li><a href="../HTML/info.html">USEFUL INFO</a></li>
                <li><a href="login_form.php">ACCOUNT</a></li>
            </ul>
        </nav>
    </header>

    <section class="details">
        <article id="user"> 
        <p>Full name: <?php echo $row[1]; ?></p>
        <div id="logout"><a href="logout.php">Log out</a></div>
</article>


    <article id="reservation">
        <p>Make a reservation:</p>
        <ul>
            <li><a href = "reservation.php?room=1&id=<?php echo $row[0]; ?>&username=<?php echo $row[2]; ?>">Double room</a></li>
            <li><a href = "reservation.php?room=2&id=<?php echo $row[0]; ?>&username=<?php echo $row[2]; ?>">Triple room</a></li>
            <li><a href = "reservation.php?room=3&id=<?php echo $row[0]; ?>&username=<?php echo $row[2]; ?>">Ship</a></li>
        </ul>
</article>
<article id="myreservations">
    <p>My reservations: </p>
    
    <?php
     $query = "SELECT r.check_in, r.check_out, r.room_nrs, a.room_name FROM reservation r JOIN room a on r.room_id = a.id WHERE r.user_id = '".$row[0]."'";
     $result=mysqli_query($connection, $query);
     $i = 0;
     if(mysqli_num_rows($result) > 0){
     while($entry = mysqli_fetch_row($result)){
        $i = $i + 1;
         echo "<div id=\"myreservation_article\">";
         echo "<h1> Reservation ".$i."</h1>";
        echo "<p>Check-in: ".$entry[0]."</p>";
        echo "<p>Check-out: ".$entry[1]."</p>";
        echo "<p>Number of rooms: ".$entry[2]."</p>";
        echo "<p>Room: ".$entry[3]."</p>";
        echo "</div>";
    }
}
else{
    echo "<p>No reservations yet...</p>";
}
    ?>
    </div>
</article>

    </section>
    
    </div>

    <footer>
        <p>© 2022 Munteanu-Bardan Raul Octav. All rights reserved.</p>
        <div id="footer_container">
            <ul>
                <li>Contact: +40 760 066 117</li>
                <li>Location: <a href="https://goo.gl/maps/WkqojJEGbc7PGVuV8" target="_blank">Maps</a></li>
            </ul>
            <div>
                <a href="https://www.facebook.com/profile.php?id=100063571990439" target="_blank">
                    <img alt="facebook" src="../images/facebook.png">
                </a>
            </div>
        </div>

    </footer>
    <script src="../JS/scripts.js"></script>
</body>

</html>