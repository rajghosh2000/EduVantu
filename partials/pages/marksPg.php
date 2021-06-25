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
        <section class="text-gray-600 body-font relative">
            <div class="container py-4 px-2 mx-auto flex sm:flex-nowrap flex-wrap">
                <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex flex-wrap justify-start">
                    <div class="bg-white flex py-6 rounded shadow-lg mb-3 w-2/3">
                    <?php
                        if (isset($_SESSION['signedIn']) && $_SESSION['signedIn'] == true) {
                            include '../../src/_dbconnect.php';
                            $aid = $_GET['assign'];
                            $semail = $_GET['stdemail'];
                            $sql="SELECT submit.*, user.usr_name, assignment.assign_deadline, assignment.marks FROM `submit` JOIN `user` ON submit.u_email=user.usr_email JOIN `assignment` ON assignment.assign_id=submit.assign_id WHERE submit.u_email='$semail' AND submit.assign_id='$aid';";
                            $res = mysqli_query($con,$sql);
                            if($res){
                                $rows = mysqli_fetch_assoc($res);
                                $name = $rows['usr_name'];
                                $dateTime = $rows['submit_stmp'];
                                $sfile = $rows['submit_file'];
                                $tmarks = $rows['marks'];
                                $deadline = $rows['assign_deadline'];
                                echo'
                                    <div class="px-6">
                                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-base">'.$name.'</h2>
                                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-base">'.$semail.'</h2>
                                        <div class="flex flex-wrap">
                                            <div>
                                                <h2 class="title-font font-semibold text-gray-900 tracking-widest text-sm mt-4">Submission Date</h2>
                                                <p class="leading-relaxed">'.$dateTime.'</p>
                                            </div>
                                            <div class="pl-8">
                                                <h2 class="title-font font-semibold text-gray-900 tracking-widest text-sm mt-4">Turned In</h2>
                                                <p class="leading-relaxed">Late/Within Time</p>
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
                                <form class="bg-white flex py-6 rounded shadow-lg mb-3" action="../../src/_setMarks?assign=" method="post">
                                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-sm m-4">Set Marks : </h2>
                                    <div class="p-2 w-36">
                                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-base ml-2">Marks</h2>
                                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                            <div class="flex-grow">
                                                <input type="text" class="text-gray-900 title-font font-bold text-3xl w-20 h-20 px-2" id="marks" name="marks">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-36">
                                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg mt-5">
                                            <div class="flex-grow">
                                                <h2 class="text-gray-900 title-font font-bold text-4xl px-8">/</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-36">
                                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-base ml-2">Total Marks</h2>
                                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                            <div class="flex-grow">
                                                <h2 class="text-gray-900 title-font font-bold text-3xl">'.$tmarks.'</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-36">
                                        <button class="flex items-center px-2 py-2 mt-16 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-600 rounded-md dark:bg-green-800 hover:bg-green-500 dark:hover:bg-green-700 focus:outline-none focus:bg-green-500 dark:focus:bg-green-700">
                                            <svg class="svg-icon" viewBox="0 0 20 20" style="width:1.5em; height:1.5em;">
                                                <path fill="none" d="M16.198,10.896c-0.252,0-0.455,0.203-0.455,0.455v2.396c0,0.626-0.511,1.137-1.138,1.137H5.117c-0.627,0-1.138-0.511-1.138-1.137V7.852c0-0.626,0.511-1.137,1.138-1.137h5.315c0.252,0,0.456-0.203,0.456-0.455c0-0.251-0.204-0.455-0.456-0.455H5.117c-1.129,0-2.049,0.918-2.049,2.047v5.894c0,1.129,0.92,2.048,2.049,2.048h9.488c1.129,0,2.048-0.919,2.048-2.048v-2.396C16.653,11.099,16.45,10.896,16.198,10.896z"></path>
                                                <path fill="none" d="M14.053,4.279c-0.207-0.135-0.492-0.079-0.63,0.133c-0.137,0.211-0.077,0.493,0.134,0.63l1.65,1.073c-4.115,0.62-5.705,4.891-5.774,5.082c-0.084,0.236,0.038,0.495,0.274,0.581c0.052,0.019,0.103,0.027,0.154,0.027c0.186,0,0.361-0.115,0.429-0.301c0.014-0.042,1.538-4.023,5.238-4.482l-1.172,1.799c-0.137,0.21-0.077,0.492,0.134,0.629c0.076,0.05,0.163,0.074,0.248,0.074c0.148,0,0.294-0.073,0.382-0.207l1.738-2.671c0.066-0.101,0.09-0.224,0.064-0.343c-0.025-0.118-0.096-0.221-0.197-0.287L14.053,4.279z"></path>
                                            </svg>
                                            <span class="mx-1 text-black">Save Mark</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    ';
                }
            }
        ?>
        <?php include '_footer.php'; ?>
    </div>
</body>

</html>