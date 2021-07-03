<?php
    session_start();
    $msg="false";
    if (isset($_GET['FileId'])) {
        include '_dbconnect.php';

        $FileId=$_GET['FileId'];
    
        // fetch file to download from database
        $sql = "SELECT * FROM `assignment` WHERE `assign_id`='$FileId';";
        $result = mysqli_query($con, $sql);
    
        $file = mysqli_fetch_assoc($result);
        if(strcmp($file['assign_file'],'')!=0)
        {
            $fp = file_get_contents('../composer.json');
            $json = json_decode($fp, true); // decoding the JSON into an associative array
            $upload_path = $json['params']['upload_location'];
            $filepath = '/' . $file['assign_file'];

            if (file_exists($filepath)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . basename($filepath));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize('uploads/' . $file['assign_file']));
                readfile('uploads/' . $file['assign_file']);
                exit;
            }
        }   
        
    }
    
?>