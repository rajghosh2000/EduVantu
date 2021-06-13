<?php
    session_start();
    $msg="false";
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        include '_dbconnect.php';
        if(isset($_SESSION['signedIn']) && $_SESSION['signedIn']==true)
            {             
                $uemail = $_SESSION['usremail'];
                $classCode = $_POST['classcode'];
                $className = $_POST['classname'];
                $classDesc = $_POST['classdesc'];

                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $classJoinCode = substr(str_shuffle($permitted_chars), 0, 6);

                $sqlChk = "SELECT * FROM `class` WHERE `class_id`='$classCode';";
                $resChk = mysqli_query($con,$sqlChk);
                if($resChk)
                    {
                        if(mysqli_num_rows($resChk) == 0)
                            {
                                $sql = "INSERT INTO `class` (`class_id`, `class_name`, `class_desc`, `u_email`, `class_join_code`, `class_timestamp`) VALUES ('$classCode', '$className', '$classDesc', '$uemail', '$classJoinCode', current_timestamp());";
                                $res = mysqli_query($con,$sql);

                                if($res)
                                    {
                                        $msg = "Classcreated";
                                        header("Location: /eClass/partials/pages/main.php?=$msg");
                                        exit(); 
                                    }
                                else
                                    {
                                        $msg="Server Err";
                                        header("Location: /eClass/partials/pages/main.php?=$msg");
                                        exit(); 
                                    }
                            }
                        else
                            {
                                $msg="Class Code Exits";
                                header("Location: /eClass/partials/pages/main.php?=$msg");
                                exit();   
                            } 
                    }  
                else
                    {
                        $msg="Class Err";
                        header("Location: /eClass/partials/pages/main.php?=$msg");
                        exit();  
                    }             
            }
    }
?>