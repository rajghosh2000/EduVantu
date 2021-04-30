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

            $otpRandom = rand(1000,9999);

            $sql = "INSERT INTO `user` (`usr_name`, `usr_email`, `usr_pwd`, `usr_stamp`, `usr_start_otp`) VALUES ('$usrName', '$usrEmail', '$usrPassword', current_timestamp(), '$otpRandom');";

            $res = mysqli_query($con,$sql);

            if($res)
                {
                    $sql1 = "SELECT * FROM `user` WHERE `usr_email` = '$usrEmail'";
                    $res1 = mysqli_query($con,$sql1);
                    $numRows = mysqli_num_rows($res1);

                    if($numRows==1)
                        {
                            $row = mysqli_fetch_assoc($res1);
                            $otpPresent = $row['usr_start_otp'];
                            $usrId = $row['usr_id'];

                            $otpNow = (string) $otpPresent;
                            $id = (string) $usrId;

                            $otp = (int)($otpNow.$id);

                            $sqlMain = "UPDATE `user` SET `usr_start_otp`='$otp' WHERE usr_id ='$usrId';";
                            $result = mysqli_query($con,$sqlMain);

                            if($result)
                            {
                                $showAlert = true;
                                header("Location: /eClass/partials/src/_signUp.html?userId=true");
                                exit();
                            }
                            else
                            {
                                $err = "OTP ERROR 1";
                            }        
                        }
                    else
                        {
                            $err="NOT FOUND";
                        }
                }
            else
                {
                    $err="Details not added!!";
                }
        }
        header("Location: /eClass/partials/src/_signUp.html?errCL=$err"); 
    }
?>