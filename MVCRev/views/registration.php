<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <style>
        .overlay-login * {
            color: white;
        }

        .overlay-login {
            display: block;
            position: fixed;
            top: 0;
            background: #3a3535;
            overflow: auto;
            z-index: 9999;
            padding: 3em 3em;
            right: 0%;
            left: 0%;
            height: 100%;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
        }

        .login-bghny {
            width: 40%;
            background: #232020;
            border-radius: 6px;
            -webkit-border-radius: 6px;
        }

        input[type="checkbox"] {
            display: inline-block;
        }

        button[type="submit"] {
            box-shadow: none;
            background: #ff7315;
            padding: 12px 20px;
            border-radius: 25px;
            border: none;
            color: #fff;
            font-size: 16px;
            display: block;
            width: 100%;
            font-weight: 600;
        }

        .home-icon {
            position: absolute;
            z-index: 10000;
            width: 50px;
            top: 50px;
            right: 10%;
        }
        input[type="text"],input[type="email"],input[type="tel"],input[type="password"], select, option{
            color: black !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="top-right-strip row">
            <a href="home">
                <img class="home-icon" src="assets/images/home-icon.png" alt="">
            </a>
            <!--//right-->
            <div class="overlay-login text-left">

                <div class="wrap">
                    <h5 class="text-center mb-4">Create new Account</h5>
                    <div class="login-bghny p-md-5 p-4 mx-auto mw-100">
                        <!--/login-form-->
                        <form method="post">
                            <div class="form-group">
                                <p class="login-texthny mb-2">User Name</p>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="Enter User Name" required="">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your emailwith anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                <p class="login-texthny mb-2">Password</p>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password" name="password" required="">
                            </div>
                            <div class="form-group">
                                <p class="login-texthny mb-2">Email Id</p>
                                <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" required="">
                            </div>
                            <div class="form-group">
                                <p class="login-texthny mb-2">Mobile Number</p>
                                <input type="tel" class="form-control" id="mobile" placeholder="Enter Your Mobile No" name="mobile" required="">
                            </div>
                            <div class="form-group">
                                <p class="login-texthny mb-2">Gender</p>
                                <input type="radio" name="gender" value="Male"> Male
                                <input type="radio" name="gender" value="Female"> Female
                            </div>
                            <div class="form-group">
                                <p class="login-texthny mb-2">Hobbies</p>
                                <input type="checkbox" name="chk[]" value="Cricket"> Cricket
                                <input type="checkbox" name="chk[]" value="Music"> Music
                                <input type="checkbox" name="chk[]" value="Travelling"> Travelling
                                <input type="checkbox" name="chk[]" value="Reading"> Reading
                            </div>
                            <div class="form-group">
                                <p class="login-texthny mb-2">City</p>
                                <select name="city" class="form-control" id="city">
                                    <option value="">Select City</option>
                                    <option value="1">Ahmedabad</option>
                                    <option value="2">Surat</option>
                                    <option value="3">Baroda</option>
                                    <option value="4">Anand</option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <p class="login-texthny mb-2">Profile Picture</p>
                                <input type="file" name="" accept="image/*" id="">   
                            </div> -->
                           

                            <button type="submit" name="regist" class="submit-login btn mb-4">Sign Up</button>

                        </form>
                        <!--//login-form-->
                    </div>
                    <!---->
                </div>
            </div>
        </div>
    </div>
</body>

</html>