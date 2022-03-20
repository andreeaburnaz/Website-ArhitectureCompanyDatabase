<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 
 <!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Welcome</title>
      <link rel="stylesheet" href="welcome.css" />
      <link rel="stylesheet" href="styles.css" />
      <link
         rel="stylesheet"
         href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
         integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
         crossorigin="anonymous"
         />
   </head>
   <body>
      <div class="homesection" id="home">
         <div class="homesection_con">
            <h1 class="homesection_head">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
               . Welcome to our team.
            </h1>
            <a href="logout.php" class="btn-signout">Log out</a>
            <a href="listtables.php" class="btn-signout">List tables from database</a>
            <a href="insertintables.html" class="btn-signout">INSERT in database</a>
            <a href="deletefromtables.html" class="btn-signout">DELETE data from database</a>
            <a href="updateintables.html" class="btn-signout">UPDATE in database</a>
            <a href="joins.php" class="btn-signout">JOINS</a>
            <a href="subqueries.php" class="btn-signout">SUBQUERIES</a>
         </div>
      </div>
   </body>
</html>