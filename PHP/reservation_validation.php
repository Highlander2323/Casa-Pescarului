<?php
    require("connect.php");
    if (isset($_POST['save'])) {
        //if the form was submited
        //we register the movie in the database
        $error = 0;
        $number = $_POST['number'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $room = $_GET['room'];
        $id = $_GET['id'];
        echo is_null($start); echo is_null($end); echo is_null($number);
    if($end <= $start){
        $error = 1;
            header('Location: reservation.php?room='.$_GET['room'].'&id='.$_GET['id'].'&username='.$_GET['username'].'&error='.$error);
            exit;
    }
    else{
        $query = "SELECT check_in, check_out, room_nrs FROM reservation WHERE room_id = ".$room.";";
        $result=mysqli_query($connection, $query);
        switch($room){
            case 1: $total = 6;break;
            case 2: $total = 2;break;
            case 3: $total = 1;
        }

        while($row = mysqli_fetch_row($result)){
            if((($row[0] >= $start && $row[1] <= $end) || ($row[0] < $end && $row[0] > $start) || ($row[1] > $start && $row[1] < $end)) && $total > 0){
            if($total > $row[2])
                $total = $total - $row[2];
                else 
                $total = 0;
            }
            
        }

        if($total < $number){
            $error = 2;
            header('Location: reservation.php?room='.$_GET['room'].'&id='.$_GET['id'].'&username='.$_GET['username'].'&error='.$error.'&total='.$total);
            exit;
        }
        else{
       $query = "INSERT INTO reservation (check_in, check_out, room_id, room_nrs, user_id)
            VALUES ( '$start', '$end', '$room', '$number', '$id');";
    
        $result=mysqli_query($connection, $query);
    
        if ($result){
            header('Location: account.php?username='.$_GET['username']);
            exit;
        }
        else{
            $error = 3;
            header('Location: reservation.php?room='.$_GET['room'].'&id='.$_GET['id'].'&username='.$_GET['username'].'&error='.$error.'&total='.$total);
            exit;
        }
    }
    }
    
    } 
    ?>