<?php
    $showErr = "false";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include '_dbconnect.php';
        $uemail = $_POST['u_email'];
        $upwd   = $_POST['u_pwd'];

        $sql = "SELECT * FROM `user` WHERE `usr_email` = '$uemail';";
        $res = mysqli_query($con,$sql);
        $numRows = mysqli_num_rows($res);

        if($numRows==1)
        {
            $row = mysqli_fetch_assoc($res);
            if(password_verify($upwd,$row['usr_pwd']))
                {
                        session_start();
                        $_SESSION['signedIn'] = true;
                        $_SESSION['usremail'] = $uemail; 
                        header("Location: /eclass/partials/pages/account.php");
                        exit(); 
                }
            else{
                    echo "Unable to log in ";
                    $showErr="UnableToLogIn";
                }
        }
        else{
            $showErr="No field found";
        }
        header("Location: /eclass?err=$showErr");
    }
?>