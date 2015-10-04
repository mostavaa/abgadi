<!DOCTYPE html>
<html>
<head>
    <title>Home | <?php echo SITENAME?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    $this->load->view('shared/css');
    ?>
</head>
<body>
            <?php 
                    $this->load->view('shared/sidebar');
?>
    <?php
    $this->load->view('shared/header');
    ?>
    <div class="main_bg">
        <div class="wrap">
            <div class="main">
                <div class="content">

                    <h1 style="text-align:center">ليس لديك الحق في الدخول الى هذه الصفحة</h1>

                </div>
            </div>
        </div>
    </div>
    <?php
    $this->load->view('shared/footer');
    ?>
    <?php
    $this->load->view('shared/scripts');
    ?>
</body>
</html>