<?php
include('conn.php');
session_start();
?>
<html>
    <head>
          <meta charset=utf-8>
     
    <title> registration</title>
        <link rel="stylesheet" type="text/css" href="style1.css">
         <link rel="stylesheet" type="text/css" href="style2.css">
        <style>
        form, .content { 
  width: 30%;
  height: 48.5%;
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
            <h2>FLIGHT</h2>
        </div></table>
        
   
                  <form action="" method="post" id="vali">
              <table border="0">
            <div class="form1">
            
               <div width="150px" class="td"> Flight No &nbsp;
                   <input type="text" name="fno" id="fno" required></div>
                <br>
                 <div width="200px" class="td">Company &nbsp;
                     <select name="company" class="select">
                    <option value="Air India">Air India</option>
                    <option value="Go Air">SpiceJet</option>
                    <option value="Indigo">Indigo</option>
                    <option value="Jet Airways">Jet Airways</option>
                    <option value="Vistara">Go Air</option>
                    </select>
                  </div>
                 <br>
                 <div width="200px" class="td">Type &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                   <select name="type" class="select">
                    <option value="AirBus">AirBus</option>
                    <option value="AirShip">AirShip</option>
                    <option value="FixedWing">AirShip</option>
                    </select>
                </div><br>
              <div width="200px" class="td"><button type="submit" name="submit" class="button">Submit</button>
                </div>
            </div>
                  </table>
            </form>
            <?php
            if(isset($_POST['submit']))
            {
                $flight_no=$_POST['fno'];
                $company=$_POST['company'];
                $type=$_POST['type'];
                $a=$db->prepare("INSERT INTO flight (flight_no,company,type) VALUES (:flight_no,:company,:type)");
                $a->bindValue('flight_no',$flight_no);
                $a->bindValue('company',$company);
                $a->bindValue('type',$type);
                if($a->execute())
                {
                    echo "<script>alert('Flight added Successful')</script>";
                }else
                {
                     echo "<script>alert('Submit Unsucessful')</script>";
                }
            }
            ?>
            </div>
    </body>
</html>