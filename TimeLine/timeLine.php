<?php
require_once('getData.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
    <!-- Reset CSS -->
    <link href="./css/reset.css" rel="stylesheet" type="text/css">
    <!-- Timeline CSS -->
    <link href="./css/horizontal_timeline.2.0_v2.0.5.2.css" rel="stylesheet" type="text/css">
    <!-- jQuery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Timeline JS-->
    <script src="./JavaScript/horizontal_timeline.2.0_v2.0.5.2.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container_1 {
            margin: 30px auto;
            max-width: 1200px;
        }
    </style>
</head>

<body>
    <!-- navbar begin -->
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./img/green.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                <span class="header-text">Nông sản sạch cho mọi nhà</span>
            </a>
        </div>
    </nav>
    <!-- navbar end -->
    <!-- body content begin -->
    <div class="container body-content">
        <div class="row">
            <div class="col p-0">
                <span style="font-size: 24px;">Thông tin truy xuất</span>
            </div>
        </div>
        <div class="row b-top">
            <div class="col pt-2 pl-3">
                <span style="font-size: 18px;">Thông tin sản phẩm</span>
            </div>
        </div>
        <div class="row border-top border-bottom">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <?php
                        echo $treeData['name'];
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row b-top">
            <div class="col pt-2 pl-3">
                <span style="font-size: 18px;">Thông tin nơi trồng</span>
            </div>
        </div>
        <div class="row border-top border-bottom">
            <div class="col">
                <div class="card w-100 border-success">
                    <div class="card-header">
                        Mã cây trồng
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php
                            echo $treeData['ID'];
                            ?>
                        </p>
                    </div>
                    <div class="card-header">
                        Nơi trồng
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php
                            echo $treeData['location'];
                            ?>
                        </p>
                    </div>
                    <div class="card-header">
                        Địa chỉ
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php
                            echo $treeData['address'];
                            ?>
                        </p>
                    </div>
                    <div class="card-header">
                        Ngày trồng
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php
                            echo $treeData['dateStart'];
                            ?>
                        </p>
                    </div>
                    <div class="card-header">
                        Ngày thu hoạch
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php
                            echo $treeData['dateEnd'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row b-top">
            <div class="col pt-2 pl-3">
                <span style="font-size: 18px;">Thông tin đóng gói</span>
            </div>
        </div>
        <div class="row border-top border-bottom">
            <div class="col">
                <div class="card w-100 border-success">
                    <div class="card-header">
                        Nơi Đóng gói
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php
                            echo $packData['location'];
                            ?>
                        </p>
                    </div>
                    <div class="card-header">
                        Địa chỉ
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php
                            echo $packData['address'];
                            ?>
                        </p>
                    </div>
                    <div class="card-header">
                        Ngày đóng gói
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php
                            echo $packData['datePack'];
                            ?>
                        </p>
                    </div>
                    <div class="card-header">
                        Mã lô hàng
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php
                            echo $packData['ID'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row b-top">
            <div class="col pt-2 pl-3">
            </div>
        </div>
        <a aria-expanded="false">
            Thông tin chi tiết về quá trình trồng
        </a>
        <div class="horizontal-timeline" id="timeline">
            <div class="events-content">
                <ol>
                    <?php
                    foreach ($timelineData as $value) {
                    ?>
                        <li data-horizontal-timeline='{"date": "<?php echo $value[0]; ?>"}'>
                            <h2><?php echo $value[0]; ?></h2>
                            <p><?php echo $value[1]; ?></p>
                        </li>
                    <?php
                    }
                    ?>
                </ol>
            </div>
        </div>
    </div>
    <script>
        $('#timeline').horizontalTimeline();
    </script>
</body>

</html>