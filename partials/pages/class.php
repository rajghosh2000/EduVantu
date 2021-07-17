<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../img/logo-icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kelly+Slab&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>EduVantu</title>
    <style>
        .container {
            font-family: 'Kelly Slab', cursive;
        }

        .scroll {
            width: max-content;
            height: 550px;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .svg-icon {
            width: 1.5em;
            height: 1.5em;
        }

        .svg-icon path,
        .svg-icon polygon,
        .svg-icon rect {
            fill: #4691f6;
        }

        .svg-icon circle {
            stroke: #4691f6;
            stroke-width: 1;
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
    <div class="flex flex-col h-screen">
        <?php include '_header.php'; ?>

        <div class="lg:py-6 flex max-w-full w-full h-4/5">
            <div class="max-w-sm mx-auto lg:mx-4 overflow-hidden bg-green-50 rounded-lg shadow-xl dark:bg-gray-800 lg:w-1/2">
                <div class="h-48 overflow-hidden">
                    <video src="../../img/class.mp4" width="1000" height="400" preload muted loop autoplay playsinline class="rounded-lg"></video>
                   
                </div>

                <div class="flex items-center px-6 py-3 bg-gray-900">
                    <svg class="svg-icon" viewBox="0 0 20 20">
                        <path d="M17.237,3.056H2.93c-0.694,0-1.263,0.568-1.263,1.263v8.837c0,0.694,0.568,1.263,1.263,1.263h4.629v0.879c-0.015,0.086-0.183,0.306-0.273,0.423c-0.223,0.293-0.455,0.592-0.293,0.92c0.07,0.139,0.226,0.303,0.577,0.303h4.819c0.208,0,0.696,0,0.862-0.379c0.162-0.37-0.124-0.682-0.374-0.955c-0.089-0.097-0.231-0.252-0.268-0.328v-0.862h4.629c0.694,0,1.263-0.568,1.263-1.263V4.319C18.5,3.625,17.932,3.056,17.237,3.056 M8.053,16.102C8.232,15.862,8.4,15.597,8.4,15.309v-0.89h3.366v0.89c0,0.303,0.211,0.562,0.419,0.793H8.053z M17.658,13.156c0,0.228-0.193,0.421-0.421,0.421H2.93c-0.228,0-0.421-0.193-0.421-0.421v-1.263h15.149V13.156z M17.658,11.052H2.509V4.319c0-0.228,0.193-0.421,0.421-0.421h14.308c0.228,0,0.421,0.193,0.421,0.421V11.052z"></path>
                    </svg>

                    <?php
                    if (isset($_SESSION['signedIn']) && $_SESSION['signedIn'] == true) {
                        $cid = $_GET['class'];
                        $email = $_SESSION['usremail'];

                        include '../../src/_dbconnect.php';

                        $sql = "SELECT class.*, user.usr_name FROM `class` JOIN `user` ON class.u_email = user.usr_email WHERE class.class_id='$cid'";
                        $res = mysqli_query($con, $sql);
                        if ($res) {
                            $row = mysqli_fetch_assoc($res);
                            $cname = $row['class_name'];
                            $uname = $row['usr_name'];
                            $desc = $row['class_desc'];
                            $code = $row['class_join_code'];
                            $uemail = $row['u_email'];

                            echo '
                                    <h1 class="mx-3 text-lg font-semibold text-white">Class Details</h1>
                                </div>
                            ';
                            echo '
                                <div class="px-6 py-4">
                                    <h2 class="inline-flex items-center justify-center text-2xl px-2 mt-4 font-bold tracking-tight text-green-800 uppercase rounded-lg bg-gray-200 dark:bg-gray-700 shadow-lg">
                                        ' . $cname . '
                                    </h2>
                                </div>
                                <div class="px-6 mt-2">
                                    <div class="flex items-center mt-4 text-gray-700 dark:text-gray-200">
                                        <svg class="w-6 h-6 text-green-900 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2">
                                            </path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <h2 class="inline-flex items-center justify-center text-lg font-bold tracking-tight text-green-800 rounded-lg bg-gray-200 dark:bg-gray-700 shadow-lg px-4 ml-2">
                                            ' . $uname . '
                                        </h2>
                
                                    </div>
                                    <div class="flex items-center text-gray-700 dark:text-gray-200 mt-4">
                                        <svg class="svg-icon" viewBox="0 0 20 20">
                                            <path d="M8.627,7.885C8.499,8.388,7.873,8.101,8.13,8.177L4.12,7.143c-0.218-0.057-0.351-0.28-0.293-0.498c0.057-0.218,0.279-0.351,0.497-0.294l4.011,1.037C8.552,7.444,8.685,7.667,8.627,7.885 M8.334,10.123L4.323,9.086C4.105,9.031,3.883,9.162,3.826,9.38C3.769,9.598,3.901,9.82,4.12,9.877l4.01,1.037c-0.262-0.062,0.373,0.192,0.497-0.294C8.685,10.401,8.552,10.18,8.334,10.123 M7.131,12.507L4.323,11.78c-0.218-0.057-0.44,0.076-0.497,0.295c-0.057,0.218,0.075,0.439,0.293,0.495l2.809,0.726c-0.265-0.062,0.37,0.193,0.495-0.293C7.48,12.784,7.35,12.562,7.131,12.507M18.159,3.677v10.701c0,0.186-0.126,0.348-0.306,0.393l-7.755,1.948c-0.07,0.016-0.134,0.016-0.204,0l-7.748-1.948c-0.179-0.045-0.306-0.207-0.306-0.393V3.677c0-0.267,0.249-0.461,0.509-0.396l7.646,1.921l7.654-1.921C17.91,3.216,18.159,3.41,18.159,3.677 M9.589,5.939L2.656,4.203v9.857l6.933,1.737V5.939z M17.344,4.203l-6.939,1.736v9.859l6.939-1.737V4.203z M16.168,6.645c-0.058-0.218-0.279-0.351-0.498-0.294l-4.011,1.037c-0.218,0.057-0.351,0.28-0.293,0.498c0.128,0.503,0.755,0.216,0.498,0.292l4.009-1.034C16.092,7.085,16.225,6.863,16.168,6.645 M16.168,9.38c-0.058-0.218-0.279-0.349-0.498-0.294l-4.011,1.036c-0.218,0.057-0.351,0.279-0.293,0.498c0.124,0.486,0.759,0.232,0.498,0.294l4.009-1.037C16.092,9.82,16.225,9.598,16.168,9.38 M14.963,12.385c-0.055-0.219-0.276-0.35-0.495-0.294l-2.809,0.726c-0.218,0.056-0.351,0.279-0.293,0.496c0.127,0.506,0.755,0.218,0.498,0.293l2.807-0.723C14.89,12.825,15.021,12.603,14.963,12.385"></path>
                                        </svg>
                
                                        <h2 class="inline-flex items-center justify-center text-lg font-bold tracking-tight text-green-800 rounded-lg bg-gray-200 dark:bg-gray-700 shadow-lg px-4 ml-2">
                                            ' . $cid . '
                                        </h2>
                                    </div>
                                    <div class="flex items-center text-gray-700 dark:text-gray-200 mt-4">
                                        <svg class="svg-icon" viewBox="0 0 20 20" style="width: 30px; height:30px;">
                                            <path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
                                        </svg>
                
                                        <h2 class="inline-flex items-center justify-center text-xs font-bold tracking-tight text-green-800 px-2 ml-2">
                                            ' . $desc . '
                                        </h2>
                                    </div>
                                    <div class="flex items-center text-gray-700 dark:text-gray-200 mt-4">
                                        <input type="text" value="Joining Code : " class="inline-flex items-center justify-center text-sm font-bold tracking-tight text-green-800 w-24" readonly="readonly">
                                        <input type="text" value="' . $code . '" id="myInput" class="inline-flex items-center justify-center text-sm font-bold tracking-tight text-green-800 w-20" readonly="readonly">                                        
                
                                        <button onclick="myFunction()" class="flex items-center font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-transparent rounded-md dark:bg-transparent hover:bg-transparent dark:hover:bg-transparent focus:outline-none focus:bg-transparent dark:focus:bg-transparent"data-toggle="tooltip" title="Copy Code" >
                                            <svg class="svg-icon" viewBox="0 0 20 20" style="fill:black;">
                                                <path d="M17.391,2.406H7.266c-0.232,0-0.422,0.19-0.422,0.422v3.797H3.047c-0.232,0-0.422,0.19-0.422,0.422v10.125c0,0.232,0.19,0.422,0.422,0.422h10.125c0.231,0,0.422-0.189,0.422-0.422v-3.797h3.797c0.232,0,0.422-0.19,0.422-0.422V2.828C17.812,2.596,17.623,2.406,17.391,2.406 M12.749,16.75h-9.28V7.469h3.375v5.484c0,0.231,0.19,0.422,0.422,0.422h5.483V16.75zM16.969,12.531H7.688V3.25h9.281V12.531z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            ';
                            if ((strcmp($email, $uemail)) == 0) {
                                echo '
                                <section class="text-gray-600 body-font scroll">
                                    <div class="container mr-20 flex flex-wrap">
                                        <div class="flex relative pt-10 pb-10 sm:items-center md:w-full mx-auto">
                                            <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row ">
                                                <a class="flex-shrink-0 w-20 h-20 bg-green-100 text-green-500 rounded-full inline-flex items-center justify-center shadow-lg" href="assignCreate.php?class=' . $cid . '" data-toggle="tooltip" title="Create Assignment">
                                                    <svg class="svg-icon" viewBox="0 0 20 20" style="width: 3em; height:3em;">
                                                        <path d="M16.469,8.924l-2.414,2.413c-0.156,0.156-0.408,0.156-0.564,0c-0.156-0.155-0.156-0.408,0-0.563l2.414-2.414c1.175-1.175,1.175-3.087,0-4.262c-0.57-0.569-1.326-0.883-2.132-0.883s-1.562,0.313-2.132,0.883L9.227,6.511c-1.175,1.175-1.175,3.087,0,4.263c0.288,0.288,0.624,0.511,0.997,0.662c0.204,0.083,0.303,0.315,0.22,0.52c-0.171,0.422-0.643,0.17-0.52,0.22c-0.473-0.191-0.898-0.474-1.262-0.838c-1.487-1.485-1.487-3.904,0-5.391l2.414-2.413c0.72-0.72,1.678-1.117,2.696-1.117s1.976,0.396,2.696,1.117C17.955,5.02,17.955,7.438,16.469,8.924 M10.076,7.825c-0.205-0.083-0.437,0.016-0.52,0.22c-0.083,0.205,0.016,0.437,0.22,0.52c0.374,0.151,0.709,0.374,0.997,0.662c1.176,1.176,1.176,3.088,0,4.263l-2.414,2.413c-0.569,0.569-1.326,0.883-2.131,0.883s-1.562-0.313-2.132-0.883c-1.175-1.175-1.175-3.087,0-4.262L6.51,9.227c0.156-0.155,0.156-0.408,0-0.564c-0.156-0.156-0.408-0.156-0.564,0l-2.414,2.414c-1.487,1.485-1.487,3.904,0,5.391c0.72,0.72,1.678,1.116,2.696,1.116s1.976-0.396,2.696-1.116l2.414-2.413c1.487-1.486,1.487-3.905,0-5.392C10.974,8.298,10.55,8.017,10.076,7.825">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <button class="px-2 ml-4 py-1 text-sm font-semibold text-white uppercase transition-colors duration-200 transform bg-green-800 rounded hover:bg-green-700 dark:hover:bg-green-600 focus:bg-green-700 dark:focus:bg-green-600 focus:outline-none shadow-lg">Create Assignment</button>
                                    </div>
                                </section>  
                            ';
                            }
                        }
                    }
                    ?>
                    <section class="text-gray-600 body-font scroll">
                        <div class="container mx-auto flex flex-wrap">
                            <?php
                            if (isset($_SESSION['signedIn']) && $_SESSION['signedIn'] == true) {
                                include '../../src/_dbconnect.php';
                                $cid = $_GET['class'];
                                $sql = "SELECT assign_name, assign_text, assign_id FROM `assignment` WHERE `class_id`='$cid';";
                                $res = mysqli_query($con, $sql);
                                $numRows = mysqli_num_rows($res);

                                if ($numRows > 0) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $aname = $row['assign_name'];
                                        $atext = $row['assign_text'];
                                        $aid = $row['assign_id'];
                                        echo '
                                                <div class="flex relative pb-10 sm:items-center md:w-full mx-auto">
                                                    <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
                                                        <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                                    </div>
                                                <div class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-green-500 text-white relative z-10 title-font font-medium text-sm">1</div>
                                                <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
                                                    <div class="flex-shrink-0 w-24 h-24 bg-green-100 text-green-500 rounded-full inline-flex items-center justify-center">
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-12 h-12" viewBox="0 0 24 24">
                                                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                    </div>
                                                    <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                                                        <h2 class="font-medium title-font text-gray-900 mb-1 text-xl">' . $aname . '</h2>
                                                        <p class="leading-relaxed">' . $atext . '</p>
                                                        <a class="px-4 py-1 text-xs font-bold text-white uppercase transition-colors duration-200 transform bg-green-800 rounded dark:bg-green-700 hover:bg-green-700 dark:hover:bg-green-600 focus:outline-none focus:bg-green-700 dark:focus:bg-green-600" href="submissionPg.php?class=' . $aid . '">Open</a>
                                                    </div>
                                                </div>
                                                </div>
                                            ';
                                    }
                                } else {
                                    echo '
                                        <div class="flex relative sm:items-center w-full">
                                            <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
                                                <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                            </div>
                                            <div class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-yellow-500 text-white relative z-10 title-font font-medium text-sm">
                                                0
                                            </div>
                                            <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
                                                <div class="flex-shrink-0 w-24 h-24 bg-green-100 text-yellow-500 rounded-full inline-flex items-center justify-center">
                                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-12 h-12" viewBox="0 0 24 24">
                                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg>
                                                </div>
                                                <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                                                    <h2 class="font-medium title-font text-gray-900 mb-1 text-xl">No Assignments Yet</h2>
                                                    <p class="leading-relaxed"></p>
                                                </div>
                                            </div>
                                        </div>
                                        ';
                                }
                            }
                            ?>
                        </div>
                    </section>
                </div>
                <?php include '_footer.php'; ?>
            </div>
            <script>
                function myFunction() {
                    var copyText = document.getElementById("myInput");
                    copyText.select();
                    copyText.setSelectionRange(0, 99999)
                    document.execCommand("copy");
                    alert("Copied the text: " + copyText.value);
                }
            </script>
</body>

</html>