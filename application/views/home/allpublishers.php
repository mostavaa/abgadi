<!DOCTYPE html>
<html>
<head>
    <title>Publishers | <?php echo SITENAME?></title>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th style="text-align:right">اسم الناشر</th>
                            <th style="text-align:right">الابحاث</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php 
                            
                            if(isset($pubs) && !empty($pubs)){
                                foreach($pubs as $pub){
                                    $pubResearches = $pub->findMyResearches();
                                    echo "<tr><td><a href='".base_url("index.php/homecontroller/listonepub/{$pub->id}")."'>{$pub->publisherName}</a></td>";
                                    echo "<td>";
                                    if (!empty($pubResearches)){
                                        
                                        echo "<ul class='list-group'>";
                                        foreach($pubResearches  as $pubResearch){
                                            echo "<li class='list-group-item'><a href='".base_url("index.php/homecontroller/listoneresearch/{$pubResearch->id}")."'>".$pubResearch->arabicHeadingName."</a></li>";
                                            
                                        }
                                        echo "</ul>";
                                    }
                                    echo "</td><tr>";
                                }
                            }
                            ?>
                        
                    </tbody>
                </table>
               
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
