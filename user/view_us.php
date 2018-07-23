
<?php

    include('session.php');

    // $getid=$_GET['id'];
    
    $ses_sql="SELECT * FROM post_info";
    $result = $conn->query($ses_sql);

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
                <div class="col-md-12">
                    <div class="left_section">
                         <h3>All Post</h3>
                        
                        <?php

                        $page = $_GET['page'];

                        if ($page==0 || $page==1) {
                            $page1 = 0;
                        } else {
                            $page1 = ($page*3)-3;
                        }

                        $ses_sql="SELECT * FROM post_info LIMIT $page1,3";
                        $result = $conn->query($ses_sql);
                        $i=1;
                        while($row=$result->fetch_assoc()){
                            ?>
                        <div class="post">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="row">
                                    <img src="<?php echo $row['img_path'] ?>" class="img-responsive" alt="post_img">
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <h2><?php echo $row['title']; ?></h2>
                                <?php 
                                    $a=$row["main_post"];
                                ?>
                                <p><?php echo substr($a,0,200); ?>...</p>
                                <?php 
                                    $til = str_replace(" ","-",$row['title']);
                                ?>
                                <a href="posted.php?id=<?php echo $row['id'];?>/<?php echo $til;?>" target="_blank">Read More</a>
                            </div>
                        </div>
                            <?php
                            
                        if ($i>0) {
                           $i++; 
                        } else {
                            break;
                        }
                        }
                        ?>
                        <nav aria-label="Page navigation">
                        <ul class="pagination" style="text-align: center;">

                            <?php 

                            $ses_sql1="SELECT * FROM post_info";
                                $result1 = $conn->query($ses_sql1);
                                $cout = mysqli_num_rows($result1);

                                $d = $cout/3;

                            $f = ceil($d);

                            for($g=1;$g<=$f;$g++) {

                            ?>
                                <li><a href="view_us.php?page=<?php echo $g; ?>"><?php echo $g; ?></a></li> 
                                <?php
                            }
                            ?>
                        </ul>
                        </nav>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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