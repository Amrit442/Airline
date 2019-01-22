<?php
include('conn.php');
session_start();
?>
<html>
    <head>
          <meta charset=utf-8>
     
    <title>Airport</title>
        <link rel="stylesheet" type="text/css" href="style1.css">
         <link rel="stylesheet" type="text/css" href="style2.css">
        <style>
        form, .content { 
  width: 30%;
  height: 30.5%;
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
            <h2>AIRPORT</h2>
        </div></table>
        
   
                  <form action="" method="post" id="vali">
              <table border="0">
            <div class="form1">
            
               <div width="150px" class="td"> Airport Code
                   <input type="text" name="code" id="code" required></div>
                <br>
                 <div width="200px" class="td">Airport Name  
                   <input type="text" name="name" id="name" required></div>
              <div width="200px" class="td"><button type="submit" name="submit" class="button">Submit</button>
                </div>
            </div>
                  </table>
            </form>
            <?php
            if(isset($_POST['submit']))
            {
                $airport_code=$_POST['code'];
                $airport_name=$_POST['name'];
                $a=$db->prepare("INSERT INTO airport (airport_code,airport_name) VALUES (:airport_code,:airport_name)");
                $a->bindValue('airport_code',$airport_code);
                $a->bindValue('airport_name',$airport_name);
                if($a->execute())
                {
                    echo "<script>alert('Airport added Successful')</script>";
                }else
                {
                     echo "<script>alert('Submit Unsucessful')</script>";
                }
            }
            ?>
            </div>
    </body>
</html>
