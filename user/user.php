<?php

include('session.php');

$get_us = $_GET['user_name'];
// $getid=$_GET['id'];

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
            .table_1st td {
                width: 50%;
            }
            
            .table_1st td:nth-child(1) {
                text-align: right;
            }
            
            .table_1st td:nth-child(2) {
                text-align: left;
            }
            
            .total {
                border: 1px solid #ddd;
                text-align: center;
                background: #FC5C5B;
                color: #fff;
                padding: 10px;
                margin-bottom: 25px;
            }
            
            .total span {
                font-size: 20px;
            }
            .table_2nd td:nth-child(4),
            .table_2nd td:nth-child(5),
            .table_2nd td:nth-child(6) {
                text-align: center;
            }
            
            .table_2nd td:nth-child(2) {
                width: 220px;
            }
            
            .table_2nd a:hover {
                color: #29b63a
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
                                <a class="navbar-brand" href="us_index.php">
                                    <img src="../img/the_logo.png" class="img-responsive" alt="logo">
                                </a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a class="hover-bottom" href="us_index.php">Home</a>
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
                                                    <a target="_blank" href="us_category.php?id=<?php echo $row_cat['id'];?>" id="<?php echo $row_cat["id"] ?>">
                                                        <?php echo $row_cat["category"]?>
                                                    </a>
                                                </li>
                                                <?php
                                                   }
                                                ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="post.php" class="hover-bottom">Post</a>
                                    </li>
                                    <li>
                                        <a href="user.php?user_name=<?php echo $login_session;?>" class="hover-bottom" style="text-transform: capitalize;">
                                            <?php echo $login_session;?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="logout.php" class="hover-bottom">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="announce">
                    <a href="#">
                        <?php
                            echo "Welcome " . $login_session . "! What are you up to today??";
                        ?>
                    </a>
                </div>
            </div>
        </header>

        <div class="main_section">
            <div class="container_width">
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="left_section">
                        <h3 style="text-align: center;">User Info</h3>
                        <table class="table table-hover table_1st">
                            <?php 
                                $query = "SELECT * from user where user_name='$get_us'";
                                $result = $conn -> query($query);
                                $row = $result -> fetch_assoc();
                            ?>
                            <tbody>
                                <tr>
                                    <td>First Name: </td>
                                    <td>
                                        <?php echo $row['first_name']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Last Name: </td>
                                    <td>
                                        <?php echo $row['last_name']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Username: </td>
                                    <td>
                                        <?php echo $row['user_name']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email: </td>
                                    <td>
                                        <?php echo $row['email']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address: </td>
                                    <td>
                                        <?php echo $row['address']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Registration: </td>
                                    <td>
                                        <?php echo $row['date']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="total">
                            <?php 
                                $user_id_count = $row['id'];
                                 $query_count = "SELECT COUNT(id) AS post_count from post_info where user_id='$user_id_count'";
                                 
                                 $result_count = $conn -> query($query_count);
                                 $row_count = $result_count -> fetch_assoc();
                            ?>
                            <h2>Total Post</h2>
                            <span>
                                <?php echo $row_count['post_count']; ?>
                            </span>
                        </div>
                        <?php 
                            $user_post_count = $row['id'];
                            $query_post_count = "SELECT * from post_info where user_id='$user_post_count'";
                             
                             $result_post_count = $conn -> query($query_post_count);
                        ?>
                        <table class="table table-bordered table_2nd">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Post Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM category_list";
                                    $result_cat = $conn -> query($query);
                                    $row_cat = $result_cat -> fetch_assoc();

                                    $i=1;
                                    while($row_post_count=$result_post_count->fetch_assoc()){
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $i ?>
                                        </td>
                                        <td>
                                            <img src="<?php echo $row_post_count['img_path']; ?>" style="width: 100%;" alt="">
                                        </td>
                                        <td>
                                            <a href="posted.php?id=<?php echo $row_post_count['id'];?>" target="_blank">
                                                <?php echo $row_post_count['title']; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo $row_cat["category"]; ?>
                                        </td>
                                        <td>
                                            <a href="edit_post.php?id=<?php echo $row_post_count['id'];?>" target="_blank">
                                                <i style="margin-left: 5px;" class="fas fa-edit">&nbsp;</i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="delete_post.php?id=<?php echo $row_post_count['id'];?>?user_name=<?php echo $get_us ?>" target="_blank">
                                                <i class="fas fa-trash-alt">&nbsp;</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                        $i++;
                                        }
                                    ?>
                            </tbody>
                        </table>
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
    </body>

    </html>