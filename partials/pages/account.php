<?php
    session_start();
    echo'
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>EduVantu</title>
            <link rel="icon" href="../../img/logo-icon.png">
            <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="../css/main.css">
            <style>            
                .svg-icon {
                width: 1.4em;
                height: 1.4em;
                }
                
                .svg-icon circle {
                stroke: #4691f6;
                stroke-width: 1;
                }
                .scroll {
                    width: 1000px;
                    height: 180px;
                    overflow-x: hidden;
                    overflow-y: auto;
                }

                ::-webkit-scrollbar {
                  width: 5px;
                }

                /* Track */
                ::-webkit-scrollbar-track {
                  background: #f1f1f1; 
                }
                
                /* Handle */
                ::-webkit-scrollbar-thumb {
                  background: #888; 
                }

                /* Handle on hover */
                ::-webkit-scrollbar-thumb:hover {
                  background: #555; 
                }
            </style>
        </head>

        <body>
        
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Join Class</h2>
                    </div>
                    <div class="modal-body">
                        <form class="my-6" action="../../src/_handleJoinClass.php" method="post">
                        <div>
                            <label for="username" class="block text-sm text-gray-800 dark:text-gray-200">Class Code</label>
                            <input type="text"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" name="join" id="join" required>
                        </div>
                        <button class="ml-80 px-8 py-2 my-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
                            Join
                        </button>
                    </form>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col h-screen">';

                include '_header.php';

                echo'
                <div class="lg:py-6 flex max-w-full w-full h-4/5">
                    <div class="max-w-sm mx-auto lg:mx-4 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:w-1/2">
                        <img class="object-cover object-center w-full h-56 lg:h-80" src="../../img/acc.jpg" alt="avatar">

                        <div class="flex items-center px-6 py-3 bg-gray-900">
                            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2">
                                </path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>

                            <h1 class="mx-3 text-lg font-semibold text-white">Your Account</h1>
                        </div>
                        
                        <div class="px-6 py-4">';
                        if(isset($_SESSION['signedIn']) && $_SESSION['signedIn']==true)
                        {
                            
                            $email = $_SESSION['usremail'];

                            include '../../src/_dbconnect.php';
                            $sql = "SELECT * FROM `user` WHERE `usr_email` = '$email';";
                            $res = mysqli_query($con,$sql);
                            $numRows = mysqli_num_rows($res);

                            if($numRows==1)
                            {
                                $row = mysqli_fetch_assoc($res);
                                echo'
                                    <h1 class="text-xl font-semibold text-gray-800 dark:text-white">'.$row['usr_name'].'</h1>
                                    <div class="flex items-center mt-4 text-gray-700 dark:text-gray-200">
                                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.00977 5.83789C3.00977 5.28561 3.45748 4.83789 4.00977 4.83789H20C20.5523 4.83789 21 5.28561 21 5.83789V17.1621C21 18.2667 20.1046 19.1621 19 19.1621H5C3.89543 19.1621 3 18.2667 3 17.1621V6.16211C3 6.11449 3.00333 6.06765 3.00977 6.0218V5.83789ZM5 8.06165V17.1621H19V8.06199L14.1215 12.9405C12.9499 14.1121 11.0504 14.1121 9.87885 12.9405L5 8.06165ZM6.57232 6.80554H17.428L12.7073 11.5263C12.3168 11.9168 11.6836 11.9168 11.2931 11.5263L6.57232 6.80554Z" />
                                        </svg>

                                        <h1 class="px-2 text-sm">'.$row['usr_email'].'</h1>
                                    </div>
                                    <div class="flex items-center text-gray-700 dark:text-gray-200">
                                        <svg class="svg-icon w-6 h-6 fill-current" viewBox="0 0 20 20">
							                             <path fill-rule="evenodd" clip-rule="evenodd" 
                                                d="M16.254,3.399h-0.695V3.052c0-0.576-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042v0.347H6.526V3.052c0-0.576-0.467-1.042-1.042-1.042S4.441,2.476,4.441,3.052v0.347H3.747c-0.768,0-1.39,0.622-1.39,1.39v11.813c0,0.768,0.622,1.39,1.39,1.39h12.507c0.768,0,1.391-0.622,1.391-1.39V4.789C17.645,4.021,17.021,3.399,16.254,3.399z M14.17,3.052c0-0.192,0.154-0.348,0.348-0.348c0.191,0,0.348,0.156,0.348,0.348v0.347H14.17V3.052z M5.136,3.052c0-0.192,0.156-0.348,0.348-0.348S5.831,2.86,5.831,3.052v0.347H5.136V3.052z M16.949,16.602c0,0.384-0.311,0.694-0.695,0.694H3.747c-0.384,0-0.695-0.311-0.695-0.694V7.568h13.897V16.602z M16.949,6.874H3.052V4.789c0-0.383,0.311-0.695,0.695-0.695h12.507c0.385,0,0.695,0.312,0.695,0.695V6.874z M5.484,11.737c0.576,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043s-1.042,0.467-1.042,1.043C4.441,11.271,4.908,11.737,5.484,11.737z M5.484,10.348c0.192,0,0.347,0.155,0.347,0.348c0,0.191-0.155,0.348-0.347,0.348s-0.348-0.156-0.348-0.348C5.136,10.503,5.292,10.348,5.484,10.348z M14.518,11.737c0.574,0,1.041-0.467,1.041-1.042c0-0.576-0.467-1.043-1.041-1.043c-0.576,0-1.043,0.467-1.043,1.043C13.475,11.271,13.941,11.737,14.518,11.737z M14.518,10.348c0.191,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.156-0.348-0.348C14.17,10.503,14.324,10.348,14.518,10.348z M14.518,15.212c0.574,0,1.041-0.467,1.041-1.043c0-0.575-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042C13.475,14.745,13.941,15.212,14.518,15.212z M14.518,13.822c0.191,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.155-0.348-0.348C14.17,13.978,14.324,13.822,14.518,13.822z M10,15.212c0.575,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042c-0.576,0-1.042,0.467-1.042,1.042C8.958,14.745,9.425,15.212,10,15.212z M10,13.822c0.192,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348s-0.348-0.155-0.348-0.348C9.653,13.978,9.809,13.822,10,13.822z M5.484,15.212c0.576,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042s-1.042,0.467-1.042,1.042C4.441,14.745,4.908,15.212,5.484,15.212z M5.484,13.822c0.192,0,0.347,0.155,0.347,0.347c0,0.192-0.155,0.348-0.347,0.348s-0.348-0.155-0.348-0.348C5.136,13.978,5.292,13.822,5.484,13.822z M10,11.737c0.575,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043c-0.576,0-1.042,0.467-1.042,1.043C8.958,11.271,9.425,11.737,10,11.737z M10,10.348c0.192,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348s-0.348-0.156-0.348-0.348C9.653,10.503,9.809,10.348,10,10.348z">
                                            </path>
						                            </svg>

                                        <h1 class="px-2 text-sm">'.$row['dob'].'</h1>
                                    </div>';
                                        
                            }
                        }
                       
                            echo'
                        </div>
                    </div>
                    <section class="text-gray-600 body-font">
                        <div class="container">
                            <div class="flex flex-wrap w-36 pt-8 flex-col items-center text-center">
                                <h1 class="text-md font-medium title-font text-gray-900">CLASSES CREATED</h1>
                            </div>
                           
                            <a class="w-10 h-10 mt-8 inline-flex items-center justify-center rounded-full bg-green-300 mb-2 mx-12 data-toggle="tooltip" title="Create Class" href="createClass.php">
                                <div class="shadow-2xl flex-shrink-0 w-16 h-16 bg-green-300 text-orange-400 rounded-full inline-flex items-center justify-center">
                                    <svg class="svg-icon" viewBox="0 0 20 20" style="width:2.8rem; height:2.8rem;">
                                        <path d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z">
                                        </path>
                                    </svg>
                                </div>
                            </a>
   
                            
                            <div class="flex flex-wrap w-36 pt-60 flex-col items-center text-center">
                                <h1 class="text-md font-medium title-font text-gray-900">CLASSES JOINED</h1>
                            </div>

                            <a class="w-10 h-10 mt-8 inline-flex items-center justify-center rounded-full bg-green-300 mb-2 mx-12 data-toggle="tooltip" title=" Join Class" id="myBtn">
                                <div class="shadow-2xl flex-shrink-0 w-16 h-16 bg-green-300 text-orange-400 rounded-full inline-flex items-center justify-center">
                                    <svg class="svg-icon" viewBox="0 0 20 20" style="width:2.8rem; height:2.8rem;">
                                        <path fill="none" d="M13.388,9.624h-3.011v-3.01c0-0.208-0.168-0.377-0.376-0.377S9.624,6.405,9.624,6.613v3.01H6.613c-0.208,0-0.376,0.168-0.376,0.376s0.168,0.376,0.376,0.376h3.011v3.01c0,0.208,0.168,0.378,0.376,0.378s0.376-0.17,0.376-0.378v-3.01h3.011c0.207,0,0.377-0.168,0.377-0.376S13.595,9.624,13.388,9.624z M10,1.344c-4.781,0-8.656,3.875-8.656,8.656c0,4.781,3.875,8.656,8.656,8.656c4.781,0,8.656-3.875,8.656-8.656C18.656,5.219,14.781,1.344,10,1.344z M10,17.903c-4.365,0-7.904-3.538-7.904-7.903S5.635,2.096,10,2.096S17.903,5.635,17.903,10S14.365,17.903,10,17.903z"></path>
                                    </svg>
                                </div>
                            </a>
                            
                        </div>
                    </section>
                    
                    <section class="text-gray-600 body-font">
                        <div class="container mx-auto scroll"> 
                            <div class="flex flex-wrap">'; 
                            if(isset($_SESSION['signedIn']) && $_SESSION['signedIn']==true)
                            {
                                
                                $email = $_SESSION['usremail'];
    
                                include '../../src/_dbconnect.php';
                                $sql = "SELECT class.*,user.usr_name FROM `class` INNER JOIN `user` ON class.u_email = user.usr_email WHERE user.usr_email='$email'";
                                $res = mysqli_query($con,$sql);
                                $numRows = mysqli_num_rows($res);

                                if($numRows>0){
                                    while($row = mysqli_fetch_assoc($res)){
                                        $cid = $row['class_id'];
                                        $cname = $row['class_name'];
                                        $uname = $row['usr_name'];
                                        echo'    
                                            <div class="lg:w-80 p-1">
                                                <div class="border-2 border-green-200 p-4 rounded-lg shadow-lg">
                                                    <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2">
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                    </div>
                                                    <h3 class="text-xs text-gray-900 font-medium">
                                                        '.$cid.'
                                                    </h3>
                                                    <h2 class="text-lg font-bold mt-1 text-gray-700 dark:text-gray-200 md:text-md">
                                                        '.$cname.'
                                                    </h2>
                                                    <div class="flex justify-between mt-1 item-center">
                                                        <h1 class="text-sm font-bold text-gray-700 dark:text-gray-200 md:text-md">
                                                            '.$uname.'
                                                        </h1>
                                                        <button class="px-2 py-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-green-800 rounded dark:bg-green-700 hover:bg-green-700 dark:hover:bg-green-600 focus:outline-none focus:bg-green-700 dark:focus:bg-gray-600">
                                                        <a href="class.php">
                                                            Open Class
                                                        </a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div> '
                                        ;
                                    }
                                }
                                else{
                                    echo'
                                        <div class="p-2 mt-8 w-full">
                                            <div class="bg-gray-100 rounded flex p-4 h-full items-center shadow-lg">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-yellow-500   w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                                    <path d="M22 4L12 14.01l-3-3"></path>
                                                </svg>
                                                <span class="title-font font-medium">No Classes Yet</span>
                                            </div>
                                        </div>  
                                    ';
                                }
                            }
                        echo'
                            </div>                       
                        </div>
                        
                        <div class="container mx-auto scroll mt-32"> 
                            <div class="flex flex-wrap">';
                            if(isset($_SESSION['signedIn']) && $_SESSION['signedIn']==true)
                            {
                                
                                $email = $_SESSION['usremail'];
    
                                include '../../src/_dbconnect.php';
                                $sql = "SELECT class.*, user.usr_name FROM `class` JOIN `std_class` ON class.class_id = std_class.class_id JOIN `user` ON user.usr_email = class.u_email WHERE std_class.u_email ='$email'";
                                $res = mysqli_query($con,$sql);
                                $numRows = mysqli_num_rows($res);

                                if($numRows>0){
                                    while($row = mysqli_fetch_assoc($res)){
                                        $cid = $row['class_id'];
                                        $cname = $row['class_name'];
                                        $uname = $row['usr_name'];
                                        echo'    
                                            <div class="lg:w-80 p-1">
                                                <div class="border-2 border-green-200 p-4 rounded-lg shadow-lg">
                                                    <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2">
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                    </div>
                                                    <h3 class="text-xs text-gray-900 font-medium">
                                                        '.$cid.'
                                                    </h3>
                                                    <h2 class="text-lg font-bold mt-1 text-gray-700 dark:text-gray-200 md:text-md">
                                                        '.$cname.'
                                                    </h2>
                                                    <div class="flex justify-between mt-1 item-center">
                                                        <h1 class="text-sm font-bold text-gray-700 dark:text-gray-200 md:text-md">
                                                            '.$uname.'
                                                        </h1>
                                                        <button class="px-2 py-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-green-800 rounded dark:bg-green-700 hover:bg-green-700 dark:hover:bg-green-600 focus:outline-none focus:bg-green-700 dark:focus:bg-gray-600">
                                                        <a href="class.php">
                                                            Open Class
                                                        </a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div> '
                                        ;
                                    }
                                }
                                else{
                                    echo'
                                        <div class="p-2 mt-16 w-full">
                                            <div class="bg-gray-100 rounded flex p-4 h-full items-center shadow-lg">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-yellow-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                                    <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                                    <path d="M22 4L12 14.01l-3-3"></path>
                                                </svg>
                                                <span class="title-font font-medium">No Classes Yet</span>
                                            </div>
                                        </div>  
                                    ';
                                }
                            } 
                            echo'                                             
                            </div>
                        </div>
                    </section>
                </div>';

                include '_footer.php';
            ?>
            </div>
            <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on the button, open the modal
                btn.onclick = function() {
                modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>
        </body>

        </html>
