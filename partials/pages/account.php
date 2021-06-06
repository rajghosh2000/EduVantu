<?php
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
            <style>            
                .svg-icon {
                width: 1.4em;
                height: 1.4em;
                }
                
                .svg-icon path,
                .svg-icon polygon,
                .svg-icon rect {
                }
                
                .svg-icon circle {
                stroke: #4691f6;
                stroke-width: 1;
                }
            </style>
        </head>

        <body>
            <div class="flex flex-col h-screen">';

                include '_header.php';

                echo'
                <div class="bg-white dark:bg-gray-800 py-2 lg:py-16">
                    <div class="max-w-sm mx-auto lg:mx-8 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        <img class="object-cover object-center w-full h-56 lg:h-72" src="../../img/acc.jpg" alt="avatar">

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
                </div>';

                include '_footer.php';
            echo'
            </div>
        </body>

        </html>';
?>