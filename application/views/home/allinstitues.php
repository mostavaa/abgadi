<!DOCTYPE html>
<html>
<head>
    <title>institutes | <?php echo SITENAME?></title>
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
    <div class="container" >
        <div class="row page">


            <?php
            $this->load->view('shared/header');
            ?>

            <div class="content" style="text-align:center">
 <h1>دوريات وأبحاث</h1>

                        <?php 
                        
                        if(isset($institutes) && !empty($institutes)){
                            foreach($institutes as $institute){
                                
                                echo "<div class='list-group parent'>";
                                echo "<a class='list-group-item active institutes' href='#' >{$institute->instituteName}</a>";
                                $publishers =  $institute->findMyPublishers();
                                if($publishers && !empty($publishers)){
                                    echo "<div class='researches' style='display:none'>";                                    
                                    foreach($publishers as $publisher){
                                        //$publisher->publisherName;
                                        $pubResearches = $publisher->findMyResearches();
                                        if($pubResearches && !empty($pubResearches)){
                                            foreach($pubResearches as $re){
                                                echo "<a class='list-group-item' href='".base_url("index.php/homecontroller/listoneresearch/{$re->id}")."'>".$re->arabicHeadingName."</a>";
                                            }
                                        }
                                    }
                                    echo "</div>";                                    
                                }
                                echo "</div>";
                            }
                        }
                        
                        //for publishers that don't have institutes
                        if(isset($pubs) && !empty($pubs)){
                            foreach($pubs as $pub){
                                $pubResearches = $pub->findMyResearches();
                                echo "<div class='list-group parent'>";                                
                                echo "<a class='list-group-item active institutes' href='#'>{$pub->publisherName}</a>";
                                
                                if (!empty($pubResearches)){
                                    echo "<div class='researches' style='display:none'>";                                                                        
                                    foreach($pubResearches  as $pubResearch){
                                        echo "<a  class='list-group-item' href='".base_url("index.php/homecontroller/listoneresearch/{$pubResearch->id}")."'>".$pubResearch->arabicHeadingName."</a>";
                                        
                                    }
                                    echo "</div>";                                    
                                    
                                }
                                echo "</div>";
                            }
                        }
                        ?>

                

            </div>

        </div>
    </div>

    <?php
    //$this->load->view('shared/footer');
    ?>
    <?php
    $this->load->view('shared/scripts');
    ?>
    <script>
        $(document).ready(function () {
            $(".institutes").click(function (e) {
                $(this).parents(".parent").find(".researches").toggle();
                e.preventDefault();
            });
        });

    </script>
</body>
</html>
