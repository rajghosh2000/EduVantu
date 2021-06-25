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
            $uemail = $_SESSION['usremail'];
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
                                </div>';
                                
                                $s = "SELECT class.u_email, assignment.assign_id FROM `class` JOIN `assignment` ON class.class_id=assignment.class_id WHERE assignment.assign_id='$aid';";
                                $r = mysqli_query($con,$s);
                                $rowR = mysqli_fetch_assoc($r);
                                $u_email = $rowR['u_email'];
                                if(strcmp($u_email,$uemail)==0){
                                      $sub = "SELECT submit.*, user.usr_name FROM `submit` JOIN `user` ON submit.u_email=user.usr_email WHERE submit.assign_id='$aid';";
                                      $resSub = mysqli_query($con,$sub);
                                      $numSub = mysqli_num_rows($resSub);

                                      echo'<h1 class="text-base font-bold title-font text-gray-900 tracking-widest mr-4">Submissions</h1>
                                      <div class="flex flex-wrap w-1/2 scroll">
                                                  <div class="w-88 md:pr-10 md:py-6">';

                                      if ($numSub > 0) {
                                          while ($rowsSub = mysqli_fetch_assoc($resSub)) {
                                              $sname = $rowsSub['usr_name'];
                                              $semail = $rowsSub['u_email'];
                                              $dos = date('Y-m-d h:i:s', strtotime($rowsSub['submit_stmp']));
                                              echo'
                                                      <div class="flex relative pb-12">
                                                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                                          <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                                        </div>
                                                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                                                          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                          </svg>
                                                        </div>
                                                        <div class="flex-grow pl-4">
                                                          <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">'.$sname.'</h2>
                                                          <p class="leading-relaxed text-sm">Date of Submission : '.$dos.'</p>
                                                          <p class="leading-relaxed text-xs">Turned In </p>
                                                          <a href="marksPg.php?assign='.$aid.'&stdemail='.$semail.'" class="px-2 py-1 text-sm font-bold text-black transition-colors duration-200 transform bg-green-400 rounded cursor-pointer hover:bg-green-500">Open Submission</a>
                                                        </div>
                                                      </div>
                                              ';
                                          }
                                      }
                                      else{
                                              echo'
                                              <div class="flex relative pb-12">
                                                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                                  <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                                </div>
                                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                                                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                                  </svg>
                                                </div>
                                                <div class="flex-grow pl-4">
                                                  <h2 class="font-bold title-font text-lg text-gray-900 mb-1 mt-4 tracking-wider">No Submissions Yet</h2>
                                                </div>
                                              </div>
                                          ';
                                      }
                                      echo'</div>
                                          </div>';
                                }
                                else{
                                      $chk = "SELECT submit.*, assignment.* FROM `submit` JOIN `assignment` ON submit.assign_id=assignment.assign_id WHERE submit.u_email='$uemail' AND submit.assign_id='$aid'";
                                      $resChk = mysqli_query($con,$chk);
                                      $noR = mysqli_num_rows($resChk);
                                      
                                      echo'
                                        <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full mb-68 md:py-8 mt-8 md:mt-0">
                                          <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Submit Assignment</h2>
                                          <p class="leading-relaxed mb-5 text-gray-600">Upload your file and Turn in the submission</p>
                                      ';

                                      if($noR>0){
                                          $rowChk = mysqli_fetch_assoc($resChk);
                                          $subdate = $rowChk['submit_stmp'];
                                          $dDate = $rowChk['assign_deadline'];
                                          $dueTime = new DateTime(date('Y-m-d h:i:s', strtotime($dDate)));
                                          $sTime = new DateTime(date('Y-m-d h:i:s', strtotime($subdate)));

                                          if($dueTime>=$sTime){
                                            echo'
                                              <h2 class="inline-flex items-center justify-center text-lg font-bold tracking-tight text-green-800 rounded-lg bg-gray-200 dark:bg-gray-700 shadow-lg px-4 ml-2">
                                                Turned In
                                              </h2>
                                            ';
                                          }
                                          else{
                                              echo'
                                              <h2 class="inline-flex items-center justify-center text-lg font-bold tracking-tight text-red-800 rounded-lg bg-gray-200 dark:bg-gray-700 shadow-lg px-4 ml-2">
                                                Turned In Late
                                              </h2>
                                            ';
                                          }
                                        echo'
                                          <div class="relative mb-4 mt-8">
                                            <label for="name" class="leading-7 text-sm text-gray-600">Upload File</label>
                                            <input type="file" id="attach" name="attach" class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out shadow-lg" accept=".jpg, .jpeg, .png, .pdf, .docx, .docx" onchange="Filevalidation()" disabled>
                                          </div>
                                          <button class="text-black bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg shadow-xl w-full" disabled>Turned In</button>
                                          </div>
                                        ';
                                      }
                                      else{
                                        $submissiondate = new DateTime($dueYear.'-'.$dueMonth.'-'.$dueDay.' '.$duetime);
                                        $now = new DateTime("now");
                                        if($submissiondate>$now){
                                              echo'
                                                <h2 class="inline-flex items-center justify-center text-lg font-bold tracking-tight text-green-800 rounded-lg bg-gray-200 dark:bg-gray-700 shadow-lg px-4 ml-2">
                                                  Turn In
                                                </h2>
                                              ';
                                        }
                                        else{
                                            echo'
                                            <h2 class="inline-flex items-center justify-center text-lg font-bold tracking-tight text-red-800 rounded-lg bg-gray-200 dark:bg-gray-700 shadow-lg px-4 ml-2">
                                              Missing 
                                            </h2>
                                          ';
                                        }

                                        echo'
                                                
                                            <form action="../../src/_submitAssign.php?class=' . $aid . '" method="post">
                                                <div class="relative mb-4 mt-8">
                                                    <label for="name" class="leading-7 text-sm text-gray-600">Upload File</label>
                                                    <input type="file" id="attach" name="attach" class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out shadow-lg" accept=".jpg, .jpeg, .png, .pdf, .docx, .docx" onchange="Filevalidation()" required>
                                                </div>
                                                <button class="text-black bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg shadow-xl w-full">Turn In</button>
                                            </form>
                                        </div>
                                        ';
                                      }
                                }
                                echo'
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
                if(cnt > now)
                {
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
                } 
            }, 1000);
        </script>';
        }
        ?>
        <script>
            Filevalidation = () => {
                const fi = document.getElementById('attach');
                if (fi.files.length > 0) {
                    for (const i = 0; i <= fi.files.length - 1; i++) {

                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        if (file >= 2048) {
                            alert(
                                "File too Big, please select a file less than 2mb");
                            document.getElementById('attach').value = "";
                        }
                    }
                }
            }
        </script>
    </body>
    
    </html>
    