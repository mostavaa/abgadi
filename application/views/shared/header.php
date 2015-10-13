<?php
$username = isset($this->session->userdata["username"]) && !empty($this->session->userdata["username"])?$this->session->userdata["username"]:"";
?>

<div class="newHeader">
    <div id="newHeaderContainer">
        <div class="newHeaderlogo">
            <!--logo-->

            <img id="pcLogo"  src="<?php echo base_url()?>/images/6.png" alt="" />
        </div>
        <div class="newHeaderWrapper">
            <div class="row searchContainer">
                <!--search box-->

                <div id="searchTextBoxContainer">
                                    <div id="searchBtnContainer">
                    <input type="button" value="بحث" />
                </div>
                    <!--input text-->
                    <input id="searchInputText" type="text" />
                </div>
            </div>
            <div class="row blueAndOrangeBanners">
                <div class="blueBanner">
                    <!--blue banner-->

                    <img  id="mobileNavigationMenuBtn" src="<?php echo base_url()?>/images/5m.png"/>

                    <h5 id="mobileHeading">مكتبة الأبحاث العربية</h5>
                </div>
                <div id="blueBannerImageDiv">
                    <img  src="<?php echo base_url()?>/images/2.png"/>
                </div>
                <div id="solidOrangeBanner">
                </div>
            </div>

        </div>
    </div>
    <div class="middleHeader">
        <div class="row headerHeadingContainer">
            <h2 class="headerHeading">مكتبة الأبحاث العربية</h2>

        </div>
    </div>
    <div class="row navigationBar">
        <!--navigation bar-->
        <div id="navigationWrapper">
            <!--navigation-->
            <a href="<?php echo base_url()?>" class="heading">
                <h4 class="headings">الصفحة الرئيسية</h4>
            </a>
            <a class="heading">
                <h4 class="headings">دوريات وأبحاث</h4>
            </a>
            <a class="heading">
                <h4 class="headings">أضف الى المكتبة</h4>
            </a>
            <a class="heading">
                <h4 class="headings">أحداث</h4>
            </a>

            <a id="lastHeading">
                <h4 class="headings">أبجدي</h4>
            </a>
            <div id="leftBanner">
                <div id="orangeBanner"></div>
                <div id="orangeBannerImageContainer">
                    <img  src="<?php echo base_url()?>/images/5.png" />
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
                            <ul class="menu" >
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
                                <li ><a href="#">
                                    <img class="socialImg" src="<?php echo base_url()?>/images/F_icon.svg.png" /></a></li>
                                <li ><a href="#">
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
