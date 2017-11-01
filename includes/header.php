<?php session_start();?>



<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <title>Uniprest Instal</title>
    </head>
    <body>
       <header>
           <nav >
               
               <div class="main-wrapper">
                  
                   <ul>
                       <li><a href="index.php" class="home-btn">Home</a></li>
                   </ul>
                      
                       <div class="nav-login">
                          <?php
                           if(isset($_SESSION['u_id'])){
                               echo'<form action="includes/logout.php" method="POST">
                                     <button type="submit" name="submit">Logout</button>
                                     </form>';
                           }else{
                               echo'<form action="includes/loginform.php" method="POST">
                               <input type="text" name="uid" placeholder="Username/Email">
                               <input type="password" name="pwd" placeholder="Password">
                               <button type="submit" name="submit">Login</button>
                               </form>
                               <a href="signup.php">Signup</a>';
                           }
                           ?>
                           
                           
                          
                           
                       </div>
               </div>
           </nav>
       </header>