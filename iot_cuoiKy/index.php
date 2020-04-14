<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <title>SG</title>

    <!-- Custom fonts for this theme -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-firestore.js"></script>
    <script src="js/set_state.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css">
    <!-- Theme CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Smart Garden</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    Menu
    <i class="fas fa-bars"></i>
    </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link py-2 px-0 px-lg-2 rounded js-scroll-trigger" href="#portfolio">Loại Cây</a>
                    </li>         
                    <li class="nav-item">
                        <a class="nav-link py-2 px-0 px-lg-2 rounded js-scroll-trigger" href="#contact">Phản Hồi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-2 px-0 px-lg-2 rounded js-scroll-trigger" href="#about">Thông tin</a>
                    </li>
                    <li class="nav-item">
                        <label class="checkbox-inline nav-link py-2 px-0 px-lg-2 rounded js-scroll-trigger" type="checkbox" onclick="changeMode()" id="btn_mode" style="color:white;">auto</label>
                    </li>
                    <li class="nav-item">

                        <a class="form-group nav-link py-2 px-0 px-lg-2 rounded js-scroll-trigger">
                            <label for="sel1">Chọn:</label>
                            <select class="form-control" id="sel1" onchange="on_change_select()">
                                <option value="v1" id="v1">Vườn 1</option>
                                <option value="v2" id="v2">Vườn 2</option>
                                <option value="v3" id="v3">Vườn 3</option>
                                <option value="v4" id="v4">Vườn 4</option>
                            </select>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link py-2 px-0 px-lg-2 rounded js-scroll-trigger">Sign Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    </br>
    <!-- Masthead -->
    <header class="jumbotron my-4">


        <!-- weather section  -->
        <div class="container-fluid">
            <div class="row">
                <div id="" class="col-8 mx-auto weather">
                    <!-- weather header section -->
                    <div class="weather-head">
                        <h1 id="location" class="text-center display-4">Hialeah, US</h1>
                        <div class="row">
                            <div id="loaiCay" class="description col text-center">
                                <p class="desc">Loại cây đang chọn</p>
                                <img id="icon_cay" src="img/portfolio/icon_caRot.png" alt="" height="100px" style="margin-bottom: 5px">
                            </div>

                            <div id="temperature" class="col text-center">
                                <p>60</p> <i id="icon-thermometer" class="wi wi-thermometer"></i>
                            </div>
                        </div>
                        <!-- weather body header -->
                        <div class="weather-body">
                            <div class="row">
                                <div class="humidity col-4 text-center">
                                    <i class="wi wi-raindrop"></i><span> Humidity</span>
                                </div>
                                <div class="wind col-4 text-center">
                                    <i class="wi wi-day-sunny"></i><span> Light</span>
                                </div>
                                <div class="visibility col-4 text-center">
                                    <i class="fa fa-warehouse"></i><span> Soil Moise</span>
                                </div>
                            </div>
                            <!-- weather body data -->
                            <div class="row">
                                <div id="humidity" class="humidity-data col-4 text-center">
                                    30
                                </div>
                                <div id="light" class="wind-data col-4 text-center">
                                    34mph
                                </div>
                                <div id="soil_moisture" class="degree-data col-4 text-center">
                                    235
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- //Weather Widget ends here -->


    </header>

    <!-- Portfolio Section Heading -->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">

            <!-- Portfolio Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Loại Cây</h2>

            <!-- Icon Divider -->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Portfolio Grid Items -->
            <div class="row">

                <!-- Portfolio Item 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/cr.png" alt="">
                    </div>
                </div>

                <!-- Portfolio Item 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/bcai.png" alt="">
                    </div>
                </div>

                <!-- Portfolio Item 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/bc.png" alt="">
                    </div>
                </div>

                <!-- Portfolio Item 4 -->
                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal4">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/xl.png" alt="">
                    </div>
                </div>

                <!-- Portfolio Item 5 -->
                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal5">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/kt.png" alt="">
                    </div>
                </div>

                <!-- Portfolio Item 6 -->
                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal6">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/cc.png" alt="">
                    </div>
                </div>

            </div>
            <!-- /.row -->

        </div>
    </section>
        <div class="row" id="control">
            <div class="col">
                <h2 id="manual_title" style="color: black;">Manual</h2>  
                <div class="relay">
                    <button type="button" class="btn btn-success btn-lg btn3d" onclick="relay1()" id="relay1" style="margin: 10px;">Bơm off</button>
                    <button type="button" class="btn btn-success btn-lg btn3d" onclick="relay2()" id="relay2" style="margin: 10px;">Phun sương off</button>
                    <button type="button" class="btn btn-success btn-lg btn3d" onclick="relay3()" id="relay3" style="margin: 10px;">Đèn off</button>
                </div>
            </div>
        </div>
   
    <!-- Contact Section -->
    <section class="page-section" id="contact">
        <div class="container">

            <!-- Contact Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Phản Hồi</h2>

            <!-- Icon Divider -->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- Contact Section Form -->
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Chủ đề</label>
                                <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Email thông báo</label>
                                <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Nội dung</label>
                                <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn3d btn-xl" id="sendMessageButton">Send</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <!-- About Section -->
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">

            <!-- About Section Heading -->
            <h2 class="page-section-heading text-center text-uppercase text-white">Thông tin</h2>

            <!-- Icon Divider -->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="divider-custom-line"></div>
            </div>

            <!-- About Section Content -->
            <div class="row">
                <div class="col-lg-4 ml-auto">
                    <p class="lead">Mục tiêu hàng đầu của dự án lần là hướng tới phục vụ nhu cầu trồng trọt của các bạn học sinh; thay thế việc tưới nước thủ công bằng tưới tự động, tăng năng suất cũng như chất lượng cây, tăng tính thẩm mỹ cho khu vườn.Dự án có các
                        giải pháp hữu hiệu để cải tạo những bất cập nơi vườn trường, biến nơi đó thành “Khu vườn thông minh”.</p>
                </div>
                <div class="col-lg-4 mr-auto">
                    <p class="lead">Với mục đích lớn nhất của dự án là lắp đặt một hệ thống tưới tiêu hiện đại có sử dụng công nghệ, giúp các bạn học sinh khi trồng các loại cây hoa, rau sạch được thuận lợi hơn, đồng thời có thể chăm sóc chúng một cách tốt nhất,
                        không mất quá nhiều sức lực mà cuối vụ vẫn có thể “bội thu"</p>
                </div>
            </div>

            <!-- About Section Button -->
            <div class="text-center mt-4">
                <a class="btn btn-xl btn-outline-light" href="https://play.google.com/store?hl=vi">
                    <i class="fas fa-download mr-2"></i> Tải SmartGarden App
                </a>
            </div>

        </div>
    </section>
    <!-- Footer -->


    <!-- Copyright Section -->
    <section class="copyright py-4 text-center text-white">
        <div class="container">

            <span id="date" class="lead">
            --NHÓM TÁC GIẢ-- <br>
            TRƯƠNG ĐÀO KHƯƠNG DUY <br>
            NGUYỄN THIỆN QUANG <br>
            </span>
        </div>
    </section>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>





    <!-- Portfolio Modals -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">
        <i class="fas fa-times"></i>
        </span>
    </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title -->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Cà Rốt</h2>
                                <!-- Icon Divider -->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image -->
                                <img class="img-fluid rounded mb-5" src="img/portfolio/cr.png" alt="">
                                <!-- Portfolio Modal - Text -->
                                <p class="mb-5">Cà rốt là một loại cây có củ, thường có màu vàng cam, đỏ, vàng, trắng hay tía. Phần ăn được của cà rốt là củ, thực chất là rễ cái của nó, chứa nhiều tiền tố của vitamin A tốt cho mắt.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 id="auto_title_caRot" style="color: black;">Auto</h2>
                                        <h3 style="color: black;">Các thông số mặc định</h3>
                                        <?php
                                            require "nguongCaiDat/caRot.php"
                                        ?>
                                        <button type="button" class="btn btn-success btn-lg btn3d" onclick="load('caRot', <?php echo $nhietDo ?>, <?php echo $doAmKK ?>, <?php echo $doAmDat ?>, <?php echo $anhSang ?>)" style="margin: 10px;">LOAD</button>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="nguongCaiDat/change_bound.php" method="post" target="_blank">
                                            <p>Cài đặt mức điều khiển</p>
                                            <p style="margin: 0px">Nhiệt độ</p>
                                            <input type="number" placeholder="ngưỡng nhiệt độ" id="t_bound_caRot" name="t_bound_caRot">
                                            <p style="margin: 0px">Độ ẩm KK</p>
                                            <input type="number" placeholder="ngưỡng độ ẩm KK" id="h_bound_caRot" name="h_bound_caRot"><br>
                                            <p style="margin: 0px">Độ ẩm đất</p>
                                            <input type="number" placeholder="ngưỡng độ ẩm đất" id="soil_moisture_bound_caRot" name="soil_moisture_bound_caRot"><br>
                                            <p style="margin: 0px">Ánh sáng</p>
                                            <input type="number" placeholder="ngưỡng độ ánh sáng" id="light_bound_caRot" name="light_bound_caRot"><br>
                                            <input class="btn btn-success btn-lg btn3d" type="button" onclick="set('caRot')" id="btn_set_caRot" value="SET">
                                            <input class="btn btn-success btn-lg btn3d" type="submit" value="UPLOAD">
                                        </form>
                                    </div>
                                    <div class="col-3" style="margin: auto; border: none;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">
        <i class="fas fa-times"></i>
        </span>
    </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title -->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Bắp Cải</h2>
                                <!-- Icon Divider -->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image -->
                                <img class="img-fluid rounded mb-5" src="img/portfolio/bcai.png" alt="">
                                <!-- Portfolio Modal - Text -->
                                <p class="mb-5">Bắp cải hay cải bắp là một loại rau chủ lực trong họ Cải, phát sinh từ vùng Địa Trung Hải. Nó là cây thân thảo, sống hai năm, và là một thực vật có hoa thuộc nhóm hai lá mầm với các lá tạo thành một cụm đặc hình gần
                                    như hình cầu đặc trưng. </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 id="auto_title_bapCai" style="color: black;">Auto</h2>
                                        <h3 style="color: black;">Các thông số mặc định</h3>
                                        <?php
                                            require "nguongCaiDat/bapCai.php"
                                        ?>
                                        <button type="button" class="btn btn-success btn-lg btn3d" onclick="load('bapCai', <?php echo $nhietDo ?>, <?php echo $doAmKK ?>, <?php echo $doAmDat ?>, <?php echo $anhSang ?>)" style="margin: 10px;">LOAD</button>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="nguongCaiDat/change_bound.php" method="post" target="_blank">
                                            <p>Cài đặt mức điều khiển</p>
                                            <p style="margin: 0px">Nhiệt độ</p>
                                            <input type="number" value="" placeholder="ngưỡng nhiệt độ" id="t_bound_bapCai" name="t_bound_bapCai">
                                            <p style="margin: 0px">Độ ẩm KK</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ẩm KK" id="h_bound_bapCai" name="h_bound_bapCai"><br>
                                            <p style="margin: 0px">Độ ẩm đất</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ẩm đất" id="soil_moisture_bound_bapCai" name="soil_moisture_bound_bapCai"><br>
                                            <p style="margin: 0px">Ánh sáng</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ánh sáng" id="light_bound_bapCai" name="light_bound_bapCai"><br>
                                            <input class="btn btn-success btn-lg btn3d" type="button" onclick="set('bapCai')" id="btn_set_bapCai" value="SET">
                                            <input class="btn btn-success btn-lg btn3d" type="submit" value="UPLOAD">
                                        </form>                         
                                    </div>
                                    <div class="col-3" style="margin: auto; border: none;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-labelledby="portfolioModal3Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">
        <i class="fas fa-times"></i>
        </span>
    </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title -->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Bông Cải Xanh</h2>
                                <!-- Icon Divider -->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image -->
                                <img class="img-fluid rounded mb-5" src="img/portfolio/bc.png" alt="">
                                <!-- Portfolio Modal - Text -->
                                <p class="mb-5">Bông cải xanh là một loại cây thuộc loài Cải bắp dại, có hoa lớn ở đầu, thường được dùng như rau. Bông cải xanh thường được chế biến bằng cách luộc hoặc hấp, nhưng cũng có thể được ăn sống như là rau sống trong những
                                    đĩa đồ nguội khai vị.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 id="auto_title_bongCai" style="color: black;">Auto</h2>
                                        <h3 style="color: black;">Các thông số mặc định</h3>
                                        <?php
                                            require "nguongCaiDat/bongCai.php"
                                        ?>
                                        <button type="button" class="btn btn-success btn-lg btn3d" onclick="load('bongCai', <?php echo $nhietDo ?>, <?php echo $doAmKK ?>, <?php echo $doAmDat ?>, <?php echo $anhSang ?>)" style="margin: 10px;">LOAD</button>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="nguongCaiDat/change_bound.php" method="post" target="_blank">
                                            <p>Cài đặt mức điều khiển</p>
                                            <p style="margin: 0px">Nhiệt độ</p>
                                            <input type="number" value="" placeholder="ngưỡng nhiệt độ" id="t_bound_bongCai" name="t_bound_bongCai">
                                            <p style="margin: 0px">Độ ẩm KK</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ẩm KK" id="h_bound_bongCai" name="h_bound_bongCai"><br>
                                            <p style="margin: 0px">Độ ẩm đất</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ẩm đất" id="soil_moisture_bound_bongCai" name="soil_moisture_bound_bongCai"><br>
                                            <p style="margin: 0px">Ánh sáng</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ánh sáng" id="light_bound_bongCai" name="light_bound_bongCai"><br>
                                            <input class="btn btn-success btn-lg btn3d" type="button" onclick="set('bongCai')" id="btn_set_bongCai" value="SET">
                                            <input class="btn btn-success btn-lg btn3d" type="submit" value="UPLOAD">
                                        </form>
                                    </div>
                                    <div class="col-3" style="margin: auto; border: none;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Portfolio Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-labelledby="portfolioModal4Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">
        <i class="fas fa-times"></i>
        </span>
    </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title -->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Cải Thìa</h2>
                                <!-- Icon Divider -->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image -->
                                <img class="img-fluid rounded mb-5" src="img/portfolio/xl.png" alt="">
                                <!-- Portfolio Modal - Text -->
                                <p class="mb-5">Cải thìa không chỉ là loại rau quen thuộc để chế biến nên những món ăn ngon mà còn chứa nhiều thành phần dinh dưỡng có lợi cho sức khỏe.
                                                Cải thìa tốt cho phụ nữ mang thai, có tác dụng phòng ngừa khuyết tật cho thai nhi, giúp xương chắc khỏe, 
                                                có khả năng kích thích nhịp tim hoạt động tốt và hạ huyết áp. 
                                                Cải thìa làm chậm quá trình lão hóa và giảm đáng kể việc hình thành các gốc tự do, 
                                                có tác dụng phòng ngừa bệnh đục nhân mắt và thoái hóa hoàng điểm ở mắt đồng thời có tác dụng ngăn ngừa ung thư bằng cách loại bỏ những thành phần có hại trong cơ thể.
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 id="auto_title_caiThia" style="color: black;">Auto</h2>
                                        <h3 style="color: black;">Các thông số mặc định</h3>
                                        <?php
                                            require "nguongCaiDat/caiThia.php"
                                        ?>
                                        <button type="button" class="btn btn-success btn-lg btn3d" onclick="load('caiThia', <?php echo $nhietDo ?>, <?php echo $doAmKK ?>, <?php echo $doAmDat ?>, <?php echo $anhSang ?>)" style="margin: 10px;">LOAD</button>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="nguongCaiDat/change_bound.php" method="post" target="_blank">
                                            <p>Cài đặt mức điều khiển</p>
                                            <p style="margin: 0px">Nhiệt độ</p>
                                            <input type="number" value="" placeholder="ngưỡng nhiệt độ" id="t_bound_caiThia" name="t_bound_caiThia">
                                            <p style="margin: 0px">Độ ẩm KK</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ẩm KK" id="h_bound_caiThia" name="h_bound_caiThia"><br>
                                            <p style="margin: 0px">Độ ẩm đất</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ẩm đất" id="soil_moisture_bound_caiThia" name="soil_moisture_bound_caiThia"><br>
                                            <p style="margin: 0px">Ánh sáng</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ánh sáng" id="light_bound_caiThia" name="light_bound_caiThia"><br>
                                            <input class="btn btn-success btn-lg btn3d" type="button" onclick="set('caiThia')" id="btn_set_caiThia" value="SET">
                                            <input class="btn btn-success btn-lg btn3d" type="submit" value="UPLOAD">
                                        </form>
                                    </div>
                                    <div class="col-3" style="margin: auto; border: none;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Portfolio Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-labelledby="portfolioModal5Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">
        <i class="fas fa-times"></i>
        </span>
    </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title -->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Khoai Tây</h2>
                                <!-- Icon Divider -->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image -->
                                <img class="img-fluid rounded mb-5" src="img/portfolio/kt.png" alt="">
                                <!-- Portfolio Modal - Text -->
                                <p class="mb-5">Khoai tây (danh pháp hai phần: Solanum tuberosum), thuộc họ Cà (Solanaceae). Khoai tây là loài cây nông nghiệp ngắn ngày, trồng lấy củ chứa tinh bột.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 id="auto_title_khoaiTay" style="color: black;">Auto-mode</h2>
                                        <h3 style="color: black;">Các thông số mặc định</h3>
                                        <?php
                                            require "nguongCaiDat/khoaiTay.php"
                                        ?>
                                        <button type="button" class="btn btn-success btn-lg btn3d" onclick="load('khoaiTay', <?php echo $nhietDo ?>, <?php echo $doAmKK ?>, <?php echo $doAmDat ?>, <?php echo $anhSang ?>)" style="margin: 10px;">LOAD</button>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="nguongCaiDat/change_bound.php" method="post" target="_blank">
                                            <p>Cài đặt mức điều khiển</p>
                                            <p style="margin: 0px">Nhiệt độ</p>
                                            <input type="number" value="" placeholder="ngưỡng nhiệt độ" id="t_bound_khoaiTay" name="t_bound_khoaiTay">
                                            <p style="margin: 0px">Độ ẩm KK</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ẩm KK" id="h_bound_khoaiTay" name="h_bound_khoaiTay"><br>
                                            <p style="margin: 0px">Độ ẩm đất</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ẩm đất" id="soil_moisture_bound_khoaiTay" name="soil_moisture_bound_khoaiTay"><br>
                                            <p style="margin: 0px">Ánh sáng</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ánh sáng" id="light_bound_khoaiTay" name="light_bound_khoaiTay"><br>
                                            <input class="btn btn-success btn-lg btn3d" type="button" onclick="set('khoaiTay')" id="btn_set_khoaiTay" value="SET">
                                            <input class="btn btn-success btn-lg btn3d" type="submit" value="UPLOAD">
                                        </form>
                                    </div>
                                    <div class="col-3" style="margin: auto; border: none;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Portfolio Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-labelledby="portfolioModal6Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">
        <i class="fas fa-times"></i>
        </span>
    </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Portfolio Modal - Title -->
                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Cà Chua</h2>
                                <!-- Icon Divider -->
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <!-- Portfolio Modal - Image -->
                                <img class="img-fluid rounded mb-5" src="img/portfolio/cc.png" alt="">
                                <!-- Portfolio Modal - Text -->
                                <p class="mb-5">Cà chua (danh pháp hai phần: Solanum lycopersicum), thuộc họ Cà (Solanaceae), là một loại rau quả làm thực phẩm. Quả ban đầu có màu xanh, chín ngả màu từ vàng đến đỏ. Cà chua có vị hơi chua và là một loại thực phẩm
                                    bổ dưỡng, giàu vitamin C và A, đặc biệt là giàu lycopeme tốt cho sức khỏe.</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 id="auto_title_caChua" style="color: black;">Auto</h2>
                                        <h3 style="color: black;">Các thông số mặc định</h3>
                                        <?php
                                            require "nguongCaiDat/caChua.php"
                                        ?>
                                        <button type="button" class="btn btn-success btn-lg btn3d" onclick="load('caChua', <?php echo $nhietDo ?>, <?php echo $doAmKK ?>, <?php echo $doAmDat ?>, <?php echo $anhSang ?>)" style="margin: 10px;">LOAD</button>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="nguongCaiDat/change_bound.php" method="post" target="_blank">
                                            <p>Cài đặt mức điều khiển</p>
                                            <p style="margin: 0px">Nhiệt độ</p>
                                            <input type="number" value="" placeholder="ngưỡng nhiệt độ" id="t_bound_caChua" name="t_bound_caChua">
                                            <p style="margin: 0px">Độ ẩm KK</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ẩm KK" id="h_bound_caChua" name="h_bound_caChua"><br>
                                            <p style="margin: 0px">Độ ẩm đất</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ẩm đất" id="soil_moisture_bound_caChua" name="soil_moisture_bound_caChua"><br>
                                            <p style="margin: 0px">Ánh sáng</p>
                                            <input type="number" value="" placeholder="ngưỡng độ ánh sáng" id="light_bound_caChua" name="light_bound_caChua"><br>
                                            <input class="btn btn-success btn-lg btn3d" type="button" onclick="set('caChua')" id="btn_set_caChua" value="SET">
                                            <input class="btn btn-success btn-lg btn3d" type="submit" value="UPLOAD">
                                        </form>
                                    </div>
                                    <div class="col-3" style="margin: auto; border: none;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>
    <!-- weather -->
    <script src="js/get_state.js"></script>

</body>

</html>