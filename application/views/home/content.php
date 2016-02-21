<!DOCTYPE html>
<html>
<head>
    <title>Manage | <?php echo SITENAME?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    $this->load->view('shared/css');
    ?>
    <style>
        .contentList {
            position: relative;
            direction: rtl;
            overflow: auto;
        }

            .contentList ul li {
                float: right;
                margin: 2px;
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

            <div class="content">

                <div class="contentList">
                    <ul>
                        <li class="btn btn-default"><a  href="<?php echo site_url("homecontroller/uploadpaperview")?>">اضافة محتوى</a></li>
                        <li class="btn btn-default"><a class=""href="<?php echo site_url("homecontroller/bulkaddpapers")?>" >اضافة قائمة ابحاث</a></li>
                        <li class="btn btn-default"><a class="" href="<?php echo site_url("homecontroller/displaydata")?>">عرض قاعدة البيانات</a></li>
                        <li class="btn btn-default"><a class="" href="<?php echo site_url("homecontroller/manipulateone")?>">تعديل البيانات</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <?php
    // $this->load->view('shared/footer');
    ?>
    <?php
    $this->load->view('shared/scripts');
    ?>
</body>
</html>
