<?php
    
    echo'
        <!-- Header -->
            <header class="text-gray-400 bg-gray-700 body-font">
                <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                    <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
                        <img src="../../img/logo-icon.png" class="w-60 h-16">
                    </a>
                    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">';
                        
                    if(isset($_SESSION['signedIn']) && $_SESSION['signedIn']==true)
                    {
                        echo'<a class="mr-5 hover:text-white">Welcome, '.$_SESSION['usremail'].'</a>';
                    }
                    
                    echo'
                    </nav>
                    <a class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-gray-800 text-yellow-400 mb-2 mx-8 data-toggle="tooltip" title="Your Account""
                        href="account.php">
                        <div class="flex-shrink-0 w-20 h-20 bg-gray-600 text-orange-400 rounded-full inline-flex items-center justify-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-24 h-12" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                    </a>
                    <a type="button" class="px-4 py-2 mx-2 font-medium tracking-wide text-black capitalize transition-colors duration-200 transform bg-green-500 rounded-md dark:bg-gray-800 hover:bg-green-800 dark:hover:bg-green-700 focus:outline-none focus:bg-green-500 dark:focus:bg-gray-700" href = "main.php">
                         Home
                    </a>
                    <a type="button" class="px-4 py-2 mx-2 font-medium tracking-wide text-black capitalize transition-colors duration-200 transform bg-green-500 rounded-md dark:bg-gray-800 hover:bg-green-800 dark:hover:bg-green-700 focus:outline-none focus:bg-green-500 dark:focus:bg-gray-700" href ="_logout.php">
                        Logout
                    </a>
                </div>
            </header>
        ';
?>