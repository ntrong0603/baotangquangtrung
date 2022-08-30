<?php
session_start();
if (!isset($_SESSION["lang"])) {
    $_SESSION["lang"]  = "vi";
}
if (isset($_SESSION["lang"]) && !empty($_GET['lang'])) {
    $_SESSION["lang"]  = $_GET['lang'];
}
require_once("./lang/" . $_SESSION["lang"] . "/all.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $lang['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <script src="tour.js"></script>

    <div id="pano" style="width:100%;height:100%;">
        <noscript>
            <table style="width:100%;height:100%;">
                <tr style="vertical-align:middle;">
                    <td>
                        <div style="text-align:center;">ERROR:<br /><br />Javascript not activated<br /><br /></div>
                    </td>
                </tr>
            </table>
        </noscript>
        <script>
            embedpano({
                swf: "tour.swf",
                xml: "tour.xml",
                target: "pano",
                html5: "auto",
                mobilescale: 1.0,
                passQueryParameters: true
            });
        </script>
        <nav class="menu-left-top">
            <a class="btn-drop-menu">
                <span id="plus">
                    <img src="images/btnplus.png" alt="">
                </span>
                <span><?php echo $lang['bao_tang_quang_trung'] ?></span>
            </a>
            <ul class="drop-menu drop-menu-main">
                <li class="box-default active" data-scene="scene_2">
                    <?php echo $lang['tong_quan_1'] ?>
                </li>
                <li class="box-default" data-scene="scene_1">
                    <?php echo $lang['tong_quan_2'] ?>
                </li>
                <li class="box-default" data-scene="scene_3">
                    <?php echo $lang['tong_quan_3'] ?>
                </li>
                <li class="box-default" data-3d="https://my.matterport.com/show/?m=nZaKT3ToBBz">
                    <?php echo $lang['bao_tang_quang_trung_2'] ?>
                </li>

                <li class="box-default" data-scene="scene_8">
                    <?php echo $lang['tuong_quang_trung'] ?>
                </li>
                <li class="box-default" data-scene="scene_9">
                    <?php echo $lang['nha_bieu_dien_vo'] ?>
                </li>

            </ul>
        </nav>
        <div class="popup popup-3d">
            <iframe src="" frameborder="0"></iframe>
        </div>
        <div class="popup popup-video">
            <nav class="menu-left-top show">
                <a class="btn-drop-menu">
                    <span id="plus">
                        <img src="images/btnplus.png" alt="">
                    </span>
                    <span>KHU DU LỊCH VĂN HÓA PHƯƠNG NAM</span>
                </a>
                <ul class="drop-menu">
                    <li class="box-default active" data-video="1.KDL Văn Hóa Phương Nam">
                        KDL Văn Hóa Phương Nam
                    </li>
                    <li class="box-default" data-video="2.Bảo tàng đất Phương Nam">
                        Bảo tàng đất Phương Nam
                    </li>
                    <li class="box-default" data-video="3.Hồ sen">
                        Hồ sen
                    </li>
                    <li class="box-default" data-video="4.Công viên nước-clip1">
                        Công viên nước (1)
                    </li>
                    <li class="box-default" data-video="5.Công viên nước-clip2">
                        Công viên nước (2)
                    </li>
                    <li class="box-default">
                        <a href="https://www.youtube.com/watch?v=pGiLlgK-B2E&feature=youtu.be" target="_blank">Review Khu Du Lịch Văn Hoá Phương Nam</a>
                    </li>
                    <li class="box-default close-video">
                        Đóng video
                    </li>
                </ul>
            </nav>
            <video id="main-video" controls>
                <source src="videos/1.KDL Văn Hóa Phương Nam.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <ul id="language-group">
            <li>
                <a href="?lang=vi">
                    <img src="./images/flag-vi.png" alt="">
                </a>
            </li>
            <li>
                <a href="?lang=en">
                    <img src="./images/flag-en.png" alt="">
                </a>
            </li>
        </ul>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>