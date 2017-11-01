<?php 


if(isset($_POST['submit'])){
    
    include"db.php";
    
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    //error handlers
    //check for empty fields
    
    if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){
        header("Location: ../signup.php?signup=empty");
        exit();
    }else{
        //check if input characters are valid 
        //preg_match function("/^[a-zA-Z]*$" and $variable)
        
        if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
            
            header("Location: ../signup.php?signup=invalid");
            exit();
        }else{
            //check if email is valid
            if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                
                header("Location: ../mailerror.php?signup=wrong_email");
                
                exit();
            }else{
                
                $sql = "SELECT * FROM unip_users WHERE user_id='$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                //if the id is taken funcction
                
                if($resultCheck>0){
                    header("Location: ../signup.php?signup=ID_ALLREADY_IN USE");
                    exit();
                }else{
                    
                    //password crypting
                    $hashedPass=password_hash($pwd, PASSWORD_DEFAULT);
                    
                    //insert the user into the database
                    $sql="INSERT INTO unip_users(user_first, user_last, user_email, user_uid, user_pwd) VALUES('$first', '$last', '$email', '$uid', '$hashedPass');";
                    
                    $result=mysqli_query($conn, $sql);
                    
                    header("Location: ../succes.php?signup=succes");
                    exit();
                }
                
            }
        }
    }
    
    
}else{
    header("Location: ../signup.php");
    exit();
}
    
    ?>