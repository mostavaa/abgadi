<?php 

$errors = $this->session->flashdata('errors');
$success = $this->session->flashdata('success');
$mycsv = $this->session->userdata('mycsv');

if(isset($mycsv) && !empty($mycsv)){
    $mycsv = unserialize($mycsv);
}
//$mycsv = $this->session->flashdata('mycsv');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bulk Load | <?php echo SITENAME?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    $this->load->view('shared/css');
    ?>
    <style>
        label.myLabel input[type="file"] {
            position: fixed;
            top: -1000px;
        }

        /***** Example custom styling *****/
        .myLabel {
            text-align: center;
            padding: 2px 5px;
            margin: 2px;
            border-radius: 1px;
            color: black !important;
            background-color: #f7f7f7;
            border: 1px solid silver;
            -webkit-box-shadow: inset 0 1px 5px rgba(0,0,0,0.2);
            box-shadow: inset 0 1px 5px rgba(0,0,0,0.2), 0 1px rgba(255,255,255,.8);
            cursor: pointer;
            overflow: hidden;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: background-color .5s ease;
            -moz-transition: background-color .5s ease;
            -o-transition: background-color .5s ease;
            -ms-transition: background-color .5s ease;
            transition: background-color .5s ease;
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
            <div class="main_bg">
                <div class="wrap">
                    <div class="main">
                        <div class="content">


                            <?php
                            if(isset($mycsv) && !empty($mycsv)){
                                if($mycsv->didUploadCsv){
                                    if($mycsv->didUploadFiles){
                                        foreach($mycsv->files as $onefile){
                                            //file 4, upload status(ok , error=>upload again ) 2, error  3, is new 2
                            ?>
                            <div class="alert alert-dismissible alert-info" style="text-align: right">
                                <div class="row">




                                    <div class="col-md-2">
                                        <?php
                                            if( $onefile->status!="ok" || !$onefile->isNew){
                                                
                                        ?>
                                        <form action="<?php echo site_url("admin/replace") ?>" method="post" enctype="multipart/form-data">
                                            <label class="myLabel">
                                                <input type="file" class="replacesinglefile" required name="file" />
                                                <span>اعادة تحميل الملف</span>
                                            </label>
                                            <input type="hidden" name="oldfile" value="<?php  echo $onefile->research->originalFileName?>" />
                                        </form>
                                        <?php
                                            }
                                            
                                        ?>
                                    </div>
                                    <div class="col-md-2">
                                        <h1>
                                            <?php 
                                            if( $onefile->isNew){
                                                echo "جديد";
                                            }else{
                                                echo "موجود مسبقآ";
                                            }
                                            ?>
                                        </h1>
                                    </div>
                                    <div class="col-md-3">
                                        <?php 
                                            if( $onefile->status=="error" ){
                                                if(!empty($onefile->error)){
                                                    echo $onefile->error."<br>";                                            
                                                }
                                            }
                                            if( !$onefile->validationStatus){
                                                echo "Some Fields Are Required !";
                                            }
                                        ?>
                                    </div>
                                    <div class="col-md-2">
                                        <h1>
                                            <?php 
                                            if( $onefile->status=="ok"){
                                                echo "تم التحميل";
                                            }else{
                                                if($onefile->isNew){
                                                    echo "فشل التحميل";                                            
                                                }
                                            }
                                            ?>
                                        </h1>
                                    </div>
                                    <div class="col-md-3">
                                        <h1><?php echo $onefile->research->originalFileName ?></h1>
                                    </div>
                                </div>
                            </div>

                            <?php
                                                  
                                        }//foreach file
                                        if($mycsv->areAllNewFilesUploadedOk()){
                                            echo "<a href='".site_url("admin/dobulk")."' class='btn btn-default'>Proceed</a>";
                                        }else{
                            ?>

                            <div class="alert alert-dismissible alert-danger" style="text-align: center">
                                <!--<button type="button" class="close" data-dismiss="alert">×</button>-->
                                <strong>please fix these errors first</strong><br />
                                you may need to fix it in your CSV and upload it again
                            </div>
                            <?php
                                        }
                                        
                                    }//uploaded files
                                    else{//uploaded csv
                            ?>


                            <div class="alert alert-dismissible alert-success" style="text-align: center">
                                <!--<button type="button" class="close" data-dismiss="alert">×</button>-->
                                <strong>تم اضافة ملف قائمة الابحاث بنجاح</strong>
                            </div>


                            <?php
                                        
                                        /*
                                        foreach($mycsv->getAllNewFileNames() as $file){
                                        echo $file."<br>";
                                        }
                                         */
                            ?>

                            <form method="post" action="<?php echo site_url("admin/loadbulkfiles") ?>" enctype="multipart/form-data">

                                <div class="form-group" style="float: right">
                                    <label class="myLabel upload uploadmultfile">
                                        <input type="file" class="uploadfile" required name="file[]" multiple />
                                        <span>اختر الملفات الجديدة</span>
                                    </label>
                                </div>
                                <div class="clear"></div>
                                <input type="submit" class="btn btn-primary" value="ادخال" style="display: block; float: right;" />
                                <div class="clear"></div>

                            </form>

                            <br />
                            <div class="alert alert-dismissible alert-info" style="text-align: right">
                                <h1>اضغط على العدد للمزيد من المعلومات</h1>
                                <br />
                                <div class="block">
                                    <button class="blockHead btn">بحث جديد  <?php echo $mycsv->reportEntry->numberOfNewFiles ?></button>
                                    <div class="content" style="display: none">
                                        <?php 
                                        foreach($mycsv->getAllNewFileNames() as $file){
                                            echo "<p>".$file."</p>";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <br />
                                <div class="block">
                                    <button class="blockHead btn">بحث قديم  <?php echo $mycsv->reportEntry->numberOfOldFiles ?></button>
                                    <div class="content" style="display: none">
                                        <?php 
                                        foreach($mycsv->getAllOldFileNames() as $file){
                                            echo "<p>".$file."</p>";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <br />
                                <div class="block">
                                    <button class="blockHead btn">باحثون جدد  <?php echo $mycsv->reportEntry->numberOfNewAuthors ?></button>
                                    <div class="content" style="display: none">
                                        <?php 
                                        foreach($mycsv->reportEntry->newAuthors as $file){
                                            echo "<p>".$file."</p>";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <br />
                                <div class="block">
                                    <button class="blockHead btn">باحثون قدامى  <?php echo $mycsv->reportEntry->numberOfOldAuthors ?></button>
                                    <div class="content" style="display: none">
                                        <?php 
                                        foreach($mycsv->reportEntry->oldAuthors as $file){
                                            echo "<p>".$file."</p>";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <br />
                                <div class="block">
                                    <button class="blockHead btn">ناشرون جدد  <?php echo $mycsv->reportEntry->numberOfNewPublishers ?></button>
                                    <div class="content" style="display: none">
                                        <?php 
                                        foreach($mycsv->reportEntry->newPublishers as $file){
                                            echo "<p>".$file."</p>";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <br />
                                <div class="block">
                                    <button class="blockHead btn">ناشرون قدامى  <?php echo $mycsv->reportEntry->numberOfOldPublishers ?></button>
                                    <div class="content" style="display: none">
                                        <?php 
                                        foreach($mycsv->reportEntry->oldPublishers as $file){
                                            echo "<p>".$file."</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <?php
                                    }     
                                }//uploaded csv
                                else {// not upload csv
                                    
                                }
                            ?>
                            <div class="block">
                                <a href="<?php echo site_url("admin/cancel"); ?>" class='btn btn-default'>الغاء</a>
                            </div>
                            <?php
                                               
                            }//end exist csv 
                            else{// form upload csv
                                if($success && !empty($success)){
                                    
                            ?>

                            <div class="alert alert-dismissible alert-success" style="text-align: center">
                                <!--<button type="button" class="close" data-dismiss="alert">×</button>-->
                                <strong>تم اضافة قائمة الابحاث بنجاح</strong>
                            </div>
                            <?php
                                }
                                
                            ?>
                            <form method="post" action="<?php echo site_url("admin/uploadcsv") ?>" enctype="multipart/form-data">

                                <div class="form-group" style="float: right">
                                    <label class="myLabel upload uploadonefile">
                                        <input type="file" class="uploadfile" required name="file" accept=".csv" />
                                        <span>اختر  ملف قائمة الابحاث</span>
                                    </label>
                                </div>
                                <div class="clear"></div>
                                <input type="submit" class="btn btn-primary" value="ادخال" style="display: block; float: right;" />
                                <div class="clear"></div>
                                <div style="">
                                    <?php 
                                if(isset($errors) && !empty($errors)){
                                    
                                    
                                    ?>
                                    <br />
                                    <div class="alert alert-dismissible alert-danger" style="text-align: center">
                                        <strong><?php  echo $errors ?></strong>
                                    </div>
                                    <br />
                                    <?php
                                }
                                
                                
                                    ?>
                                </div>
                            </form>
                            <?php 
                                
                            }
                            ?>

                        </div>
                    </div>
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
    <script>
        $(document).ready(function () {
            $(".replacesinglefile").change(function () {
                $(this).parents("form").submit();
            });

            $(".uploadfile").change(function () {
                val = $(this).val();
                fileCount = this.files.length;
                if (fileCount > 1) {
                    $(".uploadmultfile span").html(fileCount + " ملفات");
                } else {
                    if ($(this).val() != "" && $(this).val() != null) {
                        var fileNameIndex = $(this).val().lastIndexOf("\\") + 1;
                        //var fileNameIndex = $(this).val().lastIndexOf("/") + 1;
                        var filename = $(this).val().substr(fileNameIndex);
                        $(".uploadonefile span , .uploadmultfile span").html(filename);
                    }
                }

            });

            $(".blockHead").click(function () {
                $(this).parents(".block").find(".content").slideToggle();
            });
        });
    </script>
</body>
</html>
