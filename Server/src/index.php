<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Aristocrat – eCommerce HTML Template" />
    <title>Music App – eCommerce HTML Template</title>
    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" /> -->

    <!--  all css files  -->

    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/slick.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

</head>


<body>
    <!-- header start -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="position-relative">
                        <form class="d-flex flex-wrap">
                            <input class="form-control" type="search" placeholder="Search">
                            <button class="btn-search" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- music tabs start -->


    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">popular</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">most view</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">latest</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <!-- music-list start -->
            <div class="music-list">
                <!-- music-card start -->
                <div class="music-card">

                    <?php

                    $JsonData = require "ReturnJson.php";

                    //echo $JsonData;


                    $arr = array();

                    $Location= json_decode($JsonData);

                    foreach ($Location as $value) {
                        $videoaddress=$value->videolocation;//取出对应的值
                        $arr[]=$videoaddress;//将取出的值放入一个数组
                    }
                    //echo json_encode($arr);
                    //echo $arr[0];
                    ?>

                    <video controls>
                        <source src="<?=$arr[0]?>" type="video/mp4">
                    </video>
                    <div class="video-desc">
                        <div class="video-desc-left">
                            <h3 class="title">Lorem Ipsum is simply</h3>
                            <p>#It is a long established</p>
                            <span class="time">1 houre ago</span>
                        </div>
                        <div class="video-desc-right">
                            <h3 class="sub-title">
                                <span>520
                                    <i class="fas fa-heart"></i>
                                </span> <span>58
                                    <i class="fas fa-comment"></i>
                                </span>
                            </h3>
                            <span class="time">11:05<span class="date">30-02-2021</span></span>
                        </div>
                    </div>

                </div>
                <!-- music-card end -->

                <button class="add-more-btn">
                    <i class="fas fa-plus"></i>
                </button>

                <div align="center">

                    <form action='upload.php' method=post enctype="multipart/form-data">
                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000000000">
                        <input type=file name=file id=file size=20>
                        <input type=submit value='上传'>
                    </form>

                </div>

            </div>
            <!-- music-list end  -->
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

            <div class="row">
                <div class="col-12">
                    <!-- music-list start -->
                    <div class="music-list">

                        <?php

                        $JsonData = require "ReturnJson.php";

                        //echo $JsonData;


                        $arr = array();

                        $Location= json_decode($JsonData);

                        foreach ($Location as $value) {
                            $videoaddress=$value->videolocation;//取出对应的值
                            $arr[]=$videoaddress;//将取出的值放入一个数组
                        }
                        //echo json_encode($arr);
                        //echo $arr[0];
                        ?>

                        <?php foreach ($arr as $item) { ?>

                            <!-- music-card start -->
                            <div class="music-card">
                                <video controls>
                                    <source src="<?=$item?>" type="video/mp4">
                                </video>
                                <div class="video-desc">
                                    <div class="video-desc-left">
                                        <h3 class="title">Lorem Ipsum is simply</h3>
                                        <p>#It is a long established</p>
                                        <span class="time">1 houre ago</span>
                                    </div>
                                    <div class="video-desc-right">
                                        <h3 class="sub-title">
                                    <span>520
                                        <i class="fas fa-heart"></i>
                                    </span> <span>58
                                        <i class="fas fa-comment"></i>
                                    </span>
                                        </h3>
                                        <span class="time">11:05<span class="date">30-02-2021</span></span>
                                    </div>
                                </div>

                            </div>
                            <!-- music-card end -->

                        <?php }?>
                        <button class="add-more-btn">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <!-- music-list end  -->
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

            <div class="row">
                <div class="col-12">
                    <!-- music-list start -->
                    <div class="music-list">

                        <?php

                        $JsonData = require "ReturnJson.php";

                        //echo $JsonData;


                        $arr = array();

                        $Location= json_decode($JsonData);

                        foreach ($Location as $value) {
                            $videoaddress=$value->videolocation;//取出对应的值
                            $arr[]=$videoaddress;//将取出的值放入一个数组
                        }
                        //echo json_encode($arr);
                        //echo $arr[0];
                        ?>

                        <?php foreach ($arr as $item) { ?>

                            <!-- music-card start -->
                            <div class="music-card">
                                <video controls>
                                    <source src="<?=$item?>" type="video/mp4">
                                </video>
                                <div class="video-desc">
                                    <div class="video-desc-left">
                                        <h3 class="title">Lorem Ipsum is simply</h3>
                                        <p>#It is a long established</p>
                                        <span class="time">1 houre ago</span>
                                    </div>
                                    <div class="video-desc-right">
                                        <h3 class="sub-title">
                                    <span>520
                                        <i class="fas fa-heart"></i>
                                    </span> <span>58
                                        <i class="fas fa-comment"></i>
                                    </span>
                                        </h3>
                                        <span class="time">11:05<span class="date">30-02-2021</span></span>
                                    </div>
                                </div>

                            </div>
                            <!-- music-card end -->

                        <?php }?>
                        <button class="add-more-btn">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <!-- music-list end  -->
                </div>
            </div>

        </div>
    </div>

    <!-- music tabs end -->



    <!--  all js files -->

    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>