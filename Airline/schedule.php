<?php
include('conn.php');
session_start();
?>
<html>
    <head>
          <meta charset=utf-8>
     
    <title>Schedule</title>
        <link rel="stylesheet" type="text/css" href="style1.css">
         <link rel="stylesheet" type="text/css" href="style2.css">
        <style>
        form, .content { 
  width: 30%;
  height: 65.5%;
            }
        </style>
    </head>
        <body>
            <div class="bg">
            <div class="topnav" id="myTopnav">
    <div class="topnav1" id="myTopnav"><a href="#">HOME</a></div>
    <a href="schedule.php">SCHEDULE</a>
    <a href="flight.php">FLIGHT</a>
    <a href="airport.php">AIRPORT</a>
    </div>
        <div class="marq"><marquee behavior="scroll" direction="left" class="marf">MY AIRLINE</marquee></div>
        <table border="0">
        <div class="header">
            <h2>SCHEDULE</h2>
        </div></table>
        
   
                  <form action="" method="post" id="vali">
              <table border="0">
            <div class="form1">
            
               <div width="150px" class="td"> From_Airport_Id 
                   <input type="text" name="fid" id="fid" required></div>
                <br>
                <div width="150px" class="td"> To_Airport_Id &nbsp; &nbsp; 
                   <input type="text" name="tid" id="tid" required></div>
                <br>
                <div width="150px" class="td"> Flight No &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                   <input type="text" name="fno" id="fno" required></div>
                <br>
                <div width="150px" class="td"> Departure Time &nbsp; 
                   <input type="time" name="dt" id="dt" required></div>
                <br>
                <div width="150px" class="td"> Arival Time &nbsp; &nbsp; &nbsp; &nbsp;
                   <input type="time" name="at" id="at" required></div>
                 <br>
              <div width="200px" class="td"><button type="submit" name="submit" class="button">Submit</button>
                </div>
            </div>
                  </table>
            </form>
            <?php
            if(isset($_POST['submit']))
            {
                $from_airport_id=$_POST['fid'];
                $to_airport_id=$_POST['tid'];
                $flight_no=$_POST['fno'];
                $depart_time=$_POST['dt'];
                $arrival_time=$_POST['at'];
                $a=$db->prepare("INSERT INTO schedule (from_airport_id,to_airport_id,flight_no,depart_time,arrival_time) VALUES (:from_airport_id,:to_airport_id,:flight_no,:depart_time,:arrival_time)");
                $a->bindValue('from_airport_id',$from_airport_id);
                $a->bindValue('to_airport_id',$to_airport_id);
                $a->bindValue('flight_no',$flight_no);
                $a->bindValue('depart_time',$depart_time);
                $a->bindValue('arrival_time',$arrival_time);
                if($a->execute())
                {
                    echo "<script>alert('Schedule added Successful')</script>";
                }else
                {
                     echo "<script>alert('Submit Unsucessful')</script>";
                }
                $b=$db->query("SELECT depart_time,arrival_time FROM schedule where from_airport_id=2 and to_airport_id=2 ");
                if($b){
                    $depart_time1=depart_time-(10*60);
                    $depart_time2=depart_time+(10*60);
                    $arrival_time1=arrival_time-(10*60);
                    $arrival_time2=arrival_time+(10*60);
                    if($depart_time1 && $depart_time2){
                        echo $c=$db->query("SELECT flight_no FROM schedule where from_airport_id=2 and to_airport_id=2 ");
                    }elseif($arrival_time1 && $arrival_time2){
                         echo $c=$db->query("SELECT flight_no FROM schedule where from_airport_id=2 and to_airport_id=2 ");
                    }
                }
            }
                
            ?>
            </div>
    </body>
</html>
