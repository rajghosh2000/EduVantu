<?php
    $err="false";
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        include '_dbconnect.php';

        $usrName = $_POST['name'];
        $usrEmail = $_POST['uemail'];
        $usrPwd = $_POST['upwd'];
        $usrCpwd = $_POST['ucpwd'];

        if($usrPwd == $usrCpwd)
        {
            $usrPassword = password_hash($usrPwd, PASSWORD_DEFAULT);

            $otp = rand(1000,9999);

            $sql = "INSERT INTO `user` (`usr_name`, `usr_email`, `usr_pwd`, `usr_stamp`, `usr_start_otp`) VALUES ('$usrName', '$usrEmail', '$usrPassword', current_timestamp(), '$otp');";

            $res = mysqli_query($con,$sql);

            if($res)
                {
                    $showAlert = true;
                    header("Location: /eClass/partials/src/_signUp.html?userId=true");
                    exit();
                }
            else
                {
                    $err="Details not added!!";
                }
        }
        header("Location: /eClass/partials/src/_signUp.html?errCL=$err"); 

    }
?>