<!DOCTYPE html>
<html>
<head>
    <title>Database | <?php echo SITENAME?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    $this->load->view('shared/css');
    ?>
    <style>
        .content {
            direction: rtl;
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
                <br />
                <div >
                    <ul class="">
                        <li class="btn btn-default"><a  href="<?php echo site_url("admin/authors")?>">الباحثون</a></li>
                        <li class="btn btn-default"><a class=""href="<?php echo site_url("admin/publishers")?>" >الناشرون</a></li>
                        <li class="btn btn-default"><a class="" href="<?php echo site_url("admin/data/researches")?>">الابحاث</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <?php
    //$this->load->view('shared/footer');
    ?>
    <?php
    $this->load->view('shared/scripts');
    ?>
</body>
</html>
