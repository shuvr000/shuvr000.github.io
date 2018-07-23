<?php
    include('dbconnection.php');

    session_start(); 
    
    $msg = "";

    $query = "SELECT * FROM category_list";
    $result_cat = $conn -> query($query);

    $ses_sql="SELECT * FROM post_info";
    $result = $conn->query($ses_sql);

    if (isset($_POST['register'])) {
        if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm-password']) || empty($_POST['address'])) {
            $msg = "One or More Field Are Empty!";
        }
        else{
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $name=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $address=$_POST['address'];
            $querySelect = "INSERT INTO user(first_name,last_name,user_name,email,password,address,date) VALUES('$first_name','$last_name','$name', '$email', '$password', '$address', NOW())";

            $rows = $conn->query($querySelect);

            if ($rows == 1) {
                $msg = "<span class='reg'>Your are succesfully registered to Blogger! <br> Please login</span>";
            } 
            else {
                $msg = "Some field is empty or invalid";
            }
            
        }
    }

    if (isset($_POST['submit'])) {
        if (empty($_POST['l_username']) || empty($_POST['l_password'])) {
            $msg = "<span class='reg'>One or More Field Are Empty!</span>";
        }
        else{
            $l_name=$_POST['l_username'];
            $l_password=$_POST['l_password'];
            $queryselect = "SELECT * FROM user WHERE user_name='$l_name' AND password='$l_password'";

            $rows = $conn->query($queryselect);
            $rowscount = mysqli_num_rows($rows);
            
            if ($rowscount > 0) {
                $_SESSION['login_user']= $l_name;
                header("Location: ../user/us_index.php");
            } else {
                $msg="<span class='reg'>Email or password is invalid</span>";
            }
            
        }
    }


    $conn->close();
?>

    <html>

    <head>
        <title>Final Project</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Salauddin Naeem">
        <meta name="description" content="HTML, CSS, JavaScript, jQuery, Bootstrap, ResponsiveWebPage, FinalProject, Web Development">
        <!-- Latest compiled and minified Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Bootstrap Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Font Awesome 5 CDN Link -->
        <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Markazi+Text|Play" rel="stylesheet">

        <link href="../css/style1.css" type="text/css" rel="stylesheet">

        <style type="text/css">
            .panel-login {
                border-color: #ccc;
                -webkit-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
                box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
            }
            
            .panel-login>.panel-heading {
                color: #00415d;
                background-color: #fff;
                border-color: #fff;
                text-align: center;
            }
            
            .panel-login>.panel-heading a {
                text-decoration: none;
                color: #666;
                font-weight: bold;
                font-size: 15px;
                -webkit-transition: all 0.1s linear;
                -moz-transition: all 0.1s linear;
                transition: all 0.1s linear;
            }
            
            .panel-login>.panel-heading a.active {
                color: #029f5b;
                font-size: 18px;
            }
            
            input {
                margin: 10px 0;
            }
            
            .panel-login>.panel-heading hr {
                margin-top: 10px;
                margin-bottom: 0px;
                clear: both;
                border: 0;
                height: 1px;
                background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
                background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
                background-image: -ms-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
                background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
            }
            
            .panel-login input[type="text"],
            .panel-login input[type="email"],
            .panel-login input[type="password"] {
                height: 45px;
                border: 1px solid #ddd;
                font-size: 16px;
                -webkit-transition: all 0.1s linear;
                -moz-transition: all 0.1s linear;
                transition: all 0.1s linear;
            }
            
            .panel-login input:hover,
            .panel-login input:focus {
                outline: none;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                box-shadow: none;
                border-color: #ccc;
            }
            
            .btn-login {
                background-color: #59B2E0;
                outline: none;
                color: #fff;
                font-size: 14px;
                height: auto;
                font-weight: normal;
                padding: 14px 0;
                text-transform: uppercase;
                border-color: #59B2E6;
            }
            
            .btn-login:hover,
            .btn-login:focus {
                color: #fff;
                background-color: #53A3CD;
                border-color: #53A3CD;
            }
            
            .forgot-password {
                text-decoration: underline;
                color: #888;
            }
            
            .forgot-password:hover,
            .forgot-password:focus {
                text-decoration: underline;
                color: #666;
            }
            
            .btn-register {
                background-color: #1CB94E;
                outline: none;
                color: #fff;
                font-size: 14px;
                height: auto;
                font-weight: normal;
                padding: 14px 0;
                text-transform: uppercase;
                border-color: #1CB94A;
            }
            
            .btn-register:hover,
            .btn-register:focus {
                color: #fff;
                background-color: #1CA347;
                border-color: #1CA347;
            }
            
            .announce {
                text-transform: capitalize;
            }
            
            .error {
                color: #e86458;
            }
        </style>
    </head>

    <body>

        <header>
            <div class="container_width">
                <div class="navigation">
                    <nav class="navbar">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="index.php"><img src="../img/the_logo.png" class="img-responsive" alt="logo"></a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a class="hover-bottom" href="index.php">Home</a>
                                    </li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Post Type
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <?php
                                              $query = "SELECT * FROM category_list";
                                              $result_cat = $conn -> query($query);

                                              while($row_cat = $result_cat->fetch_assoc()) {
                                            ?>
                                                <li>
                                                    <a target="_blank" href="category.php?id=<?php echo $row_cat['id'];?>" id="<?php echo $row_cat["id"] ?>">
                                                        <?php echo $row_cat["category"]?>
                                                    </a>
                                                </li>
                                                <?php
                                                   }
                                                ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="login.php" class="hover-bottom">Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="announce">
                    BEGINNER'S GUIDE FOR BLOGGER / Start your blogging in a minutes
                </div>
            </div>
        </header>

        <div class="main_section">
            <div class="container_width">
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="left_section">
                        <h3>Login Form</h3>
                        <?php
                            if (isset($_POST['register'])) {
                                echo $msg;
                            }
                            if (isset($_POST['submit'])) {
                                echo $msg;
                            }
                        ?>
                            <div class="">
                                <div class="row">
                                    <style type="text/css">
                                        .col-md-8 {
                                            float: none !important;
                                            margin: 25px auto 10px;
                                        }
                                    </style>
                                    <div class="col-md-8">
                                        <div class="panel panel-login">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <a href="#" class="active" id="login-form-link">Login</a>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <a href="#" id="register-form-link">Register</a>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <form id="login-form" action="" method="post" role="form" style="display: block;">
                                                            <div class="form-group">
                                                                <input type="text" name="l_username" id="l_username" class="form-control" placeholder="Username" value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="l_password" id="l_password" tabindex="2" class="form-control" placeholder="Password">
                                                            </div>
                                                            <div class="form-group text-center">
                                                                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                                                <label for="remember"> Remember Me</label>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-md-offset-3">
                                                                        <input type="submit" name="submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="text-center">
                                                                            <a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <!-- Register -->
                                                        <form id="register-form" action="" method="POST" role="form" style="display: none;">
                                                            <div class="form-group">
                                                                <input required type="text" name="first_name" class="form-control" placeholder="First Name" value="" class="name" id="first_name">
                                                                <span id="error_msg_f" class="error"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <input required type="text" name="last_name" class="form-control" placeholder="Last Name" value="" class="name" id="last_name">
                                                                <span id="error_msg_l" class="error"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <input required type="text" name="username" id="username" class="form-control" placeholder="Username" value="">
                                                                <span id="error_msg_usr" class="error"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <input required type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="">
                                                                <span id="error_msg_email" class="error"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <input required type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                                                <span id="error_msg_password" class="error"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <input required type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                                                <span id="error_msg_password_re" class="error"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <input required type="text" name="address" id="address" class="form-control" placeholder="Address...">
                                                                <span id="error_msg_address" class="error"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-md-offset-3">
                                                                        <input type="submit" name="register" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 hidden-xs">
                    <div class="row">
                        <div class="social box_1">
                            <h4>Follow Us On Social Media</h4>
                            <div class="topUpperRight">
                                <a class="fb" href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="in" href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="tw" href="#">
                                    <span class="fab fa-twitter"></span>
                                </a>
                                <a class="li" href="#">
                                    <span class="fab fa-linkedin-in"></span>
                                </a>
                            </div>
                        </div>
                        <div class="social box_2">
                            <a href="#">
                                <img src="http://www.maduramaha.com/wp-content/uploads/2016/11/How-to-Start-a-Blog-by-The-Blog-madura-maha.png" class="img-responsive" alt="get_started">
                            </a>
                        </div>
                        <div class="social box_3">
                            <div class="sidebarhelpwith widget">
                                <div class="widgetheading">
                                    <h4>I need help with...</h4>
                                </div>
                                <div class="guideicons">
                                    <a href="https://www.wpbeginner.com/start-a-wordpress-blog/" class="guideicon starting">Starting a Blog</a>
                                    <a href="https://www.wpbeginner.com/wordpress-performance-speed/" class="guideicon speed">Website Performance</a>
                                    <a href="https://www.wpbeginner.com/wordpress-security/" class="guideicon security">Website Security</a>
                                    <a href="https://www.wpbeginner.com/wordpress-seo/" class="guideicon seo">SEO</a>
                                </div>
                                <br>
                                <div class="guidesearch">
                                    <form method="get" class="searchform search-form" action="" _lpchecked="1">
                                        <input type="text" value="" placeholder=" Search Blogger..." name="q" class="s search-input" autocomplete="off">
                                        <button class="guide-submit"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="brands">
            <div class="container_width">
                <img src="../img/brands.png" class="img-responsive" alt="brands">
            </div>
        </div>

        <div class="footer">
            <div class="container_width">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h5>About Us</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <h5>Site Links</h5>
                    <ul>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                        <li>
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#">Terms of Service</a>
                        </li>
                        <li>
                            <a href="#">Free Blog Setup</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <h5>Our Sites</h5>
                    <ul>
                        <li>
                            <a href="#" target="_blank">MonsterInsights</a>
                        </li>
                        <li>
                            <a href="#" target="_blank">WPForms</a>
                        </li>
                        <li>
                            <a href="#" target="_blank">List25</a>
                        </li>
                        <li>
                            <a href="#" target="_blank">Awesome Motive</a>
                        </li>
                        <li>&nbsp;</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="msg">
            <div class="container_width">
                <p>Copyright &copy; 2018 - 2020 Blogger LLC. All Rights Reserved. </p>
            </div>
        </div>

        <!-- Jquery minified Version -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Wow.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

        <script type="text/javascript">
            $(function() {

                $('#login-form-link').click(function(e) {
                    $("#login-form").delay(100).fadeIn(100);
                    $("#register-form").fadeOut(100);
                    $('#register-form-link').removeClass('active');
                    $(this).addClass('active');
                    e.preventDefault();
                });
                $('#register-form-link').click(function(e) {
                    $("#register-form").delay(100).fadeIn(100);
                    $("#login-form").fadeOut(100);
                    $('#login-form-link').removeClass('active');
                    $(this).addClass('active');
                    e.preventDefault();
                });

            });
        </script>
        <script type="text/javascript" src="js/val_script.js"></script>
    </body>

    </html>