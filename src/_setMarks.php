<?php
    session_start();
    $msg="false";
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        include '_dbconnect.php';

        $aid = $_GET['assign'];
        $uemail = $_GET['stdemail'];
        $amarks = $_POST['marks'];

        $sql="UPDATE `submit` SET assign_marks='$amarks' WHERE assign_id='$aid' AND u_email='$uemail';";
        $res = mysqli_query($con,$sql);
        if($res)
        {
            $msg="Marks Assigned";
            header("Location: /eClass/partials/pages/marksPg.php?class=$aid&msg=$msg");
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