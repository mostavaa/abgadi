<!DOCTYPE html>
<html>
<head>


    <title>Add to Library | <?php echo SITENAME?></title>
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

        .cleaner {
            margin-top: 100px;
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

    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "http://abgadi.com/",
      "logo": "http://abgadi.com//images/6.png",
  "contactPoint": [{
    "@type": "ContactPoint",
    "telephone": "+2-010-128-90605",
    "contactType": "customer service"
  }],
  "description":"أبجدي أول موقع انترنت لنشر الأبحاث المحكمة في مجالات العلوم الشرعية واللغوية"
}
    </script>

    <?php
    $this->load->view('shared/sidebar');
    ?>

    <div class="container">
        <div class="row page">
            <?php
            $this->load->view('shared/header');
            ?>

            <div class="row" style="text-align: center;">
                <div style="margin-top: 150px;" class="row"></div>

                <div class="col-md-4" align="right">
                </div>
                <div class="col-md-1">
                </div>

                <div class="col-md-2 alert alert-warning">
                    لإنشاء صفحتك على أبجدي
                    <br>
                    <a href="mailto:database@abgadi.com">database@abgadi.com</a><br>
                    للاستفسارات والمقترحات
                    <br>
                    <a href="mailto:info@abgadi.com">info@abgadi.com</a><br>
                    هاتف
00201012890605
         
                </div>
                <div class="col-md-1 ">
                </div>

                <div class="col-md-4" align="right"></div>
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
