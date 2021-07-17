<?php
    $err="false";

     // Import PHPMailer classes into the global namespace 
     use PHPMailer\PHPMailer\PHPMailer; 
     
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        include '_dbconnect.php';

        require 'PHPMailer/Exception.php'; 
        require 'PHPMailer/PHPMailer.php'; 
        require 'PHPMailer/SMTP.php'; 

        $usrName = $_POST['name'];
        $dob = $_POST['dob'];
        $usrEmail = $_POST['uemail'];
        $usrPwd = $_POST['upwd'];
        $usrCpwd = $_POST['ucpwd'];

        if($usrPwd == $usrCpwd)
        {
            $usrPassword = password_hash($usrPwd, PASSWORD_DEFAULT);

            $otpRandom = rand(1000,9999);

            $sql = "INSERT INTO `user` (`usr_name`, `dob`, `usr_email`, `usr_pwd`, `usr_stamp`, `usr_start_otp`) VALUES ('$usrName', '$dob', '$usrEmail', '$usrPassword', current_timestamp(), '$otpRandom');";

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

                                $mail = new PHPMailer();
                                
                                $mail->isSMTP();                      // Set mailer to use SMTP 
                                $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
                                $mail->SMTPAuth = true;               // Enable SMTP authentication 
                                $mail->Username = 'UserEmail';   // Give your Email Id Here
                                $mail->Password = 'UserPwd';   // Give you Email Pwd here
                                $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
                                $mail->Port = 587;                    // TCP port to connect to 

                                // Sender info 
                                $mail->setFrom('Sender Email Here', 'Eduvantu Limited'); 

                                // Add a recipient 
                                $mail->addAddress($usrEmail);

                                // Mail subject 
                                $mail->Subject = 'OTP Validation From EduVantu';

                                // Mail body content 
                                $message = "Thank You for registering with us. So as to complete the registration kindly enter the following otp.";
                                $message .= "
                                    OTP : $otp";
                                $mail->Body = $message;

                               
                                // Always set content-type when sending HTML email
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                // More headers : Sender's Email Address
                                $headers .= 'From: <>' . "\r\n"; 
                                $mail->header = $headers;

                                //Mail
                                if(!$mail->send()) { 
                                    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
                                } else { 
                                    echo 'Message has been sent.';
                                    echo 'Mail Sent';
                                    header("Location: /eclass/partials/pages/_signUp.html?userId=true?$usrEmail+$dob");
                                    exit(); 
                                }                                 
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
        header("Location: /eclass/partials/pages/_signUp.html?errCL=$err"); 
    }
