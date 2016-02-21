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
            min-height: 700px;
        }

        .sideBar {
            display: none;
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
                <div class="col-md-4"></div>
                <div class="col-md-4"><h2 style="text-align:center" class="alert alert-danger" > الموقع تحت الانشاء</h2></div>
                 
            </div>
            <div class="row" style="text-align: center;">
                <div class="sideBar">
                    <div class="row orangeBannerInSideBar"></div>
                    <ul dir="rtl" class="sidebarlist">
                        <li style="">1</li>
                        <li style="">2</li>
                        <li style="">3</li>
                    </ul>
                </div>

                <div class="col-md-3 alert alert-warning" >
                    واحدس
                </div>
                <div class="col-md-1" >
                    
                </div>

                <div class="col-md-4 alert alert-warning" >
                    اثنان
                </div>
                <div class="col-md-1 " >
                   
                </div>

                <div class="col-md-3 alert alert-warning" >
                    ثلاثة
                </div>
            </div>
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
