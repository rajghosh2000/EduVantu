<?php
    session_start();
    $msg="false";
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        include '_dbconnect.php';

        $aid = $_GET['class'];
        $uemail = $_SESSION['usremail'];
        $sfile = $_POST['attach'];

        $sql="INSERT INTO `submit` (`sno`, `assign_id`, `u_email`, `submit_file`, `submit_stmp`) VALUES (NULL, '$aid', '$uemail', '$sfile', current_timestamp());";
        $res = mysqli_query($con,$sql);
        if($res)
        {
            $msg="Assignment Submitted";
            header("Location: /eClass/partials/pages/submissionPg.php?class=$aid&msg=$msg");
            exit();
        }
        else
        {
            $msg="Server Err";
            header("Location: /eClass/partials/pages/submissionPg.php?class=$aid&msg=$msg");
            exit();
        }
    }
?>