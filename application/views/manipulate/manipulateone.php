<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Manipulate | <?php echo SITENAME?></title>

    <?php
    $this->load->view('shared/css');
    ?>
    <style>
        .menuuWrapper {
            position: relative;
            margin: 0 auto;
            text-align: center;
        }

        .mainNav {
            position: relative;
            display: block;
        }

            .mainNav li {
            }
    </style>

</head>

<body>

    <?php
    $this->load->view('shared/header');
    ?>
    <div class="main_bg">
        <div class="wrap">
            <div class="main">
                <div class="content">
                    <div class="row">
                        <div class="menuuWrapper">
                            <ul class="mainNav">
                                <li class="btn edits" data-div="specializations">التخصصات</li>
                                <li class="btn edits" data-div="accSpecializations">التخصصات الدقيقة</li>
                                <li class="btn edits" data-div="scientificDegrees">الدرجات العلمية</li>
                                <li class="btn edits" data-div="researchTypes">انواع الورقات البحثية</li>
                                <li class="btn edits" data-div="institutes">الهيئات العلمية</li>
                                <li class="btn edits" data-div="jobs">وظائف الباحث</li>
                            </ul>
                        </div>
                    </div>
                    <div class="allEdits" id="specializations">
                        <div class="alert alert-success">
                            <div class="row parent" data-type="specialization">
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <input type="button" class="btn addBtn" value="اضافة" />
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control inputText" />
                                </div>
                            </div>
                        </div>

                        <div class="old">
                            <?php 
                            if(isset($specializations) && !empty($specializations)){
                                foreach($specializations as $spec){
                            ?>
                            <div class="alert alert-info">
                                <div class="row parent" data-type="specialization">
                                    <div class="col-md-3"></div>

                                    <div class="col-md-3">
                                        <input type="button" class="btn deleteBtn" value="مسح" />
                                    </div>

                                    <div class="col-md-3">
                                        <input type="button" class="btn editBtn" value="تعديل" />
                                        <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" data-id="<?php echo $spec->id?>" readonly class="form-control inputText" value="<?php echo $spec->name ?>"/>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="allEdits" id="accSpecializations">
                        <div class="alert alert-success">
                            <div class="row parent" data-type="accSpecialization">
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <input type="button" class="btn addBtn" value="اضافة" />
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control inputText" />
                                </div>
                            </div>
                        </div>

                        <div class="old">
                            <?php 
                            if(isset($accSpecializations) && !empty($accSpecializations)){
                                foreach($accSpecializations as $obj){
                            ?>
                            <div class="alert alert-info">
                                <div class="row parent" data-type="accSpecialization">
                                    <div class="col-md-3"></div>

                                    <div class="col-md-3">
                                        <input type="button" class="btn deleteBtn" value="مسح" />
                                    </div>

                                    <div class="col-md-3">
                                        <input type="button" class="btn editBtn" value="تعديل" />
                                        <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" data-id="<?php echo $obj->id?>" readonly class="form-control inputText" value="<?php echo $obj->name ?>"/>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>


                    <div class="allEdits" id="scientificDegrees">
                        <div class="alert alert-success">
                            <div class="row parent" data-type="scientificDegree">
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <input type="button" class="btn addBtn" value="اضافة" />
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control inputText" />
                                </div>
                            </div>
                        </div>

                        <div class="old">
                            <?php 
                            if(isset($scientificDegrees) && !empty($scientificDegrees)){
                                foreach($scientificDegrees as $obj){
                            ?>
                            <div class="alert alert-info">
                                <div class="row parent" data-type="scientificDegree">
                                    <div class="col-md-3"></div>

                                    <div class="col-md-3">
                                        <input type="button" class="btn deleteBtn" value="مسح" />
                                    </div>

                                    <div class="col-md-3">
                                        <input type="button" class="btn editBtn" value="تعديل" />
                                        <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" data-id="<?php echo $obj->id?>" readonly class="form-control inputText" value="<?php echo $obj->name ?>"/>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>


                    <div class="allEdits" id="researchTypes">
                        <div class="alert alert-success">
                            <div class="row parent" data-type="researchType">
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <input type="button" class="btn addBtn" value="اضافة" />
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control inputText" />
                                </div>
                            </div>
                        </div>

                        <div class="old">
                            <?php 
                            if(isset($researchTypes) && !empty($researchTypes)){
                                foreach($researchTypes as $obj){
                            ?>
                            <div class="alert alert-info">
                                <div class="row parent" data-type="researchType">
                                    <div class="col-md-3"></div>

                                    <div class="col-md-3">
                                        <input type="button" class="btn deleteBtn" value="مسح" />
                                    </div>

                                    <div class="col-md-3">
                                        <input type="button" class="btn editBtn" value="تعديل" />
                                        <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" data-id="<?php echo $obj->id?>" readonly class="form-control inputText" value="<?php echo $obj->name ?>"/>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            }
                            ?>
                        </div>

                    </div>

                    <div class="allEdits" id="institutes">
                        <div class="alert alert-success">
                            <div class="row parent" data-type="institute">
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <input type="button" class="btn addBtn" value="اضافة" />
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control inputText" />
                                </div>
                            </div>
                        </div>

                        <div class="old">

                            <?php 
                            if(isset($institutes) && !empty($institutes)){
                                foreach($institutes as $obj){
                            ?>
                            <div class="alert alert-info">
                                <div class="row parent" data-type="institute">
                                    <div class="col-md-3"></div>

                                    <div class="col-md-3">
                                        <input type="button" class="btn deleteBtn" value="مسح" />
                                    </div>

                                    <div class="col-md-3">
                                        <input type="button" class="btn editBtn" value="تعديل" />
                                        <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" data-id="<?php echo $obj->id?>" readonly class="form-control inputText" value="<?php echo $obj->instituteName ?>"/>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>



                    <div class="allEdits" id="jobs">
                        <div class="alert alert-success">
                            <div class="row parent" data-type="job">
                                <div class="col-md-3"></div>

                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <input type="button" class="btn addBtn" value="اضافة" />
                                </div>

                                <div class="col-md-3">
                                    <input type="text" class="form-control inputText" />
                                </div>
                            </div>
                        </div>

                        <div class="old">
                            <?php 
                            if(isset($jobs) && !empty($jobs)){
                                foreach($jobs as $obj){
                            ?>
                            <div class="alert alert-info">
                                <div class="row parent" data-type="job">
                                    <div class="col-md-3"></div>

                                    <div class="col-md-3">
                                        <input type="button" class="btn deleteBtn" value="مسح" />
                                    </div>

                                    <div class="col-md-3">
                                        <input type="button" class="btn editBtn" value="تعديل" />
                                        <input type="button" style="display: none" class="btn saveEditBtn" value="حفظ" />
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" data-id="<?php echo $obj->id?>" readonly class="form-control inputText" value="<?php echo $obj->name ?>"/>
                                    </div>
                                </div>
                            </div>

                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>


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
    <script>
        $(document).ready(function () {

            $(".allEdits").hide();

            $(".editBtn").click(function () {
                parent = $(this).parents(".parent");

                $(parent).find(".inputText").removeAttr("readonly");
                $(parent).find(".saveEditBtn").show();
                $(this).hide();
            });

            $(".saveEditBtn").click(function () {
                saveBtn = this;
                parent = $(this).parents(".parent");
                inputText = $(parent).find(".inputText").val();
                inputId = $(parent).find(".inputText").attr("data-id");
                table = $(parent).attr("data-type");
                var tables = ["specialization", "accSpecialization", "scientificDegree", "researchType", "institute", "job"];
                if (table == "" || table == null || tables.indexOf(table) == -1) {
                    alert("error");
                } else {
                    if (inputId == "" || inputId == null || isNaN(inputId)) {
                        alert("Error Loading Scripts , please reload page or use a new browser");
                    } else {
                        if (inputText == "" || inputText == null) {
                            alert("Please enter value");
                        } else {
                            res = confirm("هل انت متأكد من التعديل ؟");
                            if (res == true) {
                                $.post("<?php echo site_url("homecontroller/editonetable") ?>", "table=" + table
                                    + "&inputId=" + inputId
                                    + "&inputText=" + inputText
                                    , function (res) {
                                        if (res == "success") {
                                            alert("تم التعديل بنجاح");
                                            $(parent).find(".editBtn").show();
                                            $(parent).find(".inputText").attr("readonly", "readonly");
                                            $(saveBtn).hide();
                                        }
                                    });
                            }

                        }
                    }
                }
            });


            $(".deleteBtn").click(function () {
                parent = $(this).parents(".parent");
                inputText = $(parent).find(".inputText").val();
                inputId = $(parent).find(".inputText").attr("data-id");
                table = $(parent).attr("data-type");
                var tables = ["specialization", "accSpecialization", "scientificDegree", "researchType", "institute", "job"];
                if (table == "" || table == null || tables.indexOf(table) == -1) {
                    alert("error");
                } else {
                    if (inputId == "" || inputId == null || isNaN(inputId)) {
                        alert("Error Loading Scripts , please reload page or use a new browser");
                    } else {

                        res = confirm("هل انت متأكد من مسح " + inputText + " ? ");
                        if (res == true) {
                            $.post("<?php echo site_url("homecontroller/deleteontable") ?>", "table=" + table
                                    + "&inputId=" + inputId
                                    , function (res) {
                                        if (res == "success") {
                                            alert("تم المسح بنجاح");
                                            $(parent).remove();
                                        }
                                    });
                        }
                    }
                }
            });

            $(".addBtn").click(function () {
                parent = $(this).parents(".parent");
                inputText = $(parent).find(".inputText").val();
                table = $(parent).attr("data-type");
                var tables = ["specialization", "accSpecialization", "scientificDegree", "researchType", "institute", "job"];;
                if (table == "" || table == null || tables.indexOf(table) == -1) {
                    alert("error");
                } else {
                        if (inputText == "" || inputText == null) {
                            alert("Please enter value");
                        } else {
                            res = confirm("هل انت متأكد من اضاقة " + inputText + " ؟");
                            if (res == true) {
                                $.post("<?php echo site_url("homecontroller/addonetable") ?>", "table=" + table
                                    + "&inputText=" + inputText
                                    , function (res) {
                                        if (res == "success") {
                                            alert("تم الاضافة بنجاح");
                                            window.location.reload();
                                        }
                                    });
                            }
                    }
                }
            });

            $(".edits").click(function () {
                $(".allEdits").fadeOut();
                div = $(this).attr("data-div");
                $("#" + div).fadeIn();
                $(".edits").css("background-color", "#19bd9b");
                $(this).css("background-color", "#34495e");
                $(this).css("color", "white");

            });
        });
    </script>
</body>

</html>
