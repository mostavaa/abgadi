
<!DOCTYPE html>
<html>
<head>
    <title>Home | <?php echo SITENAME?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    $this->load->view('shared/css');
    ?>
    <style>
        .sidebarlist {
            list-style-image: url('./images/0all.png');
            margin-top: 30px;
        }

        .pageContent {
            float: right;
        }

        .sideBar {
            float: right;
            width: 20%;
            height: 350px;
            background-color: #eeeded;
            margin: 0.5%;
            border-style: solid;
            border-width: thin;
            border-color: #919191;
        }

        .orangeBannerInSideBar {
            background-color: #f6aa05;
            height: 10px;
        }

        .page {
            border: 2px solid rgb(181,181,181);
            background-color: white;
        }

        body {
            background-color: rgb(238,237,237);
        }


    </style>
</head>
<body>

    <?php 
                    $this->load->view('shared/sidebar');
?>

        <div class="container">
            <div class="row page">
                <?php
                $this->load->view('shared/header');
                ?>

                <div class="row">
                    <div class="sideBar">
                        <div class="row orangeBannerInSideBar"></div>
                        <ul dir="rtl" class="sidebarlist">
                            <li style="">1</li>
                            <li style="">2</li>
                            <li style="">3</li>
                        </ul>
                    </div>
                    <div class="pageContent">
                    </div>
                </div>
                <!--
    <div class="main_bg">
        <div class="wrap">
            <div class="main">
                <div class="content">

                    <h1 style="text-align:center">تحت الانشاء</h1>

                </div>
            </div>
        </div>
    </div>
            -->
                <?php
                //$this->load->view('shared/footer');
                ?>
            </div>
        </div>
    
    <?php
    $this->load->view('shared/scripts');
    ?>

</body>
</html>
