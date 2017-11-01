<?php include_once"includes/header.php"?>
     <?php include"includes/db.php"?>
      
      
       <section class="main-container">
           <div class="main-wrapper">
               <h2>Home</h2>
               <br>
               <br>
               <img src="images/uniprest.jpg">
               
               <?php
               if(isset($_SESSION['u_id'])){
                   
                   echo $_SESSION['u_uid']." <br>"."LOGGED..Enjoy Your Stay!!";
               }
               
               
               ?>
               
           </div>
       </section>
   <?php include_once"includes/footer.php"?>