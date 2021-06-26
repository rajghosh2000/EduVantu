<?php
        //Connecting to database

        //for local use
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $database = "eclass";

        //Remote Database Connection
        $servername = "remotemysql.com";
        $username = "9GENfndcjA";
        $password = "o8PK6IOXip";
        $database = "9GENfndcjA";

        $con = mysqli_connect($servername,$username,$password,$database);
?>