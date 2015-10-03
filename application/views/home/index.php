<!DOCTYPE html>
<html>
<head>
    <title>Home | <?php echo SITENAME?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    $this->load->view('shared/css');
    ?>
    <style>
        .sidebarlist{
            list-style-image:url('./images/0all.png');
            
        }
 
    </style>
</head>
<body style="background-color:rgb(238,237,237)"> 
    <div class="container">
        <div class="row" style="border:2px solid rgb(181,181,181);background-color:white">

        
    
    <?php
    $this->load->view('shared/header');
    ?>

        <div class="content">
            <div class="sideBar" style="float:right;width:20%;height:350px;background-color:#eeeded;margin:0.5%;border-style:solid;border-width:thin;border-color:#919191">
                <div class="row" style="background-color:#f6aa05;height:10px;"></div>
                <ul dir="rtl" class="sidebarlist" style="margin-top:30px;">
                    <li style="">1</li>
                    <li style="">2</li>
                    <li style="">3</li>
                </ul>
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