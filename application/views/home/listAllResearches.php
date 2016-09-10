<!DOCTYPE html>
<html>
<head>
    <title>Search Result | <?php echo SITENAME?></title>
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
                    if(isset($researches) && !empty($researches)){
                        $i=0;
                        foreach($researches as $research){
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
                            
                            $research->getResearchAuthors();
                            $others = "";
                            
                            if(count($research->authorResearches)>1){
                            $others = "[واخرون]";
                            }
                            $research->publisher->findMyInstitute();
                            $institute = "";
                            if(isset($research->publisher->institute) && !empty($research->publisher->institute)){
                                $institute = $research->publisher->institute->instituteName;
                            }
                                    ?>
                                    <h6><?= $research->mainAuthor->name." ".$others?> , <?= $research->publisher->publisherName?> , <?=$institute?> , <?= $research->publishDate?></h6>

                                </div>
                            </div>
                        </a>
                    </div>

                    <?php   
                            $i++;
                        }
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
