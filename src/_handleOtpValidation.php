<?php
    $err = "false";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include '_dbconnect.php';

        $otp = $_POST['otp'];
        
        

    

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