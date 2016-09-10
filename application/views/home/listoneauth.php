<!DOCTYPE html>
<html>
<head>
    <title>Author | <?php echo SITENAME?></title>
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
                    if(isset($author) && !empty($author)){
                        

                    ?>
                    <div class="" style="text-align: right; margin: 10px;">
                        <div class="panel-heading">
                            <h4><?=$author->name?></h4>
                        </div>
                        <div class="panel-body">
                            <?php 
                        if(isset($author->institute) && !empty($author->institute)){
                            ?>
                            <a class="" href="<?= base_url("index.php/institute/{$author->institute->id}")?>">
                                <h4><?= $author->institute->instituteName?></h4>
                            </a>
                            <br />
                            <?php 
                        }
                        
                        if(isset($author->specialization) && !empty($author->specialization)){
                            ?>
                            <h6 class="btn" style='float: right; margin-right: 2px;'><?= $author->specialization->name ?></h6>
                            <?php
                        }
                        
                        if(isset($author->accurateSpecialization) && !empty($author->accurateSpecialization)){
                            ?>
                            <h6 class="btn" style='float: right; margin-right: 2px;'><?= $author->accurateSpecialization->name ?></h6>
                            <?php
                        }
                        if(isset($author->currentScientificDegree) && !empty($author->currentScientificDegree)){
                            ?>
                            <h6 class="btn" style='float: right; margin-right: 2px;'><?= $author->currentScientificDegree->name ?></h6>
                            <?php
                        }
                        if(isset($author->job) && !empty($author->job)){
                            ?>
                            <h6 class="btn" style='float: right; margin-right: 2px;'><?= $author->job->name ?></h6>
                            <?php
                        }
                            ?>
                            <div style="clear: both"></div>
                            <?php                      
                        
                        if(isset($author->mail) && !empty($author->mail)){
                            echo "<h6 class=\"btn btn-default\" style='float:right;margin-right:2px;'>{$author->mail}</h6>";                             
                        }
                        if(isset($author->mobileNumber) && !empty($author->mobileNumber)){
                            echo "<h6 class=\"btn btn-default\" style='float:right;margin-right:2px;'>{$author->mobileNumber}</h6>";                             
                        }
                        if(isset($author->jobPhone) && !empty($author->jobPhone)){
                            echo "<h6 class=\"btn btn-default\" style='float:right;margin-right:2px;'>{$author->jobPhone}</h6>";                             
                        }
                        if(isset($author->jobAddress) && !empty($author->jobAddress)){
                            echo "<h6 class=\"btn btn-default\" style='float:right;margin-right:2px;'>{$author->jobAddress}</h6>";                             
                        }
                        echo "<div style=\"clear: both\"></div>";
                        $researchs =  $author->findMyMainResearches();
                        if(isset($researchs) && !empty($researchs)){
                            //sort by date
                            $sortedResearches = array();
                            $yearsOnly = array();
                            
                            echo "<ul class=\"nav nav-tabs\">";
                            echo "<li><a data-toggle=\"tab\" href=\"#الكل\">الكل</a></li>";
                            
                            foreach($researchs as $resear){
                                $sortedResearches[$resear->publishDate][]=$resear;
                                if(!in_array($resear->publishDate , $yearsOnly)){
                                    $yearsOnly[]=$resear->publishDate;
                                    echo "<li><a data-toggle=\"tab\" href=\"#{$resear->publishDate}\">{$resear->publishDate}</a></li>";
                                }
                            }
                            echo "</ul>";
                            echo "<div class=\"tab-content\">";
                            //all first
                            echo "<div id=\"الكل\" class=\"tab-pane fade\">";
                            echo "<h3>الكل</h3>";
                            $i=0;
                            foreach($researchs as $research){
                                if($i%2!=0){
                                    $classname="alert-info";
                                }else{
                                    $classname="alert-success";
                                }
                            ?>
                            <div class="row">
                                <a href="<?=base_url("index.php/research/{$research->id}")?>">
                                    <div class="alert <?=$classname?>" style="text-align: right ; margin:5px;">
                                        <div class="smallResearchCard">

                                            <h4><?= tools::removeFileExtension($research->arabicHeadingName)?></h4>
                                            <?php 
                                $research->getMainAuthor();
                                
                                            ?>
                                            <h6><?= $research->mainAuthor->name?> , <?= $research->publisher->publisherName?> , <?= $research->publishDate?></h6>

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                                $i++;
                            }
                            echo"</div>";
                            
                            foreach($sortedResearches as $year=>$allResearchs){
                                
                                echo "<div id=\"{$year}\" class=\"tab-pane fade\">";
                                echo "<h3>{$year}</h3>";
                                $i=0;
                                foreach($allResearchs as $research){
                                    if($i%2!=0){
                                        $classname="alert-info";
                                    }else{
                                        $classname="alert-success";
                                    }
                            ?>
                            <div class="row">
                                <a href="<?= base_url("index.php/research/{$research->id}")?>">
                                    <div class="alert <?=$classname?>" style="text-align: right ; margin:5px;">
                                        <div class="smallResearchCard">

                                            <h4><?= tools::removeFileExtension($research->arabicHeadingName)?></h4>
                                            <?php 
                                    $research->getMainAuthor();
                                    
                                            ?>
                                            <h6><?= $research->mainAuthor->name?> , <?= $research->publisher->publisherName?> , <?= $research->publishDate?></h6>

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                                    $i++;
                                }
                                echo"</div>";
                            }
                        }
                        echo "</div>";//end tab contents

                            ?>


                        </div>


                    </div>

                                        <!--add rich card-->
                    <script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "name": "<?=$author->name?>",
  "description": "<?=$author->name?>",
  
  "brand": {
    "@type": "Thing",
    "name": "Abgadi"
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

</body>
</html>
