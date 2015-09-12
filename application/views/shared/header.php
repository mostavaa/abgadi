<?php
$username = isset($this->session->userdata["username"]) && !empty($this->session->userdata["username"])?$this->session->userdata["username"]:"";
?>
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
