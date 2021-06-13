<?php
    session_start();
    if(isset($_SESSION['signedIn']) && $_SESSION['signedIn']==true)
    {
        echo'
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="icon" href="../../img/logo-icon.png">
                <link rel="preconnect" href="https://fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
                <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
                <title>EduVantu</title>
                <style>
                    .container {
                        font-family: "Krona One", sans-serif;
                    }
                </style>
            </head>

            <body>
                <div class="flex flex-col h-screen">';

                    include '_header.php';

                    echo'
                    <div class="flex max-w-lg mx-auto lg:mx-52 pt-4 pb-12 mt-8 mb-8 overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-5xl container">
                        <div class="hidden bg-cover lg:block lg:w-1/2" style="background-image:url('.'../../img/classcreate.jpg'.')"></div>
                        
                        <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
                            <form action="../../src/_handleCreateClass.php" method="post">
                                <h2 class="text-2xl font-semibold text-center text-gray-700 dark:text-white">EduVantu</h2>

                                <p class="text-sm mx-4 text-gray-600 dark:text-gray-200">Traditional Learning in Virtual Manner</p>

                                <div class="flex items-center justify-between mt-4">
                                    <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>

                                    <a href="#" class="text-xs text-center text-gray-500 uppercase dark:text-gray-400 hover:underline">Create Class</a>

                                    <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>
                                </div>

                                <div class="mt-4">
                                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="classcode">Class Code</label>
                                    <input id="classcode" name="classcode" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="text" required>
                                </div>
                                <div class="mt-4">
                                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="classname">Class Name</label>
                                    <input id="classname" name="classname" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="text" required>
                                </div>
                                <div class="mt-4">
                                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="classdesc">Class Info</label>
                                    <textarea id="classdesc" name="classdesc" rows = "3" cols = "40" maxlength = "100" wrap class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" type="email" style="resize: none;" required></textarea>
                                </div>

                                <div class="mt-8">
                                    <button class="w-full px-4 py-2 tracking-wide text-black transition-colors duration-200 transform bg-green-500 rounded hover:bg-green-600 focus:outline-none focus:bg-green-600">
                                    Create Class
                                    </button>
                                </div>
                                
                                <div class="flex items-center justify-between mt-4">
                                    <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>                    
                                    <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
                                </div>
                            </form>
                        </div>
                    </div>';

                    
                    include '_footer.php';
                    echo'    
                </div>
            </body>

            </html>';
    }
    else{
        http_response_code(404);
        header("Location: /eClass");
    }
?>