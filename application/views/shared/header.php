<?php
$username = isset($this->session->userdata["username"]) && !empty($this->session->userdata["username"])?$this->session->userdata["username"]:"";
?>

<div class="newHeader" style="position: relative; height: 300px;">
    <div class="" style="position: relative; height: 90px">
        <div style="position: relative; float: right; height: 90px; " class="newHeaderlogo"><!--logo-->

            <img  style=" max-width:100%;max-height:100%" src="<?php echo base_url()?>/images/6.png" alt="" />
        </div>
        <div class="newHeaderWrapper" style="position: relative; float: right; height: 90px; background:url('./images/1.png') no-repeat; background-size:100% 90px">
            <div class="row" style="margin:22px 0 0 22px"><!--search box-->
                <div style="float:left;">
                    <input type="button" value="بحث"/>
                </div>
                <div style="float:left;width:20%"><!--input text-->
                    <input type="text" style="width:100%" />
                </div>
            </div>
            <div class="" style="float:left; position:relative;background-color:#1081c0 ;height:20px; margin-top:15.8px;width:95%;"><!--blue banner-->

            </div>
            <div style="float:left;position:relative;position:relative;margin-top:15.8px;height:20px;width:5% ">
                <img style="width:100%;height:100%" src="<?php echo base_url()?>/images/2.png"/>
            </div>
        </div>
    </div>
    <div class="" style="position:relative; height:170px;width:100%;  background:url('./images/3.png') no-repeat; background-size:100% 170px">
        <div class="row" style="text-align:right">
            <h2 class="headerHeading" style="position:relative;float:right;color:white;margin-right:40px;">مكتبة الأبحاث العربية</h2>

        </div>
    </div>
    <div class="row" style="margin-top:0.4%;position:relative;border-bottom-style:solid;border-bottom-color:#f6aa05;height:30px;"><!--navigation bar-->
        <div style="position:relative; text-align:center"><!--navigation-->
                <a style="float:right;border-top-style:solid;border-top-color:#f6aa05;border-top-width:thin;position:relative; width:13%;margin-left:0.4%;color:white;background-color:#dd7403;height:27px"><h4 class="headings">الصفحة الرئيسية</h4></a>
                <a style="float:right;border-top-style:solid;border-top-color:#f6aa05;border-top-width:thin;position:relative; width:13%;margin-left:0.4%;color:white;background-color:#dd7403;height:27px"><h4 class="headings">دوريات وأبحاث</h4></a>
                <a style="float:right;border-top-style:solid;border-top-color:#f6aa05;border-top-width:thin;position:relative; width:13%;margin-left:0.4%;color:white;background-color:#dd7403;height:27px"><h4 class="headings">أضف الى المكتبة</h4></a>
                <a style="float:right;border-top-style:solid;border-top-color:#f6aa05;border-top-width:thin;position:relative; width:13%;margin-left:0.4%;color:white;background-color:#dd7403;height:27px"><h4 class="headings">أحداث</h4></a>

                <a style="float:right;border-top-style:solid;border-top-color:#f6aa05;border-top-width:thin;position:relative; width:8%;color:white;background-color:#dd7403;height:27px"><h4 class="headings">أبجدي</h4></a>
            <div style="float:right;width:38.4%;border-top-style:solid;border-top-color:#f6aa05;border-top-width:thin;background-color:#dd7403;height:27px">
                <div style="float:left;width:90%;background-color:#f6aa05 ;height:20px"></div>
                <div style="float:left;width:5%;height:20px">
                    <img style="width:100%;height:100%" src="<?php echo base_url()?>/images/5.png" />
                </div>
            </div>
        </div>
    </div>
</div>

<!--
<div class="header_bg">
    <div class="wrap">
        <div class="header">
            <div class="row mainHeader">
                <div class="col-md-2 logoWrapper">
                    <div class="logoo">
                        <h1><a href="<?php echo base_url()?>">
                            <img src="<?php echo base_url()?>/images/logo2.JPG" alt="" /></a></h1>
                    </div>
                </div>
                <div class="col-md-10 restWrapper">
                    <div class="row loginWrapper">
                        <div class="login">
                            <?php
                            if ($username==""){
                            ?>
                            <a class="btn loginBtn" href="<?php echo site_url("usercontroller/loginview") ?>">تسجيل الدخول</a>
                            <?php
                            }else{
                            ?>
                            <div class="loginName">
                                <p class="loginBtn">Mostava</p>
                            </div>
                            <a class="btn logOutBtn" href="<?php echo site_url("usercontroller/logout") ?>">تسجيل الخروج</a>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="row searchWrapper">
                        <div class="searc">
                            <div>
                                <input type="button" class="btn advSearchBtn" value="بحث متثدم" />
                                <input type="button" class="btn searchBtn" value="بحث" />
                            </div>
                            <div>
                                <input type="text" class="searchTxt" />
                            </div>
                        </div>
                    </div>
                    <div class="row menuWrapper">
                        <div class="menuContent">
                            <ul class="menu" style="">
                                <li class=""><a class="btn" href="<?php echo base_url()?>">الصفحة الرئيسية</a></li>
                                <li><a class="btn" href="#">دوريات وأبحاث</a></li>
                                <li><a class="btn" href="#">أضف إلي المكتبة</a></li>
                                <li><a class="btn" href="#">أحداث</a></li>
                                <li><a class="btn" href="#">أبجدي</a></li>
                                <li><a class="btn" href="#">إتصل بنا</a></li>
                                <?php
                                if ($username!=""){
                                ?>
                                <li><a class="btn" href="<?php echo site_url("homecontroller/uploadpaperview")?>">اضافة محتوى</a></li>
                                <li><a class="btn"href="<?php echo site_url("homecontroller/bulkaddpapers")?>" >اضافة قائمة ابحاث</a></li>
                                <li><a class="btn" href="<?php echo site_url("homecontroller/displaydata")?>">عرض قاعدة البيانات</a></li>
                                <li><a class="btn" href="<?php echo site_url("homecontroller/manipulateone")?>">تعديل البيانات</a></li>

                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                        <div class="socialList">
                            <ul class="">
                                <li style=""><a href="#">
                                    <img class="socialImg" src="<?php echo base_url()?>/images/F_icon.svg.png" /></a></li>
                                <li style=""><a href="#">
                                    <img class="socialImg" src="<?php echo base_url()?>/images/Twitter-icon.png.png" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
-->
