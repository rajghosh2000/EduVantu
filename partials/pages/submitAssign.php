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
    <link rel="stylesheet" href="../css/assign.css" class="stylesheet">
    <title>EduVantu</title>
    <style>
        .container {
            font-family: 'Kelly Slab', cursive;
        }

        .svg-icon {
            width: 1em;
            height: 1em;
        }

        .svg-icon path,
        .svg-icon polygon,
        .svg-icon rect {
            fill: #03203C;
        }

        .svg-icon circle {
            stroke: #03203C;
            stroke-width: 1;
        }
    </style>
</head>

<body>
    <div class="flex flex-col h-screen">
        <?php include '_header.php'; ?>
        <?php
        if (isset($_SESSION['signedIn']) && $_SESSION['signedIn'] == true) {
            include '../../src/_dbconnect.php';
            $aid = $_GET['class'];
            $sql = "SELECT * FROM `assignment` WHERE `assign_id`='$aid';";
            $res = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($res);
            $aname = $row['assign_name'];
            $desc = $row['assign_text'];
            $dueYear = date('Y', strtotime($row['assign_deadline']));
            $dueMonth = date('m', strtotime($row['assign_deadline']));
            $dueDay = date('d', strtotime($row['assign_deadline']));
            $duetime = date('h:i:s', strtotime($row['assign_deadline']));
            $marks = $row['marks'];
            $cid = $row['class_id'];
            $afile = $row['assign_file'];
            echo '
                        <section class="text-gray-600 body-font relative">
                            <div class="container py-4 px-2 mx-auto flex sm:flex-nowrap flex-wrap">
                                <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex flex-wrap justify-start">
                                    <div class="bg-white flex py-6 rounded shadow-lg mb-3">
                                        <div class="px-6">
                                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-base">'.$aname.'</h2>
                                            <p class="mt-1">'.$desc.'</p>
                                            <div class="flex flex-wrap">
                                                <div>
                                                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-sm mt-4">Due Date and Time</h2>
                                                    <p class="leading-relaxed">'.$dueYear.'-'.$dueMonth.'-'.$dueDay.' '.$duetime.'</p>
                                                </div>
                                                <div class="pl-8">
                                                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-sm mt-4">Points</h2>
                                                    <p class="leading-relaxed">'.$marks.'</p>
                                                </div>
                                                <div class="pl-8">
                                                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-sm mt-4">Class Code</h2>
                                                    <p class="leading-relaxed">'.$cid.'</p>
                                                </div>
                                            </div>
                                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-base mt-2">Attached File</h2>
                                            <button class="flex items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-600 rounded-md dark:bg-green-800 hover:bg-green-500 dark:hover:bg-green-700 focus:outline-none focus:bg-green-500 dark:focus:bg-green-700">
                                                <svg class="svg-icon" viewBox="0 0 20 20" style="width:1.5em; height:1.5em;">
                                                    <path fill="none" d="M15.608,6.262h-2.338v0.935h2.338c0.516,0,0.934,0.418,0.934,0.935v8.879c0,0.517-0.418,0.935-0.934,0.935H4.392c-0.516,0-0.935-0.418-0.935-0.935V8.131c0-0.516,0.419-0.935,0.935-0.935h2.336V6.262H4.392c-1.032,0-1.869,0.837-1.869,1.869v8.879c0,1.031,0.837,1.869,1.869,1.869h11.216c1.031,0,1.869-0.838,1.869-1.869V8.131C17.478,7.099,16.64,6.262,15.608,6.262z M9.513,11.973c0.017,0.082,0.047,0.162,0.109,0.226c0.104,0.106,0.243,0.143,0.378,0.126c0.135,0.017,0.274-0.02,0.377-0.126c0.064-0.065,0.097-0.147,0.115-0.231l1.708-1.751c0.178-0.183,0.178-0.479,0-0.662c-0.178-0.182-0.467-0.182-0.645,0l-1.101,1.129V1.588c0-0.258-0.204-0.467-0.456-0.467c-0.252,0-0.456,0.209-0.456,0.467v9.094L8.443,9.553c-0.178-0.182-0.467-0.182-0.645,0c-0.178,0.184-0.178,0.479,0,0.662L9.513,11.973z"></path>
                                                </svg>
                                                <span class="mx-1 text-black">Download</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bg-white flex py-6 rounded shadow-lg mb-3">
                                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-sm m-4">Time Remaining for Submission : </h2>
                                        <div class="p-2 w-36">
                                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-base ml-2">Days</h2>
                                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                                <div class="flex-grow">
                                                    <h2 class="text-gray-900 title-font font-bold text-3xl" id="days">00</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-36">
                                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-base ml-2">Hours</h2>
                                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                                <div class="flex-grow">
                                                    <h2 class="text-gray-900 title-font font-bold text-3xl" id="hrs">00</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-36">
                                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-base ml-2">Minutes</h2>
                                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                                <div class="flex-grow">
                                                    <h2 class="text-gray-900 title-font font-bold text-3xl" id="mins">00</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-36">
                                            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-base ml-2">Seconds</h2>
                                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                                <div class="flex-grow">
                                                    <h2 class="text-gray-900 title-font font-bold text-3xl" id="sec">00</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full mb-68 md:py-8 mt-8 md:mt-0">
                                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Submit Assignment</h2>
                                    <p class="leading-relaxed mb-5 text-gray-600">Upload your file and Turn in the submission</p>
                                    <h2 class="text-gray-900 text-sm mb-1 font-medium title-font">Turn In Now</h2>
                                    <div class="relative mb-4 mt-8">
                                        <label for="name" class="leading-7 text-sm text-gray-600">Upload File</label>
                                        <input type="file" id="attach" name="attach" class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out shadow-lg" accept=".jpg, .jpeg, .png, .pdf, .docx, .docx" onchange="Filevalidation()">
                                    </div>
                                    <button class="text-black bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg shadow-xl">Turn In</button>
                                </div>
                            </div>
                        </section>';
       
        include '_footer.php'; 
        
        $mon = "jan";
        switch ($dueMonth) {
            case 1:
              $mon = "jan";
              break;
            case 2:
              $mon = "feb";
              break;
            case 3:
                $mon = "mar";
              break;
            case 4:
                $mon = "apr";
              break;
            case 5:
                $mon = "may";
              break;
            case 6:
                $mon = "jun";
              break;
            case 7:
                $mon = "jul";
              break;
            case 8:
                $mon = "aug";
              break;
            case 9:
                $mon = "sep";
              break;
            case 10:
                $mon = "oct";
              break;
            case 11:
                $mon = "nov";
              break;
            case 12:
                $mon = "dec";
              break;
        }
        
        $duedate = $mon.' '.$dueDay.','.$dueYear.' '.$duetime;

        echo'
        </div>
        <script>
            var cnt = new Date("'.$duedate.'").getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();
                var d = cnt - now;
    
                var days = Math.floor(d / (1000 * 60 * 60 * 24));
                var hours = Math.floor((d % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((d % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((d % (1000 * 60)) / 1000);
    
                document.getElementById("days").innerHTML = days;
                document.getElementById("hrs").innerHTML = hours;
                document.getElementById("mins").innerHTML = minutes;
                document.getElementById("sec").innerHTML = seconds;
    
                if (d <= 0) {
                    clearInterval(x);
                }
            }, 1000);
    
            Filevalidation = () => {
                const fi = document.getElementById('.'attach'.');
                // Check if any file is selected.
                if (fi.files.length > 0) {
                    for (const i = 0; i <= fi.files.length - 1; i++) {
    
                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        // The size of the file.
                        if (file >= 2048) {
                            alert(
                                "File too Big, please select a file less than 2mb");
                            document.getElementById('.'attach'.').value = "";
                        }
                    }
                }
            }
        </script>
    </body>
    
    </html>
        ';
        }
    ?>
    