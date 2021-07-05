<?php
    session_start();
    $msg="false";
    if(isset($_POST["submit"]))
    {
        include '_dbconnect.php';

        $cid = $_GET['class'];

        $aname =  $_POST['name'];
        $adesc =  $_POST['desc'];
        $due =  $_POST['deadline'];
        $afile =  $_POST['attach'];
        $marks =  $_POST['points'];

        // if(strcmp($afile,'')!=0)
        // {
        //     $fp = file_get_contents('../composer.json');
        //     $json = json_decode($fp, true); // decoding the JSON into an associative array
        //     $upload_path = $json['params']['upload_location'];
        //     $dest = $upload_path.'/'.$afile; //File destination
        //     $phyLoc = $_FILES['afile']['tmp_name'];
        //     if( move_uploaded_file($phyLoc,$dest)){
        //         echo'DONE';
        //     }
        //     else{
        //         echo'ERR';
        //     }
        // }

        $sql = "INSERT INTO `assignment` (`sno`, `assign_id`, `assign_name`, `class_id`, `assign_text`, `assign_deadline`, `assign_file`, `marks`, `assign_stmp`) VALUES (NULL, '', '$aname', '$cid', '$adesc', '$due', '$afile', '$marks', current_timestamp());";
        $res = mysqli_query($con,$sql);

        if($res)
        {
            $upd = "SELECT sno FROM `assignment` WHERE `assign_name`='$aname'";
            $resUpd = mysqli_query($con,$upd);
            $rowId = mysqli_fetch_assoc($resUpd);
            $aid = $rowId['sno'];

            $id = (string) $aid;
            $newId = ($cid.$id);

            $sqlUpd = "UPDATE `assignment` SET `assign_id`='$newId' WHERE `assign_name`='$aname';";
            $sqlRes = mysqli_query($con,$sqlUpd);
            if($sqlRes)
            {
                $msg="Assignment Added";
                header("Location: /eclass/partials/pages/class.php?class=$cid&msg=$msg");
                exit();
            }
            else{
                $msg="Server Err";
                header("Location: /eclass/partials/pages/class.php?=$msg?class=$cid");
                exit();
            }
        }
        else{
            $msg="Network Err";
            header("Location: /eclass/partials/pages/class.php?=$msg?class=$cid");
            exit();
        }
    }
?>