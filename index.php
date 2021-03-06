<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo-icon.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>EduVantu</title>
</head>

<body>

    <!-- MODAL HERE -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <style>
            .container {
                font-family: 'Krona One', sans-serif;
            }

            .container .bdy {
                border-width: 2px;
                border-color: aliceblue;
            }
        </style>
        <script>
            var address = window.location.href; //Gets the content of address bar

            //Checks OTP was succesful
            var findUser = address.search("userId=true");
            if (findUser >= 0) {
                alert("Account Created!!!Kindly Login now with the credentials.");
            }

            var findErr = address.search("userId=false");
            if (findErr >= 0) {
                alert("OTP Error!!! Please Register Again and Provide with correct OTP");
            }
        </script>
        <div class="modal-dialog container" role="document">
            <div class="modal-content bg-transparent bdy">
                <div class="modal-header">
                    <h4 class="modal-title text-success" id="exampleModalLabel"><b>SIGN IN</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-success"> &times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="././src/_handleSignIn.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-success"><b>Email address</b></label>
                            <input type="email" class="form-control bg-transparent text-white" id="u_email" name="u_email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-success"><b>Password</b></label>
                            <input type="password" class="form-control bg-transparent text-white" id="u_pwd" name="u_pwd" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-success"><b>Submit</b></button>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Close</b></button>
                                </div>
                                <div class="col-lg-8">
                                    <a href="partials/pages/_signUp.html"><button type="button" class="btn btn-success w-64 ">
                                            <b>REGISTER NOW</b>
                                        </button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <small id="emailHelp" class="form-text text-white">** If new to the page please Register
                                First.</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CODE GOES HERE -->
    <video src="img/bg.mp4" muted loop autoplay playsinline></video>
    <div class="row no-gutters">
        <div class="col-md-6 no-gutters">
            <div class="left">
                <div class="col-lg-2 text middle" data-text="">
                    <b>EduVantu</b>
                </div>
                <div class="col-lg-9">
                    <img src="img/1.png">
                </div>
                <script>
                    var scr = screen.width;
                    var linked;
                    if (scr < 600) {
                        document.write('<div class="col-lg-1 btn-toggler">' + '<a href="#">Get Started</a>' + '</div>');
                    }
                </script>
                <!--  -->
            </div>
        </div>
        <div class="col-md-6 no-gutters">
            <div class="right">
                <section class="showcase">
                    <div class="overlay"></div>
                    <div class="text">
                        <img src="img/logo.png">
                        <h2>Traditional Learning in Virtual Manner</h2>
                        <a data-toggle="modal" data-target="#loginModal">Get Started</a>
                    </div>
                </section>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script>
        $("header").append("<div class='glitch-window'></div>");
        //fill div with clone of real header
        $("h2.glitched").clone().appendTo(".glitch-window");
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>