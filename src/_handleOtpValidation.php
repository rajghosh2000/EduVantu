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
                header("Location: /eclass?userId=true");
                exit();
            }
            else
            {
                $sqlDel = "DELETE from `user` WHERE `usr_email` = '$usr';";
                $resDel = mysqli_query($con,$sqlDel);
                if($resDel)
                {
                    header("Location: /eclass?userId=false");
                    exit();   
                }
                else
                {
                    echo "SQL ERR";
                    header("Location: /eclass/partials/pages/_signUp.html?userId=SQLErr");
                    exit();
                }
            }
        }
        else
        {
            $err="OTP fetch Error";
            header("Location: /eclass/partials/pages/_signUp.html?userId=OTPErr");
            exit();
        }
    }
?>