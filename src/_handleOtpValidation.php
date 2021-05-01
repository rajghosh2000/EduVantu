<?php
    $err = "false";
    $showAlert = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include '_dbconnect.php';

        $otp = $_POST['otp'];
        $usr = $_POST['email'];
        
        $sql = "SELECT * FROM `user` WHERE `usr_start_otp`= '$otp';";
        $res = mysqli_query($con,$sql);
        if($res)
        {
            $numRows = mysqli_num_rows($res);

            if($numRows==1)
            {
                $showAlert = true;
                echo '<script>alert("Account Created!!!Kindly Login now with the credentials.")</script>';
                header("Location: /eClass");
                exit();
            }
            else
            {
                
            }
        }
        else
        {
            $err="OTP fetch Error";
        }
       

    

        // $sql = "INSERT INTO `user` (`usr_name`, `usr_email`, `usr_pwd`, `usr_stamp`, `usr_start_otp`) VALUES ('$usrName', '$usrEmail', '$usrPassword', current_timestamp(), '$otp');";

        // $res = mysqli_query($con, $sql);

        // if ($res) {
        //     $showAlert = true;
        //     header("Location: /eClass/partials/src/_signUp.html?userId=true?$usrEmail");
        //     exit();
        // } else {
        //     $err = "Details not added!!";
        // }
        // header("Location: /eClass/partials/src/_signUp.html?errCL=$err");
    }
?>