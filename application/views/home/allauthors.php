<!DOCTYPE html>
<html>
<head>
    <title>Authors | <?php echo SITENAME?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    $this->load->view('shared/css');
    ?>
    <style>
        .content {
            direction: rtl;
        }

        .inlineheader {
            display: inline;
        }

        .frame {
            font-size: 20px;
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
                            <th style="text-align:right">اسم الباحث</th>
                            <th style="text-align:right">الابحاث</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php 
                            
                            if(isset($authors) && !empty($authors)){
                                foreach($authors as $author){
                                    $authorResearches = $author->findMyMainResearches();
                                    echo "<tr><td><a href='".base_url("index.php/homecontroller/listoneauth/{$author->id}")."'>{$author->name}</a></td>";
                                    echo "<td>";
                                    if (!empty($authorResearches)){
                                        
                                        echo "<ul class='list-group'>";
                                        foreach($authorResearches  as $authorResearch){
                                            echo "<li class='list-group-item'><a href='".base_url("index.php/homecontroller/listoneresearch/{$authorResearch->id}")."'>".$authorResearch->arabicHeadingName."</a></li>";
                                            
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
