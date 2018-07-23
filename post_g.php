<?php 

    include('dbconnection.php');

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
    <link href="../css/style.css" type="text/css" rel="stylesheet">

    <style>
        .main img {
            margin: 20px auto;
            width: 85%;
            border: 1px solid #eee;
            padding: 5px;
        }
        
        .authors {
            font-weight: bold
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
                <a href="#">
                        BEGINNER'S GUIDE FOR BLOGGER / Start your blogging in a minutes
                </a>
            </div>
        </div>
    </header>

    <?php 

        $getid=$_GET['id'];

        $select_sql="SELECT * from post_info WHERE id='$getid'";
        $result = $conn->query($select_sql);
        $row = $result->fetch_assoc();

    ?>

    <div class="main_section">
        <div class="container_width">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="left_section">
                    <div class="post_det">
                        <h1>
                            <?php echo $row['title']; ?>
                        </h1>
                        <span class="authors">
                            <?php 
                                $user_id = $row['user_id'];
                                $select_sql="SELECT * from user WHERE id='$user_id'";
                                $result = $conn -> query($select_sql);
                                $row_us = $result -> fetch_assoc();

                                $full_name = $row_us['first_name'] . " " . $row_us['last_name'];
                                echo $full_name; 
                            ?>
                        </span>
                        <span class="post_date">
                            <i>
                                <?php echo $row['post_date']; ?>
                            </i>
                        </span>
                    </div>
                    <div class="main">
                        <?php 
                            $til = str_replace(" ","-",$row['title']);
                        ?>
                        <img src="<?php echo $row['img_path']; ?>" class="img-responsive" alt="<php echo $til ?>" id="main_img">
                        <div class="text">
                            <?php echo $row['main_post']; ?>
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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
</body>

</html>