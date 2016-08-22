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
                <form method="post" action="<?=site_url("homecontroller/submitsearch");?>">
                <div id="searchTextBoxContainer">
                                    <div id="searchBtnContainer">
                    <input id="searchBtn" type="submit" value="بحث" />
                </div>
                    <!--input text-->
                    <input id="searchInputText" name="query" dir="rtl" type="text" />

                </div>
                    </form>
            </div>
            <div class="row blueAndOrangeBanners">
                <div class="blueBanner">
                    <!--blue banner-->

                    <img  id="mobileNavigationMenuBtn" src="<?php echo base_url()?>/images/5m.png"/>

                    <h6 class="h7" id="mobileHeading">مكتبة الأبحاث العربية</h6>
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
