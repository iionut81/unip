<?php include_once"includes/header.php"?>
      
      
       <section class="main-container">
           <div class="main-wrapper">
               <h2>Signup</h2>
               <form class="signup-form" action="includes/signupform.php" method="POST">
                  
                   <input type="text" name="first" placeholder="Firstname">
                   <input type="text" name="last" placeholder="Lastname">
                   <input type="text" name="email" placeholder="E-mail">
                   <input type="text" name="uid" placeholder="Username">
                   <input type="password" name="pwd" placeholder="Password">
                   <button type="submit" name="submit">Signup</button>
                   
                   
               </form>
           </div>
       </section>
   <?php include_once"includes/footer.php"?>