<!DOCTYPE html>
<html>
<head>
    <title>Paper | <?php echo SITENAME?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
    $pageURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(isset($research) && !empty($research)){
    ?>
    <meta property="og:url" content="<?=$pageURL?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?=tools::removeFileExtension($research->arabicHeadingName)?>" />
    <meta property="og:description" content="<?=$research->arabicDescription?>" />
    <!--<meta property="og:image" content="https://www.facebook.com/photo.php?fbid=10204581220964189&set=a.1313277525718.36757.1644064516&type=3&theater" />-->

    <?php
    }
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

        .page {
            border: 2px solid rgb(181,181,181);
            background-color: white;
        }

        body {
            background-color: rgb(238,237,237);
        }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['bar'] });
        google.charts.setOnLoadCallback(drawStuff);

            <?php 
            $allCount = 0;
            $allCountIpReg = 0;
            if (isset($visitCount)&&!empty($visitCount)){
                
            ?>
        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
              ['البلاد', 'عدد المشاهدة'],
                                                               <?php 
                
                foreach ($visitCount as $country=>$Count)
                {
                    $allCount++;
                    //echo "<tr><td>{$country}</td><td>{$Count[1]}</td></tr>";
                    //echo "<tr><td>{$country}</td><td>{$Count[1]}</td></tr>";
                    echo "['{$country}', {$Count[1]}],";
                }
                                                               ?>
            ]);


            var options = {

                chart: {
                },
                series: {
                    0: { axis: 'البلاد' } // Bind series 0 to an axis named 'distance'.
                },
                axes: {
                    y: {
                        distance: { label: '' }, // Left y-axis.
                    }
                }


            };

            var chart = new google.charts.Bar(document.getElementById('dual_y_div'));
            chart.draw(data, options);
        };
        <?php 
                
            }
        ?>

    </script>
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

            <div class="row" style="text-align: center;">
                <div class="sideBar">
                    <div class="row orangeBannerInSideBar"></div>
                    <ul dir="rtl" class="sidebarlist">
                        <li style="">1</li>
                        <li style="">2</li>
                        <li style="">3</li>
                    </ul>
                </div>
                <div class="pageContent">

                    <?php 
                    if(isset($research) && !empty($research)){
                        $i=0;

                    ?>
                    <div class="row">
                        <div class="" style="text-align: right; margin: 10px;">

                            <div class="panel-body">
                                <a class="" href="<?= base_url("index.php/publisher/{$research->publisher->id}")?>">
                                    <h4><?= $research->publisher->publisherName?></h4>
                                </a>
                                <div class="panel-heading">
                                    <h4><?=tools::removeFileExtension($research->arabicHeadingName)?></h4>
                                </div>
                                <br />
                                <?php 
                        $research->getMainAuthor();
                        
                        $research->getResearchAuthors();
                        
                        $authArr = array();
                        foreach($research->authorResearches as $authResearch){
                            
                            echo "<a class='' style='float:right;margin-right:2px;' href='".base_url("index.php/author/{$authResearch->author->id}")."'><h5>{$authResearch->author->name}</h5></a> , ";
                            
                            
                        }
                        
                                ?>
                                <div style="clear: both"></div>
                                <hr />


                                <h6><?=$research->publishDate?></h6>

                                <?php 
                        $research->publisher->loadinstitute=true;
                        $res = $research->publisher->findPublisher(array("id"=>$research->publisher->id));
                        if($res && !empty($res)){
                            $pub = $res[0];
                            if($pub->institute && !empty($pub->institute)){
                                $institute = $pub->institute;
                                ?>
                                <a class="" href="<?= base_url("index.php/institute/{$institute->id}")?>">
                                    <h4><?= $institute->instituteName?></h4>
                                </a>
                                <?php
                            }
                        }
                                ?>


                                <h6><?= $research->publishCountry ?></h6>

                                <?php 
                        if($research->researchType && !empty($research->researchType)){
                                ?>
                                <h6 class="" style='float: right; margin-right: 2px;'><?= $research->researchType->name ?> - </h6>
                                <?php
                        }
                        if($research->specialization && !empty($research->specialization)){
                                ?>
                                <h6 class="" style='float: right; margin-right: 2px;'><?= $research->specialization->name ?> - </h6>

                                <?php
                        }                        
                        if($research->accurateSpecialization && !empty($research->accurateSpecialization)){
                                ?>
                                <h6 class="" style='float: right; margin-right: 2px;'><?= $research->accurateSpecialization->name ?> - </h6>

                                <?php
                        }                        
                                ?>

                                <div style="clear: both"></div>
                                <h6 dir="rtl"><?= $research->pagesCount ?> صفحة</h6>
                                <br />
                                <a id="download" href="<?=base_url()."pdfs/{$research->researchFileName}"?>" class="btn btn-primary <?=$research->id?>" data-id="<?=$research->id?>">
                                    <div style="">
                                        <h4 style="float: right">تحميل</h4>
                                        <img style="float:right; height:40px;width:40px" src="<?=base_url()?>/images/down.png"/>
                                    </div>
                                </a>
                                <br />
                                <p>
                                    <?php 
                        if (isset($downloadCount)&&!empty($downloadCount)){
                            $allDownloadCount = 0;
                            $allDownloadCountIpReg = 0;
                            foreach ($downloadCount as $country=>$downCount)
                            {
                                $allDownloadCount+=$downCount[1];//one down foreach ip
                                $allDownloadCountIpReg+=$downCount[0];//one down foreach ip
                            }
                            echo $allDownloadCount;
                        }
                                    ?>
                                </p>
                                <div style="clear: both"></div>

                                <h4 dir="rtl" style="margin: 15px;"><?=$research->arabicDescription?></h4>
                                <br />
                                <?php 
                        $another = $keyword = $research->keyWords;


                        $keyword= $another;
                        $keyword= str_replace("&" ,"*" ,$keyword );
                        
                        
                        $keyword = str_replace("<" ,"" ,$keyword );
                        
                        $keyword = str_replace(">" ,"" ,$keyword );
                        $keyword = str_replace("/" ,"" ,$keyword );
                        $keyword = str_replace("  " ," " ,$keyword );
                        $keywords = explode("*" ,$keyword );
                        if(count($keywords)>1){
                            $found= true;
                            foreach($keywords as $key){
                                echo "<h6 class=\"btn btn-default\" style='float:right;margin-right:2px;'>{$key}</h6>";
                            }   
                        }
                        if(!$found){
                            echo "<h6 class=\"btn btn-default\" style='float:right;margin-right:2px;'>{$another}</h6>";
                            
                        }
                                ?>
                                <div style="clear: both"></div>
                                <br />

                                <div class="fb-share-button" data-href="<?=$pageURL?>" data-layout="button"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--
                                                                             <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>البلد</td>
                                                    <td>عدد مرات المشاهدة</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                        if (isset($visitCount)&&!empty($visitCount)){
                            //$allCount = 0;
                            $allCountIpReg = 0;
                            foreach ($visitCount as $country=>$Count)
                            {
                                echo "<tr><td>{$country}</td><td>{$Count[1]}</td></tr>";
                                //echo "<tr><td>{$country}</td><td>{$Count[1]}</td></tr>";
                            }
                            
                        }
                                                ?>
                                            </tbody>

                                        </table>
       -->
                                        <div id="dual_y_div" style="width: 100%; height: 500px;"></div>

                                    </div>

                                </div>


                            </div>


                        </div>
                    </div>


                    <!--add rich card-->
                    <script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "name": "<?=tools::removeFileExtension($research->arabicHeadingName)?>",
  "description": "<?=$research->arabicDescription?>",
  
  "brand": {
    "@type": "Thing",
    "name": "Abgadi"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.4",
    "reviewCount": "<?= $allCount?>"
  }
}
                    </script>
                    <?php  
                        
                    }
                    ?>


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
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1561619487489118";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

        var fbxhr = new XMLHttpRequest();
        fbxhr.open("POST", "https://graph.facebook.com", true);
        fbxhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        fbxhr.send("id=<?=$pageURL?>&scrape=true");
        $(document).ready(function () {
            $("#download").click(function () {
                id = $("#download").attr("data-id");
                $.post("<?php echo site_url("download")?>", "id=" + id);
        });
    });
    </script>
</body>
</html>
