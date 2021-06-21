<?php
    session_start();
    $msg="false";
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        include '_dbconnect.php';

        $uemail = $_SESSION['usremail'];
        $code = $_POST['join'];
        
        $chk = "SELECT class_join_code from `std_class` WHERE u_email='$uemail'";
        $resChk = mysqli_query($con,$chk);
        $numRows = mysqli_num_rows($resChk);
        if($numRows==1)
            {
                $msg="Already Joined To Class";
                header("Location: /eClass/partials/pages/account.php?=$msg");
                exit();
            }
        else{
            $sql = "SELECT class_id, u_email FROM `class` WHERE class_join_code='$code';";
            $res = mysqli_query($con,$sql);
            $nRows = mysqli_num_rows($res);
            if($nRows==1)
                {
                    $rowId = mysqli_fetch_assoc($res);
                    $cid = $rowId['class_id'];
                    $email = $rowId['u_email'];
                    if((strcmp($email,$uemail)) == 0)
                    {
                        $msg="Owner Cannot Join The Class";
                        header("Location: /eClass/partials/pages/account.php?=$msg");
                        exit();
                    }
                    else
                    {
                        $sqlUser = "SELECT * FROM `user` WHERE usr_email='$uemail';";
                        $resUser = mysqli_query($con,$sqlUser);
                        $rowUser = mysqli_fetch_assoc($resUser);
                        $uid = (int) $rowUser['usr_id'];
                        
                        $joinSql = "INSERT INTO `std_class` (`class_id`, `usr_id`, `u_email`, `class_join_code`, `usr_stmp`) VALUES ('$cid', '$uid', '$uemail', '$code', current_timestamp());";
                        $joinRes = mysqli_query($con,$joinSql);

                        if($joinRes)
                        {
                            $cntSql = "SELECT std_count FROM `class` WHERE class_join_code='$code';";
                            $cntRes = mysqli_query($con,$cntSql);
                            $rowCnt = mysqli_fetch_assoc($cntRes);
                            $uid = (int) $rowCnt['std_count'];
                            $uid +=1;

                            $upd = "UPDATE `class` SET `std_count`='$uid' WHERE class_join_code='$code';";
                            $resUpd = mysqli_query($con,$upd);

                            if($resUpd)
                            {
                                $msg="Joined Class";
                                header("Location: /eClass/partials/pages/account.php?=$msg");
                                exit();
                            }
                            else{
                                $msg="Server Err";
                                header("Location: /eClass/partials/pages/account.php?=$msg");
                                exit();
                            }
                        }
                        else
                        {
                            $msg="Could Not Join Class Server Err";
                            header("Location: /eClass/partials/pages/account.php?=$msg");
                            exit();
                        }
                    }   
                }
            else
            {
                $msg="Code Doesnot Exist";
                header("Location: /eClass/partials/pages/account.php?=$msg");
                exit();
            }
        }
    }
?>