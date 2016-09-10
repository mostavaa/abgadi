<!DOCTYPE html>
<html>
<head>



    <meta property="og:title" content="About Our Company"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content="http://www.mysite.com/article/"/>
<meta property="og:image" content="http://www.mysite.com/articleimage.jpg"/>
<meta property="og:site_name" content="My Company Name"/>
<meta property="fb:app_id" content="1234567890987654321"/>
<meta property="og:description" content="A description of our services and company profile."/>
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
        .cleaner{
            margin-top:100px;
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
    <!--
          <div itemscope itemtype="http://schema.org/EducationalOrganization">
     	<meta itemprop="description" content="أبجدي أول موقع انترنت لنشر الأبحاث المحكمة في مجالات العلوم الشرعية واللغوية">
        <span itemprop="name" style="display:block;"><strong>مكتبة الابحاث العربية</strong></span>
        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
			<div>
				<span itemprop="addressLocality" style="display:block;">Cairo</span>,
				</div>
			<span itemprop="addressCountry"style="display:block;">Egypt</span>
		</div>
	</div>
        -->
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
            <div class="row" style="min-height:300px;">
                <div class="cleaner"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <!--<h2 style="text-align:center" class="alert alert-danger" > الموقع تحت الانشاء</h2>-->
                                    <form method="post" action="<?=site_url("search");?>">
                <div id="">
                                    <div id="searchBtnContainer">
                    <input id="searchBtn" type="submit" value="بحث" />
                </div>
                    <!--input text-->
                    <input id="searchInputText" name="query" dir="rtl" type="text" style="width:100%" />

                </div>
                    </form>
                    <div align="center" style="text-align:center" >
                    <h4>تشغيل تجريبي</h4>
                    </div>
                </div>
                 
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

                <div class="col-md-4 alert alert-warning" align="right">
					 <b dir="rtl">	
					 نتعاون معك كباحث في:
					 </b>
					 <ul dir="rtl">
					 <li>توفير مكتبة عصرية متزايدة غير مسبوقة في مجالات العلوم الشرعية واللغوية، تسمح بشتى وسائل البحث والاطلاع والتحميل على الانترنت.</li>
					 <li>إضافة أبحاثك المحكمة لقاعدة بيانات أبجدي، ونشرها.</li>
					 <li>إنشاء وإدارة صفحتك الشخصية، والتي تشمل نتاجك العلمي المحكم.</li>
					 <li>توفير قاعدة بيانات واسعة عن الباحثين والمتخصصين في المجال، تحقيقا للتواصل.</li>	
					 <li>جميع خدماتنا مجانية.</li></ul>
					 
					 <b dir="rtl">
					 نتعاون معك كمؤتمر أو دورية علمية في:
					 </b>
					 <ul dir="rtl">
					 <li>النشر الإلكتروني لأبحاث المؤتمر أو الدورية، والوصول بها لأكبر عدد من الباحثين والقراء.</li>
					 <li>الإعلان عن المؤتمر أو الدورية تحقيقا لعالمية الإنتشار.</li>
					 <li>توفير صفحة دائمة خاصة بالمؤتمر أو الدورية، تشمل الإصدارات السابقة.</li>
					 </ul>



                   
                    
                </div>
                <div class="col-md-1" >
                    
                </div>

                <div class="col-md-2 " >
         
                </div>
                <div class="col-md-1 " >
                   
                </div>

                <div class="col-md-4 alert alert-warning" align="right">
                <h4 dir="rtl">
                    أبجدي أول موقع انترنت لنشر الأبحاث المحكمة في مجالات العلوم الشرعية واللغوية
					 </h4>
					 <br>
					 <b dir="rtl">
					 	أبجدي له رسالة علمية تتلخص في
					</b>	
                    <ul dir="rtl">
                        <li style="">النشر الالكتروني الدائم للبحوث والمصنفات العلمية في مجالات العلوم الشرعية واللغوية.</li>
                        <li style="">الوصول بالأفكار البحثية لأكبر عدد من الباحثين والقراء في جميع أنحاء العالم.</li>
                        <li style="">تحقيق التواصل العلمي بين الباحثين، وإثراء الحركة البحثية.</li>
                    </ul>
                    <br><br>
أبجدي شركة لا تهدف إلى الربح، أو النيابة عن أحد في إعداد البحوث، أو الاستغلال المادي أو الأدبي لحقوق المؤلفين، أو  إصدار الفتاوى الشرعية، أو ممارسة العمل السياسي، أو تبني أراء بذاتها.
                
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
