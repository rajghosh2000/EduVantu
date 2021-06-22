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
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <title>EduVantu</title>
    <style>
        .container {
            font-family: 'Patrick Hand', cursive;
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

        .has-mask {
            position: absolute;
            clip: rect(10px, 150px, 130px, 10px);
        }

        input[type=range] {
            -webkit-appearance: none;
            margin: 20px 0;
            width: 100%;
        }

        input[type=range]:focus {
            outline: none;
        }

        input[type=range]::-webkit-slider-runnable-track {
            width: 100%;
            height: 4px;
            cursor: pointer;
            animate: 0.2s;
            background: #03a9f4;
            border-radius: 25px;
        }

        input[type=range]::-webkit-slider-thumb {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 0 4px 0 rgba(0, 0, 0, 1);
            cursor: pointer;
            -webkit-appearance: none;
            margin-top: -8px;
        }

        input[type=range]:focus::-webkit-slider-runnable-track {
            background: #03a9f4;
        }

        .range-wrap {
            width: 500px;
            position: relative;
        }

        .range-value {
            position: absolute;
            top: -50%;
        }

        .range-value span {
            width: 30px;
            height: 24px;
            line-height: 24px;
            text-align: center;
            background: #03a9f4;
            color: #fff;
            font-size: 12px;
            display: block;
            position: absolute;
            left: 50%;
            transform: translate(-50%, 0);
            border-radius: 6px;
        }

        .range-value span:before {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            border-top: 10px solid #03a9f4;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            margin-top: -1px;
        }
    </style>
</head>

<body>
    <div class="flex flex-col h-screen">
        <?php include '_header.php'; ?>
        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-4 mx-auto flex sm:flex-nowrap flex-wrap">
                <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0 p-10">
                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Feedback</h2>
                    <p class="leading-relaxed mb-5 text-gray-600">Post-ironic portland shabby chic echo park, banjo fashion axe</p>
                    <div class="relative mb-4">
                        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                        <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                        <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                        <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                    <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                </div>
                <div class="lg:w-2/3 md:w-1/2 bg-green-50 rounded-lg overflow-hidden flex flex-col md:ml-auto w-full mt-8 md:mt-0  p-1">

                    <div class="flex flex-col text-center w-3/4">
                        <h1 class="sm:text-3xl text-md font-medium title-font text-gray-900">Create Assignment</h1>
                    </div>
                    <div class="lg:w-full md:w-full mx-2 flex flex-wrap">
                        <div class="flex flex-wrap -m-2 w-full">
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">Assignment Name</label>
                                    <input type="text" id="name" name="name" class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out shadow-lg" required>
                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="message" class="leading-7 text-sm text-gray-600">Assignmnet Description</label>
                                    <textarea id="desc" name="desc" class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out shadow-lg"></textarea>
                                </div>
                            </div>
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">Due Date And Time</label>
                                    <input type="datetime-local" id="deadline" name="deadline" class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out shadow-lg" required>
                                </div>
                            </div>
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">Attach File</label>
                                    <input type="file" id="attach" name="attach" class="w-full bg-white bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out shadow-lg" required>
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="points" class="leading-7 text-sm text-gray-600">Points</label>
                                    <div class="range-wrap mt-2">
                                        <div class="range-value" id="rangeV"></div>
                                        <input type="range" id="points" name="points" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out shadow-lg" required min="0" max="100" step="1" value="30">
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 w-full ml-96">
                                <div class="relative">
                                    <button class="flex items-center px-5 py-2 text-sm font-medium tracking-wide text-center text-white capitalize transition-colors duration-200 transform bg-gray-700 rounded-lg hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                        Share Assignment
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php include '_footer.php'; ?>
    </div>
    <script>
        const
            range = document.getElementById('points'),
            rangeV = document.getElementById('rangeV'),
            setValue = () => {
                const
                    newValue = Number((range.value - range.min) * 100 / (range.max - range.min)),
                    newPosition = 10 - (newValue * 0.2);
                rangeV.innerHTML = `<span>${range.value}</span>`;
                rangeV.style.left = `calc(${newValue}% + (${newPosition}px))`;
            };
        document.addEventListener("DOMContentLoaded", setValue);
        range.addEventListener('input', setValue);
    </script>
</body>

</html>

<!-- <div class="flex flex-col items-center max-w-sm mx-2 mt-4 w-1/3">
                        <div class="w-full h-64 bg-gray-300 bg-center bg-cover rounded-lg shadow-md" style="background-image: url(https://images.unsplash.com/photo-1521903062400-b80f2cb8cb9d?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1050&q=80)"></div>

                        <div class="w-56 -mt-10 overflow-hidden bg-white rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
                            <h3 class="py-2 font-bold tracking-wide text-center text-gray-800 uppercase dark:text-white">Nike Revolt</h3>

                            <div class="flex items-center justify-between px-3 py-2 bg-gray-200 dark:bg-gray-700">
                                <span class="font-bold text-gray-800 dark:text-gray-200">$129</span>
                                <button class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-200 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="container lg:py-4 flex w-2/3 h-full my-4">
                        <div class="mx-auto lg:mx-2 overflow-hidden bg-green-50 rounded-lg shadow-xl dark:bg-gray-800 w-4/5">
                            <div class="flex flex-col text-center w-3/4">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Create Assignment</h1>
                            </div>
                            <div class="lg:w-full md:w-full mx-2 flex flex-wrap">
                                <div class="flex flex-wrap -m-2 w-2/3">
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="name" class="leading-7 text-sm text-gray-600">Assignment Name</label>
                                            <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out shadow-lg" required>
                                        </div>
                                    </div>

                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="message" class="leading-7 text-sm text-gray-600">Assignmnet Description</label>
                                            <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out shadow-lg"></textarea>
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2">
                                        <div class="relative">
                                            <label for="name" class="leading-7 text-sm text-gray-600">Due Date And Time</label>
                                            <input type="datetime-local" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out shadow-lg" required>
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2">
                                        <div class="relative">
                                            <label for="name" class="leading-7 text-sm text-gray-600">Attach File</label>
                                            <input type="file" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out shadow-lg" required>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label for="points" class="leading-7 text-sm text-gray-600">Points</label>
                                            <div class="range-wrap mt-2">
                                                <div class="range-value" id="rangeV"></div>
                                                <input type="range" id="points" name="points" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out shadow-lg" required min="0" max="100" step="1" value="30">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full ml-40">
                                        <div class="relative">
                                            <button class="flex items-center px-5 py-2 text-sm font-medium tracking-wide text-center text-white capitalize transition-colors duration-200 transform bg-gray-700 rounded-lg hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                                Share Assignment
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->