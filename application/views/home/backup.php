<!DOCTYPE html>
<html>
<head>
    <title>Backup | <?php echo SITENAME?></title>
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
                        <?php 
                        $files = glob('./backup/*');
                        foreach($files as $file) {
                            $url = base_url("".substr($file , strpos($file ,-1)));
                        ?>

                        <li class="btn btn-default"><a  href="<?php echo $url?>"><?=substr($file , strpos($file ,-1))?></a></li>
                        <?php
                        }
                        ?>

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
