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
            header("Location: /eclass/partials/pages/marksPg.php?assign=$aid&msg=$msg&stdemail=$uemail");
            exit();
        }
        else
        {
            $msg="Server Err";
            header("Location: /eclass/partials/pages/submissionPg.php?assign=$aid&msg=$msg&stdemail=$uemail");
            exit();
        }
    }
?>