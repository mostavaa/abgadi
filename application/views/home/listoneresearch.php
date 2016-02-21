<!DOCTYPE html>
<html>
<head>
    <title>Paper | <?php echo SITENAME?></title>
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
                    if(isset($research) && !empty($research)){
                        $i=0;

                    ?>
                    <div class="row">
                        <div class="" style="text-align: right; margin: 10px;">

                            <div class="panel-body">
                                <a class="" href="<?= base_url("index.php/homecontroller/listonepub/{$research->publisher->id}")?>">
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
                            
                            echo "<a class='' style='float:right;margin-right:2px;' href='".base_url("index.php/homecontroller/listoneauth/{$authResearch->author->id}")."'><h5>{$authResearch->author->name}</h5></a> , ";
                            
                            
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
                                <a class="" href="<?= base_url("index.php/homecontroller/listoneinst/{$institute->id}")?>">
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
                                <a href="<?=base_url()."pdfs/{$research->researchFileName}"?>" class="btn btn-primary">
                                    <div style=""><h4 style="float:right">تحميل</h4><img style="float:right; height:40px;width:40px" src="<?=base_url()?>/images/down.png"/></div>
                                </a>
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

                            </div>


                        </div>
                    </div>

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
