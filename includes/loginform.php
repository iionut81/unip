<?php
session_start();

if(isset($_POST['submit'])){
    include"db.php";
    
    $uid =mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd =mysqli_real_escape_string($conn, $_POST['pwd']);
    
    //error handlers
    //check if inputs are empty
    
    if(empty($uid) || empty($pwd)){
        
        header("Location: ../index.php?login=LOGIN_fail_empty");
        exit();
        
    }else{
        
        $sql = "SELECT * FROM unip_users WHERE user_uid='$uid' OR user_email='$uid'";
        $result=mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        
        if($resultCheck<1){
            header("Location: ../index.php?login=LOGIN_fail_user");
            exit();
    
        }else{
            
            if($row = mysqli_fetch_assoc($result)){
                //decrypt password function
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                
                if($hashedPwdCheck == false){
                    header("Location: ../index.php?login=LOGIN_fail_pass");
                    exit();
                    
                }elseif($hashedPwdCheck == true){
                    
                    //log in the user
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                     header("Location: ../index.php?login=LOGIN_succes");
                     exit();
                    
                }
                
            }
        }
            
    }
}
    
else{
    header("Location: ../index.php?login=LOGIN fail");
    exit();
    
}



?>