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
        .modal {
            transition: opacity 0.25s ease;
        }

        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>
    
    <!--JOIN CLass Modal-->
    <div
        class="modal fade opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div
            class="modal-container bg-transparent border-4 border-black w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">


            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold text-white">Join Class</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>

                <!--Body-->
                <p class="text-xl font-bold text-white">Enter the Class Code</p>
                <form>
                    <div class="w-full mt-4">
                        <input
                            class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border-2 border-black rounded-md dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-500 focus:text-2xl dark:focus:border-blue-500 focus:outline-none focus:ring"
                            type="text" placeholder="Class Code" aria-label="ClassCode">
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a href="#" class="text-sm text-gray-600 dark:text-gray-200 hover:text-gray-500"></a>

                        <button
                            class="px-4 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded hover:bg-gray-600 focus:outline-none"
                            type="button">
                            JOIN
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>

    
    <!-- Main Part Starts Here -->
    <div class="flex flex-col h-screen">
        
        <?php 
             if(isset($_SESSION['signedIn']) && $_SESSION['signedIn']==true)
                {
                    include '_header.php';
                    echo'
                    <main class="text-gray-600 bg-gray-200 body-font flex-grow">
                        <div class="container px-5 py-10 mx-auto">
                            <div class="flex flex-wrap -mx-4 -mb-10 text-center">
                                <div class="sm:w-1/2 mb-10 px-4">
                                    <div class="rounded-lg h-64 overflow-hidden">
                                        <img alt="create class" class="object-cover object-center h-full w-full"
                                            src="../../img/create.jpg">
                                    </div>
                                    <h2 class="title-font text-4xl font-medium text-gray-900 mt-6 mb-3">Create Class</h2>
                                    <button
                                        class="rounded-full h-24 w-24 flex items-center justify-center shadow mx-auto mt-6 text-white bg-green-700 border-0 py-2 px-5 focus:outline-none hover:bg-green-900"><svg
                                            class="svg-icon" viewBox="0 0 20 20">
                                            <path
                                                d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z">
                                            </path>
                                        </svg></button>
                                </div>
                                <div class="sm:w-1/2 mb-10 px-4">
                                    <div class="rounded-lg h-64 overflow-hidden">
                                        <img alt="join class" class="object-cover object-center h-full w-full"
                                            src="../../img/join.jpg">
                                    </div>
                                    <h2 class="title-font text-4xl font-medium text-gray-900 mt-6 mb-3">Join Class</h2>
                                    <button
                                        class="joinmodal-open rounded-full h-24 w-24 flex items-center justify-center mx-auto mt-6 shadow text-white bg-green-700 border-0 py-2 px-5 focus:outline-none hover:bg-green-900">
                                        <svg class="svg-icon" viewBox="0 0 20 20">
                                            <path fill="none"
                                                d="M13.388,9.624h-3.011v-3.01c0-0.208-0.168-0.377-0.376-0.377S9.624,6.405,9.624,6.613v3.01H6.613c-0.208,0-0.376,0.168-0.376,0.376s0.168,0.376,0.376,0.376h3.011v3.01c0,0.208,0.168,0.378,0.376,0.378s0.376-0.17,0.376-0.378v-3.01h3.011c0.207,0,0.377-0.168,0.377-0.376S13.595,9.624,13.388,9.624z M10,1.344c-4.781,0-8.656,3.875-8.656,8.656c0,4.781,3.875,8.656,8.656,8.656c4.781,0,8.656-3.875,8.656-8.656C18.656,5.219,14.781,1.344,10,1.344z M10,17.903c-4.365,0-7.904-3.538-7.904-7.903S5.635,2.096,10,2.096S17.903,5.635,17.903,10S14.365,17.903,10,17.903z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </main>';

                    include '_footer.php';
                }
                else{
                    http_response_code(404);
                    header("Location: /eClass");
                }
        ?>
                  
                </div>
                <script>
                    var openmodal = document.querySelectorAll('.joinmodal-open')
                    for (var i = 0; i < openmodal.length; i++) {
                        openmodal[i].addEventListener('click', function (event) {
                            event.preventDefault()
                            toggleModal()
                        })
                    }

                    const overlay = document.querySelector('.modal-overlay')
                    overlay.addEventListener('click', toggleModal)

                    var closemodal = document.querySelectorAll('.modal-close')
                    for (var i = 0; i < closemodal.length; i++) {
                        closemodal[i].addEventListener('click', toggleModal)
                    }

                    document.onkeydown = function (evt) {
                        evt = evt || window.event
                        var isEscape = false
                        if ("key" in evt) {
                            isEscape = (evt.key === "Escape" || evt.key === "Esc")
                        } else {
                            isEscape = (evt.keyCode === 27)
                        }
                        if (isEscape && document.body.classList.contains('modal-active')) {
                            toggleModal()
                        }
                    };


                    function toggleModal() {
                        const body = document.querySelector('body')
                        const modal = document.querySelector('.modal')
                        modal.classList.toggle('opacity-0')
                        modal.classList.toggle('pointer-events-none')
                        body.classList.toggle('modal-active')
                    }
                </script>
            </body>

            </html>